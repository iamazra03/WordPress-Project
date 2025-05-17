<?php
/**
 * Toolkit Filters
 *
 * @package Blossom_Feminine
 */
 
if( ! function_exists( 'blossom_feminine_portfolio_single_image' )  ) :
    function blossom_feminine_portfolio_single_image(){
        return 'blossom-feminine-featured';
    }
endif;
add_filter( 'bttk_single_portfolio_image', 'blossom_feminine_portfolio_single_image' );

if( ! function_exists( 'blossom_feminine_portfolio_related_image' ) ) :
    function blossom_feminine_portfolio_related_image(){
        return 'blossom-feminine-cat';
    }
endif;
add_filter( 'bttk_related_portfolio_image', 'blossom_feminine_portfolio_related_image' );

if( ! function_exists( 'blossom_feminine_ad_image' ) ) :
    function blossom_feminine_ad_image(){
        return 'full';
    }
endif;
add_filter( 'bttk_ad_img_size', 'blossom_feminine_ad_image' );

if( ! function_exists( 'blossom_feminine_author_image' ) ) :
    function blossom_feminine_author_image(){
        return 'blossom-feminine-blog';
    }
endif;
add_filter( 'author_bio_img_size', 'blossom_feminine_author_image' );