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

class UserHelper extends Helper {

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

    /**
     * Show User's Image
     *
     * @var array
     * @access public
     * @author Vineet
     */
    public function img($user, $width = 200, $height = 150, $ratio = false) {
        return $this->Image->img('user/image/' . $user["User"]["id"] . '/' . $user["User"]["image"], $width, $height, array(), 'no-image.gif', $ratio);
    }

    /**
     * Manage User's Experience Dates
     *
     * @var array
     * @access public
     * @author Vineet
     */
    public function manage_user_experience_date($start_date = null, $end_date = null, $format = "F Y") {
        $start_date_ = new DateTime($start_date);
        $end_date_ = new DateTime($end_date);

        $end_date__ = $end_date_->format($format);
        $start_date__ = $start_date_->format($format);

        if (is_null($end_date) || $end_date == date("Y-m-d")) {
            return $start_date__ . " - Present";
        } else {
            return $start_date__ . " - " . $end_date__;
        }
    }
    
}
