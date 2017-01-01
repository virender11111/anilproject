<?php

/**
 * Page
 *
 * PHP version 5
 * Virender Kumar Saini
 *
 */
class Page extends AppModel {
	public $actsAs = array(
		'Upload.Upload' => array(
			'banner_image' => array(
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
     * Model associations: hasOne
     *
     * @var array
     * @access public
     */
    public $hasOne = array(
        'Meta' => array(
            'dependent' => true,
            'foreignKey' => 'foreign_key',
            'conditions' => array('Meta.model' => 'Page')
        ),
        'SiteRoute' => array(
            'dependent' => true,
            'foreignKey' => 'foreign_key',
            'conditions' => array('SiteRoute.model' => 'Page')
        )
    );
    public $hasMany = array('Faq');

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
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.',
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 64),
                'message' => 'This field must be no larger than 64 characters long.'
            ),
            'isunique' => array(
                'rule' => array('isUnique'),
                'message' => 'Seo URL has already been taken.Please type another.',
            ),
        ),
        'banner_image' => array(
            'validateDimension' => array(
                'rule' => 'checkBannerSize',
                'message' => 'Banner size should be 1286x446 px'
            ),
            'allowEmpty' => true
        )
    );

    /**
     * beforeSave
     *
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {

        if (!empty($this->data['SiteRoute']['slug'])) {

            $this->data['Page']['slug'] = strtolower(Inflector::slug($this->data['SiteRoute']['slug'], '-'));
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
    public function rename_upload_file($field, $currentName,$data, $options = array() ){
    	$ext = pathinfo($currentName);
    	$ext = $ext['extension'];
    	return md5(rand()).time().'.'.$ext;
    }

    public function pages_list() {
        $pages = $this->find('list', array(
            'fields' => array(
                'id',
                'title'),
            'conditions' => array('status' => 1)));
        return $pages;
    }

    public function checkBannerSize($data = array()) {
        if(!empty($data["banner_image"]["name"])) {
            $dimension = getimagesize($data["banner_image"]["tmp_name"]);
            if($dimension[0] == 1286 && $dimension[1] == 446) {
                return true;
            }
            return false;    
        }
        return true;
    }
}
