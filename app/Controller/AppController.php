<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
App::uses('CakeEmail', 'Network/Email');

class AppController extends Controller {

    public $components = array(
    	//'Acl',
       'Auth',
        'Session',
        'Utils.Referer',
        'Paginator',
        'RequestHandler',
        'Email',
        'Custom',
        'Cookie',
        'Acl',
        'Acl.AclFilter'
            // 'Security',
    );
    public $helpers = array(
        'Image',
        'Layout',
        'Form',
        'Number',
        'Text',
    );
    public $logged_in = array();
    public $language = array();
    public $is_fb_login = false;

    public function beforeFilter() {

        parent::beforeFilter();
        
        $this->_defaultSettings();  

        $aclFilterComponent = 'AclFilter';
        if (empty($this->{$aclFilterComponent})) {
            throw new MissingComponentException(array('class' => $aclFilterComponent));
        }
        
        if($this->params['prefix'] == 'admin'){
            if(isset($this->logged_in['id']) && $this->logged_in['id']!=''){
                 $this->{$aclFilterComponent}->auth();
            }else{
                $site_url = Router::url('/admin', true);
                //header('Location:'.$site_url);
                //$this->redirect($site_url);
            }
        }
        // $this->Auth->authorize = array(
        // 		'Controller',
        // 		'Actions' => array('actionPath' => 'controllers')
        // );
        // For ACL permissions
     //if(isset($this->role_id) && $this->role_id != ''){
        //pr($this->Auth->user); die;
        
      /* if ($this->Acl->check(array('model'=>'Role','foreign_key'=>$this->Auth->user('role_id')),$this->params['controller'].'/'.$this->params['action'])){

        }else{
            //echo $this->params['controller']."<br>";die;
        	//echo $this->params['action'];die;
        		$this->Session->setFlash(__('you do not have permission for this page.'), 'message', array('class' => 'danger'), 'admin');
        		$controllerName = array('events', 'BlogPosts', 'BlogPostCategories');
                if(in_array($this->params['controller'], $controllerName)) {
                    $this->redirect(SITEURL.'admin/pages/permission/', true);
                } else {
                    $this->redirect(array('controller'=>'pages','action'=>'permission'));    
                }

                // if($this->params['controller'] == 'events') { 
                //     $this->redirect(SITEURL.'admin/pages/permission/', true);
                // } else {
                //     $this->redirect(array('controller'=>'pages','action'=>'permission'));    
                // }
        		
        		//}
        }*/
      //}
           
    }
    
    function _setErrorLayout() {
    
    	if (Configure::read("debug") == 0 && $this->name == 'CakeError') {
    		$this->layout = 'error404';
    	}
    }
    
    function beforeRender() {
    	if (Configure::read("debug") == 0) {
    		$this->_setErrorLayout();
    	}
    }
    
