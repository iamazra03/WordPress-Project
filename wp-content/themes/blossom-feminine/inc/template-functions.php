<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blossom_Feminine
 */

if( ! function_exists( 'blossom_feminine_doctype' ) ) :
/**
 * Doctype Declaration
*/
function blossom_feminine_doctype(){
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'blossom_feminine_doctype', 'blossom_feminine_doctype' );

if( ! function_exists( 'blossom_feminine_head' ) ) :
/**
 * Before wp_head 
*/
function blossom_feminine_head(){
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'blossom_feminine_before_wp_head', 'blossom_feminine_head' );

if( ! function_exists( 'blossom_feminine_page_start' ) ) :
/**
 * Page Start
*/
function blossom_feminine_page_start(){
    ?>
    <div id="page" class="site"><a aria-label="<?php esc_attr_e( 'skip to content', 'blossom-feminine' ); ?>" class="skip-link" href="#content"><?php esc_html_e( 'Skip to Content', 'blossom-feminine' ); ?></a>
    <?php
}
endif;
add_action( 'blossom_feminine_before_header', 'blossom_feminine_page_start', 20 );

if( ! function_exists( 'blossom_feminine_header' ) ) :
/**
 * Header Start
*/
function blossom_feminine_header(){ 
    $bg = get_header_image() ? ' style="background-image:url(' . esc_url( get_header_image() ) . ')"' : ''; ?>
    <header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
    
		<div class="header-t">
			<div class="container">

                <?php if( has_nav_menu('secondary') ) { ?>
				    <button aria-label="<?php esc_attr_e( 'secondary menu toggle button', 'blossom-feminine' ); ?>" id="secondary-toggle-button" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle"><i class="fa fa-bars"></i></button>	
                <?php } ?>

                <nav id="secondary-navigation" class="secondary-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <div class="secondary-menu-list menu-modal cover-modal" data-modal-target-string=".menu-modal">
                        <button class="close close-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
                            <span class="toggle-bar"></span>
                            <span class="toggle-bar"></span>
                        </button>
                        <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'blossom-feminine' ); ?>">
                			<?php
                				wp_nav_menu( array(
                					'theme_location' => 'secondary',
                					'menu_id'        => 'secondary-menu',
                                    'menu_class'     => 'menu-modal',
                                    'fallback_cb'    => 'blossom_feminine_secondary_menu_fallback',
                				) );
                			?>
                        </div>
                    </div>
                
        		</nav><!-- #secondary-navigation -->
                
				<div class="right">
					<div class="tools">
						<div class="form-section">
							<button aria-label="<?php esc_attr_e( 'search toggle button', 'blossom-feminine' ); ?>" id="btn-search" class="search-toggle btn-search " data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                                <i class="fas fa-search"></i>
                            </button>
							<div class="form-holder search-modal cover-modal" data-modal-target-string=".search-modal">
								<div class="form-holder-inner">
                                    <?php get_search_form(); ?>                        
                                </div>
							</div>
						</div>
                        <?php if( blossom_feminine_is_woocommerce_activated() ) blossom_feminine_wc_cart_count(); ?>					
					</div>
                    
					<?php blossom_feminine_social_links(); ?>
                    
				</div>
                
			</div>
		</div><!-- .header-t -->
        
		<div class="header-m site-branding"<?php echo $bg; ?>>
			<div class="container" itemscope itemtype="http://schema.org/Organization">
				<?php 
                if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                    the_custom_logo();
                } 
                if( is_front_page() ){ ?>
                    <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php 
                }else{ ?>
                    <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                }
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ){ ?>
                    <p class="site-description" itemprop="description"><?php echo esc_html( $description ); ?></p>
                <?php

                }
                ?>
			</div>
		</div><!-- .header-m -->
        
		<div class="header-b">
			<div class="container">
				<button aria-label="<?php esc_attr_e( 'primary menu toggle button', 'blossom-feminine' ); ?>" id="primary-toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle"><i class="fa fa-bars"></i></button>
				<nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
                        <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"><i class="fa fa-times"></i><?php esc_html_e( 'Close', 'blossom-feminine' ); ?></button>
                        <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'blossom-feminine' ); ?>">
                			<?php
                				wp_nav_menu( array(
                					'theme_location' => 'primary',
                					'menu_id'        => 'primary-menu',
                                    'menu_class'     => 'main-menu-modal',
                                    'fallback_cb'    => 'blossom_feminine_primary_menu_fallback',
                				) );
                			?>
                        </div>
                    </div>
        		</nav><!-- #site-navigation -->                
			</div>
		</div><!-- .header-b -->
        
	</header><!-- #masthead -->
    <?php
}
endif;
add_action( 'blossom_feminine_header', 'blossom_feminine_header', 20 );

