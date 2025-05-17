<?php
/**
 * Dynamic Styles
 * 
 * @package Blossom_Feminine
*/
if( ! function_exists( 'blossom_feminine_dynamic_css' ) ) :
/* 
* Dynamic Css
*/
function blossom_feminine_dynamic_css(){
    
    $primary_font    = get_theme_mod( 'primary_font', 'Poppins' );
    $primary_fonts   = blossom_feminine_get_fonts( $primary_font, 'regular' );
    $secondary_font  = get_theme_mod( 'secondary_font', 'Playfair Display' );
    $secondary_fonts = blossom_feminine_get_fonts( $secondary_font, 'regular' );
    $font_size       = get_theme_mod( 'font_size', 16 );
    
    $site_title_font      = get_theme_mod( 'site_title_font', array( 'font-family'=>'Playfair Display', 'variant'=>'700italic' ) );
    $site_title_fonts     = blossom_feminine_get_fonts( $site_title_font['font-family'], $site_title_font['variant'] );
    $site_title_font_size = get_theme_mod( 'site_title_font_size', 60 );
    
    $primary_color = get_theme_mod( 'primary_color', '#f3c9dd' );
    
    $rgb = blossom_feminine_hex2rgb( blossom_feminine_sanitize_hex_color( $primary_color ) );
     
    echo "<style type='text/css' media='all'>"; ?>
     
    .content-newsletter .blossomthemes-email-newsletter-wrapper.bg-img:after,
    .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper:after{
        <?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.8);'; ?>
    }
    
    /* primary color */
    a{
    	color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
    }
    
    a:hover, a:focus {
    	color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
    }

    .secondary-nav ul li a:hover,
    .secondary-nav ul li:hover > a,
    .secondary-nav .current_page_item > a,
    .secondary-nav .current-menu-item > a,
    .secondary-nav .current_page_ancestor > a,
    .secondary-nav .current-menu-ancestor > a,
    .secondary-nav ul li a:focus, 
    .secondary-nav ul li:focus > a, 
    .header-t .social-networks li a:hover,
    .header-t .social-networks li a:focus, 
    .main-navigation ul li a:hover,
    .main-navigation ul li:hover > a,
    .main-navigation .current_page_item > a,
    .main-navigation .current-menu-item > a,
    .main-navigation .current_page_ancestor > a,
    .main-navigation .current-menu-ancestor > a,
    .main-navigation ul li a:focus, 
    .main-navigation ul li:focus > a, 
    .banner .banner-text .cat-links a:hover,
    .banner .banner-text .cat-links a:focus, 
    .banner .banner-text .title a:hover,
    .banner .banner-text .title a:focus, 
    #primary .post .text-holder .entry-header .entry-title a:hover,
     #primary .post .text-holder .entry-header .entry-title a:focus, 
     .archive .blossom-portfolio .entry-header .entry-title a:hover, 
     .archive .blossom-portfolio .entry-header .entry-title a:focus, 
    .widget ul li a:hover,
 .widget ul li a:focus,
    .site-footer .widget ul li a:hover,
 .site-footer .widget ul li a:focus,
    .related-post .post .text-holder .cat-links a:hover,
 .related-post .post .text-holder .cat-links a:focus,
 .related-post .post .text-holder .entry-title a:hover,
 .related-post .post .text-holder .entry-title a:focus,
    .comments-area .comment-body .comment-metadata a:hover,
 .comments-area .comment-body .comment-metadata a:focus,
    .search #primary .search-post .text-holder .entry-header .entry-title a:hover,
 .search #primary .search-post .text-holder .entry-header .entry-title a:focus,
    .site-title a:hover, .site-title a:focus, 
    .widget_bttk_popular_post ul li .entry-header .entry-meta a:hover,
 .widget_bttk_popular_post ul li .entry-header .entry-meta a:focus,
 .widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:hover,
 .widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:focus,
    .widget_bttk_popular_post .style-two li .entry-header .cat-links a,
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a,
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a,
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a,
    .site-footer .widget_bttk_posts_category_slider_widget .carousel-title .title a:hover,
 .site-footer .widget_bttk_posts_category_slider_widget .carousel-title .title a:focus,
    .portfolio-sorting .button:hover,
 .portfolio-sorting .button:focus,
    .portfolio-sorting .button.is-checked,
    .portfolio-item .portfolio-img-title a:hover,
 .portfolio-item .portfolio-img-title a:focus,
    .portfolio-item .portfolio-cat a:hover,
 .portfolio-item .portfolio-cat a:focus,
    .entry-header .portfolio-cat a:hover,
 .entry-header .portfolio-cat a:focus, 
    .widget ul li a:hover, .widget ul li a:focus, 
    .widget_bttk_posts_category_slider_widget .carousel-title .title a:hover, 
    .widget_bttk_posts_category_slider_widget .carousel-title .title a:focus, 
    .widget_bttk_popular_post ul li .entry-header .entry-meta a:hover, 
    .widget_bttk_popular_post ul li .entry-header .entry-meta a:focus, 
    .widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:hover, 
    .widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:focus, 
    #primary .post .text-holder .entry-footer .share .social-networks li a:hover,
 #primary .post .text-holder .entry-footer .share .social-networks li a:focus, 
 .author-section .text-holder .social-networks li a:hover,
 .author-section .text-holder .social-networks li a:focus, 
 .comments-area .comment-body .fn a:hover,
 .comments-area .comment-body .fn a:focus, 
 .archive #primary .post .text-holder .entry-header .top .share .social-networks li a:hover,
    .archive #primary .post .text-holder .entry-header .top .share .social-networks li a:focus,
    .widget_rss .widget-title a:hover,
