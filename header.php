<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lamb
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta content="width=device-width" name="viewport">
		<link href="http://gmpg.org/xfn/11" rel="profile">
		<link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback">

		<!-- Probably best to call the remaining head elements here -->
		<?php wp_head(); ?>

		<!-- Enqueue the JS that performs in-link comment reply fanciness in single.php pages -->
		<?php if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { ?>
			<?php echo wp_enqueue_script( 'comment-reply' ); ?>
		<?php } ?>

	</head>

	<body <?php body_class( $lamb_body_class . " hello" ); ?>>

		<header class="brand--primary-background-color has-reduced-font-size white-text" id="page-head">

			<?php echo lamb_main_menu_style(); ?>

		</header>

		<main>
