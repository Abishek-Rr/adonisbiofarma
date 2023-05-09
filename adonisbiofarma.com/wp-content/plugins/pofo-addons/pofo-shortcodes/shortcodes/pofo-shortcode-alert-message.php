<?php
/**
 * Shortcode For Alert Message
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Alert Message */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_alert_massage_shortcode' ) ) {
	function pofo_alert_massage_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        	'id' => '',
	        	'class' => '',
	        	'pofo_alert_massage_premade_style' => '',
	        	'pofo_alert_massage_type' => '',
	        	'pofo_highliget_title' => '',
	        	'pofo_subtitle' => '',
	        	'pofo_text_transform' => '',
	        	'show_close_button' => '1',
	        ), $atts ) );
		$output = '';

		$classes = array();

        $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

		$pofo_alert_massage_premade_style = ( $pofo_alert_massage_premade_style ) ? $pofo_alert_massage_premade_style : '';
		$pofo_alert_massage_type = ( $pofo_alert_massage_type ) ? $classes[] = 'alert-'.$pofo_alert_massage_type : '';
		$show_close_button = ( $show_close_button == 1 ) ? '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>' : '';

		( $pofo_text_transform ) ? $classes[] = $pofo_text_transform : '';

		// Replace || to <br /> in title
		$pofo_highliget_title = ( $pofo_highliget_title ) ? str_replace('||', '<br />',$pofo_highliget_title) : '';

		// Replace || to <br /> in subtitle
		$pofo_subtitle = ( $pofo_subtitle ) ? str_replace('||', '<br />',$pofo_subtitle) : '';

        //Unique Style Class
        $classes[] = $pofo_alert_massage_premade_style;

        // Class List
        $class_list     = ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';

		switch ($pofo_alert_massage_premade_style) {
			
			case 'alert-massage-style-1':
				$output .= '<div'.$id.' role="alert" class="alert alert-dismissable'.esc_attr( $class_list ).'">';
	                $output .= $show_close_button;
					if($pofo_highliget_title || $pofo_subtitle):
		                $output .= '<strong>'.$pofo_highliget_title.'</strong> ';
		                $output .= $pofo_subtitle;
	                endif;
	            $output .= '</div>';
			break;
 
			case 'alert-massage-style-2':
				$output .= '<div'.$id.' role="alert" class="alert alert-dismissable bg-transparent'.esc_attr( $class_list ).'">';
	                $output .= $show_close_button;
					if($pofo_highliget_title || $pofo_subtitle):
		                $output .= '<strong>'.$pofo_highliget_title.'</strong> ';
		                $output .= $pofo_subtitle;
	                endif;
	            $output .= '</div>';
			break;
			
			case 'alert-massage-style-3':
				$output .= '<div'.$id.' role="alert" class="alert alert-dismissable bg-white border-none box-shadow'.esc_attr( $class_list ).'">';
	                $output .= $show_close_button;
					if( $pofo_highliget_title || $pofo_subtitle ):
		                $output .= '<strong>'.$pofo_highliget_title.'</strong> ';
		                $output .= $pofo_subtitle;
	                endif;
	            $output .= '</div>';
			break;
			
			default:
			break;
		}
	    return $output;
	}
}
add_shortcode('pofo_alert_massage','pofo_alert_massage_shortcode');