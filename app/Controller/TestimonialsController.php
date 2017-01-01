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
class TestimonialsController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Testimonials';

    public $uses = array('Testimonial');
    
    
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
    }

    /**
     * admin_index
     *
     * @return void
     * @access admin
     */
    public function admin_index() { 
        $title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));        
        $conditions = null;        
        $this->paginate = array('conditions' => $conditions, 'order' => array('Testimonial.id' => 'DESC'));
        try {
            $this->set('listAll', $this->paginate());                    
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }
        $this->set(compact('title_for_layout'));
    }

    /**
     * admin_add
     *
     * @return void
     * @access admin
     */
    public function admin_add() { 
        $title_for_layout = __('add', Inflector::humanize(Inflector::underscore($this->modelClass)));
        if (!empty($this->request->data)) {
            if ($this->Testimonial->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        }
        $this->set(compact('title_for_layout'));
    }

    /**
     * admin_edit
     *
     * @return void
     * @access admin
     */
    public function admin_edit($id = null) {
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $this->Testimonial->id = $id;
        if (!$this->Testimonial->exists())
            throw new NotFoundException(__(''));
        if ($this->request->is('post')) {
            $this->request->data['Testimonial']['id'] = $id;
           
            if ($this->Testimonial->saveAll($this->request->data)) {
                
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->Testimonial->read(null, $id);
        }
        $this->set(compact('title_for_layout'));
        $this->render('admin_add');
    }

    /**
     * admin_delete
     *
     * @return void
     * @access admin
     */
    public function admin_delete($id = null) { 
        if ($this->Testimonial->delete($id)) {
            $this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }
}
