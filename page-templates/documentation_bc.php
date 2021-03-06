<?php
/**
* Template Name: Documentation BestCase
*
* The layout of the main content area for
* the documentation pages of the style guide(s)
* @package Silverback
*/
get_header(); ?>
<main id="silverback-main" class="content-area" role="main">
<div class="gorilla-nest">
      <?php
      while ( have_posts() ) : the_post();
      get_template_part( 'partials/content-documentation', 'acf' );
      endwhile; // End of the loop.
      ?>
    </div>
</main>
<!-- #primary -->
<?php get_footer();?>
