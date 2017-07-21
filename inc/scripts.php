<?php

/**
* Silverback Enqueue scripts and styles. Includes custom WP-Admin styles.
*
* @package Silverback
*
*/

function Silverback_scripts() {
  $assets = array(
    'bestcaseonline'     => '/public/css/bestcaseonline.min.css',
    'silverback'     => '/public/css/silverback.min.css',
    'clipboard'    => '/public/js/clipboard.min.js',
    'script'    => '/public/js/script.min.js',
    'jquery'    => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js'
  );


  if (is_tree(874)) { //Is the Best Case Example Application
    wp_enqueue_style('bestcaseonline', get_stylesheet_directory_uri() . $assets['bestcaseonline'], false, filemtime( get_stylesheet_directory() . '/public/css/bestcaseonline.min.css' ), 'all');
  }

  elseif (is_tree(7)) { //Is Best Case Docs
    wp_enqueue_style('silverback', get_stylesheet_directory_uri() . $assets['silverback'], false, filemtime( get_stylesheet_directory() . '/public/css/silverback.min.css' ), 'all');
    wp_enqueue_style('bestcaseonline', get_stylesheet_directory_uri() . $assets['bestcaseonline'], false, filemtime( get_stylesheet_directory() . '/public/css/bestcaseonline.min.css' ), 'all');
  }

  else { //Is any other page
    wp_enqueue_style('silverback', get_stylesheet_directory_uri() . $assets['silverback'], false, filemtime( get_stylesheet_directory() . '/public/css/silverback.min.css' ), 'all');
  }

  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', $assets['jquery'], array(), null, false);
    add_filter('script_loader_src', 'Silverback_jquery_local_fallback', 10, 2);
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
