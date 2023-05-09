<?php
/**
 * Multiple Custom Category For Post Shortcode.
 *
 * @package Pofo
 */
?>
<?php
vc_add_shortcode_param( 'pofo_multiple_select_custom_option', 'pofo_multiple_custom_category');
if ( ! function_exists( 'pofo_multiple_custom_category' ) ) :
    function pofo_multiple_custom_category( $settings, $value ) {

        if( ! is_array( $value ) ) {
            $value = explode( ',', $value );
        }
        $value1 = $output = '';
        foreach ( $value as $k => $v ) {
            $value1 .= $v;
        }

        $pofo_taxonomies = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
        $pofo_taxonomies_list = str_replace( 'pofo_taxonomies_list_', '', $pofo_taxonomies );
        if( $pofo_taxonomies ) {
            $categories = get_terms( array( 'taxonomy' => $pofo_taxonomies_list, 'orderby' => 'count', 'hide_empty'=> 0 ) );
            $output = '<select multiple="multiple" name="'. $settings['param_name'] .'" class="pofo_multiple_select_option wpb_vc_param_value icon-select wpb-input wpb-rs-select '. $settings['param_name'] .' '. $settings['type'] .'">';

                if( ! empty( $value1 ) ) {
                    $selected_all = ( in_array( '0' , $value ) ) ? ' selected="selected"' : '';
                    $output .= '<option value="0" '.$selected_all.'>'.esc_html__( 'All Taxonomies', 'pofo-addons' ).'</option>';
                } else {
                    $output .= '<option value="0" selected="selected">'.esc_html__( 'All Taxonomies', 'pofo-addons' ).'</option>';
                }

                foreach ( $categories as $data ) {
                    $selected = ( in_array( $data->slug, $value ) ) ? ' selected="selected"' : '';
                    $output .= '<option value="'. $data->slug .'"'. $selected .'>'.htmlspecialchars( $data->name ).'</option>';
                }
            $output .= '</select>' . "\n";
        }
        return $output;
    }
endif; 