<?php

require 'inc/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$wpad_theme_update_checker = PucFactory::buildUpdateChecker(
	'https://github.com/wpa11yday/wpaccessibilityday',
	__FILE__,
	'wp-a11y-day'
);

// Set the branch that contains the stable release.
$wpad_theme_update_checker->setBranch( 'main' );


if ( ! function_exists( 'wp_accessibility_day_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_accessibility_day_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wp-accessibility-day, use a find and replace
		 * to change 'wp-accessibility-day' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wp-accessibility-day', get_template_directory() . '/languages' );

		// Support editor styles.
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );
		add_editor_style( 'css/style-shared.css' );

		if ( ! get_user_meta( get_current_user_id(), 'disable_front_end_styles', true ) ) {
			add_editor_style( 'style.css' );
		}

		// Support responsive embedding.
		add_theme_support( 'responsive-embeds' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'archive-image', 704, 392, array( 'left', 'top' ) );
		add_image_size( 'large-square', 720, 720, true );
		add_image_size( 'small-square', 360, 360, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wp-accessibility-day' ),
			'menu-2' => esc_html__( 'Social', 'wp-accessibility-day' ),
			'menu-3' => esc_html__( 'Footer', 'wp-accessibility-day' ),
			'menu-4' => esc_html__( 'Footer Social', 'wp-accessibility-day' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Disable Custom Colors & Gradients.
		add_theme_support( 'disable-custom-colors' );
		add_theme_support( 'disable-custom-gradients' );

		/**
		 * Disable core patterns.
		 */
		remove_theme_support( 'core-block-patterns' );

		// Wide alignment.
		add_theme_support( 'align-wide' );

		// Editor Color Palette
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Black', 'wp-accessibility-day' ),
					'slug'  => 'black',
					'color' => '#000000',
				),
				array(
					'name'  => __( 'White', 'wp-accessibility-day' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
				array(
					'name'  => __( 'Blossom', 'wp-accessibility-day' ),
					'slug'  => 'blossom',
					'color' => '#DAA6BA',
				),
				array(
					'name'  => __( 'Yellow', 'wp-accessibility-day' ),
					'slug'  => 'yellow',
					'color' => '#fadd82',
				),
				array(
					'name'  => __( 'Peach', 'wp-accessibility-day' ),
					'slug'  => 'peach',
					'color' => '#f3ad90',
				),
				array(
					'name'  => __( 'Yellow Green', 'wp-accessibility-day' ),
					'slug'  => 'yellow-green',
					'color' => '#dee67b',
				),
				array(
					'name'  => __( 'Light Blue', 'wp-accessibility-day' ),
					'slug'  => 'light-blue',
					'color' => '#7dd8f1',
				),
				array(
					'name'  => __( 'Green', 'wp-accessibility-day' ),
					'slug'  => 'green',
					'color' => '#9cdd7b',
				),
				array(
					'name'  => __( 'Light Black', 'wp-accessibility-day' ),
					'slug'  => 'light-black',
					'color' => '#252525',
				),
				array(
					'name'  => __( 'Light Gray', 'wp-accessibility-day' ),
					'slug'  => 'light-gray',
					'color' => '#ced9df',
				),
				array(
					'name'  => __( 'Dark Blue', 'wp-accessibility-day' ),
					'slug'  => 'dark-blue',
					'color' => '#0076af',
				),
				array(
					'name'  => __( 'Light Pink', 'wp-accessibility-day' ),
					'slug'  => 'light-pink',
					'color' => '#fff3f8',
				),
				array(
					'name'  => __( 'Light Orange', 'wp-accessibility-day' ),
					'slug'  => 'light-orange',
					'color' => '#fff7e3',
				),
				array(
					'name'  => __( 'Light Peach', 'wp-accessibility-day' ),
					'slug'  => 'light-peach',
					'color' => '#ffeee9',
				),
				array(
					'name'  => __( 'Light Yellow', 'wp-accessibility-day' ),
					'slug'  => 'light-yellow',
					'color' => '#fffee6',
				),
				array(
					'name'  => __( 'Lightest Blue', 'wp-accessibility-day' ),
					'slug'  => 'lightest-blue',
					'color' => '#e9fbff',
				),
				array(
					'name'  => __( 'Light Green', 'wp-accessibility-day' ),
					'slug'  => 'light-green',
					'color' => '#eeffe1',
				),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'wp_accessibility_day_setup' );

add_post_type_support( 'page', 'excerpt' );

/**
 * Register Widgets.
 */
function wp_accessibility_day_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Event Date', 'wp-accessibility-day' ),
			'id'            => 'event-date-widget-area',
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => "</div>",
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Entry Header CTA', 'wp-accessibility-day' ),
			'id'            => 'entry-header-cta',
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => "</div>",
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'wp-accessibility-day' ),
			'id'            => 'sidebar-widget-area',
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => "</div>",
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Page Sidebar', 'wp-accessibility-day' ),
			'id'            => 'page-sidebar-widget-area',
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => "</div>",
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer - Full Width', 'wp-accessibility-day' ),
			'id'            => 'footer-widget-area',
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => "</div>",
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer - Column 1', 'wp-accessibility-day' ),
			'id'            => 'footer-col-one-widget-area',
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => "</div>",
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer - Column 2', 'wp-accessibility-day' ),
			'id'            => 'footer-col-two-widget-area',
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => "</div>",
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer - Column 3', 'wp-accessibility-day' ),
			'id'            => 'footer-col-three-widget-area',
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => "</div>",
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer - Column 4', 'wp-accessibility-day' ),
			'id'            => 'footer-col-four-widget-area',
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => "</div>",
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'wp_accessibility_day_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_accessibility_day_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_accessibility_day_content_width', 781 );
}
add_action( 'after_setup_theme', 'wp_accessibility_day_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function wp_accessibility_day_scripts() {
	$style_ver      = gmdate( 'ymd-Gis', filemtime( get_stylesheet_directory() . '/style.css' ) );
	$style_shared_ver      = gmdate( 'ymd-Gis', filemtime( get_stylesheet_directory() . '/css/style-shared.css' ) );
	$dark_style_ver = gmdate( 'ymd-Gis', filemtime( get_stylesheet_directory() . '/css/dark-mode.css' ) );
	$hc_ver         = gmdate( 'ymd-Gis', filemtime( get_stylesheet_directory() . '/css/high-contrast.css' ) );
	$hc_dark_ver    = gmdate( 'ymd-Gis', filemtime( get_stylesheet_directory() . '/css/high-contrast-dark.css' ) );
	$gform_ver      = gmdate( 'ymd-Gis', filemtime( get_stylesheet_directory() . '/css/gforms.css' ) );
	$event_ver      = gmdate( 'ymd-Gis', filemtime( get_stylesheet_directory() . '/css/event.css' ) );
	$js_ver         = gmdate( 'ymd-Gis', filemtime( get_stylesheet_directory() . '/js/navigation.js' ) );
	$ts_ver         = gmdate( 'ymd-Gis', filemtime( get_stylesheet_directory() . '/js/talk-time.js' ) );
	$cs_ver         = gmdate( 'ymd-Gis', filemtime( get_stylesheet_directory() . '/js/color-scheme.js' ) );

	wp_enqueue_style( 'wp-accessibility-day-style', get_stylesheet_uri(), array(), $style_ver );
	wp_enqueue_style( 'wp-accessibility-day-style-shared', get_template_directory_uri() . '/css/style-shared.css', array(), $style_shared_ver );
	wp_enqueue_style( 'wp-accessibility-day-gforms', get_template_directory_uri() . '/css/gforms.css', array(), $gform_ver );
	wp_enqueue_style( 'wp-accessibility-day-event', get_template_directory_uri() . '/css/event.css', array(), $event_ver );
	wp_enqueue_script( 'wp-accessibility-day-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $js_ver, true );
	wp_enqueue_script( 'wp-accessibility-day-time', get_template_directory_uri() . '/js/talk-time.js', array(), $ts_ver, true );
	wp_enqueue_script( 'wp-accessibility-color-scheme', get_template_directory_uri() . '/js/color-scheme.js', array(), $cs_ver, true );
	$start = strtotime( get_option( 'wpad_start_time' ) );
	$end   = strtotime( get_option( 'wpad_end_time' ) );
	$args = array(
		'pointer'      => gmdate( 'jS', $end ),
		'replaceStart' => ' UTC on ' . gmdate( 'F jS', $start ),
		'replaceEnd'   => ' UTC on ' . gmdate( 'F jS', $end ),
		'start'        => gmdate( 'Y-m-d', $start ) . 'T',
		'end'          => gmdate( 'Y-m-d', $end ) . 'T',
	);
	wp_localize_script( 'wp-accessibility-day-time', 'tz', $args );

	$year = str_replace( array( 'https://', '.wpaccessibility.day' ), '', home_url() );
	$args = array(
		'darkstylesheet'   => get_template_directory_uri() . '/css/dark-mode.css?v=' . $dark_style_ver,
		'hcstylesheet'     => get_template_directory_uri() . '/css/high-contrast.css?v=' . $hc_ver,
		'hcdarkstylesheet' => get_template_directory_uri() . '/css/high-contrast-dark.css?v=' . $hc_dark_ver,
		'lightModeLogo'    => get_template_directory_uri() . '/assets/logo-' . $year . '.png',
		'darkModeLogo'     => get_template_directory_uri() . '/assets/logo-dark-' . $year . '.png',
		'lightModeLockup'  => get_template_directory_uri() . '/assets/lockup.png',
		'darkModeLockup'   => get_template_directory_uri() . '/assets/lockup-dark.png',
	);
	if ( is_wpad_main_site() || 'template' === $year ) {
		$args['lightModeLogo'] = get_template_directory_uri() . '/assets/logo-base.png';
		$args['darkModeLogo']  = get_template_directory_uri() . '/assets/logo-base-dark.png';
	}
	wp_localize_script( 'wp-accessibility-color-scheme', 'wpA11YdayColorScheme', $args );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_accessibility_day_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * SVG loaders.
 */
require get_template_directory() . '/inc/svg.php';

use WP_Accessibility_Day\Theme;

/**
 * Autoloader.
 *
 * @param string $class The fully-qualified class name.
 *
 * @return void
 */
spl_autoload_register(
	function( $class ) {
		$prefix   = 'WP_Accessibility_Day\\';
		$len      = strlen( $prefix );
		$base_dir = __DIR__ . '/classes/';

		if ( 0 !== strncmp( $prefix, $class, $len ) ) {
			return;
		}

		$relative_class = strtolower( substr( $class, $len ) );
		$file           = wp_normalize_path( $base_dir . 'class-' . str_replace( '\\', '/', $relative_class ) . '.php' );

		if ( file_exists( $file ) ) {
			require  $file;
		}
	}
);

/**
 * Declare 'wpaccessibilityday' textdomain for this theme.
 * Translations can be added to the /languages/ directory.
 */
function wp_accessibility_day_text_domain() {
	load_child_theme_textdomain( 'wpaccessibilityday', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wp_accessibility_day_text_domain' );

// Instantiate theme.
Theme::get_instance();

/**
 * Test whether this is the main site or an event site.
 *
 * @return bool
 */
function is_wpad_main_site() {
	// Check home URL to see if this is the main site.
	return ( 'https://wpaccessibility.day' !== home_url() ) ? false : true;
}

/**
 * This was, I believe, because we made speakers a non-publishing level of user, but assigned them as authors of their own talks.
 *
 * @return array
 */
function wpad_add_subscribers_to_dropdown( $query_args, $r ) {
	$query_args['who'] = '';

	return $query_args;
}
add_filter( 'wp_dropdown_users_args', 'wpad_add_subscribers_to_dropdown', 10, 2 );

/**
 * Return WP Accessibility Day site logo.
 *
 * @param string $alt Alternative text.
 */
function wpad_site_logo( $alt = 'WordPress Accessibility Day' ) {
	$year = str_replace( array( 'https://', '.wpaccessibility.day' ), '', home_url() );
	if ( is_wpad_main_site() || 'template' === $year || 'staging' === $year ) {
		return '<img src="' . get_stylesheet_directory_uri() . '/assets/logo-base.png" alt="' . esc_attr( $alt ) . '" />';
	} else {

		return '<img src="' . get_stylesheet_directory_uri() . '/assets/logo-' . $year . '.png" alt="' . esc_attr( $alt ) . '" />';
	}
}
add_shortcode( 'logo', 'wpad_site_logo' );
add_filter( 'widget_text', 'do_shortcode');
add_filter( 'widget_text', 'shortcode_unautop');

/**
 * Replace the table of contents script with customized version.
 *
 * @param string Original src url.
 *
 * @return string
 */
function wpad_replace_optout( $src ) {
	if ( false !== strpos( $src, 'optout.js' ) ) {
		return get_stylesheet_directory_uri() . '/js/optout.js?v=' . wp_rand( 1000, 2000 );
	}

	return $src;
}
add_filter( 'script_loader_src', 'wpad_replace_optout', 10 );

/**
 * Filter 'Protected:' out of password protected post titles.
 *
 * @return string
 */
function wpad_remove_protected_text() {
	return '%s';
}
add_filter( 'protected_title_format', 'wpad_remove_protected_text' );


/**
 * Add custom paths to Yoast breadcrumbs.
 *
 * @param string $link_output Original string.
 * @param array  $link Array of link data.
 *
 * @return string
 */
function wpad_breadcrumbs( $link_output, $link ) {
	$id = isset( $link['id'] ) ? $link['id'] : get_queried_object_id();

	if ( 'wpcsp_sponsor' === get_post_type( $id ) ) {
		return '<span><a href="' . home_url( '/sponsors/' ) . '">Sponsors</a></span>' . ' / <span class="breadcrumb_last" aria-current="page">' . $link['text'] . '</span>';
	}

	if ( 'wpcs_session' === get_post_type( $id ) ) {
		return '<span><a href="' . home_url( '/schedule/' ) . '">Schedule</a></span>' . ' / <span class="breadcrumb_last" aria-current="page">' . $link['text'] . '</span>';
	}
	
	if ( 'wpcsp_media_partner' === get_post_type( $id ) ) {
		return '<span><a href="' . home_url( '/media-partners/' ) . '">Media Partners</a></span>' . ' / <span class="breadcrumb_last" aria-current="page">' . $link['text'] . '</span>';
	}


	return $link_output;
}
add_filter( 'wpseo_breadcrumb_single_link', 'wpad_breadcrumbs', 10, 2 );

/**
 * Gravity Forms Custom Activation Template
 * http://gravitywiz.com/customizing-gravity-forms-user-registration-activation-page
 */
function custom_maybe_activate_user() {
	$template_path    = STYLESHEETPATH . '/templates/gravity-forms/activate.php';
	$is_activate_page = isset( $_GET['gfur_activation'] );

	if( ! file_exists( $template_path ) || ! $is_activate_page ) {
		return;
	}

	require_once( $template_path );

	exit();
}
add_action('wp', 'custom_maybe_activate_user', 9);

/**
 * Pass custom cache rules for sponsor pages.
 *
 * @param array $headers array of header strings.
 * @param WP    $wp Current WP environment.
 *
 * @return array
 */
function wpad_headers( $headers, $wp ) {
	// Disable caching on sponsor post type single.
	//if ( isset( $wp->query_vars['post_type'] ) && 'wpcsp_sponsor' === $wp->query_vars['post_type'] ) {
		$headers['Cache-Control'] = 'no-cache, no-store, must-revalidate, max-age=0';
	//}

	return $headers;
}
add_filter( 'wp_headers', 'wpad_headers', 100, 2 );

/**
 * Hide adminbar from subscribers.
 *
 * @param bool $state True to show, false to hide.
 *
 * @return bool
 */
function wpad_hide_admin_bar( $state ) {
	if ( ! current_user_can( 'edit_posts' ) ) {
		return false;
	}

	return $state;
}
add_action( 'show_admin_bar', 'wpad_hide_admin_bar' );

/**
 * Erase submitter ID from feedback form.
 */
add_action( 'gform_after_submission_19', function( $entry ) {
	GFAPI::update_entry_property( $entry['id'], 'created_by', '' );
} );

/**
 * Erase submitter ID from code of conduct form.
 */
add_action( 'gform_after_submission_2', function( $entry ) {
	GFAPI::update_entry_property( $entry['id'], 'created_by', '' );
} );

/**
 * Map the alt attribute from form submission to the featured image on the created post.
 *
 * @param int    $post_id New post ID.
 * @param object $feed Feed object.
 * @param array  $entry Gravity Forms entry.
 * @param array  $form Gravity form schema.
 */
function wpad_map_alt_to_image( $post_id, $feed, $entry, $form ) {
	$alt_id = false;
	switch ( $entry['form_id'] ) {
		case 11: // Volunteer onboarding.
			$alt_id = 42;
			break;
		case 9: // Speaker onboarding.
			$alt_id = 42;
			break;
		case 26: // Organizer onboarding.
			$alt_id = 24;
			break;
		case 35: // Translator onboarding.
			$alt_id = 42;
			break;
	}
	if ( ! $alt_id ) {
		return;
	}
	$alt            = $entry[ $alt_id ];
	$post_thumbnail = get_post_thumbnail_id( $post_id );
	update_post_meta( $post_thumbnail, '_wp_attachment_image_alt', sanitize_text_field( $alt ) );
}
// Speaker onboarding form.
add_action( 'gform_advancedpostcreation_post_after_creation_9', 'wpad_map_alt_to_image', 10, 4 );
// Volunteer onboarding form.
add_action( 'gform_advancedpostcreation_post_after_creation_11', 'wpad_map_alt_to_image', 10, 4 );
// Organizer onboarding form.
add_action( 'gform_advancedpostcreation_post_after_creation_26', 'wpad_map_alt_to_image', 10, 4 );
// Translator onboarding form.
add_action( 'gform_advancedpostcreation_post_after_creation_35', 'wpad_map_alt_to_image', 10, 4 );


/**
 * Assign speaker to their session post after submission.
 *
 * @param int    $post_id New post ID.
 * @param object $feed Feed object.
 * @param array  $entry Gravity Forms entry.
 * @param array  $form Gravity form schema.
 */
function wpad_map_speaker_to_session( $post_id, $feed, $entry, $form ) {
	$lead_field    = 44;
	$lead_value    = $entry[ $lead_field ];
	$session_field = 43;
	$session_id    = $entry[ $session_field ];
	$speakers      = get_post_meta( $session_id, 'wpcsp_session_speakers', true );
	if ( is_array( $speakers ) ) {
		$speakers[] = $post_id;
	} else {
		$speakers = array( $post_id );
	}
	update_post_meta( $session_id, 'wpcsp_session_speakers', $speakers );
}
// Speaker onboarding form.
add_action( 'gform_advancedpostcreation_post_after_creation_9', 'wpad_map_speaker_to_session', 10, 4 );

/**
 * Display archive site headers.
 */
function wpad_archive_header() {
	$title = get_bloginfo( 'title' );
	if ( false !== stripos( $title, 'archive' ) ) {
		echo sprintf( '<aside id="wpad-archive"><p>You are viewing the <strong>%s</strong>. <a 	href="https://wpaccessibility.day/past-events/">Check out our past events</a>.</p></aside>', $title );
	} else {
		$time  = time();
		$event = strtotime( get_option( 'wpad_start_time', '' ) );
		// Show during month before event.
		if ( $event && $time > ( $event - MONTH_IN_SECONDS ) && $time < ( $event + DAY_IN_SECONDS ) ) {
			// Show banner until event is over.
			// Until 10 minutes before start.
			if ( $time < $event - 600 ) {
				echo '<aside id="wpad-archive">';
				echo wpcs_banner();
				echo '</aside>';
			} elseif ( $time < ( $event + DAY_IN_SECONDS ) ) {
				$year = date( 'Y', $event );
				echo '<aside id="wpad-archive">WP Accessibility Day is running now! <a 	href="https://' . $year . '.wpaccessibility.day">Visit the event site</a></aside>';
			}
		}
	}
}
add_action( 'wp_body_open', 'wpad_archive_header' );

/**
 * Display customizable banner in header.
 */
function wpad_webinar_info_header() {
	$statement = ( '' !== trim( get_theme_mod( 'wpad_banner_text' ) ) ) ? get_theme_mod( 'wpad_banner_text' ) : '';

	if ( $statement ) {
		echo '<aside id="wpad-notice">' . wpautop( $statement ) . '</aside>';
	}
}
add_action( 'wp_body_open', 'wpad_webinar_info_header' );

/**
 * Add email form to home page header.
 *
 */
function wpad_email_form_in_header() {
	if ( is_front_page() ) {
		ob_start();
		dynamic_sidebar( 'entry-header-cta' );
		$sidebar = ob_get_contents();
		ob_end_clean();
		echo '<div class="entry-header-cta"><div>' . wpad_figure_svg() . '</div>' . $sidebar . '</div>';
	}
}
add_action( 'wpad_entry_header', 'wpad_email_form_in_header' );

add_action( 'admin_notices', 'wpad_admin_notification' );
/**
 * Display notice if content freeze active.
 */
function wpad_admin_notification() {
	if ( ! str_contains( home_url(), 'staging' ) ) {
		$message = 'Content freeze currently active. Do not edit content in production. Estimated reopening 22:00 UTC August 3rd, 2023.';
		$message = '';
		if ( $message ) {
			echo "<div class='message updated notice'><p>$message</p></div>";
		}
	}
}

/**
 * Define classes on body to differentiate between types of people.
 *
 * @param array $classes Classes on post type.
 *
 * @return array
 */
function wpad_people_class( $classes ) {
	if ( is_singular( 'wpcsp_speaker' ) ) {
		if ( has_term( 'lead-organizers', 'wpcsp_speaker_level' ) || has_term( 'organizers', 'wpcsp_speaker_level' ) ) {
			$classes[] = 'organizer';
		}
		if ( has_term( 'speakers', 'wpcsp_speaker_level' ) ) {
			$classes[] = 'speaker';
		}
		if ( has_term( 'volunteers', 'wpcsp_speaker_level' ) ) {
			$classes[] = 'volunteer';
		}
	}
	if ( 'https://wpaccessibility.day' !== home_url() ) {
		$classes[] = 'wpad-event';
	}

	return $classes;
}
add_filter( 'body_class', 'wpad_people_class', 10, 1 );

/**
 * Enqueue block editor customizations.
 */
function wpad_enqueue_block_editor_scripts() {
	wp_enqueue_script(
		'theme-block-editor-js',
		get_stylesheet_directory_uri() . '/js/blocks.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), // specify dependencies to avoid race condition
		'1.0',
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'wpad_enqueue_block_editor_scripts' );

/**
 * Add page templates
 *
 * @param  string $single_template The template path.
 * @return string
 */
function wpad_set_schedule_template( $single_template ) {
	global $post;

	if ( 'wpcsp_sponsor' === $post->post_type ) {
		$single_template = get_stylesheet_directory() . '/templates/sponsor-template.php';
	}

	if ( 'wpcs_session' === $post->post_type ) {
		$single_template = get_stylesheet_directory() . '/templates/session-template.php';
	}

	if ( 'wpcsp_speaker' === $post->post_type ) {
		$single_template = get_stylesheet_directory() . '/templates/speaker-template.php';
	}

	return $single_template;
}
add_filter( 'single_template', 'wpad_set_schedule_template', 15 );

/**
 * Re-enable duotone filters in contexts where design requires it.
 */
function wpad_duotone_filters() {
	$array = array( 'organizers', 'speakers', 'volunteers' );
	foreach ( $array as $page ) {
		if ( is_page( $page ) ) {
			// This is deprecated, but there's no alternative provided.
			add_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
		}
	}
}
add_action( 'parse_query', 'wpad_duotone_filters' );

/**
 * Remove styling from Gravity Forms User Registration plugin.
 */
function wpad_remove_gf_action() {
	remove_action( 'wp_head', 'wpmu_activate_stylesheet' );
}
add_action( 'init', 'wpad_remove_gf_action' );

/**
 * Register new block pattern categories
 */
function wpad_register_block_patterns() {
	// Array of categories to add
	$block_pattern_categories = array(
		'a11y-day-general' => array( 'label' => __( 'WP Accessibility Day', 'wp-accessibility-day' ) ),
	);

	/**
	 * Filters the theme block pattern categories so we can register our own.
	 * 
	 * @hook wpad_block_pattern_categories
	 * 
	 * @param {object} array of categories to add
	 * 
	 * @return {object}
	 */
	$block_pattern_categories = apply_filters( 'wpad_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'wpad_register_block_patterns', 9 );

/**
 * Register new block styles
 */
function wpad_register_block_styles() {
	register_block_style(
		'core/group',
		array(
			'name'  => 'decoration-left',
			'label' => __( 'Decoration Left', 'wp-accessibility-day' ),
			'style_handle' => 'decoration-left'
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'stylized-2col',
			'label' => __( 'Stylized 2 Columns', 'wp-accessibility-day' ),
			'style_handle' => 'stylized-2col'
		)
	);
}

/**
 * Create Form Editor role.
 */
function wpad_add_form_editor() {
	$exists = get_role( 'form_editor' );
	if ( ! $exists ) {
		$editor = get_role( 'editor' );
		$caps   = $editor->capabilities;
		$caps['gravityforms_create_form']                    = 1;
		$caps['gravityforms_delete_forms']                   = 1;
		$caps['gravityforms_edit_forms']                     = 1;
		$caps['gravityforms_preview_forms']                  = 1;
		$caps['gravityforms_view_entries']                   = 1;
		$caps['gravityforms_edit_entries']                   = 1;
		$caps['gravityforms_delete_entries']                 = 1;
		$caps['gravityforms_view_entry_notes']               = 1;
		$caps['gravityforms_edit_entry_notes']               = 1;
		$caps['gravityforms_export_entries']                 = 1;
		$caps['gravityforms_view_settings']                  = 1;
		$caps['gravityforms_edit_settings']                  = 1;
		$caps['gravityforms_view_updates']                   = 1;
		$caps['gravityforms_view_addons']                    = 1;
		$caps['gravityforms_system_status']                  = 1;
		$caps['gravityforms_uninstall']                      = 1;
		$caps['gravityforms_logging']                        = 1;
		$caps['gravityforms_api_settings']                   = 1;
		$caps['gravityforms_advancedpostcreation']           = 1;
		$caps['gravityforms_advancedpostcreation_uninstall'] = 1;
		$caps['gravityforms_stripe']                         = 1;
		$caps['gravityforms_stripe_uninstall']               = 1;

		add_role( 'form_editor', 'Form Editor', $caps );
	}
}
add_action( 'admin_init', 'wpad_add_form_editor' );
