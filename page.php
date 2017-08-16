<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Silverback
 */

get_header(); ?>

<main class="content-area" role="main">
			<?php
		 while ( have_posts() ) : the_post();
		 get_template_part( 'partials/main', 'header' );
		 ?>
		 <div id="primary" class="container">
			 <div class="row">
			 <?php get_template_part( 'partials/content', 'page' ); ?>
		 </div>
	 </div>
		 <?php endwhile; // End of the loop.
		 ?>
	</main>
	<!-- #primary -->
<?php get_footer();?>
