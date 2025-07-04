<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp-accessibility-day
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			echo '<div class="header-section">';
			the_title( '<div class="header-content-single"><h1 class="entry-title">', '</h1>' );
			if ( 'post' === get_post_type() && is_singular() ) : ?>
				<div class="entry-meta">
					<?php wp_accessibility_day_posted_on(); ?>
					<?php wp_accessibility_day_entry_footer(); ?>
				</div><!-- .entry-meta -->
			</div>
			<?php
			endif;
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( array( 704, 392 ), array( 'data-thumbnail' => 'true' ) );
			endif;
			echo '</div>';
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() && ! is_singular() ) : ?>
		<div class="entry-meta">
			<?php wp_accessibility_day_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
<div class="single-post">
	<div class="entry-content">
		<?php
			if ( ! is_singular() ) {
				if ( has_post_thumbnail() ) :
					the_post_thumbnail();
				endif;
			}
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-accessibility-day' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-accessibility-day' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php get_sidebar(); ?>
</div>
</article><!-- #post-<?php the_ID(); ?> -->

