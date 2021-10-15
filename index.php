<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lamb
 */

get_header();
?>

<div id="page-body">

	<?php
	// Only show the widget area if on the homepage page AND not page 2 or beyond
	if ( ( is_front_page() && ( ! is_paged() ) ) ) {
		if ( is_active_sidebar( 'lamb_before_posts_list_widgets' ) ) {
			dynamic_sidebar( 'lamb_before_posts_list_widgets' );
		}
	}

	// The index template
	get_template_part( 'template-parts/content-index' );

	// Only show the widget area if on the homepage page AND not page 2 or beyond
	if ( ( is_front_page() && ( ! is_paged() ) ) ) {
		if ( is_active_sidebar( 'lamb_after_posts_list_widgets' ) ) {
			dynamic_sidebar( 'lamb_after_posts_list_widgets' );
		}
	}
	?>

</div>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
