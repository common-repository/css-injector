<?php
/**
 * uninstall.php
 * 
 * @file ./uninstall.php
 * @package 77solutions.CSSInjector
 * @author 77 Solutions, Matthew Lukas Mania
 * @license GPLv3
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 */
/*
This file is part of Custom CSS Injector.

Custom CSS Injector is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or any later version.

Custom CSS Injector is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Custom CSS Injector. If not, see https://www.gnu.org/licenses/gpl-3.0.txt.
*/


if(!defined('ABSPATH')){ exit; }

if(!defined('WP_UNINSTALL_PLUGIN')){ exit; }


require_once('_core/1.0.0L/WP77_load.php');


$_plugin -> OptionDelete('dashboard_css_head_enabled');
$_plugin -> OptionDelete('dashboard_css_head_code');
$_plugin -> OptionDelete('dashboard_css_head_code_safe');

$_plugin -> OptionDelete('dashboard_css_foot_enabled');
$_plugin -> OptionDelete('dashboard_css_foot_code');
$_plugin -> OptionDelete('dashboard_css_foot_code_safe');

$_plugin -> OptionDelete('login_css_head_enabled');
$_plugin -> OptionDelete('login_css_head_code');
$_plugin -> OptionDelete('login_css_head_code_safe');

$_plugin -> OptionDelete('login_css_foot_enabled');
$_plugin -> OptionDelete('login_css_foot_code');
$_plugin -> OptionDelete('login_css_foot_code_safe');

$_plugin -> OptionDelete('recovery_css_head_enabled');
$_plugin -> OptionDelete('recovery_css_head_code');
$_plugin -> OptionDelete('recovery_css_head_code_safe');

$_plugin -> OptionDelete('recovery_css_foot_enabled');
$_plugin -> OptionDelete('recovery_css_foot_code');
$_plugin -> OptionDelete('recovery_css_foot_code_safe');

$_plugin -> OptionDelete('register_css_head_enabled');
$_plugin -> OptionDelete('register_css_head_code');
$_plugin -> OptionDelete('register_css_head_code_safe');

$_plugin -> OptionDelete('register_css_foot_enabled');
$_plugin -> OptionDelete('register_css_foot_code');
$_plugin -> OptionDelete('register_css_foot_code_safe');

$_plugin -> OptionDelete('site_css_head_enabled');
$_plugin -> OptionDelete('site_css_head_code');
$_plugin -> OptionDelete('site_css_head_code_safe');

$_plugin -> OptionDelete('site_css_foot_enabled');
$_plugin -> OptionDelete('site_css_foot_code');
$_plugin -> OptionDelete('site_css_foot_code_safe');
?>