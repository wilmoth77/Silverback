<?php
/**
*
* @package Silverback
*/
?>
<?php
//Condition of existing nav_menu was met in content-documentation.php
//so just display the menu now...

$page_title = get_the_title( $post );

echo '<div class="sidebar right">
<h4><span class="sidebar-title">' . $page_title . ' Contents</span></h4>'; ?>


<?php if( have_rows('docs_section') ): ?>
  <?php while( have_rows('docs_section') ): the_row(); ?>
    <?php if( have_rows('docs_subsection') ): ?>
      <?php while( have_rows('docs_subsection') ): the_row(); ?>
        <nav>
          <ul class="nav nav-sidebar documentation">
            <li class="menu-item"><a href="#<?php the_sub_field('nav_anchor'); ?>"><?php the_sub_field('nav_label'); ?></a></li>
          </ul>
        </nav>
      <?php endwhile;
    endif;?>
  <?php endwhile;
endif;?>

  <?php echo '</div>';

  ?>
