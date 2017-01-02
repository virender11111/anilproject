<?php

/**
 * State
 *
 * PHP version 5
 *
 * @category Model
 * @package  AG
 * @version  1.0
 * @author   Apurav gaur
 */
class Country extends AppModel {

    var $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter state',
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'State already in use.',
                'last' => true,
            ),
        ),
    );

    public function stateList() {
        return $this->find('list', array('fields' => array('Country.id', 'Country.name'), 'conditions' => array('Country.status' => 1), 'order' => 'id asc'));
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
