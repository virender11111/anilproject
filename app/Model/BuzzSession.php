<?php

/**
 * BuzzSession
 *
 * PHP version 5
 *
 * @category Model
 * @package  Frontier
 * @version  1.0
 * @author   Sagar Jajoriya
 */
class BuzzSession extends AppModel {

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'BuzzSession';

    /**
     * Attach Behaviors
     *
     * @var string
     * @access public
     */
    public $actsAs = array(
        'Containable',
        'Upload.Upload' => array(
            'image' => array(
                'deleteFolderOnDelete' => true,
                'deleteOnUpdate' => true,
                'renameFile' => true,
                'renameWith' => 'name',
                'uploadFileNameMaxSize' => 1000,
            ),
        ),
    );

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
    public $belongsTo = array();

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
        'title' => array(
            'rule' => 'notEmpty',
            'message' => 'notEmpty'
        ),
        'image' => array(
            // 'allowEmpty' => false,
            // 'rule' => array(
            //     'extension',
            //     array('jpeg', 'png', 'jpg')
            // ),
            // 'message' => 'Please supply a valid image.',
        ),
        'description' => array(
            'rule' => 'notEmpty',
            'message' => 'notEmpty'
        ),
    );

}