if( ! function_exists( 'blossom_feminine_banner' ) ) :
/**
 * Banner
*/
function blossom_feminine_banner(){ 
    $ed_slider = get_theme_mod( 'ed_slider', true );
        
    if( ( is_front_page() || is_home() ) && $ed_slider ){ 
        $slider_type    = get_theme_mod( 'slider_type', 'latest_posts' );
        $slider_cat     = get_theme_mod( 'slider_cat' );
        $posts_per_page = get_theme_mod( 'no_of_slides', 3 );
    
        $args = array(
            'post_type'           => 'post',
            'post_status'         => 'publish',            
            'ignore_sticky_posts' => true
        );
        
        if( $slider_type === 'cat' && $slider_cat ){
            $args['cat']            = $slider_cat; 
            $args['posts_per_page'] = -1;  
        }else{
            $args['posts_per_page'] = $posts_per_page;
        }
            
        $qry = new WP_Query( $args );
        
        if( $qry->have_posts() ){ ?>        
        	<div class="banner layout-one">
        		<div id="banner-slider" class="owl-carousel">
        			<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                    <div class="item">
        				<?php 
                        if( has_post_thumbnail() ){
        				    the_post_thumbnail( 'blossom-feminine-slider' );    
        				}else{ 
                            blossom_feminine_get_fallback_svg( 'blossom-feminine-slider' ); 
                        }
                        ?>                    
        				<div class="banner-text">
        					<?php
                                blossom_feminine_categories();
                                the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
                            ?>
        				</div>
        			</div>
        			<?php } ?>
        		</div>
        	</div>    
            <?php
        }
        wp_reset_postdata();
    }
}
endif;
add_action( 'blossom_feminine_after_header', 'blossom_feminine_banner', 15 );

if( ! function_exists( 'blossom_feminine_top_bar' ) ) :
/**
 * Top Bar
*/
function blossom_feminine_top_bar(){
    if( ! is_front_page() ){ ?>
    <div class="top-bar">
		<div class="container">
			<?php 
            /**
             * @hooked blossom_feminine_page_header - 15
             * @hooked blossom_feminine_breadcrumb  - 20
            */
            do_action( 'blossom_feminine_top_bar' );
            ?>
		</div>
	</div>
    <?php
    }
}
endif;
add_action( 'blossom_feminine_after_header', 'blossom_feminine_top_bar', 20 );

if( ! function_exists( 'blossom_feminine_page_header' ) ) :
/**
 * Page Header
*/
function blossom_feminine_page_header(){ ?>
    <header class="page-header">
    <?php
        if ( is_home() && ! is_front_page() ){ 
            echo '<h1 class="page-title">';
			single_post_title();
            echo '</h1>';
        }		

        if( is_archive() ){
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
        }
    
        if( is_search() ){ 
            global $wp_query;
            echo '<h1 class="page-title">' . esc_html__( 'Search', 'blossom-feminine' ) . '</h1>';
            get_search_form();
            echo '<span class="result-count">' . sprintf( esc_html__( 'Showing %1$s Result(s)%2$s', 'blossom-feminine' ), '<strong>' . $wp_query->found_posts, '</strong>' ) . '</span>';
        }
    
        if( is_page() ){ 
            the_title( '<h1 class="page-title">', '</h1>' ); 
        }
        
        if( is_404() ) echo '<h1 class="page-title">' . esc_html__( '404', 'blossom-feminine' ) . '</h1>'; //For 404
        ?>
    </header><!-- .page-header -->
    <?php
}
endif;
add_action( 'blossom_feminine_top_bar', 'blossom_feminine_page_header', 15 );

