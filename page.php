<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lamb
 */

get_header();
?>

<article>

	<?php if ( has_post_thumbnail() ) { ?>
		<?php echo lamb_show_post_image( get_the_ID(), 'full', '' ); ?>
	<?php } ?>

	<div class="content-section">

		<?php echo lamb_svg_waves( 'flip-vertical' ); ?>

		<div class="page-width">

			<?php if ( have_posts() ) :
			// Do we have any posts in the database that match our query?
			?>

				<?php while ( have_posts() ) : the_post();
				// If we have a post to show, start a loop that will display it
				?>

					<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
					<?php // get_template_part( 'template-parts/content-single' ); ?>

					<?php comments_template(); ?>

				<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

				<h2 class="404">Nothing has been posted like that yet</h2>

			<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>

		</div>

	</div>

</article>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>

