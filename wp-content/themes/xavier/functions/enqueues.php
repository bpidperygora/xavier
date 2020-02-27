<?php
/**!
 * Enqueues
 */

if ( ! function_exists( 'style_and_script' ) ) {
	function style_and_script() {

		///
		///  Styles
		///
		wp_register_style( 'main.css', get_template_directory_uri() . '/build/css/main.css', false, null );
		wp_enqueue_style( 'main.css' );
		wp_register_style( 'datepicker.css', get_template_directory_uri() . '/build/css/components/datepicker.css', false, null );

		//components



		///
		///  Scripts
		///

		wp_deregister_script( 'jquery' );

		wp_register_script( 'libs.min.js', get_template_directory_uri() . '/build/js/libs.min.js', false, null, true );
		wp_enqueue_script( 'libs.min.js' );

		wp_register_script( 'main.js', get_template_directory_uri() . '/build/js/main.js', false, null, true );
		wp_enqueue_script( 'main.js' );

		//components

		wp_register_script( 'jq-ui.min.js', get_template_directory_uri() . '/build/js/components/min/jq-ui.min.js', false, null, true );

		wp_register_script( 'apiControl.js', get_template_directory_uri() . '/build/js/components/apiControl.js', false, null, true );




		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'style_and_script', 100 );

