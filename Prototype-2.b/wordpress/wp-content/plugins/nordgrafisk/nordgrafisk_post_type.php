<?php

/*
Plugin Name: Nord grafisk
Plugin URI: http://idyia.dk
Description: Et plugin til Jørgens Helte så vi kan få sparket gang i det her projekt
Version: 1.0
Author: Jørgens Helte
Author URI: hhp://idyia.dk
*/

class JW_Movies_Post_Type
{
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{
		$args = array(
			'labels' => array(
					'name' => 'Movies',
					'singular_name' => 'Movie',
					'add_new' => 'Add new Movie',
					'add_new_item' => 'Add new Movie',
					'edit_item' => 'Edit Item',
					'new_item' => 'Add New Item',
					'view_item' => 'View Movie',
					'search_items' => 'Search Movies',
					'not_found' => 'No Movies Found',
					'not_found_in_trash' => 'No Movies Found in Trash'
			),
			'query_var' => 'movies',
			'rewrite' => array(
				'slug' => 'movies/',
			),
			'public' => true
		);
		register_post_type('jw_movie', $args);
	}
}

add_action('init', function()
{
	new JW_Movies_Post_Type();
});