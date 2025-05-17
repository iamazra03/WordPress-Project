<?php 
/**
 * New React Dashboard page
 * 
 * @package Blossom Feminine
 */

/**
 * Init Admin Menu.
 *
 * @return void
 */
function blossom_feminine_dashboard_menu() { 
    add_theme_page(
		BLOSSOM_FEMININE_THEME_NAME,
		BLOSSOM_FEMININE_THEME_NAME,
		'manage_options',
		'blossom-feminine-dashboard',
		'blossom_feminine_dashboard_page'
	);
}
add_action( 'admin_menu', 'blossom_feminine_dashboard_menu' );

/**
 * Callback function for React Dashboard Admin Page.
 * 
 * @return void
 */
function blossom_feminine_dashboard_page() { ?>
    <div id="cw-dashboard" class="cw-dashboard"></div>
    <?php
}

/**
 * Enqueue scripts and styles for admin scripts.
 * 
 * @return void
 */
function blossom_feminine_dashboard_scripts() {

    $admin_page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : null;

    if( $admin_page === 'blossom-feminine-dashboard' ){
        $dependencies_file_path = get_template_directory() . '/build/dashboard.asset.php';
        if ( file_exists( $dependencies_file_path ) ) {
            $dashboard_assets  = require $dependencies_file_path;
            $js_dependencies   = ( ! empty( $dashboard_assets['dependencies'] ) ) ? $dashboard_assets['dependencies'] : [];
            $version           = ( ! empty( $dashboard_assets['version'] ) ) ? $dashboard_assets['version'] : '2.0.0';
            $js_dependencies[] = 'updates';

            wp_enqueue_script(
                'blossom-feminine-react-dashboard',
                get_template_directory_uri() . '/build/dashboard.js',
                $js_dependencies,
                $version,
                true
            );

             // Add Translation support for Dashboard 
             wp_set_script_translations( 'blossom-feminine-react-dashboard', 'blossom-feminine' );

            $arrayargs = [
                'ajax_url'           => esc_url( admin_url( 'admin-ajax.php' ) ),
                'theme_version'      => BLOSSOM_FEMININE_THEME_VERSION,
                'nonce'              => wp_create_nonce( 'blossom_feminine_dashboard_nonce' ),
                'inactivePlugins'    => blossom_feminine_get_inactive_plugins(),
                'activePlugins'      => blossom_feminine_get_active_plugins(),
                'review'             => esc_url('https://wordpress.org/support/theme/blossom-feminine/reviews/'),
                'docmentation'       => esc_url('https://docs.blossomthemes.com/docs/blossom-feminine/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=docs'),
                'support'            => esc_url('https://blossomthemes.com/support-ticket/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=support'),
                'videotutorial'      => esc_url('https://www.youtube.com/@BlossomThemes'),
                'get_pro'            => esc_url('https://blossomthemes.com/wordpress-themes/blossom-feminine-pro/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=upgrade_to_pro'),
                'website'            => esc_url('https://blossomthemes.com/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=website_visit'),
                'theme_club_upgrade' => esc_url('https://blossomthemes.com/theme-club/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=theme_club'),
                'sales_funnel'       => esc_url('https://blossomthemes.com/sales-funnel/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=sales_funnel'),
                'custom_fonts'       => esc_url('https://blossomthemes.com/wordpress-themes/wp-custom-fonts/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=wp_custom_fonts'),
                'vip_site_care'      => esc_url('https://blossomthemes.com/vip-sitecare/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=vip_sitecare'),
                'theme_install'      => esc_url('https://blossomthemes.com/wordpress-themes/theme-installation-and-setup/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=theme_install'),  
                'plugin_setup'       => esc_url('https://blossomthemes.com/wordpress-themes/must-have-plugins/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=plugin_setup'),  
                'seo_setup'          => esc_url('https://blossomthemes.com/wordpress-themes/must-have-seo-setup/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=seo_setup'),  
                'gdpr_setup'         => esc_url('https://blossomthemes.com/wordpress-themes/gdpr-compliance/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=gdpr_setup'),
                'vip_support'        => esc_url('https://blossomthemes.com/wordpress-themes/vip-support/?utm_source=blossom_feminine&utm_medium=dashboard&utm_campaign=vip_support'),    
                'customizer_url'     => esc_url( admin_url( 'customize.php' ) ),
                'custom_logo'        => esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ),
                'colors'             => esc_url( admin_url( 'customize.php?autofocus[section]=colors' ) ),
                'layout'             => esc_url( admin_url( 'customize.php?autofocus[panel]=layout_settings' ) ),
                'general'            => esc_url( admin_url( 'customize.php?autofocus[panel]=general_settings' ) ),
                'instagram'          => esc_url( admin_url( 'customize.php?autofocus[section]=instagram_settings' ) ),
                'footer'             => esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings' ) ),
            ];

            wp_localize_script( 'blossom-feminine-react-dashboard','cw_dashboard',$arrayargs );
        }
        wp_enqueue_style( 'blossom-feminine-react-dashboard', get_template_directory_uri() . '/build/dashboard.css' );
    }
}
add_action( 'admin_enqueue_scripts', 'blossom_feminine_dashboard_scripts' );

