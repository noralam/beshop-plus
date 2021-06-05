<?php
/**
 * Action for our theme
 *
 * These actions for our theme stracture
 *
 *
 * @package BeShop Plus
 */


 //the function for site main menu display 
 function beshop_plus_mainmenu_output(){
    $beshop_plus_main_menu_show = get_theme_mod( 'beshop_main_menu_show', 1 );
    if(empty($beshop_plus_main_menu_show)){
        return;
    }
    $beshop_plus_menu_logo = get_theme_mod( 'beshop_menu_logo');
    $beshop_plus_logo_position = get_theme_mod( 'beshop_logo_position','center');

?>

		<div class="beshop-main-nav bg-dark text-white menulogo-<?php echo esc_attr($beshop_plus_logo_position); ?>">
			<div class="container">
				<div class="<?php if($beshop_plus_menu_logo): ?>d-flex has-logo-menu<?php else: ?>logo-hide<?php endif; ?>">
				<?php if($beshop_plus_logo_position == 'left' && $beshop_plus_menu_logo ): ?>
					<div class="menu-logo">
						<?php beshop_header_logo(1); ?>
					</div>
				<?php endif; ?>
					<div class="beshop-main-menu flex-grow-1">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="mshow"><?php esc_html_e( 'Menu', 'beshop-plus' ); ?></span><span class="mhide"><?php esc_html_e( 'Close Menu', 'beshop-plus' ); ?></span></button>
							<?php
							if ( has_nav_menu( 'menu-1' ) ) {

								wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class'     => 'beshop-main-menu-container',
									'walker'        => new Beshop_Walker_Nav_Menu(),
								)
								);

							} elseif ( ! has_nav_menu( 'expanded' ) ) { ?>
							<ul id="primary-menu" class="menu nav-menu">
							<?php
								wp_list_pages(
									array(
										'match_menu_classes' => true,
										'show_sub_menu_icons' => true,
										'title_li' => false,
										'walker'   => new Beshop_Walker_Page(),
									)
								);
								?>
							</ul>
							<?php

							}
							
							?>
						</nav><!-- #site-navigation -->
					</div>
					<?php if($beshop_plus_logo_position == 'right' && $beshop_plus_menu_logo): ?>
					<div class="menu-logo">
						<?php beshop_header_logo(); ?>
					</div>
					<?php endif; ?>
				</div>
				<?php if($beshop_plus_logo_position == 'center' && $beshop_plus_menu_logo): ?>
					<div class="menu-logo mt-3">
						<?php beshop_header_logo(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
<?php
 }
 add_action('beshop_plus_mainmenu','beshop_plus_mainmenu_output');

//the function for site logo display 
 function beshop_plus_logo_section_output(){
    $beshop_logo_show = get_theme_mod( 'beshop_hmiddle_show', 1 );
    if( empty( $beshop_logo_show ) ){
        return;
    }
    $beshop_plus_logo_position = get_theme_mod( 'beshop_logo_position','center');
    ?>
    <div class="site-branding beshop-plus-logo text-<?php echo esc_attr($beshop_plus_logo_position); ?>">
			<?php beshop_header_logo(5); ?>
			
	</div><!-- .site-branding -->	

    <?php
 }
 add_action( 'beshop_plus_logo_section', 'beshop_plus_logo_section_output' );




 