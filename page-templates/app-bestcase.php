<?php
/**
* Template Name: App - Best Case Online
*
* A template for showing full scale examples of Best Case
*
* @package Silverback
*/
get_template_part( 'partials/bestcase/views/header' );
      while ( have_posts() ) : the_post();
      get_template_part( 'partials/bestcase/views/app', 'templates' );
      endwhile; // End of the loop.
      ?>
<!-- #primary -->
<?php get_template_part( 'partials/bestcase/views/footer'  );?>
