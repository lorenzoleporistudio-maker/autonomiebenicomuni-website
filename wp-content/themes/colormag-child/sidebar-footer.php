<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

<?php
/**
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if( !is_active_sidebar( 'colormag_footer_sidebar_one' ) &&
	!is_active_sidebar( 'colormag_footer_sidebar_two' ) &&
   !is_active_sidebar( 'colormag_footer_sidebar_three' ) &&
   !is_active_sidebar( 'colormag_footer_sidebar_four' ) ) {
	return;
}
?>
<div class="footer-widgets-wrapper">
<div class="img"><img src="http://autonomiebenicomuni.eu/wp-content/uploads/2016/05/Banner-loghi-e1464427553790.png" /></div>
	<div class="inner-wrap">
		<div class="footer-widgets-area clearfix">
         <div class="tg-footer-main-widget">
   			<div class="tg-first-footer-widget">
   				<?php
   				if ( !dynamic_sidebar( 'colormag_footer_sidebar_one' ) ):
   				endif;
   				?>
   			</div>
         </div>
		</div>
	</div>
</div>