<?php
/**
 * Brand
 *
 * PHP version 5
 *
 * @category Model
 * @package  Frontier
 * @version  1.0
 * @author   Sagar Jajoriya
 */
class BlogPostComment extends AppModel {

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'BlogPostComment';

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
    public $belongsTo = array('BlogPost');

    /**
     * Model associations: hasMany
     *
     * @var array
     * @access public
     */
    public $hasMany = array();

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'email' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'validemail',
                'last' => true,
            ),
        ),
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.',
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 255),
                'message' => 'This field must be no larger than 255 characters long.'
            ),
        ),
        'comment' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.',
            ),
        )
    );

}
