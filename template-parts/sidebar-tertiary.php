<?php
/**
* Conditional switch for displaying the contents menu
* of the selected nav item
*
* @package Silverback
*/
?>
<?php
//Condition of existing nav_menu was met in content-documentation.php
//so just display the menu now...

$page_title = get_the_title( $post );
$contentMenu = get_field('nav_menu');

echo '<div class="sidebar right">
<h4><span class="sidebar-title">' . $page_title . ' Contents</span></h4>';

wp_nav_menu( array(
  'menu'              => $contentMenu,
  'container'         => 'nav',
  'container_id'      => false,
  'container_class'   => '',
  'menu_id'           => false,
  'menu_class'        => 'nav nav-sidebar documentation',
  'fallback_cb'       => 'nav_walker_sidebar::fallback',
  'walker'            => new nav_walker_sidebar()
  )
);

echo '</div>';

?>
