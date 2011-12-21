<?php 
/**
 * Post Types File
 *
 * This file defines all custom post types. It must be included from functions.php to be activated.
 *
 * @package Skeleton
 * @subpackage Functions
 */

/**
 * Add actions
 *
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference
 */ 
//add_action( 'init', 'create_skeleton_type' );

/**
 * Define post type functions
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function create_skeleton_type() {
	$labels = array(
		'name' => __('Publications'),
		'singular_name' => __('Publication'),
		'add_new' => __('Add New'),
		'add_new_item' => __('Add New Publication'),
		'edit_item' => __('Edit Publication'),
		'new_item' => __('New Publication'),
		'all_items' => __('All Publications'),
		'view_item' => __('View Publication'),
		'search_items' => __('Search Publications'),
		'not_found' =>  __('No publications found'),
		'not_found_in_trash' => __('No publications found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => __('Publications'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	); 
	register_post_type('publication',$args);
}