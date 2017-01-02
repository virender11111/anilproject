<?php

/**
 * Users Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class DashboardController extends AppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Dashboard';

    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
    }

    /**
     * Admin index
     *
     * @return void
     * @access public
     */
    public function admin_index() {
        $title_for_layout = __('', Inflector::humanize(Inflector::underscore($this->modelClass)));
        //$this->set('title_for_layout', __('Dashbaord'));
        $this->set(compact('title_for_layout'));
        $this->set('title', __('Dashboard'));
    }

  
}
