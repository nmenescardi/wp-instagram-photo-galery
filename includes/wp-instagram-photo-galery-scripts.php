<?php

// Adding Scripts
function wpipg_add_scripts(){
	wp_enqueue_style('wpipg-basic-style', plugins_url() . '/wp-instagram-photo-galery/css/style.css');
	
	wp_enqueue_script('wpipg-basic-script', plugins_url() . '/wp-instagram-photo-galery/js/main.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'wpipg_add_scripts');