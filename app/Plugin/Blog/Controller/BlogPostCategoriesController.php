<?php
/**
 * BlogPostCategories Controller
 *
 * Pretty much just baked admin actions except add/edit use generateTreeList()
 * for finding the parents so you see the hierarchy.
 *
 * @author Neil Crookes <neil@crook.es>
 * @link http://www.neilcrookes.com http://neil.crook.es
 * @copyright (c) 2011 Neil Crookes
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php *
 */
class BlogPostCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		//echo $this->modelClass;
		$title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));
		$this->BlogPostCategory->recursive = 0;
		
		///$conditions = null;
		
		//$this->paginate = array('conditions' => $conditions);
		//pr($this->paginate());die;
		try {
			$this->set('listAll', $this->paginate());
			$this->set('modelClass', $this->modelClass);
		} catch (NotFoundException $e) {
			$this->outOfPageRangeRedirect(array('action' => 'index'));
		}
		$this->set(compact('title_for_layout'));
		
		
		
		
		//$this->BlogPostCategory->recursive = 0;
		//$this->set('blogPostCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->BlogPostCategory->id = $id;
		if (!$this->BlogPostCategory->exists()) {
			throw new NotFoundException(__('Invalid blog post category'));
		}
		$this->set('blogPostCategory', $this->BlogPostCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		$title_for_layout = __('add', Inflector::humanize(Inflector::underscore($this->modelClass)));
		if ($this->request->is('post')) {
			$this->BlogPostCategory->create();
			if ($this->BlogPostCategory->save($this->request->data)) {
				$this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
			}
		}
		$parents = $this->BlogPostCategory->generateTreeList();
		$this->set(compact('parents', 'title_for_layout'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$title_for_layout = __('edit', Inflector::humanize(Inflector::underscore($this->modelClass)));
		$this->BlogPostCategory->id = $id;
		if (!$this->BlogPostCategory->exists()) {
			throw new NotFoundException(__('Invalid blog post category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BlogPostCategory->save($this->request->data)) {
				$this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
			}
		} else {
			$this->request->data = $this->BlogPostCategory->read(null, $id);
		}
		$parents = $this->BlogPostCategory->generateTreeList();
		$this->set(compact('parents', 'title_for_layout'));
		$this->render('admin_add');
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if ($this->BlogPostCategory->delete($id)) {
			$this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
		} else {
			$this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
		}
		$this->redirect($this->referer());
		
		/*
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->BlogPostCategory->id = $id;
		if (!$this->BlogPostCategory->exists()) {
			throw new NotFoundException(__('Invalid blog post category'));
		}
		if ($this->BlogPostCategory->delete()) {
			$this->Session->setFlash(__('Blog post category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Blog post category was not deleted'));
		$this->redirect(array('action' => 'index'));
		*/
	}
}
