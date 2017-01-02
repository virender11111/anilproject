<?php

/**
 * BuzzTeamsController Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @author Sagar Jajoriya
 */
class BuzzTeamsController extends AppController {

    /**
     * default callback function
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
    }

    /**
     * default callback function
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
        $title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $this->paginate = array(
            'group' => $this->modelClass . '.id',
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
        $title_for_layout = __('add', Inflector::humanize(Inflector::underscore($this->modelClass)));
        if (!empty($this->request->data)) {
            if ($this->{$this->modelClass}->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array(
                    'class' => 'success'
                        ), 'admin');
                $this->redirect(array(
                    'action' => 'index'
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
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($id = null) {
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore($this->modelClass)));
        if (!empty($this->request->data)) {
            $this->request->data[$this->modelClass]['id'] = $id;

            if ($this->{$this->modelClass}->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array('class' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->{$this->modelClass}->recursive = -1;
            $this->request->data = $this->{$this->modelClass}->read(null, $id);
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
    public function admin_delete($id = null) {
        if ($this->{$this->modelClass}->delete($id)) {
            $this->Session->setFlash(__('deleted', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', Inflector::humanize(Inflector::underscore($this->modelClass))), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }

}
