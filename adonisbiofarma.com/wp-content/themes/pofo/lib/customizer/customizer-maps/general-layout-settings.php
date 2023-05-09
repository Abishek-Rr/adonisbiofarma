<?php

	/* Exit if accessed directly. */
	if ( ! defined( 'ABSPATH' ) ) { exit; }
	
	$args = array(
	   'public'   => true,
	);
	$all_post_type_objs = get_post_types( $args, 'name' );
	$all_post_type = array();
    if( ! empty( $all_post_type_objs ) ) {
		foreach ( $all_post_type_objs as $key => $value ) {

			if( $key != 'attachment' ) {

				$all_post_type[$key] = ! empty( $value->labels ) && ! empty( $value->labels->menu_name ) ? $value->labels->menu_name : $key;
			}
		}
	}

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_custom_sidebar_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_custom_sidebar_separator', array(
	    'label'      		=> esc_attr__( 'Custom Sidebars', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_custom_sidebar_separator',	   
	    'priority'	 		=> 2, 
	) ) );

	/* End Separator Settings */

	/* Custom Sidebars Settings */
	$wp_customize->add_setting( 'pofo_custom_sidebars', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Custom_Sidebars( $wp_customize, 'pofo_custom_sidebars', array(
	    'label'      		=> esc_attr__( 'Manage Sidebars', 'pofo' ),
	    'type'              => 'pofo_custom_sidebar',
	    'description'		=> esc_attr__( 'You can add widgets in these sidebars at Appearance > Widgets and these sidebars can be assigned in header, footer, pages and posts.', 'pofo' ), 
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_custom_sidebars',	 
	    'priority'	 		=> 2,   
	) ) );

	/* End Custom Sidebars Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_page_scroll_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_page_scroll_separator', array(
	    'label'     		=> esc_attr__( 'Page Scroll', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'   		=> 'pofo_add_general_panel',
	    'settings'  		=> 'pofo_page_scroll_separator',
	    'priority'	 		=> 3,
	) ) );

	/* End Separator Settings */
	
	/* Set Under Construction page */

	$wp_customize->add_setting( 'pofo_disable_page_scrolling_effect', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_page_scrolling_effect', array(
		'label'     		=> esc_attr__( 'Page Smooth Scroll', 'pofo' ),
		'section'   		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_disable_page_scrolling_effect',
		'type'              => 'pofo_switch',
		'choices'   		=> array(
										'1' => esc_html__( 'On', 'pofo' ),
									  	'0' => esc_html__( 'Off', 'pofo' ),
								   	),
		'priority'	 		=> 3,
	) ) );

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_image_meta_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_image_meta_separator', array(
	    'label'      		=> esc_attr__( 'Image Meta Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'description'       => esc_attr__('Set visibility for image alt, title and caption attributes with below switch on / off options.', 'pofo'),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_image_meta_separator',	 
	    'priority'	 		=> 5,   
	) ) );

	/* End Separator Settings */

	/* Render Image Alt */
    $wp_customize->add_setting( 'pofo_image_alt', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_image_alt', array(
		'label'       		=> esc_attr__( 'Alt', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_image_alt',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'priority'	 		=> 5,
	) ) );

	/* End Render Image Alt */

	/* Render Image Title */
    $wp_customize->add_setting( 'pofo_image_title', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_image_title', array(
		'label'       		=> esc_attr__( 'Title', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_image_title',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'priority'	 		=> 5,
	) ) );

	/* End Render Image Title */

	/* Show Image Title in Lightbox Popup */
    $wp_customize->add_setting( 'pofo_image_title_lightbox_popup', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_image_title_lightbox_popup', array(
		'label'       		=> esc_attr__( 'Title in Lightbox Popup', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_image_title_lightbox_popup',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'priority'	 		=> 5,
	) ) );

	/* End Show Image Title in Lightbox Popup */

	/* Show Image Caption in Lightbox Popup */
    $wp_customize->add_setting( 'pofo_image_caption_lightbox_popup', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_image_caption_lightbox_popup', array(
		'label'       		=> esc_attr__( 'Caption in Lightbox Popup', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_image_caption_lightbox_popup',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'priority'	 		=> 5,
	) ) );

	/* End Show Image Caption in Lightbox Popup */

	/* Scroll To Top Title Settings */

	$wp_customize->add_setting( 'pofo_scroll_to_top_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_scroll_to_top_separator', array(
	    'label'      		=> esc_attr__( 'Scroll to Top', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_scroll_to_top_separator',
	    'priority'	 		=> 4,
	) ) );

	/* End Scroll To Top Title Settings */

	/* Hide Scroll to Top */

    $wp_customize->add_setting( 'pofo_hide_scroll_to_top', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_scroll_to_top', array(
		'label'       		=> esc_attr__( 'Scroll to Top', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_hide_scroll_to_top',
		'type'              => 'pofo_switch',
		'choices'   		=> array(
											'1' => esc_html__( 'On', 'pofo' ),
										  	'0' => esc_html__( 'Off', 'pofo' ),
									   	),
		'priority'	 		=> 4,
	) ) );

	/* End Hide Scroll to Top */

	/* Scroll to Top Show on Mobile */

    $wp_customize->add_setting( 'pofo_hide_scroll_to_top_on_phone', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_scroll_to_top_on_phone', array(
		'label'       		=> esc_attr__( 'Show on Mobile', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_hide_scroll_to_top_on_phone',
		'active_callback' 	=> 'pofo_scroll_to_top_callback',
		'type'              => 'pofo_switch',
		'choices'   		=> array(
											'1' => esc_html__( 'On', 'pofo' ),
										  	'0' => esc_html__( 'Off', 'pofo' ),
									   	),
		'priority'	 		=> 4,
	) ) );

	/* End Scroll to Top Show on Mobile */

	/* Button size setting */

	$wp_customize->add_setting( 'pofo_scroll_to_top_button_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_scroll_to_top_button_size', array(
		'label'       		=> esc_attr__( 'Button size', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_scroll_to_top_button_size',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
		'type'              => 'text',
	    'priority'	 		=> 4,
	) ) );
	
	/* End Button size setting */

	/* Button icon size setting */

	$wp_customize->add_setting( 'pofo_scroll_to_top_button_icon_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_scroll_to_top_button_icon_size', array(
		'label'       		=> esc_attr__( 'Button icon size', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_scroll_to_top_button_icon_size',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
		'type'              => 'text',
	    'priority'	 		=> 4,
	) ) );
	
	/* End Button icon size setting */

	/* Button thickness */

    $wp_customize->add_setting( 'pofo_scroll_to_top_button_icon_thickness', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_scroll_to_top_button_icon_thickness', array(
		'label'       		=> esc_attr__( 'Button icon thickness', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_scroll_to_top_button_icon_thickness',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
		'type'              => 'pofo_switch',
		'choices'   		=> array(
											'1' => esc_html__( 'On', 'pofo' ),
										  	'0' => esc_html__( 'Off', 'pofo' ),
									   	),
		'priority'	 		=> 4,
	) ) );

	/* End Button thickness */

	/* Button color setting */

	$wp_customize->add_setting( 'pofo_hide_scroll_to_top_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_hide_scroll_to_top_button_color', array(
	    'label'      		=> esc_attr__( 'Button Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_hide_scroll_to_top_button_color',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
	    'priority'	 		=> 4,
	) ) );

	/* End Button color setting */

	/* Button Hover color setting */

	$wp_customize->add_setting( 'pofo_hide_scroll_to_top_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_hide_scroll_to_top_button_hover_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_hide_scroll_to_top_button_hover_color',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
	    'priority'	 		=> 4,
	) ) );

	/* End Button Hover color setting */

	/* Button BG color setting */

	$wp_customize->add_setting( 'pofo_hide_scroll_to_top_button_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_hide_scroll_to_top_button_bg_color', array(
	    'label'      		=> esc_attr__( 'Button Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_hide_scroll_to_top_button_bg_color',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
	    'priority'	 		=> 4,
	) ) );

	/* End Button BG color setting */

	/* Button Hover BG color setting */

	$wp_customize->add_setting( 'pofo_hide_scroll_to_top_button_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_hide_scroll_to_top_button_hover_bg_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_hide_scroll_to_top_button_hover_bg_color',
	    'active_callback' 	=> 'pofo_scroll_to_top_callback',
	    'priority'	 		=> 4,
	) ) );

	/* End Button Hover BG color setting */

	/* Callback Functions */

    if ( ! function_exists( 'pofo_scroll_to_top_callback' ) ) :
		function pofo_scroll_to_top_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_hide_scroll_to_top' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Callback Functions */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_portfolio_rewrite_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_portfolio_rewrite_separator', array(
	    'label'      		=> esc_attr__( 'Portfolio URL Slug', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'description'       => esc_attr__('Set portfolio, categories and tags url slug. After updating slug in this setting please go to Settings > Permalinks and click Save Changes button to have this new url slug change affected in your overall website.', 'pofo'),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_portfolio_rewrite_separator',
	    'priority'	 		=> 6,	    
	) ) );

	/* End Separator Settings */

	/* Portfolio URL Slug */
	$wp_customize->add_setting( 'pofo_portfolio_url_slug', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_url_slug', array(
		'label'       		=> esc_attr__( 'Portfolio URL Slug', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_portfolio_url_slug',
		'type'              => 'text',	
		'priority'	 		=> 6,	
	) ) );
	/* End Portfolio URL Slug */

	/* Categories URL Slug */
	$wp_customize->add_setting( 'pofo_portfolio_cat_url_slug', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_cat_url_slug', array(
		'label'       		=> esc_attr__( 'Categories URL Slug', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_portfolio_cat_url_slug',
		'type'              => 'text',
		'priority'	 		=> 6,		
	) ) );
	/* End Categories URL Slug */

	/* Tags URL Slug */
	$wp_customize->add_setting( 'pofo_portfolio_tags_url_slug', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_tags_url_slug', array(
		'label'       		=> esc_attr__( 'Tags URL Slug', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_portfolio_tags_url_slug',
		'type'              => 'text',
		'priority'	 		=> 6,
	) ) );
	/* End Tags URL Slug */

	/* Search Block Settings */
	$wp_customize->add_setting( 'pofo_search_block_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_search_block_separator', array(
	    'label'      		=> esc_attr__( 'Search Block Settings', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'description'       => esc_attr__( 'Set search placeholder text.', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_search_block_separator',
	) ) );

	/* End Search Block Settings */

	/* Search Block Placeholder Text */

	$wp_customize->add_setting( 'pofo_search_placeholder_text', array(
		'default' 			=> 'Enter your keywords...',
		'sanitize_callback' => 'esc_attr',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_search_placeholder_text', array(
		'label'       		=> esc_attr__( 'Placeholder Text', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_search_placeholder_text',
		'type'              => 'text',
	) ) );
	
	/* End Search Block Placeholder Text */

	/* Header Search Options  */

	$wp_customize->add_setting( 'pofo_search_content_setting', array(
        'default'           => array( 'page','post'),
        'sanitize_callback' => 'esc_attr'
    ) );
	$wp_customize->add_control( new Pofo_Customize_Checkbox_Multiple( $wp_customize, 'pofo_search_content_setting', array(
        'label'   			=> esc_attr__( 'Search Options', 'pofo' ),
        'type'              => 'pofo_checkbox_multiple',
        'section' 			=> 'pofo_add_general_panel',
        'settings'			=> 'pofo_search_content_setting',
        'choices'           => $all_post_type,
    ) ) );

	/* End Header Search Options */

	/* Search Popup Background Color */

	$wp_customize->add_setting( 'pofo_search_popup_backround_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_search_popup_backround_color', array(
	    'label'      		=> esc_attr__( 'Popup Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_search_popup_backround_color',
	) ) );

	/* End Search Popup Background Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_popup_video_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_popup_video_separator', array(
	    'label'      		=> esc_attr__( 'Popup Video', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_popup_video_separator',
	) ) );

	/* End Separator Settings */

	/* Popup Disable setting */

	$wp_customize->add_setting( 'pofo_popup_video_disable', array(
		'default' 			=> '700',
		'sanitize_callback' => 'esc_attr',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_popup_video_disable', array(
		'label'       		=> esc_attr__( 'Popup Disable', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'description'       => __( 'This settings will be affected only youtube, vimeo and google map popup. Add only number like 700', 'pofo' ),
		'settings'			=> 'pofo_popup_video_disable',
		'type'              => 'text',
	) ) );
	
	/* End Popup Disable setting */

	/* GDPR Separator Setting */

	$wp_customize->add_setting( 'pofo_general_gdpr_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_general_gdpr_separator', array(
	    'label'      		=> __( 'GDPR settings', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_general_gdpr_separator',
	) ) );

	/* End GDPR Separator Setting */

	/* GDPR Enable */
    $wp_customize->add_setting( 'pofo_gdpr_enable', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Switch_Control( $wp_customize, 'pofo_gdpr_enable', array(
		'label'       		=> __( 'GDPR', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_enable',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => __( 'On', 'pofo' ),
								  	'0' => __( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End GDPR Enable */

	/* GDPR Style  */

	$wp_customize->add_setting( 'pofo_gdpr_style', array(
		'default' 			=> 'left-content',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_gdpr_style', array(
		'label'       		=> __( 'GDPR Style', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_style',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'full-content' 	   	=> __( 'Bottom full', 'pofo' ),
								  	'left-content'      => __( 'Left corner', 'pofo' ),
								  	'right-content'     => __( 'Right corner', 'pofo' ),
								   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/bottom.jpg',
								  	POFO_THEME_IMAGES_URI . '/bottom-left.jpg',
								  	POFO_THEME_IMAGES_URI . '/bottom-right.jpg',
							   ),
		'pofo_columns'    	=> '4',
		'active_callback'   => 'pofo_gdpr_callback',
	) ) );

	/* End GDPR Style */

	/* GDPR Text Setting */
	$wp_customize->add_setting( 'pofo_gdpr_text', array(
		'default' 			=> sprintf( '%s <a href="#">%s</a>', esc_html__( 'Our site uses cookies. By continuing to our site you are agreeing to our cookie', 'pofo' ), esc_html__( 'privacy policy', 'pofo' ) ),
		'sanitize_callback' => 'wp_kses_post',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_text', array(
		'label'       		=> __( 'GDPR Content', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_text',
		'type'              => 'textarea',
		'active_callback'   => 'pofo_gdpr_callback',
	) ) );
	
	/* End GDPR Text Setting */

	/* GDPR Button Text Setting */

	$wp_customize->add_setting( 'pofo_gdpr_button_text', array(
		'default' 			=> __( 'GOT IT', 'pofo' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_button_text', array(
		'label'       		=> __( 'Button Text', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_button_text',
		'type'              => 'text',
		'active_callback'   => 'pofo_gdpr_callback',
	) ) );
	
	/* GDPR Button Text Setting */

	/* GDPR General Separator Settings */
	$wp_customize->add_setting( 'pofo_gdpr_general_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_gdpr_general_separator', array(
	    'label'      		=> __( 'General', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_gdpr_general_separator',
	    'active_callback'   => 'pofo_gdpr_callback',
	) ) );

	/* End GDPR General Separator Settings */

	/* GDPR Box Background Color */

	$wp_customize->add_setting( 'pofo_gdpr_box_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_gdpr_box_background_color', array(
	    'label'      		=> __( 'Box Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_gdpr_box_background_color',
	    'active_callback' 	=> 'pofo_gdpr_callback',
	) ) );

	/* End GDPR Box Background Color */

	/* GDPR Overlay Color */

	$wp_customize->add_setting( 'pofo_gdpr_overlay_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_gdpr_overlay_color', array(
	    'label'      		=> __( 'Overlay Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_gdpr_overlay_color',
	    'active_callback' 	=> 'pofo_gdpr_callback',
	) ) );

	/* End GDPR Overlay Color */


	/* GDPR Content Typography Separator setting */
	$wp_customize->add_setting( 'pofo_gdpr_content_typography_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_gdpr_content_typography_separator', array(
	    'label'      		=> __( 'GDPR Contennt Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_gdpr_content_typography_separator',
	    'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Content Typography Separator setting */

	/* GDPR Content Font size setting*/
	$wp_customize->add_setting( 'pofo_gdpr_content_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_content_font_size', array(
		'label'       		=> __( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_content_font_size',
		'type'              => 'text',
		'description'       => __( 'In pixel like 15px', 'pofo' ),
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Content Font size setting */

	/* GDPR Content Line height setting*/
	$wp_customize->add_setting( 'pofo_gdpr_content_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_content_line_height', array(
		'label'       		=> __( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_content_line_height',
		'type'              => 'text',
		'description'       => __( 'In pixel like 15px', 'pofo' ),
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Content Line height setting */

	/* GDPR Content Letter spacing setting*/
	$wp_customize->add_setting( 'pofo_gdpr_content_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_content_letter_spacing', array(
		'label'       		=> __( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_content_letter_spacing',
		'type'              => 'text',
		'description'       => __( 'In pixel like 1px', 'pofo' ),
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Content Letter spacing setting */

	/* GDPR Content Font weight setting */

    $wp_customize->add_setting( 'pofo_gdpr_content_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_content_font_weight', array(
		'label'       		=> __( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_content_font_weight',
		'type'              => 'select',
		'choices'           => array(
									'' => esc_html__( 'Select Font Weight', 'pofo'),
									'100' => esc_html__( 'Font weight 100', 'pofo'),
									'200' => esc_html__( 'Font weight 200', 'pofo'),
									'300' => esc_html__( 'Font weight 300', 'pofo'),
									'400' => esc_html__( 'Font weight 400', 'pofo'),
									'500' => esc_html__( 'Font weight 500', 'pofo'),
									'600' => esc_html__( 'Font weight 600', 'pofo'),
									'700' => esc_html__( 'Font weight 700', 'pofo'),
									'800' => esc_html__( 'Font weight 800', 'pofo'),
									'900' => esc_html__( 'Font weight 900', 'pofo'),
							   ),
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Content Font weight setting */

	/* GDPR Content Color setting*/
	$wp_customize->add_setting( 'pofo_gdpr_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_gdpr_content_color', array(
		'label'       		=> __( 'Color', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_content_color',
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Content Color setting */

	/* GDPR Content Hover Color setting*/
	$wp_customize->add_setting( 'pofo_gdpr_content_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_gdpr_content_hover_color', array(
		'label'       		=> __( 'Hover Color', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_content_hover_color',
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Content Hover Color setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_gdpr_button_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_gdpr_button_separator', array(
	    'label'      		=> __( 'GDPR Button typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_gdpr_button_separator',
	    'active_callback'	=> 'pofo_gdpr_callback',
	) ) );

	/* End Separator Settings */

	/* GDPR Button Font Size */

    $wp_customize->add_setting( 'pofo_gdpr_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_button_font_size', array(
		'label'       		=> __( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_button_font_size',
		'type'              => 'text',
		'description'		=> __( 'Define font size like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );

	/* End Button GDPR Font Size */
	
	/* GDPR Button Line Height */

    $wp_customize->add_setting( 'pofo_gdpr_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_button_line_height', array(
		'label'       		=> __( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_button_line_height',
		'type'              => 'text',
		'description'		=> __( 'Define line height like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );

	/* End GDPR Button Line Height */

	/* GDPR Button Letter Spacing */

    $wp_customize->add_setting( 'pofo_gdpr_button_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_button_letter_spacing', array(
		'label'       		=> __( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_button_letter_spacing',
		'type'              => 'text',
		'description'		=> __( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );

	/* End GDPR Button Letter Spacing */

	/* GDPR Button Text Transform setting */

    $wp_customize->add_setting( 'pofo_gdpr_button_font_text_transform', array(
		'default' 			=> 'uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_button_font_text_transform', array(
		'label'       		=> esc_attr__( 'Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_button_font_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Select Title Text Transform', 'pofo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								    'normal'	=> esc_html__( 'Normal', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );

	/* End GDPR Button Text Transform setting */

	/* GDPR Button Font Weight */

    $wp_customize->add_setting( 'pofo_gdpr_button_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_gdpr_button_font_weight', array(
		'label'       		=> __( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_gdpr_button_font_weight',
		'type'              => 'select',
		'choices'           => array(
									'' => esc_html__( 'Select Font Weight', 'pofo'),
									'100' => esc_html__( 'Font weight 100', 'pofo'),
									'200' => esc_html__( 'Font weight 200', 'pofo'),
									'300' => esc_html__( 'Font weight 300', 'pofo'),
									'400' => esc_html__( 'Font weight 400', 'pofo'),
									'500' => esc_html__( 'Font weight 500', 'pofo'),
									'600' => esc_html__( 'Font weight 600', 'pofo'),
									'700' => esc_html__( 'Font weight 700', 'pofo'),
									'800' => esc_html__( 'Font weight 800', 'pofo'),
									'900' => esc_html__( 'Font weight 900', 'pofo'),
							   ),
		'active_callback'	=> 'pofo_gdpr_callback',
	) ) );

	/* End GDPR Button Font Weight */

	/* GDPR Button Background Color */

	$wp_customize->add_setting( 'pofo_gdpr_button_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_gdpr_button_bg_color', array(
	    'label'      		=> __( 'Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_gdpr_button_bg_color',
	    'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Button Background Color */

	/* GDPR Button Background Hover Color */

	$wp_customize->add_setting( 'pofo_gdpr_button_bg_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_gdpr_button_bg_hover_color', array(
	    'label'      		=> __( 'Background Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_gdpr_button_bg_hover_color',
	    'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Button Background Hover Color */

	/* GDPR Button Color */

	$wp_customize->add_setting( 'pofo_gdpr_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_gdpr_button_color', array(
	    'label'      		=> __( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_gdpr_button_color',
	    'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Button Color */

	/* GDPR Button Hover Color */

	$wp_customize->add_setting( 'pofo_gdpr_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_gdpr_button_hover_color', array(
	    'label'      		=> __( 'Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_gdpr_button_hover_color',
	    'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Button Hover Color */

	/* GDPR Border Button Color */

	$wp_customize->add_setting( 'pofo_gdpr_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_gdpr_button_border_color', array(
	    'label'      		=> __( 'Border Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_gdpr_button_border_color',
	    'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	/* End GDPR Border Button Color */

	/* GDPR Border Button Hover Color */

	$wp_customize->add_setting( 'pofo_gdpr_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_gdpr_button_border_hover_color', array(
	    'label'      		=> __( 'Border Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_gdpr_button_border_hover_color',
	    'active_callback'	=> 'pofo_gdpr_callback',
	) ) );
	
	/* End Border GDPR Button Hover Color */

	/* Callback Functions */

    if ( ! function_exists( 'pofo_gdpr_callback' ) ) :
		function pofo_gdpr_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_gdpr_enable' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
