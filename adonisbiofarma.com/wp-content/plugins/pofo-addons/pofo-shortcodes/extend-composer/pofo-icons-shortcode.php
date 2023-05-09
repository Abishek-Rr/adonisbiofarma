<?php
/**
 * Pofo Custom Icon (font awesome and et line) List For VC.
 *
 * @package Pofo
 */
?>
<?php 
/* icons shortcode settings */
vc_add_shortcode_param('pofo_icon', 'pofo_icon_shortcode', POFO_ADDONS_ROOT_DIR . '/pofo-shortcodes/js/custom.js');
if ( ! function_exists( 'pofo_icon_shortcode' ) ) :
    function pofo_icon_shortcode($settings, $value) {
      
        $pofo_icons           = pofo_get_et_line_icons();
        $pofo_ti_icon         = pofo_get_themify_icons();
        $pofo_fa_icon_solid   = pofo_fontawesome_solid();
        $pofo_fa_icon_regular = pofo_fontawesome_reg();
        $pofo_fa_icon_brand   = pofo_fontawesome_brand();
        $pofo_fontawesome_light = pofo_fontawesome_light();
        $pofo_fontawesome_duotone = pofo_fontawesome_duotone();
        $pofo_fa_icon_old     = pofo_fontawesome_old();
        
        $pofo_custom_icons  = apply_filters( 'pofo_custom_font_icons', array() );

        $value_without_fontawesome_main_class = substr(strstr($value," "), 1);
        $pofo_fontawesome_icons_main_class =  explode(' ',trim($value));
        $pofo_fontawesome_new_icon_value = '';

        if( isset( $pofo_fontawesome_icons_main_class[0] ) && $pofo_fontawesome_icons_main_class[0] == 'fa' ) {

            $pofo_fontawesome_new_icon_value = pofo_get_fontawesome_icon( $value_without_fontawesome_main_class );

        } else {

            $pofo_fontawesome_new_icon_value = $value;
        }

        $output = '';

        /* Search icons */
        $output .= '<div class="vc_col-xs-12 pofo-find-icon-wrap">';
            $output .= "<input type='text' class='search_icon_text' placeholder='".esc_html__( 'Search icon', 'pofo-addons' )."'>";
            $output .= "<button type='button' class='button button-primary search_icon_button'>".esc_html__( 'Find', 'pofo-addons' )."</button>";
            $output .= "<button type='button' class='button clear_search_icon_button'>".esc_html__( 'Clear', 'pofo-addons' )."</button>";
        $output .= '</div>';

        $output .= "<div class='pofo_icon_container_main'>";

            if( ! empty( $pofo_icons ) ) {

                foreach ( $pofo_icons as $ikey => $ivalue ) {
                    
                    $selected_icon = ( $ivalue == $value ) ? " active_icon" : '';
                    $output .= '<span class="pofo_icon_preview'.esc_attr( $selected_icon ).'"><i class="'.esc_attr( $ivalue ).'" data-name="'.esc_attr( $ivalue ).'"></i></span>';
                }
            }
            
            if( ! empty( $pofo_fa_icon_solid ) ) {

                foreach ( $pofo_fa_icon_solid as $ikey => $ivalue ) {
                    
                    $selected_icon = ( 'fas '.$ivalue == $pofo_fontawesome_new_icon_value ) ? " active_icon" : '';
                    $output .= '<span class="pofo_icon_preview'.esc_attr( $selected_icon ).'"><i class="fas '.esc_attr( $ivalue ).'" data-name="fas '.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            if( ! empty( $pofo_fa_icon_regular ) ) {

                foreach ( $pofo_fa_icon_regular as $ikey => $ivalue ) {
                    
                    $selected_icon = ( 'far '.$ivalue == $pofo_fontawesome_new_icon_value ) ? " active_icon" : '';
                    $output .= '<span class="pofo_icon_preview'.esc_attr( $selected_icon ).'"><i class="far '.esc_attr( $ivalue ).'" data-name="far '.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            if( ! empty( $pofo_fa_icon_brand ) ) {

                foreach ( $pofo_fa_icon_brand as $ikey => $ivalue ) {
                    
                    $selected_icon = ( 'fab '.$ivalue == $pofo_fontawesome_new_icon_value ) ? " active_icon" : '';
                    $output .= '<span class="pofo_icon_preview'.esc_attr( $selected_icon ).'"><i class="fab '.esc_attr( $ivalue ).'" data-name="fab '.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            if( ! empty( $pofo_fontawesome_light ) ) {

                foreach ( $pofo_fontawesome_light as $ikey => $ivalue ) {
                    
                    $selected_icon = ( 'fal '.$ivalue == $pofo_fontawesome_new_icon_value ) ? " active_icon" : '';
                    $output .= '<span class="pofo_icon_preview'.esc_attr( $selected_icon ).'"><i class="fal '.esc_attr( $ivalue ).'" data-name="fal '.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            if( ! empty( $pofo_fontawesome_duotone ) ) {

                foreach ( $pofo_fontawesome_duotone as $ikey => $ivalue ) {
                    
                    $selected_icon = ( 'fad '.$ivalue == $pofo_fontawesome_new_icon_value ) ? " active_icon" : '';
                    $output .= '<span class="pofo_icon_preview'.esc_attr( $selected_icon ).'"><i class="fad '.esc_attr( $ivalue ).'" data-name="fad '.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            if( ! empty( $pofo_ti_icon ) ) {

                foreach ( $pofo_ti_icon as $ikey => $ivalue ) {
                  
                    $selected_icon = ( $ivalue == $value ) ? " active_icon" : '';
                    $output .= '<span class="pofo_icon_preview'.esc_attr( $selected_icon ).'"><i class="'.esc_attr( $ivalue ).'" data-name="'.esc_attr( $ivalue ).'"></i></span>';
                }
            }

            if( ! empty( $pofo_custom_icons ) ) {
                foreach( $pofo_custom_icons as $pofo_custom_icon ) {
                    foreach( $pofo_custom_icon['fonts'] as $ikey => $ivalue  ) {

                        $selected_icon = ( $ivalue == $value ) ? " active_icon" : '';
                        $output .= '<span class="pofo_icon_preview'.esc_attr( $selected_icon ).'"><i class="'.esc_attr( $ivalue ).'" data-name="'.esc_attr( $ivalue ).'"></i></span>';
                    }
                }
            }
    
            $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pofo_icon_field wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
        $output .= '</div>'; 

        return $output;
    }
endif;