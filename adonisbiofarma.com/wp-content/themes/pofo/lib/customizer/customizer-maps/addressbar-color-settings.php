<?php

	if ( ! defined( 'ABSPATH' ) ) { exit; }

    /* Separator Settings */
    $wp_customize->add_setting( 'pofo_addressbar_color_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_addressbar_color_setting_separator', array(
        'label'             => esc_attr__( 'Color', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_addressbar_color_section',
        'settings'          => 'pofo_addressbar_color_setting_separator',       
    ) ) );

    /* End Separator Settings */

    /* Address Bar Color Setting */

    $wp_customize->add_setting( 'pofo_addressbar_color', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_addressbar_color', array(
        'label'             => esc_attr__( 'Address Bar Color', 'pofo' ),
        'section'           => 'pofo_add_addressbar_color_section',
        'settings'          => 'pofo_addressbar_color',
    ) ) );

    /* End Address Bar Color Setting */

	