<?php

/**
 * Page
 *
 * PHP version 5
 * Virender Kumar Saini
 *
 */
class Service extends AppModel {

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
        'image' => array(
            'rule1' => array(
                'rule' => array('extension',array('jpg','jpeg','png')),
                'required' => false,
                'allowEmpty' => false,
                'message' => 'file should be jpg, jpeg and png'
            ),
            'rule2' => array(
                'rule' => 'checkImageSize',
                'message' => 'Image size should be 90x90 px'
            )
        ),
        'short_description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be left blank.',
			),
			'maxlength' => array(
				'rule' => array('maxlength', 500),
				'message' => 'This field must be no larger than 500 characters long.'
			),
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

    public function checkImageSize($data = array()) {
        $dimension = getimagesize($data["image"]["tmp_name"]);
        if($dimension[0] == 90 && $dimension[1] == 90) {
            return true;
        }
        return false;
    }
}
