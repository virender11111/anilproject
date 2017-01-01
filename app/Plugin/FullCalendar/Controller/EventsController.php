<?php
/*
 * Controller/EventsController.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

class EventsController extends FullCalendarAppController {

	var $name = 'Events';
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('view', 'blog', 'index','home','feed');
		$this->set('modelClass', $this->modelClass);
	}
        var $paginate = array(
            'limit' => 15
        );

    function admin_index() {
    	$title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));
    	$this->Event->recursive = 1;
    	$this->set(compact('title_for_layout'));
		$this->set('listAll', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->request->data = $this->Event->read(null, $id);
		//$this->set('event', $this->Event->read(null, $id));
	}

	function admin_add() {
		$title_for_layout = __('add', Inflector::humanize(Inflector::underscore($this->modelClass)));
		if (!empty($this->data)) {
			$this->Event->create();
			$startenddate = explode('to',$this->data['Event']['event_date']);
			//pr($startenddate);die;
			$this->request->data['Event']['start'] = ltrim($startenddate[0]);
			$this->request->data['Event']['end'] = ltrim($startenddate[1]);
			$this->request->data['Event']['all_day'] = 0;
			//pr($this->data);die;
			if ($this->Event->save($this->data)) {
			 $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
				$this->redirect(array('controller'=>'FullCalendar','action' => 'index'));
			} else {
			 $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
			}
		}
		$this->set(compact('title_for_layout'));
	}

	function admin_edit($id = null) {
		$title_for_layout = __('edit', Inflector::humanize(Inflector::underscore($this->modelClass)));
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			$this->Event->id = $id;
			$startenddate = explode('to',$this->data['Event']['event_date']);
			//pr($startenddate);die;
			$this->request->data['Event']['start'] = $startenddate[0];
			$this->request->data['Event']['end'] = $startenddate[1];
			$this->request->data['Event']['all_day'] = 0;
			if ($this->Event->save($this->request->data)) {
				 $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
				$this->redirect(array('controller'=>'FullCalendar','action' => 'index'));
			} else {
				 $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Event->read(null, $id);
		}
		$this->set(compact('title_for_layout'));
		$this->render('admin_add');
		//$this->set('eventTypes', $this->Event->EventType->find('list'));
	}

	function admin_delete($id = null) {
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
		} else {
			$this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
		}
		$this->redirect($this->referer());
		
		/*
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event was not deleted', true));
		$this->redirect(array('action' => 'index'));
		*/
	}

        // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
	function admin_feed($id=null) {
		$this->layout = "ajax";
		$vars = $this->params['url'];
		$conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
		$events = $this->Event->find('all', $conditions);
		$data = '';
		if(!empty($events)){
		foreach($events as $event) {
			if($event['Event']['all_day'] == 1) {
				$allday = true;
				$end = $event['Event']['start'];
			} else {
				$allday = false;
				$end = $event['Event']['end'];
			}
			$data[] = array(
					'id' => $event['Event']['id'],
					'title'=>$event['Event']['title'],
					'start'=>$event['Event']['start'],
					'end' => $end,
					'allDay' => $allday,
					'url' => Router::url('/') . 'admin/full_calendar/events/edit/'.$event['Event']['id'],
					'details' => $event['Event']['details'],
					'className' => $event['EventType']['color']
			);
		}
		}
		$this->set("json", json_encode($data));
	}
	// The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
	function feed($id=null) {
		$this->layout = "ajax";
		$vars = $this->params['url'];
		$conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
		$events = $this->Event->find('all', $conditions);
		$data = '';
		if(!empty($events)){
			foreach($events as $event) {
				if($event['Event']['all_day'] == 1) {
					$allday = true;
					$end = $event['Event']['start'];
				} else {
					$allday = false;
					$end = $event['Event']['end'];
				}
				$data[] = array(
						'id' => $event['Event']['id'],
						'title'=>$event['Event']['title'],
						'start'=>$event['Event']['start'],
						'end' => $end,
						'allDay' => $allday,
						//'url' => Router::url('/') . 'full_calendar/events/edit/'.$event['Event']['id'],
						'url' => 'javascript:void(0)',
						'details' => $event['Event']['details'],
						'className' => $event['EventType']['color']
				);
			}
		}
		$this->set("json", json_encode($data));
	}
	
        // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
	function admin_update() {
		$vars = $this->params['url'];
		$this->Event->id = $vars['id'];
		$this->Event->saveField('start', $vars['start']);
		$this->Event->saveField('end', $vars['end']);
		$this->Event->saveField('all_day', $vars['allday']);
		echo "success";die;
	}
	
	function update() {
		$vars = $this->params['url'];
		$this->Event->id = $vars['id'];
		$this->Event->saveField('start', $vars['start']);
		$this->Event->saveField('end', $vars['end']);
		$this->Event->saveField('all_day', $vars['allday']);
		echo "success";die;
	}

}
?>
