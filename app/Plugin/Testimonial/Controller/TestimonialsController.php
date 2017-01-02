<?php

/**
 * Testimonials Controller
 *
 * PHP version 5
 *
 * @category Controller
 * Vineet Verma
 */
class TestimonialsController extends AppController {

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('Testimonial.Testimonial');

    /**
     * helpers used by the Controller
     *
     * @var array
     * @access public
     */
    public $helpers = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
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
        if ($this->request->is('post')) {
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

    public function view() {

        $this->set('title_for_layout', Configure::read('Site.title') . ' | Frequently Asked Questions');

        if ($this->Session->check('Auth.front.Candidate.id')) {
            $cateID = 1;
        } else if ($this->Session->check('Auth.front.Employer.id')) {
            $cateID = 2;
        } else
            $cateID = 3;

        $data = $this->Testimonial->find('all', array('conditions' => array('Testimonial.faq_category_id' => $cateID)));
        $this->set('data', $data);
    }

    //***************************** Index function to list news list ***************************//
    /**
     * Index function
     *
     * @return void
     * @access public
     * @param  null
     */
    public function index() {
//        $this->layout = 'home';
        $title_for_layout = Configure::read('Site.title') . ' Testimonials';


        $conditions = array('Testimonial.status' => 1);
        $fields = array(
            'Testimonial.id',
            'Testimonial.name',
            'Testimonial.title',
            'Testimonial.status',
            'Testimonial.description',
            'Testimonial.created',
        );
        $this->paginate = array(
            'conditions' => $conditions,
            'fields' => $fields,
            'group' => 'Testimonial.id',
            'order' => array('Testimonial.name' => 'ASC'),
            'limit' => (Configure::read('Testimonial.count')) ? Configure::read('Testimonial.count') : 20
        );

        $testimonials = $this->paginate();

        $this->set(compact('title_for_layout', 'testimonials'));
    }

}
