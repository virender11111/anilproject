<?php

/**
 * Ajax Controller.
 * @uses  This controller used to all ajax request
 * PHP 5.4
 * @author Prakash Saini
 * 
 */
App::uses('AppController', 'Controller');

class AjaxController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Ajax';

    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        
    }
    
    /**
     * Admin ShowstateList
     *
     * @return void
     * @access public
     */
    public function showStatelist() {

        if ($this->request->is('post')) {
            $response['flag'] = false;
            $this->loadModel('StateGeography');
            $list = $this->StateGeography->StateList($this->request->data['CountryId']);
            if ($list) {
                $response['flag'] = true;
                $response['StateGeography'] = $list;
            }  
           // pr($list); die;
            echo json_encode($response);
            die;
        }
    }
    
    public function showCitylist() {

        if ($this->request->is('post')) {
            $response['flag'] = false;
            $this->loadModel('City');
            $list = $this->City->CityList($this->request->data['StateId']);
            if ($list) {
                $response['flag'] = true;
                $response['City'] = $list;
            }
           // pr($list); die;
            echo json_encode($response);
            die;
        }
    }

}
