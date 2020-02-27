<?php
/*
 * ACF options
 */

// Remove ACF Settings form Admin Panel

//add_filter('acf/settings/show_admin', '__return_false');


// Google Map API kay
//
//function my_acf_init() {
//
//	acf_update_setting( 'google_api_key', 'AIzaSyA8D04ffBh0L32J_qtkhSee-S4pEFYmoVM' );
//}
//
//add_action( 'acf/init', 'my_acf_init' );


// Add Theme Options


if ( function_exists( 'acf_add_options_page' ) ) {

	$parent = acf_add_options_page( array(

		'page_title' => 'Налаштування Сайту',
		'menu_slug'  => 'acf-options',
		'menu_title' => 'Налаштування Сайту',
		'icon_url'   => 'dashicons-welcome-widgets-menus',
		'redirect'   => true,
		'post_id'    => 'options',
		'autoload'   => false,

	) );

//	acf_add_options_sub_page( array(
//		'page_title'  => 'Site Options',
//		'menu_title'  => 'Site Options',
//		'parent_slug' => $parent['menu_slug'],
//	) );
}


