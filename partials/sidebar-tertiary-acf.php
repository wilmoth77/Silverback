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
<h4><span class="sidebar-title">' . $page_title . ' Contents</span></h4>';

echo 'Nav items from ACF here...';

echo '</div>';

?>
