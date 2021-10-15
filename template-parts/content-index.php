<?php
/**
 * Template part for displaying index sections
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lamb
 */

?>

<section class="content-section">

	<div class="page-width">

		<?php if ( have_posts() ) :
		// Do we have any posts in the databse that match our query?
		// In the case of the home page, this will call for the most recent posts

			if ( is_home() ) {

				$heading_title = "Latest Posts";
				$heading_description = "";

			} else if ( is_author() ) {

				$heading_title = "Posts by " . get_the_author();
				$heading_description = "";

			} else if ( is_category() ) {

				$heading_title = "Category: " . single_cat_title( '' , false );
				$heading_description = "You are viewing the archive for all posts filed under this category.";

			} else if ( is_search() ) {

				//$heading_title = "Search results for: " . get_search_query();
				$heading_title = "Search Results";
				$heading_description = "Here are all of the posts that met your search criteria.";

			} else if ( is_tag() ) {

				$heading_title = "Tag: " . single_tag_title( '' , false );
				$heading_description = "You are viewing the archive for all posts labelled with this tag.";

			// Works for Dates, Custom Post Types, Authors if not already using is_author() maybe others?
			} else if ( is_archive() ) {

				$heading_title = get_the_archive_title();
				$heading_description = "";

			}
			?>

			<h1 class="has-bigger-font-size normal-margin-bottom">
				<?php echo __( $heading_title, 'lamb' ); ?>
			</h1>

			<p>
				<?php echo __( $heading_description, 'lamb' ); ?>
			</p>

			<div class="posts medium-margin-bottom posts__modern-layout lamb-block-x3-columns">

				<?php while ( have_posts() ) : the_post();
				// If we have some posts to show, start a loop that will display each one the same way
				?>

					<?php echo lamb_show_post( $post_ID, "posts__modern-layout" ); ?>
				
				<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>

			</div>

			<div class="content--background-colour cool-box lamb-pagination">
				<?php if ( function_exists( 'wp_pagenavi' ) ) { ?>
					<?php wp_pagenavi(); ?>
				<?php } else { ?>
					<?php posts_nav_link( ' ', __( '&laquo; Newer Posts' ), __( 'Older Posts &raquo;' ) ); ?>
				<?php } ?>
			</div>

		<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

			<article class="post error">

				<h1 class="has-bigger-font-size small-margin-bottom">Goodness! There don't appear to be any posts to show.</h1>

				<p class="small-margin-bottom">
					Please try searching again. 
				</p>

				<p>
					And if you have a spare few minutes, please contact the site owner and let them know that you encountered an issue.
				</p>

			</article>

		<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>

	</div>

</section>

