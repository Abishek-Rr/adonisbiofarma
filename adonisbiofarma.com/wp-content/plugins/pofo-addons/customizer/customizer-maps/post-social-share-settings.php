<?php

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_post_social_sharing_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_post_social_sharing_separator', array(
	    'label'      		=> esc_attr__( 'Social Share', 'pofo-addons' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_social_share_section',
	    'settings'   		=> 'pofo_post_social_sharing_separator',	    
	) ) );

	/* End Separator Settings */

	/* Facebook Social Icon */

    $wp_customize->add_setting( 'pofo_single_post_social_sharing', array(
		'default' 			=> '',
		'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
	) );

	$wp_customize->add_control( new Pofo_Post_Customize_Social_Icons( $wp_customize, 'pofo_single_post_social_sharing', array(
		'label'       		=> esc_attr__( 'Social Media Websites', 'pofo-addons' ),
		'type'              => 'pofo_post_social_icons',
		'section'     		=> 'pofo_add_social_share_section',
		'settings'			=> 'pofo_single_post_social_sharing',
		'choices'           => array(
									'facebook' => esc_html__( 'Facebook', 'pofo-addons' ),
								  	'twitter' => esc_html__( 'Twitter', 'pofo-addons' ),
								  	'google-plus' => esc_html__( 'Google+', 'pofo-addons' ),
								  	'linkedin' => esc_html__( 'Linkedin', 'pofo-addons' ),
								  	'pinterest' => esc_html__( 'Pinterest', 'pofo-addons' ),
								  	'delicious' => esc_html__( 'Delicious', 'pofo-addons' ),
								  	'reddit' => esc_html__( 'Reddit', 'pofo-addons' ),
								  	'stumbleupon' => esc_html__( 'StumbleUpon', 'pofo-addons' ),
								  	'digg' => esc_html__( 'Digg', 'pofo-addons' ),
								  	'tumblr' => esc_html__( 'Tumblr', 'pofo-addons' ),
								  	'vk' => esc_html__( 'VK', 'pofo-addons' ),
								  	'xing' => esc_html__( 'XING', 'pofo-addons' ),
							   ),
	) ) );

	/* End Facebook Social Icon */


	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_portfolio_social_sharing_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_portfolio_social_sharing_separator', array(
	    'label'      		=> esc_attr__( 'Social Share', 'pofo-addons' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_portfolio_add_social_share_section',
	    'settings'   		=> 'pofo_portfolio_social_sharing_separator',	    
	) ) );

	/* End Separator Settings */

	/* Facebook Social Icon */

    $wp_customize->add_setting( 'pofo_single_portfolio_social_sharing', array(
		'default' 			=> '',
		'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
	) );

	$wp_customize->add_control( new Pofo_Post_Customize_Social_Icons( $wp_customize, 'pofo_single_portfolio_social_sharing', array(
		'label'       		=> esc_attr__( 'Social Media Websites', 'pofo-addons' ),
		'type'              => 'pofo_post_social_icons',
		'section'     		=> 'pofo_portfolio_add_social_share_section',
		'settings'			=> 'pofo_single_portfolio_social_sharing',
		'choices'           => array(
									'facebook' => esc_html__( 'Facebook', 'pofo-addons' ),
								  	'twitter' => esc_html__( 'Twitter', 'pofo-addons' ),
								  	'google-plus' => esc_html__( 'Google+', 'pofo-addons' ),
								  	'linkedin' => esc_html__( 'Linkedin', 'pofo-addons' ),
								  	'pinterest' => esc_html__( 'Pinterest', 'pofo-addons' ),
								  	'delicious' => esc_html__( 'Delicious', 'pofo-addons' ),
								  	'reddit' => esc_html__( 'Reddit', 'pofo-addons' ),
								  	'stumbleupon' => esc_html__( 'StumbleUpon', 'pofo-addons' ),
								  	'digg' => esc_html__( 'Digg', 'pofo-addons' ),
								  	'tumblr' => esc_html__( 'Tumblr', 'pofo-addons' ),
								  	'vk' => esc_html__( 'VK', 'pofo-addons' ),
								  	'xing' => esc_html__( 'XING', 'pofo-addons' ),
							   ),
	) ) );

	/* End Facebook Social Icon */
	
	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_product_social_sharing_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_social_sharing_separator', array(
	    'label'      		=> esc_attr__( 'Social Share', 'pofo-addons' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_product_add_social_share_section',
	    'settings'   		=> 'pofo_product_social_sharing_separator',	    
	) ) );

	/* End Separator Settings */

	/* Facebook Social Icon */

    $wp_customize->add_setting( 'pofo_single_product_social_sharing', array(
		'default' 			=> '',
		'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
	) );

	$wp_customize->add_control( new Pofo_Post_Customize_Social_Icons( $wp_customize, 'pofo_single_product_social_sharing', array(
		'label'       		=> esc_attr__( 'Social Media Websites', 'pofo-addons' ),
		'type'              => 'pofo_post_social_icons',
		'section'     		=> 'pofo_product_add_social_share_section',
		'settings'			=> 'pofo_single_product_social_sharing',
		'choices'           => array(
									'facebook' => esc_html__( 'Facebook', 'pofo-addons' ),
								  	'twitter' => esc_html__( 'Twitter', 'pofo-addons' ),
								  	'google-plus' => esc_html__( 'Google+', 'pofo-addons' ),
								  	'linkedin' => esc_html__( 'Linkedin', 'pofo-addons' ),
								  	'pinterest' => esc_html__( 'Pinterest', 'pofo-addons' ),
								  	'delicious' => esc_html__( 'Delicious', 'pofo-addons' ),
								  	'reddit' => esc_html__( 'Reddit', 'pofo-addons' ),
								  	'stumbleupon' => esc_html__( 'StumbleUpon', 'pofo-addons' ),
								  	'digg' => esc_html__( 'Digg', 'pofo-addons' ),
								  	'tumblr' => esc_html__( 'Tumblr', 'pofo-addons' ),
								  	'vk' => esc_html__( 'VK', 'pofo-addons' ),
								  	'xing' => esc_html__( 'XING', 'pofo-addons' ),
							   ),
	) ) );

	/* End Facebook Social Icon */