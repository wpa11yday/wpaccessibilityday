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
				<p class="tag-us">
					Tag us! <a href="https://twitter.com/hashtag/WPA11yDay">#WPA11yDay</a> and <a href="https://twitter.com/hashtag/WPAD2023">#WPAD<?php echo $year; ?></a>
				</p>
				<p class="copyright">
					©2020&ndash;<?php echo date( 'Y' ); ?> WordPress Accessibility Day
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
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
