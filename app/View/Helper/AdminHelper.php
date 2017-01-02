<?php

App::uses('Helper', 'View');

class AdminHelper extends Helper {

    var $helpers = array('Session', 'Html', 'Layout');

    public function status($status = NULL) {
        $render = NULL;
        if ($status == 'Y' || $status == 1)
            $render = '<span class="active_btn tooltips" data-placement="left" data-original-title="Active"><i class="icon-check"></i></span>';

        else if ($status == 'N' || $status == 0)
            $render = '<span class="inactive_btn tooltips" data-placement="left" data-original-title="Deactive"><i class="icon-close"></i></span>';
        return $render;
    }

    public function icons($key) {

        $key = Inflector::camelize($key);
        $iconsList = array(
            'Navicon' => 'fa fa-navicon ',
            'Users' => 'icon-users',
            'Dashboard' => 'icon-home',
            'LessonCategories' => 'icon-docs',
            'Payouts' => 'icon-settings',
            'Settings' => 'icon-settings',
            'EmailTemplates' => 'fa fa-envelope',
            'Faqs' => 'fa fa-question-circle',
            'FaqCategories' => 'fa fa-bars',
            'Size' => 'fa fa-scissors',
            'Database' => 'fa fa-database ',
            'Color' => 'fa fa-delicious  ',
            'Folder' => 'fa fa-folder-o  ',
            'Testimonials' => 'fa fa-list  ',
            'Orders' => 'icon-basket ',
            'Lessons' => 'fa fa-file-text-o'
        );
        if (!empty($iconsList[$key])) {
            return $iconsList[$key];
        }
        return null;
    }

    public function discount_type($status = NULL, $price) {
        $render = NULL;
        if ($status == 'Y' || $status == 1)
            $render = '&#36;' . $price;
        else if ($status == 'N' || $status == 0)
            $render = $price . "&#37;";
        return $render;
    }

    public function currency_type($price, $currency) {
        $render = NULL;
        if ($status == 'USD' || $status == 1)
            $render = '&#36;' . $price;
        return $render;
    }

}
