<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Silverback
 */

get_header(); ?>

<main class="content-area" role="main">
	<?php get_template_part( 'partials/main', 'header' ); ?>
	<div id="primary" class="container news">
		<div class="row">
			<div class="primary-main col-md-8">
					<h2 class="page-header"><?php _e( 'Oops! That page can&rsquo;t be found.', 'cingrp' ); ?></h1>
						<p class="lead"><?php _e( 'It looks like nothing was found at this location.', 'cingrp' ); ?></p>
			</div>
			<div class="primary-secondary col-md-3 col-md-offset-1">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
