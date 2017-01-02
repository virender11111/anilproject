<?php

/**
 * Teams Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @author SAGAR JAJORIYA
 */
class TeamMembersController extends AppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'TeamMembers';

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('TeamMember');

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
    
        if (!empty($searchData['team_id'])) {
            $conditions[] = $this->modelClass . '.team_id ="' . $searchData['team_id'] . '"';
        }

        $fields = array(
            /*'Faq.id',
            'Faq.question',
            'Faq.description',
            'Faq.status'*/
        );
        $this->paginate = array(
            'conditions' => $conditions,
            'fields' => $fields,
            /*'group' => 'Faq.id',*/
            'order' => array('TeamMember.id' => 'ASC')
        );
        try {
            $data = $this->paginate();
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }

        $this->loadModel("Team");
        $all_teams = $this->Team->find('list', array(
            "fields" => array(
                "Team.id",
                "Team.title"
            )
        ));
        $this->set('listAll', $data);
        if (empty($modelClass)) {
            $modelClass = "TeamMember";
        }
        
        $this->set(compact('title_for_layout', 'all_teams'));
    }

    /**
     * Admin add
     *
     * @return void
     * @access public
     * @author SAGAR JAJORIYA
     */
    public function admin_add($type = null) {
        $this->loadModel('Team');
        //$data = $this->Page->pages_list();
        $title_for_layout = __('add', Inflector::humanize(Inflector::underscore($this->modelClass)));
        if (!empty($this->request->data)) {
            //pr($this->request->data); die;
            if ($this->TeamMember->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        }
        $teamList = $this->Team->find('list', array(
            'conditions' => array('
                Team.status' => 1)));
        $this->set(compact('title_for_layout', 'data', 'teamList'));
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
        $this->loadModel('Team');
        //$data = $this->Page->pages_list();
        if (!empty($this->request->data)) {
            $this->request->data['TeamMember']['id'] = $id;
            if ($this->TeamMember->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->TeamMember->read(null, $id);
        }

        $teamList = $this->Team->find('list', array(
            'conditions' => array('
                Team.status' => 1)));
        $team_member_id = $id;
        $this->set(compact('title_for_layout', 'data', 'team_member_id','teamList'));
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
        if ($this->TeamMember->delete($id)) {
            $this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }
}
