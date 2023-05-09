<?php
/*
Plugin Name: Pofo Addons
Plugin URI: http://www.themezaa.com
Description: A part of Pofo theme
Version: 1.3.2
Author: Themezaa Team
Author URI: http://www.themezaa.com
Text Domain: pofo-addons
*/
?>
<?php

/**
 * Defind Class 
 */
defined( 'POFO_ADDONS_ROOT' ) or define( 'POFO_ADDONS_ROOT', dirname(__FILE__) );
defined( 'POFO_ADDONS_IMPORT' ) or define( 'POFO_ADDONS_IMPORT', plugin_dir_path( __FILE__ ) . 'importer' );
defined( 'POFO_ADDONS_CUSTOM_POST_TYPE' ) or define( 'POFO_ADDONS_CUSTOM_POST_TYPE', dirname(__FILE__) . '/custom-post-type' );
defined( 'POFO_ADDONS_ROOT_DIR' ) or define( 'POFO_ADDONS_ROOT_DIR', plugins_url() . '/pofo-addons' );
defined( 'POFO_ADDONS_IMPORTER_SAMPLE_DATA_URI' ) or define( 'POFO_ADDONS_IMPORTER_SAMPLE_DATA_URI', plugins_url() . '/pofo-addons/importer/sample-data' );
defined( 'POFO_ADDONS_IMPORTER_SAMPLE_DATA' ) or define( 'POFO_ADDONS_IMPORTER_SAMPLE_DATA', plugin_dir_path( __FILE__ ) . '/importer/sample-data' );

