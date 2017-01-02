<?php

/**
 * Cities Controller
 *
 * PHP version 5
 *
 * @category Controller
 * Apurav Gaur 
 */
class SitelinksController extends AppController {

    /**
     * beforeRender
     *
     * @return void
     * @access public
     */
    public function beforeRender() {
        parent::beforeRender();
        $this->set('modelClass', $this->modelClass);
    }

    /**
     * Admin index
     *
     * @return void
     * @access public
     */
    public function admin_index() {
        $this->loadmodel('Country');
        $this->loadmodel('Category');
        $title_for_layout = __('SubCategory Manager');

        $conditions = array();
        if ($this->params->query('flag') == 'true') {
            $this->Session->delete('searchData');
        }
        if (strpos($this->referer(), strtolower(Inflector::pluralize($this->modelClass))) == false) {
            $this->Session->delete('searchData');
        }

        if ($this->request->is('post')) {
            $this->Session->write('searchData', $this->request->data[$this->modelClass]);
        }

        $this->request->data[$this->modelClass] = $searchData = $this->Session->read('searchData');
        $exname = $searchData['name'];

        if (!empty($exname)) {
            $conditions[] = $this->modelClass . '.name like "%' . $exname . '%" ';
        }
        // state id
        if (!empty($searchData['country'])) {
            $state_ids = $this->Country->find('list', array('fields' => array('id', 'id'), 'conditions' => array('Country.name like' => '%' . $searchData['country'] . '%')));
            $array = array_values($state_ids);
            $conditions[] = array($this->modelClass . '.country_id' => $array);
        }
        // city id
        if (!empty($searchData['category'])) {
            $city_ids = $this->Category->find('list', array('fields' => array('id', 'id'), 'conditions' => array('Category.name like' => '%' . $searchData['category'] . '%')));
            $array1 = array_values($city_ids);
            $conditions[] = array($this->modelClass . '.category_id' => $array1);
        }

        if (!empty($searchData['status']) && $searchData['status'] == 'active') {
            $conditions[] = $this->modelClass . '.status = 1';
        }

        if (!empty($searchData['status']) && $searchData['status'] == 'deactive') {
            $conditions[] = $this->modelClass . '.status = 0';
        }

        $this->paginate = array(
            'conditions' => $conditions,
            'group' => $this->modelClass . '.id',
            'order' => array($this->modelClass . '.id' => 'DESC')
        );

        // Handle out of exception 
        try {
            $data = $this->paginate($this->modelClass);
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }

        $this->set(compact('title_for_layout', 'data'));
    }

    /**
     * Admin add
     *
     * @return void
     * @access public
     */
    public function admin_add() {
        $title_for_layout = __('add', Inflector::humanize(Inflector::underscore('SubCategory')));

        $this->loadModel('Country');
        
        $this->loadModel('Category');
       
        $conditions = array();
        $conditions[] = array('Category.status' => 1);
        if ($this->request->is('post')) {

            if ($this->Sitelink->save($this->request->data)) {
                $this->Session->setFlash(__('saved', Inflector::humanize(Inflector::underscore('SubCategory'))), 'message', array(
                    'class' => 'success'
                        ), 'admin');
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__('notSaved', Inflector::humanize(Inflector::underscore('SubCategory'))), 'message', array(
                    'class' => 'danger'
                        ), 'admin');
            }
        }
        
        $cityList = $this->Category->find('list', array('conditions' => $conditions, 'order' => 'Category.id ASC'));
        $this->set(compact('title_for_layout', 'cityList'));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($id = null) {
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore('SubCategory')));

        $this->loadModel('Country');
        $this->loadModel('Category');
        $stateList = $this->Country->stateList();
        $cityList = $this->Category->allCities();
        if ($this->request->is('post')) {

            $this->request->data[$this->modelClass]['id'] = $id;
            if ($this->{$this->modelClass}->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', Inflector::humanize(Inflector::underscore('SubCategory'))), 'message', array('class' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', Inflector::humanize(Inflector::underscore('SubCategory'))), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->{$this->modelClass}->read(null, $id);
        }
        $this->set(compact('title_for_layout', 'stateList', 'cityList'));
        $this->render('admin_add');
    }

    public function admin_cityList() {
        $this->loadModel('City');
        $cities = $this->City->citylistbyState($this->request->data['state_id']);
        $this->set(compact('cities'));
        $this->render('admin_citylist');
    }

    /**
     * Admin delete
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_delete($id = null) {
        if ($this->{$this->modelClass}->delete($id)) {
            $this->Session->setFlash(__('deleted', Inflector::humanize(Inflector::underscore('SubCategory'))), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', Inflector::humanize(Inflector::underscore('SubCategory'))), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }

    /**
     * Admin delete
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_process() {
        if (!$this->request->is('post')) {
            $this->Session->setFlash(__('invalidAccess.'), 'admin/error', array(), 'admin');
            $this->redirect(array('action' => 'index'));
        }
        if (empty($this->request->data[$this->modelClass]['action'])) {
            $this->Session->setFlash(__('selectoption'), 'message', array('class' => 'danger'), 'admin');
            $this->redirect($this->referer());
        }
        if (empty($this->request->data[$this->modelClass]['id'])) {
            $this->Session->setFlash(__('notSelected', Inflector::pluralize($this->modelClass)), 'message', array('class' => 'danger'), 'admin');
            $this->redirect($this->referer());
        }

        if ($message = $this->{$this->modelClass}->process($this->request->data)) {
            if ($message == 1) {
                $message = 'Selected ' . Inflector::pluralize('SubCategory') . ' Deleted Successfully.';
            }
            $this->Session->setFlash(__($message), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('operationnotdone'), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }

}
