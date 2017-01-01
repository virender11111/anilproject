<?php

/**
 * Page
 *
 * PHP version 5
 * Virender Kumar Saini
 *
 */
class Job extends AppModel {

    /**
     * Model associations: hasOne
     *
     * @var array
     * @access public
     */	
	public $actsAs = array(
		'Containable',
		'Upload.Upload' => array(
			'cv_upload' => array(
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
    public $belongsTo = array('JobCategory');
    
    /**
     * Validation rules
     *
     * @var array 
     */
    public $validate = array(
		'job_category_id' => array(
			'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'This field cannot be left blank.',
			),
			'maxlength' => array(
					'rule' => array('maxlength', 255),
					'message' => 'This field must be no larger than 128 characters long.'
			),
		),
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
        'phone' => array(
            'rule' => 'numeric',
            'allowEmpty' => true, //validate only if not empty
            'message'=>'Phone number should be numeric'
        ),
        // 'phone' => array(
        //     'check' => array(
        //         'rule' => array('checkRequestStatus'),
        //         'message' => ''
        //     )
        // ),
        'email' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'validemail',
                'last' => true,
            )
        ),
    	'g-recaptcha-response' => array(
			'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Captcha could not be verify.',
			),
    	),	
    	'cv_upload' => array(
			'rule' => array('extension',array('pdf','docx','doc')),
			'required' => false,
			'allowEmpty' => true,
			'message' => 'File should be pdf, doc or docx'
    	),
    );
    
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
    

    public function checkRequestStatus($data) {
        if($this->data['Job']['request'] == 1) {
            if(empty($this->data['Job']['phone'])) {
                return __('Please enter your mobile number.');
            }
        }
        return true;
    }

    

}
