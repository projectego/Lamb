<?php
/* --------------------------------------------------------------
Define the main theme constants
Tags: 
Notes: 
-------------------------------------------------------------- */

// A modern method of grabbing information from the theme's stylesheet
// A great guide on available options: https://www.isitwp.com/display-theme-information-with-get_theme_data/
$current_theme_data = wp_get_theme();

if ( is_child_theme() ) {
	$variable_theme_data = wp_get_theme()->parent();
} else {
	$variable_theme_data = wp_get_theme();
}

define( 'LAMB_THEME_TITLE', $variable_theme_data->get( 'Name' ) );

define( 'LAMB_THEME_PREFIX', $variable_theme_data->get( 'TextDomain' ) . '_' );

// Grabs the version number from the stylesheet
define( 'LAMB_THEME_VERSION', $variable_theme_data->get( 'Version' ) );

define( 'LAMB_THEME_URL', $variable_theme_data->get( 'ThemeURI' ) );

define( 'LAMB_THEME_CUSTOMISE_URL', admin_url() . 'customize.php' );

define( 'LAMB_THEME_AUTHOR' , $current_theme_data->get( 'Author' ) );

define( 'LAMB_THEME_AUTHOR_URL', 'https://fellowshipstudios.com/' );

define( 'LAMB_THEME_AUTHOR_DONATE_URL', 'https://www.paypal.me/stevemasonpowell' );

//define( 'LAMB_THEME_DIRECTORY', get_stylesheet_directory_uri() . '/' );

define( 'LAMB_THEME_DIRECTORY', get_template_directory_uri() . '/' );

//define( 'LAMB_CSS_DIRECTORY', get_stylesheet_directory_uri() . '/assets/css/' );

//define( 'LAMB_JS_DIRECTORY', get_stylesheet_directory_uri() . '/assets/js/' );

define( 'LAMB_THEME_IMAGES_DIRECTORY', LAMB_THEME_DIRECTORY . 'images/' );

define( 'LAMB_CHILD_THEME_IMAGES_DIRECTORY', LAMB_CHILD_THEME_DIRECTORY . 'images/' );

define( 'LAMB_HOME_URL', esc_url( home_url( '/' ) ) );

if ( get_theme_mod( 'custom_logo' ) ) {
	define( 'LAMB_SITE_LOGO_IMG_SRC', wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] );
} else {
	define( 'LAMB_SITE_LOGO_IMG_SRC', LAMB_THEME_IMAGES_DIRECTORY . 'default-logo.svg' );
}

define( 'LAMB_SITE_TITLE', get_bloginfo( 'name' ) );

/* --------------------------------------------------------------
Default theme styling settings
Tags: 
Notes: 
-------------------------------------------------------------- */

// 
if ( get_theme_mod( 'theme_mod_page_background_color' ) ) {
	define( 'LAMB_PAGE_BACKGROUND_COLOR', get_theme_mod( 'theme_mod_page_background_color' ) );
} else {
	define( 'LAMB_PAGE_BACKGROUND_COLOR', '#f3f3f3' );
}

if ( get_theme_mod( 'theme_mod_content_background_color' ) ) {
	define( 'LAMB_CONTENT_BACKGROUND_COLOR', get_theme_mod( 'theme_mod_content_background_color' ) );
} else {
	define( 'LAMB_CONTENT_BACKGROUND_COLOR', '#ffffff' );
}

// 
if ( get_theme_mod( 'theme_mod_text_color_500' ) ) {
	define( 'LAMB_TEXT_COLOR_500', get_theme_mod( 'theme_mod_text_color_500' ) );
} else {
	define( 'LAMB_TEXT_COLOR_500', '#333333' ); // regular text colour
}

if ( get_theme_mod( 'theme_mod_text_color_300' ) ) {
	define( 'LAMB_TEXT_COLOR_300', get_theme_mod( 'theme_mod_text_color_300' ) );
} else {
	define( 'LAMB_TEXT_COLOR_300', '#888888' ); // regular text colour
}

// 
if ( get_theme_mod( 'theme_mod_login_page_text_link_color' ) ) {
	define( 'LAMB_PRIMARY_BRAND_TEXT_COLOR', get_theme_mod( 'theme_mod_login_page_text_link_color' ) );
} else {
	define( 'LAMB_PRIMARY_BRAND_TEXT_COLOR', '#eeeeee' ); // lighter
}

if ( get_theme_mod( 'theme_mod_text_link_color_500' ) ) {
	define( 'LAMB_TEXT_LINK_COLOR_500', get_theme_mod( 'theme_mod_text_link_color_500' ) );
} else {
	define( 'LAMB_TEXT_LINK_COLOR_500', '#3d4dcc' ); // regular text link colour
}

// 
if ( get_theme_mod( 'theme_mod_primary_brand_color_700' ) ) {
	define( 'LAMB_PRIMARY_BRAND_COLOR_700', get_theme_mod( 'theme_mod_primary_brand_color_700' ) );
} else {
	define( 'LAMB_PRIMARY_BRAND_COLOR_700', '#00259a' ); // darker
}

if ( get_theme_mod( 'theme_mod_primary_brand_color_500' ) ) {
	define( 'LAMB_PRIMARY_BRAND_COLOR_500', get_theme_mod( 'theme_mod_primary_brand_color_500' ) );
} else {
	define( 'LAMB_PRIMARY_BRAND_COLOR_500', '#3d4dcc' ); // darker
}

if ( get_theme_mod( 'theme_mod_primary_brand_color_300' ) ) {
	define( 'LAMB_PRIMARY_BRAND_COLOR_300', get_theme_mod( 'theme_mod_primary_brand_color_300' ) );
} else {
	define( 'LAMB_PRIMARY_BRAND_COLOR_300', '#7879ff' ); // darker
}

if ( get_theme_mod( 'theme_mod_login_page_text_link_color' ) ) {
	define( 'LAMB_PRIMARY_BRAND_TEXT_LINK_COLOR', get_theme_mod( 'theme_mod_login_page_text_link_color' ) );
} else {
	define( 'LAMB_PRIMARY_BRAND_TEXT_LINK_COLOR', '#ffffff' ); // lighter
}

// 
if ( get_theme_mod( 'theme_mod_secondary_brand_color_700' ) ) {
	define( 'LAMB_SECONDARY_BRAND_COLOR_700', get_theme_mod( 'theme_mod_secondary_brand_color_700' ) );
} else {
	define( 'LAMB_SECONDARY_BRAND_COLOR_700', '#008532' ); // darker
}

if ( get_theme_mod( 'theme_mod_secondary_brand_color_500' ) ) {
	define( 'LAMB_SECONDARY_BRAND_COLOR_500', get_theme_mod( 'theme_mod_secondary_brand_color_500' ) );
} else {
	define( 'LAMB_SECONDARY_BRAND_COLOR_500', '#20a948' ); // regular
}

