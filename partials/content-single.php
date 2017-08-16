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
      <img src="<?php echo $image[0] ?>" class="img-responsive single-featured-image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
      <?php endif; ?>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="entry-meta">
					<?php slvrbk_posted_on(); ?>
				</div><!-- .entry-meta -->
    </header>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'slvrbk' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
  </article>
