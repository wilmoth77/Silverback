<?php
/**
* The template used for displaying page content in documentation_bc.php
*
* @package Silverback
*
*
* Start by getting the left hand sidebar navigation for Silverback
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
    <?php
    /**
    * Check to see if the ACF setting for a right hand sidebar navigation is set
    */
    if( get_field('content_navigation') ): ?>

    <div class="main-primary-container has-tertiary ">

      <?php if( have_rows('docs_intro') ): ?>
        <?php while( have_rows('docs_intro') ): the_row(); ?>
          <section class="sb-docs-section intro">
            <header>
              <?php if( get_sub_field('intro_title') ): ?>
                <h2 class="section-intro-heading"><?php the_sub_field('intro_title'); ?></h2>
              <?php endif; ?>
              <?php if( get_sub_field('intro_paragraph') ): ?>
                <p><?php the_sub_field('intro_paragraph'); ?></p>
              <?php endif; ?>
            </header>
          </section>
        <?php endwhile;
      endif; //can only have one row from the editor?>

      <?php if( have_rows('docs_section') ): ?>
        <?php while( have_rows('docs_section') ): the_row(); ?>

          <section class="sb-docs-section">
            <?php if( get_sub_field('section_heading') ): ?>
              <h3 class="section-heading"><?php the_sub_field('section_heading'); ?></h3>
            <?php endif; ?>

            <?php if( have_rows('docs_subsection') ): ?>
              <?php while( have_rows('docs_subsection') ): the_row(); ?>

                <?php if( get_sub_field('nav_anchor') ): ?>
                  <section id="<?php the_sub_field('nav_anchor'); ?>" class="sb-docs-subsection">
                  <?php endif; //can only have one row from the editor?>

                  <?php if( get_sub_field('section_subheading') ): ?>
                    <h4 class="section-subheading"><?php the_sub_field('section_subheading'); ?></h4>
                  <?php endif; ?>

                  <?php if( get_sub_field('section_copy') ): ?>
                    <div>
                      <?php the_sub_field('section_copy'); ?>
                    </div>
                  <?php endif; ?>

                  <?php

                  $visual_example = get_sub_field('visual_example');

                  if( $visual_example ):

                    // override $post
                    $post = $visual_example;
                    setup_postdata( $post );

                    ?>
                    <section class="section-example">
                      <div class="example-container">
                        <div class="example-container-body">
                          <iframe class="col-xs-12" src="<?php the_permalink(); ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
                        </div>

                        <?php if( have_rows('code_example') ): ?>
                          <div class="example-container-footer">
                            <button class="sb-btn btn btn-primary view-code" type="button" data-toggle="collapse" data-target="#exampleId-<?php echo get_the_ID() ?>" aria-expanded="false" aria-controls="exampleId-<?php echo get_the_ID() ?>">
                              View code
                            </button>
                            <?php
                            echo '<div class="collapse" id="exampleId-'.get_the_ID().'">';
                            while( have_rows('code_example') ): the_row();
                            ?>
                            <div class="prismjs-code">

                              <?php
                              // vars
                              $code_type = get_sub_field_object('code_type');
                              $value = $code_type['value'];
                              $label = $code_type['choices'][ $value ];
                              ?>

                              <h5><?php echo $label; ?></h5>

                              <?php if( $value == 'markup' ): ?>
                                <pre class="snippet"><code class="language-<?php echo $value; ?>"><script type="prism-html-markup"><?php the_content(); ?></script>
                                </code></pre>
                              </div>

                            <?php else: ?>
                              <pre class="snippet"><code class="language-<?php echo $value; ?>"><?php the_sub_field('code_block'); ?>
                              </code></pre>
                            </div>
                          <?php endif; ?>

                        <?php endwhile; //has code example(s) ?>
                      </div>
                    </div>
                  <?php endif; //has code example(s)?>

                </div>
              </section> <!-- /section-example -->
              <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

            <?php endif; //has visual example?>

          </section> <!-- /sb-docs-subsection -->
        <?php endwhile; //has more subsections
      endif; //has more docs subsections ?>

    </section> <!-- /sb-docs-section -->
  <?php endwhile; //has more docs sections
endif; //has more docs sections ?>

</div> <!-- /#main-primary-containern -->

<div class="main-tertiary">
  <?php get_template_part( 'partials/sidebar-tertiary', 'acf' ); ?>
</div>
<?php
/**
* Check for a right hand sidebar navigation was FALSE
*/
else: ?>
<div class="main-primary-container">
  <?php the_content(); ?>
</div>
<?php endif; ?>
</div>
</div>
