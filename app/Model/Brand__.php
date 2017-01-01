<?php

/**
 * Brand
 *
 * PHP version 5
 * Virender Kumar Saini
 *
 */
class Brand extends AppModel {

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
                            //'mimetypes' => array( 'application/pdf','application/postscript'),
                            'renameFile' => true,
                            'renameWith' => 'name',
                            'uploadFileNameMaxSize' => 250,
                            'nameCallback' => 'rename_upload_file'
                    )
            )
    );
 
    
    public $hasMany = array();

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
    /**
     * beforeSave
     *
     * @param array $options
     * @return boolean
     */

    

}
