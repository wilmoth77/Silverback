<?php
/**
* Conditional switch for displaying the left navigation
*
* @package Silverback
*/
?>

<?php
$current_page = get_the_ID();

switch ( current_page ) {
  //case (is_page('7') || in_array('7', $post->ancestors)) :
  case (is_tree('7')) :
    wp_nav_menu( array(
      'menu'              => 'secondary_bestcase',
      'theme_location'    => 'secondary_bestcase',
      'container'         => 'nav',
      'container_id'      => false,
      'container_class'   => 'sidebar left',
      'menu_id'           => false,
      'menu_class'        => 'nav nav-sidebar documentation',
      'fallback_cb'       => 'nav_walker_sidebar::fallback',
      'walker'            => new nav_walker_sidebar()
      )
    );
break;
case (is_tree('57')) :
if (has_nav_menu('secondary_clientportal')) :
  wp_nav_menu( array(
    'menu'              => 'secondary_clientportal',
    'theme_location'    => 'secondary_clientportal',
    'container'         => 'nav',
    'container_id'      => false,
    'container_class'   => 'sidebar left ',
    'menu_class'        => 'nav nav-sidebar documentation',
    'fallback_cb'       => 'nav_walker_sidebar::fallback',
    'walker'            => new nav_walker_sidebar()
    )
  );
endif;
break;
}
?>
