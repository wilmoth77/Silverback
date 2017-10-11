<?php

/**
* Silverback Enqueue scripts and styles. Includes custom WP-Admin styles.
*
* @package Silverback
*
*/

function Silverback_scripts() {
  $assets = array(
    'opensans'                => '//fonts.googleapis.com/css?family=Open+Sans:300,400,600',
    'roboto'                  => '//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900',
    'materialdesignicons'     => '/public/css/materialdesignicons.min.css', //Installed
    'scrollingtabs'           => '/public/css/jquery.scrolling-tabs.min.css',
    'bestcaseonline'          => '/public/css/bestcaseonline.min.css',
    'silverback'              => '/public/css/silverback.min.css',
    'silverbackJs'            => '/public/js/silverback.min.js',
    'bestcaseJs'               => '/public/js/bestcase.min.js',
    'bootstrapJs'               => '/public/js/bootstrap.min.js',
    'jquery'                  => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js'
  );

  // Enqueue on all pages of the site
  wp_enqueue_style('materialdesignicons', get_stylesheet_directory_uri() . $assets['materialdesignicons'], false, filemtime( get_stylesheet_directory() . '/public/css/materialdesignicons.min.css' ), 'all');
  wp_enqueue_style('opensans', $assets['opensans'], false, 'all');
  wp_enqueue_style('roboto', $assets['roboto'], false, 'all');
  wp_enqueue_style('scrollingtabs', get_stylesheet_directory_uri() . $assets['scrollingtabs'], false, 'all');


  if ( is_singular( 'bc_examples' ) ) {
    wp_enqueue_style('bestcaseonline', get_stylesheet_directory_uri() . $assets['bestcaseonline'], false, filemtime( get_stylesheet_directory() . '/public/css/bestcaseonline.min.css' ), 'all');
  }

    elseif (is_tree(1356) && !is_page(1356)) { //Is Best Case App pages
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
  wp_enqueue_script('bootstrapJs', get_template_directory_uri() . $assets['bootstrapJs'], array(), filemtime( get_template_directory() . $assets['bootstrapJs'] ), true);
  wp_enqueue_script('silverbackJs', get_template_directory_uri() . $assets['silverbackJs'], array(), filemtime( get_template_directory() . $assets['silverbackJs'] ), true);
  wp_enqueue_script('bestcaseJs', get_template_directory_uri() . $assets['bestcaseJs'], array(), filemtime( get_template_directory() . $assets['bestcaseJs'] ), true);
}

add_action( 'wp_enqueue_scripts', 'Silverback_scripts' );


// jQuery local fallback
function Silverback_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js"><\/script>\')</script>' . "\n";
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
add_action( 'admin_enqueue_scripts', 'Silverback_login_stylesheet' );


// Change logo link and title
function wpc_url_login(){
  return get_site_url();
}
function wpc_url_title(){
  return get_bloginfo ( 'name' );
}
add_filter('login_headerurl', 'wpc_url_login');
add_filter('login_headertitle', 'wpc_url_title');
