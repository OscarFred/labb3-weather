<?php
/**
 * Plugin Name: OF Weather
 * Description: A plugin to display weather for a selected area.
 * Version: 1.0
 * Author: Oscar Fredriksson
 */

if ( ! defined('ABSPATH')) {
    die;
}

class ofWeather {
    function __construct() {
        add_action('init', array($this, 'custom_post_type'));
    }
    function activate() {
        
    }

    function deactivate() {

    }
    
    function uninstall() {

    }
    
    function custom_post_type() {
        register_post_type('product', ['public' => true, 'label' => 'Product']);
    }
}
if ( class_exists('ofWeather')) {
    $ofWeather = new ofWeather('TESTHEST');
}
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('OF Weather options'),
            'menu_title'    => __('OF Weather options'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

//activation
register_activation_hook( __FILE__, array($ofWeather, 'activate') );
register_deactivation_hook( __FILE__, array($ofWeather, 'deactivate') );