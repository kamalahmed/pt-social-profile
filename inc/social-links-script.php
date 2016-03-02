<?php
//gives same result
//var_dump(plugin_dir_path(__FILE__).'something/inside/something.jpg');
////string(106) "/Applications/MAMP/htdocs/themedev/wp-content/plugins/PT-Social-Profile/inc/something/inside/something.jpg"
//var_dump(plugins_url('anything/inside/something.jpg', __FILE__));
//// string(92) "http://theme.dev:8888/wp-content/plugins/PT-Social-Profile/inc/anything/inside/something.jpg"
//die();


// add styles and scripts
function ptsp_add_scripts(){
    wp_enqueue_style('ptsp-main-style', plugins_url().'/PT-Social-Profile/css/style.css');
    wp_enqueue_script('ptsp-main-script', plugins_url().'/PT-Social-Profile/js/main.js');

}

//hook into the wp enqeue scripts
add_action('wp_enqueue_scripts', 'ptsp_add_scripts');