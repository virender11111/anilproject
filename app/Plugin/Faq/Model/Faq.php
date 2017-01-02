<?php

class Faq extends AppModel {

    public $belongsTo = 'FaqCategory';
    var $validate = array(
        'faq_category_id' => array(
            'rule' => 'notEmpty',
            'message' => 'notEmpty'
        ),
        'question' => array(
            'rule' => 'notEmpty',
            'message' => 'notEmpty'
        ),
        'description' => array(
            'rule' => 'notEmpty',
            'message' => 'notEmpty'
        )
    );

    public function CheckFaqExists($id = null) {
        return $this->find('count', array('conditions' => array('faq_category_id' => $id)));
    }

}

?>