    function is_login() {
        $action = $this->params->params['action'];
        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            if ($this->Session->check('Auth.Admin'))
                return true;
        }
        else {
            if ($this->Session->check('Auth.Front'))
                return true;
        }
        return false;
    }

    function get_user($key = NULL) {
        $action = $this->params->params['action'];
        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            if ($key)
                $key = "Auth.Admin." . $key;
            else
                $key = "Auth.Admin";
            $user = $this->Session->read($key);
        }
        else {
            if ($key)
                $key = "Auth.Front." . $key;
            else
                $key = "Auth.Front";
            $user = $this->Session->read($key);
        }
        return $user;
    }

    /**
     * set_language
     * function will set the default language for website and set the layout pattern as well
     *
     * @return void
     * @access public
     */

    private function _defaultSettings() {

       // $this->set_language();

//        $this->Cookie->destroy();
        $this->set('Custom', $this->Custom);
       // pr($this->get_user());die;
        $this->logged_in = $this->get_user();
        $this->role_id =$this->logged_in['role_id'];
        $campaign_theme = null;
        $this->set('logged_in', $this->logged_in);
        $this->set('role_id', $this->role_id);
        //get all services
        $this->loadModel('Service');
        //$this->loadModel('BlogPost');
        $service_list = $this->Service->find('all',array('conditions'=>array(	'Service.status'=>1),	'order'=>array('Service.id ASC')));
        
        //SAGAR JAJORIYA
        $this->loadModel('Page');
        // $special_service_details = $this->Page->find('first', array(
        //     'conditions' => array(
        //         'Page.slug' => 'specialist-services',
        //         'Page.status'=>1)
        //     )
        // );
        $testimonial_detail = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'testimonials',
                'Page.status' => 1
            ),
            'fields' => array(
                'Page.short_description'
            )
        ));
        $buzz_hub_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'buzz-home-page',
                'Page.status' => 1
            ),
            'fields' => array(
                'Page.short_description'
            )
        ));
        $quality_assurance_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'quality-assurance',
                'Page.status' => 1
            ),
            'fields' => array(
                'Page.short_description'
            )
        ));
        $our_partners_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'our-partners',
                'Page.status' => 1
            ),
            'fields' => array(
                'Page.short_description'
            )
        ));

        $this->loadModel('JobCategory');
        $data = $this->JobCategory->find('list');
        $this->set('data', $data);

        //SAGAR JAJORIYA

        $controller = $this->params->params['controller'];
        $action = $this->params->params['action'];
        $slug = (!empty($this->params->params['pass'][0])) ? $this->params->params['pass'][0] : null;
        $plugin = (!empty($this->params->params['plugin'])) ? $this->params->params['plugin'] : null;

        $flashLayout = true;
        $this->set(compact(
            'plugin', 
            'controller', 
            'action', 
            'slug', 
            'campaign_theme', 
            'flashLayout',
            'service_list', 
            //'special_service_details',
            'buzz_hub_details',
            'quality_assurance_details',
            'our_partners_details',
            'testimonial_detail'
        ));

       // $this->Auth->actionPath = 'controllers/';
        $this->Auth->loginAction = array('plugin' => false, 'controller' => 'users', 'action' => 'login', $this->request->prefix => false);

        $this->Auth->authError = '<div class="alert alert-danger"><button class="close" data-close="alert"></button><span>Please login for continue.</span></div>';
        $this->set('title_for_layout', Configure::read('Site.title'));
        $this->set('meta_keyword', Configure::read('Meta.keywords'));
        $this->set('meta_description', Configure::read('Meta.description'));

        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'admin';
            AuthComponent::$sessionKey = 'Auth.Admin';
            $this->Auth->loginAction = array('plugin' => false, 'controller' => 'users', 'action' => 'login', 'admin' => true);
            //$this->Auth->logoutRedirect = array('plugin' => false, 'controller' => 'users', 'action' => 'login', 'admin' => true);
        } else {
            AuthComponent::$sessionKey = 'Auth.Front';
            $this->Auth->logoutRedirect = array('plugin' => false, 'controller' => 'users', 'action' => 'login', $this->request->prefix => false);
            $this->Auth->loginAction = array('plugin' => false, 'controller' => 'users', 'action' => 'login', $this->request->prefix => false);
        }


        // set cookie options for remember me script
        $this->Cookie->key = 'qSI232qs*&sXOw!adre@34SAv!@*(XSL#$%)asGb$@11~_+!@#HKis~#^';
        $this->Cookie->httpOnly = true;
        if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me_cookie')) {

            $cookie = $this->Cookie->read('remember_me_cookie');
            $cookie_user = $this->User->find('first', array(
                'conditions' => array(
                    'User.email' => $cookie['email'],
                    'User.password' => $cookie['password']
                )
            ));
            $this->set(compact('cookie_user'));