if( ! function_exists( 'blossom_feminine_breadcrumb' ) ) :
/**
 * Page Header for inner pages
*/
function blossom_feminine_breadcrumb(){    
    
    global $post;
    $post_page  = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front = get_option( 'show_on_front' ); //What to show on the front page    
    $home       = get_theme_mod( 'home_text', __( 'Home', 'blossom-feminine' ) ); // text for the 'Home' link
    $delimiter  = get_theme_mod( 'separator', __( '/', 'blossom-feminine' ) ); // delimiter between crumbs
    $before     = '<span class="current" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'; // tag before the current crumb
    $after      = '</span>'; // tag after the current crumb
    
    if( get_theme_mod( 'ed_breadcrumb', true ) && ! is_front_page() && ! is_search() ){
        
        $depth = 1;
        echo '<div class="breadcrumb-wrapper">
                <div id="crumbs" itemscope itemtype="http://schema.org/BreadcrumbList"> 
                    <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="' . esc_url( home_url() ) . '"><span itemprop="name">' . esc_html( $home ) . '</span></a>
                        <meta itemprop="position" content="'. absint( $depth ).'" />
                        <span class="separator">' . esc_html( $delimiter ) . '</span>
                    </span>';
        if( is_home() ){
            $depth = 2;
            echo $before . '<a itemprop="item" href="'. esc_url( get_the_permalink() ) .'"><span itemprop="name">' . esc_html( single_post_title( '', false ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" /> '. $after;
            
        }elseif( is_category() ){
            
            $depth = 2;
            $thisCat = get_category( get_query_var( 'cat' ), false );

            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_permalink( $post_page ) ) . '"><span itemprop="name">' . esc_html( $p->post_title ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . esc_html( $delimiter ) . '</span></span>';
                $depth ++;  
            }

            if ( $thisCat->parent != 0 ) {
                $parent_categories = get_category_parents( $thisCat->parent, false, ',' );
                $parent_categories = explode( ',', $parent_categories );

                foreach ( $parent_categories as $parent_term ) {
                    $parent_obj = get_term_by( 'name', $parent_term, 'category' );
                    if( is_object( $parent_obj ) ){
                        $term_url    = get_term_link( $parent_obj->term_id );
                        $term_name   = $parent_obj->name;
                        echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . esc_html( $delimiter ) . '</span></span> ';
                        $depth ++;
                    }
                }
            }
            echo $before . ' <a itemprop="item" href="' . esc_url( get_term_link( $thisCat->term_id) ) . '"><span itemprop="name">' .  esc_html( single_cat_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /> ' . $after;
        
        }elseif( blossom_feminine_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
        
            $depth = 2;
            $current_term = $GLOBALS['wp_query']->get_queried_object();
            
            if ( wc_get_page_id( 'shop' ) ) { //Displaying Shop link in woocommerce archive page
                $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                $shop_url = wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
                if ( ! $_name ) {
                    $product_post_type = get_post_type_object( 'product' );
                    $_name = $product_post_type->labels->singular_name;
                }
                echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /> <span class="separator">' . esc_html( $delimiter ) . '</span></span> ';
                $depth++;
            }

            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
                foreach ( $ancestors as $ancestor ) {
                    $ancestor = get_term( $ancestor, 'product_cat' );    
                    if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                        echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_term_link( $ancestor ) ) . '"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /> <span class="separator">' . esc_html( $delimiter ) . '</span></span> ';
                        $depth++;
                    }
                }
            }           
            echo $before .'<a itemprop="item" href="' . esc_url( get_term_link( $current_term->term_id ) ) . '"><span itemprop="name">'. esc_html( $current_term->name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
            
        }elseif( blossom_feminine_is_woocommerce_activated() && is_shop() ){ //Shop Archive page

            $depth = 2;
            if ( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) {
                return;
            }
            $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
            $shop_url = wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
    
            if ( ! $_name ) {
                $product_post_type = get_post_type_object( 'product' );
                $_name = $product_post_type->labels->singular_name;
            }
            echo $before .'<a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">'. esc_html( $_name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after; 

        }elseif( is_tax( 'blossom_portfolio_categories' ) ){
            $depth = 2;
            $queried_object = get_queried_object();
            $taxonomy = 'blossom_portfolio_categories';
            $ancestors = get_ancestors( $queried_object->term_id, $taxonomy );
            if( !empty( $ancestors ) ){
            $termz = get_term( $ancestors[0], $taxonomy );
            $ancestors_title = !empty( $termz->name ) ? esc_html( $termz->name ) : ''; 
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_term_link( $termz->term_id ) ) . '"><span itemprop="name">' . $ancestors_title . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'"/><span class="separator">' . $delimiter . '</span></span> ';
                $depth++;
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $queried_object->term_id ) ) . '"><span itemprop="name">' . esc_html( $queried_object->name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        }elseif( is_tag() ){
            
            $queried_object = get_queried_object();
            $depth = 2;

            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $queried_object->term_id ) ) . '"><span itemprop="name">' . esc_html( single_tag_title( '', false ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
     
        }elseif( is_author() ){
            
            $depth = 2;
            global $author;

            $userdata = get_userdata( $author );
            echo $before . '<a itemprop="item" href="' . esc_url( get_author_posts_url( $author ) ) . '"><span itemprop="name">' . esc_html( $userdata->display_name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
     
        }elseif( is_search() ){
            
            $depth = 2;
            $request_uri = $_SERVER['REQUEST_URI'];
            echo $before .'<a itemprop="item" href="'. esc_url( $request_uri ) .'"><span itemprop="name">'. esc_html__( 'Search Results for "', 'blossom-feminine' ) . esc_html( get_search_query() ) . esc_html__( '"', 'blossom-feminine' ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        
        }elseif( is_day() ){
            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'blossom-feminine' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'blossom-feminine' ) ) ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'"/><span class="separator">' . esc_html( $delimiter ) . '</span></span> ';
            $depth ++;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'blossom-feminine' ) ), get_the_time( __( 'm', 'blossom-feminine' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'blossom-feminine' ) ) ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . esc_html( $delimiter ) . '</span></span> ';
            $depth ++;
            echo $before .'<a itemprop="item" href="' . esc_url( get_day_link( get_the_time( __( 'Y', 'blossom-feminine' ) ), get_the_time( __( 'm', 'blossom-feminine' ) ), get_the_time( __( 'd', 'blossom-feminine' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'd', 'blossom-feminine' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        
        }elseif( is_month() ){
            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'blossom-feminine' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'blossom-feminine' ) ) ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . esc_html( $delimiter ) . '</span></span> ';
            $depth++;
            echo $before .'<a itemprop="item" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'blossom-feminine' ) ), get_the_time( __( 'm', 'blossom-feminine' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'F', 'blossom-feminine' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        
        }elseif( is_year() ){
            
            $depth = 2;
            echo $before .'<a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'blossom-feminine' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'Y', 'blossom-feminine' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
    
        }elseif( is_single() && !is_attachment() ){
            
            if( blossom_feminine_is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
        		
        		$depth = 2;
                if ( wc_get_page_id( 'shop' ) ) { //Displaying Shop link in woocommerce archive page
                    $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                    $shop_url = wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
                    if ( ! $_name ) {
                        $product_post_type = get_post_type_object( 'product' );
                        $_name = $product_post_type->labels->singular_name;
                    }
                    echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /> <span class="separator">' . esc_html( $delimiter ) . '</span></span> ';
                    $depth++;
                }
            
                if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
                    $main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
                    $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, 'product_cat' );    
                        if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . esc_html( $delimiter ) . '</span></span>';
                            $depth++;
                        }
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $main_term ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $main_term->name ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . esc_html( $delimiter ) . '</span></span> ';
                    $depth ++;
                }
                
                echo $before .'<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
                
            }elseif( get_post_type() != 'post' ){
                $depth     = 2;
                $post_type = get_post_type_object( get_post_type() );
                
                if( $post_type->has_archive == true ){// For CPT Archive Link
                   
                   // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   printf( '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="%3$s" />', esc_url( get_post_type_archive_link( get_post_type() ) ), $label, $depth );
                   echo '<meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . esc_html( $delimiter ) . '</span></span>';
                   $depth ++;    
                }

                if( get_post_type() =='blossom-portfolio' ){
                    // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   $portfolio_link = blossom_feminine_get_page_template_url( 'templates/blossom-portfolio.php' );
                   echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.esc_url( $portfolio_link) .'" itemprop="item"><span itemprop="name">'.esc_html($label).'</span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . $delimiter . '</span></span>';
                   $depth ++;    
                }

                echo $before .'<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
                
            }else{ //For Post
                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                $depth            = 2;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . esc_html( $delimiter ) . '</span></span> ';  
                    $depth++;
                }
                
                if( is_array( $cat_object ) ){ //Getting category hierarchy if any
        
        			//Now try to find the deepest term of those that we know of
        			$use_term = key( $cat_object );
        			foreach( $cat_object as $key => $object )
        			{
        				//Can't use the next($cat_object) trick since order is unknown
        				if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
        					$use_term = $key;
        					$potential_parent = $object->term_id;
        				}
        			}
                    
        			$cat = $cat_object[$use_term];
              
                    $cats = get_category_parents( $cat, false, ',' );
                    $cats = explode( ',', $cats );

                    foreach ( $cats as $cat ) {
                        $cat_obj = get_term_by( 'name', $cat, 'category' );
                        if( is_object( $cat_obj ) ){
                            $term_url    = get_term_link( $cat_obj->term_id );
                            $term_name   = $cat_obj->name;
                            echo ' <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . ' </span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator">' . esc_html( $delimiter ) . '</span></span> ';
                            $depth ++;
                        }
                    }
                }
    
                 echo $before .'<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;     
                
            }
        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){
            
            $depth = 2;
            $post_type = get_post_type_object(get_post_type());
            if( get_query_var('paged') ){
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />';
                echo ' <span class="separator">' . esc_html( $delimiter ) . '</span></span> ' . $before . sprintf( __('Page %s', 'blossom-feminine'), get_query_var('paged') ) . $after;
            }elseif( is_archive() ){
                echo $before .'<a itemprop="item" href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '"><span itemprop="name">'. esc_html( post_type_archive_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
            }else{
                echo $before .'<a itemprop="item" href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '"><span itemprop="name">'. esc_html( $post_type->label ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
            }
    
        }elseif( is_attachment() ){
            
            $depth = 2;
            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID ); 
            if( $cat ){
                $cat = $cat[0];
                echo get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ');
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $parent ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $parent->post_title ) . '<span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . ' <span class="separator">' . esc_html( $delimiter ) . '</span></span>';
            }
            echo  $before .'<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
        
        }elseif( is_page() && !$post->post_parent ){
            
           $depth = 2;
            echo $before .'<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;
    
        }elseif( is_page() && $post->post_parent ){
            
            global $post;
            $depth = 2;
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            
            while( $parent_id ){
                $current_page = get_post( $parent_id );
                $breadcrumbs[] = $current_page->ID;
                $parent_id  = $current_page->post_parent;
            }

            $breadcrumbs = array_reverse( $breadcrumbs );

            for ( $i = 0; $i < count( $breadcrumbs); $i++ ){
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $breadcrumbs[$i] ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title( $breadcrumbs[$i] ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /></span>';
                if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                $depth++;
            }

            echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before .'<a href="' . get_permalink() . '" itemprop="item"><span itemprop="name">'. esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" /></span>'. $after;
        
        }elseif( is_404() ){
            echo $before . esc_html__( '404 Error - Page Not Found', 'blossom-feminine' ) . $after;
        }
        
        if( get_query_var('paged') ) echo __( ' (Page', 'blossom-feminine' ) . ' ' . get_query_var('paged') . __( ')', 'blossom-feminine' );
        
        echo '</div></div><!-- .breadcrumb-wrapper -->';
        
    }
}
endif;
add_action( 'blossom_feminine_top_bar', 'blossom_feminine_breadcrumb', 20 );

