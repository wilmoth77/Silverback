<?php
/**
* The template used for displaying page content in page.php
*
* @package Silverback
*/
?>
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

?>
<main id="app-outer">
  <div id="app-container">
    <?php
    switch ( $showPage ) {

      // One column //////////////////////////////////////////////////////////
      case 'one-column':
      ?>
      <div id="app-content">
        <?php get_template_part( 'partials/bestcase/views/contentMain'); ?>
      </div> <!-- /#app-content -->
      <?php
      break;


      // Two column //////////////////////////////////////////////////////////
      case 'two-column': ?>
      <div id="app-content">
        <?php get_template_part( 'partials/bestcase/views/contentLeft'); ?>
        <?php get_template_part( 'partials/bestcase/views/contentMain'); ?>
      </div> <!-- /#app-content -->
      <?php
      break;


      // Three column ////////////////////////////////////////////////////////
      case 'three-column': ?>
      <div id="app-content">
        <?php get_template_part( 'partials/bestcase/views/contentLeft'); ?>
        <?php get_template_part( 'partials/bestcase/views/contentMain'); ?>
        <?php get_template_part( 'partials/bestcase/views/contentRight'); ?>
      </div> <!-- /#app-content -->
      <?php
      break;


      // Testing template //////////////////////////////
      case 'testing': ?>
      <div id="app-content">
      <?php get_template_part( 'partials/bestcase/views/contentTestTemplate'); ?>
      </div> <!-- /#app-content -->
      <?php
      break;
    }
    ?>
  </div> <!-- /#app-container -->
</main> <!-- /#app-outer -->
