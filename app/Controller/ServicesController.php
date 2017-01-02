<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ServicesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Services';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('Service');
    public $layout = 'default';

    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('service_detail');
        $this->set('modelClass', $this->modelClass);

        $this->loadModel('JobCategory');
        $data = $this->JobCategory->find('list');
        $this->set('data', $data);
    }

    public function view($slug) {
        $this->layout = 'home';

        $page = $this->Page->find('first', array(
            'conditions' => array(
                'Page.status' => 1, 
                'Page.slug' => $slug)
            )
        );
        if (empty($page)) {
            throw new NotFoundException('404 error.');
        }
        $this->set('pages', $page);
    }
    public function service_detail($id){
    	$services = $this->Service->find('first',array(
    			'conditions'=>array('Service.id'=>$id,'Service.status'=>1)
    	));
    	$page_details = array();
    	$page_details['Meta']['title']='Service Detail';
    	$page_details['Meta']['description']='';
    	$page_details['Meta']['keywords']='';
    	$this->set(compact('services', 'page_details'));
    }

    public function home() { // Base path method

    }

    public function changeLanguage($lng) { // Change language method
        if (isset($this->availableLanguages[$lng])) { // If we support this language (see /app/Config/global.php)
            parent::setLang($lng); // call setLang() from AppController
            $this->Session->setFlash(__('The language has been changed to %s', $this->availableLanguages[$lng])); // Send a success flash message
        } else {
            throw new NotFoundException(__('Language %s is not supported', $lng)); // Throw a not found exception
        }

        $this->redirect($this->referer()); // redirect the user to the last page (referer)
    }

    /**
     * Admin index
     *
     * @return void
     * @access public
     */
    public function admin_index() {
    	
    	$title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));
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
    
    	if (!empty($searchData['title'])) {
    		$conditions[] = $this->modelClass . '.title ="' . $searchData['title'] . '"';
    	}
    	if (!empty($searchData['status']) && $searchData['status'] == 'active') {
    		$conditions[] = $this->modelClass . '.status = 1';
    	}
    	if (!empty($searchData['status']) && $searchData['status'] == 'deactive') {
    		$conditions[] = $this->modelClass . '.status = 0';
    	}
    	$this->paginate = array(
    			'conditions' => $conditions,
    			'group' => 'Service.id',
    			'order' => array('Service.id' => 'DESC')
    	);
    	
    	// Handle out of exception
    	try {
    		$data = $this->paginate('Service');
    	} catch (NotFoundException $e) {
    		$this->outOfPageRangeRedirect(array('action' => 'index'));
    	}
    	
    	$this->set('listAll', $data);
    	
    	$this->set(compact('title_for_layout'));
    }

    /**
     * Admin add
     *
     * @return void
     * @access public
     */
    public function admin_add() {
    	
        $title_for_layout = __('add', $this->modelClass);
        if (!empty($this->request->data)) {
   
            if ($this->Service->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
            $service_id = '';
        }
        $this->set(compact('title_for_layout','service_id'));
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
        $title_for_layout = __('edit', $this->modelClass);
        $this->Service->id = $id;
        if (!$this->Service->exists())
            throw new NotFoundException(__(''));
        $this->set('title_for_layout', __('Edit Service'));
        $this->set('title', __('Service <small> Edit Service</small>'));
        if ($this->request->is('post')) {
        	if(empty($this->request->data['Service']['image']['name'])){
        		unset($this->request->data['Service']['image']);
        	}
        	 $this->request->data['Service']['id'] = $id;
            if ($this->Service->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->Service->read(null, $id);
        }
        $service_id = $id;
        $this->set(compact('title_for_layout','service_id'));
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
        if ($this->Service->delete($id)) {
            $this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }

    /**
     * Show career center page 
     *
     * @param null
     * @return void
     * @access public
     */
 public function admin_process() {
        if (!$this->request->is('post')) {
            $this->Session->setFlash(__('invalidAccess.'), 'admin/error', array(), 'admin');
            $this->redirect(array('action' => 'index'));
        }
        if (empty($this->request->data[$this->modelClass]['action'])) {
            $this->Session->setFlash(__('selectoption'), 'message', array('class' => 'danger'), 'admin');
            $this->redirect($this->referer());
        }
        if (empty($this->request->data[$this->modelClass]['id'])) {
            $this->Session->setFlash(__('notSelected', Inflector::pluralize($this->modelClass)), 'message', array('class' => 'danger'), 'admin');
            $this->redirect($this->referer());
        }

        if ($message = $this->Service->process($this->request->data)) {
            if ($message == 1) {
                $message = 'Selected ' . Inflector::pluralize($this->modelClass) . ' Deleted Successfully.';
            }
            $this->Session->setFlash(__($message), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('operationnotdone'), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }

}
