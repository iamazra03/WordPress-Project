<?php
/**
 * Color Setting
 *
 * @package Blossom_Feminine
 */

function blossom_feminine_customize_register_color( $wp_customize ) {
    
    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', array(
            'default'           => '#f3c9dd',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'blossom-feminine' ),
                'description' => __( 'Primary color of the theme.', 'blossom-feminine' ),
                'section'     => 'colors',
                'priority'    => 5,                
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_feminine_customize_register_color' );