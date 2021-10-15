<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lamb
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( comments_open() || have_comments() ) { ?>

	<div class="content--background-colour cooler-box medium-margin-top comments-area" id="comments">

		<?php if ( comments_open() ) : ?>

			<?php comment_form(); ?>

		<?php endif; ?>

		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) :

			$lamb_comment_count = get_comments_number();

			if ( $lamb_comment_count === 0 ) {

				$heading_text = __( 'No comments yet' );
				$paragraph_text = __( 'It\'s pretty quiet in here. Why not post the first comment?' );

			} else if ( $lamb_comment_count === 1 ) {

				$heading_text = __( $lamb_comment_count . ' comment so far' );
				$paragraph_text = __( 'Post the second comment and help start a conversation.' );

			} else if ( $lamb_comment_count >= 2 ) {

				$heading_text = __( $lamb_comment_count . ' comments so far' );
				$paragraph_text = __( 'Your opinions and feedback are valuable. Come join the conversation.' );

			}
			?>

			<h2 class="has-bigger-font-size normal-margin-bottom">
				<?php echo __( $heading_text, 'lamb' ); ?>
			</h2>

			<p>
				<?php echo __( $paragraph_text, 'lamb' ); ?>
			</p>

			<?php the_comments_navigation(); ?>

			<ol class="comment-list">
				<?php
				echo wp_list_comments(
					array(
						'avatar_size' 		=> 46,
						'echo' 				=> false,
						'format' 			=> 'html5',
						'short_ping' 		=> true,
						'style'      		=> 'ol',
						'type'      		=> 'comment',
					)
				);
				?>
			</ol><!-- .comment-list -->

			<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments"><?php __( 'Comments are closed.', lamb ); ?></p>
				<?php
			endif;
			?>

		<?php endif; // concludes if have_comments ?>

	</div><!-- #comments -->

<?php } ?>