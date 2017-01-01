<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
// Blog routing
//Router::connect('/blog', array('plugin' => true, 'controller' => 'blogPosts', 'action' => 'index'));


//Router::connect('/', array('plugin' => false, 'controller' => 'users', 'action' => 'login', 'admin' => true));
Router::connect('/', array('plugin' => false, 'controller' => 'users', 'action' => 'login','admin' => true));

Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => true));
//Router::connect('/site-admin', array('controller' => 'users', 'action' => 'login_new', 'admin' => true));
Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
Router::connect('/forgot', array('controller' => 'users', 'action' => 'forgot'));
Router::connect('/reset', array('controller' => 'users', 'action' => 'reset'));
Router::connect('/new_password', array('controller' => 'users', 'action' => 'new_password'));
Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
Router::connect('/search', array('controller' => 'campaigns', 'action' => 'searchitems'));

/* --------------- Front Pages ---------------------*/
Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
Router::connect('/who-we-are', array('controller' => 'pages', 'action' => 'who_we_are'));
Router::connect('/meet-our-team', array('controller' => 'pages', 'action' => 'our_team'));
Router::connect('/testimonials', array('controller' => 'pages', 'action' => 'testimonials'));
Router::connect('/what-we-do', array('controller' => 'pages', 'action' => 'what_we_do'));
Router::connect('/come-join-us', array('controller' => 'pages', 'action' => 'jobs'));
Router::connect('/just-contact-us', array('controller' => 'pages', 'action' => 'contact_us'));
Router::connect('/registered-providers', array('controller' => 'pages', 'action' => 'our_partners'));
Router::connect('/quality-assurance', array('controller' => 'pages', 'action' => 'quality_assurance'));
Router::connect('/buzz-hub', array('controller' => 'pages', 'action' => 'buzz_hub'));
Router::connect('/buzz-team', array('controller' => 'pages', 'action' => 'buzz_team'));
Router::connect('/buzz-brokerage', array('controller' => 'pages', 'action' => 'buzz_brokerage'));
Router::connect('/calendar', array('controller' => 'pages', 'action' => 'calendar'));
Router::connect('/specialist-services', array('controller' => 'pages', 'action' => 'specialist_services'));

Router::connect('/auth_login/*', array('controller' => 'users', 'action' => 'auth_login'));
Router::connect('/auth_callback/*', array('controller' => 'users', 'action' => 'auth_callback'));

Router::connect('/admin/roles/permissions/:id', array('plugin'=>'acl','controller' => 'AclPermissions', 'action' => 'index','admin'=>true), array('pass'=>array('id')));
/**
 * Load Dabase custom routes
 */
App::import('Vendor', 'Spyc/Spyc');

if (file_exists(APP . 'Config' . DS . 'routes.yml')) {
    $pageRoutes = Spyc::YAMLLoad(file_get_contents(APP . 'Config' . DS . 'routes.yml'));
    //pr($pageRoutes); die;
    foreach ($pageRoutes as $slug => $spec) {
        Router::connect("/" . $slug, $spec);
    }
}

Router::extensions(['rss']);

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes('Blog');
CakePlugin::routes('FullCalendar');
//CakePlugin::routes('AclManager');

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';

define('SITEURL', FULL_BASE_URL . router::url('/', false));
