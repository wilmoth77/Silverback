<?php
/**
 * Silverback Includes
 *
 * @package Silverback
 *
 * The $Silverback_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$Silverback_includes = array(
  'inc/scripts.php',                // Scripts and stylesheets
  'inc/config.php',                 // Configuration
  'inc/extras.php',                 // Custom functions that act independently of the theme templates (_s)
  'inc/template-tags.php',          // Custom template tags for this theme (_s)
  'inc/jetpack.php',                // Load Jetpack compatibility file. (_s)
  'inc/theme.php',                  // My temp php file while dividing these up
  'inc/nav_walker_bootstrap.php',  // Register Custom Navigation Walker
  'inc/nav_walker_sidebar.php',  // Register Custom Navigation Walker for sidemenu
);

foreach ($Silverback_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'Silverback'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
