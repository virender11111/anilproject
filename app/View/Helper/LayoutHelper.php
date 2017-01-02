<?php

/**
 * Layout Helper
 *
 * PHP version 5
 *
 * @category Helper
 * @package Hopajim
 * @version 1.0
 * 
 */
class LayoutHelper extends AppHelper {

    /**
     * Other helpers used by this helper
     *
     * @var array
     * @access public
     */
    public $helpers = array(
        'Html',
        'Form',
        'Session',
        'Js',
        'Number',
        'Image'
    );
    public $inputDefaults = array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'form-group', 'error' => 'has-error'),
        'label' => array('class' => 'col-md-3 control-label'),
        'between' => '<div class="col-md-8">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block')),
    );

    public function getConfiq($key) {
        return Configure::read($key);
    }

    public function localTime($timezone, $format = 'd/m/Y H:i:s a') {
        return date_create(date('Y-m-d H:i:s'))->setTimezone(new DateTimeZone($timezone))->format($format);
    }

    public function date($date, $format = "d/m/Y") {
        if (!is_int($date)) {
            $date = strtotime($date);
        }

        return date($format, $date);
    }

    function addhttp($url) {
        $url = trim($url);
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }

    public function pagesList($page) {
        $pageList = array();
        for ($start = 1; $start <= $page; $start++) {
            $pageList[$start] = $start;
        }
        return $pageList;
    }

    public function bootstrapformSetting($cols = 4, $divClass = null) {

        return array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'div' => array('class' => 'form-group col-md-' . $cols . ' ' . $divClass, 'error' => 'has-error'),
            'between' => false,
            'after' => false,
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'error-message')),
        );
    }

    public function limitOtions() {
        return array(5 => 5, 20 => 20, 50 => 50, 100 => 100, 150 => 150, 200 => 200, 250 => 250);
    }

    /**
     * Helper function to get youtube embed code from a URL.
     *
     * @params youtube URL String
     * @access public
     * @return int
     * @author Vineet
     * @package Teerrific
     */
    public function getYoutubeVideoEmbedCode($url) {
        parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
        $embed_code = "http://www.youtube.com/embed/" . $my_array_of_vars['v'] . "?modestbranding=0&;rel=0&;showinfo=0;autohide=1";
        return $embed_code;
    }

    /**
     * Helper function to get status html icon
     *
     * @params boolean status field
     * @access public
     * @return string
     * @author Vineet
     * @package Teerrific
     */
    public function status($status = NULL) {
        $render = NULL;
        if ($status == 'Y' || $status == 1)
            $render = '<span class="active_btn tooltips" data-placement="left" data-original-title="Active"><i class="icon-check"></i></span>';

        else if ($status == 'N' || $status == 0)
            $render = '<span class="inactive_btn tooltips" data-placement="left" data-original-title="Deactivate"><i class="icon-close"></i></span>';
        return $render;
    }

    public function statusPayout($status = NULL) {
        $render = NULL;
        if ($status == 1)
            $render = '<span class="active_btn tooltips" data-placement="left" data-original-title="Active">Processing</span>';

        else if ($status == 0)
            $render = '<span class="inactive_btn tooltips" data-placement="left" data-original-title="Deactivate">Pending</span>';

        else if ($status == 2)
            $render = '<span class="inactive_btn tooltips" data-placement="left" data-original-title="Deactivate">Approved</span>';
        return $render;
    }

    /**
     * Helper function to show discount amount
     *
     * @params boolean discount type
     * @access public
     * @return string
     * @author Vineet
     * @package Teerrific
     */
    public function getDiscountAmount($amount = null, $type = null) {
        if ($type) {
            return ('$' . $amount);
        } else {
            return ($amount . '%');
        }
    }

    function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    /**
     * showPriceWithCurrency
     *
     * @params boolean discount type
     * @access public
     * @return string
     * @author Hemant suman
     * @package Teerrific
     */
    public function showPriceWithCurrency($price = null) {
        if (empty($price)) {
            $price = 0.00;
        }
        $currency = (Configure::read('Site.currencySign')) ? Configure::read('Site.currencySign') : "&#36;";
        return $currency . $price;
    }

    public function dateDifferenceInDays($start_date = null, $end_date = null) {

        if (is_null($start_date)) {
            $start_date = date('Y-m-d');
        }

        $diff = abs(strtotime($end_date) - strtotime($start_date));

        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        return $days;
        //printf("%d years, %d months, %d days\n", $years, $months, $days);
    }

    /**
     * get_days_list
     *
     * @access public
     * @return indexed array
     * @author Beera the X code
     * 
     */
    public function get_days_list() {
        $days = array(
            "Sun" => "<label><span>SUN</span></label>",
            "Mon" => "<label><span>MON</span></label>",
            "Tue" => "<label><span>TUE</span></label>",
            "Wed" => "<label><span>WED</span></label>",
            "Thu" => "<label><span>THU</span></label>",
            "Fri" => "<label><span>FRI</span></label>",
            "Sat" => "<label><span>SAT</span></label>",
        );
        return $days;
    }

}
