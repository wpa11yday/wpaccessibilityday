<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp-accessibility-day
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wp-accessibility-day' ); ?></a>
	<header id="masthead">
		<div class="site-branding">
			<?php
			if ( is_front_page() ) {
				?>
			<p class="site-title"><span class="wrapper"><?php echo wpad_site_logo( get_bloginfo( 'name' ) ); ?></span></p>
				<?php
			} else {
				?>
			<p class="site-title"><a href="<?php echo esc_url( home_url() ); ?>" class="wrapper"><?php echo wpad_site_logo( get_bloginfo( 'name' ) ); ?></a></p>
				<?php
			}
			?>
		</div><!-- .site-branding -->
		<div class="site-utilities">
			<div class="utility-tools">
				<nav id="utility-navigation" class="utility-navigation navigation" aria-label="Social">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'utility-menu',
							'depth'          => 1,
						) );
					?>
				</nav><!-- #utility-navigation -->
				<div class="utility-dark-mode placeholder">
					<button type="button" aria-pressed="true" aria-label="Light mode"><span class="icon-light" aria-hidden="true"></span></button><button type="button" aria-pressed="false" aria-label="Dark mode"><span class="icon-dark" aria-hidden="true"></span></button>
				</div>
			</div>
			<nav id="main-navigation" class="main-navigation navigation" aria-label="Main">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'wp-accessibility-day' ); ?></button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<?php
	if ( ! is_front_page() && function_exists( 'yoast_breadcrumb' ) ) {
		?>
		<nav aria-label="Breadcrumbs" class="nav-breadcrumbs">
		<?php
		yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		?>
		</nav>
		<?php
	}
	?>
