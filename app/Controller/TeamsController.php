<?php

/**
 * Teams Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @author SAGAR JAJORIYA
 */
class TeamsController extends AppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Teams';

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('Team');

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
     * @author SAGAR JAJORIYA
     */
    public function admin_index($type = null) {
        $title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $conditions = array();

        $fields = array(
            /*'Faq.id',
            'Faq.question',
            'Faq.description',
            'Faq.status'*/
        );
        $this->paginate = array(
            'conditions' => $conditions,
            //'fields' => $fields,
            /*'group' => 'Faq.id',*/
            'order' => array('Team.id' => 'ASC')
        );
        try {
            $data = $this->paginate();
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }
        $this->set('listAll', $data);
        if (empty($modelClass)) {
            $modelClass = "Team";
        }
        
        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin add
     *
     * @return void
     * @access public
     * @author SAGAR JAJORIYA
     */
    public function admin_add($type = null) {
        //$this->loadModel('Page');
        //$data = $this->Page->pages_list();
        $title_for_layout = __('add', Inflector::humanize(Inflector::underscore($this->modelClass)));
        if (!empty($this->request->data)) {
            if ($this->Team->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        }
        $this->set(compact('title_for_layout', 'data'));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     * @author SAGAR JAJORIYA
     */
    public function admin_edit($id = null) {
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore($this->modelClass)));
        //$this->loadModel('Page');
        //$data = $this->Page->pages_list();
        if (!empty($this->request->data)) {
        if(empty($this->request->data['Team']['image']['name'])){
        		unset($this->request->data['Team']['image']);
        	}
        	 
            $this->request->data['Team']['id'] = $id;
            if ($this->Team->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->Team->read(null, $id);
        }

        $team_id = $id;
        $this->set(compact('title_for_layout', 'data', 'team_id'));
        $this->render('admin_add');
    }

    /**
     * Admin delete
     *
     * @param integer $id
     * @return void
     * @access public
     * @author SAGAR JAJORIYA
     */
    public function admin_delete($id = null) {
        if ($this->Team->delete($id)) {
            $this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }
}
