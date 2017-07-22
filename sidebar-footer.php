<?php
/**
 * The Footer Widget sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CCL_User_Experience
 */

if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
}
?>

<aside id="footer-widget-area" class="widget-area footer-widgets">
	<?php dynamic_sidebar( 'footer-1' ); ?>
</aside><!-- #secondary -->
