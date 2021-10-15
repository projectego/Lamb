<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lamb
 */

get_header();
?>

<div class="content-section">

	<?php echo lamb_svg_waves( 'flip-vertical' ); ?>

	<div class="page-width">

		<div class="content--background-colour cooler-box">

			<header class="has-text-align-center medium-margin-bottom" id="article__header">

				<h1 class="has-bigger-font-size normal-margin-bottom">
					<?php echo __( 'Page not found (404 error)', 'lamb' ); ?>
				</h1>

				<p>
					<?php echo __( 'Oh dear!', 'lamb' ); ?>
				</p>

			</header>

			<hr class="is-style-wide medium-margin-bottom wp-block-separator">

			<p class="medium-margin-bottom">
				<?php echo __( 'The page doesn\'t seem to be available right now. Perhaps it was moved or deleted.', 'lamb' ); ?>
			</p>

			<h2 class="has-bigger-font-size normal-margin-bottom">
				<?php echo __( 'Search the Database', 'lamb' ); ?>
			</h2>

			<p>
				<?php echo __( 'Attempt to track down a similiar post by entering the relevant keywords and searching.', 'lamb' ); ?>
			</p>

			<div class="medium-margin-bottom">
				<?php
				echo get_search_form( array(
					'aria_label'			=> '404-page-search',
					'echo' 					=> false
				) );
				?>
			</div>

			<h2 class="has-bigger-font-size normal-margin-bottom">
				<?php echo __( 'Post Archives by Month', 'lamb' ); ?>
			</h2>

			<p>
				<?php echo __( 'Perhaps the post you\'re looking for is buried somewhere in the Archives.', 'lamb' ); ?>
			</p>

			<?php wp_get_archives(); ?>

		</div>

	</div>

</div>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>