<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lamb
 */

?>

<div class="content--background-colour cooler-box">

	<header class="has-text-align-center medium-margin-bottom" id="article__header">

		<?php echo lamb_breadcrumbs(); ?>

		<h1 class="has-bigger-font-size small-margin-bottom">
			<?php echo get_the_title(); ?>
		</h1>

		<?php echo lamb_post_details( $post->post_author ); ?>

	</header>

	<hr class="is-style-wide medium-margin-bottom wp-block-separator">

	<div class="medium-margin-bottom the-content">
		<?php
		// This call the main content of the post, the stuff in the main text box while composing.
		// This will wrap everything in p tags
		the_content();
		?>
	</div>

	<?php
	if ( get_theme_mod( 'theme_mod_review_rating_metric' ) ) {
		echo lamb_check_review_rating( $style="full" );
	}
	?>

	<?php
	// This will display pagination links, if applicable to the post
	wp_link_pages( array (
		'before'				=> '<div class="medium-margin-bottom">Pages: ',
		'after' 				=> '</div>',
		'link_before'			=> '<span>',
        'link_after'			=> '</span>',
	) );
	?>

	<p class="medium-margin-bottom">
		Categories: 
		<?php the_category(', '); ?>
	</p>

	<?php echo get_the_tag_list( '<p class="medium-margin-bottom post__tags">Tags: ',', ','</p>' ); ?>

	<div class="block-center has-text-align-center medium-margin-bottom">
		<?php echo lamb_share_buttons(); ?>
	</div>

	<?php echo lamb_post_author_info( get_the_author_ID() ); ?>

</div>