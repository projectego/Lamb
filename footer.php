<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lamb
 */

get_header();
?>

		</main>

		<footer class="brand--primary-background-color content-section has-small-font-size white-text" id="page-footer">

			<div class="page-width">

				<div class="has-text-align-center small-margin-bottom">
					<?php echo lamb_site_logo(); ?>
				</div>

				<?php if ( is_active_sidebar( 'lamb_site_footer_widgets' ) ) { ?>
					<div class="lamb-block-x2-columns lamb-block-xx-columns">
						<?php dynamic_sidebar( 'lamb_site_footer_widgets' ); ?>
					</div>
				<?php } ?>

				<hr class="is-style-wide light small-margin-bottom wp-block-separator">

				<div class="lamb-block-x2-columns responsive-reverse-order lamb-block-xx-columns">

					<div class="lamb-block-column">

						<?php if ( get_theme_mod( 'theme_mod_site_footer_content' ) ) { ?>
							<div class="small-margin-bottom" id="page-footer__copyright">
								<?php echo get_theme_mod( 'theme_mod_site_footer_content' ); ?>
							</div>
						<?php } ?>

						<?php if ( get_theme_mod( 'theme_mod_developer_credit' ) ) { ?>

							<div class="underline-links">
								<?php echo __( 'Powered by <a href="https://wordpress.org">WordPress</a> and <a href="' . LAMB_THEME_URL . '">' . LAMB_THEME_TITLE . '</a>', 'lamb' ); ?>
							</div>

						<?php } ?>

					</div>

					<div class="lamb-block-column">

						<nav class="bullet-list small-margin-bottom page-footer__menu">

							<?php wp_nav_menu( array(
								'container' => 'ul',
								'echo' => true,
								'menu_class' => 'small-margin-bottom',
								'menu_id' => 'footer-links',
								'theme_location' => 'footer-menu'
							) ); // Display the user-defined menu in Appearance > Menus ?>


							<?php echo user_menu(''); ?>

						</nav>

					</div>

				</div>

			</div>

		</footer> <!-- .page-footer -->

		<?php wp_footer();
		// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website.
		// Removing this fxn call will disable all kinds of plugins.
		// Move it if you like, but keep it around.
		?>

	</body>
</html>