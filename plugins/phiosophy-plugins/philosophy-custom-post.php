<?php
/*
Plugin Name: Philosophy Custom Post
Plugin URI: http://amreshroy.unaux.com/plugins/philosophy-custom-post
Description: Philosophy Plugin For Custom Post
Version: 1.0.0
Author: Amresh Chandra Roy
Author URI: http://amreshroy.unaux.com
Text Domain: philosophy-plugins
*/

function cptui_register_my_cpts() {

	/**
	 * Post Type: Books.
	 */

	$labels = [
		"name" => __( "Books", "philosophy" ),
		"singular_name" => __( "book", "philosophy" ),
		"menu_name" => __( "Books", "philosophy" ),
		"all_items" => __( "My Books", "philosophy" ),
		"add_new" => __( "New Book", "philosophy" ),
		"add_new_item" => __( "Add new book", "philosophy" ),
		"edit_item" => __( "Edit book", "philosophy" ),
		"new_item" => __( "New book", "philosophy" ),
		"view_item" => __( "View book", "philosophy" ),
		"view_items" => __( "View Books", "philosophy" ),
		"search_items" => __( "Search Books", "philosophy" ),
		"not_found" => __( "No Books found", "philosophy" ),
		"not_found_in_trash" => __( "No Books found in trash", "philosophy" ),
		"parent" => __( "Parent book:", "philosophy" ),
		"featured_image" => __( "Cover Image", "philosophy" ),
		"set_featured_image" => __( "Set featured image for this book", "philosophy" ),
		"remove_featured_image" => __( "Remove featured image for this book", "philosophy" ),
		"use_featured_image" => __( "Use as featured image for this book", "philosophy" ),
		"archives" => __( "book archives", "philosophy" ),
		"insert_into_item" => __( "Insert into book", "philosophy" ),
		"uploaded_to_this_item" => __( "Upload to this book", "philosophy" ),
		"filter_items_list" => __( "Filter Books list", "philosophy" ),
		"items_list_navigation" => __( "Books list navigation", "philosophy" ),
		"items_list" => __( "Books list", "philosophy" ),
		"attributes" => __( "Books attributes", "philosophy" ),
		"name_admin_bar" => __( "book", "philosophy" ),
		"item_published" => __( "book published", "philosophy" ),
		"item_published_privately" => __( "book published privately.", "philosophy" ),
		"item_reverted_to_draft" => __( "book reverted to draft.", "philosophy" ),
		"item_scheduled" => __( "book scheduled", "philosophy" ),
		"item_updated" => __( "book updated.", "philosophy" ),
		"parent_item_colon" => __( "Parent book:", "philosophy" ),
	];

	$args = [
		"label" => __( "Books", "philosophy" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "book", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "author" ],
	];

	register_post_type( "book", $args );

	/**
	 * Post Type: Movies.
	 */

	$labels = [
		"name" => __( "Movies", "philosophy" ),
		"singular_name" => __( "Movie", "philosophy" ),
		"menu_name" => __( "My Movies", "philosophy" ),
		"all_items" => __( "All Movies", "philosophy" ),
		"add_new" => __( "Add New", "philosophy" ),
		"add_new_item" => __( "Add New Movie", "philosophy" ),
		"edit_item" => __( "Edit Movie", "philosophy" ),
		"new_item" => __( "New Movie", "philosophy" ),
		"view_item" => __( "View Movie", "philosophy" ),
		"view_items" => __( "View Movies", "philosophy" ),
		"search_items" => __( "Search Movies", "philosophy" ),
		"not_found" => __( "No Movies Found", "philosophy" ),
		"parent" => __( "Mari:Mari-1:Mari-2:Mari-3", "philosophy" ),
		"featured_image" => __( "Featured Image", "philosophy" ),
		"set_featured_image" => __( "Set Featured Image", "philosophy" ),
		"remove_featured_image" => __( "Remove featured image", "philosophy" ),
		"use_featured_image" => __( "Use as featured image", "philosophy" ),
		"archives" => __( "Movies Archive", "philosophy" ),
		"filter_items_list" => __( "Filter Movies List", "philosophy" ),
		"items_list" => __( "Movies List", "philosophy" ),
		"item_published" => __( "Movies Published", "philosophy" ),
		"item_published_privately" => __( "Movies Publish Privately", "philosophy" ),
		"item_reverted_to_draft" => __( "Movie reverted to draft", "philosophy" ),
		"item_scheduled" => __( "Movies Scheduled", "philosophy" ),
		"item_updated" => __( "Movie Updated", "philosophy" ),
		"parent_item_colon" => __( "Mari:Mari-1:Mari-2:Mari-3", "philosophy" ),
	];

	$args = [
		"label" => __( "Movies", "philosophy" ),
		"labels" => $labels,
		"description" => "All Movies Details",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "movies",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "movie", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 6,
		"menu_icon" => "dashicons-format-video",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "author", "page-attributes" ],
	];

	register_post_type( "movie", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
