<?php
/**
 * Functions File
 *
 * This is your child theme's functions.php file. Use this to write any custom functions 
 * you may need. You can use this to hook into the Hybrid theme (could also create a 
 * plugin to do the same).
 *
 * @package Skeleton
 * @subpackage Functions
 */

/**
* Includes
*/

include('library/functions/types.php');
include('library/functions/taxonomies.php');
include('library/functions/fields.php');

/**
 * Make sure to localize all your text if you plan on releasing this publicly
 *
 * @link http://themehybrid.com/themes/hybrid/translating
 * @link http://codex.wordpress.org/Translating_WordPress
 */
//load_child_theme_textdomain( 'skeleton', get_stylesheet_directory() . '/languages' );

/**
 * Add actions
 *
 * @link http://themehybrid.com/themes/hybrid/hooks
 * @link http://themehybrid.com/themes/hybrid/hooks/actions
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference
 */ 
// add_action( 'action_hook_name','custom_function_name' );
add_action('wp_head','skeleton_mobile_viewport_optimized');
add_action('wp_head', 'skeleton_hires_icons');
add_action('init', 'skeleton_load_scripts');
add_action('init', 'skeleton_load_styles');
add_action('init', 'skeleton_image_sizes');
add_action('init', 'skeleton_remove_dropdown');

/**
 * Add filters
 *
 * @link http://themehybrid.com/themes/hybrid/hooks
 * @link http://themehybrid.com/themes/hybrid/hooks/filters
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference
 */
add_filter('hybrid_meta_template', 'skeleton_disabler');
add_filter('the_generator', 'skeleton_disabler');
//add_filter('breadcrumb_trail', 'skeleton_disabler');
//add_filter('comments_template', 'skeleton_remove_comments', 11);
//add_filter('sidebars_widgets', 'skeleton_conditional_widgets');


/**
 * Remove actions
 *
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference
 */ 
//remove_action('wp_print_styles', 'add_advanced_recent_posts_widget_stylesheet');

/**
 * Add editor style
 */
add_editor_style('editor-style.css');

/**
 * Remove theme support for drop downs
 */ 
function skeleton_remove_dropdown() {
	remove_theme_support('hybrid-core-drop-downs');
}

/**
 * Secondary only in the blog
 */
function skeleton_conditional_widgets($sidebars_widgets) {
	wp_reset_query();
	if (is_single() || is_archive() || is_page_template('page-blog.php'))
		$sidebars_widgets['primary'] = false;
	elseif (!is_admin())
		$sidebars_widgets['secondary'] = false;
	return $sidebars_widgets;
}

/**
 * Function disabler
 */
function skeleton_disabler() {
	return FALSE;
}

/**
 * Remove comments from pages and attachements
 */
function skeleton_remove_comments($file) {
	if ( is_page() || is_attachment())
		$file = STYLESHEETPATH . '/comments-blank.php';
	return $file;

}

/**
 * Basic "Hello World" function
 */
function skeleton_hello_world() {
	echo 'Hello World!';
}

/**
 * Setup custom image sizes
 */
function skeleton_image_sizes() {
	//add_image_size( 'banner', 960, 375, true );
}

/**
 * Mobile viewport optimized
 */
function skeleton_mobile_viewport_optimized() {
	echo '<meta name="viewport" content="width=device-width,initial-scale=1">';
}

/**
 * High resolution icons
 */
function skeleton_hires_icons() {
	echo '<link rel="icon" href="' . get_bloginfo('stylesheet_directory') . '/library/images/icon-16.png" sizes="16x16">'."\n";
	echo '<link rel="icon" href="' . get_bloginfo('stylesheet_directory') . '/library/images/icon-32.png" sizes="32x32">'."\n";
	echo '<link rel="icon" href="' . get_bloginfo('stylesheet_directory') . '/library/images/icon-64.png" sizes="64x64">'."\n";
	echo '<link rel="icon" href="' . get_bloginfo('stylesheet_directory') . '/library/images/icon-128.png" sizes="128x128">'."\n";
}

/**
 * Load custom scripts
 */
function skeleton_load_scripts() {
	$theme  = get_theme( get_current_theme() );
	if ( !is_admin() ) {
		wp_register_script('custom', get_bloginfo('stylesheet_directory') . '/library/scripts/jquery.scripts.js', array('jquery'), $theme['Version'] );
		wp_enqueue_script('custom');
	}
}

/**
 * Load custom styles
 */
function skeleton_load_styles() {
	if ( !is_admin() ) { 
		//wp_register_style( 'opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700', false, '1.0');
		//wp_enqueue_style( 'opensans' );
	}
}

?>