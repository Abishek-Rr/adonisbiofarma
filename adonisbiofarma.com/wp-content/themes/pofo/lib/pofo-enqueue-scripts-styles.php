<?php
/**
 * Theme Register Style Js.
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    /*
	 * Enqueue scripts and styles in gutenberg blog.
	 */
	if( ! function_exists( 'pofo_gutenberg_block_editor_assets' ) ) :
		function pofo_gutenberg_block_editor_assets() {

			/* Google Fonts */
			wp_enqueue_style( 'pofo-google-font', pofo_enqueue_fonts_url(), null, null );
		}
	endif;
	add_action( 'enqueue_block_editor_assets', 'pofo_gutenberg_block_editor_assets' );

	/*
	 * Enqueue scripts and styles.
	 */
	if( ! function_exists( 'pofo_register_style_js' ) ) {
		function pofo_register_style_js() {

			/*
			 * Load Pofo theme main and other required stylesheets.
			 */
			$pofo_header_mobile_menu_breakpoint = get_theme_mod( 'pofo_header_mobile_menu_breakpoint', '' );
			$pofo_header_mobile_menu_breakpoint = ! empty( $pofo_header_mobile_menu_breakpoint ) ? $pofo_header_mobile_menu_breakpoint : '991';
			$pofo_popup_video_disable = get_theme_mod( 'pofo_popup_video_disable','700' );

			/* Google Fonts */
			wp_enqueue_style( 'pofo-google-font', pofo_enqueue_fonts_url(), null, null );

			/* Adobe Fonts */
			wp_enqueue_style( 'pofo-adobe-font', pofo_enqueue_abobe_fonts_url(), null, null );

		    /* To remove other plugin Font Awesome icon */
			wp_deregister_style( 'font-awesome' );
			wp_dequeue_style( 'font-awesome' );

			wp_register_style( 'animate', POFO_THEME_CSS_URI . '/animate.min.css', null, '3.5.2' );
			wp_register_style( 'bootstrap', POFO_THEME_CSS_URI . '/bootstrap.min.css', null, '3.3.6' );
			wp_register_style( 'et-line-icons', POFO_THEME_CSS_URI . '/et-line-icons.css', null, POFO_THEME_VERSION );
			wp_register_style( 'font-awesome', POFO_THEME_CSS_URI . '/font-awesome.min.css', null, '5.14.0' );
			wp_register_style( 'themify-icons', POFO_THEME_CSS_URI . '/themify-icons.css', null, POFO_THEME_VERSION );
			wp_register_style( 'swiper', POFO_THEME_CSS_URI . '/swiper.min.css', null, '3.4.2' );
			wp_register_style( 'justified-gallery', POFO_THEME_CSS_URI . '/justifiedGallery.min.css', null, '3.6.3' );
			wp_register_style( 'magnific-popup', POFO_THEME_CSS_URI . '/magnific-popup.css', null, POFO_THEME_VERSION );
			wp_register_style( 'bootsnav', POFO_THEME_CSS_URI . '/bootsnav.css', null, '1.1' );
			wp_register_style( 'select2', POFO_THEME_CSS_URI . '/select2.min.css', null, '4.0.4' );

			wp_enqueue_style( 'animate' );
			wp_enqueue_style( 'bootstrap' );
			wp_enqueue_style( 'et-line-icons' );
			wp_enqueue_style( 'font-awesome' );
			wp_enqueue_style( 'themify-icons' );
			wp_enqueue_style( 'swiper' );
			wp_enqueue_style( 'justified-gallery' );
			wp_enqueue_style( 'magnific-popup' );
			wp_enqueue_style( 'bootsnav' );
			wp_enqueue_style( 'select2' );
			wp_enqueue_style( 'js_composer_front' );
			/*
			 * Load Pofo theme main and other required jquery files.
			 */

			/* To hide/show page scrolling effect */
			$pofo_disable_page_scrolling_effect = get_theme_mod( 'pofo_disable_page_scrolling_effect', '0' );

			wp_register_script( 'modernizr', POFO_THEME_JS_URI.'/modernizr.js', array( 'jquery' ), '2.8.3', true);
			wp_register_script( 'bootstrap', POFO_THEME_JS_URI.'/bootstrap.min.js', array( 'jquery' ), '3.3.6', true);
			wp_register_script( 'jquery-easing', POFO_THEME_JS_URI.'/jquery.easing.1.3.js', array( 'jquery' ), '1.3', true);
			wp_register_script( 'skrollr', POFO_THEME_JS_URI.'/skrollr.min.js', array( 'jquery' ), '1.3', true);
			wp_register_script( 'smooth-scroll', POFO_THEME_JS_URI.'/smooth-scroll.js', array( 'jquery' ), '2.2.0', true);
			wp_register_script( 'jquery-appear', POFO_THEME_JS_URI.'/jquery.appear.js', array( 'jquery' ), '0.3.6', true);
			wp_register_script( 'bootsnav', POFO_THEME_JS_URI.'/bootsnav.js', array( 'jquery' ), '1.2', true);
			wp_register_script( 'jquery-nav', POFO_THEME_JS_URI.'/jquery.nav.js', array( 'jquery' ), '3.0.0', true );
			wp_register_script( 'wow', POFO_THEME_JS_URI.'/wow.min.js', array( 'jquery' ), '1.0.3', true );
			wp_register_script( 'page-scroll', POFO_THEME_JS_URI.'/page-scroll.js', array( 'jquery' ), '1.4.9', true );
			wp_register_script( 'swiper', POFO_THEME_JS_URI.'/swiper.min.js', array( 'jquery' ), '3.4.2', true );
			wp_register_script( 'jquery-count-to', POFO_THEME_JS_URI.'/jquery.count-to.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'jquery-stellar', POFO_THEME_JS_URI.'/jquery.stellar.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'jquery-magnific-popup', POFO_THEME_JS_URI.'/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
			wp_register_script( 'isotope', POFO_THEME_JS_URI.'/isotope.pkgd.min.js', array( 'jquery' ), '3.0.4', true );
			wp_register_script( 'imagesloaded', POFO_THEME_JS_URI.'/imagesloaded.pkgd.min.js', array( 'jquery' ), '3.1.8', true );
			wp_register_script( 'classie', POFO_THEME_JS_URI.'/classie.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'hamburger-menu', POFO_THEME_JS_URI.'/hamburger-menu.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'jquery.countdown', POFO_THEME_JS_URI.'/jquery.countdown.min.js', array( 'jquery' ), '2.2.0', true );
			wp_register_script( 'jquery-fitvids', POFO_THEME_JS_URI.'/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
			wp_register_script( 'equalize', POFO_THEME_JS_URI.'/equalize.min.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'skill-bars-jquery', POFO_THEME_JS_URI.'/skill.bars.jquery.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'jquery-justifiedGallery', POFO_THEME_JS_URI.'/jquery.justifiedGallery.min.js', array( 'jquery' ), '3.6.3', true );
			wp_register_script( 'jquery-easypiechart', POFO_THEME_JS_URI.'/jquery.easypiechart.min.js', array( 'jquery' ), '2.1.7', true );
			wp_register_script( 'infinite-scroll-jquery', POFO_THEME_JS_URI.'/infinite-scroll.js', array( 'jquery' ), '2.1.0', true );
			wp_register_script( 'background-srcset', POFO_THEME_JS_URI.'/background-srcset.js', array( 'jquery' ), '2.1.0', true );
			wp_register_script( 'pofo-main', POFO_THEME_JS_URI.'/main.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			
			wp_enqueue_script( 'modernizr' );
		    wp_enqueue_script( 'bootstrap' );
		    wp_enqueue_script( 'jquery-easing' );
		    wp_enqueue_script( 'skrollr' );
		    wp_enqueue_script( 'smooth-scroll' );
		    wp_enqueue_script( 'jquery-appear' );
			wp_enqueue_script( 'bootsnav' );
		    wp_enqueue_script( 'jquery-nav' );
		    wp_enqueue_script( 'wow' );

		    if( $pofo_disable_page_scrolling_effect == 1 ) {
		    	wp_enqueue_script( 'page-scroll' );
		    }

			wp_enqueue_script( 'swiper' );
			wp_enqueue_script( 'jquery-count-to' );
			wp_enqueue_script( 'jquery-stellar' );
		    wp_enqueue_script( 'jquery-magnific-popup' );
		    wp_enqueue_script( 'isotope' );
		    wp_enqueue_script( 'imagesloaded' );
		    wp_enqueue_script( 'classie' );
		    wp_enqueue_script( 'hamburger-menu' );
		    wp_enqueue_script( 'jquery.countdown' );
		    wp_enqueue_script( 'jquery-fitvids' );
			wp_enqueue_script( 'equalize' );
		    wp_enqueue_script( 'skill-bars-jquery' );
		    wp_enqueue_script( 'jquery-justifiedGallery' );
		    wp_enqueue_script( 'jquery-easypiechart' );
		    wp_enqueue_script( 'infinite-scroll-jquery' );
		    wp_enqueue_script( 'background-srcset');
		    wp_enqueue_script( 'pofo-main' );

			// Load the html5 shiv.
			wp_enqueue_script( 'pofo-html5', POFO_THEME_JS_URI.'/html5shiv.js', array( 'jquery' ), '3.7.3' );
			wp_script_add_data( 'pofo-html5', 'conditional', 'lt IE 9' );

			/*
			 * Defind ajaxurl and wp_localize
			 */
			$mobileanimation = apply_filters( 'pofo_mobile_animation', false );
			wp_localize_script( 'pofo-main', 'pofoMain', array( 
					'ajaxurl' 					=> admin_url( 'admin-ajax.php' ),
					'theme_url' 				=> POFO_THEME_URI,
					'loading_image' 			=> POFO_THEME_IMAGES_URI.'/spin.gif',
					'menu_breakpoint' 			=> $pofo_header_mobile_menu_breakpoint,
					'mobileAnimation' 			=> $mobileanimation,
					'pofo_popup_video_disable' 	=> $pofo_popup_video_disable,
					'message' 					=> esc_attr__( 'All Post Loaded', 'pofo' ),
					'site_id' 					=> ( is_multisite() ) ? '-'.get_current_blog_id() : '',
				)
			);

			if ( is_singular() && ( comments_open() || get_comments_number() ) && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
	}
	add_action( 'wp_enqueue_scripts', 'pofo_register_style_js', 9 );

	/*
	 * Load pofo customizer script.
	 */

	if( ! function_exists( 'pofo_customizer_scripts_preview' ) ) {
		function pofo_customizer_scripts_preview() {
		   wp_enqueue_script( 'pofo-customizer-script', POFO_THEME_ADMIN_JS_URI.'/pofo-customizer.js', array( 'jquery','customize-preview' ) );
		}
	}
	add_action( 'customize_preview_init','pofo_customizer_scripts_preview' );

	/*
	 * Load theme admin css and script.
	 */

	if( ! function_exists( 'pofo_admin_custom_scripts' ) ) {
		function pofo_admin_custom_scripts() {

			global $pagenow, $wp_version;;

			// admin css
			if ( $wp_version >= '5.3' ) {
				wp_register_style( 'pofo-latest-backend.css', POFO_THEME_ADMIN_CSS_URI . '/pofo-latest-backend.css', null, POFO_THEME_VERSION );
				wp_enqueue_style( 'pofo-latest-backend.css' );
			}
			
			if( is_admin() && ( $pagenow=='post-new.php' || $pagenow=='post.php' ) ) {
				wp_register_style( 'pofo-admin-metabox-css', POFO_ADDONS_ROOT_DIR.'/meta-box/css/meta-box.css',null, '1.0' );
				wp_enqueue_style( 'pofo-admin-metabox-css' );
			}			

		    /* To remove other plugin Font Awesome icon */
			wp_deregister_style( 'font-awesome' );
			wp_dequeue_style( 'font-awesome' );

			wp_register_style( 'et-line-icons', POFO_THEME_CSS_URI . '/et-line-icons.css', null, POFO_THEME_VERSION );
			wp_register_style( 'themify-icons', POFO_THEME_CSS_URI . '/themify-icons.css', null, POFO_THEME_VERSION );
			wp_register_style( 'font-awesome', POFO_THEME_CSS_URI . '/font-awesome.min.css', null, '5.14.0' );
			wp_register_style( 'select2', POFO_THEME_CSS_URI . '/select2.min.css', null, '4.0.4' );
			wp_register_style( 'pofo-admin-custom-style', POFO_THEME_ADMIN_CSS_URI . '/pofo-admin-custom.css', null, POFO_THEME_VERSION);
			wp_register_style( 'pofo-admin-gutenberg', POFO_THEME_ADMIN_CSS_URI . '/admin-gutenberg.css', null, POFO_THEME_VERSION);

			wp_register_script( 'select2', POFO_THEME_ADMIN_JS_URI . '/select2.js', array( 'jquery' ), '4.0.3', true);
			wp_register_script( 'pofo-admin-custom-script', POFO_THEME_ADMIN_JS_URI . '/pofo-admin-custom.js', array( 'jquery' ), POFO_THEME_VERSION, true);
			wp_register_script( 'pofo-admin-custom-customizer-control', POFO_THEME_ADMIN_JS_URI . '/pofo-customizer-control.js', array( 'jquery' ), POFO_THEME_VERSION, true);

			wp_enqueue_media();
			wp_enqueue_style( 'et-line-icons' );
			wp_enqueue_style( 'themify-icons' );
			wp_enqueue_style( 'font-awesome' );
			wp_enqueue_style( 'select2' );
			wp_enqueue_style( 'pofo-admin-custom-style' );
			wp_enqueue_style( 'pofo-admin-gutenberg' );

			wp_enqueue_script( 'select2' );
			wp_enqueue_script( 'pofo-admin-custom-script' );
			wp_enqueue_script( 'pofo-admin-custom-customizer-control' );

			wp_localize_script( 'pofo-admin-custom-customizer-control', 'pofoadmin',
				array( 
					'remove_button_text'=> esc_attr__( 'Remove', 'pofo' ),
					'fontNameText'		=> esc_html__( 'Font name', 'pofo' ),
					'woff2Text'			=> esc_html__( 'WOFF2', 'pofo' ),
					'woffText'			=> esc_html__( 'WOFF', 'pofo' ),
					'ttfText'			=> esc_html__( 'TTF', 'pofo' ),
					'eotText'			=> esc_html__( 'EOT', 'pofo' ),
					'removeFontText'	=> esc_html__( 'Remove font', 'pofo' )
				)
			);
			wp_localize_script( 'pofo-admin-custom-script', 'pofo_licence_messages', array( 'response_failed' => esc_attr__( 'Failed to get response from server. Please try again.', 'pofo' ) ) );
		}
	}
	add_action( 'admin_enqueue_scripts', 'pofo_admin_custom_scripts' );

	//vc_frontend_editor_enqueue_js_css
	if ( ! function_exists( 'pofo_vc_frontend_editor_enqueue_js_css' ) ) {
		function pofo_vc_frontend_editor_enqueue_js_css() {
			wp_register_script( 'swiper', POFO_THEME_JS_URI.'/swiper.min.js', array( 'jquery' ), '3.4.2', true );
			wp_enqueue_script( 'swiper' );
		}
	}
	add_action( 'vc_frontend_editor_enqueue_js_css', 'pofo_vc_frontend_editor_enqueue_js_css' );

	if( ! function_exists( 'pofo_load_vc_iframe_js' ) ) {
		function pofo_load_vc_iframe_js() {

			wp_register_style( 'pofo-admin-metabox-css', POFO_ADDONS_ROOT_DIR.'/meta-box/css/meta-box.css',null, '1.0' );
		   	wp_enqueue_style( 'pofo-admin-metabox-css' );

			wp_register_script( 'modernizr1', POFO_THEME_JS_URI.'/modernizr.js', array( 'jquery' ), '2.8.3', true);
			wp_register_script( 'bootstrap1', POFO_THEME_JS_URI.'/bootstrap.min.js', array( 'jquery' ), '3.3.6', true);
			wp_register_script( 'jquery-easing1', POFO_THEME_JS_URI.'/jquery.easing.1.3.js', array( 'jquery' ), '1.3', true);
			wp_register_script( 'skrollr1', POFO_THEME_JS_URI.'/skrollr.min.js', array( 'jquery' ), '1.3', true);
			wp_register_script( 'smooth-scroll1', POFO_THEME_JS_URI.'/smooth-scroll.js', array( 'jquery' ), '2.2.0', true);
			wp_register_script( 'jquery-appear1', POFO_THEME_JS_URI.'/jquery.appear.js', array( 'jquery' ), '0.3.6', true);
			wp_register_script( 'bootsnav1', POFO_THEME_JS_URI.'/bootsnav.js', array( 'jquery' ), '1.2', true);
			wp_register_script( 'jquery-nav1', POFO_THEME_JS_URI.'/jquery.nav.js', array( 'jquery' ), '3.0.0', true );
			wp_register_script( 'wow1', POFO_THEME_JS_URI.'/wow.min.js', array( 'jquery' ), '1.0.3', true );
			wp_register_script( 'page-scroll1', POFO_THEME_JS_URI.'/page-scroll.js', array( 'jquery' ), '1.2.1', true );
			wp_register_script( 'swiper1', POFO_THEME_JS_URI.'/swiper.min.js', array( 'jquery' ), '3.4.1', true );
			wp_register_script( 'jquery-count-to1', POFO_THEME_JS_URI.'/jquery.count-to.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'jquery-stellar1', POFO_THEME_JS_URI.'/jquery.stellar.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'jquery-magnific-popup1', POFO_THEME_JS_URI.'/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'isotope1', POFO_THEME_JS_URI.'/isotope.pkgd.min.js', array( 'jquery' ), '3.0.4', true );
			wp_register_script( 'imagesloaded1', POFO_THEME_JS_URI.'/imagesloaded.pkgd.min.js', array( 'jquery' ), '3.1.8', true );
			wp_register_script( 'classie1', POFO_THEME_JS_URI.'/classie.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'hamburger-menu1', POFO_THEME_JS_URI.'/hamburger-menu.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'counter1', POFO_THEME_JS_URI.'/jquery.countdown.min.js', array( 'jquery' ), '2.2.0', true );
			wp_register_script( 'jquery-fitvids1', POFO_THEME_JS_URI.'/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
			wp_register_script( 'equalize1', POFO_THEME_JS_URI.'/equalize.min.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'skill-bars-jquery1', POFO_THEME_JS_URI.'/skill.bars.jquery.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			wp_register_script( 'jquery-justifiedGallery1', POFO_THEME_JS_URI.'/jquery.justifiedGallery.min.js', array( 'jquery' ), '3.6.3', true );
			wp_register_script( 'jquery-easypiechart1', POFO_THEME_JS_URI.'/jquery.easypiechart.min.js', array( 'jquery' ), '2.1.7', true );
			wp_register_script( 'pofo-main1', POFO_THEME_JS_URI.'/main.js', array( 'jquery' ), POFO_THEME_VERSION, true );
			
			wp_enqueue_script( 'modernizr1' );
		    wp_enqueue_script( 'bootstrap1' );
		    wp_enqueue_script( 'jquery-easing1' );
		    wp_enqueue_script( 'skrollr1' );
		    wp_enqueue_script( 'smooth-scroll1' );
		    wp_enqueue_script( 'jquery-appear1' );
			wp_enqueue_script( 'bootsnav1' );
		    wp_enqueue_script( 'jquery-nav1' );
		    wp_enqueue_script( 'wow1' );
		    wp_enqueue_script( 'page-scroll1' );
			wp_enqueue_script( 'swiper1' );
			wp_enqueue_script( 'jquery-count-to1' );
			wp_enqueue_script( 'jquery-stellar1' );
		    wp_enqueue_script( 'jquery-magnific-popup1' );
		    wp_enqueue_script( 'isotope1' );
		    wp_enqueue_script( 'imagesloaded1' );
		    wp_enqueue_script( 'classie1' );
		    wp_enqueue_script( 'hamburger-menu1' );
		    wp_enqueue_script( 'counter1' );
		    wp_enqueue_script( 'jquery-fitvids1' );
			wp_enqueue_script( 'equalize1' );
		    wp_enqueue_script( 'skill-bars-jquery1' );
		    wp_enqueue_script( 'jquery-justifiedGallery1' );
		    wp_enqueue_script( 'jquery-easypiechart1' );
		    wp_enqueue_script( 'pofo-main1' );
		}
	}
	add_action( 'vc_load_iframe_jscss', 'pofo_load_vc_iframe_js' );