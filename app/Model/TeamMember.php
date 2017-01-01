<?php

/**
 * Page
 *
 * PHP version 5
 * Virender Kumar Saini
 *
 */
class TeamMember extends AppModel {

    /**
     * Model associations: hasOne
     *
     * @var array
     * @access public
     */
	
	public $actsAs = array(
		'Upload.Upload' => array(
			'picture' => array(
				'deleteFolderOnDelete' => true,
				'deleteOnUpdate' => true,
				'renameFile' => true,
				'renameWith' => 'name',
				'uploadFileNameMaxSize' => 250,
				'nameCallback' => 'rename_upload_file'
			)
		)
	);
   public $belongsTo = array('Team');
    /*
    public $hasMany = array();
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
            'image' => array(
                'rule1' => array(
                    'rule' => array('extension',array('jpg','jpeg','png')),
                    'required' => false,
                    'allowEmpty' => false,
                    'message' => 'file should be jpg, jpeg and png'
                ),
                // 'rule2' => array(
                //     'rule' => 'checkImageSize',
                //     'message' => 'Image size should be 250x250 px'
                // )
            ),
            'description' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => 'This field cannot be left blank.',
                ),
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

    // public function checkImageSize($data = array()) {
    //     $dimension = getimagesize($data["image"]["tmp_name"]);
    //     if($dimension[0] == 250 && $dimension[1] == 250) {
    //         return true;
    //     }
    //     return false;
    // }

    public function checkRequestStatus($data) {
        //pr($this->data['Job']['request']); die;
      /*if($this->data['Job']['request'] == 1) {
          if(empty($this->data['Job']['phone'])) {
              return __('Please enter your mobile number.');
          }
      }
      return true;*/
        // if ($this->data['User']['new_password'] != $data['repeat_password']) {
        //     return __('Password not match.');
        // }
        // return true;
    }

    

}
