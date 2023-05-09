<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! empty( $breadcrumb ) ) {

	echo wp_kses_post( $wrap_before );
	
	foreach ( $breadcrumb as $key => $crumb ) {

		echo wp_kses_post( $before );

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo '<li><a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a></li>';
		} else {
			if ( is_singular('product') ) {
				$pofo_single_product_enable_breadcrumb_heading = pofo_option( 'pofo_single_product_enable_breadcrumb_heading', '1' );
			    if( $pofo_single_product_enable_breadcrumb_heading == '1' ) {
			        echo '<li>'.esc_html( $crumb[0] ).'</li>';
			    }
			} else {
				$pofo_product_archive_enable_breadcrumb_heading = pofo_option( 'pofo_product_archive_enable_breadcrumb_heading', '1' );
			    if( $pofo_product_archive_enable_breadcrumb_heading == '1' ) {
			        echo '<li>'.esc_html( $crumb[0] ).'</li>';
			    }				
			}
		}

		echo wp_kses_post( $after );

		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo wp_kses_post( $delimiter );
		}

	}

	echo wp_kses_post( $wrap_after );

}