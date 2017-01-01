<?php
/**
 * BlogPostComments Controller
 *
 * Pretty much just baked admin actions except add/edit use generateTreeList()
 * for finding the parents so you see the hierarchy.
 *
 * @author Neil Crookes <neil@crook.es>
 * @link http://www.neilcrookes.com http://neil.crook.es
 * @copyright (c) 2011 Neil Crookes
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php *
 */
class BlogPostCommentsController extends AppController {


	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('comment');
        $this->set('modelClass', $this->modelClass);

    }

	public function comment() {
		$this->loadModel('Blog.BlogPostComment');
		if ($this->request->is('post')) {
			pr($this->request->data); die;
			$this->BlogPostComment->create();
      		if ($this->BlogPostComment->save($this->request->data)) {
				$this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
			}
		}
		$this->redirect($this->referer());
		//$this->autoRender = false;
		//$blogPostCategories = $this->BlogPost->BlogPostCategory->generateTreeList();
		//$blogPostTags = $this->BlogPost->BlogPostTag->find('list');
    	//$id='';
		//$this->set(compact('blogPostCategories', 'blogPostTags','id'));
		
	}
}
