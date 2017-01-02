<?php

/**
 * Routes file for CakePHP Blog Plugin
 *
 * @author Neil Crookes <neil@crook.es>
 * @link http://www.neilcrookes.com http://neil.crook.es
 * @copyright (c) 2011 Neil Crookes
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */
Router::parseExtensions('rss');
Router::connect('/faq', array('plugin' => 'Faq', 'controller' => 'faqs', 'action' => 'index'));
Router::connect('/faq/category', array('plugin' => 'Faq', 'controller' => 'faq_categories', 'action' => 'index'));
Router::connect('/faqlist', array('plugin' => 'Faq', 'controller' => 'faqs', 'action' => 'view'));
