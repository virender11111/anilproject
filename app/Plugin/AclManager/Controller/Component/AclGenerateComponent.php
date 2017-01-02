<?php

App::uses('Folder', 'Utility');

/**
 * AclGenerate Component
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
class AclGenerateComponent extends Component {

/**
 * _controller
 *
 * @var Controller
 */
	protected $_controller = null;

/**
 * _folder
 *
 * @var Folder
 */
	protected $_folder = null;

/**
 * @param object $controller controller
 * @param array  $settings   settings
 */
	public function initialize(Controller $controller) {
		$this->_controller =& $controller;
		$this->_folder = new Folder;
	}

/**
 * List all controllers (including plugin controllers)
 *
 * @return array
 */
	public function listControllers() {
		$controllerPaths = array();

		// app/controllers
		$this->_folder->path = APP . 'Controller' . DS;
		$controllers = $this->_folder->read();
		foreach ($controllers['1'] as $c) {
			if (substr($c, strlen($c) - 4, 4) == '.php') {
				$cName = str_replace('Controller.php', '', $c);
				// skip AppController and CakeError
				if ($cName == 'App' || $cName == 'CakeError') {
					continue;
				}
				$controllerPaths[$cName] = APP . 'Controller' . DS . $c;
			}
		}

		// plugins/*/controllers/
		$this->_folder->path = APP . 'Plugin' . DS;
		$plugins = $this->_folder->read();
		foreach ($plugins['0'] as $p) {
			if ($p != 'Install') {
				if (!CakePlugin::loaded($p)) {
					continue;
				}
				$this->_folder->path = APP . 'Plugin' . DS . $p . DS . 'Controller' . DS;
				$pluginControllers = $this->_folder->read();
				foreach ($pluginControllers['1'] as $pc) {
					if (substr($pc, strlen($pc) - 4, 4) == '.php') {
						$pcName = str_replace('Controller.php', '', $pc);
						if ($pcName == $p . 'App') {
							continue; // skip PluginAppController
						}
						$controllerPaths[$pcName] = APP . 'Plugin' . DS . $p . DS . 'Controller' . DS . $pc;
					}
				}
			}
		}

		return $controllerPaths;
	}

/**
 * List actions of a particular Controller.
 *
 * @param string  $name Controller name (the name only, without having Controller at the end)
 * @param string  $path full path to the controller file including file extension
 * @param boolean $all  default is false. it true, private actions will be returned too.
 *
 * @return array
 */
	public function listActions($name, $path) {
		// base methods
		if (strstr($path, APP . 'Plugin')) {
			$plugin = $this->getPluginFromPath($path);
			$pacName = $plugin . 'AppController'; // pac - PluginAppController
			$pacPath = $plugin . '.Controller';
			App::uses($pacName, $pacPath);
			$baseMethods = get_class_methods($pacName);
		} else {
			$baseMethods = get_class_methods('AppController');
			$pacPath = 'Controller';
		}

		$controllerName = $name . 'Controller';
		App::uses($controllerName, $pacPath);
		$methods = get_class_methods($controllerName);

		// filter out methods
		foreach ($methods as $k => $method) {
			if (strpos($method, '_', 0) === 0) {
				unset($methods[$k]);
				continue;
			}
			if (in_array($method, $baseMethods)) {
				unset($methods[$k]);
				continue;
			}
		}

		return $methods;
	}

