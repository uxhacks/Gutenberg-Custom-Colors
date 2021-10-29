<?php

// ACF Blocks

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( !class_exists('acf') ) {
    $acf_dir = ABSPATH . 'wp-content/plugins/advanced-custom-fields-pro/';
    include_once( $acf_dir . '/acf.php' );
}
add_filter('acf/settings/load_json', 'register_acf_json_load_point');

function register_acf_json_load_point( $paths ) {

    // Change to Theme
	   $path = get_stylesheet_directory() . '/acf-json';
    // append path
    $paths[] = $path;
    // return
    return $paths;
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {   
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
}

function register_acf_block_types() {
        // Check function exists.
        if( function_exists('acf_register_block_type') ) {

            // Register a testimonial block.
            acf_register_block_type(array(
                'name'              => 'testblock',
                'title'             => __('Test Block'),
                'description'       => __('A test block.'),
                'render_template'   => 'template-parts/blocks/testblock/testblock.php',
                'category'          => 'uxhacks',
            ));
        }
}
add_action('acf/init', 'register_acf_block_types');