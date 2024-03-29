<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp-accessibility-day
 */

get_header(); ?>
	<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		the_post_navigation( array(
			'prev_text' => '<span class="dashicons dashicons-arrow-left-alt" aria-hidden="true"></span> %title',
			'next_text' => '%title <span class="dashicons dashicons-arrow-right-alt" aria-hidden="true"></span>',
		) );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	</main><!-- #primary -->
<?php
get_footer();
