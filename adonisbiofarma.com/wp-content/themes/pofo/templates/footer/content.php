<?php
/**
 * The template for displaying the footer
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) { exit; }

	/* Check if footer social icon show / hide */
	$pofo_footer_extra_class = '';
	$pofo_text_center_class = array();
	$pofo_disable_footer = pofo_option( 'pofo_disable_footer', '1' );
	$pofo_footer_style = pofo_option( 'pofo_footer_style', 'footer-style-one' );
	
	$pofo_footer_sidebar1 = pofo_option( 'pofo_footer_sidebar1', 'footer-sidebar-1' );
	$pofo_footer_sidebar1_desktop_column = pofo_option( 'pofo_footer_sidebar1_desktop_column', '' );
	$pofo_footer_sidebar1_mini_desktop_column = pofo_option( 'pofo_footer_sidebar1_mini_desktop_column', '' );
	$pofo_footer_sidebar1_ipad_column = pofo_option( 'pofo_footer_sidebar1_ipad_column', '' );
	$pofo_footer_sidebar1_mobile_column = pofo_option( 'pofo_footer_sidebar1_mobile_column', '' );

	$pofo_footer_sidebar2 = pofo_option( 'pofo_footer_sidebar2', 'footer-sidebar-2' );
	$pofo_footer_sidebar2_desktop_column = pofo_option( 'pofo_footer_sidebar2_desktop_column', '' );
	$pofo_footer_sidebar2_mini_desktop_column = pofo_option( 'pofo_footer_sidebar2_mini_desktop_column', '' );
	$pofo_footer_sidebar2_ipad_column = pofo_option( 'pofo_footer_sidebar2_ipad_column', '' );
	$pofo_footer_sidebar2_mobile_column = pofo_option( 'pofo_footer_sidebar2_mobile_column', '' );
	
	$pofo_footer_sidebar3 = pofo_option( 'pofo_footer_sidebar3', 'footer-sidebar-3' );
	$pofo_footer_sidebar3_desktop_column = pofo_option( 'pofo_footer_sidebar3_desktop_column', '' );
	$pofo_footer_sidebar3_mini_desktop_column = pofo_option( 'pofo_footer_sidebar3_mini_desktop_column', '' );
	$pofo_footer_sidebar3_ipad_column = pofo_option( 'pofo_footer_sidebar3_ipad_column', '' );
	$pofo_footer_sidebar3_mobile_column = pofo_option( 'pofo_footer_sidebar3_mobile_column', '' );
	
	$pofo_footer_sidebar4 = pofo_option( 'pofo_footer_sidebar4', 'footer-sidebar-4' );
	$pofo_footer_sidebar4_desktop_column = pofo_option( 'pofo_footer_sidebar4_desktop_column', '' );
	$pofo_footer_sidebar4_mini_desktop_column = pofo_option( 'pofo_footer_sidebar4_mini_desktop_column', '' );
	$pofo_footer_sidebar4_ipad_column = pofo_option( 'pofo_footer_sidebar4_ipad_column', '' );
	$pofo_footer_sidebar4_mobile_column = pofo_option( 'pofo_footer_sidebar4_mobile_column', '' );

	$pofo_footer_sidebar5 = pofo_option( 'pofo_footer_sidebar5', '' );
	$pofo_footer_sidebar5_desktop_column = pofo_option( 'pofo_footer_sidebar5_desktop_column', '' );
	$pofo_footer_sidebar5_mini_desktop_column = pofo_option( 'pofo_footer_sidebar5_mini_desktop_column', '' );
	$pofo_footer_sidebar5_ipad_column = pofo_option( 'pofo_footer_sidebar5_ipad_column', '' );
	$pofo_footer_sidebar5_mobile_column = pofo_option( 'pofo_footer_sidebar5_mobile_column', '' );

	$pofo_footer_sidebar6 = pofo_option( 'pofo_footer_sidebar6', '' );
	$pofo_footer_sidebar6_desktop_column = pofo_option( 'pofo_footer_sidebar6_desktop_column', '' );
	$pofo_footer_sidebar6_mini_desktop_column = pofo_option( 'pofo_footer_sidebar6_mini_desktop_column', '' );
	$pofo_footer_sidebar6_ipad_column = pofo_option( 'pofo_footer_sidebar6_ipad_column', '' );
	$pofo_footer_sidebar6_mobile_column = pofo_option( 'pofo_footer_sidebar6_mobile_column', '' );

	$pofo_disable_footer_sidebar1 = pofo_option( 'pofo_disable_footer_sidebar1', '' );
	$pofo_disable_footer_sidebar2 = pofo_option( 'pofo_disable_footer_sidebar2', '' );
	$pofo_disable_footer_sidebar3 = pofo_option( 'pofo_disable_footer_sidebar3', '' );
	$pofo_disable_footer_sidebar4 = pofo_option( 'pofo_disable_footer_sidebar4', '' );
	$pofo_disable_footer_sidebar5 = pofo_option( 'pofo_disable_footer_sidebar5', '' );
	$pofo_disable_footer_sidebar6 = pofo_option( 'pofo_disable_footer_sidebar6', '' );
	$pofo_footer_container_fluid = pofo_option( 'pofo_footer_container_fluid', '0' );
	$pofo_container_fluid = ( $pofo_footer_container_fluid == 1 ) ? 'container-fluid' : 'container';
    $pofo_footer_padding_setting = pofo_option( 'pofo_footer_padding_setting', 'small-padding' );   

    switch ($pofo_footer_padding_setting) {
        case 'medium-padding':
            $pofo_footer_extra_class .= ' padding-65px-tb xs-padding-30px-tb';
            break;

        case 'large-padding':
            $pofo_footer_extra_class .= ' padding-five-tb xs-padding-30px-tb';
            break;
        
        case 'small-padding':
        default:
            $pofo_footer_extra_class .= ' padding-five-top padding-30px-bottom xs-padding-30px-top';
            break;
    }

    // add unique style class
    $pofo_footer_extra_class .= ' ' . $pofo_footer_style;

	switch( $pofo_footer_style ) {
		case 'footer-style-one':
			$sidebar_counter = 0;
    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {
    			$sidebar_counter++;
    		}

    		if( $sidebar_counter != 0 ){
	            echo '<div class="footer-widget-area'.$pofo_footer_extra_class.'">';
	                echo '<div class="'.$pofo_container_fluid.'">';
	                    echo '<div class="row">';
	                    switch ($sidebar_counter) {

	                    	case '6':
		                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		
		                    		$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget md-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget md-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget md-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom md-clear-both xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '5':
		                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		
		                    		$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom sm-clear-both xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '4':
		                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		
		                    		$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom sm-clear-both xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;
	                    	
	                    	case '3':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '2':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '1':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                    	
			                    	$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( '$desktop_column_class' ).esc_attr( '$mini_desktop_column_class' ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;
	                    }
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        }
		break;
		case 'footer-style-two':
			$sidebar_counter = 0;
    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
    			$sidebar_counter++;	        			
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {
    			$sidebar_counter++;
    		}

    		if( $sidebar_counter != 0 ){
	            echo '<div class="footer-widget-area'.$pofo_footer_extra_class.'">';
	                echo '<div class="'.$pofo_container_fluid.'">';
	                    echo '<div class="row equalize sm-equalize-auto">';
	                    switch ($sidebar_counter) {
	                    	case '6':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget pofo-right-border-style sm-no-border-right md-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
		                            	pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style sm-no-border-right md-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style md-no-border-right  md-margin-30px-bottom xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget md-clear-both sm-no-border-right pofo-right-border-style xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style sm-no-border-right xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
			                    }
	                    	break;

	                    	case '5':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget pofo-right-border-style sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
		                            	pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style sm-no-border-right xs-margin-30px-bottom sm-clear-both xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
			                    }
	                    	break;

	                    	case '4':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget pofo-right-border-style  sm-clear-both sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
		                            	pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-no-border-right sm-clear-both xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
			                    }
	                    	break;

	                    	case '3':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget pofo-right-border-style sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
		                            	pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-clear-both sm-no-border-right xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
			                    }
	                    	break;

	                    	case '2':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget pofo-right-border-style sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
		                            	pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-clear-both sm-no-border-right xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
			                    }
	                    	break;

	                    	case '1':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget pofo-right-border-style sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
		                            	pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-no-border-right sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-clear-both sm-no-border-right xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                        	$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {
		                        	
		                        	$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
			                    }
	                    	break;
	                    }
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        }
		break;
		case 'footer-style-three':
			$sidebar_counter = 0;
    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
    			$sidebar_counter++;	        			
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {
    			$sidebar_counter++;
    		}

    		do_action( 'pofo_footer_sidebar_style_three_before' );
    		if( $sidebar_counter != 0 ){
	            echo '<div class="footer-widget-area'.$pofo_footer_extra_class.'">';
	                echo '<div class="'.$pofo_container_fluid.'">';
	                    echo '<div class="row">';
	                    switch ($sidebar_counter) {
	                    	case '6':
		                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget md-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget md-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget md-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom md-clear-both'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : ' col-lg-2';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '5':
		                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget sm-margin-30px-bottom xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom sm-clear-both'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' vc_col-md-1/5';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;case '4':
		                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget sm-margin-50px-bottom xs-margin-30px-bottom sm-text-center xs-text-left'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '4':
		                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget sm-margin-50px-bottom xs-margin-30px-bottom sm-text-center xs-text-left'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;
	                    	
	                    	case '3':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget sm-margin-50px-bottom xs-margin-30px-bottom sm-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-4';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '2':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget sm-margin-50px-bottom xs-margin-30px-bottom sm-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-6';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '1':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

	                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

		                    		echo '<div class="widget sm-margin-50px-bottom xs-margin-30px-bottom sm-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

			                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

			                        echo '<div class="widget xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-12';
			                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-12';
			                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

		                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : '';
			                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-3';
			                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-4';
			                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

			                        echo '<div class="widget'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
			                        echo '</div>';
		                    	}
	                    		break;
	                    }
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        }
    		do_action( 'pofo_footer_sidebar_style_three_after' );
		break;
		case 'footer-style-four':
			$sidebar_counter = 0;
    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {
    			$sidebar_counter++;
    		}

    		if( $sidebar_counter != 0 ){
	            echo '<div class="pofo-footer-bottom footer-widget-area'.$pofo_footer_extra_class.'">';
	                echo '<div class="'.$pofo_container_fluid.'">';
	                	echo '<div class="border-top border-color-medium-dark-gray padding-65px-top xs-padding-30px-top footer-bottom">';
		                    echo '<div class="row">';
			                    switch ($sidebar_counter) {
			                    	case '6':
				                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
				                    		
				                    		$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : '';

				                    		echo '<div class="widget xs-text-center md-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
					                        echo '</div>';
					                    }
					                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

					                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

					                        echo '<div class="widget md-margin-30px-bottom text-medium xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

					                        echo '<div class="widget md-margin-30px-bottom text-medium xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center md-clear-both xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
					                        echo '</div>';
				                    	}
			                    		break;

			                    	case '5':
				                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
				                    		
				                    		$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' vc_col-md-1/5';
					                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

				                    		echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
					                        echo '</div>';
					                    }
					                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

					                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' vc_col-md-1/5';
					                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

					                        echo '<div class="widget sm-margin-30px-bottom text-medium xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' vc_col-md-1/5';
					                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

					                        echo '<div class="widget sm-margin-30px-bottom text-medium xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' vc_col-md-1/5';
					                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
					                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center sm-clear-both xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' vc_col-md-1/5';
					                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-6';
					                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-2';
					                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-3';
					                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

					                        echo '<div class="widget text-right xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
					                        echo '</div>';
				                    	}
			                    		break;

			                    	case '4':
				                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
				                    		
				                    		$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : ' col-lg-3';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-3';
					                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : '';
					                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : '';

				                    		echo '<div class="widget sm-text-center sm-margin-50px-bottom xs-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
					                        echo '</div>';
					                    }
					                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

					                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : ' col-lg-4';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-5';
					                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-margin-30px-bottom text-medium xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : ' col-lg-3';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-3';
					                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-margin-30px-bottom text-medium xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-2';
					                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-3';
					                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

					                        echo '<div class="widget text-right xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-2';
					                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-3';
					                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

					                        echo '<div class="widget text-right xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-2';
					                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-3';
					                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

					                        echo '<div class="widget text-right xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
					                        echo '</div>';
				                    	}
			                    		break;
			                    	
			                    	case '3':
			                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

			                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

				                    		echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
					                        echo '</div>';
					                    }
					                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

					                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-4';
					                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-4';
					                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-2';
					                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-3';
					                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

					                        echo '<div class="widget text-right xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-2';
					                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-3';
					                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

					                        echo '<div class="widget text-right xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
					                        echo '</div>';
				                    	}
			                    		break;

			                    	case '2':
			                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

			                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-6';
					                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-6';
					                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

				                    		echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
					                        echo '</div>';
					                    }
					                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

					                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-6';
					                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-6';
					                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-6';
					                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-6';
					                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-6';
					                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-6';
					                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-2';
					                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-3';
					                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

					                        echo '<div class="widget text-right xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-2';
					                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-3';
					                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

					                        echo '<div class="widget text-right xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
					                        echo '</div>';
				                    	}
			                    		break;

			                    	case '1':
			                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {

			                    			$desktop_column_class = ( $pofo_footer_sidebar1_desktop_column ) ? ' '.$pofo_footer_sidebar1_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar1_mini_desktop_column ) ? ' '.$pofo_footer_sidebar1_mini_desktop_column : ' col-md-12';
					                    	$ipad_column_class = ( $pofo_footer_sidebar1_ipad_column ) ? ' '.$pofo_footer_sidebar1_ipad_column : ' col-sm-12';
					                    	$mobile_column_class = ( $pofo_footer_sidebar1_mobile_column ) ? ' '.$pofo_footer_sidebar1_mobile_column : ' col-xs-12';

				                    		echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
					                        echo '</div>';
					                    }
					                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {

					                    	$desktop_column_class = ( $pofo_footer_sidebar2_desktop_column ) ? ' '.$pofo_footer_sidebar2_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar2_mini_desktop_column ) ? ' '.$pofo_footer_sidebar2_mini_desktop_column : ' col-md-12';
					                    	$ipad_column_class = ( $pofo_footer_sidebar2_ipad_column ) ? ' '.$pofo_footer_sidebar2_ipad_column : ' col-sm-12';
					                    	$mobile_column_class = ( $pofo_footer_sidebar2_mobile_column ) ? ' '.$pofo_footer_sidebar2_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
					                    	
					                    	$desktop_column_class = ( $pofo_footer_sidebar3_desktop_column ) ? ' '.$pofo_footer_sidebar3_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar3_mini_desktop_column ) ? ' '.$pofo_footer_sidebar3_mini_desktop_column : ' col-md-12';
					                    	$ipad_column_class = ( $pofo_footer_sidebar3_ipad_column ) ? ' '.$pofo_footer_sidebar3_ipad_column : ' col-sm-12';
					                    	$mobile_column_class = ( $pofo_footer_sidebar3_mobile_column ) ? ' '.$pofo_footer_sidebar3_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar4_desktop_column ) ? ' '.$pofo_footer_sidebar4_desktop_column : '';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar4_mini_desktop_column ) ? ' '.$pofo_footer_sidebar4_mini_desktop_column : ' col-md-12';
					                    	$ipad_column_class = ( $pofo_footer_sidebar4_ipad_column ) ? ' '.$pofo_footer_sidebar4_ipad_column : ' col-sm-12';
					                    	$mobile_column_class = ( $pofo_footer_sidebar4_mobile_column ) ? ' '.$pofo_footer_sidebar4_mobile_column : ' col-xs-12';

					                        echo '<div class="widget xs-text-center sm-margin-30px-bottom'.esc_attr( '$desktop_column_class' ).esc_attr( '$mini_desktop_column_class' ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar5 ) && $pofo_disable_footer_sidebar5 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar5_desktop_column ) ? ' '.$pofo_footer_sidebar5_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar5_mini_desktop_column ) ? ' '.$pofo_footer_sidebar5_mini_desktop_column : ' col-md-2';
					                    	$ipad_column_class = ( $pofo_footer_sidebar5_ipad_column ) ? ' '.$pofo_footer_sidebar5_ipad_column : ' col-sm-3';
					                    	$mobile_column_class = ( $pofo_footer_sidebar5_mobile_column ) ? ' '.$pofo_footer_sidebar5_mobile_column : ' col-xs-12';

					                        echo '<div class="widget text-right xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar5);
					                        echo '</div>';
				                    	}
				                    	if ( is_active_sidebar( $pofo_footer_sidebar6 ) && $pofo_disable_footer_sidebar6 != '0' ) {

				                    		$desktop_column_class = ( $pofo_footer_sidebar6_desktop_column ) ? ' '.$pofo_footer_sidebar6_desktop_column : ' col-lg-2';
					                    	$mini_desktop_column_class = ( $pofo_footer_sidebar6_mini_desktop_column ) ? ' '.$pofo_footer_sidebar6_mini_desktop_column : ' col-md-2';
					                    	$ipad_column_class = ( $pofo_footer_sidebar6_ipad_column ) ? ' '.$pofo_footer_sidebar6_ipad_column : ' col-sm-3';
					                    	$mobile_column_class = ( $pofo_footer_sidebar6_mobile_column ) ? ' '.$pofo_footer_sidebar6_mobile_column : ' col-xs-12';

					                        echo '<div class="widget text-right xs-text-center'.esc_attr( $desktop_column_class ).esc_attr( $mini_desktop_column_class ).esc_attr( $ipad_column_class ).esc_attr( $mobile_column_class ).'">';
					                            pofo_footer_sidebar_style($pofo_footer_sidebar6);
					                        echo '</div>';
				                    	}
			                    		break;
			                    }
			            	echo '</div>';        
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        }
		break;		
	}
