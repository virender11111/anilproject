<?php

/**
 * FAQ Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @author SAGAR JAJORIYA
 */
class FaqsController extends AppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Faqs';

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    //public $uses = array();

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
        $title_for_layout = __('manage', "FAQ's");
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
    
        if (!empty($searchData['page_id'])) {
            $conditions[] = $this->modelClass . '.page_id ="' . $searchData['page_id'] . '"';
        }

        $fields = array();
        $this->paginate = array(
            'conditions' => $conditions,
            'fields' => $fields,
            'group' => 'Faq.id',
            'order' => array('Faq.id' => 'ASC')
        );
        try {
            $data = $this->paginate();
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }

        $this->loadModel("Page");
        $all_pages = $this->Page->find("list", array(
            "fields" => array(
                "Page.id",
                "Page.title"
            )
        ));
        $this->set('faqs', $data);
        if (empty($modelClass)) {
            $modelClass = "Faq";
        }
        $this->set(compact('title_for_layout', 'all_pages'));
    }

    /**
     * Admin add
     *
     * @return void
     * @access public
     * @author SAGAR JAJORIYA
     */
    public function admin_add($type = null) {
        $this->loadModel('Page');
        $data = $this->Page->pages_list();
        $title_for_layout = __('add', "FAQ");
        if (!empty($this->request->data)) {
            if ($this->Faq->saveAll($this->request->data)) {
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
        $title_for_layout = __('edit', "FAQ");
        $this->loadModel('Page');
        $data = $this->Page->pages_list();
        if (!empty($this->request->data)) {
            $this->request->data['Faq']['id'] = $id;
            if ($this->Faq->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->Faq->read(null, $id);
        }

        $this->set(compact('title_for_layout', 'data'));
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
        if ($this->Faq->delete($id)) {
            $this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }
}
