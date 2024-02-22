<?php
/**
 * The template for displaying the single session posts
 *
 * @package wp_conference_schedule_pro
 * @since 1.0.0
 */

get_header(); ?>

	<main id="primary" class="site-main">

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();
			$post_id           = get_the_ID();
			$first_name        = get_post_meta( $post_id, 'wpcsp_first_name', true );
			$last_name         = get_post_meta( $post_id, 'wpcsp_last_name', true );
			$full_name         = $first_name . ' ' . $last_name;
			$title             = get_post_meta( $post_id, 'wpcsp_title', true );
			$pronouns          = get_post_meta( $post_id, 'wpcsp_pronouns', true );
			$country           = get_post_meta( $post_id, 'wpcsp_country', true );
			$organization      = get_post_meta( $post_id, 'wpcsp_organization', true );
			$schedule_page_url = get_option( 'wpcs_field_schedule_page_url' );
			$speaker_page_url  = get_option( 'wpcsp_field_speakers_page_url' );

			$args     = array(
				'numberposts' => -1,
				'post_type'   => 'wpcs_session',
				'meta_query'  => array(
					array(
						'key'     => 'wpcsp_session_speakers',
						'value'   => $post->ID,
						'compare' => 'LIKE',
					),
				),
			);
			$sessions = get_posts( $args );
			if ( get_post_meta( get_the_ID(), 'wpcsp_user_email', true ) ) {
				$author = get_user_by( 'email', get_post_meta( get_the_ID(), 'wpcsp_user_email', true ) );
				if ( is_object( $author ) ) {
					$args   = array(
						'numberposts' => -1,
						'post_type'   => 'post',
						'author'      => $author->ID,
					);
				}
				$articles = get_posts( $args );
			}
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">

					<div class="wpcsp-speaker-grid">

						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'large-square' );
						}
						if ( $pronouns ) {
							$pronouns = ' <span class="wpcsp-speaker-pronouns">(' . esc_html( $pronouns ) . ')</span>';
						}
						?>

						<div>
							<h1 class="entry-title">
							<?php
							echo esc_html( $full_name );
							echo $pronouns;
							?>
							</h1>

							<div class="wpcsp-speaker-details">
								<?php
								if ( $title ) {
									echo '<p class="wpcsp-speaker-title">' . esc_html( $title ) . '</p>';
								}
								if ( $organization ) {
									echo '<p class="wpcsp-speaker-organization">' . esc_html( $organization ) . '</p>';
								}
								if ( $country ) {
									echo '<p class="wpcsp-speaker-country"><span class="dashicons dashicons-location"></span>' . esc_html( $country ) . '</p>';
								}
								?>
							</div>

							<?php
							$social_icons = wpcsp_get_social_links( get_the_ID() );
							if ( $social_icons ) {
								?>
								<ul class="wpcsp-speaker-social">
									<?php foreach ( $social_icons as $social_icon ) { ?>
										<li class="wpcsp-speaker-social-icon"><?php echo $social_icon; ?></li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					</div>
					<div class="wpcsp-speaker-grid">
						<div></div>
						<div>
							<h2>About <?php echo esc_html( $full_name ); ?></h2>

							<?php the_content(); ?>

							<?php if ( $articles ) { ?>
								<h2>Posts by <?php echo esc_html( $first_name ); ?></h2>
								<ul class="wp-block-latest-posts__list has-dates wp-block-latest-posts">
									<?php foreach ( $articles as $article ) { ?>
										<li>
											<a class="wp-block-latest-posts__post-title" href="<?php echo get_the_permalink( $article->ID ); ?>"><?php echo esc_html( $article->post_title ); ?></a>
											<time class="wp-block-latest-posts__post-date" datetime="<?php echo get_the_date( 'Y-m-d\TH:i:sp', $article->ID ); ?>"><?php echo get_the_date( '', $article->ID ); ?></time>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>

							<?php if ( $sessions ) { ?>
								<h2>Sessions</h2>
								<ul>
									<?php foreach ( $sessions as $session ) { ?>
										<li>
											<a href="<?php echo get_the_permalink( $session->ID ); ?>"><?php echo esc_html( $session->post_title ); ?></a>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>

							<p class="wpcsp-speaker-links">
								<?php if ( has_term( 'speakers', 'wpcsp_speaker_level' ) ) { ?>
									<a class="button wpcsp-speaker-link wpcsp-speaker-link-speakers" href="<?php echo home_url( 'wpad-people/speakers/' ); ?>">See All Speakers</a>
								<?php
								}
								if ( has_term( 'organizers', 'wpcsp_speaker_level' ) || has_term( 'lead-organizers', 'wpcsp_speaker_level' ) ) { ?>
									<a class="button wpcsp-organizer-link" href="<?php echo home_url( 'about/organizers/' ); ?>">See All Organizers</a>
								<?php
								} 
								if ( has_term( 'volunteers', 'wpcsp_speaker_level' ) ) { ?>
									<a class="button wpcsp-volunteer-link" href="<?php echo home_url( 'wpad-people/volunteers/' ); ?>">See All Volunteers</a>
								<?php } ?>
							</p>
						</div>
					</div>
				</div><!-- .entry-content -->

			</article><!-- #post-${ID} -->

			<?php

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();
