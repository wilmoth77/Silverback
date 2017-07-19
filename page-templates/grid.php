<?php
/**
* Template Name: Grid
*
* @package Silverback
*/
get_header(); ?>
      <?php
      while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content', 'grid' );
      endwhile; // End of the loop.
      ?>
<!-- #primary -->
<?php get_footer();?>
