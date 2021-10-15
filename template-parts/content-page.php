<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lamb
 */

?>

<div class="content--background-colour cooler-box">

	<header class="has-text-align-center medium-margin-bottom" id="article__header">

		<h1 class="has-bigger-font-size">
			<?php echo get_the_title(); ?>
		</h1>

	</header>

	<hr class="is-style-wide medium-margin-bottom wp-block-separator">

	<div class="the-content">
		<?php
		// This call the main content of the post, the stuff in the main text box while composing.
		// This will wrap everything in p tags
		the_content();
		?>
	</div>

	<?php
	// This will display pagination links, if applicable to the post
	wp_link_pages( array (
		'before'				=> '<div class="medium-margin-top">Pages: ',
		'after' 				=> '</div>',
		'link_before'			=> '<span>',
        'link_after'			=> '</span>',
	) );
	?>

</div>