if( ! function_exists( 'blossom_feminine_content_start' ) ) :
/**
 * Content Start
*/
function blossom_feminine_content_start(){
    
    $class = is_404() ? 'error-holder' : 'row' ; ?>
    <div class="container main-content">
        <?php 
        /**
         * Page Header
         * 
         * @hooked blossom_feminine_featured_section
        */
        do_action( 'blossom_feminine_featured_section' );
        ?>
        <div id="content" class="site-content">
            <div class="<?php echo esc_attr( $class ); ?>">
    <?php
}
endif;
add_action( 'blossom_feminine_content', 'blossom_feminine_content_start' );

if( ! function_exists( 'blossom_feminine_featured_section' ) ) :
/**
 * Featured Section
*/
function blossom_feminine_featured_section(){ 
    $ed_featured         = get_theme_mod( 'ed_featured_area', true );
    $featured_page_one   = get_theme_mod( 'featured_content_one' );
    $featured_page_two   = get_theme_mod( 'featured_content_two' );
    $featured_page_three = get_theme_mod( 'featured_content_three' );
    $featured_pages      = array( $featured_page_one, $featured_page_two, $featured_page_three );
    $featured_pages      = array_diff( array_unique( $featured_pages), array( '' ) );
        
    if( is_home() && $ed_featured && $featured_pages ){ 
        $args = array(
            'post_type'      => 'page',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'post__in'       => $featured_pages,
            'orderby'        => 'post__in'   
        );
        
        $qry = new WP_Query( $args );
        
        if( $qry->have_posts() ){ ?>
            <div class="category-section wow fadeIn" data-wow-delay="0.1s">
        		<div class="row">
        			<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                    <div class="col">
        				<a href="<?php the_permalink(); ?>" class="img-holder">
        					<?php 
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'blossom-feminine-cat' );
                                }else{ 
                                    blossom_feminine_get_fallback_svg( 'blossom-feminine-cat' );
                                }
                                the_title( '<div class="text-holder"><span>', '</span></div>' );
                            ?> 
        				</a>
        			</div>
        			<?php } ?>
        		</div>
        	</div>
            <?php
        }
        wp_reset_postdata();
    }
}
endif;
add_action( 'blossom_feminine_featured_section', 'blossom_feminine_featured_section' );

