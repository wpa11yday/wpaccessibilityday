<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wp-accessibility-day
 */

get_header(); ?>
	
	<main id="primary" class="site-main">

			<header class="entry-header">
				<div class="entry-header-content">
					<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-accessibility-day' ); ?></h1>
				</div>
			</header><!-- .page-header -->

			<div class="entry-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wp-accessibility-day' ); ?></p>

				<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
				?>

			</div><!-- .page-content -->

	</main><!-- #primary -->

<?php
get_footer();
