<?php

/**
 * City
 *
 * PHP version 5
 *
 * @category Model
 * @package  AG
 * @version  1.0
 * @author   Apurav gaur
 */
class Category extends AppModel {

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'Category';

    /**
     * Model associations: belongsTo
     *
     * @var array
     * @access public
     */
    /**
     * Validation
     *
     * @var array
     * @access public
     */
    public $validate = array(
        /*'state_id' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank.',
            ),
        ),*/
        'name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank.',
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'City already in use.',
                'last' => true,
            ),
        )
    );

    // all city list
    public function allCities($stateId = NULL) {

        $conditions = array();

        $conditions = array('Category.status' => 1);

        return $this->find('list', array('conditions' => $conditions, 'order' => 'Category.id ASC'));
    }



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
