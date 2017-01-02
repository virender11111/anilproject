<?php

/**
 * AclFilter Component
 *
 * PHP version 5
 *
 * @category Component
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class AclFilterComponent extends Component {

    /**
     * _controller
     *
     * @var Controller
     */
    protected $_controller = null;

    /**
     * @param object $controller controller
     * @param array  $settings   settings
     */
    public function initialize(Controller $controller) {
        $this->_controller = & $controller;
    }

    /**
     * acl and auth
     *
     * @return void
     */
    public function auth() {

        //Configure AuthComponent
        $this->_controller->Auth->authenticate = array(
            AuthComponent::ALL => array(
                'userModel' => 'User',
                'fields' => array(
                    'username' => 'username',
                    'password' => 'password',
                ),
            ),
            'Form',
        );
        $actionPath = 'controllers';
        $this->_controller->Auth->authorize = array(
            AuthComponent::ALL => array('actionPath' => $actionPath),
            'Actions',
        );
        $this->_controller->Auth->loginAction = array(
            'plugin' => null,
            'controller' => 'users',
            'admin' => false,
            'action' => 'login',
        );
        $this->_controller->Auth->logoutRedirect = array(
            'plugin' => null,
            'controller' => 'users',
            'admin' => false,
            'action' => 'login',
        );

        if (($this->_controller->Auth->user() && $this->_controller->Auth->user('group_id') == 1) || $this->_controller->request->params['action'] == 'login') {
			
            // Role: Admin
            $this->_controller->Auth->allow();
        } else {
            if ($this->_controller->Auth->user()) {
                $roleId = $this->_controller->Auth->user('group_id');
            } else {
                $roleId = null; // Role: Public
            }

            $controller = ClassRegistry::init('Acl.AclAco')->find('first', array('conditions' => array('AclAco.alias' => $this->_controller->request->params['controller'])));

            $this->allowedActions = $allowedActions = ClassRegistry::init('Acl.AclPermission')->getAllowedActionsByRoleId($roleId);

            $isPermittedCurrent = ClassRegistry::init('Acl.AclPermission')->find('first', array('recursive' => 2,
                'conditions' => array(
                    'AclAro.foreign_key' => $roleId,
                    'AclAco.alias' => $this->_controller->request->params['action'],
                    'AclAco.parent_id' => $controller['AclAco']['id'],
                )
                    )
            );
           
            $this->_controller->set('allowedActions', $allowedActions);

            if (empty($isPermittedCurrent) && $roleId) {
                $this->_controller->Auth->allowedActions = array($this->_controller->request->params['action']);
            } else {

                $linkAction = Inflector::camelize($this->_controller->request->params['controller']) . '/' . $this->_controller->request->params['action'];

                if (in_array($linkAction, $allowedActions)) {
                    $this->_controller->Auth->allowedActions = array($this->_controller->request->params['action']);
                } else {
                    $renamedControllers['CandDairy'] = 'CandDiary';
                    $renamedControllers['SearchSupplier'] = 'Search';
                    $renamedActions['index'] = 'View';
                    $renamedActions['delete_tem_work'] = 'Delete_Temp_Incoming Work';
                    $renamedActions['deleteSupplier'] = 'Delete';
                    
                    $controller = $this->_controller->request->params['controller'];
                    $controller = (!empty($renamedControllers[$controller])) ? $renamedControllers[$controller] : $controller;

                    $action = $this->_controller->request->params['action'];
                    $action = (!empty($renamedActions[$action])) ? $renamedActions[$action] : $action;

                    $linkAction = Inflector::humanize($controller) . '/' . Inflector::humanize($action);
                    if ($this->_controller->RequestHandler->isAjax()) {
                        $byPassActionsa = array('temp_incoming_works', 'perm_incoming_works');
                        $action = strtolower($this->_controller->request->params['action']);
                        if (in_array($action, $byPassActionsa)) {
                            die('You do not have the permission to access this option (' . $linkAction . ').');
                        } else {
                            $this->_controller->Session->setFlash('You do not have the permission to access this option (' . $linkAction . ').', 'notification/top_right', array('type' => 'error'), 'top_right');
                            throw new MethodNotAllowedException();
                        }
                    } else {
                        $this->_controller->Session->setFlash('You do not have the permission to access this option (' . $linkAction . ').', 'notification/top_right', array('type' => 'error'), 'top_right');
                    }
                }
            }
        }
    }

    public function authManual($controller, $action) {
        $linkAction = Inflector::camelize($controller) . '/' . $action;
        $roleId = $this->_controller->Auth->user('group_id');
      // pr($this->allowedActions);die;
        if (in_array($linkAction, $this->allowedActions) || $roleId == 1) {
            $this->_controller->Auth->allowedActions = array($action);
        } else {
            
            $renamedActions['index'] = 'View';
            
            $action = (!empty($renamedActions[$action])) ? $renamedActions[$action] : $action;
                    
            $linkAction = Inflector::humanize($controller) . '/' . Inflector::humanize($action);
            if ($this->_controller->RequestHandler->isAjax()) {
                $this->_controller->Session->setFlash('You do not have the permission to access this option (' . $linkAction . ').', 'notification/top_right', array('type' => 'error'), 'top_right');
                throw new MethodNotAllowedException('You do not have the permission to access this option (' . $linkAction . ').');
            } else {
                $this->_controller->Session->setFlash('You do not have the permission to access this option (' . $linkAction . ').', 'notification/top_right', array('type' => 'error'), 'top_right');
            }
            $this->_controller->redirect($this->_controller->referer());
        }
    }

}