if ( get_theme_mod( 'theme_mod_secondary_brand_color_300' ) ) {
	define( 'LAMB_SECONDARY_BRAND_COLOR_300', get_theme_mod( 'theme_mod_secondary_brand_color_300' ) );
} else {
	define( 'LAMB_SECONDARY_BRAND_COLOR_300', '#52c36d' ); // lighter
}

// The site logo height in pixels
if ( get_theme_mod( 'theme_mod_logo_height' ) ) {
	define( 'LAMB_LOGO_HEIGHT', get_theme_mod( 'theme_mod_logo_height' ) ); // in pixels
} else {
	define( 'LAMB_LOGO_HEIGHT', 32 ); // in pixels
}


/* --------------------------------------------------------------
Includes
Tags: 
Notes: 
-------------------------------------------------------------- */

// The main theme settings/theme options file
include( 'includes/theme-settings.php' );

/* If the site owner doesn't need to use the reviews system,
we don't need to include the functions file or the functions within
the theme.
*/ 
if ( get_theme_mod( 'theme_mod_review_rating_metric' ) ) {
	include( 'includes/review-rating.php' );
}

// Widgets
include( 'includes/widgets/show-posts.php' );
include( 'includes/widgets/social-media.php' );

/* --------------------------------------------------------------
Theme Support
Tags: 
Notes: 
-------------------------------------------------------------- */

// Add support for excerpts on Pages
// add_post_type_support( 'page', 'excerpt' );

// Allows for full widgth image (.alignfull) use in Gutenberg
// Would require a bit more investigation to make compatible with the theme
add_theme_support ( 'align-wide' );

add_theme_support( 'automatic-feed-links' );		// Add Rss feed support to Head section
//add_theme_support( 'custom-background');			// Add's Image Background Upload option to Customise > Background Image page
add_theme_support( 'custom-header' );				// Add custom header support
add_theme_support( 'custom-logo', array(
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
	'height'      => 1000,
	'width'       => 2000,
) );

// Enable support for HTML5 markup
add_theme_support( 'html5', array(
	'caption',
	'comment-form',
	'comment-list', 
	'gallery',
	'search-form',
) );

// Add post thumbnail/featured image support
add_theme_support( 'post-thumbnails' );

// The embed blocks automatically apply styles to embedded content to reflect the aspect ratio of content that is embedded in an iFrame.
add_theme_support( 'responsive-embeds' );

// This feature enables plugins and themes to manage the document title tag.
add_theme_support( 'title-tag' );

// Add Gutenberg styling to the front end
add_theme_support( 'wp-block-styles' );

/* --------------------------------------------------------------
Hook into WooCommerce
Tags: 
Notes: https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
-------------------------------------------------------------- */

add_theme_support( 'woocommerce' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'my_theme_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'my_theme_wrapper_end', 10 );

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

/* --------------------------------------------------------------
Register main menu for Wordpress use
Tags: 
Notes: 
-------------------------------------------------------------- */

register_nav_menus(
	array(
		// Register the Primary menu
		'header-menu'	=>	__( 'Header Menu', LAMB_THEME_TITLE ),

		// Register the Footer menu
		'footer-menu'	=>	__( 'Footer Menu', LAMB_THEME_TITLE ),
	)
);

/* --------------------------------------------------------------
Activate widgets for Wordpress use
Tags: 
Notes: 
-------------------------------------------------------------- */

function lamb_register_widgets() {

	// %1$s = ?
	// %2$s = ?

	register_sidebar(
		array(
			'id'				=> 'lamb_before_posts_list_widgets',
			'name'				=> 'Above the Latest Posts (Homepage)',
			'description'		=> 'Add widgets here to have them display above the main posts list on the index, category, tag, author and archives pages. Ideal for announcements or featured posts lists.',
			'class'				=> '',
			'before_widget'		=> '<section class="%2$s content-section the-content" id="%1$s"><div class="page-width">',
			'after_widget'		=> '</div></section>',
			'before_title'		=> '<div class="section-heading x-small-margin-bottom"><h2 class="has-big-font-size">',
			'after_title'		=> '</h2></div>',
			'empty_title'		=> '',
		)
	);

	register_sidebar(
		array(
			'id'				=> 'lamb_after_posts_list_widgets',
			'name'				=> 'Below the Latest Posts (Homepage)',
			'description'		=> 'Add widgets here to have them display under the main posts list on the index, category, tag, author and archives pages. Ideal for newsletter forms or posts lists of lesser importance.',
			'class'				=> '',
			'before_widget'		=> '<div class="%2$s content-section the-content" id="%1$s"><div class="page-width">',
			'after_widget'		=> '</div></div>',
			'before_title'		=> '<div class="section-heading x-small-margin-bottom"><h2 class="has-big-font-size">',
			'after_title'		=> '</h2></div>',
			'empty_title'		=> '',
		)
	);

	register_sidebar(
		array(
			'id'				=> 'lamb_before_post_content_widgets',
			'name'				=> 'Above the Main Content (Posts)',
			'description'		=> 'Add widgets here to have them display above the main post content found on individual posts. Ideal for displaying advertisements.',
			'class'				=> '',
			'before_widget'		=> '<div class="%2$s medium-margin-bottom page-width the-content" id="%1$s">',
			'after_widget'		=> '</div>',
			'before_title'		=> '<div class="section-heading x-small-margin-bottom"><h2 class="has-big-font-size">',
			'after_title'		=> '</h2></div>',
			'empty_title'		=> '',
		)
	);

	register_sidebar(
		array(
			'id'				=> 'lamb_site_footer_widgets',
			'name'				=> 'Footer (Global)',
			'description'		=> 'Add widgets here to have them display in the footer area of each and every page.',
			'class'				=> '',
			'before_widget'		=> '<div class="%2$s medium-margin-bottom lamb-block-column the-content" id="%1$s">',
			'after_widget'		=> '</div>',
			'before_title'		=> '<div class="section-heading small-margin-bottom"><h2 class="has-big-font-size">',
			'after_title'		=> '</h2></div>',
			'empty_title'		=> '',
		)
	);

}
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'lamb_register_widgets' );

/* --------------------------------------------------------------
Enqueue Styles and Scripts
Tags: 
Notes: 
-------------------------------------------------------------- */

