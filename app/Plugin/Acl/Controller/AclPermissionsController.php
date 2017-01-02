<?php
/**
 * AclPermissions Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Kings Desktop Application
 * @version  1.0
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class AclPermissionsController extends AclAppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'AclPermissions';

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array(
        'Acl.AclAco',
        'Acl.AclAro',
        'Acl.AclPermission',
        'Role',
    );

    /**
     * beforeFilter
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
    }

    /**
     * admin_index
     *
     * @return void
     */
    public function admin_index($roleId) {
        $this->AclFilter->authManual('Roles', 'permissions');
        
        $this->set('title_for_layout', __('Permissions'));

        $this->loadModel('Acl.AclAro');
        $this->loadModel('Role');
        $aro = $this->AclAro->find('first', array(
            'conditions' => array(
                'AclAro.model' => 'Role',
                'AclAro.foreign_key' => $roleId,
            ),
        ));
        
        $role = $this->Role->find('first', array(
            'conditions' => array(
                'Role.id' => $roleId,
            ),
        ));

        if (empty($aro) || $roleId == 1) {
            $this->redirect($this->referer());
        }

        $aroId = $aro['AclAro']['id'];
        if ($this->request->is('post')) {
		    //  echo "<pre>";
		    ///  print_r($this->request->data); die;
            foreach ($this->request->data['aco'] as $acoId => $checked) {
                // echo $checked[0]; die;
                $this->AclPermission->create();
                $hasAny = array(
                    'aco_id' => $acoId,
                    'aro_id' => $aroId,
                );
                $status = (!empty($checked[1])) ? $checked[1] : 0;
                $updated = array(
                    'aco_id' => $acoId,
                    'aro_id' => $aroId,
                    '_create' => $status,
                    '_read' => $status,
                    '_update' => $status,
                    '_delete' => $status,
                );
                if ($this->AclPermission->hasAny($hasAny)) {
                    $this->AclPermission->updateAll($updated, $hasAny);
                } else {
                    $this->AclPermission->save($updated);
                }
            }
            //$this->redirect(array('plugin'=>false,'controller'=>'groups','admin'=>false));
        }
        $acoConditions = array(
            'parent_id !=' => null,
            //'model' => null,
            'foreign_key' => null,
            'alias !=' => null,
        );
        $this->Acl->Aco->recursive = -1;
        $acos = $this->Acl->Aco->find('threaded', array('conditions' => $acoConditions, 'fields' => array('id', 'alias', 'parent_id')));

        $roles = $this->Role->find('list');
        $this->set(compact('acos', 'roles'));


        $permissions = array();
        $maxChild = 0;

        foreach ($acos as $key => $acoAlias) {
            $childCount = 0;
            $permission = array();
            if (!empty($acoAlias['children'])) {
                foreach ($acoAlias['children'] as $cKey => $children) {

                    $hasAny = array(
                        'aco_id' => $children['Aco']['id'],
                        'aro_id' => $aroId,
                        '_create' => 1,
                        '_read' => 1,
                        '_update' => 1,
                        '_delete' => 1,
                    );
                    if ($this->AclPermission->hasAny($hasAny)) {
                        $permission = 1;
                    } else {
                        $permission = 0;
                    }
                    $acos[$key]['children'][$cKey]['Aco']['permission'] = $permission;
                    $childCount++;
                }
                if ($childCount > $maxChild) {
                    $maxChild = $childCount;
                }
            }
        }
        // pr($acos);die;
        $title_for_layout = 'Edit Role Permissions';
        $this->set(compact('acos', 'maxChild', 'roleId', 'aro', 'title_for_layout','role'));
    }

    /**
     * admin_toggle
     *
     * @param integer $acoId
     * @param integer $aroId
     * @return void
     */
    public function admin_toggle($acoId, $aroId) {
        if (!$this->RequestHandler->isAjax()) {
            $this->redirect(array('action' => 'index'));
        }

        // see if acoId and aroId combination exists
        $conditions = array(
            'AclPermission.aco_id' => $acoId,
            'AclPermission.aro_id' => $aroId,
        );
        if ($this->AclPermission->hasAny($conditions)) {
            $data = $this->AclPermission->find('first', array('conditions' => $conditions));
            if ($data['AclPermission']['_create'] == 1 &&
                    $data['AclPermission']['_read'] == 1 &&
                    $data['AclPermission']['_update'] == 1 &&
                    $data['AclPermission']['_delete'] == 1) {
                // from 1 to 0
                $data['AclPermission']['_create'] = 0;
                $data['AclPermission']['_read'] = 0;
                $data['AclPermission']['_update'] = 0;
                $data['AclPermission']['_delete'] = 0;
                $permitted = 0;
            } else {
                // from 0 to 1
                $data['AclPermission']['_create'] = 1;
                $data['AclPermission']['_read'] = 1;
                $data['AclPermission']['_update'] = 1;
                $data['AclPermission']['_delete'] = 1;
                $permitted = 1;
            }
        } else {
            // create - CRUD with 1
            $data['AclPermission']['aco_id'] = $acoId;
            $data['AclPermission']['aro_id'] = $aroId;
            $data['AclPermission']['_create'] = 1;
            $data['AclPermission']['_read'] = 1;
            $data['AclPermission']['_update'] = 1;
            $data['AclPermission']['_delete'] = 1;
            $permitted = 1;
        }

        // save
        $success = 0;
        if ($this->AclPermission->save($data)) {
            $success = 1;
        }
        $this->layout = false;
        $this->set(compact('acoId', 'aroId', 'data', 'success', 'permitted'));
    }

}