/**
 * Get plugin name from path
 *
 * @param string $path file path
 *
 * @return string
 */
	public function getPluginFromPath($path) {
		$pathE = explode(DS, $path);
		$pluginsK = array_search('Plugin', $pathE);
		$pluginNameK = $pluginsK + 1;
		$plugin = $pathE[$pluginNameK];

		return $plugin;
	}
	
	/**
 * Get plugin name from path
 *
 * @param string $path file path
 *
 * @return string
 */
	
	public function generate_aros( $run = true ){
		if (isset($run)) {
			$this->_controller->loadModel('Role');
			//$this->_controller->loadModel('User');
            $roles = $this->_controller->Role->find('all', array( 'order'=>array('Role.title'=>'ASC'),'contain' => false, 'recursive' => -1));
			//pr($roles);die;
			$missing_aros = array('roles' => array());
			
			/*$users = $this->_controller->User->find('all', array('order' => 'User.first_name', 'contain' => false, 'recursive' => -1));
        
			foreach ($users as $user) {
				//
				// * Check if ARO for user exist
				// 
				$aro = $this->_controller->Acl->Aro->find('first', array('conditions' => array('model' => 'User', 'foreign_key' => $user['User']['id'])));
	
				if (empty($aro)) {
					$missing_aros['users'][] = $user;
				}
			}
		*/
			foreach ($roles as $role) {
				
				/*
				 * Check if ARO for role exist
				 */
				$aro = $this->_controller->Acl->Aro->find('first', array('conditions' => array('model' => 'Role', 'foreign_key' => $role['Role']['id'])));
	
				if (empty($aro)) {
			//pr($aro);die;
					$missing_aros['roles'][] = $role;
				}
			}
            /*
             * Complete roles AROs
             */
            if (count($missing_aros['roles']) > 0) {
                foreach ($missing_aros['roles'] as $k => $role) {
                    $this->_controller->Acl->Aro->create(array('parent_id' => null,
                        'model' => 'Role',
                        'foreign_key' => $role['Role']['id'],
                        'alias' => $role['Role']['title']
						)
					);

                    if ($this->_controller->Acl->Aro->save()) {
                        unset($missing_aros['roles'][$k]);
                    }
                }
            }
			
			/*
             * Complete users AROs
             */
           /* if (count($missing_aros['users']) > 0) {
                foreach ($missing_aros['users'] as $k => $user) {
                    
                     // Find ARO parent for user ARO
                   
                    $parent_id = $this->_controller->Acl->Aro->field('id', array('model' => 'Group', 'foreign_key' => $user['User']['id']));

                    if (empty($parent_id) ) {
                        $this->_controller->Acl->Aro->create(array('parent_id' => $parent_id,
                            'model' => 'User',
                            'foreign_key' => $user['User']['id'],
                            'alias' => $user['User']['user_initials']));

                        if ($this->_controller->Acl->Aro->save()) {
                            unset($missing_aros['users'][$k]);
                        }
                    }
                }
            }*/
            
        }
		return true;
	}
	
	public function set_group_permission( $acos = array(), $roleId, $status = 1 ){
		
		$this->_controller->loadModel('AclManager.AclAro');
		$this->_controller->loadModel('AclManager.AclPermission');
		$this->_controller->loadModel('AclManager.Aco');
		$aro = $this->_controller->AclAro->find('first', array(
			'conditions' => array(
				'AclAro.model' => 'Role',
				'AclAro.foreign_key' => $roleId,
			),
		));
		
		if( empty($aro) || $roleId == 1){
			return true;
		}
		
		$aroId = $aro['AclAro']['id'];
		
		if( empty( $acos) ) {
			$acoConditions = array(
					'parent_id !=' => null,
					//'model' => null,
					'foreign_key' => null,
					'alias !=' => null,
				);
				
			$this->_controller->Acl->Aco->recursive = -1;
			$acos  = $this->_controller->Acl->Aco->find('threaded', array('conditions'=>$acoConditions,'fields'=>array('id','alias','parent_id')));
			$permission = array();
			foreach ($acos as $key => $acoAlias) {
				
				if( !empty($acoAlias['children']) ) { 
					foreach ($acoAlias['children'] as $cKey=> $children) {
						$permission[$children['Aco']['id']] = $children['Aco']['alias'];
						
					}
					
				}
			}
			$acos = $permission;
		
		}
		foreach($acos as $acoId => $checked) {
				
			$this->_controller->AclPermission->create();
			$hasAny = array(
					'aco_id'  => $acoId,
					'aro_id'  => $aroId,
					
				);
				$updated = array(
					'aco_id'  => $acoId,
					'aro_id'  => $aroId,
					'_create' => $status,
					'_read'   => $status,
					'_update' => $status,
					'_delete' => $status,
				);
				if ($this->_controller->AclPermission->hasAny($hasAny)) {
					$this->_controller->AclPermission->updateAll($updated, $hasAny);
				} else {
					$this->_controller->AclPermission->save($updated);
				}
		}
		return true;
	}

}
