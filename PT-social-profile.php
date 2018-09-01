<?php

/*
Plugin Name: PT Social Profile
Plugin URI: http://kamaldeveloper.com/plugins
Description: A clean plugin for displaying social profile links on widget areas on any WordPress Theme
Version: 1.0
Author: Kamal Ahmed
Author URI: http://kamaldeveloper.com
License: GPL2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: PTSP
*/
/*
PT Social Profile is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright (C) 2018 Kamal Ahmed.
*/
// Exit if the file is accessed directly
if(!defined('ABSPATH')){
    exit();
}

//Load scripts
require_once(plugin_dir_path(__FILE__) . '/inc/social-links-script.php');

//Load class
require_once(plugin_dir_path(__FILE__) . '/inc/social-links-class.php');

// Register the widget
function register_pt_social_profile(){
    register_widget('PT_Social_Link_Widget');
}

// initializing the widget
add_action('widgets_init', 'register_pt_social_profile');