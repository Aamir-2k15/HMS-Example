<?php
/**
* Plugin Name: Hospital Management System
* Plugin URI: https://aammir.github.io
* Description: A Mini Hospital Management System
* Version: 1.0
* Author:  Aamir Hussain
* Author URI: https://aammir.github.io
* Text Domain: hms
**/
require_once( plugin_dir_path( __FILE__ ).'inc/admin-settings.php');
require_once( plugin_dir_path( __FILE__ ).'inc/common.php');
require_once( plugin_dir_path( __FILE__ ).'inc/hms_members_posttype.php');
require_once( plugin_dir_path( __FILE__ ).'inc/hms_contacts_posttype.php');
require_once( plugin_dir_path( __FILE__ ).'inc/hms_insurance_posttype.php');
require_once( plugin_dir_path( __FILE__ ).'frontend/shortcodes.php');

function hms_admin_assets() {
		wp_enqueue_script( 'hms_admin_js',  plugin_dir_url( __FILE__ ) . "assets/js/hms_admin_js.js");
		//wp_enqueue_script( 'hms_color_picker_js',  plugin_dir_url( __FILE__ ) . "assets/js/jquery.minicolors.js");
		wp_enqueue_style( 'hms_admin_css',  plugin_dir_url( __FILE__ ) . "assets/css/hms_admin_css.css");
		//wp_enqueue_style( 'hms_color_picker_css',  plugin_dir_url( __FILE__ ) . "assets/css/jquery.minicolors.css");
    }
add_action( 'admin_enqueue_scripts', 'hms_admin_assets' );

function hms_frontend_assets() {
    // Enqueue jQuery
    wp_enqueue_script('jquery');
    
    // Enqueue Bootstrap CSS
    wp_enqueue_style('hms_bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2', 'all');
    
    // Enqueue your custom frontend CSS
    wp_enqueue_style('hms_frontend_css', plugin_dir_url(__FILE__) . 'assets/css/hms_frontend_css.css', array(), '1.0', 'all');
    
    // Enqueue Bootstrap JS with jQuery as a dependency
    wp_enqueue_script('hms_bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.5.2', true);
    
    // Enqueue your custom frontend JS
    wp_enqueue_script('hms_frontend_js', plugin_dir_url(__FILE__) . 'assets/js/hms_frontend_js.js', array('jquery', 'hms_bootstrap_js'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'hms_frontend_assets');

