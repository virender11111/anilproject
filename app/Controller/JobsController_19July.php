<?php

/**
 * Static content controller.
 *
 * This file will render views from views/Jobs/
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
App::uses('AppController', 'Controller');

/**
 * Jobs Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @author SAGAR JAJORIYA
 */
class JobsController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Jobs';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('Job');
    
    public $layout = 'home';

    
    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('enquery', 'quick_enquiry', 'quick_enquiry_modal', 'enquiry_modal', 'modal_enquiry', 'modal_quick_enquiry');
        $this->set('modelClass', $this->modelClass);
    }

    /**
     * view
     *
     * @return void
     * @access public 
     */
    public function view($slug) {
        $this->layout = 'home';

        $page = $this->Job->find('first', array(
            'conditions' => array('Job.status' => 1, 'Job.slug' => $slug)
        ));
        if (empty($page)) {
            throw new NotFoundException('404 error.');
        }
        $this->set('pages', $page);
    }

    /**
     * home
     *
     * @return void
     * @access public 
     */
    public function home() { // Base path method
    }

    /**
     * changeLanguage
     *
     * @return void
     * @access public 
     */
    public function changeLanguage($lng) { // Change language method
        if (isset($this->availableLanguages[$lng])) { // If we support this language (see /app/Config/global.php)
            parent::setLang($lng); // call setLang() from AppController
            $this->Session->setFlash(__('The language has been changed to %s', $this->availableLanguages[$lng])); // Send a success flash message
        } else {
            throw new NotFoundException(__('Language %s is not supported', $lng)); // Throw a not found exception
        }

        $this->redirect($this->referer()); // redirect the user to the last Job (referer)
    }

    /**
     * Admin index
     *
     * @return void
     * @access public
     */
    public function admin_index() {
		$title_for_layout = __('manage', Inflector::humanize(Inflector::underscore("enquiry")));
        $this->Job->recursive = 1;

        $conditions = array();
        if ($this->params->query('flag') == 'true') {
            $this->Session->delete('searchData');
        }
        if (strpos($this->referer(), strtolower(Inflector::pluralize($this->modelClass))) == false) {
            $this->Session->delete('searchData');
        }
        
        if ($this->request->is('post')) {
            $this->Session->write('searchData', $this->request->data[$this->modelClass]);
        }
        
        $this->request->data[$this->modelClass] = $searchData = $this->Session->read('searchData');
    
        if (!empty($searchData['job_category_id'])) {
            $conditions[] = $this->modelClass . '.job_category_id ="' . $searchData['job_category_id'] . '"';
        }
        
        $this->paginate = array('conditions' => $conditions, 'order' => array('Job.id' => 'DESC'), 'limit' => 100);

        try {
            $this->set('listAll', $this->paginate());
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }
        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin add
     *
     * @return void
     * @access public
     */
    public function admin_add() {
    	$this->loadModel('Role');
    	$this->loadModel('JobCategory');
        $title_for_layout = __('add', $this->modelClass);
        if (!empty($this->request->data)) {
        
            if ($this->Job->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        }
        $roleList = $this->Role->find('list', array(
            'conditions' => array(
        		'Role.id !=' => 1)
            )
        );
        $job_categories = $this->JobCategory->find('list');
        $this->set(compact('title_for_layout', 'job_categories'));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($id = null) {
    	$this->loadModel('Role');
    	$this->loadModel('JobCategory');
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore("enquiry")));
        $this->Job->id = $id;
        if (!$this->Job->exists())
            throw new NotFoundException(__(''));
        $this->set('title_for_layout', __('Edit Jobs'));
        $this->set('title', __('Job <small> Edit Job</small>'));
        if ($this->request->is('post')) {
            $this->request->data['Job']['id'] = $id;
            if(empty($this->request->data['Job']['cv_upload']['name'])){
                unset($this->request->data['Job']['cv_upload']);
            }
           
            if ($this->Job->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', 'Enquiry'), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', 'Enquiry'), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->Job->read(null, $id);
        }
        $roleList = $this->Role->find('list', array(
            'conditions' => array(
        		'Role.id !=' =>1)
            )
        );
        $job_categories = $this->JobCategory->find('list');
        $this->set(compact('title_for_layout', 'roleList', 'job_categories'));
        $this->render('admin_add');
    }

    /**
     * Admin delete
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_delete($id = null) {
        if ($this->Job->delete($id)) {
            $this->Session->setFlash(__('deleted', "Enquiry"), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', "Enquiry"), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }

    /**
     * jobs enquire add
     *
     * @param null
     * @return void
     * @access public
     */
    public function enquery() {
    	$validates['g-recaptcha-response'][0] = '';
    	$this->set('dataValidate',$validates);
    	if (!empty($this->request->data)) {
    		$recaptcha=$_POST['g-recaptcha-response'];
    		$google_url="https://www.google.com/recaptcha/api/siteverify";
    		$secret='6LfHRBQTAAAAAFDJeohoqx4jP_PBZvm6geiLMtjK';
    		$ip=$_SERVER['REMOTE_ADDR'];
    		$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
    		$res=$this->getCurlData($url);
    		$res= json_decode($res, true);
    		$this->request->data['Job']['g-recaptcha-response'] = $_POST['g-recaptcha-response'];
    		if ($this->Job->saveAll($this->request->data)) {	
    			$this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
    		} else {
    			$this->set('dataValidate',$this->Job->validationErrors);
    			$this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
    		}
    	}
    
    	
    
    }

    /**
     * jobs enquire add
     *
     * @param null
     * @return void
     * @access public
     * @author SAGAR JAJORIYA
     */
    public function quick_enquiry() {
        if ($this->request->is("post") && !empty($this->request->data)) {
            if ($this->Job->saveAll($this->request->data)) {
                //name email phone company message requestCallBack newsletterSub
            	$name = $this->request->data['Job']['name'];
                if($this->request->data['Job']['request'] == 1) {
                    $phone = $this->request->data['Job']['phone'];
                    $request = "Yes";
                }
                $newsletter = (($this->request->data['Job']['newsletter'] == 1) ? "Yes" : "No");

                $body = "An enquiry has been posted by the user <br/><br/>User Details : <br/><br/>Name : ".$this->request->data['Job']['name']."<br/><br/>Email : ".$this->request->data['Job']['email']."<br/><br/>Phone no : ".$phone."<br/><br/>Request call back : ".$request."<br/><br/>Newsletter Subscription : ".$newsletter."<br/><br/>Company : ".$this->request->data['Job']['company']."<br/><br/>Message : ".$this->request->data['Job']['comments'];
            	// $email = new CakeEmail();
            	// $email->config('smtp');
            	// $email->from("enquiry@frontiersupport.co.uk");
            	// //$email->to(Configure::read('Site.email'));
            	// $email->to('sagar.jajoriya@planetwebsolution.com');
            	// $email->emailFormat('html');
            	// $email->subject("Enquiries");
            	// if($email->send($body)) {
             //        //$this->Session->setFlash(__('Successfully saved.', $this->modelClass), 'message', array('class' => 'success'));
             //        echo json_encode(array("status" => true));
             //        die;
             //    } else {
             //        echo json_encode(array("status" => false));
             //        die;
             //    }   


                $to = Configure::read('Site.email');

                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                //$headers .= "\r\nContent-Type: multipart/mixed;";
                //$to="sagar.jajoriya@planetwebsolution.com";
                $subject = "Enquiries";
                $txt = $body;
                //$headers .= "From: enquiry@frontiersupport.co.uk";
                //$headers .= "From: enquiry@frontiersupport.co.uk" . "\r\n" ."CC: demoenquiry@mailinator.com";
                $headers = "From: enquiry@frontiersupport.co.uk" . "\r\n" ."CC: ".Configure::read('Site.ccemail');
                if(mail($to,$subject,$txt,$headers)){
                    echo json_encode(array("status" => true));
                    die;   
                }else {
                    echo json_encode(array("status" => false));
                    die;
                } 
            }
        }
    
    }

    /**
     * jobs enquire add
     *
     * @param null
     * @return void
     * @access public
     * @author SAGAR JAJORIYA
     */
    public function modal_quick_enquiry() {
        //Configure::write("debug", 2);
        if ($this->request->is("post") && !empty($this->request->data)) {
            if ($this->Job->saveAll($this->request->data)) {

                $lastInsertId = $this->Job->id;
                $data = $this->Job->find("first", array(
                    "conditions" => array(
                        "Job.id" => $lastInsertId
                    ), 
                    "fields" => array(
                        "Job.cv_upload",
                        "Job.job_category_id"
                    ),
                    "contain" => array(
                        "JobCategory" => array(
                            "fields" => array(
                                "JobCategory.name"
                            )
                        )
                    )
                ));
                $job_category = $data["JobCategory"]["name"];
                $file_name = $data["Job"]["cv_upload"];
                $file_path = Router::url("/", true)."files/job/cv_upload/".$lastInsertId."/".$file_name;

                //name email phone company message requestCallBack newsletterSub
                $name = $this->request->data['Job']['name'];
                $phone = $this->request->data['Job']['phone'];
                if($this->request->data['Job']['request'] == 1) {
                    $request = "Yes";
                } else {
                    $request = "No";
                }
                $body = "An enquiry has been posted by the user <br/><br/>User Details : <br/>Name : ".$this->request->data['Job']['name']."<br/>Email : ".$this->request->data['Job']['email']."<br/>Phone no : ".$phone."<br/>Request call back : ".$request."<br/>Message : ".$this->request->data['Job']['comments'];
                // $body = "adadasdsad";
             //    $email = new CakeEmail();
                // $email->config('smtp');
                // $email->from("enquiry@frontiersupport.co.uk");
                // //$email->to(Configure::read('Site.email'));
                // $email->to('sagar.jajoriya@planetwebsolution.com');
                // $email->emailFormat('html');
                // $email->subject("Enquiries");
                // if($email->send($body)) {
             //        //$this->Session->setFlash(__('Successfully saved.', $this->modelClass), 'message', array('class' => 'success'));
             //        echo json_encode(array("status" => true));
             //        die;
             //    } else {
             //        echo json_encode(array("status" => false));
             //        die;
             //    }   


                // $to = Configure::read('Site.email');

                // $headers  = 'MIME-Version: 1.0' . "\r\n";
                // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // //$to="sagar.jajoriya@planetwebsolution.com";
                // $subject = "Enquiries";
                // $txt = $body;
                // $headers .= "From: enquiry@frontiersupport.co.uk" . "\r\n";



                $htmlbody = "An enquiry has been posted by the user <br/><br/>User Details : <br/><br/>Name : ".$this->request->data['Job']['name']."<br/><br/>Email : ".$this->request->data['Job']['email']."<br/><br/>Job Category : ".$job_category."<br/><br/>Phone no : ".$phone."<br/><br/>Request call back : ".$request."<br/><br/>Message : ".$this->request->data['Job']['comments'];
                $to = Configure::read('Site.email');
                //$to = "sagar.jajoriya@planetwebsolution.com"; //Recipient Email Address
                $subject = "Enquiry"; //Email Subject
                //$headers = "From: enquiry@frontiersupport.co.uk";
                $headers = "From: enquiry@frontiersupport.co.uk" . "\r\n" ."CC: ".Configure::read('Site.ccemail');
                $random_hash = md5(date('r', time()));
                $headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";
                $attachment = chunk_split(base64_encode(file_get_contents($file_path))); // Set your file path here
                $message = "--PHP-mixed-$random_hash\r\n"."Content-Type: multipart/alternative; boundary=\"PHP-alt-$random_hash\"\r\n\r\n";
                $message .= "--PHP-alt-$random_hash\r\n"."Content-Type: text/html; charset=\"iso-8859-1\"\r\n"."Content-Transfer-Encoding: 7bit\r\n\r\n";
                $message .= $htmlbody;
                $message .="\r\n\r\n--PHP-alt-$random_hash--\r\n\r\n";
                $message .= "--PHP-mixed-$random_hash\r\n"."Content-Type: application/zip; name=\"Resume.doc\"\r\n"."Content-Transfer-Encoding: base64\r\n"."Content-Disposition: attachment\r\n\r\n";
                $message .= $attachment;
                $message .= "/r/n--PHP-mixed-$random_hash--";

                if(mail($to, $subject, $message, $headers)){
                    $this->Session->setFlash("Your CV has been submitted successfully. Thank you. Someone will be in touch with you shortly.", 'message', array('class' => 'success'));
                    $this->redirect(array("controller" => "pages", "action" => "jobs"));
                    // echo json_encode(array("status" => true));
                    // die;   
                }else {
                    $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'));
                    $this->redirect(array("controller" => "pages", "action" => "jobs"));
                    // echo json_encode(array("status" => false));
                    // die;
                 } 
            }
        }
    
    }

    /**
     * jobs enquire add
     *
     * @param null
     * @return void
     * @access public
     * @author SAGAR JAJORIYA
     */
    public function modal_enquiry() {
        if (!empty($this->request->data) && $this->request->is('ajax')) {
            if ($this->Job->saveAll($this->request->data)) {
                $response['status'] = true;
            } else {
                $response['status'] = false;
            }
            echo json_encode($response);
            die;
        }
        //$this->redirect($this->referer());
    }

    /**
     * jobs enquire add
     *
     * @param null
     * @return void
     * @access public
     * @author SAGAR JAJORIYA
     */
    public function quick_enquiry_modal() {
        $validates['g-recaptcha-response'][0] = '';
        $this->set('dataValidate',$validates);
        if (!empty($this->request->data)) {           
            $recaptcha=$_POST['g-recaptcha-response'];
            $google_url="https://www.google.com/recaptcha/api/siteverify";
            $secret='6LfHRBQTAAAAAFDJeohoqx4jP_PBZvm6geiLMtjK';
            $ip=$_SERVER['REMOTE_ADDR'];
            $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
            $res=$this->getCurlData($url);
            $res= json_decode($res, true);
            $this->request->data['Job']['g-recaptcha-response'] = $_POST['g-recaptcha-response'];
            if ($this->Job->saveAll($this->request->data)) {
            
            } else {   
                $_SESSION['errors'] = $this->Job->validationErrors;
                $_SESSION['lastData'] = $this->request->data['Job'];
                $this->Session->setFlash(__('Error found. Please try again.', $this->modelClass), 'message', array('class' => 'danger'));
            }
        }
        $this->redirect($this->referer());
    
    }

    public function enquiry_modal() {
        $this->layout = false;
        $validates['g-recaptcha-response'][0] = '';
        $this->set('dataValidate',$validates);
        if (!empty($this->request->data)) {    
            $recaptcha=$_POST['g-recaptcha-response'];
            $google_url="https://www.google.com/recaptcha/api/siteverify";
            $secret='6LfHRBQTAAAAAFDJeohoqx4jP_PBZvm6geiLMtjK';
            $ip=$_SERVER['REMOTE_ADDR'];
            $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
            $res=$this->getCurlData($url);
            $res= json_decode($res, true);
            $this->request->data['Job']['g-recaptcha-response'] = $_POST['g-recaptcha-response'];
            if ($this->Job->saveAll($this->request->data)) {
                $this->Session->setFlash(__('Successfully submit your CV.'), 'message', array('class' => 'success'));
            } else {
                $this->set('dataValidate',$this->Job->validationErrors);
            }
        }
    }
    
    // google i am not robot recaptcha function
    function getCurlData($url)
    {
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
    	$curlData = curl_exec($curl);
    	curl_close($curl);
    	return $curlData;
    }

    /**
     * jobs enquire add
     *
     * @param null
     * @return void
     * @access public
     * @author SAGAR JAJORIYA
     */
    public function _downloadCV($id = null) {
        $this->viewClass = 'Media';
        $full_path = Router::url( "/", true ). DS . 'app/webroot/files' . DS.'job/cv_upload';
        $cvData = $this->Job->find('first', array(
            'conditions' => array(
                'Job.id' => $id)));
        // Download app/outside_webroot_dir/example.zip
        $params = array(
            'id'        => '',
            'name'      => $cvData['Job']['cv_upload'],
            'download'  => true,
            'extension' => array('doc', 'pdf', 'docx'),
            'path'      => $full_path.'/'.$cvData['Job']['id'].'/'.$cvData['Job']['cv_upload']
        );
        $this->set($params);
    }

}
