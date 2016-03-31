<?php
/**
 * Capablity Theme Customizer.
 *
 * @package Capablity
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function capability_customize_register( $wp_customize ) {
        $wp_customize->add_section( 'title-box_section' , array(
            'title'         => __( 'Logo', 'capability' ),
            'priority'      => 30,
            'description'   => 'Upload a logo to replace the default site name and description in the header.',
            
        ));
        $wp_customize->add_setting('title-box', array(
            'type'          => 'theme_mod',
            'sanitize_callback' => 'absint',
        ));
        
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'title-box', array(
            'label'         => __( 'Add Logo', 'capability' ),
            'section'       => 'title-box_section',
            'mime_type'     => 'image',
            'settings'      => 'title-box',
        )));
        
        //add section to customizer
        $wp_customize->add_section('capability-options', array(
            'title'         => __('Theme options', 'capability'),
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Change the default display options for the theme.', 'capability'),
            )
        );
        
        //Create sidebar layout setting
        $wp_customize->add_setting( 'layout_setting',
            array(
            'default'       => 'sidebar-right',
            'type'          => 'theme_mod',
            'sanitize_callback' => 'capability_sanitize_layout',
            'transport'     => 'postMessage'
            )
        );
        
        // Add sidebar layout controls
        $wp_customize->add_control( 'layout_control', array(
            'settings'      => 'layout_setting',
            'type'          => 'radio',
            'label'         => __( 'Sidebar position', 'capability' ),
            'choices'       => array(
                'no-sidebar'    => __('No sidebar', 'capability'),
                'sidebar-right' => __('Right Sidebar (Default)', 'capability'),
                'sidebar-left'  => __('Left Sidebar', 'capability')
            ),
            'section'       => 'capability-options',
        ));
        
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'capability_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function capability_customize_preview_js() {
	wp_enqueue_script( 'capability_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'capability_customize_preview_js' );

function capability_sanitize_layout( $value ) {
    if ( !in_array( $value, array( 'sidebar-left', 'sidebar-right', 'no-sidebar'))){
        $value = 'no-sidebar';
    }
    return $value;
}