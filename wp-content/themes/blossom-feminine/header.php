<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Feminine
 */

    /**
     * Doctype Hook
     * 
     * @hooked blossom_feminine_doctype
    */
    do_action( 'blossom_feminine_doctype' );   
?>
<head itemscope itemtype="http://schema.org/WebSite">

<?php 
    
    /**
     * Before wp_head
     * 
     * @hooked blossom_feminine_head
    */
    do_action( 'blossom_feminine_before_wp_head' );
    
    wp_head(); 
?>

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	
<?php

    wp_body_open();
    
    /**
     * Before Header
     * 
     * @hooked blossom_feminine_page_start - 20 
    */
    do_action( 'blossom_feminine_before_header' );
    
    /**
     * Header
     * 
     * @hooked blossom_feminine_header - 20     
    */
    do_action( 'blossom_feminine_header' );
    
    /**
     * Before Content
     * 
     * @hooked blossom_feminine_banner  - 15
     * @hooked blossom_feminine_top_bar - 20
    */
    do_action( 'blossom_feminine_after_header' );
    
    /**
     * Content
     * 
     * @hooked blossom_feminine_content_start
    */
    do_action( 'blossom_feminine_content' );