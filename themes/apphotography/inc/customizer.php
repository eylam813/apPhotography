<?php
/**
 * apPhotography Theme Customizer
 *
 * @package apPhotography
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function apphotography_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'apphotography_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'apphotography_customize_partial_blogdescription',
			)
		);
	}
	// panels
		// For Dynamic Social Media 
		$wp_customize->add_panel( 'apphotography_social_media_panel', array(
			'title' => esc_html__( 'Social Media', 'apphotography' ),
			'capability' => 'edit_theme_options',
		) );
		// For background image
		$wp_customize->remove_panel('background_image');
	// Sections
		// For Dynamic Social Media (facebook)
		$wp_customize->add_section( 'apphotography_facebook_section', array(
			'title' => esc_html__( 'Facebook', 'apphotography' ),
			'capability' => 'edit_theme_options',
			'panel' => 'apphotography_social_media_panel'
		) );	
			// For Dynamic Social Media (instagram)
		$wp_customize->add_section( 'apphotography_instagram_section', array(
			'title' => esc_html__( 'Instagram', 'apphotography' ),
			'capability' => 'edit_theme_options',
			'panel' => 'apphotography_social_media_panel'
		) );
			// For Dynamic Social Media (twitter)
		$wp_customize->add_section( 'apphotography_twitter_section', array(
			'title' => esc_html__( 'Twitter', 'apphotography' ),
			'capability' => 'edit_theme_options',
			'panel' => 'apphotography_social_media_panel'
		) );
		// For background image
		$wp_customize->remove_section('background_image');
	// settings
		// For Dynamic Social Media (facebook)
		$wp_customize->add_setting( 'apphotography_facebook_url', array(
			'transport' => 'refresh',
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		));
		// For Dynamic Social Media (instagram)
		$wp_customize->add_setting( 'apphotography_instagram_url', array(
			'transport' => 'refresh',
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		));
		// For Dynamic Social Media (twitter)
		$wp_customize->add_setting( 'apphotography_twitter_url', array(
			'transport' => 'refresh',
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		));
		// For background image
		$wp_customize->remove_setting('background_image');
	// controls
		// For Dynamic Social Media (facebook)
		$wp_customize->add_control( 'apphotography_facebook_url', array(
			'label' => esc_html__( 'URL', 'apphotography' ),
			'description' => esc_html__( 'Add URL to display Facebook icon/link', 'apphotography' ),
			'section' => 'apphotography_facebook_section',
			'type' => 'input',
			'input_attrs' => array(
				'placeholder' => esc_html__( 'https://facebook.com', 'apphotography' )
			)
		) );
				// For Dynamic Social Media (instagram)
		$wp_customize->add_control( 'apphotography_instagram_url', array(
			'label' => esc_html__( 'URL', 'apphotography' ),
			'description' => esc_html__( 'Add URL to display Instagram icon/link', 'apphotography' ),
			'section' => 'apphotography_instagram_section',
			'type' => 'input',
			'input_attrs' => array(
				'placeholder' => esc_html__( 'https://instagram.com', 'apphotography' )
			)
		) );
				// For Dynamic Social Media (twitter)
		$wp_customize->add_control( 'apphotography_twitter_url', array(
			'label' => esc_html__( 'URL', 'apphotography' ),
			'description' => esc_html__( 'Add URL to display Twitter icon/link', 'apphotography' ),
			'section' => 'apphotography_twitter_section',
			'type' => 'input',
			'input_attrs' => array(
				'placeholder' => esc_html__( 'https://twitter.com', 'apphotography' )
			)
		) );
		// For background image
		$wp_customize->remove_control('background_image');
}
add_action( 'customize_register', 'apphotography_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function apphotography_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function apphotography_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function apphotography_customize_preview_js() {
	wp_enqueue_script( 'apphotography-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'apphotography_customize_preview_js' );
