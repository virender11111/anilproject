<?php

class CustomComponent extends Component {

    protected $controller = null;
    public $components = array('Auth', 'Session');

    public function startup(Controller $controller) {
        $this->controller = $controller;
    }

    /**
     * beforeRender
     *
     * @param object $controller instance of controller
     * @return void
     */
    public function beforeRender(Controller $controller) {
        $this->controller = $controller;
    }

    /**
     * construct
     *
     * @param null
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Function getLnt
     *
     * @param string $zip zipcode for get lat and long
     * 
     * @return array
     * 
     * @access public
     * 
     * @author Apurav Gaur
     */
    function getLnt($zip) {
        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($zip) . "&sensor=false";
        $result_string = file_get_contents($url);
        $result = json_decode($result_string, true);
        if (empty($result['results'][0])) {
            return null;
        }
        $result1[] = $result['results'][0];
        $result2[] = $result1[0]['geometry'];
        $result3 = $result2[0]['location'];
        return $result3;
    }

    /*  Create a random string
     * 	
     * @paramint $length - length of the returned number
     * 
     * @return	string - string 
     */

    function randomString($length = 8) {

        $pass = "";
        $chars = array("a", "A", "b", "B", "c", "C", "d", "D", "e", "E", "f", "F", "g", "G", "h", "H", "i", "I", "j", "J",
            "k", "K", "l", "L", "m", "M", "n", "N", "o", "O", "p", "P", "q", "Q", "r", "R", "s", "S", "t", "T",
            "u", "U", "v", "V", "w", "W", "x", "X", "y", "Y", "z", "Z", "1", "2", "3", "4", "5", "6", "7", "8", "9");

        for ($i = 0; $i < $length; $i++) {
            $pass .= $chars[mt_rand(0, count($chars) - 1)];
        }
        return $pass;
    }

    public function getProductImageUrl($width = 100, $height = 100, $options = array(), $image = null, $noimages = "no_image_available.jpg", $ratio = false) {
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

    public function getDateDt($date, $camp_id) {
        App::import("Model", "CampaignView");
        $this->CampaignView = new CampaignView();
        $campViewDts = $this->CampaignView->find('first', array('conditions' => array('CampaignView.campaign_id' => $camp_id, 'CampaignView.created' => $date), 'group' => 'created', 'fields' => array('created', 'count(*) as total')));

        if (isset($campViewDts['CampaignView']))
            return $campViewDts[0]['total'];
        else
            return 0;
    }

    function createDateRangeArray($strDateFrom, $strDateTo) {
        // takes two dates formatted as YYYY-MM-DD and creates an
        // inclusive array of the dates between the from and to dates.
        $aryRange = array();

        $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
        $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));

        if ($iDateTo >= $iDateFrom) {
            array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
            while ($iDateFrom < $iDateTo) {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange, date('Y-m-d', $iDateFrom));
            }
        }
        $weekString = '"' . implode('","', $aryRange) . '"';
        return $weekString;
    }

    /**
     * check_duplicate
     * check_duplicate function will remove data duplicacy for the same day
     *
     * @return associative array 
     * @access public
     */
    public function check_duplicate($inputs, $model) {
        App::uses($model, 'Model');
        $obj = new $model;
        $conditions = $response = array();
        foreach ($inputs as $key => $value) {
            $conditions[$key] = $value;
        }

        $alreadyExists = $obj->find("count", array(
            "conditions" => $conditions
        ));

        if ($alreadyExists == 1) {
            $response["status"] = false;
            $response["message"] = __("duplicate");
        } else {
            $response["status"] = true;
            $response["message"] = __("NoDuplicateFound");
        }
        return $response;
    }

    /**
     * convert_errors
     * convert_errors function will convert model errors in human readable format / strings
     *
     * @return associative array 
     * @access public
     */
    public function convert_errors($errors, $converts = array()) {
        $return = $targetErrors = array();

        $errors = Hash::flatten($errors);

        foreach ($errors as $key => $value) {
            $getKey = explode(".", $key);
            array_pop($getKey);
            $targetErrors[end($getKey)] = $value;
        }

        if (!empty($targetErrors)) {

            if (!empty($converts)) {
                foreach ($targetErrors as $key => $value) {
                    if (isset($converts[$key])) {
                        $targetErrors = array();
                        $targetErrors[$converts[$key]] = $value;
                        break;
                    }
                }
            }

            $first = true;
            foreach ($targetErrors as $key => $value) {
                if ($first) {
                    if (!empty($value))
                        $return[Inflector::humanize($key)] = $value;
                    $first = false;
                }
            }
        }
        return $return;
    }

}
