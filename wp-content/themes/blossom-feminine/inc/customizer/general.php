<?php
/**
 * General Settings
 *
 * @package Blossom_Feminine
 */

function blossom_feminine_customize_register_general( $wp_customize ) {
    
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'blossom-feminine' ),
            'description' => __( 'Customize Slider, Featured, Social, SEO, Post/Page, Newsletter & Instagram settings.', 'blossom-feminine' ),
        ) 
    );
    
    /** Container Settings */
    $wp_customize->add_section(
        'container_image_section',
        array(
            'title'    => __( 'Container', 'blossom-feminine' ),
            'panel'    => 'general_settings',
            'priority' => 5,
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'container_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'container_text',
            array(
                'section'     => 'container_image_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );
   
    $wp_customize->add_setting( 
        'container_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'container_settings',
            array(
                'section'    => 'container_image_section',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/container.png',
                ),
            )
        )
    );
    /** Container Settings Ends */

    /** Top Bar Settings */
    $wp_customize->add_section(
        'top_bar_img_section',
        array(
            'title'    => __( 'Top Bar Settings', 'blossom-feminine' ),
            'panel'    => 'general_settings',
            'priority' => 5,
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'top_bar_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'top_bar_text',
            array(
                'section'     => 'top_bar_img_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );
   
    $wp_customize->add_setting( 
        'top_bar_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'top_bar_settings',
            array(
                'section'    => 'top_bar_img_section',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/topbar.png',
                ),
            )
        )
    );
    /** Top Bar Settings Ends */

    /** Slider Settings */
    $wp_customize->add_section(
        'slider_settings',
        array(
            'title'    => __( 'Slider Settings', 'blossom-feminine' ),
            'priority' => 10,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Slider */
    $wp_customize->add_setting( 
        'ed_slider', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_slider',
			array(
				'section' => 'slider_settings',
				'label'	  => __( 'Enable Slider', 'blossom-feminine' ),
			)
		)
	);
    
    /** Slider Content Style */
    $wp_customize->add_setting(
		'slider_type',
		array(
			'default'			=> 'latest_posts',
			'sanitize_callback' => 'blossom_feminine_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Select_Control(
    		$wp_customize,
    		'slider_type',
    		array(
                'label'	  => __( 'Slider Content Style', 'blossom-feminine' ),
    			'section' => 'slider_settings',
    			'choices' => array(
                    'latest_posts' => __( 'Latest Posts', 'blossom-feminine' ),
                    'cat'          => __( 'Category', 'blossom-feminine' )
                ),	
     		)
		)
	);
    
    /** Slider Category */
    $wp_customize->add_setting(
		'slider_cat',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_feminine_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Select_Control(
    		$wp_customize,
    		'slider_cat',
    		array(
                'label'	          => __( 'Slider Category', 'blossom-feminine' ),
    			'section'         => 'slider_settings',
    			'choices'         => blossom_feminine_get_categories(),
                'active_callback' => 'blossom_feminine_banner_ac'	
     		)
		)
	);
    
    /** No. of slides */
    $wp_customize->add_setting(
        'no_of_slides',
        array(
            'default'           => 3,
            'sanitize_callback' => 'blossom_feminine_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
        'no_of_slides',
        array(
            'type'        => 'number',
            'section'     => 'slider_settings',
            'label'       => __( 'Number of Slides', 'blossom-feminine' ),
            'description' => __( 'Choose the number of slides you want to display', 'blossom-feminine' ),
            'input_attrs' => array(
                'min' => 1,
                'max' => 20,
            ),
            'active_callback' => 'blossom_feminine_banner_ac'
        )
    );

    /** Slider Auto */
    $wp_customize->add_setting(
        'slider_auto',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Toggle_Control( 
            $wp_customize,
            'slider_auto',
            array(
                'section'     => 'slider_settings',
                'label'       => __( 'Slider Auto', 'blossom-feminine' ),
                'description' => __( 'Enable slider auto transition.', 'blossom-feminine' ),
            )
        )
    );
    
    /** Select Category */
    $wp_customize->add_setting(
		'slider_animation',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_feminine_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Select_Control(
    		$wp_customize,
    		'slider_animation',
    		array(
                'label'	      => __( 'Slider Animation', 'blossom-feminine' ),
                'section'     => 'slider_settings',
    			'choices'     => array(
                    'fadeOut'        => __( 'Fade Out', 'blossom-feminine' ),
                    'fadeOutLeft'    => __( 'Fade Out Left', 'blossom-feminine' ),
                    'fadeOutRight'   => __( 'Fade Out Right', 'blossom-feminine' ),
                    'fadeOutUp'      => __( 'Fade Out Up', 'blossom-feminine' ),
                    'fadeOutDown'    => __( 'Fade Out Down', 'blossom-feminine' ),
                    ''               => __( 'Slide', 'blossom-feminine' ),
                    'slideOutLeft'   => __( 'Slide Out Left', 'blossom-feminine' ),
                    'slideOutRight'  => __( 'Slide Out Right', 'blossom-feminine' ),
                    'slideOutUp'     => __( 'Slide Out Up', 'blossom-feminine' ),
                    'slideOutDown'   => __( 'Slide Out Down', 'blossom-feminine' ),                    
                )                                	
     		)
		)
	);
    /** Slider Settings Ends */
    
    /** Featured Area Settings */
    $wp_customize->add_section(
        'featured_area_settings',
        array(
            'title'    => __( 'Featured Area Settings', 'blossom-feminine' ),
            'priority' => 20,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Featured Area */
    $wp_customize->add_setting( 
        'ed_featured_area', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_featured_area',
			array(
				'section'     => 'featured_area_settings',
				'label'	      => __( 'Enable Featured Area', 'blossom-feminine' ),
                'description' => __( 'Enable to show Featured Area in home page.', 'blossom-feminine' ),
			)
		)
	);
    
    /** Featured Content One */
    $wp_customize->add_setting(
		'featured_content_one',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_feminine_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Select_Control(
    		$wp_customize,
    		'featured_content_one',
    		array(
                'label'	  => __( 'Featured Content One', 'blossom-feminine' ),
    			'section' => 'featured_area_settings',
    			'choices' => blossom_feminine_get_posts( 'page' ),	
     		)
		)
	);
    
    /** Featured Content Two */
    $wp_customize->add_setting(
		'featured_content_two',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_feminine_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Select_Control(
    		$wp_customize,
    		'featured_content_two',
    		array(
                'label'	  => __( 'Featured Content Two', 'blossom-feminine' ),
    			'section' => 'featured_area_settings',
    			'choices' => blossom_feminine_get_posts( 'page' ),	
     		)
		)
	);
    
    /** Featured Content Three */
    $wp_customize->add_setting(
		'featured_content_three',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_feminine_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Select_Control(
    		$wp_customize,
    		'featured_content_three',
    		array(
                'label'	  => __( 'Featured Content Three', 'blossom-feminine' ),
    			'section' => 'featured_area_settings',
    			'choices' => blossom_feminine_get_posts( 'page' ),	
     		)
		)
	);
    /** Featured Area Settings Ends */
    
    /** Social Media Settings */
    $wp_customize->add_section(
        'social_media_settings',
        array(
            'title'    => __( 'Social Media Settings', 'blossom-feminine' ),
            'priority' => 30,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_social_links', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_social_links',
			array(
				'section'     => 'social_media_settings',
				'label'	      => __( 'Enable Social Links', 'blossom-feminine' ),
                'description' => __( 'Enable to show social links at header.', 'blossom-feminine' ),
			)
		)
	);
    
    $wp_customize->add_setting( 
        new Blossom_Feminine_Repeater_Setting( 
            $wp_customize, 
            'social_links', 
            array(
                'default' => '',
                'sanitize_callback' => array( 'Blossom_Feminine_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Control_Repeater(
			$wp_customize,
			'social_links',
			array(
				'section' => 'social_media_settings',				
				'label'	  => __( 'Social Links', 'blossom-feminine' ),
				'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'blossom-feminine' ),
                        'description' => __( 'Example: fa-bell', 'blossom-feminine' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'blossom-feminine' ),
                        'description' => __( 'Example: http://facebook.com', 'blossom-feminine' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'links', 'blossom-feminine' ),
                    'field' => 'link'
                )                        
			)
		)
	);
    /** Social Media Settings Ends */
    
    /** Social Sharing */
    $wp_customize->add_section(
        'social_share_img_section',
        array(
            'title'    => __( 'Social Sharing', 'blossom-feminine' ),
            'panel'    => 'general_settings',
            'priority' => 30,
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'social_share_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'social_share_text',
            array(
                'section'     => 'social_share_img_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );
   
    $wp_customize->add_setting( 
        'social_share_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'social_share_settings',
            array(
                'section'    => 'social_share_img_section',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/social-share.png',
                ),
            )
        )
    );
    /** Social Sharing Ends */

    /** SEO Settings */
    $wp_customize->add_section(
        'seo_settings',
        array(
            'title'    => __( 'SEO Settings', 'blossom-feminine' ),
            'priority' => 40,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_post_update_date', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_post_update_date',
			array(
				'section'     => 'seo_settings',
				'label'	      => __( 'Enable Last Update Post Date', 'blossom-feminine' ),
                'description' => __( 'Enable to show last updated post date on listing as well as in single post.', 'blossom-feminine' ),
			)
		)
	);
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_breadcrumb', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_breadcrumb',
			array(
				'section'     => 'seo_settings',
				'label'	      => __( 'Enable Breadcrumb', 'blossom-feminine' ),
                'description' => __( 'Enable to show breadcrumb in inner pages.', 'blossom-feminine' ),
			)
		)
	);
    
    /** Breadcrumb Home Text */
    $wp_customize->add_setting(
        'home_text',
        array(
            'default'           => __( 'Home', 'blossom-feminine' ),
            'sanitize_callback' => 'sanitize_text_field' 
        )
    );
    
    $wp_customize->add_control(
        'home_text',
        array(
            'type'    => 'text',
            'section' => 'seo_settings',
            'label'   => __( 'Breadcrumb Home Text', 'blossom-feminine' ),
        )
    );
    
    /** Breadcrumb Separator */
    $wp_customize->add_setting(
        'separator',
        array(
            'default'           => __( '/', 'blossom-feminine' ),
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        'separator',
        array(
            'type'    => 'text',
            'section' => 'seo_settings',
            'label'   => __( 'Breadcrumb Separator', 'blossom-feminine' ),
        )
    );    
    /** SEO Settings Ends */
    
    /** Posts(Blog) & Pages Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Posts(Blog) & Pages Settings', 'blossom-feminine' ),
            'priority' => 50,
            'panel'    => 'general_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'page_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Radio_Image_Control(
			$wp_customize,
			'page_sidebar_layout',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Page Sidebar Layout', 'blossom-feminine' ),
				'description' => __( 'This is the general sidebar layout for pages. You can override the sidebar layout for individual page in respective page.', 'blossom-feminine' ),
				'choices'	  => array(
					'no-sidebar'    => esc_url( get_template_directory_uri() . '/images/1c.png' ),
					'left-sidebar'  => esc_url( get_template_directory_uri() . '/images/2cl.png' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/images/2cr.png' ),
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'post_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Radio_Image_Control(
			$wp_customize,
			'post_sidebar_layout',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Post Sidebar Layout', 'blossom-feminine' ),
				'description' => __( 'This is the general sidebar layout for posts. You can override the sidebar layout for individual post in respective post.', 'blossom-feminine' ),
				'choices'	  => array(
					'no-sidebar'    => esc_url( get_template_directory_uri() . '/images/1c.png' ),
					'left-sidebar'  => esc_url( get_template_directory_uri() . '/images/2cl.png' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/images/2cr.png' ),
				)
			)
		)
	);
    
    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'ed_excerpt', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_excerpt',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Enable Blog Excerpt', 'blossom-feminine' ),
                'description' => __( 'Enable to show excerpt or disable to show full post content.', 'blossom-feminine' ),
			)
		)
	);
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => 55,
            'sanitize_callback' => 'blossom_feminine_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Slider_Control( 
			$wp_customize,
			'excerpt_length',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Excerpt Length', 'blossom-feminine' ),
				'description' => __( 'Automatically generated excerpt length (in words).', 'blossom-feminine' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 100,
					'step'	=> 5,
				)                 
			)
		)
	);
    
    /** Read More Text */
    $wp_customize->add_setting(
        'read_more_text',
        array(
            'default'           => __( 'Read More', 'blossom-feminine' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Read More Text', 'blossom-feminine' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .btn-readmore',
        'render_callback' => 'blossom_feminine_get_read_more',
    ) );
    
    /** Note */
    $wp_customize->add_setting(
        'post_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
			$wp_customize,
			'post_note_text',
			array(
				'section'	  => 'post_page_settings',
				'description' => __( 'These options affect your individual posts.', 'blossom-feminine' ),
			)
		)
    );
    
    /** Hide Category */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_related',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Related Posts', 'blossom-feminine' ),
                'description' => __( 'Enable to show related posts in single page.', 'blossom-feminine' ),
			)
		)
	);
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'You may also like...', 'blossom-feminine' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Related Posts Section Title', 'blossom-feminine' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.related-post .title',
        'render_callback' => 'blossom_feminine_get_related_title',
    ) );
    
    /** Comments */
    $wp_customize->add_setting(
        'ed_comments',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Toggle_Control( 
            $wp_customize,
            'ed_comments',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Comments', 'blossom-feminine' ),
                'description' => __( 'Enable to hide Comments.', 'blossom-feminine' ),
            )
        )
    );  

    /** Hide Category */
    $wp_customize->add_setting( 
        'ed_category', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_category',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Category', 'blossom-feminine' ),
                'description' => __( 'Enable to hide category.', 'blossom-feminine' ),
			)
		)
	);
    
    /** Hide Author */
    $wp_customize->add_setting( 
        'ed_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_author',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Author', 'blossom-feminine' ),
                'description' => __( 'Enable to hide author section.', 'blossom-feminine' ),
			)
		)
	);
    
    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_post_date',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Posted Date', 'blossom-feminine' ),
                'description' => __( 'Enable to hide posted date.', 'blossom-feminine' ),
			)
		)
	);
    
    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_featured_image', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_featured_image',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Featured Image', 'blossom-feminine' ),
                'description' => __( 'Enable to show featured image in post detail (single page).', 'blossom-feminine' ),
			)
		)
	);
    
    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Prefix in Archive Page', 'blossom-feminine' ),
                'description' => __( 'Enable to hide prefix in archive page.', 'blossom-feminine' ),
			)
		)
	);
    /** Posts(Blog) & Pages Settings Ends */
    
    /** Newsletter Settings */
    $wp_customize->add_section(
        'newsletter_settings',
        array(
            'title'    => __( 'Newsletter Settings', 'blossom-feminine' ),
            'priority' => 60,
            'panel'    => 'general_settings',
        )
    );
    
    if( blossom_feminine_is_btnw_activated() ){
        /** Enable Newsletter Section */
        $wp_customize->add_setting( 
            'ed_newsletter', 
            array(
                'default'           => false,
                'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
    		new Blossom_Feminine_Toggle_Control( 
    			$wp_customize,
    			'ed_newsletter',
    			array(
    				'section'     => 'newsletter_settings',
    				'label'	      => __( 'Newsletter Section', 'blossom-feminine' ),
                    'description' => __( 'Enable to show Newsletter Section', 'blossom-feminine' ),
    			)
    		)
    	);
        
        /** Newsletter Shortcode */
        $wp_customize->add_setting(
            'newsletter_shortcode',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
            )
        );
        
        $wp_customize->add_control(
            'newsletter_shortcode',
            array(
                'type'        => 'text',
                'section'     => 'newsletter_settings',
                'label'       => __( 'Newsletter Shortcode', 'blossom-feminine' ),
                'description' => __( 'Enter the BlossomThemes Email Newsletters Shortcode. Ex. [BTEN id="356"]', 'blossom-feminine' ),
            )
        );
                
    }else{
        /** Note */
        $wp_customize->add_setting(
            'newsletter_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Blossom_Feminine_Note_Control( 
    			$wp_customize,
    			'newsletter_text',
    			array(
    				'section'	  => 'newsletter_settings',
    				'description' => sprintf( __( 'Please install and activate the recommended plugin %1$sBlossomThemes Email Newsletter%2$s. After that option related with this section will be visible.', 'blossom-feminine' ), '<a href="' . admin_url( 'themes.php?page=tgmpa-install-plugins' ) . '" target="_blank">', '</a>' )
    			)
    		)
        );
    }
    
    /** Instagram Settings */
    $wp_customize->add_section(
        'instagram_settings',
        array(
            'title'    => __( 'Instagram Settings', 'blossom-feminine' ),
            'priority' => 70,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Instagram Section */
    $wp_customize->add_setting( 
        'ed_instagram', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Toggle_Control( 
            $wp_customize,
            'ed_instagram',
            array(
                'section'     => 'instagram_settings',
                'label'	      => __( 'Instagram Section', 'blossom-feminine' ),
                'description' => __( 'Enable to show Instagram Section', 'blossom-feminine' ),
            )
        )
    );
        
    $wp_customize->add_setting( 
        'instagram_shortcode', 
        array(
            'default'           => '[instagram-feed]',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'instagram_shortcode',
        array(
            'section'         => 'instagram_settings',
            'label'           => __( 'Shortcode', 'blossom-feminine' ),
            'type'            => 'text',
            'description'     => __( 'Add shortcode for your instagram profile below:', 'blossom-feminine' ),
            'active_callback' => 'blossom_feminine_instagram_ac',
        )
    ); 

    /** Shop Settings */
    $wp_customize->add_section(
        'shop_settings',
        array(
            'title'    => __( 'Shop Settings', 'blossom-feminine' ),
            'priority' => 80,
            'panel'    => 'general_settings',
            'active_callback' => 'blossom_feminine_is_woocommerce_activated'
        )
    );

    /** Shop Page Description */
    $wp_customize->add_setting( 
        'shop_archive_description', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Toggle_Control( 
            $wp_customize,
            'shop_archive_description',
            array(
                'section'     => 'shop_settings',
                'label'       => __( 'Shop Page Description', 'blossom-feminine' ),
                'description' => __( 'Enable to show Shop Page Description.', 'blossom-feminine' ),
            )
        )
    );

    /** Misc Settings */
    $wp_customize->add_section(
        'misc_img_section',
        array(
            'title'    => __( 'Misc Settings', 'blossom-feminine' ),
            'panel'    => 'general_settings',
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'misc_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'misc_text',
            array(
                'section'     => 'misc_img_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );
    
    $wp_customize->add_setting( 
        'misc_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'misc_settings',
            array(
                'section'    => 'misc_img_section',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/misc-settings.png',
                ),
            )
        )
    );
    /** Misc Settings Ends */

    /** Google Analytics */
    $wp_customize->add_section(
        'google_analytics_img_section',
        array(
            'title'    => __( 'Google Analytics Settings', 'blossom-feminine' ),
            'panel'    => 'general_settings',
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'google_analytics_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Note_Control( 
            $wp_customize,
            'google_analytics_text',
            array(
                'section'     => 'google_analytics_img_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-feminine' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );
    
    $wp_customize->add_setting( 
        'google_analytics_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Radio_Image_Control(
            $wp_customize,
            'google_analytics_settings',
            array(
                'section'    => 'google_analytics_img_section',
                'feat_class' => 'upg-to-pro',
                'choices'    => array(
                    'one' => get_template_directory_uri() . '/images/google-analytics.png',
                ),
            )
        )
    );
    /** Social Sharing Ends */
}
add_action( 'customize_register', 'blossom_feminine_customize_register_general' );

/**
 * Active Callback
*/
function blossom_feminine_banner_ac( $control ){
    
    $slider_type = $control->manager->get_setting( 'slider_type' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'slider_cat' && $slider_type == 'cat' ) return true;
    if ( $control_id == 'no_of_slides' && $slider_type == 'latest_posts' ) return true;
    
    return false;
}

/**
 * Active Callback for instagram
*/
function blossom_feminine_instagram_ac( $control ){

    $ed_insta   = $control->manager->get_setting( 'ed_instagram' )->value();
    $control_id = $control->id;

    if ( $control_id == 'instagram_shortcode' && $ed_insta ) return true;

    return false;
}