function lamb_enqueue_scripts() {
	
	// Removes comments feed.
	remove_action( 'wp_head', 'feed_links_extra', 3 );

	// Removes EditURI/RSD (Really Simple Discovery) link
	remove_action( 'wp_head', 'rsd_link' );

	// Removes wlwmanifest (Windows Live Writer) link.
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Removes WordPress version from the <head> section (and the RSS Feed?) for added security
	function lamb_hide_wp_version() {
		return '';
	}
	add_filter( 'the_generator', 'lamb_hide_wp_version' );

	// Remove WP 4.9+ dns-prefetch nonsense
	remove_action( 'wp_head', 'wp_resource_hints', 2 );

	// Remove WP 4.2+ emoji nonsense
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );

	// If the user chooses to via Theme Customisation: Deregister default Jquery src, use a CDN instead
	if ( get_theme_mod( 'theme_mod_jquery_source_url' ) ) {

		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', ( get_theme_mod( 'theme_mod_jquery_source_url' ) ), array(), null, true );

	}

	// Enqueue Normalise.css via a CDN
	// Sanitize CSS might also be worth considering...
	/*
	wp_register_style( 'normalize-style', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', array(), LAMB_THEME_VERSION );
	wp_enqueue_style( 'normalize-style' );
	*/

	// Enqueue the main stylesheet
	wp_register_style( 'lamb-main', get_template_directory_uri().'/style.css', array(), LAMB_THEME_VERSION );
	wp_enqueue_style( 'lamb-main' );

	// Enqueue the main JS file to generate in the footer
	wp_enqueue_script( 'lamb-main', LAMB_THEME_DIRECTORY . 'main.js', array(), false, true );

}
add_action( 'wp_enqueue_scripts', 'lamb_enqueue_scripts', 1 ); // Register this fxn and allow Wordpress to call it automatcally in the header


/* --------------------------------------------------------------
Theme Customiser options that affect the styling of the theme
Tags: 
Notes: 
-------------------------------------------------------------- */

function lamb_theme_styling() {

	$output = ''; // Leave this here

	if ( get_theme_mod( 'theme_mod_font_awesome_integration' ) ) {

		// If the user opts to use a unique kit...
		$output .= get_theme_mod( 'theme_mod_site_head_metadata' );

	} else {

		// If no value is set by the user in Theme Customisation, resort to using the regular FA CDN
		$output .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous">';

	}

	if ( get_theme_mod( 'theme_mod_site_head_metadata' ) ) {
		$output .= get_theme_mod( 'theme_mod_site_head_metadata' );
	}

	// Main body font family and embed code
	if ( get_theme_mod( 'theme_mod_font_family_embed_code' ) ) {

		$output .= get_theme_mod( 'theme_mod_font_family_embed_code' );

		$output .= '<style>';

			// If a main font family has been specifid...
			if ( get_theme_mod( 'theme_mod_main_font_family' ) ) {

				$output .= 'body { ';
					$output .= get_theme_mod( 'theme_mod_main_font_family' );
				$output .= ' }';

			}

			// If a heading font family has been specifid...
			if ( get_theme_mod( 'theme_mod_heading_font_family' ) ) {

				$output .= 'h1, h2, h3, h4, h5, h6, .heading-text { ';
					$output .= get_theme_mod( 'theme_mod_heading_font_family' );
				$output .= ' }';

			}

		$output .= '</style>';

	}

	$output .= '<style>';

		// Main Menu positioning: fixed, absolute, etc
		if ( get_theme_mod( 'theme_mod_main_menu_position' ) ) {

			$output .= '
				#page-head {
					position: ' . get_theme_mod( 'theme_mod_main_menu_position' ) . ';
				}
			';

		}

		// Logo height
		$output .= '
			#page-head .site-logo img {
				height: ' . LAMB_LOGO_HEIGHT . 'px;
			}
		';

		// Body background colour
		$output .= '
			body,
			.page--background-colour
			{
				background-color: ' . LAMB_PAGE_BACKGROUND_COLOR . ';
			}
		';

		// The main text colour
		$output .= '
			body {
				color: ' . LAMB_TEXT_COLOR_500 . ';
			}
		';

		// The main text colour (lighter)
		$output .= '
			.lighter-text {
				color: ' . LAMB_TEXT_COLOR_300 . ';
			}
		';

		// The main text link colour
		$output .= '
			a,
			.link
			{
				color: ' . LAMB_TEXT_LINK_COLOR_500 . ';
			}
		';

		// The post/page/content background colour
		$output .= '
			.content--background-colour {
				background-color: ' . LAMB_CONTENT_BACKGROUND_COLOR . ';
			}
			.content--fill {
				fill: ' . LAMB_CONTENT_BACKGROUND_COLOR . ';
			}
		';

		// The primary accent background and text colour
		$output .= '

			.brand--primary-background-color {
				background-color: ' . LAMB_PRIMARY_BRAND_COLOR_500 . ' !important;
			}

			.brand--border-color {
				border-color: ' . LAMB_PRIMARY_BRAND_COLOR_500 . ' !important;
			}

			.brand--fill {
				fill: ' . LAMB_PRIMARY_BRAND_COLOR_500 . ' !important;
			}

			.brand--primary-background-gradient {
				background: linear-gradient(' . LAMB_PRIMARY_BRAND_COLOR_500 . ', transparent) !important;
			}

			.brand--primary-text-colour {
				color: ' . LAMB_PRIMARY_BRAND_COLOR_500 . ' !important;
			}

			.brand--underline-colour {
				border-color: ' . LAMB_PRIMARY_BRAND_COLOR_500 . ' !important;
			}

		';

		// The primary brand background colour (darker)
		$output .= '

			.brand--primary-background-color-darker,
			::selection
			{
				background: ' . LAMB_PRIMARY_BRAND_COLOR_700 . ' !important;
			}

		';

		// The primary brand background colour (lighter)
		$output .= '

			.brand--primary-background-color-lighter {
				background: ' . LAMB_PRIMARY_BRAND_COLOR_300 . ' !important;
			}

		';

		// The secondary accent background colour
		$output .= '

			/* Use !important in order to override styling from plugins, one of which being WooCommerce */
			button,
			input[type="submit"],
			.button
			{
				background-color: ' . LAMB_SECONDARY_BRAND_COLOR_500 . ';
				color: white;
				' . get_theme_mod( 'theme_mod_button_font_family' ) . '
			}

			.accent--secondary-background-colour {
				background: ' . LAMB_SECONDARY_BRAND_COLOR_500 . ';
			}

			.accent--secondary-text-colour
			{
				color: ' . LAMB_SECONDARY_BRAND_COLOR_500 . ' !important;
			}

		';

		// The secondary brand background colour (darker)
		$output .= '

			.brand--secondary-background-colour-darker {
				background: ' . LAMB_SECONDARY_BRAND_COLOR_700 . ' !important;
			}

		';

		// The secondary brand background colour (lighter)
		$output .= '

			.brand--secondary-background-colour-lighter {
				background: ' . LAMB_SECONDARY_BRAND_COLOR_300 . ' !important;
			}

		';

	$output .= '</style>';

	echo $output;

}
add_action( 'wp_head', 'lamb_theme_styling');

/* --------------------------------------------------------------
https://wordpress.stackexchange.com/questions/329587/add-a-containing-div-to-core-gutenberg-blocks
Tags: 
Notes: 
-------------------------------------------------------------- */

/*
add_filter( 'render_block', function( $block_content, $block ) {

	// Apply a CSS class to blocks in order to better target them
	$block_css = "block__misc";

    // Target core/* and core-embed/* blocks.
    if ( preg_match( '~^core/|core-embed/~', $block['blockName'] ) ) {
       $block_content = sprintf( '<div class="lamb-gutenberg-block medium-margin-bottom ' . $block_css . '" data-block="' . $block['blockName'] . '">%s</div>', $block_content);
    }

    return $block_content;

}, PHP_INT_MAX - 1, 2 );
*/

