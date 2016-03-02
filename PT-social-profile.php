<?php

/*
Plugin Name: PT Social Profile
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A plugin for displaying social profile links on widget areas on any WordPress Theme
Version: 1.0
Author: Kamal Ahmed
Author URI: http://URI_Of_The_Plugin_Author
Text Domain: PTSP
License: A "Slug" license name e.g. GPL2
*/

// Exit if the file is accessed directly
if(!defined('ABSPATH')){
    exit;
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