<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp-accessibility-day
 */

?>

<footer id="colophon" class="site-footer">
	<h2 class="sr-only">
		Footer
	</h2>
	<?php
		wp_accessibility_day_footer_sidebars();
	?>
	<div id="bottom-credits">
		<div class="wrap">
			<div class="site-logo">
				<p class="lockup">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/lockup.png'; ?>" alt="WpA11yDay" width="250" />
				</p>
				<?php $year = date( 'Y', strtotime( get_option( 'wpad_start_time' ) ) ); ?>
				<p class="footer-address"><b>WP Accessibility Day</b><br>PO Box 601<br>Georgetown, TX 78627</p>
				<p class="tag-us">
					<b>Tag us!</b> We're @WPA11yDay on most social media platforms.<br> 
					Hashtags: #WPA11yDay <?php if ( ! is_wpad_main_site() ) { ?> and <a href="https://twitter.com/hashtag/WPAD2023">#WPAD<?php echo $year; ?></a> <?php } ?>
				</p>
				<p class="copyright">
					©2020&ndash;<?php echo date( 'Y' ); ?> WP Accessibility Day
				</p>
			</div>
			<div class="footer-navigation-menus">
				<nav id="footer-navigation" class="footer-navigation navigation" aria-label="Footer">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-3',
							'menu_id'        => 'footer-menu',
							'depth'          => 1,
						) );
					?>
				</nav><!-- #footer-navigation -->
				<div id="footer-utility-navigation" class="utility-navigation navigation">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-4',
							'menu_id'        => 'social-menu',
							'depth'          => 1,
						) );
					?>
				</div><!-- #footer-utility-navigation -->
			</div>
		</div><!-- #wrap -->
	</div><!-- #bottom-credits -->
	<?php
	if ( is_active_sidebar( 'footer-widget-area' ) ) {
		?>
		<div id="footer-sidebar-full" class="footer-sidebar full-width widget-area">
			<?php dynamic_sidebar( 'footer-widget-area' ); ?>
		</div>
		<?php
	}
	?>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
