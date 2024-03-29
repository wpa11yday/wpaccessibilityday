<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp-accessibility-day
 */

get_header(); ?>

	<main id="primary" class="site-main">

	<?php
	if ( have_posts() ) : ?>

		<header class="entry-header">
			<div class="entry-header-content">
			<?php
				the_archive_title( '<h1 class="entry-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>
			</div>
		</header><!-- .page-header -->
		<div class="entry-list">
		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/**
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'archive' );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>
		</div>
	</main><!-- #primary -->

<?php
get_footer();
