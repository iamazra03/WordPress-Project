<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Feminine
 */
    /**
     * After Content
     * 
     * @hooked blossom_feminine_content_end - 20
    */
    do_action( 'blossom_feminine_before_footer' );
    
    /**
     * Footer
     * 
     * @hooked blossom_feminine_footer_start  - 20
     * @hooked blossom_feminine_footer_top    - 30
     * @hooked blossom_feminine_footer_bottom - 40
     * @hooked blossom_feminine_footer_end    - 50
    */
    do_action( 'blossom_feminine_footer' );
    
    /**
     * After Footer
     * 
     * @hooked blossom_feminine_back_to_top - 15
     * @hooked blossom_feminine_page_end    - 20
    */
    do_action( 'blossom_feminine_after_footer' );
    
    wp_footer(); ?>

</body>
</html>
