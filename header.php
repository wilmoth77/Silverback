<?php
/**
* The Header for our theme.
*
* Displays all of the <head> section and everything up till <div id="content">
*
* @package Silverback
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/public/img/favicon.ico">

  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>
  <script>
    function resizeIframe(obj) {
      obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }
  </script>
</head>

<body <?php body_class(); ?>>
  <header id="silverback-header" role="banner">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><?php bloginfo( 'name' ); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php
          if (has_nav_menu('project')) :
            //wp_nav_menu( array( 'container'=> false, 'menu_class'=> 'nav navbar-nav') );
            wp_nav_menu( array(
              'menu'              => 'project',
              'theme_location'    => 'project',
              'container'         => false,
              'menu_class'        => 'nav navbar-nav',
              'fallback_cb'       => 'nav_walker_bootstrap::fallback',
              'walker'            => new nav_walker_bootstrap())
            );
          endif;
          ?>
          <?php
          if (has_nav_menu('project_secondary')) :
            //wp_nav_menu( array( 'container'=> false, 'menu_class'=> 'nav navbar-nav') );
            wp_nav_menu( array(
              'menu'              => 'project_secondary',
              'theme_location'    => 'project_secondary',
              'container'         => false,
              'menu_class'        => 'nav navbar-nav navbar-right',
              'fallback_cb'       => 'nav_walker_bootstrap::fallback',
              'walker'            => new nav_walker_bootstrap())
            );
          endif;
          ?>
          <form role="search" class="navbar-form navbar-right" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label class="sr-only"><?php _e('Search for:', 'slvrbk'); ?></label>
            <div class="form-group">
              <label for="filter-by"></label>
              <i class="mdi mdi-magnify"></i>
              <input type="search" class="navbar-form-field form-control" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Search Silverback...', 'slvrbk'); ?>" autocomplete="off">
            </div>
          </form>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </header>
