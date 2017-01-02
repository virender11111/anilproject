<?php

/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    /**
     * use Caching
     *
     * @var string
     */
    public $useCache = true;

    /**
     * use in agrigates function round of value
     *
     * @var string
     */
    public $precision = 2;

    /**
     * Override find function to use caching
     *
     * Caching can be done either by unique names,
     * or prefixes where a hashed value of $options array is appended to the name
     * 
     * @param mixed $type 
     * @param array $options 
     * @return mixed
     * @access public
     */
    public function find($type = 'first', $options = array()) {
        if ($this->useCache) {

            $cachedResults = $this->_findCached($type, $options);

            if ($cachedResults) {
                return $cachedResults;
            }
        }

        $args = func_get_args();
        $results = call_user_func_array(array('parent', 'find'), $args);

        if ($this->useCache) {

            if (isset($options['cache']['name']) && isset($options['cache']['config'])) {
                $cacheName = $options['cache']['name'];
            } elseif (isset($options['cache']['prefix']) && isset($options['cache']['config'])) {
                $cacheName = $options['cache']['prefix'] . md5(serialize($options));
            }

            if (isset($cacheName)) {
                $cacheName .= '_' . Configure::read('Config.language');
                Cache::write($cacheName, $results, $options['cache']['config']);
            }
        }
        return $results;
    }

    /**
     * Check if find() was already cached
     *
     * @param mixed $type
     * @param array $options
     * @return void
     * @access private
     */
    protected function _findCached($type, $options) {
        if (isset($options['cache']['name']) && isset($options['cache']['config'])) {
            $cacheName = $options['cache']['name'];
        } elseif (isset($options['cache']['prefix']) && isset($options['cache']['config'])) {
            $cacheName = $options['cache']['prefix'] . md5(serialize($options));
        } else {
            return false;
        }

        $cacheName .= '_' . Configure::read('Config.language');
        $results = Cache::read($cacheName, $options['cache']['config']);
        if ($results) {
            return $results;
        }
        return false;
    }

    /**
     * Updates multiple model records based on a set of conditions.
     *
     * call afterSave() callback after successful update.
     *
     * @param array $fields	 Set of fields and values, indexed by fields.
     * 						  Fields are treated as SQL snippets, to insert literal values manually escape your data.
     * @param mixed $conditions Conditions to match, true for all records
     * @return boolean True on success, false on failure
     * @access public
     */
    public function updateAll($fields, $conditions = true) {
        $args = func_get_args();
        $output = call_user_func_array(array('parent', 'updateAll'), $args);
        if ($output) {
            $created = false;
            $options = array();
            $this->Behaviors->trigger('afterSave', array(
                &$this,
                $created,
                $options,
            ));
            $this->afterSave($created);
            $this->_clearCache();
            return true;
        }
        return false;
    }

    public function exists($id = null) {
        if ($this->Behaviors->attached('SoftDelete')) {
            return $this->existsAndNotDeleted($id);
        } else {
            return parent::exists($id);
        }
    }

    public function delete($id = null, $cascade = true) {
        $result = parent::delete($id, $cascade);
        if ($result === false && $this->Behaviors->enabled('SoftDelete')) {
            return (bool) $this->field('deleted', array('deleted' => 1));
        }
        return $result;
    }

    /**
     * Global function to access last run sql query
     *
     * @var array
     * @access public
     */
    public function getLastQuery() {
        $dbo = $this->getDatasource();
        $logs = $dbo->getLog();
        $lastLog = end($logs['log']);
        return $lastLog['query'];
    }

    /**
     * Global function to check wether a given number is postive and >= 0
     *
     * @var array
     * @access public
     * @author Vineet
     */
    public function is_numeric($check, $field) {
        if (!empty($this->data[$this->alias][$field])) {
            if ($this->data[$this->alias][$field] < 0) {
                return __('IsNumeric');
            }
            return true;
        }
        return true;
    }

    /**
     * Global function to check whether a given number is postive and > 0
     *
     * @var array
     * @access public
     * @author Vineet
     */
    public function greater_zero($check, $field) {
        if (isset($this->data[$this->alias][$field]) && $this->data[$this->alias][$field] <= 0) {
            return __('GreaterZero');
        }
        return true;
    }

    /**
     * convert_errors
     * convert_errors function will convert model errors in human readable format / strings
     *
     * @return associative array 
     * @access public
     */
    public function convert_errors($errors, $converts = array()) {
        $return = $targetErrors = array();

        $errors = Hash::flatten($errors);
        foreach ($errors as $key => $value) {
            $getKey = explode(".", $key);
            array_pop($getKey);
            $targetErrors[end($getKey)] = $value;
        }

        if (!empty($targetErrors)) {
            if (!empty($converts)) {
                foreach ($targetErrors as $key => $value) {
                    if (isset($converts[$key])) {
                        $targetErrors[$converts[$key]] = $value;
                        unset($errors[$key]);
                    }
                }
            }

            $first = true;
            foreach ($targetErrors as $key => $value) {
                if ($first) {
                    if (!empty($value))
                        $return[Inflector::humanize($key)] = $value;
                    $first = false;
                }
            }
        }
        return $return;
    }

}