.widget_rss .widget-title a:focus, 
.search #primary .search-post .text-holder .entry-header .top .share .social-networks li a:hover,
 .search #primary .search-post .text-holder .entry-header .top .share .social-networks li a:focus, 
 .submenu-toggle:hover, 
    .submenu-toggle:focus,
    .entry-content a:hover,
   .entry-summary a:hover,
   .page-content a:hover,
   .comment-content a:hover,
   .widget .textwidget a:hover{
        color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
    }

    .category-section .col .img-holder .text-holder,
    .pagination a{
        border-color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
    }

    .category-section .col .img-holder .text-holder span,
    #primary .post .text-holder .entry-footer .btn-readmore:hover,
    #primary .post .text-holder .entry-footer .btn-readmore:focus, 
    .pagination a:hover,
    .pagination a:focus,
    .widget_calendar caption,
    .widget_calendar table tbody td a,
    .widget_tag_cloud .tagcloud a:hover,
 .widget_tag_cloud .tagcloud a:focus,
    #blossom-top,
    .single #primary .post .entry-footer .tags a:hover,
    .single #primary .post .entry-footer .tags a:focus, 
    .error-holder .page-content a:hover,
 .error-holder .page-content a:focus,
    .widget_bttk_author_bio .readmore:hover,
 .widget_bttk_author_bio .readmore:focus,
    .widget_bttk_image_text_widget ul li .btn-readmore:hover,
 .widget_bttk_image_text_widget ul li .btn-readmore:focus,
    .widget_bttk_custom_categories ul li a:hover .post-count,
 .widget_bttk_custom_categories ul li a:hover:focus .post-count,
    .content-instagram ul li .instagram-meta .like,
    .content-instagram ul li .instagram-meta .comment,
    #secondary .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore:hover,
 #secondary .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore:focus,
    #secondary .widget_blossomtheme_companion_cta_widget .btn-cta:hover,
 #secondary .widget_blossomtheme_companion_cta_widget .btn-cta:focus,
    #secondary .widget_bttk_icon_text_widget .text-holder .btn-readmore:hover,
 #secondary .widget_bttk_icon_text_widget .text-holder .btn-readmore:focus,
    .site-footer .widget_blossomtheme_companion_cta_widget .btn-cta:hover,
 .site-footer .widget_blossomtheme_companion_cta_widget .btn-cta:focus,
    .site-footer .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore:hover,
 .site-footer .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore:focus,
    .site-footer .widget_bttk_icon_text_widget .text-holder .btn-readmore:hover,
 .site-footer .widget_bttk_icon_text_widget .text-holder .btn-readmore:focus, 
    .widget_bttk_social_links ul li a:hover, 
    .widget_bttk_social_links ul li a:focus, 
    .widget_bttk_posts_category_slider_widget .owl-theme .owl-prev:hover,
 .widget_bttk_posts_category_slider_widget .owl-theme .owl-prev:focus,
 .widget_bttk_posts_category_slider_widget .owl-theme .owl-next:hover,
 .widget_bttk_posts_category_slider_widget .owl-theme .owl-next:focus{
        background: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
    }

    .pagination .current,
    .post-navigation .nav-links .nav-previous a:hover,
    .post-navigation .nav-links .nav-next a:hover, 
 .post-navigation .nav-links .nav-previous a:focus,
 .post-navigation .nav-links .nav-next a:focus{
        background: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
        border-color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
    }

    #primary .post .entry-content blockquote,
    #primary .page .entry-content blockquote{
        border-bottom-color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
        border-top-color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
    }

    #primary .post .entry-content .pull-left,
    #primary .page .entry-content .pull-left,
    #primary .post .entry-content .pull-right,
    #primary .page .entry-content .pull-right{border-left-color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;}

    .error-holder .page-content h2{
        text-shadow: 6px 6px 0 <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
    }

    
    body,
    button,
    input,
    select,
    optgroup,
    textarea{
        font-family : <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
        font-size   : <?php echo absint( $font_size ); ?>px;
    }

    #primary .post .entry-content blockquote cite,
    #primary .page .entry-content blockquote cite {
        font-family : <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
    }

    .banner .banner-text .title,
    #primary .sticky .text-holder .entry-header .entry-title,
    #primary .post .text-holder .entry-header .entry-title,
    .author-section .text-holder .title,
    .post-navigation .nav-links .nav-previous .post-title,
    .post-navigation .nav-links .nav-next .post-title,
    .related-post .post .text-holder .entry-title,
    .comments-area .comments-title,
    .comments-area .comment-body .fn,
    .comments-area .comment-reply-title,
    .page-header .page-title,
    #primary .post .entry-content blockquote,
    #primary .page .entry-content blockquote,
    #primary .post .entry-content .pull-left,
    #primary .page .entry-content .pull-left,
    #primary .post .entry-content .pull-right,
    #primary .page .entry-content .pull-right,
    #primary .post .entry-content h1,
    #primary .page .entry-content h1,
    #primary .post .entry-content h2,
    #primary .page .entry-content h2,
    #primary .post .entry-content h3,
    #primary .page .entry-content h3,
    #primary .post .entry-content h4,
    #primary .page .entry-content h4,
    #primary .post .entry-content h5,
    #primary .page .entry-content h5,
    #primary .post .entry-content h6,
    #primary .page .entry-content h6,
    .search #primary .search-post .text-holder .entry-header .entry-title,
    .error-holder .page-content h2,
    .widget_bttk_author_bio .title-holder,
    .widget_bttk_popular_post ul li .entry-header .entry-title,
    .widget_bttk_pro_recent_post ul li .entry-header .entry-title,
    .widget_bttk_posts_category_slider_widget .carousel-title .title,
    .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3,
    .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper .text-holder h3,
    #secondary .widget_bttk_testimonial_widget .text-holder .name,
    #secondary .widget_bttk_description_widget .text-holder .name,
    .site-footer .widget_bttk_description_widget .text-holder .name,
    .site-footer .widget_bttk_testimonial_widget .text-holder .name,
    .portfolio-text-holder .portfolio-img-title,
    .portfolio-holder .entry-header .entry-title,
    .single-blossom-portfolio .post-navigation .nav-previous a,
    .single-blossom-portfolio .post-navigation .nav-next a,
    .related-portfolio-title{
        font-family: <?php echo wp_kses_post( $secondary_fonts['font'] ); ?>;
    }

    .site-title{
        font-size   : <?php echo absint( $site_title_font_size ); ?>px;
        font-family : <?php echo wp_kses_post( $site_title_fonts['font'] ); ?>;
        font-weight : <?php echo esc_attr( $site_title_fonts['weight'] ); ?>;
        font-style  : <?php echo esc_attr( $site_title_fonts['style'] ); ?>;
    }
    
    <?php if( blossom_feminine_is_woocommerce_activated() ) { ?>
        .woocommerce ul.products li.product .add_to_cart_button:hover,
		.woocommerce ul.products li.product .product_type_external:hover,
		.woocommerce nav.woocommerce-pagination ul li a:hover,
		.woocommerce #secondary .widget_shopping_cart .buttons .button:hover,
		.woocommerce #secondary .widget_price_filter .price_slider_amount .button:hover,
		.woocommerce #secondary .widget_price_filter .ui-slider .ui-slider-range,
		.woocommerce div.product form.cart .single_add_to_cart_button:hover,
		.woocommerce div.product .cart .single_add_to_cart_button.alt:hover,
		.woocommerce .woocommerce-message .button:hover,
		.woocommerce-cart #primary .page .entry-content .cart_totals .checkout-button:hover,
		.woocommerce-checkout .woocommerce .woocommerce-info,
        .header-t .tools .cart .count {
			background: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
		}

		.woocommerce nav.woocommerce-pagination ul li a{
			border-color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
		}

		.woocommerce nav.woocommerce-pagination ul li span.current{
			background: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
			border-color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
		}

		.woocommerce div.product .entry-summary .product_meta .posted_in a:hover,
		.woocommerce div.product .entry-summary .product_meta .tagged_as a:hover{
			color: <?php echo blossom_feminine_sanitize_hex_color( $primary_color ); ?>;
		}
            
    <?php } ?>
           
    <?php echo "</style>";
}
endif;
add_action( 'wp_head', 'blossom_feminine_dynamic_css', 99 );

/**
 * Function for sanitizing Hex color 
 */
function blossom_feminine_sanitize_hex_color( $color ){
	if ( '' === $color )
		return '';

    // 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;
}

/**
 * convert hex to rgb
 * @link http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
*/
function blossom_feminine_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
