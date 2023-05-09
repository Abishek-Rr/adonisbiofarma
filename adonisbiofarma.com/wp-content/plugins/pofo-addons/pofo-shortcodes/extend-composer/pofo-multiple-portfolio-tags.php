<?php
/**
 * Multiple Category For Portfolio Shortcode.
 *
 * @package Pofo
 */
?>
<?php
vc_add_shortcode_param( 'pofo_multiple_portfolio_tags', 'pofo_portfolio_tags');
if ( ! function_exists( 'pofo_portfolio_tags' ) ) :
  function pofo_portfolio_tags($settings, $value) {
    if( ! is_array( $value ) ) {
        $value = explode( ',', $value );
    }
    $value1 = $output = '';
    foreach ($value as $k => $v) {
        $value1 .= $v;
    }

    $taxonomy = 'portfolio-tags';
    $args = array(
      'hide_empty'  => false,
    ); 
    $terms = get_terms($taxonomy,$args);
    $multiple_param = isset( $settings['multiple'] ) && $settings['multiple'] == false ? '' : ' multiple="multiple"';
    $output  .= '<select'.$multiple_param.' name="'. $settings['param_name'] .'" class="pofo_multiple_select_option wpb_vc_param_value icon-select wpb-input wpb-rs-select '. $settings['param_name'] .' '. $settings['type'] .'">';
    
    if(! empty($value1)):
      $selected_all = ( in_array( '0' , $value ) ) ? ' selected="selected"' : '';
      $output .= '<option value="0" '.$selected_all.'>'.esc_html__( 'All Tags', 'pofo-addons' ).'</option>';
    else:
      $output .= '<option value="0" selected="selected">'.esc_html__( 'All Tags', 'pofo-addons' ).'</option>';
    endif;
        foreach ( $terms as $term ) {  
          $selected = ( in_array( $term->slug, $value ) ) ? ' selected="selected"' : '';
          $output .= '<option value="'. $term->slug .'"'. $selected .'>'.htmlspecialchars( $term->name." - (".$term->slug." - ".$term->term_id.")").'</option>';
        }
    $output .= '</select>' . "\n";
     
    return $output;
  }
endif;