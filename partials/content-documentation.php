<?php
/**
* The template used for displaying page content in page.php
*
* @package Silverback
*/
?>
<div class="main-secondary">
  <div class="main-brand" itemtype="http://schema.org/Organization">
    <a class="main-brand-logo" href="/"><?php bloginfo( 'name' ); ?></a>
  </div>
  <?php get_template_part( 'partials/sidebar', 'secondary' ); ?>
</div>
<div class="main-primary">
  <?php get_template_part( 'partials/main-primary', 'header' ); ?>
  <div class="gorilla-nest">
    <?php if( get_field('nav_menu') ): ?>
      <div id="sb-docs-wrap-bestcaseonline" class="main-primary-container has-tertiary ">
        <?php the_content(); ?>
      </div>
      <div class="main-tertiary">
        <?php get_template_part( 'partials/sidebar', 'tertiary' ); ?>
      </div>
    <?php else: ?>
      <div id="sb-docs-wrap-bestcaseonline" class="main-primary-container">
        <?php the_content(); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
