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

    <div class="main-primary-container has-tertiary">
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

          <?php if( have_rows('docs_free_form') ): ?>
            <?php while( have_rows('docs_free_form') ): the_row(); ?>
              <section class="sb-docs-section">
                <?php the_sub_field('docs_wysiwyg'); ?>
              </section>
            <?php endwhile; ?>
          <?php endif; ?>

          <section class="sb-docs-section">
            <?php if( get_sub_field('section_heading') ): ?>
              <h3 class="section-heading"><?php the_sub_field('section_heading'); ?></h3>
            <?php endif; ?>

            <?php if( have_rows('docs_subsection') ): ?>
              <?php while( have_rows('docs_subsection') ): the_row(); ?>

                <?php if( get_sub_field('nav_anchor') ): ?>
                  <section id="<?php the_sub_field('nav_anchor'); ?>" class="sb-docs-subsection">
                  <?php else: ?>
                    <section class="sb-docs-subsection">
                    <?php endif; //can only have one row from the editor?>

                    <?php if( get_sub_field('section_subheading') ): ?>
                      <h4 class="section-subheading"><?php the_sub_field('section_subheading'); ?></h4>
                    <?php endif; ?>

                    <?php if( get_sub_field('section_copy') ): ?>
                      <div>
                        <?php the_sub_field('section_copy', false); ?>
                      </div>
                    <?php endif; ?>


                    <?php if( have_rows('iframe') ):
                      while( have_rows('iframe') ): the_row();
                      ?>

                      <?php $visual_example = get_sub_field('visual_example');

                      if( $visual_example ):

                        // override $post
                        $post = $visual_example;
                        setup_postdata( $post );

                        ?>


                        <section class="section-example">
                          <div class="example-container">
                            <div class="example-container-body">
                              <?php
                              // vars
                              $example_type = get_sub_field_object('example_media_type');
                              $value = $example_type['value'];
                              $label = $example_type['choices'][ $value ];
                              ?>

                              <?php if( $value == 'phone' ): ?>
                                <div id="screen-rotation">
                                  <button class="btn btn-link screen-rotation-phone"><i class="mdi mdi-screen-rotation"></i>Rotate device</button>
                                </div>
                                <div id="orientation" class="iframe-container phone">
                                  <iframe class="iframe-phone" src="<?php the_permalink(); ?>" frameborder="0" scrolling="no"></iframe>
                                </div>
                                <span class="small"><em>iPhone 6 shown in example - 375x667 viewport</em></span>

                              <?php elseif( $value == 'tablet' ): ?>
                                <div id="screen-rotation">
                                  <button class="btn btn-link screen-rotation-tablet"><i class="mdi mdi-screen-rotation"></i>Rotate device</button>
                                </div>
                                <div id="orientation" class="iframe-container tablet">
                                  <iframe class="iframe-tablet" src="<?php the_permalink(); ?>" frameborder="0" scrolling="no" height="1024px" width="768px"></iframe>
                                </div>
                                <span class="small"><em>Standard iPad shown in example - 768x1024 viewport</em></span>

                              <?php else: ?>
                                <iframe class="col-xs-12 iframe-desktop" src="<?php the_permalink(); ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>

                              <?php endif; ?>
                            </div>
                            <?php if( have_rows('code_example') ): ?>
                              <?php
                              // vars
                              $exampleId = get_the_ID();
                              $rando = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
                              ?>
                              <div class="example-container-footer">
                                <button class="sb-btn btn btn-primary view-code" type="button" data-toggle="collapse" data-target="#exampleId-<?php echo $exampleId.$rando;?>" aria-expanded="false" aria-controls="exampleId-<?php echo $exampleId.$rando;?>">
                                  View code
                                </button>
                                <?php
                                echo '<div class="collapse" id="exampleId-'.$exampleId.$rando.'">';
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

              <?php endwhile; //has iframe
            endif; //has iframe ?>
            <?php
            // vars
            $example_type = get_sub_field_object('notes_columns');
            $value = $example_type['value'];
            ?>

            <?php if( $value !== '0' ): ?>
              <div class="subsection-notes">
                <h6><i class="mdi mdi-note-text"></i> Notes for the <em><?php the_sub_field('section_subheading'); ?></em> section:</h6>
                <div class="subsection-notes-container">
                  <div class="row">
                    <?php if( $value == '3' ): ?>
                      <div class="col-sm-4">
                        <?php the_sub_field('subsection_notes_1'); ?>
                      </div>
                      <div class="col-sm-4">
                        <?php the_sub_field('subsection_notes_2'); ?>
                      </div>
                      <div class="col-sm-4">
                        <?php the_sub_field('subsection_notes_3'); ?>
                      </div>

                    <?php elseif( $value == '2' ): ?>
                      <div class="col-sm-6">
                        <?php the_sub_field('subsection_notes_1'); ?>
                      </div>
                      <div class="col-sm-6">
                        <?php the_sub_field('subsection_notes_2'); ?>
                      </div>

                    <?php elseif( $value == '1' ): ?>
                      <div class="col-sm-12">
                        <?php the_sub_field('subsection_notes'); ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </section> <!-- /sb-docs-subsection -->
        <?php endwhile; //has more subsections
      endif; //has more docs subsections ?>

    </section> <!-- /sb-docs-section -->
  <?php endwhile; //has more docs sections
