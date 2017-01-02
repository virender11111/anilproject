<?php
/**
 * BlogPostComments Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @author SAGAR JAJORIYA
 */
class BlogPostCommentsController extends AppController {

	/**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'BlogPostComments';

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    //public $uses = array();

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('comment');
        $this->set('modelClass', $this->modelClass);
    }

	/**
     * blog post comment from front end
     *
     * @return void
     */
    public function comment() {
		if ($this->request->is('ajax') && !empty($this->request->data)) {
			$this->BlogPostComment->create();
			$this->request->data['BlogPostComment']['status'] = 0;
      		if ($this->BlogPostComment->save($this->request->data)) {
                echo json_encode(array("status" => true));
                die;
			} else {
                echo json_encode(array("status" => false));
                die;
			}
		}
	}

    /**
     * indexing of all blog post comments
     *
     * @return void
     */
	public function admin_index() {
        $title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $conditions = null;
        $this->paginate = array('conditions' => $conditions, 'order' => array('BlogPostComment.id' => 'DESC'));
        try {
            $this->set('listAll', $this->paginate());        
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }
        $this->set(compact('title_for_layout'));
    }

    /**
     * edit blog post comment
     *
     * @return void
     */
    public function admin_edit($id = null) {
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $this->BlogPostComment->id = $id;
        if (!$this->BlogPostComment->exists())
            throw new NotFoundException(__(''));
        $this->set('title_for_layout', __('Edit Comments'));
        $this->set('title', __('Comment <small> Edit Comment</small>'));
        if ($this->request->is('post')) {
            $this->request->data['BlogPostComment']['id'] = $id;
           	if ($this->BlogPostComment->saveAll($this->request->data)) {    
                $this->Session->setFlash(__('saved', 'Comment'), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', 'Comment'), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->BlogPostComment->read(null, $id);
        }
        $this->set(compact('title_for_layout'));
        $this->render('admin_add');
    }

    /**
     * delete blog post comment
     *
     * @return void
     */
    public function admin_delete($id = null) {
        if ($this->BlogPostComment->delete($id)) {
            $this->Session->setFlash(__('deleted', 'Comment'), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', 'Comment'), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }
}
