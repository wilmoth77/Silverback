<?php
/**
* The template used for displaying either a hero or a page header
*
* @package Silverback
*/
?>

<?php if ( is_404() ) : ?>
  <div class="main-hero">
    <div class="container">
    </div>
  </div>
<div class="main-header">
  <div class="container">
    <h1 class="entry-title">
      This isn’t the page you’re looking for...
    </h1>
  </div>
</div>
<?php elseif ( is_front_page() ) : ?>
<div class="main-hero">
  <div class="container">
    <?php
    echo do_shortcode( '[content_block id="24"]' );
    ?>
  </div>
</div>
<?php elseif ( is_blog_page() ) : ?>
  <div class="main-hero">
    <div class="container">
    </div>
  </div>
  <div class="main-header">
    <div class="container">
      <h1 class="entry-title">
        <?php
        echo apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) );
        ?>
      </h1>
    </div>
  </div>
<?php else: ?>
  <div class="main-hero">
    <div class="container">
    </div>
  </div>
  <div class="main-header">
    <div class="container">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </div>
  </div>
<?php endif; ?>
