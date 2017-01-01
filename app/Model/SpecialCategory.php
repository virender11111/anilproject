<?php

/**
 * Page
 *
 * PHP version 5
 * Virender Kumar Saini
 *
 */
class SpecialCategory extends AppModel {

	
	
    /**
     * Validation rules
     *
     * @var array 
     */
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.',
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 255),
                'message' => 'This field must be no larger than 128 characters long.'
            ),
        ),
    		
    );

    public function process($data) {
    	$action = $data[$this->name]['action'];
    	return $this->$action($data[$this->name]['id']);
    }
    /**
     *file rename function
     *
     * @param array $options
     * @return boolean
     */
    public function rename_upload_file($field, $currentName,$data, $options = array() ){
    	$ext = pathinfo($currentName);
    	$ext = $ext['extension'];
    	return md5(rand()).time().'.'.$ext;
    }
}
