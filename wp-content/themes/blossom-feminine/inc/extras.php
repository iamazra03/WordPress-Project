<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blossom_Feminine
 */

if ( ! function_exists( 'blossom_feminine_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blossom_feminine_posted_on() {
    $ed_post_date  = get_theme_mod( 'ed_post_date', false );
    if( $ed_post_date ) return false;

	$ed_updated_post_date = get_theme_mod( 'ed_post_update_date', true );
    $on = __( 'on ', 'blossom-feminine' );
    
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        if( $ed_updated_post_date ){
            $time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
            $on = __( 'updated on ', 'blossom-feminine' );        
        }else{
            $time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';  
        }        
    }else{
       $time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';   
    }

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(		
		'<span class="text-on">%1$s</span>%2$s',
        esc_html( $on ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'blossom_feminine_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blossom_feminine_posted_by() {
	$ed_author  = get_theme_mod( 'ed_author', false );
    if( $ed_author ) return false;

    $byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'blossom-feminine' ),
		'<span class="author vcard" itemprop="name"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'blossom_feminine_comment_count' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blossom_feminine_comment_count() {
    $ed_comments    = get_theme_mod( 'ed_comments', false );
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && !$ed_comments ) {
		echo '<span class="comments"><i class="fa fa-comment"></i>';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'blossom-feminine' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'blossom_feminine_categories' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blossom_feminine_categories() {
    $ed_cat_single = get_theme_mod( 'ed_category', false );
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() && !$ed_cat_single ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'blossom-feminine' ) );
		if ( $categories_list ) {
			echo '<span class="cat-links" itemprop="about">' . $categories_list . '</span>';
		}
	}		
}
endif;

if ( ! function_exists( 'blossom_feminine_tags' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blossom_feminine_tags() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', '' );
		if ( $tags_list ) {
			echo '<span class="tags">' . $tags_list . '</span>';
		}
	}
}
endif;

