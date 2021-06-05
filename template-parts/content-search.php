<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BeShop Plus
 */
$beshop_plus_blogdate = get_theme_mod( 'beshop_blogdate', 1);
$beshop_plus_blogauthor = get_theme_mod( 'beshop_blogauthor', 1);
$beshop_plus_blog_layout = get_theme_mod( 'beshop_plus_blog_layout', 'fullwidth');

if ( is_active_sidebar( 'sidebar-1' ) && $beshop_plus_blog_layout != 'fullwidth' ) {
	$beshop_plus_grid_column = '6';
}else{
	$beshop_plus_grid_column = '4';
}
 ?>
 <div class="col-lg-<?php echo esc_attr($beshop_plus_grid_column); ?> bsgrid-item search-item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="beshop-pimg">
		<?php
		if( has_post_thumbnail( ) ):
			beshop_post_thumbnail( );
		else:
		?>
		<div class="bplus-noimg">
			<div class="bplus-square"></div>
			<div class="bplus-circle"></div>
		</div>
		<?php endif; ?>
		<div class="beshop-post-text">
			<div class="beshop-plus-gtext">
			<?php beshop_plus_post_single_rand_category(); ?>
			<?php the_title( '<h2 class="entry-title grid-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php
				if ( 'post' === get_post_type() && ( !empty($beshop_plus_blogdate) || !empty($beshop_plus_blogauthor) ) ) :
								?>
					<div class="entry-meta-over">
					<?php
						if($beshop_plus_blogauthor){
							beshop_posted_by();
						}
						if($beshop_plus_blogdate){
							beshop_plus_posted_on();
						}
						
						?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
			</div>
		</div>
	</div>

	</article><!-- #post-<?php the_ID(); ?> -->
</div>