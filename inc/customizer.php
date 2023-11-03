<?php
/**
 * wp-accessibility-day Theme Customizer
 *
 * @package wp-accessibility-day
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wp_accessibility_day_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'wpad_header' , array(
		'title'       => __( 'Notification', 'wp-accessibility-day' ),
		'priority'    => 202,
		'description' => __( 'Add a notification above the header.', 'wp-accessibility-day' ),
	) );

	$wp_customize->add_setting( 'wpad_banner_text', array( 
		'default' => '',
		'sanitize_callback' => 'wp_kses_post', 
	) );

	// Content Display
	$wp_customize->add_control( 
		'aztap_control_banner_text', 
		array(
			'label'    => __( 'Notification text', 'wp-accessibility-day' ),
			'section'  => 'wpad_header',
			'settings' => 'wpad_banner_text',
			'type'     => 'textarea',
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'wp_accessibility_day_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'wp_accessibility_day_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'wp_accessibility_day_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wp_accessibility_day_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wp_accessibility_day_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_accessibility_day_customize_preview_js() {
	wp_enqueue_script( 'wp-accessibility-day-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wp_accessibility_day_customize_preview_js' );
