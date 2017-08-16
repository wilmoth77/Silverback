<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*
* @package Silverback
*/
?>
<footer id="app-footer">
  <?php
  dynamic_sidebar( 'footer' ); // Display the footer sidebar
  ?>
</footer>
      <?php wp_footer(); ?>
    </div> <!-- /#app -->
  </body>
</html>
