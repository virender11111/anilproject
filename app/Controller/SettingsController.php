<?php

/**
 * Settings Controller
 *
 * PHP version 5
 *
 * @category Controller
 */
class SettingsController extends AppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Settings';

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('Setting');

    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
    }

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
    public function admin_index($type = null) {
        $title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $conditions = array();

        if (!empty($this->request->query['q'])) {
            $conditions = array('Setting.key like ' => $this->request->query['q'] . '%');
        }
        $fields = array(
            'Setting.id',
            'Setting.key',
            'Setting.value',
        );
        $this->paginate = array(
            'conditions' => $conditions,
            'fields' => $fields,
            'group' => 'Setting.id',
            'order' => array('Setting.key' => 'ASC')
        );
        try {
            $data = $this->paginate();
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }
        $this->set('settings', $data);
        if (empty($modelClass)) {
            $modelClass = "Setting";
        }
        if (!empty($this->params->query))
            $this->request->data['Setting'] = $this->params->query;
        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin add
     *
     * @return void
     * @access public
     */
    public function admin_add($type = null) {
        $title_for_layout = __('add', Inflector::humanize(Inflector::underscore($this->modelClass)));
        //$this->set('title', __('Settings <small> Add Setting</small>'));
        if (!empty($this->request->data)) {
            $this->Setting->create();
            if ($this->Setting->save($this->request->data)) {
                $this->Session->setFlash(__('The Setting has been saved'), 'admin/success', array(), 'admin');
                $this->redirect(array('action' => 'index', $type));
            } else {
                $this->Session->setFlash(__('The Setting could not be saved. Please, try again.'), 'admin/error', array(), 'admin');
            }
        }
        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($id = null, $type = null) {
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore($this->modelClass)));
        if (!empty($this->request->data)) {
            $this->request->data['Setting']['id'] = $id;
            unset($this->request->data['Setting']['key']);
            if ($this->Setting->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->Setting->read(null, $id);
        }

        $this->set(compact('title_for_layout'));
        $this->render('admin_add');
    }

    /**
     * Admin delete
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_delete($id = null, $type = null) {
        if ($this->Setting->delete($id)) {
            $this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }

    /**
     * Get Support
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function get_support($id = null) {
        if ($this->request->is("ajax")) {
            $this->layout = false;
        }
    }

}
