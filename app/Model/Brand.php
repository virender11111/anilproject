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
class Brand extends AppModel {
    
    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'Brand';

    /**
     * Attach Behaviors
     *
     * @var string
     * @access public
     */
    public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
                'deleteFolderOnDelete' => true,
                'deleteOnUpdate' => true,
                'renameFile' => true,
                'renameWith' => 'name',
                'uploadFileNameMaxSize' => 1000,
                'nameCallback' => 'rename_upload_file'
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
        'image' => array(
                'rule' => array('extension',array('jpg','jpeg','png')),
                'required' => false,
                'allowEmpty' => false,
                'message' => 'file should be jpg, jpeg and png'
        ),
    );

   /* public function checkImageSize($data = array()) {
        if(!empty($data["image"]["name"])) {
            $dimension = getimagesize($data["image"]["tmp_name"]);
            if($dimension[0] == 184 && $dimension[1] == 84) {
                return true;
            }
            return false;    
        }
        return true;
        
    }*/
public function rename_upload_file($field, $currentName,$data, $options = array() ){
     $ext = pathinfo($currentName);
     $ext = $ext['extension'];
     return md5(rand()).time().'.'.$ext;
    }
}
