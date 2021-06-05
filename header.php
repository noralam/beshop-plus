<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BeShop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'beshop-plus' ); ?></a>
	
	<header id="masthead" class="beshop-header site-header">
		<?php if( has_header_image() ): ?>
		<div class="beshop-plus-headerimg">
				<?php the_header_image_tag(); ?>
		</div>
		<?php endif; ?>
	<?php 
	do_action('beshop_plus_mainmenu');
	do_action('beshop_plus_logo_section');

	 ?>
		

	</header><!-- #masthead -->
	