<?php

/**
 * Page
 *
 * PHP version 5
 * Virender Kumar Saini
 *
 */
class JobCategory extends AppModel {

    /**
     * Model associations: hasOne
     *
     * @var array
     * @access public
     */
  /*  public $hasOne = array(
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
    );*/
  //  public $belongsTo = array('Job');

    /**
     * Validation rules
     *
     * @var array 
     */
   

    /**
     * beforeSave
     *
     * @param array $options
     * @return boolean
     */


    public function job_categories() {
        $data = $this->find('list', array());
        return $data;
    }
  

}
