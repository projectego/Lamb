<?php
/**
 * Template part for displaying WooCommerce pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lamb
 */

?>

<div class="content--background-colour cooler-box">

	<?php
		/* Oddly, WooCommerce does not display a breadcrumb by default,
		despite natively including breadcrumb functionality
		*/
		if ( function_exists( 'woocommerce_breadcrumb' ) ) {
			woocommerce_breadcrumb();
		}
	?>

	<div class="the-content">
		<?php
		if ( class_exists( 'woocommerce' ) ) {
			woocommerce_content();
		}
		?>
	</div>

</div>