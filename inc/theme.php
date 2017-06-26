<?php
/**
 * Silverback functions and definitions
 *
 * @package Silverback
 *
 * Was originally the functions.php stuff. I'm seperating it out.
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'slvrbk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function slvrbk_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Silverback, use a find and replace
	 * to change 'slvrbk' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'slvrbk', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in several locations.
	register_nav_menus( array(
		'project' => __( 'Project Menu', 'slvrbk' ),
		'project_secondary' => __( 'Project Menu - Secondary', 'slvrbk' ),
		'secondary_bestcase' => __( 'Best Case Documentation', 'slvrbk' ),
		'secondary_clientportal' => __( 'Client Portal Menu', 'slvrbk' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'slvrbk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // slvrbk_setup
add_action( 'after_setup_theme', 'slvrbk_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function slvrbk_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'slvrbk' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'slvrbk_widgets_init' );

/**
 * Custom functions
 */

// Add Bootstrap's IE conditional html5 shiv and respond.js to header
function conditional_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'conditional_js' );

//wp-admin favicon
// First, create a function that includes the path to your favicon
function add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/public/img/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

// Now, just make sure that function runs when you're on the login page and admin pages
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

//wp-admin howdy!
add_filter('gettext', 'change_howdy', 10, 3);

function change_howdy($translated, $text, $domain) {
    if (!is_admin() || 'default' != $domain)
        return $translated;

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'What\'s up', $translated);

    return $translated;
	}
	/**
 * Modify the excerpt
 */
// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
       if(is_front_page()) {
           return '...<br><br><a class="read-more" href="'. get_permalink($post->ID) . '"> Read More</a>'; }
        elseif (is_page( array( 'mc-feed-1', 'mc-feed-2', 'mc-feed-3' ) )) {
           return '...'; }
        else {
            return '...<br><br><a role="button" class="btn btn-default btn-sm" href="'. get_permalink($post->ID) . '"> Read More</a>';
}
}
add_filter('excerpt_more', 'new_excerpt_more');

function compose_title () {
	$ancestors = get_post_ancestors( $post );
	$page_title = get_the_title( $post );
	$parent_post_id = wp_get_post_parent_id( $post_ID );
	$parent_post = get_post($parent_post_id);
	$parent_post_title = $parent_post->post_title;
	$product = get_post_ancestors( $post->ID );
	$product_post_id = ($product) ? $product[count($product)-1]: $post->ID;
	$product_post_title = get_the_title( $product_post_id );

	if( count( $ancestors ) > 0 ) {
		echo '<h6><span class="product">' . $product_post_title . ' Style Guide 1.0</span></h6>';
	}
	else;
	if( count( $ancestors ) == 1 ) {
		echo '<h1><span class="current_page">/' . $page_title . '</span></h1>';
	}
	elseif( count( $ancestors ) >= 2 ) {
		echo '<h1><span class="parent_page">/' . $parent_post_title . '</span><span class="current_page_child">/'. $page_title . '</span></h1>';
	}
	else;
}
