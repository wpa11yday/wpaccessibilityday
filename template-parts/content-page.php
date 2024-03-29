<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp-accessibility-day
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_front_page() ) {
			echo '<div class="header-svg-container">';
		}
		if ( ! is_front_page() ) { ?>
		<div class="entry-header-content">
		<?php }
		the_title( '<h1 class="entry-title">', '</h1>' );
		if ( is_front_page() ) {
			dynamic_sidebar( 'event-date-widget-area' );
		}
		if ( ! is_front_page() && has_excerpt() ) {
			echo '<div class="page-excerpt">';
			the_excerpt();
			echo '</div>';
		}
		do_action( 'wpad_entry_header' );
		if ( ! is_front_page() ) {
			?>
		</div>
			<?php 
			echo wpad_header_svg();
		} else {
			echo '</div>';
		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-accessibility-day' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'wp-accessibility-day' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
