<?php

/**
 * Page
 *
 * PHP version 5
 * Virender Kumar Saini
 *
 */
class Testimonial extends AppModel {

    /**
     * Model associations: hasOne
     *
     * @var array
     * @access public
     */
	
	
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
    		),
        'feedback' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.',
            ),
        ),
    );
   
    

}