/**
 * Get the inactive plugins.
 *
 * @return array
 */
function blossom_feminine_get_inactive_plugins() {
    if (!current_user_can('install_plugins') && !current_user_can('activate_plugins')) {
        return new \WP_Error( 'rest_forbidden', esc_html__( 'Sorry, you are not allowed to do that.', 'blossom-feminine' ), array( 'status' => 403 ) );
    }

    // Get the list of all installed plugins
    $all_plugins = get_plugins();

    // Fetch the row from the options table containing active plugins
    $active_plugins_option = get_option('active_plugins');

    // Unserialize the active plugins data
    $active_plugins = is_array($active_plugins_option) ? $active_plugins_option : [];

    // Get the slugs of active plugins
    $active_plugin_slugs = array_map(function($plugin) {
        return plugin_basename($plugin);
    }, $active_plugins);

    // Get the slugs of inactive plugins
    $inactive_plugin_slugs = array_diff(array_keys($all_plugins), $active_plugin_slugs);

    // Get the details of inactive plugins
    $inactive_plugins = array_intersect_key($all_plugins, array_flip($inactive_plugin_slugs));

    // Initialize an empty array to hold the modified inactive plugins
    $modified_inactive_plugins = array();
    // Iterate over each inactive plugin
    foreach ($inactive_plugins as $key => $plugin_data) {
        $extract = explode( '/', $key );
        // Extract the necessary information
        $name = $plugin_data['Name'];
        $slug = $extract[0];

        // Add the plugin to the modified array
        $modified_inactive_plugins[] = array(
            'name' => esc_html( $name ),
            'slug' => sanitize_title( $slug ),
            'url'  => blossom_feminine_get_activation_url($slug)
        );
    }

    // Return the modified array
    return $modified_inactive_plugins;
}

/**
 * Get the activation URL for a plugin.
 *
 * @param string $plugin_slug The plugin slug.
 *
 * @return string|bool The activation URL if the plugin exists, false otherwise.
 */
function blossom_feminine_get_activation_url($plugin_slug) {
    if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin_slug ) ) {
        $plugins = get_plugins( '/' . $plugin_slug );
        if ( ! empty( $plugins ) ) {
            $keys        = array_keys( $plugins );
            $plugin_file = $plugin_slug . '/' . $keys[0];
            $url         = wp_nonce_url(
                add_query_arg(
                    array(
                        'action' => 'activate',
                        'plugin' => $plugin_file,
                    ),
                    admin_url( 'plugins.php' )
                ),
                'activate-plugin_' . $plugin_file
            );
            return $url;
        }
    }
    return false;
}

/**
 * Get the active plugins.
 *
 * @return array
 */
function blossom_feminine_get_active_plugins() {
    $active_plugins = get_plugins();
    $plugins = array();

    foreach ($active_plugins as $key => $plugin) {
        if ( is_plugin_active( $key ) ) {
            $extract = explode( '/', $key );
            $path    = ABSPATH . 'wp-content/plugins/' . $key;
            $plugin_data = get_plugin_data($path);
            $plugins[] = array(
                'name'    => esc_html( $plugin_data['Name']),
                'slug'    => sanitize_title($extract[0]),
                'version' =>  esc_html($plugin_data['Version']),
            );
        }
    }

    return $plugins;
}