//            if ($cookie_user && !$this->Auth->login($cookie_user['User'])) {
//                $this->redirect('/users/logout'); // destroy session & cookie
//            }
        }


        if ($this->name == 'CakeError') {
            $this->layout = 'error';
        }
    }

    /**
     * Common function to send mail 
     *
     *  Apurav Gaur
     */
    public function send_mail($to, $template, $replace = NULL, $from = NULL) {

        if ($template) {
            // get email template
            $this->loadModel('EmailTemplate');
            $emailtemplate = $this->EmailTemplate->find('first', array('fields' => array('EmailTemplate.subject', 'EmailTemplate.from', 'EmailTemplate.message', 'EmailTemplate.fields'), 'conditions' => array('EmailTemplate.title' => $template)));
            if ($emailtemplate) {
                if (!$from)
                    $from = $emailtemplate['EmailTemplate']['from'];
                $find = explode(',', $emailtemplate['EmailTemplate']['fields']);
                $template = str_replace($find, $replace, $emailtemplate['EmailTemplate']['message']);
                $sub = str_replace($find, $replace, $emailtemplate['EmailTemplate']['subject']);

                $email = new CakeEmail();
                $email->config('smtp');
                $email->from($from);
                $email->to($to);
                $email->emailFormat('html');
                $email->subject(($sub) ? $sub : $emailtemplate['EmailTemplate']['subject']);
            }
            else {
                return false;
            }

            if ($email->send($template)) {
                return true;
            }
        }

        return false;
    }

    public function _sendMail($to, $subject, $template, $data, $sendAs = 'text', $from = null) {
        //fire mail
        if (!$from) {
            $from = Configure::read('Site.email');
        }

        $Email = new CakeEmail();
        //$Email = new CakeEmail();/, 'bush147258369@gmail.com'
        $Email->to(array($to));
        $Email->subject($subject);
        $Email->from($from);
        $Email->emailFormat($sendAs);
        $Email->template($template);
        $Email->viewVars(array(
            'data' => $data,
        ));

        //        $this->Email->from = $from;
        //        $this->Email->to = $to;
        //        $this->Email->subject = $subject;
        //        $this->Email->template = $template;
        //        $this->Email->sendAs = $sendAs;
        //$this->set('user', $data);
        //if ($this->Email->send()) {
        if ($Email->send()) {
            return true;
        }

        return false;
    }

    public function outOfPageRangeRedirect($url) {
        if (is_array($url)) {
            $url['?'] = $_SERVER['QUERY_STRING'];
        } else {
            $url .= "?" . $_SERVER['QUERY_STRING'];
        }
        return $this->redirect($url);
    }

    function download($path, $file_name) {

        $this->autoLayout = false;
        $newFileName = $file_name;
        $path = WWW_ROOT . $path . '/' . $file_name;

        if (file_exists($path) && is_file($path)) {

            $mimeContentType = 'application/octet-stream';
            $temMimeContentType = $this->_getMimeType($path);
            if (isset($temMimeContentType) && !empty($temMimeContentType)) {
                $mimeContentType = $temMimeContentType;
            }

            // required for IE, otherwise Content-disposition is ignored
            if (ini_get('zlib.output_compression'))
                ini_set('zlib.output_compression', 'Off');
            header("Pragma: public"); // required
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private", false); // required for certain browsers 


            header("Content-Type: " . $mimeContentType);


            header("Content-Disposition: attachment; filename=\"" . (is_null($newFileName) ? basename($path) : $newFileName) . "\";");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . filesize($path));

            readfile($path);
            exit();
        }
        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->Session->setFlash('File not found.');
        }
    }

    function _getMimeType($filepath) {
        ob_start();
        system("file -i -b {$filepath}");
        $output = ob_get_clean();
        $output = explode("; ", $output);
        if (is_array($output)) {
            $output = $output[0];
        }
        return $output;
    }

    function generateRandomString($length = 8) {

        $pass = "";

        // possible password chars.

        $chars = array("a", "A", "b", "B", "c", "C", "d", "D", "e", "E", "f", "F", "g", "G", "h", "H", "i", "I", "j", "J",
            "k", "K", "l", "L", "m", "M", "n", "N", "o", "O", "p", "P", "q", "Q", "r", "R", "s", "S", "t", "T",
            "u", "U", "v", "V", "w", "W", "x", "X", "y", "Y", "z", "Z", "1", "2", "3", "4", "5", "6", "7", "8", "9");

        for ($i = 0; $i < $length; $i++) {

            $pass .= $chars[mt_rand(0, count($chars) - 1)];
        }

        return $pass;
    }
    
    // function isAuthorized($user) {
    // 	//return false;
    // 	return $this->Auth->loggedIn();
    // }

}
