<?php

/**
 * Area
 *
 * PHP version 5
 *
 * @category Model
 * @package  AG
 * @version  1.0
 * @author   Apurav gaur
 */
class Sitelink extends AppModel {

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'Sitelink';

    /**
     * Model associations: belongsTo
     *
     * @var array
     * @access public
     */
    public $belongsTo = array(
        'Category'
    );

    /**
     * Validation
     *
     * @var array
     * @access public
     */
    public $validate = array(
        'name' => array(
           
                'rule' => 'notBlank',
                'message' => 'This field cannot be left blank.',
      
        ),
     
        'category_id' => array(
          
                'rule' => 'notBlank',
                'message' => 'This field cannot be left blank.',
            
        ),
        'url' => array(
           
                'rule' => 'url',
                'message' => 'Please fill the right url.',
     
        ),
    );

    public function process($data) {
        $action = $data[$this->name]['action'];
        return $this->$action($data[$this->name]['id']);
    }

    public function active($dataIds) {
        if ($this->updateAll(array('status' => 1), array($this->name . '.id' => $dataIds))) {
            return "Selected " . Inflector::pluralize($this->name) . " Activated Successfully.";
        }
        return false;
    }

    public function inactive($dataIds) {
        if ($this->updateAll(array('status' => 0), array($this->name . '.id' => $dataIds))) {
            return "Selected " . Inflector::pluralize($this->name) . " Deactivated Successfully.";
        }
        return false;
    }

}
