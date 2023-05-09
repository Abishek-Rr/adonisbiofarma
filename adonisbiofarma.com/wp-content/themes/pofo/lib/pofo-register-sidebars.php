<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }  

/**
 * Register Pofo theme required widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 *
 */
if ( ! function_exists( 'pofo_widgets_init' ) ) :
    function pofo_widgets_init() {

        register_sidebar( array(
            'name'          => esc_html__( 'Main Sidebar', 'pofo' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'pofo' ),
            'before_widget' => '<div class="widget %2$s margin-50px-bottom xs-margin-25px-bottom" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>',
            'after_title'   => '</span></div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Mini Header Left Sidebar', 'pofo' ),
            'id'            => 'mini-header-left-sidebar',
            'description'   => esc_html__( 'Add widgets here to appear in your mini header left side.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Mini Header Right Sidebar', 'pofo' ),
            'id'            => 'mini-header-right-sidebar',
            'description'   => esc_html__( 'Add widgets here to appear in your mini header right side.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        /* if WooCommerce plugin is activated */
        if( class_exists( 'WooCommerce' ) ) {
            register_sidebar( array(
                'name'          => esc_html__( 'Shop Sidebar', 'pofo' ),
                'id'            => 'pofo-shop-1',
                'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'pofo' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-title">',
                'after_title'   => '</div>',
            ) );
            register_sidebar( array(
                'name'          => esc_html__( 'Mini Cart', 'pofo' ),
                'id'            => 'pofo-mini-cart',
                'description'   => esc_html__( 'Add widgets here to appear in your menu.', 'pofo' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-title">',
                'after_title'   => '</div>',
            ) );
        }
        
        register_sidebar( array(
            'name'          => esc_html__( 'Menu Icon', 'pofo' ),
            'id'            => 'menu-icon-1',
            'description'   => esc_html__( 'Add widgets here to appear in your menu.', 'pofo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Header Button', 'pofo' ),
            'id'            => 'header-sidebar',
            'description'   => esc_html__( 'Add widgets here to appear in your menu.', 'pofo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Slide Menu Sidebar', 'pofo' ),
            'id'            => 'slide-menu-sidebar',
            'description'   => esc_html__( 'Add widgets here to appear in your slide menu.', 'pofo' ),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Mega Menu Sidebar', 'pofo' ),
            'id'            => 'mega-menu-sidebar',
            'description'   => esc_html__( 'Add widgets here to appear in your mega menu column.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Hamburger Menu Sidebar', 'pofo' ),
            'id'            => 'hamburger-menu-sidebar',
            'description'   => esc_html__( 'Add widgets here to appear in your mega menu column.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 1', 'pofo' ),
            'id'            => 'footer-sidebar-1',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 2', 'pofo' ),
            'id'            => 'footer-sidebar-2',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 3', 'pofo' ),
            'id'            => 'footer-sidebar-3',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 4', 'pofo' ),
            'id'            => 'footer-sidebar-4',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 5', 'pofo' ),
            'id'            => 'footer-sidebar-5',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 6', 'pofo' ),
            'id'            => 'footer-sidebar-6',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 7', 'pofo' ),
            'id'            => 'footer-sidebar-7',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 8', 'pofo' ),
            'id'            => 'footer-sidebar-8',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 9', 'pofo' ),
            'id'            => 'footer-sidebar-9',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 10', 'pofo' ),
            'id'            => 'footer-sidebar-10',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 11', 'pofo' ),
            'id'            => 'footer-sidebar-11',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 12', 'pofo' ),
            'id'            => 'footer-sidebar-12',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 13', 'pofo' ),
            'id'            => 'footer-sidebar-13',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 14', 'pofo' ),
            'id'            => 'footer-sidebar-14',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 15', 'pofo' ),
            'id'            => 'footer-sidebar-15',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 16', 'pofo' ),
            'id'            => 'footer-sidebar-16',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 17', 'pofo' ),
            'id'            => 'footer-sidebar-17',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 18', 'pofo' ),
            'id'            => 'footer-sidebar-18',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 19', 'pofo' ),
            'id'            => 'footer-sidebar-19',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 20', 'pofo' ),
            'id'            => 'footer-sidebar-20',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 21', 'pofo' ),
            'id'            => 'footer-sidebar-21',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 22', 'pofo' ),
            'id'            => 'footer-sidebar-22',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 23', 'pofo' ),
            'id'            => 'footer-sidebar-23',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 24', 'pofo' ),
            'id'            => 'footer-sidebar-24',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 25', 'pofo' ),
            'id'            => 'footer-sidebar-25',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 26', 'pofo' ),
            'id'            => 'footer-sidebar-26',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Sidebar 27', 'pofo' ),
            'id'            => 'footer-sidebar-27',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
            'after_title'   => '</div>',
        ) );
    }
endif;
add_action( 'widgets_init', 'pofo_widgets_init' );