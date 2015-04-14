<?php

/*
Google CDN jQuery with a local fallback
=======================================
See http://www.wpcoke.com/load-jquery-from-cdn-with-local-fallback-for-wordpress/
*/

if( !is_admin()){
	$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js';
	$test_url = @fopen($url,'r');
	if($test_url !== false) {
		function load_external_jQuery() {
			wp_deregister_script('jquery');
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
			wp_enqueue_script('jquery');
		}
		add_action('wp_enqueue_scripts', 'load_external_jQuery');
	} else {
		function load_local_jQuery() {
			wp_deregister_script('jquery');
			wp_register_script('jquery', get_bloginfo('template_url').'/js/jquery-1.11.2.min.js', __FILE__, false, '1.11.2', true);
			wp_enqueue_script('jquery');
		}
		add_action('wp_enqueue_scripts', 'load_local_jQuery');
	}
}

function frengers_enqueues() {

/*
OPTIONAL: Enqueue WordPress's onboard jQuery
============================================
Un-comment the next two lines of code if you want to use WordPress's onboard jQuery INSTEAD of the Google CDN jQuery above.
	wp_register_script('jquery', get_bloginfo('template_url').'/js/jquery-1.11.2.min.js', __FILE__, false, '1.11.2', true);
	wp_enqueue_script( 'jquery' );
*/

	wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, '3.3.2', null);
	wp_enqueue_style('bootstrap-css');

/*
OPTIONAL: Bootstrap Theme enqueued
==================================
Delete (or comment-out) the next two lines of code below if you don't want the Bootstrap Theme.
*/
  	wp_register_style('bootstrap-theme-css', get_template_directory_uri() . '/css/bootstrap-theme.min.css', false, null);
	wp_enqueue_style('bootstrap-theme-css');

  	wp_register_style('frengers-css', get_template_directory_uri() . '/css/frengers.css', false, null);
	wp_enqueue_style('frengers-css');

	wp_register_style('fontawesome-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_enqueue_style('fontawesome-css');

  	wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', false, null, false);
	wp_enqueue_script('modernizr');

  	wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', false, null, true);
	wp_enqueue_script('bootstrap-js');

	wp_register_script('packery-js', get_template_directory_uri() . '/js/packery.js', false, null, true);
	wp_enqueue_script('packery-js');

		wp_register_script('frengers-js', get_template_directory_uri() . '/js/frengers.js', false, null, true);
	wp_enqueue_script('frengers-js');


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'frengers_enqueues', 100);
