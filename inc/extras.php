<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Silverback
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function slvrbk_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'slvrbk_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function slvrbk_body_classes( $classes ) {
	// Adds a class based on conditionals
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	elseif (is_tree(7)) {
		$classes[] = 'bestcaseonline';
	}
	elseif (is_tree(57)) {
		$classes[] = 'clientportal';
	}

	return $classes;
}
add_filter( 'body_class', 'slvrbk_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function slvrbk_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'slvrbk' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'slvrbk_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function slvrbk_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'slvrbk_setup_author' );

/**
 * Enable the ability to use the disable wpautotop plugin on private posts such as content blocks
 * Add filter and then go to Settings > Writing
 */
add_filter('lp_wpautop_show_private_pt', '__return_true');

/**
 * Add additional file type support for WordPress media uploads
 */

function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml'; //Adding svg image support
$mimes['exe'] = 'application/vnd.microsoft.portable-executable'; //Adding exe support
$mimes['dmg'] = 'application/x-apple-diskimage'; //Adding dmg support
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/**
 * Add bootstrap classes to gravityforms forms
 */
add_filter( 'gform_field_container', 'add_bootstrap_container_class', 10, 6 );
function add_bootstrap_container_class( $field_container, $field, $form, $css_class, $style, $field_content ) {
  $id = $field->id;
  $field_id = is_admin() || empty( $form ) ? "field_{$id}" : 'field_' . $form['id'] . "_$id";
  return '<li id="' . $field_id . '" class="' . $css_class . ' form-group">{FIELD_CONTENT}</li>';
}

/**
 * WordPress' missing is_blog_page() function.  Determines if the currently viewed page is
 * one of the blog pages, including the blog home page, archive, category/tag, author, or single
 * post pages.
 *
 * @return bool
 */
function is_blog_page() {

    global $post;

    //Post type must be 'post'.
    $post_type = get_post_type($post);

    //Check all blog-related conditional tags, as well as the current post type,
    //to determine if we're viewing a blog page.
    return (
        ( is_home() || is_archive() || is_single() )
        && ($post_type == 'post')
    ) ? true : false ;

}

/**
 * Function to test if a page is a parent and/or child; usage is is_tree
 *
 * http://css-tricks.com/snippets/wordpress/if-page-is-parent-or-child/
 * http://css-tricks.com/snippets/wordpress/if-page-is-parent-or-child/#comment-85846
 */
function is_tree($pid)
{
  global $post;

  $ancestors = get_post_ancestors($post->$pid);
  $root = count($ancestors) - 1;
  $parent = $ancestors[$root];

  if(is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors)))
  {
    return true;
  }
  else
  {
    return false;
  }
};

/**
 * Hide the HTML tab of the editor for Pages only, not posts.
 * http://wordpress.stackexchange.com/questions/12370/disable-wysiwyg-editor-only-when-creating-a-page
 */

 add_filter( 'user_can_richedit', 'nopages_user_can_richedit');

 function nopages_user_can_richedit($cap) {
		 global $post_type;

		 if (('page' == $post_type) || ('content_block' == $post_type))
				 return false;
		 return $cap;
 }

 /**
  * Custom post types for examples
  * https://codex.wordpress.org/Post_Types
  */

	function create_post_type() {
	  register_post_type( 'bc_examples',
	    array(
	      'labels' => array(
	        'name' => __( 'Best Case Examples' ),
	        'singular_name' => __( 'Example' )
	      ),
	      'public' => true,
	      'has_archive' => true,
				'rewrite' => array('slug' => 'examples'),
	    )
	  );
	}
	add_action( 'init', 'create_post_type' );


	/**
	 * Shortcode for iframes
	 * https://www.sean-barton.co.uk/2013/07/create-simple-shortcode-embed-iframe-wordpress/
	 */
add_shortcode('example', 'example_iframe');

function example_iframe($atts, $content) {
 return '<iframe class="col-xs-12" src="' . $atts['src'] . '" frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>';
}
