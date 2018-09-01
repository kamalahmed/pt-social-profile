<?php
// add styles and scripts
function ptsp_add_scripts(){
    wp_enqueue_style('ptsp-main-style', plugins_url().'/PT-Social-Profile/css/style.css');
    wp_enqueue_script('ptsp-main-script', plugins_url().'/PT-Social-Profile/js/main.js');

}

//hook into the wp enqeue scripts
add_action('wp_enqueue_scripts', 'ptsp_add_scripts');