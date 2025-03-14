<?php
/*
Plugin ID: 				css_injector
Plugin Name: 			Custom CSS Injector
Plugin Short Name:		CSS Injector
Description: 			Super simple solution to add, edit and control custom CSS code in selected areas of Your WordPress website.
Icon:					code
Plugin URI:				https://wordpress.org/plugins/css-injector/
Version:     			1.0.1
Version Type: 			Free
Author:      			77 Solutions
Author URI:  			http://77solutions.eu
License:				GPLv3
License URI:			https://www.gnu.org/licenses/gpl-3.0.txt
*/
/**
 * index.php
 * 
 * @file ./index.php
 * @package 77solutions.CSSInjector
 * @author 77 Solutions, Matthew Lukas Mania
 * @license GPLv3
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 */
/*
This file is part of Custom CSS Injector.

Custom CSS Injector is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

Custom CSS Injector is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Custom CSS Injector.  If not, see https://www.gnu.org/licenses/gpl-3.0.txt.
*/


if(!defined('ABSPATH')){ exit; }


add_action('init', function (){ ob_start(); });

require_once('_core/1.0.0L/WP77_load.php');
require_once('_plugin/index.php');
?>