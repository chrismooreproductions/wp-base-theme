<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package discrete-base-theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
if ( is_home() ) {
	return;
}

?>
<div class="col-md-3">
	<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
</div>