/* --------------------------------------------------------------
'Days since' calculator
Tags: date, days, time since
Notes: 
-------------------------------------------------------------- */

function lamb_time_since( $time_measured_in, $from_date ) {

	$output = '';

	date_default_timezone_set( 'Europe/Warsaw' );
//	$from = strtotime( '2019-12-31' );

	$from_date = strtotime( $from_date );
	$today = time();

	$year1 = date( 'Y', $from_date );
	$year2 = date( 'Y', $today );

	$month1 = date( 'm', $from_date );
	$month2 = date( 'm', $today );

	$day1 = date( 'd', $from_date );
	$day2 = date( 'd', $today );

	//days
	if ( $time_measured_in == 'days' ) {

		//days
		//$diff = ( ( $year2 - $year1 ) * 12 ) + ( ( $month2 - $month1 ) * 30 );
		$difference = floor( ( $today - $from_date ) / 86400 );  // (60 * 60 * 24);

	} else if ( $time_measured_in == 'months' ) {

		// months
		$difference = ( ( $year2 - $year1 ) * 12 ) + ( $month2 - $month1 );

	} else if ( $time_measured_in == 'years' ) {

		// years
		$difference = ( $year2 - $year1 );

	}

	$output .= $difference;

	return $output;

}

/* --------------------------------------------------------------
Total post count
Tags: 
Notes: 
-------------------------------------------------------------- */

function lamb_count_posts_published() { 

	$total = wp_count_posts()->publish;

	$output = $total;

	return $output;

} 

/* --------------------------------------------------------------
Login page customisation
Tags: login, login page, register, registration
Notes: 
-------------------------------------------------------------- */

function lamb_site_logo() {

	$output .= '<a class="site-logo" href="' . LAMB_HOME_URL . '" id="" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">';
		$output .= '<img alt="' . get_bloginfo( 'name' ) . '" class="" src="' . LAMB_SITE_LOGO_IMG_SRC . '">';
	$output .= '</a>';

	return $output;

}

/* --------------------------------------------------------------
If a post or page has the tag 'membership1' attached, require that the user login
Tags: membership, premium
Notes: 
-------------------------------------------------------------- */

function lamb_has_membership_tag() {

	// If the user is currently looking at a page or post
	if ( is_singular() ) {

		// If the user is not logged in AND the post or page contains the specified membership tag
		if ( !is_user_logged_in() && has_tag( get_theme_mod( 'theme_mod_members_only_content_tag' ) ) ) {

			// redirects to the login page and subsequently redirects to the same page or post that the
			// user was attempting to access
			auth_redirect();

		}

	}

}
add_action( 'template_redirect','lamb_has_membership_tag' );

/* --------------------------------------------------------------
Main menu
Tags: 
Notes: 
-------------------------------------------------------------- */

function lamb_main_menu_style() { 

	$site_logo_item .= lamb_site_logo();

	// The hamburger button that shows/hides the main menu
	$hamburger_button_item .= '<div class="menu-item" id="hamburger-button">';
		$hamburger_button_item .= '<span class="hamburger-button--activate">';
			$hamburger_button_item .= '<i class="fa fa-bars"></i>';
		$hamburger_button_item .= '</span>';
		$hamburger_button_item .= '<span class="hamburger-button--deactivate">';
			$hamburger_button_item .= '<i class="fas fa-times"></i>';
		$hamburger_button_item .= '</span>';
	$hamburger_button_item .= '</div>';

	// The main menu links
	$main_menu_item .= wp_nav_menu( array(
		'container' => 'ul',
		'echo' => false,
		'menu_class' => 'header-menu',
		'menu_id' => 'primary-menu',
		'theme_location' => 'header-menu'
	) ); // Display the user-defined menu in Appearance > Menus

	$search_menu .= get_search_form( array(
		'echo' => false
	) );

	// The social media menu
	// $social_menu_item = lamb_social_buttons($show_text=false);

	// The search button that shows/hides the search menu
	$search_button_item .= '<div class="menu-item" id="search-button">';
		$search_button_item .= '<span class="search-button--activate">';
			$search_button_item .= '<i class="fas fa-search"></i>';
		$search_button_item .= '</span>';
		$search_button_item .= '<span class="search-button--deactivate">';
			$search_button_item .= '<i class="fas fa-times"></i>';
		$search_button_item .= '</span>';
	$search_button_item .= '</div>';

	// The WooCommerce menu
	$woocommerce_menu_item .= '<div class="menu-item" id="cart-button">';
		$woocommerce_menu_item .= lamb_woocommerce_menu();
	$woocommerce_menu_item .= '</div>';

	if ( !$layout_style == 1 ) {

		$left_side_menu_items = $hamburger_button_item;

		$central_menu_items = $site_logo_item;

		$right_side_menu_items = $search_button_item . $woocommerce_menu_item;

	}

	$output .= '<div class="" id="header-bar">';

		$output .= '<div class="page-width">';

			$output .= '<div id="header-bar__items">';

				$output .= '<div class="has-medium-font-size main-menu__left-items">';

					$output .= $left_side_menu_items;

				$output .= '</div>';

				$output .= $central_menu_items;

				$output .= '<div class="has-medium-font-size main-menu__right-items">';

					$output .= $right_side_menu_items;
	
				$output .= '</div>';

			$output .= '</div>';

		$output .= '</div>';

	$output .= '</div>';

	$output .= '<nav class="" id="main-menu" role="navigation">';

		$output .= '<div class="page-width">';

			$output .= $main_menu_item;

			// $output .= user_menu( 'header-menu' );

			// $output .= $social_menu_item;

		$output .= '</div>';

	$output .= '</nav>';

	$output .= '<div class="main-menu__list-item" id="search-menu">';

		$output .= '<div class="page-width">';

			$output .= $search_menu;

		$output .= '</div>';

	$output .= '</div>';

	return $output;

}


/* --------------------------------------------------------------
Login page customisation
Tags: login, login page, register, registration
Notes: 
-------------------------------------------------------------- */

// This part kills the default WP login logo implementation, and sets up the CSS for the new image replacement

