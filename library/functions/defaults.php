<?php 
/**
 * @package Skeleton
 * @subpackage Functions
 */

/**
 * Actions
 */
add_action('init', 'skeleton_remove_header_info');
add_action('admin_menu','skeleton_remove_default_post_metaboxes');
add_action('admin_menu','skeleton_remove_default_page_metaboxes');
if (!current_user_can('manage_options')) {
	add_action('wp_dashboard_setup', 'skeleton_remove_dashboard_widgets' );
}
add_action('widgets_init', 'skeleton_unregister_default_widgets', 1);
add_action('admin_menu', 'skeleton_remove_tools', 99);
add_action('do_feed', 'skeleton_disable_feed', 1);
add_action('do_feed_rdf', 'skeleton_disable_feed', 1);
add_action('do_feed_rss', 'skeleton_disable_feed', 1);
add_action('do_feed_rss2', 'skeleton_disable_feed', 1);
add_action('do_feed_atom', 'skeleton_disable_feed', 1);
add_action('wp_head','skeleton_mobile_viewport_optimized');
add_action('wp_head', 'skeleton_hires_icons');
add_action('init', 'skeleton_remove_dropdown');


/**
 * Filters
 */
add_filter('hybrid_meta_template', 'skeleton_disabler');
add_filter('the_generator', 'skeleton_disabler');


/**
 * Add editor style
 */
add_editor_style('library/styles/editor-style.css');


/**
 * Remove theme support for drop downs
 */ 
function skeleton_remove_dropdown() {
	remove_theme_support('hybrid-core-drop-downs');
}


/**
 * Function disabler
 */
function skeleton_disabler() {
	return FALSE;
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
 * Remove update notice for all bux administrator
 */ 
global $user_login;
get_currentuserinfo();
if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins 
	add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
	add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}  


/**
 * Remove header cruft
 */ 
function skeleton_remove_header_info() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');
} 

/**
 * Remove meta boxes from pages
 */ 
function skeleton_remove_default_post_metaboxes() {
	remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
	remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
	remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
	remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
	remove_meta_box( 'slugdiv','post','normal' ); // Slug Metabox
	remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
}

/**
 * Remove meta boxes from pages
 */ 
function skeleton_remove_default_page_metaboxes() {
	remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
	remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
	remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
	remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
	remove_meta_box( 'slugdiv','post','normal' ); // Slug Metabox
	remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
} 

/**
 * Remove dashboard widgets
 */ 
function skeleton_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

/**
 * Remove default widgets
 */ 
function skeleton_unregister_default_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
}

/**
 * Remove menu items (only visual)
 */ 
function skeleton_remove_tools(){
	remove_menu_page( 'index.php' );                     //dashboard
	remove_menu_page( 'edit.php' );                      //posts
	remove_menu_page( 'upload.php' );                    //media
	remove_menu_page( 'link-manager.php' );              //links
	remove_menu_page( 'edit.php?post_type=page' );       //page
	remove_menu_page( 'edit-comments.php' );             //comments
	remove_menu_page( 'themes.php' );                    //appearance
	remove_menu_page( 'plugins.php' );                   //plugins
	remove_menu_page( 'users.php' );                     //users
	remove_menu_page( 'tools.php' );                     //tools
	remove_menu_page( 'options-general.php' );           //settings
}

/**
 * Disable RSS feeds
 */ 
function skeleton_disable_feed() {
	wp_die( __('No feed available, please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
}