if( ! function_exists( 'blossom_feminine_post_thumbnail' ) ) :
/**
 * Post Featured Image
*/
function blossom_feminine_post_thumbnail(){ 
    $image_size     = 'thumbnail';
    $ed_featured    = get_theme_mod( 'ed_featured_image', true );
    $sidebar_layout = blossom_feminine_sidebar_layout();
    
    if( is_home() ){        
        echo '<div class="img-holder"><a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
        if( has_post_thumbnail() ){
            if( is_sticky() ){                
                $image_size = ( $sidebar_layout == 'full-width' ) ? 'blossom-feminine-featured' : 'blossom-feminine-with-sidebar';
            }else{
                $image_size = 'blossom-feminine-blog';    
            }
            
            the_post_thumbnail( $image_size );    
        }else{
            $image_size = is_sticky() ? 'blossom-feminine-featured' : 'blossom-feminine-blog';
            blossom_feminine_get_fallback_svg( $image_size );    
        }        
        echo '</a></div>';
    }elseif( is_archive() || is_search() ){
        echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
        if( has_post_thumbnail() ){
            the_post_thumbnail( 'blossom-feminine-cat' );    
        }else{
            blossom_feminine_get_fallback_svg( 'blossom-feminine-cat' );
        }
        echo '</a>';
    }elseif( is_singular() ){
        echo '<div class="post-thumbnail">';
        $image_size = ( $sidebar_layout == 'full-width' ) ? 'blossom-feminine-featured' : 'blossom-feminine-with-sidebar';
        if( is_single() ){
            if( $ed_featured ) the_post_thumbnail( $image_size );
        }else{
            the_post_thumbnail( $image_size );
        }
        echo '</div>';
    }
}
endif;
add_action( 'blossom_feminine_before_entry_content', 'blossom_feminine_post_thumbnail' );