if ( get_theme_mod( 'custom_logo' ) ) {

	function lamb_custom_login_logo() {

		$output = '';

		$output .= '<style>';

			// Removes the WordPress logo from the page
			// It's necessary to remove the existing WP logo and not replace it
			// because the URL will always point to the official WP website
			$output .= '#login h1 a { display:none; }';

			// Modifies the logo IMG to scale and fit properly
			$output .= '

				#lamb-site-logo {
					display: block;
					height: auto;
					margin: 0 auto;
					max-width: 96%;
				}

				#lamb-site-logo a,
				#lamb-site-logo img
				{
					display: block;
				}

			';

			// Login page body background color
			if ( get_theme_mod( 'theme_mod_login_page_background_color' ) ) {
				$value = get_theme_mod( 'theme_mod_login_page_background_color' );
			} else {
				$value = LAMB_PRIMARY_BRAND_COLOR_500;
			}

			$output .= 'body { background-color: ' . $value . ' !important } ';

			// Login page text color
			if ( get_theme_mod( 'theme_mod_login_page_text_color' ) ) {
				$value = get_theme_mod( 'theme_mod_login_page_text_color' );
			} else {
				$value = LAMB_TEXT_COLOR_500;
			}

			$output .= 'body { color: ' . $value . ' !important } ';

			// Login page text link color
			if ( get_theme_mod( 'theme_mod_login_page_text_link_color' ) ) {
				$value = get_theme_mod( 'theme_mod_login_page_text_link_color' );
			} else {
				$value = LAMB_PRIMARY_BRAND_TEXT_LINK_COLOR;
			}

			$output .= 'body a { color: ' . $value . ' !important } ';

		$output .= '</style>';

		echo $output;

	}
	add_action( 'login_enqueue_scripts', 'lamb_custom_login_logo' );

	// This part injects the new image logo
	function lamb_custom_login_message() {

		$output .= '<div id="lamb-site-logo">';
			$output .= '<a href="'. LAMB_HOME_URL . '">';
				$output .= '<img alt="' . LAMB_SITE_TITLE . '" src="' . LAMB_SITE_LOGO_IMG_SRC . '">';
			$output .= '</a>';
		$output .= '</div>';

		return $output;

	}

	add_filter( 'login_message', 'lamb_custom_login_message' );

}

/* --------------------------------------------------------------
Something something post thumbnail - is this even being used?
Tags: post thumbnail, thumbnail
Notes: 
-------------------------------------------------------------- */

function lamb_show_post_image( $post_id, $size, $style ) {

	$show_color_overlay = true;

	if ( $show_color_overlay ) {
		$color_overlay .= '<div class="fill-area opacity__60" style="background: #000"></div>';
	}

	$output .= '<figure class="brand--primary-background-color-lighter post__thumbnail ' . $style . '">';

		if ( has_post_thumbnail() ) {

			$output .= get_the_post_thumbnail( $post_id, $thumbnail_size );

		}

		$output .= $color_overlay;

	$output .= '</figure>';

	return $output;

}

/* --------------------------------------------------------------
Consistent avatars
Tags: avatar
Notes: 
-------------------------------------------------------------- */

function lamb_show_avatar( $user_id, $image_size ) {

	if ( ! $image_size ) {
		$image_size = 64 ;
	}

	$output .= '<div class="avatar-container">';
		$output .= get_avatar( $user_id , $image_size );
	$output .= '</div>';

	return $output;

}

/* --------------------------------------------------------------
Post meta
Tags: avatar
Notes: Use $post->post_author to get the author ID
-------------------------------------------------------------- */

function lamb_post_details( $user_id ) {

	$output .= '<ul class="article__meta has-reduced-font-size">';

		$output .= '<li>';
			$output .= lamb_show_avatar( $user_id, 99 );
			$output .= '<a class="" href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author">' . get_the_author() . '</a>';
		$output .= '</li>';

		$output .= '<li>';
			$output .= '<time datetime="' . get_the_time( 'c' ) . '" pubdate>' . get_the_time( get_option( 'date_format' )) . '</time>';
		$output .= '</li>';

		// Only show the Edit button if the user can edit this post
		// Not really necessary if the admin bar is visible, as it contains an edit link
		/*
		if ( current_user_can( 'edit_post', $post->ID ) ) {
			$output .= '<li>';
				$output .= '<a href="' . get_edit_post_link() . '">';
					$output .= '[Edit]';
				$output .= '</a>';
			$output .= '</li>';
		}
		*/

	$output .= '</ul>';

	return $output;

}


/* --------------------------------------------------------------
Post categories
Tags: categories, category
Notes: 
-------------------------------------------------------------- */

function lamb_woocommerce_menu() {

	if ( class_exists( 'WooCommerce' ) ) {

		global $woocommerce;

		$contents_count = $woocommerce->cart->get_cart_contents_count(); 
		$cart_total = $woocommerce->cart->get_cart_total();
		$cart_url = $woocommerce->cart->get_cart_url();

		// More familiar with UK audiences
		$fa_shopping_basket_icon = '<i class="fas fa-shopping-basket"></i>';
		// More familiar with US audiences
		$fa_shopping_cart_icon = '<i class="fas fa-shopping-cart"></i>';

		// Specify which item to display
		$cart_icon = $fa_shopping_basket_icon;

		$cart_menu_item .= '<a href="' . $cart_url . '" title="' . __( 'Cart' ) . '">';
			$cart_menu_item .= $cart_icon;
//			$cart_menu_item .= __( 'Cart ( '. $contents_count .' ) ' );
			$cart_menu_item .= ' '. $contents_count;
		$cart_menu_item .= '</a>';

		$cart_with_cash_total_menu_item .= '<a href="' . $cart_url . '" title="' . __( 'Cart' ) . '">';
			$cart_with_cash_total_menu_item .= __( 'Cart ( '. $contents_count .' ) - '. $cart_total );
		$cart_with_cash_total_menu_item .= '</a>';

		$checkout_menu_item .= '<a href="' . $woocommerce->cart->get_checkout_url() . '" title="' . __( 'Checkout' ) . '">';
			$checkout_menu_item .= __( 'Checkout' );
		$checkout_menu_item .= '</a>';

		$output .= '<div class="cart-links">';

			// the menu items are hidden until an item is added to the basket
			if ( sizeof( $woocommerce->cart->cart_contents) > 0 ) {

				$output .= $cart_menu_item;

//				$output .= $checkout_menu_item;

			}

		$output .= '</div>';

	}

	return $output;

}

/* --------------------------------------------------------------
Post categories
Tags: categories, category
Notes: 
-------------------------------------------------------------- */

function lamb_post_categories() {

	$output = '';

	$count = 1;
	$include_category_links = true;
	$seperator = ', ';
	$style = 'brand--primary-background-color label';

//	$fa_icon = "<span class='fa-icon'><i class='fas fa-tags'></i></span> ";

	$categories = get_the_category( $id );
	$number_of_categories = count( $categories );

	$output .= '<div class="post__labels">';

		$output .=  $fa_icon;

		foreach ( $categories as $category ) {

			if ($include_category_links) {
				$output .= '<a class="" href="' . get_category_link( $category->cat_ID ) . '">';
					$output .= $category->name;
				$output .= '</a>';
				if ($count < $number_of_categories) {
					$output .= $seperator . ' ';
				}
			} else {
				$output .= '<span class="">';
					$output .= $category->name;
					if ($count < $number_of_categories) {
						$output .= $seperator . ' ';
					}
				$output .= '</span>';
			}

			$count++;

		}
			
	$output .= '</div>';

	return $output;

}

/* --------------------------------------------------------------
Estimate post read time
Tags: read time, reading, time
Notes: Supposed average reading speed is 200-250 words per minute
-------------------------------------------------------------- */

