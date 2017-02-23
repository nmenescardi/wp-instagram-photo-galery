<?PHP
/*
Plugin Name: Wordpress Plugin Instagram Photo Galery
Description: Shows up an Instagram Photo Galery
Version: 1.0
Author: Nicolas Menescardi
Author URI: https://github.com/nmenescardi
*/

//Exit if accessed Directly
if(!defined('ABSPATH')){
	exit;
}

//Global Option Variable
$wpipg_options = get_option('wpipg_settings');

//Load Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/wp-instagram-photo-galery-scripts.php');

//Load Shortcodes
require_once(plugin_dir_path(__FILE__) . '/includes/wp-instagram-photo-galery-shortcodes.php');


// Load admin scripts
if( is_admin() ){
	require_once(plugin_dir_path(__FILE__) . '/includes/wp-instagram-photo-galery-settings.php');
}