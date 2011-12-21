<?php 
/**
 * Taxonomies File
 *
 * This file defines all custom taxonomies. It must be included from functions.php to be activated.
 *
 * @package Skeleton
 * @subpackage Functions
 */

/**
 * Add actions
 *
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference
 */ 
//add_action( 'init', 'create_genre_taxonomy' );
//add_action( 'init', 'create_writer_taxonomy' );

/**
 * Define custom taxonomies
 *
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */


function create_genre_taxonomy() {

	$labels = array(
		'name' => __('Genres'),
		'singular_name' => __('Genre'),
		'search_items' =>  __('Search Genres'),
		'all_items' => __('All Genres'),
		'parent_item' => __('Parent Genre'),
		'parent_item_colon' => __('Parent Genre:'),
		'edit_item' => __('Edit Genre'), 
		'update_item' => __('Update Genre'),
		'add_new_item' => __('Add New Genre'),
		'new_item_name' => __('New Genre Name'),
		'menu_name' => __('Genre'),
	);
	$types = array(
		'publication'
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'genre'),
	);
	register_taxonomy('genre',$types,$args);

}

// Creates non-heirarchical taxonomy "writer" for publication post type (like tags)
function create_writer_taxonomy() {

	$labels = array(
		'name' => __('Writers'),
		'singular_name' => __('Writer'),
		'search_items' =>  __('Search Writers'),
		'popular_items' => __('Popular Writers'),
		'all_items' => __('All Writers'),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __('Edit Writer'), 
		'update_item' => __('Update Writer'),
		'add_new_item' => __('Add New Writer'),
		'new_item_name' => __('New Writer Name'),
		'separate_items_with_commas' => __('Separate writers with commas'),
		'add_or_remove_items' => __('Add or remove writers'),
		'choose_from_most_used' => __('Choose from the most used writers'),
		'menu_name' => __('Writers'),
	);
	$types = array(
		'publication'
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array('slug' => 'writer'),
	);
	register_taxonomy('writer',$types,$args);

}