if( ! function_exists( 'blossom_feminine_entry_header' ) ) :
/**
 * Entry Header
*/
function blossom_feminine_entry_header(){ ?>
    <header class="entry-header">
    <?php         
        if( is_archive() || ( is_search() && ( 'post' === get_post_type() ) ) ) echo '<div class="top">'; 

        blossom_feminine_categories();

        /**
         * Social sharing in archive.
        */
        if( is_archive() ) do_action( 'blossom_feminine_social_sharing' );
        
        if( is_archive() || ( is_search() && ( 'post' === get_post_type() ) ) ) echo '</div>';
        
        if( is_single() ){
            the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
        }else{
            the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );    
        }
		
		if ( 'post' === get_post_type() ){ 
            echo '<div class="entry-meta">';
            blossom_feminine_posted_by();
            blossom_feminine_posted_on();                
            blossom_feminine_comment_count();	
            echo '</div><!-- .entry-meta -->';		
		}
        ?>
	</header><!-- .entry-header home-->
    <?php
}
endif;
add_action( 'blossom_feminine_entry_content', 'blossom_feminine_entry_header', 15 );

if( ! function_exists( 'blossom_feminine_entry_content' ) ) :
/**
 * Entry Content
*/
function blossom_feminine_entry_content(){
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true ); ?>
    
    <div class="entry-content" itemprop="text">
		<?php 
        if( is_singular() ){
            /**
             * single post social share.
            */
            if( is_single() ) do_action( 'blossom_feminine_social_sharing' );
            echo '<div class="text">';
        }
        
        if( is_singular() || ! $ed_excerpt || ( get_post_format() != false ) ){
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blossom-feminine' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blossom-feminine' ),
				'after'  => '</div>',
			) );
        }else{
            the_excerpt();
        }
		
        if( is_singular() ) echo '</div>'; 
        
        ?>
	</div><!-- .entry-content -->      
    <?php
}
endif;
add_action( 'blossom_feminine_page_entry_content', 'blossom_feminine_entry_content', 15 );
add_action( 'blossom_feminine_entry_content', 'blossom_feminine_entry_content', 20 );

if( ! function_exists( 'blossom_feminine_entry_footer' ) ) :
/**
 * Entry Footer
*/
function blossom_feminine_entry_footer(){ 
    $readmore = get_theme_mod( 'read_more_text', __( 'Read More', 'blossom-feminine' ) );
    ?>
    <footer class="entry-footer">
    <?php 
        if( is_home() ){ 
            if( $readmore ){ ?>
                <a href="<?php the_permalink(); ?>" class="btn-readmore"><?php echo esc_html( $readmore ); ?></a>
                <?php 
            }
            /**
             * Social sharing in home page
            */
            do_action( 'blossom_feminine_social_sharing' );            
        } 
        //Tags in single page
        if( is_single() ) blossom_feminine_tags();
        //edit post link
        blossom_feminine_edit_post_link(); 
    ?>
	</footer><!-- .entry-footer home-->
    <?php
}
endif;
add_action( 'blossom_feminine_page_entry_content', 'blossom_feminine_entry_footer', 20 );
add_action( 'blossom_feminine_entry_content', 'blossom_feminine_entry_footer', 25 );

if( ! function_exists( 'blossom_feminine_author' ) ) :
/**
 * Author Details
*/
function blossom_feminine_author(){
    $ed_author = get_theme_mod( 'ed_author' );
    if( ! $ed_author && get_the_author_meta( 'description' ) ){ ?>
    <div class="author-section">
		<div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?></div>
		<div class="text-holder">
			<h2 class="title"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h2>				
			<?php echo wpautop( wp_kses_post( get_the_author_meta( 'description' ) ) ); ?>            
		</div>
	</div>
    <?php
    }
}
endif;
add_action( 'blossom_feminine_after_post_content', 'blossom_feminine_author', 15 );