function lamb_reading_time( $prefix, $suffix ) {

	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$reading_time = ceil( $word_count / 250 );

	if ($reading_time == 1) {
		$timer = " min read";
	} else {
		$timer = " min read";
	}

//	$total_reading_time .= '<div class="medium-margin-bottom reading-time">';
	//	$total_reading_time .= '<i class="far fa-clock"></i> ';
		$total_reading_time .= $prefix;
			$total_reading_time .= $reading_time . $timer;
			$total_reading_time .= '';
		$total_reading_time .= $suffix;
//	$total_reading_time .= '</div>';

	return $total_reading_time;

}

/* --------------------------------------------------------------
Get category list
Tags: category, list
Notes: 
-------------------------------------------------------------- */

function lamb_get_the_category_list() {
	$categories = get_the_category();
	$fa_icon = "<span class='fa-icon'> <i class='far fa-folder'></i></span> ";
	$output = '';

	if ($categories) {
		$output = "<ul class='muted post-taxonomies'>";
		foreach($categories as $category) {
			$output .= '<li class="brand--primary-background-color">';
				$output .= $fa_icon;
				$output .= '<a class="category-' . $category->slug . '" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">';
					$output .= $category->cat_name;
				$output .= '</a>';
			$output .= '</li>';
		}
		$output .= "</ul>";
	}
	echo $output;
}

/* --------------------------------------------------------------
Convert string to URL friendly format and for names/ids on the same page
Tags: sanitise, 
Notes: 
-------------------------------------------------------------- */

function lamb_alphanumeric_text_only( $text ) {

	$text = strtolower( str_replace( " ", "_", $text ) );
	$text = preg_replace( "/[^a-zA-Z0-9_]/", "", $text );

	return $text;

}

/* --------------------------------------------------------------
Disable certain user input options
Tags: comments, website field
Notes: 
-------------------------------------------------------------- */

/*
if ( get_theme_mod( 'theme_mod_disable_user_url_field' ) ) {

	function lamb_disable_user_url_field_in_comments( $fields ) {

		unset($fields['url']);
		return $fields;

	}

	add_filter( 'comment_form_default_fields', 'lamb_disable_comment_user_url_field_in_comments' );

}
*/

/* --------------------------------------------------------------
Disable HTML usage in comments
Tags: comments, html
Notes: 
Credit: https://www.wpbeginner.com/beginners-guide/vital-tips-and-tools-to-combat-comment-spam-in-wordpress/
-------------------------------------------------------------- */

/*
if ( get_theme_mod( 'theme_mod_disable_html_in_comments' ) ) {

	function wpb_comment_post( $incoming_comment ) {
		$incoming_comment['comment_content'] = htmlspecialchars($incoming_comment['comment_content']);
		$incoming_comment['comment_content'] = str_replace( "'", '&apos;', $incoming_comment['comment_content'] );
		return( $incoming_comment );
	}

	function wpb_comment_display( $comment_to_display ) {
			$comment_to_display = str_replace( '&apos;', "'", $comment_to_display );
			return $comment_to_display;
	}

	add_filter( 'preprocess_comment', 'wpb_comment_post', '', 1);
	add_filter( 'comment_text', 'wpb_comment_display', '', 1);
	add_filter( 'comment_text_rss', 'wpb_comment_display', '', 1);
	add_filter( 'comment_excerpt', 'wpb_comment_display', '', 1);
	remove_filter( 'comment_text', 'make_clickable', 9 );

}
*/

/* --------------------------------------------------------------
List category posts
Tags: 
Notes: usage: [lamb_list_category_posts id="X"] to display a category's posts
-------------------------------------------------------------- */

function lamb_list_category_posts_shortcode( $atts ) { ?>

	<?php
		$atts = shortcode_atts(
			array(
				'id' => '',
			),
			$atts,
			'category_posts'
		);
	?>

	<?php $category_query = new WP_Query( "cat=$id&posts_per_page=9" ); ?>
		<h2>Latest <?php echo get_cat_name( $atts['id'] ); ?> posts</h2>
		<ul class="category-posts formatted-list">
			<?php while($category_query->have_posts()) : $category_query->the_post(); ?>
				<li>
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</li>
			<?php endwhile; ?>
			<li><a href="<?php echo esc_url( get_category_link( $id ) ); ?>">More <?php echo get_cat_name( $id ); ?> posts &raquo;</a></li>
		</ul>
	<?php wp_reset_postdata(); ?>

<?php }

add_shortcode( 'category_posts', 'lamb_list_category_posts_shortcode' );

/* --------------------------------------------------------------
List posts by...
Tags: list posts, latest posts, list posts, newest posts, posts list, recent posts, show posts
Notes: 
-------------------------------------------------------------- */

function lamb_show_posts( $post_type, $number_of_posts_to_show, $has_these_tags, $in_category, $orderby, $layout ) {

	if ( $number_of_posts_to_show_override ) {
		$number_of_posts_to_show = $number_of_posts_to_show_override;
	}

	// If viewing a post, get the post ID without being inside the loop
	global $wp_query;
    $post_ID = $wp_query->post->ID;

	// Setting up the arguments for determining which posts to show
	// For available parameters for order and orderby, visit: // https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
	$args = array(
		'ignore_sticky_posts' => 1,
		'order' => 'DESC', // available parameters: DESC (default),  
		'orderby' => $orderby, // available parameters: date, modified, rand, title , and more
		'post__not_in' => array( $post_ID ),
		'posts_per_page' => $number_of_posts_to_show,
		'post_status' => 'publish',
//		'post_type' => array( 'post', 'reviews' ),
	);

	// If no post type (post, review, etc.) specified, then default to posts
	if ( $post_type ) { 
		$args['post_type'] = $post_type;
	} else {
		$args['post_type'] = 'post';
	}

	// Are we looking for a specific Tag or Tags?
	if ( $has_these_tags ) {
		$args['tag__in'] = $has_these_tags;
	}

	// Are we looking for a specific Category ID or Category IDs?
	if ( $in_category ) {
		$args['cat'] = $in_category;
	}

	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {

		$output .= '<div class="lamb-block-xx-columns posts__' . $layout . ' posts ' . $wrapper_css . '">';

			while ( $the_query->have_posts() ) {

				$the_query->the_post();

				$output .= lamb_show_post( $post_ID, $layout );

			}

		$output .= '</div>';

	} wp_reset_postdata(); wp_reset_query();

	return $output;

}

/* --------------------------------------------------------------
Attempt to consolidate custom posts and the main post loop
Tags: 
Notes: 
-------------------------------------------------------------- */

