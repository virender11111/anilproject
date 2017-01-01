<?php

App::uses('AuthComponent', 'Controller/Component');

/**
 * User
 *
 * PHP version 5
 *
 * @category Model
 * @package  PS
 * @version  1.0
 * @author   Virender kumar Saini
 */
class User extends AppModel {
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
    public $name = 'User';

    /**
     * virtualFields
     *
     * @var string
     * @access public
     */
    public $virtualFields = array(
        'full_name' => 'CONCAT(User.fname, " ", User.lname)',
        'name' => 'CONCAT(User.fname, " ", User.lname)'
    );

    /**
     * Order
     *
     * @var string
     * @access public
     */
    public $order = 'User.fname ASC,User.lname ASC';

    /**
     * Model associations: hasOne
     *
     * @var array
     * @access public
     */
   // public $hasOne = array('Role');

    /**
     * Model associations: hasMany
     *
     * @var array
     * @access public
     */
    public $hasMany = array(
    );

    
    
    public $actsAs = array(
    		'Acl' => array('type' => 'requester', 'enabled' => false),
    		'Containable',
    		//'Utils.SoftDelete',
    		'Upload.Upload' => array(
    				'image' => array(
    						'deleteFolderOnDelete' => true,
    						'deleteOnUpdate' => true,
    						'renameFile' => true,
    						'renameWith' => 'name',
    						'uploadFileNameMaxSize' => 250,
    						'nameCallback' => 'rename_upload_file'
    				)
    		)
    );
    
    /**
     * Model associations: belongsTo
     *
     * @var array
     * @access public
     */
    public $belongsTo = array('Role');
   // public $actsAs = array('Acl' => array('type' => 'requester'));
    public function parentNode() {
    	if (!$this->id && empty($this->data)) {
    		return null;
    	}
    	if (isset($this->data['User']['role_id'])) {
    		$groupId = $this->data['User']['role_id'];
    	} else {
    		$groupId = $this->field('role_id');
    	}
    	if (!$groupId) {
    		return null;
    	}
    	return array('Role' => array('id' => $groupId));
    }

    
    public function bindNode($user) {
    	return array('model' => 'Role', 'foreign_key' => $user['User']['role_id']);
    }
    /**
     * Validation
     *
     * @var array
     * @access public
     */
    public $validate = array(
    		'role_id' => array(
    				'notEmpty' => array(
    						'rule' => 'notEmpty',
    						'message' => 'notEmpty',
    				)
    		),
        'fname' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            )
        ),
        'lname' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            )
        ),
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
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'emailExists',
                'last' => true,
            ),
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
                'last' => true,
            ),
            'rule1' => array(
                'rule' => array('minLength', 6),
                'message' => 'minLength',
            ),
        ),
        'confirm_password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank.',
                'last' => true,
            ),
            'equalTo' => array(
                'rule' => array('equalToField', 'password'),
                'message' => "Passwords do not match.",
            )
        ),
        'gender' => array(
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


    /**
     * beforeSave
     *
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {
        if (!empty($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }

    /**
     * _identical
     *
     * @param string $check
     * @return boolean
     * @deprecated Protected validation methods are no longer supported
     */
    protected function _identical($check) {
        return $this->validIdentical($check);
    }

    /**
     * validIdentical
     *
     * @param string $check
     * @return boolean
     */
    public function validIdentical($check) {
        if (!empty($this->data['User']['password']) || !empty($this->data['User']['confirm_password'])) {
            if ($this->data['User']['password'] != $check['confirm_password']) {
                return __('passwordNotMatch');
            }
            return true;
        }
        return true;
    }

    /**
     * validICurrent
     *
     * @param string $check
     * @return boolean
     */
    public function validICurrent($check) {
        pr($this->data);
        echo AuthComponent::password($this->data[$this->alias]['old_password']) . '<br>';
        pr($check) . '<br>';
        echo AuthComponent::password($check) . '<br>';
        echo $this->field('password');
        die;
        if (isset($this->data['User']['old_password'])) {

            if ((AuthComponent::password($this->data[$this->alias]['old_password'])) != $this->field('password')) {
                return __('Current Passwords do not match.');
            }
        }
        return true;
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

    public function marketTrande($table, $field, $fieldID, $userID) {
        $query = "SELECT round(AVG(sc.score),1) score, round(avg(sh.score),1) as score_hit,
            concat(round(( round(AVG(sc.score),2) - round(avg(sh.score),2)  ) * 100 / round(AVG(sc.score),2),2),' % ')  as percentage,
            IF(AVG(sc.score) > AVG(sh.score),true,false) as up FROM " . $table . " as se left join 
            scores as sc on (se.user_id = sc.user_id ) left join scores_hists as sh on (se.user_id = sh.user_id) where se." . $field . " = " . $fieldID . " and se.user_id = " . $userID . ";";
        $result = $this->query($query);
        return (!empty($result[0][0])) ? $result[0][0] : null;
    }

    // used in forgot password
    public function checkValidation() {

        $this->validate = array(
            'email' => array(
                'required' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please Enter an Email.'
                ),
                'checkemail' => array(
                    'rule' => 'email',
                    'message' => 'Please Enter valid Email.'
                ),
            )
        );
        //$this->validate();
        return true;
    }

    /**
     * userList
     *
     * @param string $check
     * @return boolean
     */
    public function userList() {
        $userList = $this->find('list', array('fields' => array('User.id', 'User.full_name'), 'conditions' => array('User.status' => 1, 'User.is_admin' => 0), "group" => "User.email", 'Order' => "User.full_name ASC"));
        return $userList;
    }

    /**
     * Get User Data
     *
     * @param string $check
     * @return boolean
     * :)
     */
    public function userData($id = null) {
        $this->recursive = 2;
        $userData = $this->find('first', array('conditions' => array('User.id' => $id)));
        return $userData;
    }

    /**
     * validICurrentSecurity
     *
     * @param string $check
     * @return boolean
     */
    public function validICurrentSecurity($check) {
        if (isset($this->data['User']['current_pass_security'])) {
            if (AuthComponent::password($this->data['User']['current_pass_security']) != $this->field('password')) {
                return __('Current Password do not match.');
            }
        }
        return true;
    }

    function equalToField($array, $field) {
        return strcmp($this->data[$this->alias][key($array)], $this->data[$this->alias][$field]) == 0;
    }

public function rename_upload_file($field, $currentName,$data, $options = array() ){
     $ext = pathinfo($currentName);
     $ext = $ext['extension'];
     return md5(rand()).time().'.'.$ext;
    }
}