if( ! function_exists( 'blossom_feminine_navigation' ) ) :
/**
 * Post Navigation
*/
function blossom_feminine_navigation(){
    if( is_single() ){ 
       $previous = get_previous_post_link(
    		'<div class="nav-previous nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Previous Article', 'blossom-feminine' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	);
    
    	$next = get_next_post_link(
    		'<div class="nav-next nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Next Article', 'blossom-feminine' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	); 
        
        if( $previous || $next ){?>            
            <nav class="navigation post-navigation" role="navigation">
    			<h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'blossom-feminine' ); ?></h2>
    			<div class="nav-links">
    				<?php
                        if( $previous ) echo $previous;
                        if( $next ) echo $next;
                    ?>
    			</div>
    		</nav>        
            <?php
        }
    }else{
        the_posts_pagination( array(
            'prev_text'          => __( '<i class="fa fa-angle-left"></i>', 'blossom-feminine' ),
            'next_text'          => __( '<i class="fa fa-angle-right"></i>', 'blossom-feminine' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blossom-feminine' ) . ' </span>',
         ) );
    }
}
endif;
add_action( 'blossom_feminine_after_post_content', 'blossom_feminine_navigation', 25 );
add_action( 'blossom_feminine_after_content', 'blossom_feminine_navigation' );

if( ! function_exists( 'blossom_feminine_related_posts' ) ) :
/**
 * Related Posts
*/
function blossom_feminine_related_posts(){ 
    global $post;
    $ed_related_post = get_theme_mod( 'ed_related', true );
    $related_title   = get_theme_mod( 'related_post_title', __( 'You may also like...', 'blossom-feminine' ) );
    if( $ed_related_post ){
        $args = array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => 3,
            'ignore_sticky_posts'   => true,
            'post__not_in'          => array( $post->ID ),
            'orderby'               => 'rand'
        );
        $cats = get_the_category( $post->ID );
        if( $cats ){
            $c = array();
            foreach( $cats as $cat ){
                $c[] = $cat->term_id; 
            }
            $args['category__in'] = $c;
        }
        
        $qry = new WP_Query( $args );
        
        if( $qry->have_posts() ){ ?>
        <div class="related-post">
    		<?php if( $related_title ) echo '<h2 class="title">' . esc_html( $related_title ) . '</h2>'; ?>
    		<div class="row">
    			<?php 
                while( $qry->have_posts() ){ 
                    $qry->the_post(); ?>
                    <div class="post">
        				<div class="img-holder">
        					<a href="<?php the_permalink(); ?>">
                            <?php
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'blossom-feminine-related' );
                                }else{ 
                                    blossom_feminine_get_fallback_svg( 'blossom-feminine-related' );
                                }
                            ?>
                            </a>
        					<div class="text-holder">
        						<?php
                                    blossom_feminine_categories();
                                    the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
                                ?>
        					</div>
        				</div>
        			</div>
        			<?php 
                }
                ?>
    		</div>
    	</div>
        <?php
        }
        wp_reset_postdata();  
    }
}
endif;
add_action( 'blossom_feminine_after_post_content', 'blossom_feminine_related_posts', 30 );

if( ! function_exists( 'blossom_feminine_comment' ) ) :
/**
 * Comments 
*/
function blossom_feminine_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
	if ( !( get_theme_mod( 'ed_comments', false ) ) && ( comments_open() || get_comments_number() ) ) :
		comments_template();
	endif;
}
endif;
add_action( 'blossom_feminine_after_post_content', 'blossom_feminine_comment', 35 );
add_action( 'blossom_feminine_after_page_content', 'blossom_feminine_comment' );

if( ! function_exists( 'blossom_feminine_content_end' ) ) :
/**
 * Content End
*/
function blossom_feminine_content_end(){ ?>
            </div><!-- .row/not-found -->
        </div><!-- #content -->
        <?php
        /**
         * @hooked blossom_feminine_newsletter 
        */
        if( ! is_single() ) do_action( 'blossom_feminine_newsletter' );
        ?>
    </div><!-- .container/.main-content -->
    <?php
}
endif;
add_action( 'blossom_feminine_before_footer', 'blossom_feminine_content_end', 20 );

