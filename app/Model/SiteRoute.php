<?php

/**
 * Message
 *
 * PHP version 5
 *
 * @category Model
 */
class SiteRoute extends AppModel {

    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'SiteRoute';

    /**
     * Validation
     *
     * @var array
     * @access public
     */
    public $validate = array(
        'slug' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'notEmpty'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'isUnique'
            ),
            'length' => array(
                'rule' => array('maxLength', '64'),
                'message' => 'maxLength'
            )
        )
    );

    /**
     * __construct
     *
     * @param mixed $id
     * @param string $table
     * @param DataSource $ds
     */
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->settingsPath = APP . 'Config' . DS . 'routes.yml';
    }

    /**
     * beforeSave
     *
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {
        if (!empty($this->data['SiteRoute']['slug'])) {
            $this->data['SiteRoute']['slug'] = strtolower(Inflector::slug($this->data['SiteRoute']['slug'], '-'));
        }

        return true;
    }

    /**
     * afterSave callback
     *
     * @return void
     */
    public function afterSave($created, $options = Array()) {
        $this->_update_links_routes();
    }

    /**
     * afterDelete callback
     *
     * @return void
     */
    public function afterDelete() {
        $this->_update_links_routes();
    }

    public function _update_links_routes() {

        $links_routes = $this->find('all', array(
            'recursive' => -2,
            'fields' => 'id,slug,model',
        ));
        // pr($links_routes); die;
        if ($links_routes) {
            $routes = NULL;
            foreach ($links_routes as $data) {
                $controller = strtolower(Inflector::pluralize($data['SiteRoute']['model']));
                $routes[$data['SiteRoute']['slug']] = array('plugin' => false, 'controller' => $controller, 'action' => 'view', $data['SiteRoute']['slug']);
            }
            //Cache::write('links_routes', $routes);
            $file = new File($this->settingsPath, true);

            $listYaml = Spyc::YAMLDump($routes, 4, 60);
            $file->write($listYaml);
        }
        return true;
    }

    public static function _linkStringToArray($link) {
        $link = explode('/', $link);
        $linkArr = array();
        foreach ($link as $linkElement) {
            if ($linkElement != null) {
                $linkElementE = explode(':', $linkElement);
                if (isset($linkElementE['1'])) {
                    $linkArr[$linkElementE['0']] = $linkElementE['1'];
                } else {
                    $linkArr[] = $linkElement;
                }
            }
        }
        if (!isset($linkArr['plugin'])) {
            $linkArr['plugin'] = false;
        }

        return $linkArr;
    }

}
