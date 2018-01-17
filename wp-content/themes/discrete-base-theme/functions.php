<?php
/**
 * discrete-base-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package discrete-base-theme
 */

if ( ! function_exists( 'discrete_base_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function discrete_base_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on discrete-base-theme, use a find and replace
		 * to change 'discrete-base-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'discrete-base-theme', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'discrete-base-theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'discrete_base_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'discrete_base_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function discrete_base_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'discrete_base_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'discrete_base_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function discrete_base_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'discrete-base-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'discrete-base-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'discrete_base_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function discrete_base_theme_scripts() {
	wp_enqueue_style( 'discrete-base-theme-style', get_stylesheet_uri() );

	// Enqueue bundled js
	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/build/assets/js/bundle.js', array('jquery'), '20151215', true );

	// Enqueue fontawesome
	wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/releases/v5.0.1/js/all.js', array('jquery'), '5.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'discrete_base_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

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

// Fix jquery for Bootstrap

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "https://code.jquery.com/jquery-3.2.1.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Mostly here we are enqueuing Bootstrap and the compiled SASS files
function discrete_custom_user_styles() {
	wp_enqueue_style( 'bootstrap-cdn-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
	wp_enqueue_script( 'popper-cdn-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array( 'jquery' ), '1.0', true);
	wp_enqueue_script( 'bootstrap-cdn-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', array( 'popper-cdn-js' ), '1.0', true);
	// Enqueue User Styles (ensure this is after bootstrap!)
	wp_enqueue_style( 'custom-user-styles', get_stylesheet_directory_uri() . '/build/assets/css/theme.css' );
}
add_action( 'wp_enqueue_scripts', 'discrete_custom_user_styles' );

/**
  * Enable AJAX calls
**/

// wp_enqueue_script( 'wp-api' );

// function my_ajax_pagination() {
//     echo "Hello World";
//     die();
// }
// add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
// add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function wpdocs_theme_setup() {
    add_image_size( 'large-image-cropped', 1325, 755, true ); // (cropped)
	add_image_size( 'welcome-content_thumb', 400, 400, true );
	add_image_size( 'my-blog-thumb', 633, 332, true );
}
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );

/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
define('ACF_EARLY_ACCESS', '5');
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