function lamb_show_post( $post_ID, $layout ) {

	// classic style posts
	if ( $layout == "posts__classic-layout" ) {

		$output .= '<article class="animation--target lamb-block-xx-columns medium-margin-bottom post post-id__' . get_the_ID() . '">';

			$output .= lamb_show_post_image( get_the_ID(), 'large', 'lamb-block-column' );

			$output .= '<div class="lamb-block-column post__info">';

				$output .= '<div class="has-enlarged-font-size x-small-margin-bottom">';

					$output .= lamb_post_categories();

				$output .= '</div>';

				$output .= '<h3 class="has-big-font-size post__title x-small-margin-bottom">';

					$output .= '<a class="" href="' . get_the_permalink() . '">';
						$output .= get_the_title();
					$output .= '</a>';

				$output .= '</h3>';

			$output .= '<div>';

				$output .= '<time class="has-enlarged-font-size" datetime="' . get_the_time( 'c' ) . '" pubdate>';

					$output .= get_the_time( get_option( 'date_format' ) );

				$output .= '</time>';

				$output .= ' <a href="' . get_edit_post_link() . '">';

					$output .= "[Edit]";

				$output .= '</a>';

				if ( get_theme_mod( 'theme_mod_review_rating_metric' ) ) {
					$output .= lamb_check_review_rating( $style='mini' );
				}

			$output .= '</div>';

		$output .= '</article>';

	// if nothing else is selected, go with the modern style layout
	} else {

		$output .= '<article class="animation--target cool-box lamb-block-column post post-id__' . get_the_ID() . ' white-text">';

			$output .= lamb_show_post_image( get_the_ID(), 'large', '' );

			$output .= '<div class="post__info">';

				$output .= '<div class="has-reduced-font-size uppercase x-small-margin-bottom">';

					$output .= lamb_post_categories();

				$output .= '</div>';

				$output .= '<h3 class="has-big-font-size post__title x-small-margin-bottom">';

					$output .= '<a class="" href="' . get_the_permalink() . '">';
						$output .= get_the_title();
					$output .= '</a>';

				$output .= '</h3>';

			$output .= '<div>';

				$output .= '<time class="has-enlarged-font-size" datetime="' . get_the_time( 'c' ) . '" pubdate>';

					$output .= get_the_time( get_option( 'date_format' ) );

				$output .= '</time>';

				$output .= ' <a href="' . get_edit_post_link() . '">';

					$output .= "[Edit]";

				$output .= '</a>';

				if ( get_theme_mod( 'theme_mod_review_rating_metric' ) ) {
					$output .= lamb_check_review_rating( $style='mini' );
				}

			$output .= '</div>';

		$output .= '</article>';

	}

	return $output;

}

/* --------------------------------------------------------------
SVG waves
Tags: 
Notes: 
-------------------------------------------------------------- */

function lamb_svg_waves( $styling ) {

	$output = '';

	$get_waves = get_theme_mod( 'theme_mod_svg_waves' );

	$output .= '<div class="brand--fill svg-waves ' . $styling . '">';
		$output .= $get_waves;
	$output .= '</div>';

	return $output;

}

function lamb_svg_waves_shortcode( $styling ) { 

	$output = lamb_svg_waves( $styling );

	return $output;
 
}
// Register shortcode, yon can use [svg_waves] to show
add_shortcode( 'lamb_svg_waves', 'lamb_svg_waves_shortcode' ); 

/* --------------------------------------------------------------
Social buttons
Tags: bookmarking, facebook, instagram, social media, twitter
Notes: 
-------------------------------------------------------------- */

function lamb_social_buttons( $page_urls, $show_text ) {

	// old method via Theme Customisation
	//$social_media_pages = get_theme_mod( 'theme_mod_social_media_pages' );

	//new method using widgets
	$social_media_pages = $page_urls;

	if ( $social_media_pages ) {

		$social_media_pages_array = explode( "\n", $social_media_pages );

		$general_styling = " social-link ";

		$show_icons = true;

		if ( $show_text == false ) {
			$style = 'circles';
		}

	}

	$output = '';

	$output .= '<ul class="has-medium-font-size social-buttons ' . $style . ' xx-small-margin-top">';

		foreach ( $social_media_pages_array as $social_media_page ) {

			$icon = '';
			$specific_styling = '';
			$text = '';
			
			if ( strpos( $social_media_page, 'discord' ) ) {
				$icon = '<i class="fab fa-discord"></i>';
				$specific_styling = 'discord-background';
				$text = 'Discord';
			} else if ( strpos( $social_media_page, 'facebook' ) ) {
				$icon = '<i class="fab fa-facebook-f"></i>';
				$specific_styling = 'facebook-background';
				$text = 'Facebook';
			} else if ( strpos( $social_media_page, 'instagram' ) ) {
				$icon = '<i class="fab fa-instagram"></i>';
				$specific_styling = 'instagram-background';
				$text = 'Instagram';
			} else if ( strpos( $social_media_page, 'patreon' ) ) {
				$icon = '<i class="fab fa-patreon"></i>';
				$specific_styling = 'patreon-background';
				$text = 'Patreon';
			} else if ( strpos( $social_media_page, 'reddit' ) ) {
				$icon = '<i class="fab fa-reddit"></i>';
				$specific_styling = 'reddit-background';
				$text = 'Reddit';
			} else if ( strpos( $social_media_page, 'twitch' ) ) {
				$icon = '<i class="fab fa-twitch"></i>';
				$specific_styling = 'twitch-background';
				$text = 'Twitch';
			} else if ( strpos( $social_media_page, 'twitter' ) ) {
				$icon = '<i class="fab fa-twitter"></i>';
				$specific_styling = 'twitter-background';
				$text = 'Twitter';
			}

			$output .= '<li>';
				$output .= '<a class="' . $general_styling . $specific_styling . '" href="' . $social_media_page . '">';
					if ($show_icons) {
						if ($icon) {
							$output .= $icon . ' ';
						}
					}
	//				$output .= $text;
				$output .= '</a>';
			$output .= '</li>';

		}

	$output .= '</ul>';

	return $output;

}

/* --------------------------------------------------------------
Homemade Share Buttons because most others contain trackers and unpleasantries
Tags: facebook, instagram, share, social media, twitter
Notes: 
-------------------------------------------------------------- */

