<?php
/**
 * BeShop plus Theme Customizer
 *
 * @package BeShop plus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function beshop_pluscustomize_register( $wp_customize ) {

    $wp_customize->remove_control('beshop_blog_style');
    $wp_customize->remove_control('beshop_blog_layout');
    
    $wp_customize->add_setting('beshop_plus_blog_style', array(
        'default'        => 'style4',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'beshop_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('beshop_plus_blog_style', array(
        'label'      => __('Select Blog Style', 'beshop-plus'),
        'section'    => 'beshop_blog',
        'settings'   => 'beshop_plus_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'style1' => __('List over Image', 'beshop-plus'),
            'style2' => __('List Style', 'beshop-plus'),
            'style3' => __('Classic Style', 'beshop-plus'),
            'style4' => __('Grid Image Style', 'beshop-plus'),
        ),
    ));
    $wp_customize->add_setting('beshop_plus_blog_layout', array(
        'default'        => 'fullwidth',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'beshop_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('beshop_plus_blog_layout', array(
        'label'      => __('Select Blog Layout', 'beshop-plus'),
        'description'=> __('Right and Left sidebar only show when sidebar widget is available. ', 'beshop-plus'),
        'section'    => 'beshop_blog',
        'settings'   => 'beshop_plus_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'beshop-plus'),
            'leftside' => __('Left Sidebar', 'beshop-plus'),
            'fullwidth' => __('Full Width', 'beshop-plus'),
        ),
    ));
    
    


}
add_action( 'customize_register', 'beshop_pluscustomize_register',99 );

