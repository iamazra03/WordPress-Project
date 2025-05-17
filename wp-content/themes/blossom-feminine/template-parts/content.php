<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blossom_Feminine
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); if( is_home() ) echo ' data-wow-delay="0.1s"';?> itemscope itemtype="https://schema.org/Blog">
	
    <?php
        /**
         * Post Thumbnail
         * 
         * @hooked blossom_feminine_post_thumbnail
        */
        do_action( 'blossom_feminine_before_entry_content' );
    ?>
    
    <div class="text-holder">        
        <?php
            /**
             * Entry Content
             * 
             * @hooked blossom_feminine_entry_header  - 15
             * @hooked blossom_feminine_entry_content - 20
             * @hooked blossom_feminine_entry_footer  - 25
            */
            do_action( 'blossom_feminine_entry_content' );        
        ?>
    </div><!-- .text-holder -->
    
</article><!-- #post-<?php the_ID(); ?> -->