<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lamb
 */

get_header();
?>

<article>

	<div class="content-section">

		<?php echo lamb_svg_waves( 'flip-vertical' ); ?>

		<div class="page-width">

			<?php
				// get_post_type() returns as 'product' for WooCommerce
				get_template_part( 'template-parts/content', get_post_type() );
			?>

		</div>

	</div>

</article>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
