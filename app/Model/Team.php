<?php

/**
 * Page
 *
 * PHP version 5
 * Virender Kumar Saini
 *
 */
class Team extends AppModel {

    /**
     * Model associations: hasOne
     *
     * @var array
     * @access public
     */
    public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
                'deleteFolderOnDelete' => true,
                'deleteOnUpdate' => true,
                'renameFile' => true,
                'renameWith' => 'name',
               // 'uploadFileNameMaxSize' => 250,
                'nameCallback' => 'rename_upload_file'
            )
        )
    );
 
    
    public $hasMany = array('TeamMember');

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
        ),
        'image' => array(
            'rule1' => array(
                'rule' => array('extension',array('jpg','jpeg','png')),
                'required' => false,
                'allowEmpty' => false,
                'message' => 'file should be jpg, jpeg and png'
            ),
          /*  'rule2' => array(
                'rule' => 'checkImageSize',
                'message' => 'Image size should be 250x250 px'
            )*/
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

    public function checkImageSize($data = array()) {
        $dimension = getimagesize($data["image"]["tmp_name"]);
        if($dimension[0] == 236 && $dimension[1] == 236) {
            return true;
        }
        return false;
    }
}
