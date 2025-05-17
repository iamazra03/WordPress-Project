<?php
/**
 * Appearance Settings
 *
 * @package Blossom_Feminine
 */

function blossom_feminine_customize_register_appearance( $wp_customize ) {
    
    /** Appearance Settings */
    $wp_customize->add_panel( 
        'appearance_settings',
         array(
            'priority'    => 50,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Appearance Settings', 'blossom-feminine' ),
            'description' => __( 'Customize Typography, Header Image & Background Image', 'blossom-feminine' ),
        ) 
    );
    
    /** Typography */
    $wp_customize->add_section(
        'typography_settings',
        array(
            'title'    => __( 'Typography', 'blossom-feminine' ),
            'priority' => 10,
            'panel'    => 'appearance_settings',
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
		'primary_font',
		array(
			'default'			=> 'Poppins',
			'sanitize_callback' => 'blossom_feminine_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Select_Control(
    		$wp_customize,
    		'primary_font',
    		array(
                'label'	      => __( 'Primary Font', 'blossom-feminine' ),
                'description' => __( 'Primary font of the site.', 'blossom-feminine' ),
    			'section'     => 'typography_settings',
    			'choices'     => blossom_feminine_get_all_fonts(),	
     		)
		)
	);
    
    /** Secondary Font */
    $wp_customize->add_setting(
		'secondary_font',
		array(
			'default'			=> 'Playfair Display',
			'sanitize_callback' => 'blossom_feminine_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Select_Control(
    		$wp_customize,
    		'secondary_font',
    		array(
                'label'	      => __( 'Secondary Font', 'blossom-feminine' ),
                'description' => __( 'Secondary font of the site.', 'blossom-feminine' ),
    			'section'     => 'typography_settings',
    			'choices'     => blossom_feminine_get_all_fonts(),	
     		)
		)
	);
    
    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 16,
            'sanitize_callback' => 'blossom_feminine_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Slider_Control( 
			$wp_customize,
			'font_size',
			array(
				'section'	  => 'typography_settings',
				'label'		  => __( 'Font Size', 'blossom-feminine' ),
				'description' => __( 'Change the font size of your site.', 'blossom-feminine' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 50,
					'step'	=> 1,
				)                 
			)
		)
	);

    $wp_customize->add_setting(
        'ed_localgoogle_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Toggle_Control( 
            $wp_customize,
            'ed_localgoogle_fonts',
            array(
                'section'       => 'typography_settings',
                'label'         => __( 'Load Google Fonts Locally', 'blossom-feminine' ),
                'description'   => __( 'Enable to load google fonts from your own server instead from google\'s CDN. This solves privacy concerns with Google\'s CDN and their sometimes less-than-transparent policies.', 'blossom-feminine' )
            )
        )
    );   

    $wp_customize->add_setting(
        'ed_preload_local_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Toggle_Control( 
            $wp_customize,
            'ed_preload_local_fonts',
            array(
                'section'       => 'typography_settings',
                'label'         => __( 'Preload Local Fonts', 'blossom-feminine' ),
                'description'   => __( 'Preloading Google fonts will speed up your website speed.', 'blossom-feminine' ),
                'active_callback' => 'blossom_feminine_ed_localgoogle_fonts'
            )
        )
    );   

    ob_start(); ?>
        
        <span style="margin-bottom: 5px;display: block;"><?php esc_html_e( 'Click the button to reset the local fonts cache', 'blossom-feminine' ); ?></span>
        
        <input type="button" class="button button-primary blossom-feminine-flush-local-fonts-button" name="blossom-feminine-flush-local-fonts-button" value="<?php esc_attr_e( 'Flush Local Font Files', 'blossom-feminine' ); ?>" />
    <?php
    $blossom_feminine_flush_button = ob_get_clean();

    $wp_customize->add_setting(
        'ed_flush_local_fonts',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'ed_flush_local_fonts',
        array(
            'label'         => __( 'Flush Local Fonts Cache', 'blossom-feminine' ),
            'section'       => 'typography_settings',
            'description'   => $blossom_feminine_flush_button,
            'type'          => 'hidden',
            'active_callback' => 'blossom_feminine_ed_localgoogle_fonts'
        )
    );
    
    /** Move Header Image section to appearance panel */
    $wp_customize->get_section( 'header_image' )->panel    = 'appearance_settings';
    $wp_customize->get_section( 'header_image' )->priority = 20;
    $wp_customize->remove_control( 'header_textcolor' );
    
    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'background_image' )->panel    = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority = 30;

   /** Color */

    /** Note */
    $wp_customize->add_setting(
        'color_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'color_text',
            array(
                'section'     => 'colors',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );

   
    $wp_customize->add_setting( 
        'color_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'color_settings',
            array(
                'section'    => 'colors',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/color-settings.png',
                ),
            )
        )
    );

     /** Typography */

     /** Note */
     $wp_customize->add_setting(
        'typpography_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'typpography_text',
            array(
                'section'     => 'typography_settings',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );

   
    $wp_customize->add_setting( 
        'typpography_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'typpography_settings',
            array(
                'section'    => 'typography_settings',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/typography.png',
                ),
            )
        )
    );

}
add_action( 'customize_register', 'blossom_feminine_customize_register_appearance' );


/**
 * Active Callback for local fonts
*/
function blossom_feminine_ed_localgoogle_fonts(){
    $ed_localgoogle_fonts = get_theme_mod( 'ed_localgoogle_fonts' , false );

    if( $ed_localgoogle_fonts ) return true;
    
    return false; 
}