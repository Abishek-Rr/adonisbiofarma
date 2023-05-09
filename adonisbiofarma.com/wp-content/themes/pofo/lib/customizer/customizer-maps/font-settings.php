<?php

	if ( ! defined( 'ABSPATH' ) ) { exit; }

	$pofo_font_list = pofo_font_list();

    /* Google Font Languages Separator Settings */
    $wp_customize->add_setting( 'pofo_main_font_languages_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_main_font_languages_setting_separator', array(
        'label'             => esc_attr__( 'Google Font Languages', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_main_font_languages_setting_separator',
        'active_callback'   => 'pofo_google_alt_main_font_callback'
    ) ) );
    /* End Google Font Languages Separator Settings */

    /* Google Font Languages Settings */
    $wp_customize->add_setting( 'pofo_main_font_subsets', array(
        'default'           => array( 
                                    'cyrillic', 
                                    'cyrillic-ext', 
                                    'greek', 
                                    'greek-ext', 
                                    'latin-ext', 
                                    'vietnamese' 
                                ),
        'sanitize_callback' => 'pofo_sanitize_multiple_checkbox',
        'transport'         => 'postMessage'
    ) );

    $wp_customize->add_control( new Pofo_Customize_Checkbox_Multiple( $wp_customize, 'pofo_main_font_subsets', array(
        'label'             => esc_attr__( 'Font Languages', 'pofo' ),
        'type'              => 'pofo_checkbox_multiple',
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_main_font_subsets',
        'choices'           => array(
                                    'cyrillic'      => esc_attr__( 'Cyrillic', 'pofo' ),
                                    'cyrillic-ext'  => esc_attr__( 'Cyrillic Extended', 'pofo' ),
                                    'greek'         => esc_attr__( 'Greek', 'pofo' ),
                                    'greek-ext'     => esc_attr__( 'Greek Extended', 'pofo' ),
                                    'latin-ext'     => esc_attr__( 'Latin Extended', 'pofo' ),
                                    'vietnamese'    => esc_attr__( 'Vietnamese', 'pofo' ),
                                ),
        'active_callback'   => 'pofo_google_alt_main_font_callback'
    ) ) );
    /* Google Font Languages Settings */

	/* Main Font Separator Settings */
	$wp_customize->add_setting( 'pofo_main_font_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_main_font_setting_separator', array(
	    'label'      		=> esc_attr__( 'Main / Body Font', 'pofo' ),
        'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_font_family_section',
	    'settings'   		=> 'pofo_main_font_setting_separator',
        'description'	    => esc_html__('In this section you can overwrite theme default body and additional fonts with your desired Google fonts.','pofo'),
	) ) );

	/* End Main Font Separator Settings */

    $wp_customize->add_setting( 'pofo_enable_main_font', array(
        'default'           => '1',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_enable_main_font', array(
        'label'             => esc_attr__( 'Main / Body Font', 'pofo' ),
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_enable_main_font',
        'type'              => 'pofo_switch',
        'choices'           => array(
                                    '1' => esc_html__( 'On', 'pofo' ),
                                    '0' => esc_html__( 'Off', 'pofo' ),
                               ),
    ) ) );

	$wp_customize->add_setting( 'pofo_main_font', array(
		'default'			=> 'Roboto',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Select_Optgroup( $wp_customize, 'pofo_main_font', array(
		'label'				=> esc_attr__( 'Main / Body Font', 'pofo' ),
		'section'			=> 'pofo_add_general_font_family_section',
		'setting'			=> 'pofo_main_font',
		'type'              => 'pofo_select',
		'choices'           => $pofo_font_list,
        'active_callback'   => 'pofo_main_font_callback',
	) ) );

	$wp_customize->add_setting( 'pofo_main_font_weight', array(
        'default'           => array( '100', '300', '400', '500', '700', '900' ),
        'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
    ) );

    $wp_customize->add_control( new Pofo_Customize_Checkbox_Multiple( $wp_customize, 'pofo_main_font_weight', array(
        'label'   			=> esc_attr__( 'Font Weight', 'pofo' ),
        'type'              => 'pofo_checkbox_multiple',
        'section' 			=> 'pofo_add_general_font_family_section',
        'settings'			=> 'pofo_main_font_weight',
        'choices'           => array(
        							'100' => '100',
        							'200' => '200',
        							'300' => '300',
        							'400' => '400',
        							'500' => '500',
        							'600' => '600',
        							'700' => '700',
        							'800' => '800',
        							'900' => '900',
        						),
        'active_callback'  => 'pofo_main_font_google_callback',
    ) ) );

    /* Alt Font Separator Settings */
	$wp_customize->add_setting( 'pofo_alt_font_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_alt_font_setting_separator', array(
	    'label'      		=> esc_attr__( 'Additional Font', 'pofo' ),
        'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_font_family_section',
	    'settings'   		=> 'pofo_alt_font_setting_separator',
	) ) );

	/* End Alt Font Separator Settings */

    $wp_customize->add_setting( 'pofo_enable_alt_font', array(
        'default'           => '1',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_enable_alt_font', array(
        'label'             => esc_attr__( 'Additional Font', 'pofo' ),
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_enable_alt_font',
        'type'              => 'pofo_switch',
        'choices'           => array(
                                    '1' => esc_html__( 'On', 'pofo' ),
                                    '0' => esc_html__( 'Off', 'pofo' ),
                               ),
    ) ) );

	$wp_customize->add_setting( 'pofo_alt_font', array(
		'default'			=> 'Montserrat',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Select_Optgroup( $wp_customize, 'pofo_alt_font', array(
		'label'				=> esc_attr__( 'Additional Font', 'pofo' ),
		'section'			=> 'pofo_add_general_font_family_section',
		'setting'			=> 'pofo_alt_font',
		'type'              => 'pofo_select',
		'choices'           => $pofo_font_list,
        'active_callback'  => 'pofo_alt_font_callback',
	) ) );

	$wp_customize->add_setting( 'pofo_alt_font_weight', array(
        'default'           => array( '100', '200', '300', '400', '500', '600', '700', '800', '900' ),
        'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
    ) );

    $wp_customize->add_control( new Pofo_Customize_Checkbox_Multiple( $wp_customize, 'pofo_alt_font_weight', array(
        'label'   			=> esc_attr__( 'Font Weight', 'pofo' ),
        'type'              => 'pofo_checkbox_multiple',
        'section' 			=> 'pofo_add_general_font_family_section',
        'settings'			=> 'pofo_alt_font_weight',
        'choices'           => array(
        							'100' => '100',
        							'200' => '200',
        							'300' => '300',
        							'400' => '400',
        							'500' => '500',
        							'600' => '600',
        							'700' => '700',
        							'800' => '800',
        							'900' => '900',
        						),
        'active_callback'  => 'pofo_alt_font_google_callback',
    ) ) );

    /* Main Font Display Separator Settings */
    $wp_customize->add_setting( 'pofo_main_font_display_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_main_font_display_separator', array(
        'label'             => esc_attr__( 'Google Font Display', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_main_font_display_separator',
        'active_callback'   => 'pofo_google_alt_main_font_callback'    
    ) ) );

    $wp_customize->add_setting( 'pofo_main_font_display', array(
        'default'           => 'swap',
        'sanitize_callback' => 'esc_attr',
    ) );

    $wp_customize->add_control( new Wp_Customize_Control( $wp_customize, 'pofo_main_font_display', array(
        'label'             => esc_attr__( 'Google Font Display', 'pofo' ),
        'type'              => 'select',
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_main_font_display',
        'choices'           => array(
                                    ''          => esc_attr__( 'Select', 'pofo' ),
                                    'auto'      => esc_attr__( 'Auto', 'pofo' ),
                                    'block'     => esc_attr__( 'Block', 'pofo' ),
                                    'swap'      => esc_attr__( 'Swap', 'pofo' ),
                                    'fallback'  => esc_attr__( 'Fallback', 'pofo' ),
                                    'optional'  => esc_attr__( 'Optional', 'pofo' ),
                                ),
        'active_callback'   => 'pofo_google_alt_main_font_callback'
    ) ) );

    if ( ! function_exists( 'pofo_main_font_callback' ) ) {
        function pofo_main_font_callback( $control ) {
            if ( $control->manager->get_setting( 'pofo_enable_main_font' )->value() == '1' ) {
                return true;
            } else {
                return false;
            }
        }
    }

    if ( ! function_exists( 'pofo_main_font_google_callback' ) ) {
        function pofo_main_font_google_callback( $control ) {
            $font_list = pofo_font_list();
            $google_font_list = ! empty( $font_list['google'] ) ? $font_list['google'] : array();
            if ( $control->manager->get_setting( 'pofo_enable_main_font' )->value() == '1' && array_key_exists( $control->manager->get_setting( 'pofo_main_font' )->value(), $google_font_list ) ) {
                return true;
            } else {
                return false;
            }
        }
    }

    if ( ! function_exists( 'pofo_alt_font_callback' ) ) {
        function pofo_alt_font_callback( $control ) {
                if ( $control->manager->get_setting( 'pofo_enable_alt_font' )->value() == '1' ) {
                return true;
            } else {
                return false;
            }
        }
    }

    if ( ! function_exists( 'pofo_alt_font_google_callback' ) ) {
        function pofo_alt_font_google_callback( $control ) {
            $font_list = pofo_font_list();
            $google_font_list = ! empty( $font_list['google'] ) ? $font_list['google'] : array();

            if ( $control->manager->get_setting( 'pofo_enable_alt_font' )->value() == '1' && array_key_exists( $control->manager->get_setting( 'pofo_alt_font' )->value(), $google_font_list ) ) {
                return true;
            } else {
                return false;
            }
        }
    }

    if ( ! function_exists( 'pofo_google_alt_main_font_callback' ) ) :
        function pofo_google_alt_main_font_callback( $control ) {
            $font_list = pofo_font_list();
            $google_font_list = ! empty( $font_list['google'] ) ? $font_list['google'] : array();

            if ( ( $control->manager->get_setting( 'pofo_enable_alt_font' )->value() == '1' && array_key_exists( $control->manager->get_setting( 'pofo_alt_font' )->value(), $google_font_list ) ) || ( $control->manager->get_setting( 'pofo_enable_main_font' )->value() == '1' && array_key_exists( $control->manager->get_setting( 'pofo_main_font' )->value(), $google_font_list ) ) ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    /* Adobe Font Separator Settings */
    $wp_customize->add_setting( 'pofo_adobe_font_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_adobe_font_setting_separator', array(
        'label'             => __( 'Adobe Font', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_adobe_font_setting_separator',
        'description'       => __( 'In this section you can load adobe fonts.', 'pofo' ),
        'active_callback'   => 'pofo_alt_main_font_callback'
    ) ) );
    /* End Adobe Font Separator Settings */

    /* Adobe Font Enable */
    $wp_customize->add_setting( 'pofo_enable_adobe_font', array(
        'default'           => '0',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Pofo_Customize_Switch_Control( $wp_customize, 'pofo_enable_adobe_font', array(
        'label'             => __( 'Enable Adobe Font', 'pofo' ),
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_enable_adobe_font',
        'type'              => 'pofo_switch',
        'choices'           => array(
                                    '1' => __( 'On', 'pofo' ),
                                    '0' => __( 'Off', 'pofo' ),
                               ),
        'active_callback'   => 'pofo_alt_main_font_callback'
    ) ) );
    /* End Adobe Font Enable */

    /* Adobe Font Typekit ID */

    $wp_customize->add_setting( 'pofo_adobe_font_typekit_id', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'pofo_adobe_font_typekit_id', array(
        'label'             => __( 'Adobe Font Typekit ID', 'pofo' ),
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_adobe_font_typekit_id',
        'type'              => 'text',
        'active_callback'   => 'pofo_adobe_font_typekit_callback' 
    ) );

    /* End Adobe Font Typekit ID */

    if ( ! function_exists( 'pofo_adobe_font_typekit_callback' ) ) :
        function pofo_adobe_font_typekit_callback( $control ) {
            if ( $control->manager->get_setting( 'pofo_enable_adobe_font' )->value() == '1' && ( $control->manager->get_setting( 'pofo_enable_alt_font' )->value() == '1' || $control->manager->get_setting( 'pofo_enable_main_font' )->value() == '1' ) ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    if ( ! function_exists( 'pofo_alt_main_font_callback' ) ) :
        function pofo_alt_main_font_callback( $control ) {
            if ( $control->manager->get_setting( 'pofo_enable_alt_font' )->value() == '1' || $control->manager->get_setting( 'pofo_enable_main_font' )->value() == '1' ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    /* Custom Font Separator */
    $wp_customize->add_setting( 'pofo_custom_font_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_custom_font_separator', array(
        'label'             => __( 'Custom Font', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_custom_font_separator',
        'description'       => __( 'Custom fonts upload here', 'pofo' ),
        'active_callback'   => 'pofo_alt_main_font_callback'
    ) ) );
    /* End Custom Font Separator */

     /* Custom Font Separator */
    $wp_customize->add_setting( 'pofo_custom_fonts', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post'
    ) );

    $wp_customize->add_control( new Pofo_Custom_Font( $wp_customize, 'pofo_custom_fonts', array(
        'label'             => __( 'Custom Fonts', 'pofo' ),
        'type'              => 'pofo_custom_font',
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_custom_fonts',
        'active_callback'   => 'pofo_alt_main_font_callback'
    ) ) );
    /* End Custom Font Separator */
