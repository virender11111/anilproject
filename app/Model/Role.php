<?php

/**
 * Role
 *
 * PHP version 5
 *
 * @category Model
 * @package  Frontier
 * @version  1.0
 * @author   Beera the X code
 */
class Role extends AppModel {
	public $useTable = 'roles';
    /**
     * The name of the DataSource connection that this Model uses
     *
     * The value must be an attribute name that you defined in `app/Config/database.php`
     *
     * @var string
     */
    // public $useDbConfig = 'test';

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'Role';

    /**
     * Model associations: hasOne
     *
     * @var array
     * @access public
     */
    //public $hasOne = array();

    /**
     * Model associations: hasMany
     *
     * @var array
     * @access public
     */
    //public $hasMany = array();

    /**
     * Model associations: belongsTo
     *
     * @var array
     * @access public
     */
   // public $belongsTo = array();

    
    
    
    public $actsAs = array(
    		'Acl' => array('type' => 'requester')
    );
    public function parentNode() {
    	return null;
    }
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
            )
        ),
        'alias' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            )
        ),
    );

    /**
     * Behaviors used by the Model
     *
     * @var array
     * @access public
     */


}
