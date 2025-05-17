<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blossom_Feminine
 */

$sidebar_layout = blossom_feminine_sidebar_layout();

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			/**
             * 
             * @hooked blossom_feminine_author        - 15
             * @hooked blossom_feminine_newsletter    - 20
             * @hooked blossom_feminine_navigation    - 25
             * @hooked blossom_feminine_related_posts - 30
             * @hooked blossom_feminine_comment       - 35
            */
            do_action( 'blossom_feminine_after_post_content' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if( $sidebar_layout != 'full-width' )
get_sidebar();
get_footer();