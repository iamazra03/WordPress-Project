<?php
/**
 * Footer Setting
 *
 * @package Blossom_Feminine
 */

function blossom_feminine_customize_register_footer( $wp_customize ) {
    
    $wp_customize->add_section(
        'footer_settings',
        array(
            'title'      => __( 'Footer Settings', 'blossom-feminine' ),
            'priority'   => 199,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Footer Copyright */
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label'   => __( 'Footer Copyright Text', 'blossom-feminine' ),
            'section' => 'footer_settings',
            'type'    => 'textarea',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
        'selector' => '.site-info .copyright',
        'render_callback' => 'blossom_feminine_get_footer_copyright',
    ) );

    /** Footer */
    if( ! function_exists( 'blossomthemes_fc_get_footer_copyright' ) ){

        /** Note */
        $wp_customize->add_setting(
            'footer_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Blossom_Feminine_Note_Control( 
                $wp_customize,
                'footer_text',
                array(
                    'section'     => 'footer_settings',
                    'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
                )
            )
        );
    
        $wp_customize->add_setting( 
            'footer_settings', 
            array(
                'default'           => 'one',
                'sanitize_callback' => 'blossom_feminine_sanitize_radio'
            ) 
        );
        
        $wp_customize->add_control(
            new Blossom_Feminine_Radio_Image_Control(
                $wp_customize,
                'footer_settings',
                array(
                    'section'    => 'footer_settings',
                    'feat_class' => 'upg-to-pro',
                    'choices'    => array(
                        'one' => get_template_directory_uri() . '/images/footer.png',
                    ),
                )
            )
        );
    }
}
add_action( 'customize_register', 'blossom_feminine_customize_register_footer' );