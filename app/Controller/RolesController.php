<?php
/**
 * Roles Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Frontier 
 * @version  1.0
 * @author   Beera the X code
 */
class RolesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Roles';

    /**
     * Components
     *
     * @var array
     * @access public
     */
    public $components = array('Acl.AclGenerate');
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('Role');

    /**
     * Helpers used by the Controller
     *
     * @var array
     * @access public
     */
    public $helpers = array('Front');

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
     * Roles index
     * index page of all lessons
     *
     * @return void
     * @access public
     * @author VIRENDER SAINI
     */
    public function admin_index() {
        $title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $this->paginate = array(
            'group' => $this->modelClass . '.id',
            'conditions' => array(
                "Role.id !=" => 1
            )
        );

        // Handle out of exception 
        try {
            $data = $this->paginate();
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }

        $this->set('logged_in', $this->logged_in);
        $roleID = $this->logged_in["role_id"];
        $this->set(compact('title_for_layout', 'data', 'roleID'));
    }

    /**
     * Admin add
     * function for add new Role
     *
     * @return void
     * @access public
     * @author VIRENDER SAINI
     */
    public function admin_add() {

        $title_for_layout = __('add', Inflector::humanize(Inflector::underscore($this->modelClass)));
        if (!empty($this->request->data)) {
           if ($this->{$this->modelClass}->saveAll($this->request->data)) {
            	 $this->AclGenerate->generate_aros(true);
                  $this->AclGenerate->set_group_permission(null, $this->Role->id);
                $this->Session->setFlash(__('saved', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array(
                    'class' => 'success'
                        ), 'admin');
                $this->redirect(array(
                    'action' => 'admin_index'
                ));
           } else {
                $this->Session->setFlash(__('notSaved', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array(
                    'class' => 'danger'
                        ), 'admin');
            }
        }
        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin edit
     * for edit lesson
     *
     * @param integer $id
     * @return void
     * @access public
     * @author VIRENDER SAINI
     */
    public function admin_edit($id = null) {
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore($this->modelClass)));
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data[$this->modelClass]['id'] = $id;
            if ($this->{$this->modelClass}->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->{$this->modelClass}->find("first", array(
                "conditions" => array(
                    $this->modelClass . ".id" => $id
                ),
            ));
        }
        $this->set(compact('title_for_layout'));
        $this->render('admin_add');
    }

    /**
     * Admin delete 
     * for delete Role
     *
     * @param integer $id
     * @return void
     * @access public
     * @author VIRENDER SAINI
     */
    public function admin_delete($id = null) {
        if ($this->{$this->modelClass}->delete($id)) {
            $this->Session->setFlash(__('deleted', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }


}
