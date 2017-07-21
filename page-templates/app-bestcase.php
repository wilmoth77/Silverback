<?php
/**
* Template Name: App - Best Case Online
*
* A template for showing full scale examples of Best Case
*
* @package Silverback
*/
get_template_part( 'template-parts/bestcase/header', 'bestcase' );
      while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/bestcase/switch', 'bestcase' );
      endwhile; // End of the loop.
      ?>
<!-- #primary -->
<?php get_template_part( 'template-parts/bestcase/footer', 'bestcase' );?>
