<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Silverback
 */
 get_header(); ?>

 <main class="content-area" role="main">
 	<?php get_template_part( 'template-parts/main', 'header' ); ?>
 	<?php get_template_part('template-parts/breadcrumbs'); ?>
 	<div id="primary" class="container news">
 		<div class="row">
 			<div class="primary-main col-md-8">
 				<?php if ( have_posts() ) : ?>

 					<?php /* Start the Loop */ ?>
 					<?php while ( have_posts() ) : the_post(); ?>

 						<?php
 						/* Include the Post-Format-specific template for the content.
 						* If you want to override this in a child theme, then include a file
 						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
 						*/
 						get_template_part( 'template-parts/content', get_post_format() );
 						?>

 					<?php endwhile; ?>

 					<?php slvrbk_paging_nav(); ?>

 				<?php else : ?>

 					<?php get_template_part( 'template-parts/content', 'none' ); ?>

 				<?php endif; ?>
 			</div>
 			<div class="primary-secondary col-md-3 col-md-offset-1">
 				<?php get_sidebar(); ?>
 			</div>
 		</div>
 	</div>
 </main>

 <?php get_footer(); ?>
