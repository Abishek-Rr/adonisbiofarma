<?php
/**
 * Pofo Custom Width Class List For VC.
 *
 * @package Pofo
 */
?>
<?php
vc_add_shortcode_param( 'pofo_custom_title', 'pofo_custom_title_callback', POFO_ADDONS_ROOT_DIR . '/pofo-shortcodes/js/section-heading.js' );
if ( ! function_exists( 'pofo_custom_title_callback' ) ) :
	function pofo_custom_title_callback( $settings, $value ) {
		$responsive_settings = ! empty( $settings['responsive_settings'] ) && ! empty( $settings['hide_show_element'] )  ? '<div class="responsive-tab-setting custom_font_responsive_tab" data-hide-show="' . $settings['hide_show_element'] . '">' . esc_html__( 'Responsive', 'pofo-addons' ) . '</div>' : '';

		if( $responsive_settings ) {
			$output = '<div class="pofo-custom-title"><div class="title_responsive_style">'.esc_attr( $value )
				.'</div></div> <div class="custom_title_responsive_tab"><div class="tab-responsive-font custom_font_responsive_tab">Desktop</div>'.$responsive_settings.'<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
				esc_attr( $settings['param_name'] ) . ' ' .
				esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />' .
				'</div>';	
		} else {
			$output = '<div class="pofo-custom-title"><div class="title_responsive_style">'.esc_attr( $value )
				.'</div><input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
				esc_attr( $settings['param_name'] ) . ' ' .
				esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />' .
				'</div>';
		}

		return $output; // This is html markup that will be outputted in content elements edit form
	}
endif;
