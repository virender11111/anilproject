<?php

/**
 * ColorName Helper
 *
 * PHP version 5
 *
 * @category Helper
 * @author  Vineet

 */
class ColorNameHelper extends AppHelper {

    /**
     * Other helpers used by this helper
     *
     * @var array
     * @access public
     */
    public $helpers = array(
        'Html',
    );

    public function themes($id = null) {
        $arrayThemes = array();
        $arrayThemes[1] = array('name' => 'green', 'label' => 'Green');
        $arrayThemes[2] = array('name' => 'navy', 'label' => 'Navy');
        $arrayThemes[3] = array('name' => 'orange', 'label' => 'Orange');
        $arrayThemes[4] = array('name' => 'red', 'label' => 'Red');
        $arrayThemes[5] = array('name' => 'purple', 'label' => 'Purple');
        $arrayThemes[6] = array('name' => 'blue', 'label' => 'Blue');
        $arrayThemes[7] = array('name' => 'mint', 'label' => 'Mint');
        $arrayThemes[8] = array('name' => 'gold', 'label' => 'Gold');
        $arrayThemes[9] = array('name' => 'pink', 'label' => 'Pink');
        $arrayThemes[10] = array('name' => 'brown', 'label' => 'Brown');
        $arrayThemes[11] = array('name' => 'black', 'label' => 'Black');
        if (!empty($id))
            return $arrayThemes[$id];

        return $arrayThemes;
    }
	
	
	

}
