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

class ImageHelper extends Helper {

    var $helpers = array('Html');

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
    public function img($image = null, $width = 100, $height = 100, $options = array(), $noimages = "no-image.jpg", $ratio = true) {
        $thim_thumb = '&q=95';
        if ($width)
            $thim_thumb .= '&w=' . $width;

        if ($height && $ratio == false)
            $thim_thumb .= '&h=' . $height;

        if (file_exists("files/" . $image) && is_file("files/" . $image)) {
            $resized = $this->Html->image(
                    $this->webroot . 'files/timthumb.php?src=' . FULL_BASE_URL . $this->webroot . APP_DIR . DS . WEBROOT_DIR . DS . 'files/' . $image . $thim_thumb, $options
            );
        } else {
            $resized = $this->Html->image(
                    $this->webroot . 'files/timthumb.php?src=' . FULL_BASE_URL . $this->webroot . APP_DIR . DS . WEBROOT_DIR . DS . 'img/' . $noimages . $thim_thumb, $options
            );
        }
        return $resized;
    }

    public function resize($image = null, $width = 100, $height = 100, $options = array(), $noimages = "no_image_available.jpg", $ratio = true) {

        $thim_thumb = '&q=95';
        if ($width)
            $thim_thumb .= '&w=' . $width;

        if ($height && $ratio == false)
            $thim_thumb .= '&h=' . $height;

        if (file_exists("files/" . $image) && is_file("files/" . $image)) {
            $resized = $this->webroot . 'files/timthumb.php?src=' . FULL_BASE_URL . $this->webroot . APP_DIR . DS . WEBROOT_DIR . DS . 'files/' . $image . $thim_thumb;
        } else {
            $resized = $this->webroot . 'files/timthumb.php?src=' . FULL_BASE_URL . $this->webroot . APP_DIR . DS . WEBROOT_DIR . DS . 'img/' . $noimages . $thim_thumb;
        }
        return $resized;
    }

    public function getUserImage($width = 100, $height = 100, $options = array(), $noimages = "no_image_available.jpg", $ratio = true) {
//        $logged_in
        $thim_thumb = '&q=95';
        if ($width)
            $thim_thumb .= '&w=' . $width;

        if ($height && $ratio == false)
            $thim_thumb .= '&h=' . $height;

        if (file_exists("files/" . $image) && is_file("files/" . $image)) {
            $resized = $this->webroot . 'files/timthumb.php?src=' . FULL_BASE_URL . $this->webroot . APP_DIR . DS . WEBROOT_DIR . DS . 'files/' . $image . $thim_thumb;
        } else {
            $resized = $this->webroot . 'files/timthumb.php?src=' . FULL_BASE_URL . $this->webroot . APP_DIR . DS . WEBROOT_DIR . DS . 'img/' . $noimages . $thim_thumb;
        }
        return $resized;
    }

    public function imgUrl($image = null, $width = 100, $height = 100, $options = array(), $noimages = "no-image.gif", $ratio = true) {
        $thim_thumb = '&q=95';
        if ($width)
            $thim_thumb .= '&w=' . $width;

        if ($height && $ratio == false)
            $thim_thumb .= '&h=' . $height;

        if (file_exists("files/" . $image) && is_file("files/" . $image)) {
            $resized = $this->Html->url(
                    $this->webroot . 'files/timthumb.php?src=' . FULL_BASE_URL . $this->webroot . APP_DIR . DS . WEBROOT_DIR . DS . 'files/' . $image . $thim_thumb, $options
                    , array("full_base" => true));
        } else {
            $resized = $this->Html->url(
                    $this->webroot . 'files/timthumb.php?src=' . FULL_BASE_URL . $this->webroot . APP_DIR . DS . WEBROOT_DIR . DS . 'img/' . $noimages . $thim_thumb, $options
                    , array("full_base" => true));
        }
        return $resized;
    }

}
