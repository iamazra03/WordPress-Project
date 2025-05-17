<?php
/**
 * Blossom Feminine Theme Customizer
 *
 * @package Blossom_Feminine
 */

/**
 * Requiring customizer panels & sections
*/
$blossom_feminine_panels = array( 'info', 'site', 'color', 'appearance', 'general', 'footer', 'layout' );

foreach( $blossom_feminine_panels as $p ){
    require get_template_directory() . '/inc/customizer/' . $p . '.php';
}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blossom_feminine_customize_preview_js() {
	wp_enqueue_script( 'blossom-feminine-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blossom_feminine_customize_preview_js' );

function blossom_feminine_customizer_scripts() {
	$array = array(
        'flushFonts'        => wp_create_nonce( 'blossom-feminine-local-fonts-flush' ),
    );
    
    wp_enqueue_style( 'blossom-feminine-customize',get_template_directory_uri().'/inc/css/customize.css', BLOSSOM_FEMININE_THEME_VERSION, 'screen' );
    wp_enqueue_script( 'blossom-feminine-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery' ), '20170404', true );
    wp_localize_script( 'blossom-feminine-customize', 'blossom_feminine_cdata', $array );
    wp_localize_script( 'blossom-feminine-repeater', 'blossom_feminine_customize',
		array(
			'nonce' => wp_create_nonce( 'blossom_feminine_customize_nonce' )
		)
	);
}
add_action( 'customize_controls_enqueue_scripts', 'blossom_feminine_customizer_scripts' );

/**
 * Reset font folder
 *
 * @access public
 * @return void
 */
function blossom_feminine_ajax_delete_fonts_folder() {
	// Check request.
	if ( ! check_ajax_referer( 'blossom-feminine-local-fonts-flush', 'nonce', false ) ) {
		wp_send_json_error( 'invalid_nonce' );
	}
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error( 'invalid_permissions' );
	}
	if ( class_exists( '\Blossom_Feminine_WebFont_Loader' ) ) {
		$font_loader = new \Blossom_Feminine_WebFont_Loader( '' );
		$removed = $font_loader->delete_fonts_folder();
		if ( ! $removed ) {
			wp_send_json_error( 'failed_to_flush' );
		}
		wp_send_json_success();
	}
	wp_send_json_error( 'no_font_loader' );
}
add_action( 'wp_ajax_blossom_feminine_flush_fonts_folder', 'blossom_feminine_ajax_delete_fonts_folder' );