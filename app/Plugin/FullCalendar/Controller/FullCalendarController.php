<?php
/*
 * Controller/FullCalendarController.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
 
class FullCalendarController extends FullCalendarAppController {

	var $name = 'FullCalendar';
	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('modelClass', $this->modelClass);
	}

	function admin_index() {
		$title_for_layout = __('manage', Inflector::humanize(Inflector::underscore("calender")));
		$this->set(compact('title_for_layout'));
	}

}
?>
