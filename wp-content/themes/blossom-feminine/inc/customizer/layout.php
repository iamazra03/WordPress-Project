<?php
/**
 * Blossom Feminine Layout Settings
 *
 * @package Blossom_Feminine
 */

function blossom_feminine_customize_register_layout( $wp_customize ) {
	
    /** Layout Settings */
    $wp_customize->add_panel(
        'layout_settings',
        array(
            'title'    => __( 'Layout Settings', 'blossom-feminine' ),
            'priority' => 55,
        )
    );

    /** Header Layout Section */
    $wp_customize->add_section(
        'header_layout',
        array(
            'title'    => __( 'Header Layout', 'blossom-feminine' ),
            'panel'    => 'layout_settings',
            'priority' => 10,
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'header_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'header_layout_text',
            array(
                'section'     => 'header_layout',
                'priority' => 30,
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );

   
    $wp_customize->add_setting( 
        'header_layout_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'header_layout_settings',
            array(
                'section'    => 'header_layout',
                'feat_class' => 'upg-to-pro',
                'priority' => 50,
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/header-layout.png',
                ),
            )
        )
    );

    /** Slider Layout */
    
    $wp_customize->add_section(
        'slider_layout_settings',
        array(
            'title'    => __( 'Slider Layout', 'blossom-feminine' ),
            'panel'    => 'layout_settings',
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'slider_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'slider_text',
            array(
                'section'     => 'slider_layout_settings',
                'priority' => 30,
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );

   
    $wp_customize->add_setting( 
        'slider_layout_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'slider_layout_settings',
            array(
                'section'    => 'slider_layout_settings',
                'feat_class' => 'upg-to-pro',
                'priority' => 50,
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/slider-layout.png',
                ),
            )
        )
    );

    /** Featured Area Layout */
    
    $wp_customize->add_section(
        'featured_area_section',
        array(
            'title'    => __( 'Featured Area Layout', 'blossom-feminine' ),
            'panel'    => 'layout_settings',
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'featured_area_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'featured_area_text',
            array(
                'section'     => 'featured_area_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );

   
    $wp_customize->add_setting( 
        'featured_area_layout_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'featured_area_layout_settings',
            array(
                'section'    => 'featured_area_section',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/featured-layout.png',
                ),
            )
        )
    );

    /** Sticky Post Layout */
    
    $wp_customize->add_section(
        'sticky_post_section',
        array(
            'title'    => __( 'Sticky Post Layout', 'blossom-feminine' ),
            'panel'    => 'layout_settings',
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'sticky_post_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'sticky_post_text',
            array(
                'section'     => 'sticky_post_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );

   
    $wp_customize->add_setting( 
        'sticky_post_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'sticky_post_settings',
            array(
                'section'    => 'sticky_post_section',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/stickypost-layout.png',
                ),
            )
        )
    );

    /** Blog Layout */
    $wp_customize->add_section(
        'blog_layout',
        array(
            'title'    => __( 'Blog Layout', 'blossom-feminine' ),
            'panel'    => 'layout_settings',
        )
    );
    
    /** Note */
    $wp_customize->add_setting(
        'blog_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'blog_layout_text',
            array(
                'section'     => 'blog_layout',
                'priority' => 30,
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );

    $wp_customize->add_setting( 
        'blog_page_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Radio_Image_Control(
			$wp_customize,
			'blog_page_layout',
			array(
				'section'    => 'blog_layout',
                'priority' => 50,
				'feat_class' => 'upg-to-pro',
				'choices'    => array(					
                    'one' => esc_url( get_template_directory_uri() . '/images/homepage.png' ),
				)
			)
		)
	);

    /** Single Post Section */
    
    $wp_customize->add_section(
        'single_post_image_section',
        array(
            'title'    => __( 'Single Post Layout', 'blossom-feminine' ),
            'panel'    => 'layout_settings',
            'priority' => 11,
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'single_post_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'single_post_text',
            array(
                'section'     => 'single_post_image_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );

   
    $wp_customize->add_setting( 
        'single_post_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'single_post_settings',
            array(
                'section'    => 'single_post_image_section',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/single-layout.png',
                ),
            )
        )
    );

    /** Pagination Settings */
    
    $wp_customize->add_section(
        'pagination_image_section',
        array(
            'title'    => __( 'Pagination Settings', 'blossom-feminine' ),
            'panel'    => 'layout_settings',
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'pagination_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'pagination_text',
            array(
                'section'     => 'pagination_image_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );

   
    $wp_customize->add_setting( 
        'pagination_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'pagination_settings',
            array(
                'section'    => 'pagination_image_section',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/pagination.png',
                ),
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_feminine_customize_register_layout' );