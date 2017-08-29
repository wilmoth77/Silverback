<?php
/**
* The Template for displaying all single posts.
*
* @package Silverback
*/

get_template_part( 'partials/bestcase/header', 'bestcase-examples' ); ?>
<div class="container-fluid">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
	</article>
</div>

<?php get_template_part( 'partials/bestcase/footer', 'bestcase-examples' ); ?>
