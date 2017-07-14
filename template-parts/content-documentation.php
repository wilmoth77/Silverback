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
  <?php get_template_part( 'template-parts/sidebar', 'secondary' ); ?>
</div>
<div class="main-primary">
  <?php get_template_part( 'template-parts/main-primary', 'header' ); ?>
  <div class="gorilla-nest">
    <?php if( get_field('nav_menu') ): ?>
      <div class="main-primary-container has-tertiary ">
        <?php the_content(); ?>
      </div>
      <div class="main-tertiary">
        <?php get_template_part( 'template-parts/sidebar', 'tertiary' ); ?>
      </div>
    <?php else: ?>
      <div class="main-primary-container">
        <?php the_content(); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
