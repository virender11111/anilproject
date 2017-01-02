<?php

/**
 * Page
 *
 * PHP version 5
 * Virender Kumar Saini
 *
 */
class SpecialService extends AppModel {

	
	public $actsAs = array(
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
	
	public $belongsTo = array('SpecialCategory');
    /**
     * Validation rules
     *
     * @var array 
     */
    public $validate = array(
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.',
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 255),
                'message' => 'This field must be no larger than 128 characters long.'
            ),
        ),
    		'slug' => array(
    				'notEmpty' => array(
    						'rule' => 'notEmpty',
    						'message' => 'Please enter a slug',
    						'required' => false,
    						'allowEmpty' => false,
    						'on' => null,
    						'last' => true,
    				),
    				'regex0' => array(
    						'rule' => '/^[a-z0-9\_\-]*$/i',
    						'message' => 'Please enter a valid slug',
    						'required' => false,
    						'allowEmpty' => false,
    						'on' => null,
    						'last' => true,
    				),
    				'isUnique' => array(
    						'rule' => 'isUnique',
    						'message' => 'This slug is already in use',
    				),
    		),
    		'image' => array(
    				'rule' => array('extension',array('gif','jpg','jpeg','png')),
    				'required' => false,
    				'allowEmpty' => false,
    				'message' => 'file should be gif,jpg,jpeg and png'
    		),
    		
    		'description' => array(
    				'notempty' => array(
    						'rule' => array('notempty'),
    						'message' => 'This field cannot be left blank.',
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