if( ! function_exists( 'blossom_feminine_newsletter' ) ) :
/**
 * Blossom Newsletter
*/
function blossom_feminine_newsletter(){
    if( blossom_feminine_is_btnw_activated() ){
        $ed_newsletter = get_theme_mod( 'ed_newsletter', false );
        $newsletter = get_theme_mod( 'newsletter_shortcode' );
        if( $ed_newsletter && has_shortcode( $newsletter, 'BTEN' ) ){
            echo '<div class="content-newsletter">';
            echo do_shortcode( $newsletter );   
            echo '</div>';            
        }
    }
}
endif;
add_action( 'blossom_feminine_newsletter', 'blossom_feminine_newsletter' );
add_action( 'blossom_feminine_after_post_content', 'blossom_feminine_newsletter', 20 );

if( ! function_exists( 'blossom_feminine_instagram_gallery' ) ) :
/**
 * Instagram Gallery
*/
function blossom_feminine_instagram_gallery(){

    $ed_instagram = get_theme_mod( 'ed_instagram', false );
    $insta_code   = get_theme_mod('instagram_shortcode', '[instagram-feed]' );
    if( $ed_instagram ){
        echo '<div class="content-instagram">';
        echo do_shortcode( $insta_code );
        echo '</div>';    
    }
}
endif;
add_action( 'blossom_feminine_footer', 'blossom_feminine_instagram_gallery', 15 );

if( ! function_exists( 'blossom_feminine_footer_start' ) ) :
/**
 * Footer Start
*/
function blossom_feminine_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'blossom_feminine_footer', 'blossom_feminine_footer_start', 20 );

if( ! function_exists( 'blossom_feminine_footer_top' ) ) :
/**
 * Footer Top
*/
function blossom_feminine_footer_top(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
    $active_sidebars = array();
    $sidebar_count   = 0;
    
    foreach ( $footer_sidebars as $sidebar ) {
        if( is_active_sidebar( $sidebar ) ){
            array_push( $active_sidebars, $sidebar );
            $sidebar_count++ ;
        }
    } 
    
    if( $active_sidebars ){ ?>

    <div class="footer-t">
		<div class="container">
			<div class="row column-<?php echo esc_attr( $sidebar_count ); ?>">
            <?php foreach( $active_sidebars as $active ){ ?>
                <div class="col">
                   <?php dynamic_sidebar( $active ); ?> 
                </div>
            <?php } ?>
            </div>
		</div>
	</div>
    <?php 
    }   
}
endif;
add_action( 'blossom_feminine_footer', 'blossom_feminine_footer_top', 30 );

if( ! function_exists( 'blossom_feminine_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function blossom_feminine_footer_bottom(){ ?>
    <div class="site-info">
		<div class="container">
			<?php
                blossom_feminine_get_footer_copyright();
                esc_html_e( 'Blossom Feminine | Developed By ', 'blossom-feminine' );
                echo '<a href="' . esc_url( 'https://blossomthemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Blossom Themes', 'blossom-feminine' ) . '</a>.';
                
                printf( esc_html__( ' Powered by %s', 'blossom-feminine' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'blossom-feminine' ) ) .'" target="_blank">WordPress</a>.' );
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>                    
		</div>
	</div>
    <?php
}
endif;
add_action( 'blossom_feminine_footer', 'blossom_feminine_footer_bottom', 40 );

if( ! function_exists( 'blossom_feminine_footer_end' ) ) :
/**
 * Footer End 
*/
function blossom_feminine_footer_end(){
    ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'blossom_feminine_footer', 'blossom_feminine_footer_end', 50 );

if( ! function_exists( 'blossom_feminine_back_to_top' ) ) :
/**
 * Back to top
*/
function blossom_feminine_back_to_top(){ ?>
    <button aria-label="<?php esc_attr_e( 'go to top button', 'blossom-feminine' ); ?>" id="blossom-top">
		<span><i class="fa fa-angle-up"></i><?php esc_html_e( 'TOP', 'blossom-feminine' ); ?></span>
	</button>
    <?php
}
endif;
add_action( 'blossom_feminine_after_footer', 'blossom_feminine_back_to_top', 15 );

if( ! function_exists( 'blossom_feminine_page_end' ) ) :
/**
 * Page End
*/
function blossom_feminine_page_end(){
    ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'blossom_feminine_after_footer', 'blossom_feminine_page_end', 20 );

if( ! function_exists( 'blossom_feminine_get_page_template_url' ) ) :
/**
 * Returns page template url if not found returns home page url
*/
function blossom_feminine_get_page_template_url( $page_template ){
    $args = array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => $page_template,
        'post_type'  => 'page',
        'fields'     => 'ids',
    );
    
    $posts_array = get_posts( $args );
    
    $url = ( $posts_array ) ? get_permalink( $posts_array[0] ) : get_permalink( get_option( 'page_on_front' ) );
    return $url;    
}
endif;