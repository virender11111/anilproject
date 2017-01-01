<?php
App::uses('File', 'Utility');

/**
 * Faq
 *
 * PHP version 5
 *
 * @category Model
 * @package  Frontier
 * @version  1.0
 * @author   Sagar Jajoriya
 */
class Faq extends AppModel {

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'Faq';

    /**
     * Attach Behaviors
     *
     * @var string
     * @access public
     */
    public $actsAs = array();

    /**
     * Model associations: hasOne
     *
     * @var array
     * @access public
     */
    public $hasOne = array();

    /**
     * Model associations: belongsTo
     *
     * @var array
     * @access public
     */
    public $belongsTo = array("Page");

    /**
     * Model associations: hasMany
     *
     * @var array
     * @access public
     */
    public $hasMany = array();

    /**
     * Validation
     *
     * @var array
     * @access public
     */
    public $validate = array(
        'question' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            )
        ),
        'description' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            )
        ),
        'page_id' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            )
        ),
    );

}
