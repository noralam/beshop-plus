<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BeShop
 */
$beshop_plus_blog_style = get_theme_mod('beshop_plus_blog_style','style4');

?>

<?php if( $beshop_plus_blog_style == 'style4' && ( !is_single() ) ): ?>
		<?php get_template_part( 'template-parts/content', 'img' ); ?>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( is_single() ): ?>
		<?php get_template_part( 'template-parts/content', 'single' ); ?>
	<?php else: ?>
		<?php get_template_part( 'template-parts/content', 'blog' ); ?>
	<?php endif; ?>
	
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>