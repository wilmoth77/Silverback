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
      case 'at1':
      ?>
      <div id="app-content">
        <?php get_template_part( 'partials/bestcase/views/primary'); ?>
      </div> <!-- /#app-content -->
      <?php
      break;


      // Two column //////////////////////////////////////////////////////////
      case 'at2': ?>
      <div id="app-content" class="secondary-offcanvas">
        <?php get_template_part( 'partials/bestcase/views/secondary'); ?>
        <?php get_template_part( 'partials/bestcase/views/primary'); ?>
      </div> <!-- /#app-content -->
      <?php
      break;

      // Two column //////////////////////////////////////////////////////////
      case 'at3': ?>
      <div id="app-content">
        <?php get_template_part( 'partials/bestcase/views/primary'); ?>
        <?php get_template_part( 'partials/bestcase/views/tertiary'); ?>
      </div> <!-- /#app-content -->
      <?php
      break;


      // Three column ////////////////////////////////////////////////////////
      case 'at4': ?>
      <div id="app-content" class="secondary-offcanvas">
        <?php get_template_part( 'partials/bestcase/views/secondary'); ?>
        <?php get_template_part( 'partials/bestcase/views/primary'); ?>
        <?php get_template_part( 'partials/bestcase/views/tertiary'); ?>
      </div> <!-- /#app-at4!! -->
      <?php
      break;

      // One column - shows html of the post content inside a panel-body ///////
      default: ?>
      <div id="app-content">
        <div id="app-content-primary">
          <h2><?php echo $showPage; ?></h2>
          <?php the_content(); ?>
          <a href="/bestcase/layout/app-templates/" type="button" class="btn btn-link"><i class="mdi mdi-arrow-left"></i>&nbsp;&nbsp;Return to App Templates page</a>
        </div> <!-- /#app-content-primary -->
      </div> <!-- /#app-content -->
      <?php
      break;
    }
    ?>
  </div> <!-- /#app-container -->
</main> <!-- /#app-outer -->
