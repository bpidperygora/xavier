<?php
/*
 * Add custom post type
 */




function wpdocs_create_post_type() {
	register_post_type( 'banks',
		array(
			'labels'       => array(
				'name'          => __( 'Bank\'s', 'textdomain' ),
				'singular_name' => __( 'Bank', 'textdomain' )
			),
			'public'       => true,
			'has_archive'  => true,
			'hierarchical' => true,
			'menu_icon'    => 'dashicons-store',
			'supports'     => array( 'title', 'thumbnail', 'editor' ),
			'taxonomies'   => array( 'category', 'post_tag', '', '' ),

		)
	);
}

add_action( 'init', 'wpdocs_create_post_type', 0 );

function disable_gutenberg_for_custom_post_type($is_enabled, $post_type) {

	if ($post_type === 'banks') return false;

	return $is_enabled;

}
add_filter('gutenberg_can_edit_post_type', 'disable_gutenberg_for_custom_post_type', 10, 2);