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
        $this->Auth->allow('enquery', 'quick_enquiry', 'quick_enquiry_modal', 'enquiry_modal');
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
		$title_for_layout = __('manage', Inflector::pluralize($this->modelClass));
        $this->Job->recursive = 1;

        $conditions = null;
        
        $this->paginate = array('conditions' => $conditions, 'order' => array('Job.id' => 'DESC'));

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
        $title_for_layout = __('edit', $this->modelClass);
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
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
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
            $this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
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
                
                $this->Session->setFlash(__('', $this->modelClass), 'message', array('class' => 'success'));
            } else {
                
                $_SESSION['errors'] = $this->Job->validationErrors;
                $_SESSION['lastData'] = $this->request->data['Job'];
                $this->Session->setFlash(__('Error found. Please try again.', $this->modelClass), 'message', array('class' => 'danger'));
            }
        }
        $this->redirect($this->referer());
    
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
