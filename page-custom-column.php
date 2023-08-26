<?php
/**
 * Summary.
 *
 * Description.
 *
 * @link URL
 *
 * @package WordPress
 * @subpackage Component
 * @since Version
 */

/**
 * Plugin Name: Page Custom Columns
 * Plugin URI: https://anam.rocks
 * Description: Columns to show page template, id, editor
 * Version: 1.0
 * Author: Anam
 * Author URI: https://anam.rocks
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: anam
 */

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;


/**
 * Create custom column - Template - in page admin list
 */
add_filter( 'manage_pages_columns', 'page_column_views' );
add_action( 'manage_pages_custom_column', 'page_custom_column_views', 10, 2 );
function page_column_views( $defaults ){
	$defaults['page-layout'] = __('Template', 'textdomain');
	return $defaults;
}
function page_custom_column_views( $column_name, $id ){
	if ( $column_name === 'page-layout' ) {
		$set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
		echo $set_template;
		// if ( $set_template == 'default' ) {
		// 	echo __('Default Template', 'textdomain');
		// }
		// $templates = get_page_templates();
		// ksort( $templates );
		// foreach ( array_keys( $templates ) as $template ) :
		// 	if ( $set_template == $templates[$template] ) echo $template;
		// endforeach;
	}
}
/**
 * Create custom column - Editor - in page admin list
 */
add_filter( 'manage_pages_columns', 'page_column_editor' );
add_action( 'manage_pages_custom_column', 'page_custom_editor_views', 10, 2 );
function page_column_editor( $defaults ){
	$defaults['editor'] = __('Editor', 'textdomain');
	return $defaults;
}
function page_custom_editor_views( $column_name, $id ){
	if ( $column_name === 'editor' ) {
		$check_blocks = has_blocks($id);
		if( $check_blocks ){
			echo 'Gutenberg';
		}else{
			echo "Classic";
		}
		
	}
}

/**
 * Create custom column - Page ID - in page admin list
 */
add_filter( 'manage_pages_columns', 'page_column_id' );
add_action( 'manage_pages_custom_column', 'page_custom_id_views', 10, 2 );
function page_column_id( $defaults ){
	$defaults['page-id'] = __('Page ID', 'textdomain');
	return $defaults;
}
function page_custom_id_views( $column_name, $id ){
	if ( $column_name === 'page-id' ) {
		echo $id;
	}
}
