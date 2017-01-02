<?php

/**
 * Users Controller
 *
 * PHP version 5
 *
 * @category Controller
 *  Developer - Apurav Gaur
 */
App::uses('AppController', 'Controller');

class HomesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Homes';

    /**
     * Components
     *
     * @var array
     * @access public
     */
    public $components = array(
        'Email'
    );

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('User');
    public $layout = 'home';

    /**
     * Helpers used by the Controller
     *
     * @var array
     * @access public
     */
    public $helpers = array('Layout');

    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('index', 'features');
    }

    /**
     * beforeRender
     *
     * @return void
     * @access public
     */
    public function beforeRender() {
        parent::beforeRender();
        $this->set('modelClass', $this->modelClass);
    }

    public function index() {
        $title_for_layout = 'Add User';
        $title = 'Add User';
        $this->set(compact('title', 'title_for_layout', 'testimonials'));
    }

    public function features() {
        
    }

}
