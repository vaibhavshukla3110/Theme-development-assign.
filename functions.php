<?php
/**
 * Dsignfly1 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dsignfly1
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dsignfly1_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dsignfly1, use a find and replace
		* to change 'dsignfly1' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dsignfly1', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'dsignfly1' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dsignfly1_custom_background_args',
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
add_action( 'after_setup_theme', 'dsignfly1_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dsignfly1_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dsignfly1_content_width', 640 );
}
add_action( 'after_setup_theme', 'dsignfly1_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dsignfly1_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dsignfly1' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dsignfly1' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dsignfly1_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dsignfly1_scripts() {
	wp_enqueue_style( 'dsignfly1-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dsignfly1-style', 'rtl', 'replace' );

	wp_enqueue_script( 'dsignfly1-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_style( 'header-css', get_template_directory_uri() . '/custom.css', array(), '1.0', 'all' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dsignfly1_scripts' );

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

/**
 * Register custom post type portfolio
 */

function dsignfly_portfolio_post(){

	$labels = array(
        'name'                  => _x( 'Portfolios', 'Post type general name', 'dsignfly' ),
        'singular_name'         => _x( 'Portfolio', 'Post type singular name', 'dsignfly' ),
        'menu_name'             => _x( 'Portfolio', 'dsignfly' ),
        'name_admin_bar'        => _x( 'Portfolio', 'dsignfly' ),
        'add_new'               => __( 'Add Portfolio', 'dsignfly' ),
        'add_new_item'          => __( 'Add New Portflio', 'dsignfly' ),
        'new_item'              => __( 'New Portfolio', 'dsignfly' ),
        'edit_item'             => __( 'Edit Portfolio', 'dsignfly' ),
        'view_item'             => __( 'View Portfolio', 'dsignfly' ),
        'all_items'             => __( 'All Portfolios', 'dsignfly' ),
        'search_items'          => __( 'Search Portfolios', 'dsignfly' ),
        'parent_item_colon'     => __( 'Parent Portfolios:', 'dsignfly' ),
        'not_found'             => __( 'No Portfolio found.', 'dsignfly' ),
        'not_found_in_trash'    => __( 'No Portfolios found in Trash.', 'dsignfly' ),
        'featured_image'        => _x( 'Portfolio Featured Image', 'dsignfly' ),
        'set_featured_image'    => _x( 'Set cover image', 'dsignfly' ),
        'remove_featured_image' => _x( 'Remove featured image for portfolio', 'dsignfly' ),
        'use_featured_image'    => _x( 'Use as featured image for Portfolio', 'dsignfly' ),
        'archives'              => _x( 'Portfolio archives', 'dsignfly' ),
        'insert_into_item'      => _x( 'Insert into Portfolio', 'dsignfly' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Portfolio', 'dsignfly' ),
        'filter_items_list'     => _x( 'Filter Portfolios list', 'dsignfly' ),
        'items_list_navigation' => _x( 'Portfolios list navigation', 'dsignfly' ),
        'items_list'            => _x( 'Portfolios list', 'dsignfly' ),
    );     
    $args = array(
		'label'				 => __('Portfolio','dsignfly'),
        'labels'             => $labels,
        'description'        => 'Portfolio custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'dsignfly' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail','comments','excerpt'),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true,
		'exclude_from_search'=> false,
		'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
		'can_export'		=> true,
    );
      
    register_post_type( 'Portfolio', $args );
}

add_action('init','dsignfly_portfolio_post',0);

