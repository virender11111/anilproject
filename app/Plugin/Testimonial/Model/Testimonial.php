<?php

class Testimonial extends AppModel {

    var $validate = array(
        'title' => array(
            'rule' => 'notEmpty',
            'message' => 'notEmpty'
        ),
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'notEmpty'
        ),
        'description' => array(
            'rule' => 'notEmpty',
            'message' => 'notEmpty'
        )
    );

    /**
     * Behaviors used by the Model
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
                'uploadFileNameMaxSize' => 250,
            )
        )
    );

}

?>
