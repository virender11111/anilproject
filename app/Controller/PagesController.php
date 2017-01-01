<?php
App::import("Vendor", "Upload");

require_once(APP . 'Vendor' . DS . 'facebook' . DS . 'facebook.php');
App::uses('AppController', 'Controller');

/**
 * Pages Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @version  1.0
 * @author   SAGAR JAJORIYA
 */
class PagesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Pages';

    /**
     * Model used by the controller
     *
     * @var array
     */
    public $uses = array('Page');

    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->loadModel('Event');
        $calendar_event = $this->Event->find('all', array(
            'conditions' => array(
                'Event.active' => 1
            ),
            'order' => array(
                'Event.created DESC'
            ),
            'limit' => 2
        ));
        $this->set(compact('calendar_event'));
        $this->set('modelClass', $this->modelClass);
        $this->Auth->allow(
            'index',
            'who_we_are',
            'what_we_do',
            'jobs',
            'contact_us',
            'service_detail',
            'specialist_services',
            'quality_assurance',
            'our_partners',
            'testimonials',
            'our_team',
            'buzz_hub',
            'buzz_team',
            'buzz_brokerage',
            'buzz_membership',
            'calendar',
            'fb_check', 
            'wall_post',
            'admin_permission',
            'team_detail', 
            'view_team', 
            'view_jobs', 
            'all_jobs',
            'optimize_images'
        );
    }

    /**
     * view
     *
     * @param $slug
     * @return void
     * @access public
     */
    public function view($slug) {
        $this->layout = 'home';

        $page = $this->Page->find('first', array(
            'conditions' => array(
                'Page.status' => 1, 
                'Page.slug' => $slug
            )
        ));
        if (empty($page)) {
            throw new NotFoundException('404 error.');
        }
        $this->set('pages', $page);
    }

    /**
     * changeLanguage
     *
     * @param $slug
     * @return void
     * @access public
     */
    public function changeLanguage($lng) {
        if (isset($this->availableLanguages[$lng])) {
            parent::setLang($lng);
            $this->Session->setFlash(__('The language has been changed to %s', $this->availableLanguages[$lng]));
        } else {
            throw new NotFoundException(__('Language %s is not supported', $lng));
        }
        $this->redirect($this->referer());
    }

    /**
     * Admin index
     *
     * @return void
     * @access public
     */
    public function admin_index() {

        $title_for_layout = __('manage', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $this->Page->recursive = 1;
        $conditions = null;
        $conditions = array('Page.status' => 1);
        if ($this->request->is('post')) {
            unset($this->request->data['action']);
            unset($this->request->data['Page']['limit']);
            $searchField = array();
            if (!empty($this->request->data['Page']['title'])) {
                $searchField['title'] = 'LIKE';
            }
            if (!empty($this->request->data['Page']['slug'])) {
                $searchField['title'] = '=';
            }
            $conditions = $this->postConditions($this->request->data, $searchField, 'AND', true);
        }
        $this->paginate = array('conditions' => $conditions);

        try {
            $this->set('listAll', $this->paginate());
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }
        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin add
     *
     * @return void
     * @access public
     */
    public function admin_add() {
    	$this->loadModel('Role');
        $title_for_layout = __('add', Inflector::humanize(Inflector::underscore($this->modelClass)));
        if (!empty($this->request->data)) {
            $this->request->data['Page']['status'] = 1;
        	if ($this->Page->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        }
        $roleList = $this->Role->find('list',array(
            'conditions' => array(
        		'Role.id !=' => 1
            )
        ));
        $page_id = '';
        $this->set(compact('title_for_layout', 'roleList', 'page_id'));
    }

    /**
     * Admin edit
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_edit($id = null) {
    	$this->loadModel('Role');
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore($this->modelClass)));
        $this->Page->id = $id;
        if (!$this->Page->exists())
            throw new NotFoundException(__(''));
        $this->set('title_for_layout', __('Edit Page'));
        $this->set('title', __('Page <small> Edit Page</small>'));
        if ($this->request->is('post')) {
            $this->request->data['Page']['id'] = $id;
            if ($this->Page->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->Page->read(null, $id);
        }
        $roleList = $this->Role->find('list', array(
            'conditions' => array(
        		'Role.id !=' => 1
            )
        ));
        $page_id = $id;
        $this->set(compact('title_for_layout', 'roleList', 'page_id'));
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
        if ($this->Page->delete($id)) {
            $this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }

    // /**
    //  * index
    //  *
    //  * @return void
    //  * @access public
    //  */
    // public function index(){
    //     $this->loadModel('Blog.BlogPost');
    //     // $blogpost_list = $this->BlogPost->find('all', array(
    //     //     'conditions' => array(
    //     //         'BlogPost.published' => 1
    //     //     ),
    //     //     'order' => array(
    //     //         'BlogPost.created DESC'
    //     //     ),
    //     //     'limit' => 6
    //     // ));
    // 	$video_section = $this->Page->find('first', array(
    //         'conditions' => array(
    //             'Page.slug' => 'frontier-home',
    //             'Page.status' => 1
    //         )
    //     ));
    //     $page_details = $this->Page->find('first', array(
    //         'conditions' => array(
    //             'Page.slug' => 'home-content',
    //             'Page.status' => 1
    //         )
    //     ));
    //     $this->loadModel('Brand');
    //     $brands = $this->Brand->find('all', array(
    //         'conditions' => array(
    //             'Brand.status' => 1
    //         )
    //     ));
    // 	$this->set(compact('video_section', 'page_details', 'brands'));
    // }

    /**
     * index
     *
     * @return void
     * @access public
     */
    public function index(){
        $this->layout = "default_new";
        $this->loadModel('Blog.BlogPost');
        // $blogpost_list = $this->BlogPost->find('all', array(
        //     'conditions' => array(
        //         'BlogPost.published' => 1
        //     ),
        //     'order' => array(
        //         'BlogPost.created DESC'
        //     ),
        //     'limit' => 6
        // ));
        $video_section = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'frontier-home',
                'Page.status' => 1
            )
        ));
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'home-content',
                'Page.status' => 1
            )
        ));
        $this->loadModel('Brand');
        $brands = $this->Brand->find('all', array(
            'conditions' => array(
                'Brand.status' => 1
            )
        ));
        $this->set(compact('video_section', 'page_details', 'brands'));
    }


    /**
     * who we are
     *
     * @return void
     * @access public
     */
    public function who_we_are(){
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'who-we-are',
                'Page.status' => 1
            )
        ));
        $this->set(compact('page_details'));
    }

    /**
     * what we do
     *
     * @return void
     * @access public
     */
    public function what_we_do(){
        $this->loadModel('Service');
    	$page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'what-we-do',
                'Page.status' => 1
            )
        ));
    	$services = $this->Service->find('all',array(
            'conditions' => array(
                'Service.status' => 1),
            'order' => array(
                'Service.id ASC'
            )
        ));
    	$this->set(compact('page_details', 'services'));
    }

    /**
     * jobs
     *
     * @return void
     * @access public
     */
    public function jobs(){
        $this->loadModel('JobUpload');
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'job-with-us',
                'Page.status' => 1
            )
        ));
        $swj = $this->JobUpload->find('all', array(
            'conditions' => array(
                'JobUpload.status' => 1, 
                'JobCategory.name' => 'Care & Support'
            ), 
            'order' => array(
                'JobUpload.id' => 'DESC'
            )
        ));
        $sej = $this->JobUpload->find('all', array(
            'conditions' => array(
                'JobUpload.status' => 1, 
                'JobCategory.name' => 'Supported Employment'
            ),
            'order' => array(
                'JobUpload.id' => 'DESC'
            )
        ));
        $goj = $this->JobUpload->find('all', array(
            'conditions' => array(
                'JobUpload.status' => 1, 
                'JobCategory.name' => 'Graduate Opportunity'
            ),
            'order' => array(
                'JobUpload.id' => 'DESC'
            )
        ));
        $oj = $this->JobUpload->find('all', array(
            'conditions' => array(
                'JobUpload.status' => 1, 
                'JobCategory.name' => 'Other Positions'
            ),
            'order' => array(
                'JobUpload.id' => 'DESC'
            )
        ));
        $this->set(compact('page_details', 'swj', 'oj', 'sej', 'goj'));
    }

    /**
     * all jobs
     *
     * @return void
     * @access public
     */
    public function all_jobs(){
        $this->loadModel('JobUpload');
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'job-with-us',
                'Page.status' => 1
            )
        ));
        $swj = $this->JobUpload->find('all', array(
            'conditions' => array(
                'JobUpload.status' => 1, 
                'JobCategory.name' => 'Care & Support'
            ), 
            'order' => array(
                'JobUpload.id' => 'DESC'
            )
        ));
        $sej = $this->JobUpload->find('all', array(
            'conditions' => array(
                'JobUpload.status' => 1, 
                'JobCategory.name' => 'Supported Employment'
            ),
            'order' => array(
                'JobUpload.id' => 'DESC'
            )
        ));
        $oj = $this->JobUpload->find('all', array(
            'conditions' => array(
                'JobUpload.status' => 1, 
                'JobCategory.name' => 'Other Positions'
            ),
            'order' => array(
                'JobUpload.id' => 'DESC'
            )
        ));
        $this->set(compact('page_details', 'swj', 'oj', 'sej'));
    }

    /**
     * contact us
     *
     * @return void
     * @access public
     */
    public function contact_us(){
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'contact-us',
                'Page.status' => 1
            )
        ));
        $this->loadModel("Setting");
        $fs_support_address = $this->Setting->find("first", array(
            "conditions" => array(
                'Setting.key' => "FrontierSupportServicesAddress"
            ),
            "fields" => array(
                "Setting.value"
            )
        ));
        $buzz_hub_address = $this->Setting->find("first", array(
            "conditions" => array(
                'Setting.key' => "BuzzzAddressHub"
            ),
            "fields" => array(
                "Setting.value"
            )
        ));
        
        $this->set(compact('page_details', 'address1', 'fs_support_address', 'buzz_hub_address'));
    }

    /**
     * specialist_services
     *
     * @return void
     * @access public
     */
    public function specialist_services(){
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'specialist-services',
                'Page.status' => 1
            )
        ));
    	$this->set(compact('page_details', 'specialist_services'));
    }

    /**
     * quality_assurance
     *
     * @return void
     * @access public
     */
    public function quality_assurance(){
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'quality-assurance',
                'Page.status' => 1
            )
        ));
    	$this->set(compact('page_details'));
    }

    /**
     * our_partners
     *
     * @return void
     * @access public
     */
    public function our_partners(){
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'our-partners',
                'Page.status'=>1
            )
        ));
    	$this->set(compact('page_details'));
    }

    /**
     * testimonials
     *
     * @return void
     * @access public
     */
    public function testimonials(){
        $this->loadModel('Testimonial');
    	$page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'testimonials',
                'Page.status' => 1
            )
        ));
    	$this->Paginator->settings = array(
            'limit' => 6,
            'conditions'=> array(
                'Testimonial.status' => 1
            ),
            'order' => array(
                'Testimonial.id' => 'DESC'
            )
        );
        $testimonials = $this->paginate('Testimonial');
        $this->set(compact('page_details', 'testimonials'));
    }

    /**
     * our_team
     *
     * @return void
     * @access public
     */
    public function our_team(){
        $this->loadModel('Team');
    	$page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'our-team',
                'Page.status' => 1)
            )
        );
    	$team_details = $this->Team->find('all', array(
            'conditions' => array(
                'Team.status' => 1
            ),
            'order' => array(
                'Team.id' => 'desc'
            )
        ));
        $this->set(compact('page_details', 'team_details'));
    }

    /**
     * buzz_hub
     *
     * @return void
     * @access public
     */
    public function buzz_hub(){
    	$this->layout='buzz_hub';
    	$page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'buzz-home-page',
                'Page.status' => 1
            )
        ));
        $buzz_video = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'buzz-video',
                'Page.status' => 1
            )
        ));

        $this->loadModel("BuzzSession");
        $this->paginate = array(
            'group' => 'BuzzSession.id',
            'conditions' => array(
                'BuzzSession.status' => 1
            )
        );
        $buzz_sessions = $this->paginate("BuzzSession");
        
        $this->set(compact('page_details', 'buzz_video', 'buzz_sessions'));
    }

    /**
     * buzz_team
     *
     * @return void
     * @access public
     */
    public function buzz_team(){
    	$this->layout='buzz_hub';
    	$page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'buzz-team',
                'Page.status' => 1
            )
        ));
        $this->loadModel("BuzzTeam");
        $this->paginate = array(
            'group' => 'BuzzTeam.id',
            'conditions' => array(
                'BuzzTeam.status' => 1
            )
        );
        $buzz_teams = $this->paginate("BuzzTeam");
        $banner_alt_tag = "buzz team - Disability Support services";
    	$this->set(compact('page_details', 'buzz_teams', 'banner_alt_tag'));
    }

    /**
     * buzz_brokerage
     *
     * @return void
     * @access public
     */
    public function buzz_brokerage(){
    	$this->layout='buzz_hub';
    	$page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'brokerage',
                'Page.status' => 1
            )
        ));
        $banner_alt_tag = "buzz brokerage-Disability Support";
        $this->set(compact('page_details', 'banner_alt_tag'));
    }

    /**
     * buzz_membership
     *
     * @return void
     * @access public
     */
    public function buzz_membership(){
        $this->layout='buzz_hub';
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'buzz-membership',
                'Page.status' => 1
            )
        ));
        $this->set(compact('page_details'));
    }

    /**
     * calender
     *
     * @return void
     * @access public
     */
    public function calendar() {
        $this->layout='buzz_hub';
        $page_details = array();
        $page_details['Meta']['title'] = 'Calendar';
        $page_details['Meta']['description'] = '';
        $page_details['Meta']['keywords'] = '';
        $buzz_video = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'buzz-video',
                'Page.status' => 1
            )
        ));
        $this->set(compact('page_details', 'buzz_video'));
    }
    
    /**
     * team_detail
     *
     * @return void
     * @access public
     */
    public function team_detail() {
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'our-team',
                'Page.status' => 1
            )
        ));
        $this->set(compact('page_details'));
    }

    /**
     * fb_check
     * 
     * @access public 
     * @return void
     * @author SAGAR JAJORIYA
     */
    public function fb_check($id = null) {
        Configure::load('facebook');
        $appId=Configure::read('Facebook.appId');
        $app_secret=Configure::read('Facebook.secret');
        $baseURL=Configure::read('Facebook.baseurl');

        $facebook = new Facebook(array(
                'appId'     =>  $appId,
                'secret'    => $app_secret,
                ));
        $loginUrl = $facebook->getLoginUrl(array(
            'scope'         => 'email,publish_actions,user_birthday,user_location,user_work_history,user_about_me,user_hometown',
            'redirect_uri'  => Router::url("/", true).'pages/wall_post/'.$id
            ));
        $this->redirect($loginUrl);
    }

    /**
     * wall_post
     * function for fb wall post with media
     * 
     * @access public 
     * @return void
     * @author SAGAR JAJORIYA
     */
    function wall_post($id = null) {
        Configure::load('facebook');
        $appId = Configure::read('Facebook.appId');
        $app_secret = Configure::read('Facebook.secret');
        $baseURL = Configure::read('Facebook.baseurl');
       
        $facebook = new Facebook(array(
            'appId' => $appId,
            'secret' => $app_secret,
        ));

        $user_profile = $facebook->api('/me?fields=email,name,first_name,last_name,age_range,link,gender,locale,timezone,verified');
        
        $user = $facebook->getUser();
        
        $this->loadModel('Blog.BlogPost');
        $postDataa = $this->BlogPost->find('first', array('conditions' => array(
            'BlogPost.id' => $id)));
        $postData = array(
            'message' => '',
            'link' => SITEURL.'/blog/view/'.$postDataa['BlogPost']['slug'],
            'picture' => SITEURL.'/files/blog_post/image/'.$postDataa['BlogPost']['id'].'/'.$postDataa['BlogPost']['image'],
            'name' => $postDataa['BlogPost']['title'],
            'description' => 'Product description');
        $publishStream = $facebook->api("/$user/feed", 'post', $postData);
                
        $redirectUrl = $baseURL;
        $this->redirect($redirectUrl);
        
    }

    /**
     * view_team
     *
     * @return void
     * @access public
     */
    public function view_team($id = null) {
        $this->loadModel('TeamMember');
        $this->loadModel('Team');
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'our-team',
                'Page.status' => 1
            )
        ));
        $team_member_details = $this->TeamMember->find('all', array(
            'conditions' => array(
                'TeamMember.status' => 1,
                'Team.id' => $id
            )
        ));
        $team_name = $this->Team->find('first', array(
            'conditions' => array(
                'Team.id' => $id
            ),
            'fields' => array(
                'Team.title'
            ),
            'recursive' => -1
        ));
        $this->set(compact('team_member_details', 'team_name', 'page_details'));
    }

    /**
     * view_jobs
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function view_jobs($id = null) {
        $this->loadModel('JobUpload');
        $page_details = $this->Page->find('first', array(
            'conditions' => array(
                'Page.slug' => 'job-with-us',
                'Page.status' => 1
            )
        ));
        $job_details = $this->JobUpload->find('first', array(
            'conditions'=> array(
                'JobUpload.id' => $id,
                'JobUpload.status' => 1
            )
        ));
        $this->set(compact('job_details', 'page_details'));
    }

    /**
     * Function will optimize the images as per given height width ratio
     *
     * @access public
     * @return void
     */
    public function optimize_images() {
        $med = dirname(dirname(__FILE__)) . "/webroot/banner/";
        $files2 = scandir($med, 1);

        foreach ($files2 as $value) {
            $item = explode(".", $value);

            $foo = new upload(dirname(dirname(dirname(__FILE__))) . '/app/webroot/banner/' . $value);

            if ($foo->uploaded) {
                // save uploaded image with a new name,
                // resized to 650 wide
                $foo->file_new_name_body = 'F' . $item[0];
                $foo->image_resize = true;
                $foo->image_convert = 'png';
                $foo->image_x = 128; //Width
                $foo->image_y = 128; //Height
                $foo->jpeg_quality = 85;
                $foo->dir_auto_chmod = true;
                $foo->Process($med);

                if (!$foo->processed) {
                    echo 'error : ' . $foo->error;
                }
            }
        }
    }

}
