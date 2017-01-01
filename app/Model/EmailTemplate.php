<?php

/**
 * Role
 *
 * PHP version 5
 *
 * @category Model
 * @package  PS
 * @version  1.0
 * @author   Vineet
 */
class EmailTemplate extends AppModel {

    /**
     * Display Fields
     *
     * @var array
     * @access public
     */
    public $displayField = 'name';

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'EmailTemplate';

    /**
     * Validation
     *
     * @var array
     * @access public
     */
    public $validate = array(
        'title' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            ),
        ),
        'subject' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            ),
        ),
        'from' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            ),
        ),
        'message' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            ),
        ),
    );

}