function lamb_share_buttons() {

	// Sanitize the title just in case it includes HTML of any kind
	$page_title = sanitize_title( get_the_title() );

	$page_url = esc_url( get_permalink() );

	$list_item_styling .= " social-link";

	$show_text = false;

	$output .= '<aside class="rounded-edges share-buttons social-buttons">';

//		$output .= '<p class="medium-margin-bottom">If you have found this article helpful, please consider sharing with others.</p>';

		$output .= '<b class="title">Share:</b> ';

		$output .= '<ul>';

			// Twitter
			$output .= '<li>';
				$output .= '<a class="cool-box twitter-background ' . $list_item_styling . '" href="https://twitter.com/intent/tweet?text=' . $page_title . '&url=' . $page_url . '" rel="external nofollow" target="_blank" title="Share on Twitter">';
					$output .= '<i class="fab fa-twitter"></i>';
					if ( $show_text ) {
						$output .= '<span>Tweet</span>';
					}
				$output .= '</a>';
			$output .= '</li>';

			// Facebook
			$output .= '<li>';
				$output .= '<a class="cool-box facebook-background ' . $list_item_styling . '" href="https://www.facebook.com/sharer/sharer.php?u=' . $page_url . '" rel="external nofollow" target="_blank" title="Share on Facebook">';
					$output .= '<i class="fab fa-facebook-f"></i>';
					if ( $show_text ) {
						$output .= '<span>Share</span>';
					}
				$output .= '</a>';
			$output .= '</li>';

			// LinkedIn
			$output .= '<li>';
				$output .= '<a class="cool-box linkedin-background ' . $list_item_styling . '" href="https://www.linkedin.com/sharing/share-offsite/?url=' . $page_url . '" rel="external nofollow" target="_blank" title="Share on LinkedIn">';
					$output .= '<i class="fab fa-linkedin"></i>';
					if ( $show_text ) {
						$output .= '<span>Share</span>';
					}
				$output .= '</a>';
			$output .= '</li>';

			// Reddit
			$output .= '<li>';
				$output .= '<a class="cool-box reddit-background ' . $list_item_styling . '" href="https://www.reddit.com/submit?url=' . $page_url . '&title=' . $page_title . '" rel="external nofollow" target="_blank" title="Share on Reddit">';
					$output .= '<i class="fab fa-reddit-alien"></i>';
					if ( $show_text ) {
						$output .= '<span>Reddit</span>';
					}
				$output .= '</a>';
			$output .= '</li>';

			// Email
			$output .= '<li>';
				$output .= '<a class="cool-box gmail-background ' . $list_item_styling . '" href="mailto:?subject=' . $page_title . '&body=' . $page_url . '" rel="external nofollow" target="_blank" title="Share via email">';
					$output .= '<i class="fas fa-envelope"></i>';
					if ( $show_text ) {
						$output .= '<span>Email</span>';
					}
				$output .= '</a>';
			$output .= '</li>';

		$output .= '</ul>';

	$output .= '</aside>';

	return $output;

}

/* --------------------------------------------------------------
Admin Bar Cleanup
Tags: adminbar
Notes: 
-------------------------------------------------------------- */

function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

/* --------------------------------------------------------------
Guest/Member User menu
Tags: guest, login, member, menu, registration, user
Notes: 
-------------------------------------------------------------- */

function user_menu( $user_ID ) {

	global $current_user;

	$output = '';

	$output .= '<ul class="account-menu">';

		if ( is_user_logged_in() ) { // if user IS logged in

			// $output .= '<li><a href="' . get_edit_profile_url() . '">Hi, ' . $current_user->display_name . '</a></li> ';

			/*
			if ( current_user_can( 'manage_options' ) ) {

				$output .= '<li><a href="' . get_dashboard_url() . '">Dashboard</a></li> ';

				$output .= '<li><a href="' . theme_mod_URL . '">Theme Options</a></li> ';

			}
			*/

			/*
			if ((is_singular()) && ( current_user_can( 'edit_post', $post->ID ))) {

				$output .= '<li><a href="' . get_edit_post_link() . '">Edit this Page</a></li> ';;

			}
			*/

			// Links to current logged in user's Posts archive
			//$output .= '<li><a href="' . get_author_posts_url(get_current_user_id()) . '">My Posts</a></li> ';

			//$output .= '<li><a href="' . get_edit_profile_url() . '">Edit my Profile</a></li> ';

			$output .= '<li><a href="' . wp_logout_url() . '">Sign out</a></li> ';

		} else { // if user is NOT logged in

			$output .= '<li><a href="' . esc_url( wp_login_url() ) . '" rel="nofollow">Log in</a></li> ';

			if ( get_option( 'users_can_register' ) ) { // if registration is available
				$output .= '<li><a href="' . esc_url( wp_registration_url() ) . '" rel="nofollow">Register</a></li> ';
			}

		}

	$output .= '</ul>';

	return $output;

}

/* --------------------------------------------------------------
Inject additional items into the_content
Tags: the_content
Notes: Can cause issues with plugins like bbPress and is best avoided using this method
-------------------------------------------------------------- */

/*
function lamb_the_content( $content ) {
	
	$after = '';
	$before = '';

	// If viewing a post, get the post ID without being inside the loop
	global $wp_query;
    $post_ID = $wp_query->post->ID;

	// Grab the post author's user ID number
	$current_user_id = get_current_user_id();

	$after .= lamb_check_review_rating($style="full");

	$after .= lamb_post_tags( $post_ID );

	$after .= lamb_author_box($current_user_id);

	$after .= lamb_share_buttons();

	$output .= '<div class="page-width">';
		$output .= $before;
			$output .= '<div class="the-content">';
				$output .= $content;
			$output .= '</div>';
		$output .= $after;
	$output .= '</div>';
 
	return $output;

}
add_filter ( 'the_content', 'lamb_the_content', 6 );
*/

/* --------------------------------------------------------------
Author info/credit box
Tags: author, post author
Notes: 
-------------------------------------------------------------- */

function lamb_post_author_info( $author_id ) {

	$lamb_author_bio = true;

	// Only display the 'about author area' if the author has added a bio
	if ( get_the_author_meta( 'description' ) ) {

		$output .= '<hr class="is-style-wide medium-margin-bottom wp-block-separator">';

		$output .= '<div class="post__author-info">';

			$output .= '<div class="flex-nowrap lamb-block-xx-columns">';

				$output .= '<div class="flex-basis__auto flex-grow__0 no-left-margin lamb-block-column">';
					$output .= lamb_show_avatar( $author_id , '64' );
				$output .= '</div>';
		
				$output .= '<div class="flex-basis__auto no-left-margin lamb-block-column">';

					$output .= '<div>';
						$output .= '<a class="page-author-username" href="' . get_author_posts_url( $author_id ) . '" rel="author">' . get_the_author() . '</a>';
					$output .= '</div>';

					if ( get_the_author_meta( 'twitter' ) ) {
						$output .= '<div>';
							$output .= '<a class="has-reduced-font-size" href="https://twitter.com/' . get_the_author_meta( 'twitter' ) . '">@' . get_the_author_meta( 'twitter' ) . '</a>';
						$output .= '</div>';
					}

				$output .= '</div>';

			$output .= '</div>';

			if ($lamb_author_bio) {
				$output .= '<p class="has-reduced-font-size small-margin-bottom">';
					$output .= get_the_author_meta( 'description' );
				$output .= '</p>';
			}

		$output .= '</div>';

	}

	return $output;

}

/* --------------------------------------------------------------
Breadcrumb handling
Tags: breadcrumbs
Notes: 
-------------------------------------------------------------- */

function lamb_breadcrumbs() {

	// Show breadcrumbs if Rank Math is installed
	if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {

		$output .= '<div class="has-reduced-font-size small-margin-bottom" id="breadcrumbs">';
			$output .= rank_math_get_breadcrumbs();
		$output .= '</div>';

	}

	// Otherwise show Yoast breadcrumnbs
	else if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<p class="has-reduced-font-size small-margin-bottom" id="breadcrumbs">','</p>' );
	}

	return $output;

}