if ( ! function_exists( 'blossom_feminine_edit_post_link' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blossom_feminine_edit_post_link() {
	if ( get_edit_post_link() ){
        edit_post_link(
    		sprintf(
    			wp_kses(
    				/* translators: %s: Name of current post. Only visible to screen readers */
    				__( 'Edit <span class="screen-reader-text">%s</span>', 'blossom-feminine' ),
    				array(
    					'span' => array(
    						'class' => array(),
    					),
    				)
    			),
    			get_the_title()
    		),
    		'<span class="edit-link">',
    		'</span>'
    	);
    }
}
endif;

if( ! function_exists( 'blossom_feminine_sidebar_layout' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function blossom_feminine_sidebar_layout(){
    global $post;
    $return = false;
    $page_layout = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Pages
    $post_layout = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Posts
    
    if( is_archive() && blossom_feminine_is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() ) ){
        if( is_active_sidebar( 'shop-sidebar' ) ){
            $return = 'rightsidebar'; //With Sidebar
        }else{
            $return = 'full-width';
        }        
    }elseif( is_singular() ){         
        if( get_post_meta( $post->ID, '_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        if( is_page() ){
            if( is_page_template( 'templates/blossom-portfolio.php' ) ) {
                $return = 'full-width';
            }elseif( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' ){
                    $return = 'full-width';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = 'rightsidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = 'leftsidebar';
                }elseif( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ){
                    $return = 'full-width';
                }
            }else{
                $return = 'full-width';
            }
        }elseif( is_single() ){
            if( 'blossom-portfolio' === get_post_type() ){ //For Portfolio Post Type
                $return = 'full-width'; //Fullwidth
            }elseif( blossom_feminine_is_woocommerce_activated() && 'product' === get_post_type() ){
                if( is_active_sidebar( 'shop-sidebar' ) ){
                    if( $post_layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    if( $post_layout == 'no-sidebar' ) $return = 'full-width';
                }else{
                    $return = 'full-width';
                }
            }elseif( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' ){
                    $return = 'full-width';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = 'rightsidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = 'leftsidebar';
                }elseif( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ){
                    $return = 'full-width';
                }
            }else{
                $return = 'full-width';
            }
        }
    }else{
        if( is_active_sidebar( 'sidebar' ) ){            
            $return = 'rightsidebar';             
        }else{
            $return = 'full-width';
        } 
    }
    
    return $return; 
}
endif;

if( ! function_exists( 'blossom_feminine_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function blossom_feminine_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-feminine' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_feminine_secondary_menu_fallback' ) ) :
/**
 * Fallback for secondary menu
*/
function blossom_feminine_secondary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="secondary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-feminine' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_feminine_theme_comment' ) ) :
/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function blossom_feminine_theme_comment( $comment, $args, $depth ){
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
	<?php endif; ?>
    	
        <footer class="comment-meta">
            <div class="comment-author vcard">
        	   <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        	</div><!-- .comment-author vcard -->
        </footer>
        
        <div class="text-holder">
        	<div class="top">
                <div class="left">
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'blossom-feminine' ); ?></em>
                		<br />
                	<?php endif; ?>
                    <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="https://schema.org/Person">%s</b> <span class="says">says:</span>', 'blossom-feminine' ), get_comment_author_link() ); ?>
                	<div class="comment-metadata commentmetadata">
                        <?php esc_html_e( 'Posted on', 'blossom-feminine' );?>
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                    		<time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'blossom-feminine' ), get_comment_date(),  get_comment_time() ); ?></time>
                        </a>
                	</div>
                </div>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            	</div>
            </div>            
            <div class="comment-content" itemprop="commentText"><?php comment_text(); ?></div>        
        </div><!-- .text-holder -->
        
	<?php if ( 'div' != $args['style'] ) : ?>
    </div><!-- .comment-body -->
	<?php endif; ?>
    
<?php
}
endif;

if( ! function_exists( 'blossom_feminine_get_posts' ) ) :
/**
 * Fuction to list Custom Post Type
*/
function blossom_feminine_get_posts( $post_type = 'post' ){
    
    $args = array(
    	'posts_per_page'   => -1,
    	'post_type'        => $post_type,
    	'post_status'      => 'publish',
    	'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    
    // Initate an empty array
    $post_options = array();
    $post_options[''] = __( ' -- Choose -- ', 'blossom-feminine' );
    if ( ! empty( $posts_array ) ) {
        foreach ( $posts_array as $posts ) {
            $post_options[ $posts->ID ] = $posts->post_title;
        }
    }
    return $post_options;
    wp_reset_postdata();
}
endif;

if( ! function_exists( 'blossom_feminine_get_categories' ) ) :
/**
 * Function to list post categories in customizer options
*/
function blossom_feminine_get_categories( $select = true, $taxonomy = 'category', $slug = false ){
    
    /* Option list of all categories */
    $categories = array();
    
    $args = array( 
        'hide_empty' => false,
        'taxonomy'   => $taxonomy 
    );
    
    $catlists = get_terms( $args );
    if( $select ) $categories[''] = __( 'Choose Category', 'blossom-feminine' );
    foreach( $catlists as $category ){
        if( $slug ){
            $categories[$category->slug] = $category->name;
        }else{
            $categories[$category->term_id] = $category->name;    
        }        
    }
    
    return $categories;
}
endif;

if( ! function_exists( 'blossom_feminine_social_links' ) ) :
/**
 * Prints social links in header
*/
function blossom_feminine_social_links(){
    
    $social_links = get_theme_mod( 'social_links' );
    $ed_social    = get_theme_mod( 'ed_social_links', false ); 
    
    if( $ed_social && $social_links ){ ?>
    <ul class="social-networks">
    	<?php 
        foreach( $social_links as $link ){
    	   if( $link['link'] ){ ?>
            <li><a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank" rel="nofollow"><i class="<?php echo esc_attr( $link['font'] ); ?>"></i></a></li>    	   
            <?php
            } 
        } 
        ?>
	</ul>
    <?php    
    }
}
endif;

if( ! function_exists( 'blossom_feminine_get_all_fonts' ) ) :
/**
 * Return Web safe font and google font
*/
function blossom_feminine_get_all_fonts(){
    $google = array();        
    $standard = apply_filters( 'blossom-feminine-fonts/fonts/standard_font', array(
		'georgia-serif'       => __( 'Georgia', 'blossom-feminine' ),
        'palatino-serif'      => __( 'Palatino Linotype, Book Antiqua, Palatino', 'blossom-feminine' ),
        'times-serif'         => __( 'Times New Roman, Times', 'blossom-feminine' ),
        'arial-helvetica'     => __( 'Arial, Helvetica', 'blossom-feminine' ),
        'arial-gadget'        => __( 'Arial Black, Gadget', 'blossom-feminine' ),
		'comic-cursive'       => __( 'Comic Sans MS, cursive', 'blossom-feminine' ),
		'impact-charcoal'     => __( 'Impact, Charcoal', 'blossom-feminine' ),
        'lucida'              => __( 'Lucida Sans Unicode, Lucida Grande', 'blossom-feminine' ),
        'tahoma-geneva'       => __( 'Tahoma, Geneva', 'blossom-feminine' ),
		'trebuchet-helvetica' => __( 'Trebuchet MS, Helvetica', 'blossom-feminine' ),
		'verdana-geneva'      => __( 'Verdana, Geneva', 'blossom-feminine' ),
        'courier'             => __( 'Courier New, Courier', 'blossom-feminine' ),
        'lucida-monaco'       => __( 'Lucida Console, Monaco', 'blossom-feminine' ),
	) );
    
    $fonts = include wp_normalize_path( get_template_directory() . '/inc/custom-controls/typography/webfonts.php' );
    
    foreach( $fonts['items'] as $font ){
        $google[$font['family']] = $font['family'];
    }
    $all_fonts = array_merge( $standard, $google );
    return $all_fonts; 
}
endif;

if( ! function_exists( 'blossom_feminine_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 *
 * @return string
 */
function blossom_feminine_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

/**
 * Is Blossom Theme Toolkit active or not
*/
function blossom_feminine_is_bttk_activated(){
    return class_exists( 'Blossomthemes_Toolkit' ) ? true : false;
}

/**
 * Is BlossomThemes Email Newsletters active or not
*/
function blossom_feminine_is_btnw_activated(){
    return class_exists( 'Blossomthemes_Email_Newsletter' ) ? true : false;        
}

/**
 * Query WooCommerce activation
 */
function blossom_feminine_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

if( ! function_exists( 'blossom_feminine_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function blossom_feminine_get_image_sizes( $size = '' ) {
 
    global $_wp_additional_image_sizes;
 
    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();
 
    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {
        if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array( 
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
            );
        }
    } 
    // Get only 1 size if found
    if ( $size ) {
        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }
    return $sizes;
}
endif;

if ( ! function_exists( 'blossom_feminine_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function blossom_feminine_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }
    
    $image_size = blossom_feminine_get_image_sizes( $post_thumbnail );
     
    if( $image_size ){ ?>
        <div class="svg-holder">
             <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                    <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#f2f2f2;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     *
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         *
         */
        do_action( 'wp_body_open' );
    }
endif;