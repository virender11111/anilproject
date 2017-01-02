<?php

class FaqCategory extends AppModel {
    /* This is validation rule for ppc add form */

    var $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'notEmpty'
        )
    );

    public function faqCatList() {
        return $this->find('list', array('order' => 'id desc', 'conditions' => array('status' => '1')));
    }
   
}

?>
