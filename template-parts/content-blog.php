<?php 
/*
*
* The file for display blog content for beshop theme
*
*/
$beshop_plus_blog_style = get_theme_mod( 'beshop_plus_blog_style', 'style2');
$beshop_plus_blogdate = get_theme_mod( 'beshop_blogdate', 1);
$beshop_plus_blogauthor = get_theme_mod( 'beshop_blogauthor', 1);
$beshop_plus_postcat = get_theme_mod( 'beshop_postcat', 1);
$beshop_plus_posttag = get_theme_mod( 'beshop_posttag', 1);

if($beshop_plus_blog_style == 'style1'){
	$beshop_plus_stclass = 'bshop-list-flex';
}else{
	$beshop_plus_stclass = 'bshop-simple-list';
}

if($beshop_plus_blog_style != 'style3' ):
?>
<div class="bshop-blog-list">
	<?php if(has_post_thumbnail()): ?>
	<div class="<?php echo esc_attr($beshop_plus_stclass); ?> hasimg">
		<div class="beshop-blog-img">
			<?php beshop_post_thumbnail(); ?>
		</div>
	<?php else: ?>
	<div class="<?php echo esc_attr($beshop_plus_stclass); ?> no-img">
	<?php endif; ?>

		<div class="beshop-blog-text">
			<div class="beshop-btext">
				<header class="entry-header">
					<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

					if ( 'post' === get_post_type() && ( !empty($beshop_plus_blogdate) || !empty($beshop_plus_blogauthor) ) ) :
						?>
						<div class="entry-meta">
							<?php
							if($beshop_plus_blogdate){
							beshop_posted_on();
							}
							if($beshop_plus_blogauthor){
							beshop_posted_by();
							}
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
			</header><!-- .entry-header -->

				

				<div class="entry-content">
					<?php
					the_excerpt();
					?>
				</div><!-- .entry-content -->
				
			</div>

		</div>
	</div>	
</div>
<?php else: ?>
<div class="bshop-single-list">
	<header class="entry-header text-center mb-5">
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			if ( 'post' === get_post_type() && ( !empty($beshop_plus_blogdate) || !empty($beshop_plus_blogauthor) ) ) :
						?>
						<div class="entry-meta">
							<?php
							if($beshop_plus_blogdate){
							beshop_posted_on();
							}
							if($beshop_plus_blogauthor){
							beshop_posted_by();
							}
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
		</header><!-- .entry-header -->

		<?php beshop_post_thumbnail(); ?>

			<div class="entry-content">
					<?php
					the_excerpt();
					?>
			</div><!-- .entry-content -->
<?php if ( !empty($beshop_plus_postcat) || !empty($beshop_plus_posttag)  ) : ?>
		<footer class="entry-footer">
			<?php beshop_entry_footer($beshop_plus_postcat, $beshop_plus_posttag); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
		
</div>	
<?php endif; ?>