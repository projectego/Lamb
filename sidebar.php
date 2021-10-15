<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lamb
 */
?>

<?php if ( get_theme_mod( 'theme_mod_layout' ) != 'layout-4' ) { ?>

	<aside class="content-padding" id="sidebar">

		<!-- Maybe turn this into a widget at some point?
		<form action="<?php echo home_url( '/' ); ?>" class="searchform sidebar-block" id="searchform" method="get" role="search">
			<h3 class="side-title">Site Search</h3>
			<label for="s">
				<input class="search-field" id="s" name="s" placeholder="Search through all content..." type="text" value="<?php the_search_query(); ?>">
			</label>
		</form>
		-->

		<?php if (is_home()) { // For the home page ?>

			<?php if ( ! dynamic_sidebar( 'sidebar_index' ) ) : endif; // end sidebar widget area ?>

		<?php } else if (is_singular()) { // For Posts, Pages and Custom Post Types ?>

			<?php if ( ! dynamic_sidebar( 'sidebar_posts' ) ) : endif; // end sidebar widget area ?>

		<?php } else { // For everywhere else... ?>

			<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : endif; // end sidebar widget area ?>

		<?php } ?>

	</aside>

<?php } ?>