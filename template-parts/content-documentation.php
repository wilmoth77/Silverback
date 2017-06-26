<?php
/**
* The template used for displaying page content in page.php
*
* @package Silverback
*/
?>
<div class="primary-secondary col-sm-3 col-md-2">
  <?php get_template_part( 'template-parts/sidebar', 'secondary' ); ?>
</div>
<?php if( get_field('contents_menu') ): ?>
<div class="primary-main has-tertiary col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 ">
  <?php get_template_part( 'template-parts/primary-main', 'header' ); ?>
  <div class="row">
      <div class="primary-main-container ">
        <?php the_content(); ?>
      </div>
      <div class="primary-tertiary col-md-3">
        <?php get_template_part( 'template-parts/sidebar', 'tertiary' ); ?>
      </div>
</div>
</div>
<?php else: ?>
  <div class="primary-main col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 ">
    <?php get_template_part( 'template-parts/primary-main', 'header' ); ?>
    <div class="row">
        <div class="primary-main-container ">
          <?php the_content(); ?>
        </div>
  </div>
  </div>
<?php endif; ?>
