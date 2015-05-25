<?php
/**
 *
 * WARNING: Please do not edit this file in any way
 *
 * load the theme function files
 */
require ( get_template_directory() . '/includes/functions.php' );
require ( get_template_directory() . '/includes/hooks.php' );
require ( get_template_directory() . '/includes/strap-extras.php' );
require ( get_template_directory() . '/includes/sp-shortcodes.php' );
require ( get_template_directory() . '/includes/cpt.php' );


if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}