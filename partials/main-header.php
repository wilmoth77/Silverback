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
    echo do_shortcode( '[content_block id="683" suppress_content_filters="yes"]' );
    ?>
  </div>
</div>

<?php elseif ( is_home() ) : ?>
  <div class="main-hero">
      <div class="silverback-blog-hero">
        <header class="heropanel--video"
        data-vide-bg="mp4: /wp-content/uploads/gorilla_pool.mp4, poster: /wp-content/uploads/silverback_hero.gif"
        data-vide-options="posterType: gif, loop: true, muted: true, position: 50% 50%">
    <div class="silverback-blog-hero__content">
      <div class="container">
        <div class="row">
          <?php  echo do_shortcode( '[content_block id="1327" suppress_content_filters="yes"]' ); ?>
        </div>
      </div>
    </div>
 </header>
      </div>
  </div>

<?php elseif ( is_blog_page() ) : ?>
  <div class="main-hero">
      <div class="silverback-post-hero">
        <header class="heropanel--video"
        data-vide-bg="mp4: /wp-content/uploads/gorilla_pool.mp4, poster: /wp-content/uploads/silverback_hero.gif"
        data-vide-options="posterType: gif, loop: true, muted: true, position: 50% 50%">
    <div class="silverback-blog-hero__content">
      <div class="container">
        <div class="row">
          <div class="silverback-welcome"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>
        </div>
      </div>
    </div>
 </header>
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