if( ! function_exists( 'pofo_addons_load_textdomain' ) ) {

    function pofo_addons_load_textdomain() {

        load_plugin_textdomain( 'pofo-addons', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
    }
}
add_action( 'init', 'pofo_addons_load_textdomain' );

if( ! class_exists('Pofo_Addons') ) {

    class Pofo_Addons {

        // Construct
        public function __construct() {

            add_action( 'plugins_loaded', array( $this,'pofo_addons_plugins_loaded' ) );
            add_action( 'setup_theme', array( $this,'pofo_addons_register_custom_post_type' ) );

            add_action( 'admin_menu', array( $this, 'pofo_demo_import_page' ) );
            add_action( 'admin_init', array( $this, 'pofo_addons_import' ) );

            /* For auto update notice */
            add_action( 'admin_init', array( $this, 'pofo_activate_addons_auto_update_notice' ) );

            /* For Customizer */
            add_action( 'customize_register', array( $this, 'pofo_addons_add_customizer_sections' ), 99 );

            /* Vc pofo Templates */            
            add_action( 'vc_after_init_vc', array( $this, 'pofo_addons_vc_templates' ) );

            require_once( POFO_ADDONS_ROOT.'/pofo-excerpt.php' );
            require_once( POFO_ADDONS_ROOT.'/pofo-extra-functions.php' );
            require_once( POFO_ADDONS_ROOT.'/pofo-font-icon-list.php' );
            require_once( POFO_ADDONS_ROOT.'/pofo-shortcodes/pofo-shortcode-addons.php' );

            /* For meta box */
            require_once( POFO_ADDONS_ROOT.'/meta-box/meta-box.php' );

            /* For Widgets */
            require_once( POFO_ADDONS_ROOT.'/widgets/pofo-custom-text.php' );
            require_once( POFO_ADDONS_ROOT.'/widgets/pofo-custom-menu-widget.php' );
            require_once( POFO_ADDONS_ROOT.'/widgets/pofo-latest-post.php' );
            require_once( POFO_ADDONS_ROOT.'/widgets/pofo-instagram.php' );
            require_once( POFO_ADDONS_ROOT.'/widgets/pofo-latest-portfolio .php' );
            require_once( POFO_ADDONS_ROOT.'/widgets/pofo-about-me.php' );
            require_once( POFO_ADDONS_ROOT.'/widgets/pofo-social-bar.php' );
            require_once( POFO_ADDONS_ROOT.'/widgets/pofo-portfolio-categories.php' );

            /* For Extend Options */
            require_once( POFO_ADDONS_ROOT.'/extend-options/extend-options.php' );

            /* Load slider scripts */
            add_action( 'wp_footer', array( $this, 'pofo_addons_slider_script' ), 9999 );

            /* IE Compatible meta */
            add_action( 'wp_head', array( $this, 'pofo_addons_wp_head_meta' ), 1 );
        }

        public function pofo_addons_wp_head_meta() {

            if( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {

                echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />';
            }

            $pofo_addressbar_color = get_theme_mod( 'pofo_addressbar_color', '' );
            if( ! empty( $pofo_addressbar_color ) ) {
                
                //this is for Chrome, Firefox OS, Opera
                echo '<meta name="theme-color" content="'.$pofo_addressbar_color.'">';

                //Windows Phone **
                echo '<meta name="msapplication-navbutton-color" content="'.$pofo_addressbar_color.'">';
            }
        }

        /* Plugin updater. */
        public function pofo_activate_addons_auto_update_notice() {

            if( class_exists('Pofo_Addons') ) {

                require_once( POFO_ADDONS_ROOT . '/updater/pofo-addons-auto-update.php' );

                $pofo_addons_version = get_plugin_data( POFO_ADDONS_ROOT.'/pofo-addons.php', $markup = true, $translate = true );
                $pofo_addons_current_version = $pofo_addons_version['Version'];
                $pofo_addons_remote_path = 'http://api.themezaa.com/pofo/update.php';
                $pofo_addons_slug = plugin_basename( __FILE__ );
                new pofo_addons_plugin_update ( $pofo_addons_current_version, $pofo_addons_remote_path, $pofo_addons_slug );
            }
        }

        /* Plugins loaded hook */
        public function pofo_addons_plugins_loaded() {

            require_once( POFO_ADDONS_ROOT.'/pofo-addons-meta.php' );
        }

        /**
         * Load custom post types
         */
        public function pofo_addons_register_custom_post_type() {

            require_once( POFO_ADDONS_CUSTOM_POST_TYPE .'/pofo-theme-portfolio.php'); 
        }

        public function pofo_addons_add_customizer_sections( $wp_customize ) {

            /* Add Social Icons Switch Sections */
            $wp_customize->add_panel( 'pofo_add_social_share_panel', array(
                'title'     => esc_attr__( 'Social Share', 'pofo-addons' ),
                'capability'  => 'manage_options',
            ) );

            /* Add Social Icons Post Panel */
            $wp_customize->add_section( 'pofo_add_social_share_section', array(
                'title'     => esc_attr__( 'Post Single', 'pofo-addons' ),
                'capability'  => 'manage_options',
                'panel'     => 'pofo_add_social_share_panel',
            ) );

            /* Add Social Icons Portfolio Panel */
            $wp_customize->add_section( 'pofo_portfolio_add_social_share_section', array(
                'title'     => esc_attr__( 'Portfolio Single', 'pofo-addons' ),
                'capability'  => 'manage_options',
                'panel'     => 'pofo_add_social_share_panel',
            ) );

            /* if WooCommerce plugin is activated */
            if( class_exists( 'WooCommerce' ) ) {

                /* Add Social Icons Product Panel */
                $wp_customize->add_section( 'pofo_product_add_social_share_section', array(
                    'title'     => esc_attr__( 'Product Single', 'pofo-addons' ),
                    'capability'  => 'manage_options',
                    'panel'     => 'pofo_add_social_share_panel',
                ) );
            }

            // Add Custom Additional JS Section
            $wp_customize->add_section( 'pofo_custom_js_section', array(
                'title'    => __( 'Additional JS', 'pofo-addons' ),
                'priority' => 230,
            ) );

            /* Addtional JS */
            

            $wp_customize->add_setting( 'pofo_custom_js', array(
                'type' => 'option'
            ) );

            $wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'custom_html', array(
                'label'     => __( 'Additional JS', 'pofo-addons' ),
                'code_type' => 'javascript',
                'settings'  => 'pofo_custom_js',
                'section'   => 'pofo_custom_js_section',
                'description' => esc_attr__( 'Only accepts javascript code, wrapped with <script> tags and valid HTML markup inside the </body> tag.', 'pofo-addons' )
            ) ) );

            /* End Addtional Js */

            /* Add General layout Section */
            $wp_customize->add_section( 'pofo_add_under_maintenance_section', array(
                'title'    => esc_attr__( 'Under Maintenance Setting', 'pofo-addons' ),
                'capability' => 'manage_options',
                'panel'       => 'pofo_add_general_panel',
            ) );

            require_once( POFO_ADDONS_ROOT.'/customizer/customizer-control/pofo-post-social-icon.php' );
            require_once( POFO_ADDONS_ROOT.'/customizer/customizer-maps/post-social-share-settings.php' );
            require_once( POFO_ADDONS_ROOT.'/customizer/customizer-maps/under-maintenance-settings.php' );
            require_once( POFO_ADDONS_ROOT.'/customizer/customizer-maps/portfolio-url-slug-settings.php' );
        }

        public function pofo_addons_import() {
            
            global $pagenow;

            wp_register_script( 'pofo-import-script', POFO_ADDONS_ROOT_DIR . '/importer/js/import.js' , array('jquery'), '1.0', true );
            wp_register_style( 'themify-icons', POFO_ADDONS_ROOT_DIR . '/importer/css/themify-icons.css', null );
            wp_register_style( 'pofo-import-style', POFO_ADDONS_ROOT_DIR . '/importer/css/import.css', null );

            if ( is_admin() && ( $pagenow == 'themes.php') && isset( $_GET['page'] ) && $_GET['page'] === 'pofo-demo-import' ) {

                wp_enqueue_script( 'pofo-import-script' );
                wp_enqueue_style( 'themify-icons' );
                wp_enqueue_style( 'pofo-import-style' );

                wp_localize_script( 'pofo-import-script', 'pofo_import_messages', array(
                    'no_single_layout' => esc_attr__( 'Please select an option from the list to import', 'pofo-addons' ),
                    'single_import_conformation' => esc_attr__( 'Are you sure to proceed? It will skip matching items and add new ones.', 'pofo-addons' ),
                    'customizer_import_conformation' => esc_attr__( 'Are you sure to proceed? It will overwrite existing theme customizer settings with demo settings.', 'pofo-addons' ),
                    'menu_import_conformation' => esc_attr__( 'Are you sure to proceed? It will add new items, no matter if that exist or not.', 'pofo-addons' ),
                    'widget_import_conformation' => esc_attr__( 'Are you sure to proceed? It will overwrite existing matching widgets data with demo widget data.', 'pofo-addons' ),
                    'slider_import_conformation' => esc_attr__( 'Are you sure to proceed? It will add new items, no matter if that exist or not.', 'pofo-addons' ),
                    'contact_form_import_conformation' => esc_attr__( 'Are you sure to proceed? It will skip matching items and add new ones.', 'pofo-addons' ),
                    'mailchimp_import_conformation' => esc_attr__( 'Are you sure to proceed? It will skip matching items and add new ones.', 'pofo-addons' ),
                    'media_import_conformation' => esc_attr__( 'Are you sure to proceed?', 'pofo-addons' ),
                    'full_import_conformation' => esc_attr__( 'Are you sure to proceed? It will overwrite existing theme customizer settings and matching widget data and will add all other new data in your WordPress setup.', 'pofo-addons' )
                ) );
            }
            require_once( POFO_ADDONS_IMPORT .'/importer.php');     
        }

        public function pofo_demo_import_page() {

            add_theme_page(
                    __( 'Demo Import', 'pofo-addons' ), // page title
                    __( 'Demo Import', 'pofo-addons' ), // menu title
                    'manage_options',                    // capability
                    'pofo-demo-import',                 // menu slug
                    'pofo_demo_import_callback'         // callback function
            );
        }

        public function pofo_addons_slider_script() {

            global $pofo_slider_script;

            if( ! empty( $pofo_slider_script ) ) {
                ?>
                    <script type="text/javascript"> (function($) { "use strict"; <?php echo $pofo_slider_script; ?> })(jQuery); </script>
                <?php 
            }
        }
        public function pofo_addons_vc_templates() {
            
            require_once( POFO_ADDONS_ROOT.'/pofo-template-library/pofo-templates.php' );
            require_once( POFO_ADDONS_ROOT.'/pofo-template-library/pofo-templates-data-library/pofo-templates-data.php' );
        }

    } // end of class
    
    $Pofo_Addons = new Pofo_Addons();
      
} // end of class_exists
