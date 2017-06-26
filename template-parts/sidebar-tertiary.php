<?php
/**
* Conditional switch for displaying the contents menu
* of the selected nav item
*
* @package Silverback
*/
?>

<?php
$current_page = get_the_ID();

switch ( $current_page ) {
  case '25' : // If is page id __
  ?>
  <div class="card side-nav">
    <div class="card-block">
      <?php
      if (has_nav_menu('contents_menu_id')) :
        wp_nav_menu( array(
          'menu'              => 'contents_menu_id',
          'theme_location'    => 'contents_menu_id',
          'container'         => 'nav',
          'container_id'      => 'sidebar-tertiary',
          'menu_class'        => 'nav nav-pills nav-stacked',
          'fallback_cb'       => 'nav_walker_bootstrap::fallback',
          'walker'            => new nav_walker_bootstrap())
        );
        ?>
      </div>
    </div>
    <?php
  endif;
  break;
  case '99999' : // If is page id __
  ?>
  <div class="card side-nav">
    <div class="card-block">
      <?php
      if (has_nav_menu('contents_menu_id')) :
        wp_nav_menu( array(
          'menu'              => 'contents_menu_id',
          'theme_location'    => 'contents_menu_id',
          'container'         => 'nav',
          'container_id'      => 'sidebar-tertiary',
          'menu_class'        => 'nav nav-pills nav-stacked',
          'fallback_cb'       => 'nav_walker_bootstrap::fallback',
          'walker'            => new nav_walker_bootstrap())
        );
        ?>
      </div>
    </div>
    <?php
  endif;
  break;
}
?>
