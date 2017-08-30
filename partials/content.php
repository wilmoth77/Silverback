<?php
/**
 * @package Silverback
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if (has_post_thumbnail()):
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
		?>
		<a class="cpt-thumbnail" href="<?php the_permalink(); ?>" ><img src="<?php echo $image[0] ?>" class="img-responsive" alt="<?php the_title(); ?>"/></a>
		<?php endif; ?>
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php slvrbk_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-summary">
		<?php the_content(); ?>
	</div>
</article>
