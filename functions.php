<?php
/**
 * je-starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package je-starter
 */

if ( ! function_exists( 'jestarter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jestarter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on je-starter, use a find and replace
	 * to change 'jestarter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jestarter', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'jestarter' ),
		'menu-2' => esc_html__( 'Additional', 'jestarter' ),
		'menu-3' => esc_html__( 'Footer', 'jestarter' ),
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'jestarter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jestarter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jestarter_content_width', 640 );
}
add_action( 'after_setup_theme', 'jestarter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jestarter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jestarter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'jestarter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jestarter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jestarter_scripts() {
	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Raleway:300,300i,700', false);

	wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 

	wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js', true);

	wp_enqueue_script('Scroll Magic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', true);

	wp_enqueue_script('Scroll Magic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.js', true);

	wp_enqueue_script('Scroll Magic Plugin', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js', true);

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), true );

	wp_enqueue_script( 'minified-script', get_template_directory_uri() . '/js/script.min.js', array( 'jquery' ), '1.0.0', true );

	// Localize and expose assets to the JS file for use with REST API
	wp_localize_script( 'minified-script', 'postdata', 
		array(
			'post_id' => get_the_ID(),
			'theme_uri' => get_stylesheet_directory_uri(),
			'rest_url' => rest_url('wp/v2/'),
			)
		);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jestarter_scripts' );

function namespace_theme_stylesheets() {
	wp_register_style( 'style-minified', get_template_directory_uri() . '/style.min.css', array(), null, 'all');
	wp_enqueue_style( 'style-minified' );
}
add_action( 'wp_enqueue_scripts', 'namespace_theme_stylesheets' );


// Inserting Custom Fields Options Page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page('Theme Options');
	acf_add_options_page('Pop Up Options');
	
}

// Custom post type for the blog functionality
add_action( 'init', 'codex_latest_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_latest_init() {
	$labels = array(
		'name'               => _x( 'Latest News', 'latest', 'jestarter' ),
		'singular_name'      => _x( 'Latest', 'post type singular name', 'jestarter' ),
		'menu_name'          => _x( 'Latest News', 'admin menu', 'jestarter' ),
		'add_new'            => _x( 'Add New', 'piece', 'jestarter' ),
		'add_new_item'       => __( 'Add New Latest News', 'jestarter' ),
		'new_item'           => __( 'New Piece', 'jestarter' ),
		'edit_item'          => __( 'Edit Piece', 'jestarter' ),
		'view_item'          => __( 'View Piece', 'jestarter' ),
		'all_items'          => __( 'All of the Latest', 'jestarter' ),
		'search_items'       => __( 'Search Pieces', 'jestarter' ),
		'parent_item_colon'  => __( 'Parent Piece:', 'jestarter' ),
		'not_found'          => __( 'No pieces found.', 'jestarter' ),
		'not_found_in_trash' => __( 'No pieces found in Trash.', 'jestarter' )
	);

	$args = array(
		'labels'             => $labels,
                	'description'        => __( 'Post the lastest updates to the Latest News section.', 'jestarter' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => 'latest',
		'rewrite'            => array( 'slug' => 'latest' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon' => 'dashicons-media-document',
		'supports'           => array( 'title', 'editor', 'author')
	);

	register_post_type( 'latest', $args );
}

// Functions to help display social
function grabSocial($platform) {
	$profile = $platform . '_profile';
	$page = 'options';
	if( get_field($profile, $page) ):
		$render = '<a href="'  .  get_field($profile, $page) . '"><div class="circle-social"><i class="fa fa-' . $platform . '" aria-hidden="true"></i></div></a>';
	return $render;
	endif;
}

// Filter excerpt length

function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '   . . .';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );



/**
 * Remove Default Post Type
 */
add_action('admin_menu','remove_default_post_type');
function remove_default_post_type() {
	remove_menu_page('edit.php');
}
