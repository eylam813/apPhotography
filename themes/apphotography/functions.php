<?php
/**
 * apPhotography functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package apPhotography
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'apphotography_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function apphotography_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on apPhotography, use a find and replace
		 * to change 'apphotography' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'apphotography', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'apphotography' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		// Add theme support for custom colours
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'Dark Green', 'apphotography' ),
				'slug' => 'darkgreen',
				'color' => '#003C44',
			),
			array(
				'name' => esc_html__( 'Slate Grey', 'apphotography' ),
				'slug' => 'slategrey',
				'color' => '#6C888D',
			),
			array(
				'name' => esc_html__( 'Outer Space', 'apphotography' ),
				'slug' => 'outerspace',
				'color' => '#404C56',
			),
			array(
				'name' => esc_html__( 'Ash Grey', 'apphotography' ),
				'slug' => 'ashgrey',
				'color' => '#ACB4B6',
			),
			array(
				'name' => esc_html__( 'White', 'apphotography' ),
				'slug' => 'white',
				'color' => '#FFFFFF',
			),
			array(
				'name' => esc_html__( 'Black', 'apphotography' ),
				'slug' => 'black',
				'color' => '#000000',
			),
		) );
		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'apphotography_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'apphotography_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function apphotography_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'apphotography_content_width', 640 );
}
add_action( 'after_setup_theme', 'apphotography_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function apphotography_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'apphotography' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'apphotography' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'apphotography_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function apphotography_scripts() {

		
	// Reset css stylesheet
	wp_enqueue_style('apphotography-reset',get_template_directory_uri() . '/assets/css/vendors/reset.css',  array());
	
	// Reset css stylesheet
	wp_enqueue_style('apphotography-reset',get_template_directory_uri() . 'styleZ.css',  array());
	
	// gets style.css file
	wp_enqueue_style( 'apphotography-style', get_stylesheet_uri(), array() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// enqueue foundation styles
	wp_enqueue_style('apphotography-foundation',get_template_directory_uri() . '/assets/css/vendors/foundation.min.css', null, '6.5.1');
	wp_enqueue_style('apphotography-apphotographyStyles',get_template_directory_uri() . '/assets/css/apphotography.css', array());

	wp_enqueue_style('apphotography-reset',get_template_directory_uri() . '/assets/css/app.css',  array());

	// adding what-input js
	wp_enqueue_script( 'apphotography-what-input', get_template_directory_uri() . '/assets/js/vendors/what-input.js', array('jquery'), '6.5.1', true );

	// adding apphotography foundation js
	wp_enqueue_script( 'apphotography-foundation', get_template_directory_uri() . '/assets/js/vendors/foundation.min.js', array('jquery', 'apphotography-what-input'), '6.5.1', true );
	
	// adding app.js
	wp_enqueue_script( 'apphotography-script', get_template_directory_uri() . '/assets/js/app.js', array('jquery', 'apphotography-foundation'), '6.5.1', true );

}
add_action( 'wp_enqueue_scripts', 'apphotography_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

