<?php

/**
 * Image Helper class file.
 *
 * Simplifies the construction of Image elements.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Helper
 * @since         CakePHP(tm) v 0.9.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Html Helper class for easy use of HTML widgets.
 *
 * HtmlHelper encloses all methods needed while working with HTML pages.
 *
 * @package       Cake.View.Helper
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
App::uses('Helper', 'View');

class FrontHelper extends Helper {

    var $helpers = array('Html', 'Image');

    /**
     * Creates a formatted IMG element.
     *
     * This method will set an empty alt attribute if one is not supplied.
     *
     * ### Usage:
     *
     * Create a regular image:
     *
     * `echo $this->Html->image('cake_icon.png', array('alt' => 'CakePHP'));`
     *
     * Create an image link:
     *
     * `echo $this->Html->image('cake_icon.png', array('alt' => 'CakePHP', 'url' => 'http://cakephp.org'));`
     *
     * ### Options:
     *
     * - `url` If provided an image link will be generated and the link will point at
     *   `$options['url']`.
     * - `fullBase` If true the src attribute will get a full address for the image file.
     * - `plugin` False value will prevent parsing path as a plugin
     *
     * @param string $path Path to the image file, relative to the app/webroot/img/ directory.
     * @param array $options Array of HTML attributes. See above for special options.
     * @return string completed img tag
     * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html#HtmlHelper::image
     */
    public function getCampaignStatus($campaigns = array(), $key = null) {
        $i = 0;
        switch ($key) {
            case "success":
                foreach ($campaigns as $ca) {
                    if ($ca["Campaign"]["end_date"] == date("Y-m-d h:i:s", time())) {
                        ++$i;
                    }
                }
                return $i;
                break;
            case "unsuccess":
                foreach ($campaigns as $ca) {
                    if ($ca["Campaign"]["end_date"] < date("Y-m-d h:i:s", time())) {
                        ++$i;
                    }
                }
                return $i;
                break;
            case "running":
                foreach ($campaigns as $ca) {

                    if ($ca["Campaign"]["end_date"] > date("Y-m-d h:i:s", time())) {
                        ++$i;
                    }
                }
                return $i;
                break;

            default:
                break;
        }
    }
    
    public function getPageList()
	{
		$data = ClassRegistry::init('Page')->find('all',array('fields'=>array('id','title','slug'),'conditions'=>array('Page.status'=>1)));
		return $data;
	}

}
