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
Router::connect('/testimonials', array('plugin' => 'Testimonial', 'controller' => 'testimonials', 'action' => 'index'));
