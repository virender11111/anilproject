<?php
/**
 * BlogPosts Controller
 *
 * @author Neil Crookes <neil@crook.es>
 * @link http://www.neilcrookes.com http://neil.crook.es
 * @copyright (c) 2011 Neil Crookes
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */

class BlogPostsController extends AppController {

    /**
     * Components this controller uses
     *
     * @var array
     */

    /**
     * Helpers this controller uses
     *
     * @var array
     */
    public $helpers = array('Time', 'Rss', 'Blog.Blog');

    /**
     * Default pagination options
     *
     * @var array
     */
    public $paginate = array(
    'limit' => 2,
    'order' => array(
      'BlogPost.created DESC'
    ),
    'recursive' => 0,
    );
  
    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view', 'blog', 'index','home','changeLanguage');
        $this->set('modelClass', $this->modelClass);
        $blogpost_list = $this->BlogPost->find('all', array(
            'conditions' => array(
                'BlogPost.published' => 1),
            'order' => array('BlogPost.created DESC'),
            'limit' => 3
        ));
        $this->set('blogpost_list',$blogpost_list);
        $this->set('blogSettings', ClassRegistry::init('Blog.BlogSetting')->getSettings());
    }

    /**
     * Index action handles all blog post index views, whether filtered by
     * category, tag or archive, or rendered as HTML or RSS
     */
    public function index() {
        $page_details = array();
        $page_details['Meta']['title'] = 'News and Blog | Frontier Support Blog';
        $page_details['Meta']['description'] = 'Welcome to the Frontier Support blog! Here we share articles, news, tips, and information about our events, services and programs.';
        $page_details['Meta']['keywords'] = '';
        $this->set(compact('page_details'));
        $conditions = array();
        $conditions1 = array();
        $conditions[] = array('BlogPost.published' => 1);
        if($this->request->is('post')){
        	$conditions[] = array('BlogPost.title LIKE' => '%'.$this->request->data['blog']['search'].'%');
        }
        if ($this->RequestHandler->isRss()) {
            // Add RSS condition to default options defined in paginate
            $options = array_merge(
            		$this->paginate,
            		array('conditions' => array('BlogPost.in_rss' => 1))
            );

            // Fetch blog posts according to the current mode: category, tag or
            // default
            switch ($this->_filtered()) {
            	case 'category':
            		$options = Set::merge($options, $this->_category());
            		$blogPosts = $this->BlogPost->find('byCategory', $options);
            		break;
            	case 'tag':
            		$options = Set::merge($options, $this->_tag());
            		$blogPosts = $this->BlogPost->find('byTag', $options);
            		break;
            	default:
            		$blogPosts = $this->BlogPost->find('all', $options);
            		break;
            }

            $this->set(compact('blogPosts'));
            return;
        }
  
      	// Add in the priority order to sticky posts when not rendering RSS
      	array_unshift($this->paginate['order'], 'BlogPost.sticky DESC');
      	
      	switch ($this->_filtered()) {
      		case 'category':
      			$conditions1[]=array('BlogPostCategory.id'=>5);
      			break;
      		case 'tag':
      			$this->paginate = Set::merge($this->paginate, array('byTag'), $this->_tag());
      			break;
      		case 'archive':
      			$conditions[] = array("DATE_FORMAT(BlogPost.created, '%Y%m')" => $this->params['year'].$this->params['month']);
      			break;
      	}
        $this->Paginator->settings = array(
            'limit' => 6,
            'conditions' => $conditions,
            'order' => array('BlogPost.id' => 'DESC'),
            'contain' => array(
                'BlogPostCategory' => array('conditions' => $conditions1)
            )
  		);
        $blogPosts = $this->paginate('BlogPost');
        $this->set(compact('blogPosts'));
        $this->_setArchivesCategoriesAndTags();
    }

    /**
     * Returns the current filter mode, either 'category', 'tag' or 'archive'
     * determined by the params in the URL.
     *
     * @return string
     */
    protected function _filtered() {
        if (!empty($this->params['category'])) {
          return 'category';
        }
        if (!empty($this->params['tag'])) {
          return 'tag';
        }
        if (!empty($this->params['year']) && !empty($this->params['month'])) {
          return 'archive';
        }
        return false;
    }

    /**
     * Finds and sets the selected category in the view. Returns the conditions
     * where the lft value is between the selected category's lft and rght value.
     * Called from index() action for both HTML and RSS views
     *
     * @return array
     */
    protected function _category() {
        $category = $this->BlogPost->BlogPostCategory->find('first', array(
            'conditions' => array(
                'slug' => $this->params['category']
            )
        ));

        if (!$category) {
          throw new NotFoundException(__('Invalid Blog Post Category'));
        }

        $this->set(compact('category'));

        $conditions = array(
            'BlogPostCategory.lft BETWEEN ? AND ?' => array(
                $category['BlogPostCategory']['lft'],
                $category['BlogPostCategory']['rght'],
            )
        );
        return $conditions;
    }

    /**
     * Finds and sets the selected tag in the view. Returns the conditions where
     * the blog_post_tag_id in the join model is the id of the selected tag.
     * Called from index() action for both HTML and RSS views
     *
     * @return array
     */
    protected function _tag() {
        $tag = $this->BlogPost->BlogPostTag->find('first', array(
            'conditions' => array(
                'BlogPostTag.slug' => $this->params['tag']
            )
        ));
        if (!$tag) {
          throw new NotFoundException(__('Invalid Blog Post Tag'));
        }
        $this->set(compact('tag'));
        $options['conditions'][]['BlogPostTagsBlogPost.blog_post_tag_id'] = $tag['BlogPostTag']['id'];
        return $options;
    }

    /**
     * View a blog post
     */
    public function view() {
        if (empty($this->params['slug'])) {
            throw new NotFoundException(__('Invalid Blog Post'));
        }

        $blogPost = $this->BlogPost->find('forView', array(
            'conditions' => array(
                'BlogPost.slug' => $this->params['slug'],
            )
        ));

        if (!$blogPost) {
            throw new NotFoundException(__('Invalid Blog Post'));
        }

        $page_details = array();
        $page_details['Meta']['title']= $blogPost['BlogPost']['meta_title'];
        $page_details['Meta']['description']=$blogPost['BlogPost']['meta_description'];
        $page_details['Meta']['keywords']=$blogPost['BlogPost']['meta_keywords'];
        $this->set(compact('page_details'));
        $this->set(compact('blogPost'));
        $this->_setArchivesCategoriesAndTags();
    }

    /**
     * Fetch the data for archives, categories and tags and set them as available
     * in the View so they can be rendered on the index and view pages.
     */
    public function _setArchivesCategoriesAndTags() {
        if (!$archives = Cache::read('blog_archives')) {
              $archives = $this->BlogPost->find('archives');
              Cache::write('blog_archives', $archives);
        }

        if (!$tags = Cache::read('blog_tags')) {
              $tags = $this->BlogPost->BlogPostTag->find('cloud');
              Cache::write('blog_tags', $tags);
        }

        if (!$categories = Cache::read('blog_categories')) {
            // getMenuWithUnderCounts() is a method on the HabtmCounterCache Behavior
            // which returns a nest list of categories, in a format that can be 
            // rendered by the BlogHelper::menu method, with the number of posts in
            // each category, or a it's child categories, next to the category name.
            $categories = $this->BlogPost->getMenuWithUnderCounts('BlogPostCategory', array('url' => array('slug' => 'category')));
            Cache::write('blog_categories', $categories);
        }

        // Set the selected keys in the options that are sent to the methods which
        // fetch the archives, categories and tags, to the selected value according
        // to the current mode. This is so when the data is rendered, we can
        // indicate the current selected one, if any.
        switch ($this->_filtered()) {
            case 'category':
                list($categories) = $this->_setSelectedCategory($categories, $this->params['category']);
                break;
            case 'archive':
                // Sets the selected month and parent-selected year keys to true
                if (isset($archives[$this->params['year']]) && isset($archives[$this->params['year']]['children'][$this->params['month']])) {
                  $archives[$this->params['year']]['children'][$this->params['month']]['selected'] = true;
                  $archives[$this->params['year']]['parent-selected'] = true;
                }
                break;
            default:
                break;
        }
        $this->set(compact('archives', 'categories', 'tags'));
    }

    /**
     * Recursively traverses the passed categories and sets the 'selected' => true
     * and 'parent-selected' => true in the categories array. This has to be done
     * after the list of categories is fetched, and not in the find method, which
     * would have been nicer, so that the categories array can be cached, and we
     * don't have to fetch them for each page view.
     *
     * @param $categories array A nested array of categories returned by the 
     * HabtmCounterCache::getMenuWithUnderCounts() method
     * @param $selected string The slug of the selected category
     * @return array An array with 2 keys, the first containing the modified
     * nested array of categories passed in, and the second with the
     * $parentSelected value set to tru or false for the current node in the
     * nested list. The latter is only used to set the parent-selected key in the
     * internal iterations of the nested list, so does not need to be captured
     * from the external call to this function - it's only used when the fucntion
     * calls itself.
     */
    protected function _setSelectedCategory($categories, $selected) {
        // Initalise this to false, if a category is identified as the selected,
        // category, it is set to true below and then passed back up the levels of
        // recursion so that parent-selected keys can be set.
        $parentSelected = false;

        foreach ($categories as $k => $category) {
            // Set the children and parent-selected keys by calling this method again
            // with the category's children passed into the $categories parameter.
            list ($categories[$k]['children'], $categories[$k]['parent-selected']) = $this->_setSelectedCategory($category['children'], $selected);

            // Check the data against the selected key in the options parameter and
            // set the selected key to true, and the parent selected variable, ready
            // for passing back up the levels of recursion.
            if ($categories[$k]['url']['category'] == $selected) {
                $categories[$k]['selected'] = true;
                $parentSelected = true;
            }

        }
        return array($categories, $parentSelected);
    }

    // The following methods are pretyy much just the baked admin CRUD actions.
    // The only difference is we use generateTreeList() to generate the
    // categories that can be selected in the add/edit blog post actions, so we
    // can visualise the hierarchy of categories.

    /**
     * admin index method
     *
     * @return void
     */
	public function admin_index() {
        $title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $this->BlogPost->recursive = 0;
        $listAll = $this->paginate();
        $modelClass = $this->modelClass;
        $this->set(compact('listAll','modelClass','title_for_layout'));
	}

    /**
     * admin view method
     *
     * @param string $id
     * @return void
     */
	public function admin_view($id = null) {
		$this->BlogPost->id = $id;
		if (!$this->BlogPost->exists()) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		$this->set('blogPost', $this->BlogPost->read(null, $id));
	}

    /**
     * admin add method
     *
     * @return void
     */
	public function admin_add() {
        $title_for_layout = __('add', Inflector::humanize(Inflector::underscore($this->modelClass)));
		if ($this->request->is('post')) {
			$this->BlogPost->create();
			if ($this->BlogPost->save($this->request->data)) {
                $this->rss_add($this->BlogPost->id);
				 $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
				$this->redirect(array('action' => 'index'));
			} else {
				 $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
			}
		}
		$blogPostCategories = $this->BlogPost->BlogPostCategory->generateTreeList();
		$id = '';
		$this->set(compact('blogPostCategories', 'blogPostTags', 'id', 'title_for_layout'));
	}

    /**
     * admin edit method
     *
     * @param string $id
     * @return void
     */
	public function admin_edit($id = null) {
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $this->BlogPost->id = $id;
		if (!$this->BlogPost->exists()) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if(empty($this->request->data['BlogPost']['image']['name'])){
				unset($this->request->data['BlogPost']['image']);
			}
			if ($this->BlogPost->save($this->request->data)) {
				 $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
				$this->redirect(array('action' => 'index'));
			} else {
				 $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
			}
		} else {
			$this->request->data = $this->BlogPost->read(null, $id);
		}
		$blogPostCategories = $this->BlogPost->BlogPostCategory->generateTreeList();
		$blogPostTags = $this->BlogPost->BlogPostTag->find('list');
		$this->set(compact('blogPostCategories', 'blogPostTags','id', 'title_for_layout'));
		$this->render('admin_add');
	}

    /**
     * admin delete method
     *
     * @param string $id
     * @return void
     */
	public function admin_delete($id = null) {
		if ($this->BlogPost->delete($id)) {
			$this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
		} else {
			$this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
		}
		$this->redirect($this->referer());
	}

    /**
     * rss add
     *
     * @param string $id
     * @return void
     * @author SAGAR JAJORIYA
     */
    public function rss_add($id = null) {
        if(!empty($id)) {
            $getBlog = $this->BlogPost->find("first", array(
                "conditions" => array(
                    "BlogPost.id" => $id
                )
            ));
            
            //read info from xml file to structured object
            $xml = new SimpleXMLElement(WWW_ROOT."/feed.xml", null, true);

            //add a new book entry to your xml object
            $newBodyContent = strip_tags($getBlog["BlogPost"]["body"]);
            $item = $xml->channel->addChild("item");
            $item->addChild('title', $getBlog["BlogPost"]["title"]);
            $item->addChild('link', Router::url("/blog/", true).$getBlog["BlogPost"]["slug"]);
            $item->addChild('description', html_entity_decode($newBodyContent));
            $item->addChild('pubDate', $getBlog["BlogPost"]["created"]);

            //save the changes back to the xml file
            //make sure to set proper file access rights 
            //for bla.xml on the webserver
            $xml->asXml(WWW_ROOT."/feed.xml");
        }
    }

  
}
