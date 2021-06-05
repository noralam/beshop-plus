<?php 
/*This file is part of BeShop child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

if ( ! defined( 'BESHOP_PLUS_VERSION' ) ) {
	$beshop_plus_theme = wp_get_theme();
	define( 'BESHOP_PLUS_VERSION', $beshop_plus_theme->get( 'Version' ) );
}




function beshop_plus_enqueue_child_styles() {
	wp_enqueue_style( 'beshop-plus-parent-style', get_template_directory_uri() . '/style.css',array('beshop-main', 'beshop-default'), '', 'all');
   	wp_enqueue_style( 'beshop-plus-style',get_stylesheet_directory_uri() . '/assets/css/plus-style.css',array(), BESHOP_PLUS_VERSION, 'all');

  	wp_enqueue_script( 'masonry' );
   	wp_enqueue_script( 'beshop-plus-main-js', get_stylesheet_directory_uri() . '/assets/js/main.js',array('jquery'), BESHOP_PLUS_VERSION, true );

  
}
add_action( 'wp_enqueue_scripts', 'beshop_plus_enqueue_child_styles');




/**
 * Customizer additions.
 */
 require get_stylesheet_directory() . '/inc/actions.php';
 require get_stylesheet_directory() . '/inc/customizer.php';



 function beshop_plus_post_single_rand_category(){
	$beshop_plus_categories = get_the_category();
	if($beshop_plus_categories){
		$beshop_plus_category = $beshop_plus_categories[mt_rand(0,count( $beshop_plus_categories)-1)];
	}else{
		$beshop_plus_category = '';
	}
	if ( 'post' === get_post_type() && !empty( $beshop_plus_category ) ) : 
	?>
		<span class="posts-cat">
		<a href="<?php echo esc_url(get_category_link($beshop_plus_category)); ?>"><?php echo esc_html($beshop_plus_category->name); ?></a>
		</span>
	<?php endif; 
  
 }

 if ( ! function_exists( 'beshop_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function beshop_plus_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' -- %s', 'post date', 'beshop-plus' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;
