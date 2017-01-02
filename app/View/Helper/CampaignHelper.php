<?php

/**
 * Campaign Helper class file.
 *
  */
App::uses('Helper', 'View');

class CampaignHelper extends Helper {

    var $helpers = array('Html', 'Image');


    /**
     * Format product data by color
     *
     * @var array
     * @access public
     * @author Vineet
     */
    public function formatProByColor($data) {
       
	  $newData = array();
	  $i= 0;
	   foreach($data as $value)
	   {
		  
		   foreach($value['Color'] as $val)
		   {
			
			   $newData[$i]['Color'] = $val;
			   unset($value['Color']);
			   $newData[$i]['Product'] = $value;
			 $i++;
		   }
		   
		   
	   }
	   
	   return $newData;
    }

   
    
}
