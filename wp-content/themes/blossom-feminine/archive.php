<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blossom_Feminine
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>
            
            <div class="row">
            <?php
    			/* Start the Loop */
    			while ( have_posts() ) : the_post();
    
    				/*
    				 * Include the Post-Format-specific template for the content.
    				 * If you want to override this in a child theme, then include a file
    				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    				 */
    				get_template_part( 'template-parts/content', get_post_format() );
    
    			endwhile;
            ?>
            </div>
            
            <?php
			/**
             * Navigation
             * 
             * @hooked blossom_feminine_navigation
            */
            do_action( 'blossom_feminine_after_content' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
