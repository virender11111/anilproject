<?php
/**
 * BlogPostCategory Model
 *
 * @author Neil Crookes <neil@crook.es>
 * @link http://www.neilcrookes.com http://neil.crook.es
 * @copyright (c) 2011 Neil Crookes
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */
class BlogPostComment extends AppModel {

  public $actsAs = array(
      
  );


/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'email' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty',
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'validemail',
                'last' => true,
            ),
        ),
    'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.',
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 255),
                'message' => 'This field must be no larger than 128 characters long.'
            ),
        ),
    'comment' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'This field cannot be left blank.',
            ),
      )
    
  );

}
