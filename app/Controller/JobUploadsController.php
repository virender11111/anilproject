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
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/Jobs-controller.html
 */
class JobUploadsController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'JobUploads';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('JobUpload');
    public $layout = 'home';

    
    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        $this->set('modelClass', $this->modelClass);

        if ($this->request->is('ajax')) {
            //$this->layout = 'ajax';
        }
    }

    /**
     * index
     *
     * @return void
     * @access public 
     */
    public function index() { 
        
    }

    /**
     * Admin index
     *
     * @return void
     * @access public 
     */
    public function admin_index() {
        $title_for_layout = __('manage', Inflector::humanize(Inflector::underscore("jobs")));
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
        $this->paginate = array('conditions' => $conditions, 'order' => array('JobUpload.id' => 'DESC'));

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
        $title_for_layout = __('add', Inflector::humanize(Inflector::underscore("jobs")));
        if (!empty($this->request->data)) {
        
            if ($this->JobUpload->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', 'Job'), 'message', array('class' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', 'Job'), 'message', array('class' => 'danger'), 'admin');
            }
        }
        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin edit
     *
     * @return void
     * @access public 
     */
    public function admin_edit($id = null) {
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore("jobs")));
        $this->JobUpload->id = $id;
        if (!$this->JobUpload->exists())
            throw new NotFoundException(__(''));
        $this->set('title_for_layout', __('Edit Jobs'));
        $this->set('title', __('Job <small> Edit Job</small>'));
        if ($this->request->is('post')) {
            $this->request->data['JobUpload']['id'] = $id;
           
            if ($this->JobUpload->saveAll($this->request->data)) {
                
                $this->Session->setFlash(__('saved', 'Job'), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', 'Job'), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->JobUpload->read(null, $id);
        }
        $this->set(compact('title_for_layout'));
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
        if ($this->JobUpload->delete($id)) {
            $this->Session->setFlash(__('deleted', 'Job'), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', 'Job'), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }
}
