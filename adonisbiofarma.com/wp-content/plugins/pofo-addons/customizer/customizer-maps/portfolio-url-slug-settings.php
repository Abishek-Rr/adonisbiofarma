<?php

	 /* Exit if accessed directly. */
	 if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Set Portfolio Landing Page */
	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_portfolio_rewrite_separator', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_portfolio_rewrite_separator', array(
	'label'      		=> esc_attr__( 'Portfolio URL Slug', 'pofo-addons' ),
	'type'              => 'pofo_separator',
	'description'       => esc_attr__('Set portfolio, categories and tags url slug. After updating slug in this setting please go to Settings > Permalinks and click Save Changes button to have this new url slug change affected in your overall website.', 'pofo-addons'),
	'section'    		=> 'pofo_add_general_panel',
	'settings'   		=> 'pofo_portfolio_rewrite_separator',
	'priority'	 		=> 6,	    
	) ) );

	/* End Separator Settings */
	$wp_customize->add_setting( 'pofo_enable_portfolio_landing_page', array(
	    'default'           => '1',
	    'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Switch_Control( $wp_customize, 'pofo_enable_portfolio_landing_page', array(
	    'label'             => esc_attr__( 'Portfolio Landing Page', 'pofo-addons' ),
	    'section'           => 'pofo_add_general_panel',
	    'settings'          => 'pofo_enable_portfolio_landing_page',
	    'type'              => 'pofo_switch',
	    'choices'           => array(
	                                    '1' => esc_html__( 'On', 'pofo-addons' ),
	                                    '0' => esc_html__( 'Off', 'pofo-addons' ),
	                                ),
	    'priority'          => 6,
	) ) );
	/* End Portfolio Landing Page */

	/* Portfolio URL Slug */
	$wp_customize->add_setting( 'pofo_portfolio_url_slug', array(
	'default' 			=> '',
	'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_url_slug', array(
	'label'       		=> esc_attr__( 'Portfolio URL Slug', 'pofo-addons' ),
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
	'label'       		=> esc_attr__( 'Categories URL Slug', 'pofo-addons' ),
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
	'label'       		=> esc_attr__( 'Tags URL Slug', 'pofo-addons' ),
	'section'     		=> 'pofo_add_general_panel',
	'settings'			=> 'pofo_portfolio_tags_url_slug',
	'type'              => 'text',
	'priority'	 		=> 6,
	) ) );
	/* End Tags URL Slug */