endif; //has more docs sections ?>

<?php if( have_rows('icon_library') ): ?>
  <section id="icon-library" class="sb-docs-subsection">
    <ul class="icons-list">
      <?php  while ( have_rows('icon_library') ) : the_row(); ?>
        <li>
          <div class="media">
            <div class="media-left">
              <button><i class="mdi mdi-<?php the_sub_field('icon_class'); ?> media-object" title="Copy Class"></i></button>
            </div>
            <div class="media-body">
              <h6 class="media-heading"><?php the_sub_field('icon_description'); ?></h6>
              <span><code>mdi-<?php the_sub_field('icon_class'); ?></code></span>
            </div>
          </div>
        </li>
      <?php  endwhile; ?>
    </ul>
  </section>
<?php endif; ?>
</div> <!-- /#main-primary-container -->

<div class="main-tertiary">
  <?php get_template_part( 'partials/sidebar-tertiary', 'acf' ); ?>
</div>
<?php
/**
* Check for a right hand sidebar navigation was FALSE
*/
else: ?>
<div class="main-primary-container">
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

      <?php if( have_rows('docs_free_form') ): ?>
        <?php while( have_rows('docs_free_form') ): the_row(); ?>
          <section class="sb-docs-section">
            <?php the_sub_field('docs_wysiwyg'); ?>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>

      <section class="sb-docs-section">
        <?php if( get_sub_field('section_heading') ): ?>
          <h3 class="section-heading"><?php the_sub_field('section_heading'); ?></h3>
        <?php endif; ?>

        <?php if( have_rows('docs_subsection') ): ?>
          <?php while( have_rows('docs_subsection') ): the_row(); ?>

            <?php if( get_sub_field('nav_anchor') ): ?>
              <section id="<?php the_sub_field('nav_anchor'); ?>" class="sb-docs-subsection">
              <?php else: ?>
                <section class="sb-docs-subsection">
                <?php endif; //can only have one row from the editor?>

                <?php if( get_sub_field('section_subheading') ): ?>
                  <h4 class="section-subheading"><?php the_sub_field('section_subheading'); ?></h4>
                <?php endif; ?>

                <?php if( get_sub_field('section_copy') ): ?>
                  <div>
                    <?php the_sub_field('section_copy', false); ?>
                  </div>
                <?php endif; ?>


                <?php if( have_rows('iframe') ):
                  while( have_rows('iframe') ): the_row();
                  ?>

                  <?php $visual_example = get_sub_field('visual_example');

                  if( $visual_example ):

                    // override $post
                    $post = $visual_example;
                    setup_postdata( $post );

                    ?>


                    <section class="section-example">
                      <div class="example-container">
                        <div class="example-container-body">
                          <?php
                          // vars
                          $example_type = get_sub_field_object('example_media_type');
                          $value = $example_type['value'];
                          $label = $example_type['choices'][ $value ];
                          ?>

                          <?php if( $value == 'phone' ): ?>
                            <div id="screen-rotation">
                              <button class="btn btn-link screen-rotation-phone"><i class="mdi mdi-screen-rotation"></i>Rotate device</button>
                            </div>
                            <div id="orientation" class="iframe-container phone">
                              <iframe class="iframe-phone" src="<?php the_permalink(); ?>" frameborder="0" scrolling="yes"></iframe>
                            </div>
                            <span class="small"><em>iPhone 6 shown in example - 375x667 viewport</em></span>

                          <?php elseif( $value == 'tablet' ): ?>
                            <div id="screen-rotation">
                              <button class="btn btn-link screen-rotation-tablet"><i class="mdi mdi-screen-rotation"></i>Rotate device</button>
                            </div>
                            <div id="orientation" class="iframe-container tablet">
                              <iframe class="iframe-tablet" src="<?php the_permalink(); ?>" frameborder="0" scrolling="yes" height="1024px" width="768px"></iframe>
                            </div>
                            <span class="small"><em>Standard iPad shown in example - 768x1024 viewport</em></span>

                          <?php else: ?>
                            <iframe class="col-xs-12 iframe-desktop" src="<?php the_permalink(); ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>

                          <?php endif; ?>
                        </div>
                        <?php if( have_rows('code_example') ): ?>
                          <?php
                          // vars
                          $exampleId = get_the_ID();
                          $rando = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
                          ?>
                          <div class="example-container-footer">
                            <button class="sb-btn btn btn-primary view-code" type="button" data-toggle="collapse" data-target="#exampleId-<?php echo $exampleId.$rando;?>" aria-expanded="false" aria-controls="exampleId-<?php echo $exampleId.$rando;?>">
                              View code
                            </button>
                            <?php
                            echo '<div class="collapse" id="exampleId-'.$exampleId.$rando.'">';
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

          <?php endwhile; //has iframe
        endif; //has iframe ?>
        <?php
        // vars
        $example_type = get_sub_field_object('notes_columns');
        $value = $example_type['value'];
        ?>

        <?php if( $value !== '0' ): ?>
          <div class="subsection-notes">
            <h6><i class="mdi mdi-note-text"></i> Notes for the <em><?php the_sub_field('section_subheading'); ?></em> section:</h6>
            <div class="subsection-notes-container">
              <div class="row">
                <?php if( $value == '3' ): ?>
                  <div class="col-sm-4">
                    <?php the_sub_field('subsection_notes_1'); ?>
                  </div>
                  <div class="col-sm-4">
                    <?php the_sub_field('subsection_notes_2'); ?>
                  </div>
                  <div class="col-sm-4">
                    <?php the_sub_field('subsection_notes_3'); ?>
                  </div>

                <?php elseif( $value == '2' ): ?>
                  <div class="col-sm-6">
                    <?php the_sub_field('subsection_notes_1'); ?>
                  </div>
                  <div class="col-sm-6">
                    <?php the_sub_field('subsection_notes_2'); ?>
                  </div>

                <?php elseif( $value == '1' ): ?>
                  <div class="col-sm-12">
                    <?php the_sub_field('subsection_notes'); ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </section> <!-- /sb-docs-subsection -->
    <?php endwhile; //has more subsections
  endif; //has more docs subsections ?>

</section> <!-- /sb-docs-section -->
<?php endwhile; //has more docs sections
endif; //has more docs sections ?>
</div>
<?php endif; ?>
</div>
</div>
