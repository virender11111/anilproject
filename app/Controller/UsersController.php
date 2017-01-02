<?php

/**
 * Users Controller
 *
 * PHP version 5
 *
 * @category Controller
 */
class UsersController extends AppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Users';

    /**
     * Components
     *
     * @var array
     * @access public
     */
    public $components = array('RequestHandler', 'ExtAuth.ExtAuth', 'Acl.AclAccess');
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array('User', 'UserType');

    /**
     * Helpers used by the Controller
     *
     * @var array
     * @access public
     */
    public $helpers = array('Front');

    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();

        // Auth Settings
        $scope = array("User.status" => 1);
        $usenameField = 'email';
        if (!empty($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $scope[] = array("User.is_admin" => 1);
        } else {
            $scope[] = '';//array("User.is_admin" => 1);
        }

        $this->Auth->authenticate = array(
            AuthComponent::ALL => array('userModel' => 'User', 'scope' => $scope),
            'Form' => array('fields' => array('username' => $usenameField))
        );
        $this->Auth->allow('dashboard','index','admin_forgot_pass','admin_reset', 'login');
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
     * auth_login
     *
     * @param string $provider
     * @return void
     * @access public
     */
    public function auth_login($provider) {
        $result = $this->ExtAuth->login($provider);

        if ($result['success']) {

            $this->redirect($result['redirectURL']);
        } else {
            $this->Session->setFlash($result['message']);
            $this->redirect($this->Auth->loginAction);
        }
    }

    /**
     * auth_callback
     *
     * @param string $provider
     * @return void
     * @access public
     */
    public function auth_callback($provider) {
        $this->render = false;
        $result = $this->ExtAuth->loginCallback($provider);
        if ($result['success']) {
            $this->__successfulExtAuth($result['profile'], $result['accessToken']);
        } else {
            $this->Session->setFlash($result['message']);
            $this->redirect($this->Auth->loginAction);
        }
    }

    /**
     * __successfulExtAuth
     *
     * @param string $provider, string $accessToken
     * @return void
     * @access private
     */
    private function __successfulExtAuth($incomingProfile, $accessToken) {
        $profiledatajson = (array) json_decode($incomingProfile['raw']);
        // search for profile
        $this->User->recursive = -1;
        $existingProfile = $this->User->find('first', array(
            'conditions' => array('google_id' => $profiledatajson['id'])
        ));

        $profileData = array();
        $profileData['User']['role_id'] = 2;
        $profileData['User']['status'] = 1;
        $profileData['User']['is_admin'] = 0;
        $profileData['User']['is_newsletter_subscribed'] = 0;
        $profileData['User']['is_updates'] = 0;

        if (!empty($existingProfile)) {
            // Existing profile? log the associated user in.
            $this->__doAuthLogin($existingProfile);
        } else {
            if ($incomingProfile['provider'] == 'Google') {
                // no-one logged in, must be a registration.
                $profileData['User']['google_id'] = $profiledatajson['id'];
                $profileData['User']['fname'] = $profiledatajson['given_name'];
                $profileData['User']['lname'] = $profiledatajson['family_name'];
                $profileData['User']['auth_token'] = $accessToken;
            } else if ($incomingProfile['provider'] == 'Facebook') {

                $profileData['User']['facebook_id'] = $profiledatajson['id'];
                $username = explode(' ', $profiledatajson['name'], 2);
                $profileData['User']['fname'] = $username[0];
                $profileData['User']['lname'] = $username[1];
                $profileData['User']['auth_token'] = $accessToken;
            }

            if ($this->User->save($profileData)) {

                $newProfile = $this->User->find('first', array(
                    'conditions' => array('id' => $this->User->id)
                ));
                // log in
                $this->__doAuthLogin($newProfile);
            }
        }
    }

    /**
     * __doAuthLogin
     *
     * @param array $user
     * @return void
     * @access private
     */
    private function __doAuthLogin($user) {
        if ($this->Auth->login($user['User'])) {
            $this->Session->setFlash(sprintf(__d('users', '%s you have successfully logged in'), $this->Auth->user('username')));
            $this->redirect(array("controller" => "users", "action" => "dashboard"));
        }
    }

    /**
     * Admin index
     *
     * @return void
     * @access public
     */
    public function admin_index() {
        $title_for_layout = __('manage', 'Users');
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
        if (!empty($searchData['name'])) {
            $exname = explode(' ', $searchData['name']);
        }
        if (!empty($exname)) {
            $fname = (isset($exname[0])) ? $exname[0] : '';
            $mname = (isset($exname[1])) ? $exname[1] : '';
            $lname = (isset($exname[2])) ? $exname[2] : '';
            if (!empty($fname))
                $conditions[] = $this->modelClass . '.fname like "%' . $fname . '%" OR ' . $this->modelClass . '.mname like "%' . $fname . '%" OR ' . $this->modelClass . '.lname like "%' . $fname . '%" ';
            if (!empty($mname))
                $conditions[] = $this->modelClass . '.fname like "%' . $mname . '%" OR ' . $this->modelClass . '.mname like "%' . $mname . '%" OR ' . $this->modelClass . '.lname like "%' . $mname . '%" ';
            if (!empty($lname))
                $conditions[] = $this->modelClass . '.fname like "%' . $lname . '%" OR ' . $this->modelClass . '.mname like "%' . $lname . '%" OR ' . $this->modelClass . '.lname like "%' . $lname . '%" ';
        }
        if (!empty($searchData['email'])) {
            $conditions[] = $this->modelClass . '.email ="' . $searchData['email'] . '"';
        }
        if (!empty($searchData['status']) && $searchData['status'] == 'active') {
            $conditions[] = $this->modelClass . '.status = 1';
        }
        if (!empty($searchData['status']) && $searchData['status'] == 'deactive') {
            $conditions[] = $this->modelClass . '.status = 0';
        }
        if (!empty($searchData['role'])) {
            $conditions[] = $this->modelClass . '.role_id = '.$searchData['role'];
        }
		if($this->role_id != 1){
			//$conditions[] = 'User.role_id = '.$this->role_id;
            $conditions[] = array(
                "User.role_id !=" => 1
            );
		}else{
			$conditions[] = 'User.role_id != 1';
		}
       
        $fields = array(
            'User.id',
            'User.first_name',
            'User.last_name',
            'User.email',
            'User.status',
            'User.created',
        );
        $this->paginate = array(
            'conditions' => $conditions,
            'fieldss' => $fields,
            'group' => 'User.id',
            'order' => array('User.id' => 'DESC')
        );

        // Handle out of exception 
        try {
            $data = $this->paginate('User');
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }

        $this->loadModel("Role");
        $all_roles = $this->Role->find('list', array(
            "fields" => array(
                "Role.title"
            )
        ));

        $this->set('users', $data);

        $this->set(compact('title_for_layout', 'all_roles'));
    }

    /**
     * Admin index
     *
     * @return void
     * @access public
     */
    public function admin_user_earnings() {
        $title_for_layout = __('manage', 'Sellers');
        $conditions = array('User.is_admin' => 'N');
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
        if (!empty($searchData['name'])) {
            $exname = explode(' ', $searchData['name']);
        }
        if (!empty($exname)) {
            $fname = (isset($exname[0])) ? $exname[0] : '';
            $mname = (isset($exname[1])) ? $exname[1] : '';
            $lname = (isset($exname[2])) ? $exname[2] : '';
            if (!empty($fname))
                $conditions[] = $this->modelClass . '.fname like "%' . $fname . '%" OR ' . $this->modelClass . '.mname like "%' . $fname . '%" OR ' . $this->modelClass . '.lname like "%' . $fname . '%" ';
            if (!empty($mname))
                $conditions[] = $this->modelClass . '.fname like "%' . $mname . '%" OR ' . $this->modelClass . '.mname like "%' . $mname . '%" OR ' . $this->modelClass . '.lname like "%' . $mname . '%" ';
            if (!empty($lname))
                $conditions[] = $this->modelClass . '.fname like "%' . $lname . '%" OR ' . $this->modelClass . '.mname like "%' . $lname . '%" OR ' . $this->modelClass . '.lname like "%' . $lname . '%" ';
        }
        if (!empty($searchData['email'])) {
            $conditions[] = $this->modelClass . '.email ="' . $searchData['email'] . '"';
        }
        if (!empty($searchData['status']) && $searchData['status'] == 'active') {
            $conditions[] = $this->modelClass . '.status = 1';
        }
        if (!empty($searchData['status']) && $searchData['status'] == 'deactive') {
            $conditions[] = $this->modelClass . '.status = 0';
        }

        $conditions[] = 'User.role_id = 2';
        $fields = array(
            'User.id',
            'User.first_name',
            'User.last_name',
            'User.email',
            'User.status',
            'User.created',
        );
        $this->paginate = array(
            'conditions' => $conditions,
            'fieldss' => $fields,
            'group' => 'User.id',
            'order' => array('User.id' => 'DESC')
        );

        // Handle out of exception 
        try {
            $data = $this->paginate('User');
        } catch (NotFoundException $e) {
            $this->outOfPageRangeRedirect(array('action' => 'index'));
        }

        $this->set('users', $data);

        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin index
     *
     * @return void
     * @access public
     */
    public function admin_detail_earning($id) {
        $title_for_layout = __('manage', 'Earnings');
        $conditions = array('User.is_admin' => 'N');

        $earnings = array();
        $earnings['total_paid'] = $this->Custom->get_paid_earnings($id);
        $earnings['total_profit'] = $this->Custom->getUserProfit($id);

        // Handle out of exception 
        if ($this->request->is('post')) {
            if (($earnings['total_profit'] - $earnings['total_paid']) < $this->request->data["UserPayoutEarning"]["paid_earnings"]) {
                $this->Session->setFlash(__('AmountNotGreater', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
                $this->redirect($this->referer());
            } else {
                $this->loadModel('UserPayoutEarning');
                $this->request->data["UserPayoutEarning"]["user_id"] = $id;
                if ($this->UserPayoutEarning->save($this->request->data)) {
                    $this->Session->setFlash(__('saved', 'UserPayoutEarning'), 'message', array('class' => 'success'), 'admin');
                    $this->redirect(array('action' => 'user_earnings'));
                }
            }
        }
        $this->set(compact('title_for_layout', 'earnings'));
    }

    /**
     * Admin add
     *
     * @return void
     * @access public
     */
    public function admin_add() {
    	$this->loadModel('Role');
        $title_for_layout = __('add', $this->modelClass);
       // 
        if (!empty($this->request->data)) {
            $this->request->data['User']['is_admin'] = 1;
            if ($this->User->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        }
        $roleList = $this->Role->find('list',array('conditions'=>array(
        	'Role.id !='=>1
        		
        )));
        // set static list data for view
        $this->set(compact('title_for_layout', 'roleList'));
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
        $title_for_layout = __('edit', $this->modelClass);
        if (!empty($this->request->data)) {
            //print_r($this->request->data); die;
            $this->request->data['User']['is_admin'] = 1;
            $this->request->data['User']['id'] = $id;
            $postData = $this->request->data['User'];
            if (empty($postData['password']) && empty($postData['verify_password'])) {
                unset($this->request->data['User']['password']);
                unset($this->request->data['User']['verify_password']);
            }
            if ($this->User->saveAll($this->request->data)) {
                $this->Session->setFlash(__('saved', $this->modelClass), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('notSaved', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
        $roleList = $this->Role->find('list',array('conditions'=>array(
        		'Role.id !='=>1
        
        )));
        // set static list data for view
        $this->set(compact('title_for_layout','roleList'));
        $this->render('admin_add');
    }

    /**
     * Admin view
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_view($id = null) {
        $title_for_layout = __('view', $this->modelClass);

        $this->request->data = $this->User->read(null, $id);
        unset($this->request->data['User']['password']);
        
        // set static list data for view
        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin edit profile
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_profile() {
        $title_for_layout = __('edit', Inflector::humanize(Inflector::underscore("profile")));
        $user = $this->logged_in;
        $id = $user['id'];
        if (!empty($this->request->data)) {
            $this->request->data['User']['id'] = $id;
            if ($this->User->saveAll($this->request->data)) {
                $user = $this->User->read(null, $this->User->id);
                $this->Session->write("Auth.Admin", $user["User"]);
                $this->Session->setFlash(__('saved', 'Profile'), 'message', array('class' => 'success'), 'admin');
                $this->Referer->redirect(array('action' => 'index'));
            } else {
                $this->request->data['User']['image'] = $this->request->data['User']['old_image'];
                $this->Session->setFlash(__('notSaved', 'Profile'), 'message', array('class' => 'danger'), 'admin');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }

        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin reset password
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_reset_password() {
        $title_for_layout = __('edit', 'Password');
        $user = $this->logged_in;
        $id = $user['id'];
        $this->set('title', 'Reset Password');
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('notSaved', 'Password'), 'message', array('class' => 'danger'), 'admin');
            $this->redirect(array('controller' => 'dashboard'));
        }
        if (!empty($this->request->data)) {
            $this->request->data['User']['id'] = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('saved', 'Password'), 'message', array('class' => 'success'), 'admin');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('notSaved', 'Password'), 'message', array('class' => 'danger'), 'admin');
            }
        }
        $this->set(compact('title_for_layout'));
    }

    /**
     * Admin delete
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_process() {
        if (!$this->request->is('post')) {
            $this->Session->setFlash(__('invalidAccess.'), 'admin/error', array(), 'admin');
            $this->redirect(array('action' => 'index'));
        }
        if (empty($this->request->data[$this->modelClass]['action'])) {
            $this->Session->setFlash(__('selectoption'), 'message', array('class' => 'danger'), 'admin');
            $this->redirect($this->referer());
        }
        if (empty($this->request->data[$this->modelClass]['id'])) {
            $this->Session->setFlash(__('notSelected', Inflector::pluralize($this->modelClass)), 'message', array('class' => 'danger'), 'admin');
            $this->redirect($this->referer());
        }

        if ($message = $this->User->process($this->request->data)) {
            if ($message == 1) {
                $message = 'Selected ' . Inflector::pluralize($this->modelClass) . ' Deleted Successfully.';
            }
            $this->Session->setFlash(__($message), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('operationnotdone'), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }

    /**
     * Admin delete
     *
     * @param integer $id
     * @return void
     * @access public
     */
    public function admin_delete($id = null, $roleName = null) {
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('deleted', $this->modelClass), 'message', array('class' => 'success'), 'admin');
        } else {
            $this->Session->setFlash(__('notDeleted', $this->modelClass), 'message', array('class' => 'danger'), 'admin');
        }
        $this->redirect($this->referer());
    }

    /**
     * Admin login
     *
     * @return void
     * @access public
     */
    public function admin_login() {
        if ($this->Session->check('Auth.Admin.id')) {
            return $this->redirect(array('controller' => 'dashboard'));
        }

        $title_for_layout = __('adminLogin');
        $this->layout = "admin_login";
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect(array('controller' => 'dashboard'));
            } else {
                $this->Session->setFlash(__('invalidLoginDetails'), 'message', array('class' => 'danger'), 'auth');
            }
        }

        $this->set(compact('title_for_layout'));
    }

    /**
     * _setCookie
     *
     * @return void
     * @access public
     */
    protected function _setCookie() {
        if (!$this->request->data['User']['remember_me'] || $this->Cookie->check('User')) {
            return false;
        }
        // remove "remember me checkbox"
        unset($this->request->data['User']['remember_me']);

        // hash the user's password
        $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);

        // write the cookie
        setcookie("remember_me_cookie", $this->request->data['User'], time() + (86400 * 7), "/");

        return true;
    }

    /**
     * Admin logout
     *
     * @return void
     * @access public
     */
    public function admin_logout() {
        $this->Session->setFlash(__('logoutMessage'), 'message', array('class' => 'success'), 'auth');
        $this->redirect($this->Auth->logout());
    }

    /**
     * Admin Forgot Password
     *
     * @return void
     * @access public
     */
    public function admin_forgot_pass() {
        $this->layout = "admin_login";
        if (!empty($this->logged_in)) {
            return $this->redirect(Router::url('/', true) . $this->logged_in['Role']['alias']);
        }
        $this->set('title_for_layout', __('Forgot Password'));
        $this->User->set($this->data);
        $response = array('flag' => false);
        $this->User->checkValidation();
        if ($this->request->is('post') && $this->User->validates()) {
            $user = $this->User->find('first', array('conditions' => array('User.email' => $this->request->data['User']['email'], 'is_admin' => 'Y')));
            if (!empty($user)) {
                $this->request->data['User']['id'] = $user['User']['id'];
                $length = 10;
                $randomString = substr(str_shuffle(md5(time())), 0, $length);
                $this->request->data['User']['token'] = $randomString;
                if ($this->User->save($this->request->data)) {
                    // set mail variable
                    $to = $user['User']['email'];
                    $name = $user['User']['full_name'];
                    $uurrll = 'users/reset/' . $randomString;
                    $replace = array($name, $uurrll, Configure::read('Site.title'));
                    
                    // Send mail on Registration
                    $this->send_mail($to, 'AdminForgotPassword', $replace);
                    $this->Session->setFlash(__('NewPassword'), 'message', array('class' => 'success'), 'auth');
                    $this->redirect(array('controller' => 'users', 'action' => 'login'));
                } else {
                    $this->Session->setFlash(__('CommonError'), 'message', array('class' => 'danger'), 'auth');
                }
            } else {
                $this->Session->setFlash(__('EmailNotExistes'), 'message', array('class' => 'danger'), 'auth');
            }
        }
    }

    /**
     * Activate
     *
     * @param string $code
     * @return void
     * @access public
     */
    public function activate() {
        $code = $this->request->query['code'];

        if (isset($code) && !empty($code)) {
            $data = $this->User->find('first', array('conditions' => array('User.activation_code' => $code), 'fields' => array('id')));
        } else {
            $this->redirect(array('action' => 'login'));
        }

        $response = array();

        if (count($data) > 0) {

            $this->request->data['User']['status'] = 1;
            $this->request->data['User']['id'] = $data['User']['id'];
            $this->request->data['User']['activation_code'] = NULL;
            if ($this->User->save($this->request->data)) {
                $response["status"] = true;
                $response["message"] = __('ConfirmationAccount');
            }
        } else {
            $response["status"] = false;
            $response["message"] = __('InvalidActCode');
        }
        $this->Session->write('accountActivate', $response);
        $this->redirect(array('action' => "login"));
    }

    /**
     * Forgot
     *
     * @return void
     * @access public
     */
    public function forgot() {
        $this->layout = $this->render = false;
        $response = array('flag' => false);

        if (!empty($this->request->data)) {

            $this->User->validator()->remove('email', 'isUnique');

            if ($this->User->set($this->request->data) && $this->User->validates()) {

                $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.email' => $this->request->data['User']['email']
                    ),
                    'recursive' => -1
                        )
                );

                if (empty($user)) {
                    echo json_encode(array('status' => false, 'errors' => array("Error" => __('EmailDBCheck'))));
                    die;
                }

                if ($user["User"]["is_admin"]) {
                    echo json_encode(array('status' => false, 'errors' => array("Error" => __('CantUseEmail'))));
                    die;
                }

                if (!empty($user['User']['token'])) {
                    echo json_encode(array('status' => false, 'errors' => array("Error" => __('NewPassword'))));
                    die;
                } else {

                    $this->request->data['User']['id'] = $user['User']['id'];
                    $activationKey = md5(uniqid());
                    $this->request->data['User']['token'] = $activationKey;

                    if ($this->User->save($this->request->data)) {
                        $data['User'] = $this->request->data;

                        // set mail variable
                        $to = $this->request->data['User']['email'];
                        $activelink = SITEURL . 'reset?code=' . $activationKey;
                        $siteurl = Configure::read('Site.title');

                        $replace = array($activelink, $siteurl);

                        if ($this->send_mail($to, 'ForgotPassword', $replace)) {
                            echo json_encode(array('status' => true, 'message' => __('PasswordEmail')));
                            die;
                        }
                    } else {
                        echo json_encode(array('status' => false, 'errors' => $this->Custom->convert_errors($this->User->validationErrors)));
                        die;
                    }
                }
            } else {
                echo json_encode(array('status' => false, 'errors' => $this->Custom->convert_errors($this->User->validationErrors)));
                die;
            }
        }
    }

    /**
     * Reset
     *
     * @param string $code
     * @return void
     * @access public
     */
    public function reset() {
        $code = $this->request->query['code'];

        $this->set('title_for_layout', __('Reset Password'));

        if ($code == null) {
            $this->Session->setFlash(__('CommonError'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'login'));
        }

        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.token' => $code,
            ),
        ));

        if (empty($user)) {
            $arrayError["status"] = false;
            $arrayError["message"] = __('TokerExp');
            $this->Session->write('accountActivate', $arrayError);
            $this->redirect(array("action" => "login"));
        }

        if (!empty($this->request->data)) {
            $this->request->data['User']['status'] = 1;
            $this->request->data['User']['id'] = $user['User']['id'];
            $this->request->data['User']['token'] = NULL;
            if ($this->User->save($this->request->data)) {
                $arrayError["status"] = true;
                $arrayError["message"] = __('PasswordReset');
                $this->Session->write('accountActivate', $arrayError);
                echo json_encode(array('status' => true, 'url' => Router::url('/', true)));
                die;
            } else {
                echo json_encode(array('status' => false, 'errors' => $this->Custom->convert_errors($this->User->validationErrors)));
                die;
            }
        }

        $this->set(compact('user', 'username', 'code'));
    }

    /**
     * Admin Reset
     *
     * @param string $key
     * @return void
     * @access public
     */
    public function admin_reset($key = null) {
    	$this->layout = 'admin_login';
    	$this->set('title_for_layout', __('Reset Password'));
    
    	if ($key == null) {
    		$this->Session->setFlash(__('CommonError'), 'default', array('class' => 'error'));
    		$this->redirect(array('action' => 'login'));
    	}
    
    	$user = $this->User->find('first', array(
    			'conditions' => array(
    					'User.token' => $key,
    			),
    	));
    
    	if (!isset($user['User']['id'])) {
    		$this->Session->setFlash(('Token expired.'), 'message', array('class' => 'danger'));
    		$this->redirect(array('action' => 'login'));
    	}
    
    	if ($this->request->is('post')) {
    
    		$this->request->data['User']['active'] = 1;
    		$this->request->data['User']['id'] = $user['User']['id'];
    		$this->request->data['User']['token'] = NULL;
    		$this->request->data['User']['password'] = $this->request->data['User']['password'];
    		if ($this->User->save($this->request->data)) {
    			$this->Session->setFlash(__('PasswordReset'), 'message', array('class' => 'success'), 'auth');
    			$this->redirect(array('controller' => 'users', 'action' => 'login'));
    		}
    	}
    
    	$this->set(compact('user', 'username', 'key'));
    }

    /**
     * check_ipaddress
     *
     * @return void
     * @access public
     */
    public function check_ipaddress() {
        $countIp = $this->{$this->modelClass}->find('count', array('conditions' => array('User.ipaddress' => $_SERVER["REMOTE_ADDR"])));
        if ($countIp >= Configure::read('maxsignup_attempt')) {
            return true;
        }
    }

    /**
     * check_invalidLogin
     *
     * @return void
     * @access public
     */
    public function check_invalidLogin() {
        $this->loadModel('InvalidLogin');
        $countLogin = $this->InvalidLogin->find('count', array('conditions' => array('InvalidLogin.ip' => $_SERVER["REMOTE_ADDR"], 'InvalidLogin.time' => date('Y-m-d'))));

        if (!empty($countLogin) && ($countLogin >= Configure::read('maxsignin_attempt'))) {
            return true;
        }
    }

    /**
     * User Registration
     *
     * @return void
     * @access public
     */
    public function register() {
        if ($this->check_ipaddress()) {
            $check_ipaddress = true;
            $this->set('check_ipaddress', $check_ipaddress);
        }

        $this->layout = 'login_' . $this->language["direction"];

        // handle post data
        if (!empty($this->request->data)) {

            if ($this->User->set($this->request->data) && $this->User->validates()) {

                $this->request->data['User']['role_id'] = 2;
                $randomSt = $this->Custom->randomString(28);
                $this->request->data['User']['activation_code'] = $randomSt;
                $expHours = Configure::read('activationCode_expHours');
                $this->request->data['User']['activation_code_expiry'] = date("Y-m-d H:i:s", strtotime('+' . $expHours . ' hours'));
                $this->request->data['User']['ipaddress'] = $_SERVER["REMOTE_ADDR"];

                if ($this->User->save($this->request->data)) {

                    $user = $this->request->data;
                    $this->Session->delete('g-recaptcha-response-register');
                    $this->Session->delete('success_status-register');
                    // set mail variable
                    $to = $this->request->data['User']['email'];
                    $email = $this->request->data['User']['email'];
                    $confirm_url = SITEURL . 'activate?code=' . $randomSt;

                    $replace = array($email, $confirm_url);
                    // Send mail on Registration
                    $this->send_mail($to, 'Register', $replace);

                    $response['status'] = true;
                    $response['url'] = Router::url(array("controller" => "users", "action" => "dashboard"), true);
                    $response['success_message'] = __('RegisterSuccess');
                    echo json_encode($response);
                    die;
                } else {
                    echo json_encode(array('status' => false, 'errors' => $this->Custom->convert_errors($this->User->validationErrors, array("fname" => "First name"))));
                    die;
                }
            } else {
                echo json_encode(array('status' => false, 'errors' => $this->Custom->convert_errors($this->User->validationErrors, array("fname" => "First name"))));
                die;
            }
        }
    }

    /**
     * delete_all_cookies
     *
     * @return void
     * @access public
     */
    public function delete_all_cookies() {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 1000);
                setcookie($name, '', time() - 1000, '/');
            }
        }
    }

    /**
     * Login
     *
     * @return boolean
     * @access public
     */
    public function login() {
        if ($this->Session->check('Auth.Admin.id')) {
        	return $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        
        $title_for_layout = __('adminLogin');
        $this->layout = "admin_login";
        if ($this->request->is('post')) {
        	if ($this->Auth->login()) {
        		return $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        	} else {
        		$this->Session->setFlash(__('invalidLoginDetails'), 'message', array('class' => 'danger'), 'auth');
        	}
        }
        
        $this->set(compact('title_for_layout'));
        $this->set(compact('title_for_layout'));
    }

    public function invalidLoginEntry() {

        $sameipuser = array();
        $sameipuser['InvalidLogin']['ip'] = $_SERVER["REMOTE_ADDR"];
        $sameipuser['InvalidLogin']['time'] = date('Y-m-d');
        $sameipuser['InvalidLogin']['count'] = 1;
        $this->InvalidLogin->save($sameipuser);
    }

    public function dashboard($model = null) {
    	
    	$this->layout = 'front';
        $this->set('title_for_layout', __('Dashboard'));


        $this->set(compact('title_for_layout'));
    }

    public function activities() {
        // User Activities section
        $userID = $this->logged_in['id'];
        $this->loadModel('Newsfeed');
        $userActivities = $this->Newsfeed->usreActivities($userID);

        $model = Configure::read('default.model');

        $this->loadModel('Score');
        $userScoreResult = $this->Score->find('first', array(
            'conditions' => array(
                'Score.user_id' => $userID,
                'Score.model' => $model,
            ),
            'fields' => array(
                'Score.id',
                'Score.score',
            ),
        ));

        $this->set(compact('userActivities', 'userScoreResult'));
    }

    /**
     * Logout
     *
     * @return void
     * @access public
     */
    public function logout() {
        $this->Session->destroy();
        $this->Session->setFlash(__('logoutMessage'), 'message', array('class' => 'success'));
        $this->redirect($this->Auth->logout());
    }

    public function resend($mail) {

        $email = base64_decode($mail);
        $this->User->recursive = -1;
        $data = $this->User->findByEmail($email);

        if (!$data)
            $this->redirect(array('controller' => 'users', 'action' => 'login'));

        $activationKey = md5(uniqid());

        echo $to = $data['User']['email'];
        echo $activelink = SITEURL . 'new_password?code=' . $activationKey;

        echo $this->request->data['User']['id'] = $data['User']['id'];
        $this->request->data['User']['token'] = $activationKey;
        $this->User->save($this->request->data['User'], false);

        $replace = array($email, $activelink);
        // Send mail on Registration
        $this->send_mail($to, 'Register', $replace);
        $this->Session->setFlash(__('ResendActivation'), 'message', array('class' => 'success'));
        $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }

    /**
     * profile
     *
     * @return void
     * @access public
     */
    public function profile($id = null) {

        $this->layout = 'front';
        $user = $this->logged_in;
        $id = $user['id'];

        $title_for_layout = __('view', $this->modelClass);
        $title = 'Profile';

        if (!empty($this->request->data)) {
            $this->request->data['User']['id'] = $id;

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Password has been reset.'));
                $this->redirect(array('action' => 'profile'));
            } else {

                $this->Session->setFlash(__('Password could not be reset. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }

        if ($this->logged_in["parent_id"] == 0) {
            $this->request->data['sub_seller'] = $this->{$this->modelClass}->find('all', array(
                'fields' => array('email', 'image', 'id'),
                'conditions' => array('parent_id' => $id),
            ));
        }
        // set static list data for view
        $this->set(compact('title_for_layout', 'title', 'user'));
    }

    /**
     * Account information 
     *
     * @return void
     * @access public
     */
    public function account_information() {
        $userID = $this->logged_in['id'];
        if (!empty($this->request->data)) {
            foreach ($this->request->data["SocialMedia"] as $key => $value) {
                if (empty($value["value"])) {
                    unset($this->request->data["SocialMedia"][$key]);
                }
            }
            $this->request->data["User"]["id"] = $userID;
            if ($this->User->saveAll($this->request->data)) {
                $this->Session->setFlash(__('Your account information has been updated'), 'message', array('class' => 'success'));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('Please fix the errors'), 'message', array('class' => 'danger'));
            }
        }

        $user = $this->{$this->modelClass}->userData($userID);
        $races = $this->User->Race->raceList();
        $ethnicities = $this->User->Ethnicity->ethnicityList();
        $maritalStatuses = $this->User->MaritalStatus->maritalStatusList();
        $this->loadModel('SocialMediaType');
        $socialMediaTypes = $this->SocialMediaType->socialMediaList();
        $this->set(compact('races', 'ethnicities', 'maritalStatuses', 'socialMediaTypes', 'user'));
    }

    /**
     * Security Settings
     *
     * @return void
     * @access public
     * Vineet
     */
    public function security_settings() {
        $userID = $this->logged_in['id'];
        if (!empty($this->request->data)) {

            $this->request->data["User"]["id"] = $userID;
            if (isset($this->request->data["SecurityQuestionAnswer"])) {
                $this->request->data["SecurityQuestionAnswer"][0]["user_id"] = $userID;
            }
            if (isset($this->request->data["UserEmail"])) {
                $this->request->data["UserEmail"][0]["user_id"] = $userID;
            }

            if (!empty($this->request->data["UserChange"])) {
                $this->loadModel("UserChange");
                $this->UserChange->set($this->request->data);
                if (!$this->UserChange->validates($this->request->data)) {
                    $this->Session->setFlash(__('Please fix the errors first'), 'message', array('class' => 'danger'));
                } else {
                    $this->request->data["User"]["password"] = $this->request->data["UserChange"]["new_password"];
                    unset($this->request->data["UserChange"]);
                    if ($this->User->save($this->request->data["User"])) {
                        $this->Session->setFlash(__('Your security settings have been updated'), 'message', array('class' => 'success'));
                        $this->redirect($this->referer());
                    }
                }
            } else {
                if ($this->User->saveAll($this->request->data)) {
                    $this->Session->setFlash(__('Your security settings have been updated'), 'message', array('class' => 'success'));
                    $this->redirect($this->referer());
                } else {
                    $this->Session->setFlash(__('Please fix the errors first'), 'message', array('class' => 'danger'));
                }
            }
        }
        $user = $this->{$this->modelClass}->userData($userID);
        $this->loadModel('SecurityQuestion');
        $securityQuestions = $this->SecurityQuestion->getQuestionList();
        $this->set(compact('user', 'securityQuestions'));
    }

    /**
     * Admin add sub Accounts
     *
     * @return void
     * @access public
     */
    public function add_sub_accounts() {

        $this->layout = 'front';
        $user = $this->logged_in;
        $id = $user['id'];

        if ($user['parent_id'] != 0) {
            $this->redirect(array('action' => 'dashboard'));
        }

        $title_for_layout = __('Add Sub Accounts', $this->modelClass);
        $title = 'Add Sub Accounts';

        if (!empty($this->request->data)) {
            $this->request->data['User']['parent_id'] = $id;
            $this->request->data['User']['role_id'] = 3;
            $activationKey = md5(uniqid());
            $this->request->data['User']['token'] = $activationKey;
            $this->request->data['User']['status'] = 0;


            if ($this->User->save($this->request->data)) {
                $data['User'] = $this->request->data;

                // set mail variable
                $to = $this->request->data['User']['email'];
                $activelink = SITEURL . 'new_password?code=' . $activationKey;
                $siteurl = Configure::read('Site.title');
                $email = $this->request->data['User']['email'];

                $replace = array($email, $activelink);
                // Send mail on Registration
                $this->send_mail($to, 'Register', $replace);

                $this->Session->setFlash(__('Sub accounts has been created.'), 'message', array('class' => 'success'));
                $this->redirect(array('action' => 'profile'));
            } else {

                $this->Session->setFlash(__('Please, try again.'), 'message', array('class' => 'danger'));
            }
        }

        // set static list data for view
        $this->set(compact('title_for_layout', 'title'));
    }

    /**
     * New password for sub account users
     *
     * @param string $code
     * @return void
     * @access public
     */
    public function new_password() {

        $code = $this->request->query['code'];
        $this->layout = 'login';
        $this->set('title_for_layout', __('New Password'));

        if ($code == null) {
            $this->Session->setFlash(__('CommonError'), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'login'));
        }

        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.token' => $code,
            ),
        ));

        if (!isset($user['User']['id'])) {
            $this->Session->setFlash(__('TokenExp'), 'message', array('class' => 'danger'));
            $this->redirect(array('action' => 'login'));
        }

        if ($this->request->is('post')) {

            $this->request->data['User']['status'] = 1;
            $this->request->data['User']['id'] = $user['User']['id'];
            $this->request->data['User']['token'] = NULL;
            if ($this->User->save($this->request->data)) {


                $this->Session->setFlash(__('PasswordReset'), 'message', array('class' => 'success'));
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }
        }

        $this->set(compact('user', 'username', 'code'));
    }

    /**
     * delete Sub Accounts
     *
     * @param integer $id 
     * @return void
     * @access public
     */
    public function delete($id = null) {

        if ($this->{$this->modelClass}->delete($id)) {
            $message = 'Deleted successfully';
            $this->Session->setFlash(__('Deleted Sub Account..'), 'message', array('class' => 'success'));
        } else {
            $message = 'Not Deleted';
            $this->Session->setFlash(__('Please try again..'), 'message', array('class' => 'danger'));
        }
        $this->redirect($this->referer());
    }

    public function admin_addacos(){
    
        die();
        $title_for_layout = 'Add Acos';
        if($this->request->is('post')){
            //pr($this->request->data['User']['action']);die;
            if($this->request->data['User']['action'] !=''){
                $this->AclAccess->addAco($this->request->data['User']['action']);
                $this->Session->setFlash('Action has been added', 'message', array('class' => 'success'), 'admin');
            }else{
                $this->Session->setFlash('action cannot be empty', 'message', array('class' => 'danger'), 'admin');
            }
        }
      //    $this->AclAccess->addAco('Users/_admin_edit');
        //die('success');
    }


    // public function admin_addAcos(){
    // 	$this->AclAccess->addAco('TeamMembers/admin_delete');
    // 	die('success');
    // }

}
