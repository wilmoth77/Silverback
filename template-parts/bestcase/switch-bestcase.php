<?php
/**
* The template used for displaying page content in page.php
*
* @package Silverback
*/
?>
<div id="sb-docs-wrap-bestcaseonline" class="main-grid">
  <h1>test!!</h1>
  <?php
  /**
  * The switch to get the different pages of the Best Case Application
  *
  * @package BestCase
  */

  ?>
  <?php
  // Get the queried object and sanitize it
  $current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
  // Get the page slug
  $slug = $current_page->post_name;
  //debug_to_console( $slug );
  // Set var showpage to the post slug
  $showPage = $slug;

  switch ( $showPage ) {
    case 'one-column':
    get_template_part( 'template-parts/bestcase/views', 'one-column' );
    break;
    case 'two-column':
    get_template_part( 'template-parts/bestcase/views', 'two-column' );
    break;
    case 'three-column':
    get_template_part( 'template-parts/bestcase/', 'three-column' );
    break;
  }
  ?>

</div>
