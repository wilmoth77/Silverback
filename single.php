<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Silverback
 */

get_header(); ?>

<main class="content-area" role="main">
			<?php	get_template_part( 'partials/main', 'header' );		 ?>
		 <div id="primary" class="container news">
			 <div class="row">
				 <div class="primary-main col-md-8">
					 <?php while ( have_posts() ) : the_post(); ?>

			 			<?php get_template_part( 'partials/content', 'single' ); ?>

			 			<?php slvrbk_post_nav(); ?>

			 			<?php
			 				// If comments are open or we have at least one comment, load up the comment template
			 				if ( comments_open() || '0' != get_comments_number() ) :
			 					comments_template();
			 				endif;
			 			?>

			 		<?php endwhile; // end of the loop. ?>
				 </div>
				 <div class="primary-secondary col-md-3 col-md-offset-1">
					 <?php get_sidebar(); ?>
				 </div>
		 </div>
	 </div>
	</main>

<?php get_footer(); ?>
