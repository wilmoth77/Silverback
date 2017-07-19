<?php

/**
 * Silverback Enqueue scripts and styles. Includes custom WP-Admin styles.
 *
 * @package Silverback
 *
 */

function Silverback_scripts() {
    $assets = array(
      //'css'       => '/public/css/main.min.css',
      'bestcaseonline'     => '/public/css/bestcaseonline.min.css',
    //  'bestcaseonline-pretty'     => '/assets/css/bestcaseonline.pretty.css',
      'silverback'     => '/public/css/silverback.min.css',
      'clipboard'    => '/public/js/clipboard.min.js',
      'script'    => '/public/js/script.min.js',
      'jquery'    => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js'
    );

    wp_enqueue_style('silverback', get_stylesheet_directory_uri() . $assets['silverback'], false, filemtime( get_stylesheet_directory() . '/public/css/silverback.min.css' ), 'all');

    if (is_tree(7)) { //enqueue the Best Case Online stylesheet if it's a Best Case page only
    wp_enqueue_style('bestcaseonline', get_stylesheet_directory_uri() . $assets['bestcaseonline'], false, filemtime( get_stylesheet_directory() . '/public/css/bestcaseonline.min.css' ), 'all');
    // wp_enqueue_style('bestcaseonline-pretty', get_stylesheet_directory_uri() . $assets['bestcaseonline-pretty'], false, filemtime( get_stylesheet_directory() . '/assets/css/bestcaseonline.pretty.css' ), 'all');
    }


   /**
   * jQuery is loaded using the same method from HTML5 Boilerplate:
   * Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
   * It's kept in the header instead of footer to avoid conflicts with plugins.
   */
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', $assets['jquery'], array(), null, false);
    add_filter('script_loader_src', 'Silverback_jquery_local_fallback', 10, 2);
  }

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

  wp_enqueue_script('jquery');
  wp_enqueue_script('clipboard', get_template_directory_uri() . $assets['clipboard'], array(), filemtime( get_template_directory() . $assets['clipboard'] ), true);
  wp_enqueue_script('script', get_template_directory_uri() . $assets['script'], array(), filemtime( get_template_directory() . $assets['script'] ), true);
}
add_action( 'wp_enqueue_scripts', 'Silverback_scripts' );

// jQuery local fallback
function Silverback_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/vendor/jquery/dist/jquery.min.js?1.11.1"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'Silverback_jquery_local_fallback');

/**
 * Custom WP Admin Login Page
 */
// Reference custom login stylesheet
function Silverback_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/public/css/wp-login.min.css' );
  //wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/public/js/wp-login.min.js' );
}
add_action( 'login_enqueue_scripts', 'Silverback_login_stylesheet' );

// Change logo link and title
function wpc_url_login(){
	return get_site_url();
}
function wpc_url_title(){
        return get_bloginfo ( 'name' );
 }
add_filter('login_headerurl', 'wpc_url_login');
add_filter('login_headertitle', 'wpc_url_title');
