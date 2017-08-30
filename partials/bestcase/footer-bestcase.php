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
  <div id="footer-container">
    <div id="footer-content">
      <div id="footer-content-primary">
        <?php get_template_part( 'partials/bestcase/views/footer'); ?>
      </div> <!-- /#footer-content-primary -->
    </div> <!-- /#footer-content -->
  </div> <!-- /#footer-container -->
</footer> <!-- /#app-footer -->
<?php wp_footer(); ?>
</div> <!-- /#app -->
</body>
</html>
