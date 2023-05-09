<?php
/**
 * Shortcode For Tabs
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Tabs */
/*-----------------------------------------------------------------------------------*/

$pofo_tabs_style='';
if ( ! function_exists( 'pofo_tabs' ) ) {
  function pofo_tabs( $atts, $content = null ) {
    extract( shortcode_atts( array(
                'id'        => '',
                'class'     => '',
                'tabs_style' => 'tab-style2',
                'active_tab' => '',
                'tabs_alignment' => '',
                'text_transform' => 'text-uppercase',
                'pofo_icon_size' => 'icon-medium',
                'pofo_title_font_size' => '',
                'pofo_title_line_height' => '',
                'pofo_title_letter_spacing' => '',
                'pofo_title_font_weight' => '',
                'pofo_title_italic' => '',
                'pofo_title_underline' => '',
                'pofo_title_color' => '',
                'pofo_title_active_color' => '',
                'pofo_title_bg_color' => '',
                'pofo_title_active_bg_color' => '',
                'pofo_title_enable_responsive_font' => '',
                'pofo_title_responsive_settings' => '',
            ), $atts ) );

    global $pofo_featured_array, $pofo_tabs_style , $pofo_global_tabs;
    
    $output = $pofo_title_style_attr = '';
    $pofo_global_tabs = $pofo_title_style_array = array();

    $pofo_tabs_style = $tabs_style;

    do_shortcode( $content );
    if( empty( $pofo_global_tabs ) ) { return; }

    $id = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
    $class = ( $class ) ? ' '.$class : '';
    $active_tab = ( $active_tab ) ? $active_tab : '1';
    $tabs_style = ( $tabs_style ) ? $tabs_style : '';
    $tabs_alignment = ( $tabs_alignment ) ? ' '.$tabs_alignment : '';
    $text_transform = ( $text_transform ) ? ' '.$text_transform : '';
    $pofo_icon_size = ( $pofo_icon_size ) ? ' '.$pofo_icon_size : '';

    // For Title Style
    ! empty( $pofo_title_font_size ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_title_font_size . ';' : '';
    ! empty( $pofo_title_line_height ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_title_line_height . ';' : '';
    ! empty( $pofo_title_letter_spacing ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing . ';' : '';
    ! empty( $pofo_title_font_weight ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_title_font_weight . ';' : '';
    ( $pofo_title_italic == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
    ( $pofo_title_underline == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';
    $pofo_title_color = ! empty( $pofo_title_color ) ? 'color: '.$pofo_title_color.';' : '';
    $pofo_title_active_color = ! empty( $pofo_title_active_color ) ? 'color: '.$pofo_title_active_color.';' : '';
    $pofo_title_bg_color = ! empty( $pofo_title_bg_color ) ? 'background-color: '.$pofo_title_bg_color.';' : '';
    $pofo_title_active_bg_color = ! empty( $pofo_title_active_bg_color ) ? 'background-color: '.$pofo_title_active_bg_color.';' : '';

    $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
    $pofo_title_style_attr   = pofo_get_style_attribute( $pofo_title_style_array, $pofo_title_font_size, $pofo_title_line_height );
    // Responsive font settings for title
    $pofo_title_dynamic_font_size = ! empty( $pofo_title_responsive_settings ) ? pofo_shortcode_custom_css_class( $pofo_title_responsive_settings ) : '';

    if( ! empty( $pofo_title_color ) ) {
        $pofo_featured_array[] = '.'.$tabs_style.' .nav-tabs > li > a, .'.$tabs_style.' .nav-tabs > li > a i, .'.$tabs_style.' .nav-tabs > li > a span { '.$pofo_title_color.' }';
    }
    if( ! empty( $pofo_title_active_color ) ) {
        $pofo_featured_array[] = '.'.$tabs_style.' .nav-tabs > li.active > a, .'.$tabs_style.' .nav-tabs li a:hover, .'.$tabs_style.' .nav-tabs > li.active > a i, .'.$tabs_style.' .nav-tabs li a:hover i, .'.$tabs_style.' .nav-tabs > li.active > a span, .'.$tabs_style.' .nav-tabs li a:hover span { '.$pofo_title_active_color.' }';
        $pofo_featured_array[] = '.tab-style3 .nav-tabs li.active { border-'.$pofo_title_active_color.' }';
        $pofo_featured_array[] = '.tab-style5 .nav-tabs li.active a { border-bottom-'.$pofo_title_active_color.' }';
    }

    if( ! empty( $pofo_title_bg_color ) ) {
        $pofo_featured_array[] = '.'.$tabs_style.' .nav-tabs > li > a, .'.$tabs_style.' .nav-tabs > li > a { '.$pofo_title_bg_color.' }';
    }
    if( ! empty( $pofo_title_active_bg_color ) ) {
        $pofo_featured_array[] = '.'.$tabs_style.' .nav-tabs > li.active > a, .'.$tabs_style.' .nav-tabs li a:hover { '.$pofo_title_active_bg_color.' }';
    }

    switch ($tabs_style) {

      case 'tab-style2':
        $output .= '<div class="'.esc_attr( $tabs_style ).esc_attr( $class ).'"'.$id.'>';
          $output .= '<div class="row">';
            $output .= '<div class="col-md-12 col-sm-12">';
              $output .= '<ul class="nav nav-tabs alt-font text-small display-inherit font-weight-600'.$tabs_alignment.$text_transform.'">';
                foreach( $pofo_global_tabs as $key => $tab) {
                  $title      =  $tab['atts']['title'];
                  $tab_icon  =  ( isset($tab['atts']['show_icon'] ) == 1 ) && isset( $tab['atts']['tab_icon'] ) ? $tab['atts']['tab_icon'] : '';

                  $custom_tab_icon_max_height = ! empty( $tab['atts']['custom_tab_icon_max_height'] ) ? ' style="max-height: '. $tab['atts']['custom_tab_icon_max_height'] .';"' : '';

                  // new font awesome icons
                  $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                  if( isset( $font_awesome_fa_icons[0] ) && $font_awesome_fa_icons[0] == 'fa' ) {

                      $tab_icon = substr(strstr($tab_icon," "), 1);
                      $tab_icon = pofo_get_fontawesome_icon( $tab_icon );
                  }

                  $active = ( ( $key + 1 ) == $active_tab ) ? ' class="active"' : '';
                  $output .= '<li '.$active.'>';
                    $tabuniqtab  =  $tab['atts']['tab_id'];
                    $output .= '<a href="#pofotabitem-2'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="'.esc_attr( $pofo_title_dynamic_font_size ).'"'.$pofo_title_style_attr.'>';
                    
                    if( (isset($tab['atts']['custom_tab_icon']) == 1) && ! empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                      $output .= '<span><img src="'.wp_get_attachment_url( $tab['atts']['custom_tab_icon_image'] ).'" alt="" class="tab-icon-image" class="margin-10px-bottom display-block"'.$custom_tab_icon_max_height.'/></span>';
                    } elseif($tab_icon) {
                      $output .= '<span><i class="'.$tab_icon.$pofo_icon_size.'"></i></span>';
                    }
                    if(($title) && (isset($tab['atts']['show_title']) == 1)):
                      $output .= '<span>' . esc_html($title) . '</span>';
                    endif;
                    $output .= '</a>';
                  $output .= '</li>';
                }
              $output .= '</ul>';
              $output .= '<div class="tab-content position-relative overflow-hidden">';
                foreach ($pofo_global_tabs as $key => $tab) {
                  $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                  $title  = $tab['atts']['title'];
                  $tabuniqtab  =  $tab['atts']['tab_id'];
                  $output .= '<div class="tab-pane fade'.esc_attr( $active_content ).'" id="pofotabitem-2'.$tabuniqtab.'-'.$key.'">';
                    $output .=  do_shortcode($tab['content']);
                  $output .=  '</div>';
                }
              $output .= '</div>';
            $output .= '</div>';
          $output .= '</div>';
        $output .= '</div>';
      break;

      case 'tab-style3':
        $output .= '<div class="'.esc_attr( $tabs_style ).esc_attr( $class ).'"'.$id.'>';
          $output .= '<div class="row">';
            $output .= '<div class="col-md-12 col-sm-12">';
              $output .= '<ul class="nav nav-tabs margin-50px-bottom xs-margin-30px-bottom alt-font text-small font-weight-600'.$tabs_alignment.$text_transform.'">';
                foreach( $pofo_global_tabs as $key => $tab) {
                  $title      =  $tab['atts']['title'];
                  $tab_icon   =  ( isset( $tab['atts']['show_icon'] ) == 1 ) && isset( $tab['atts']['tab_icon'] ) ? $tab['atts']['tab_icon'] : '';

                  $custom_tab_icon_max_height = ! empty( $tab['atts']['custom_tab_icon_max_height'] ) ? ' style="max-height: '. $tab['atts']['custom_tab_icon_max_height'] .';"' : '';

                  // new font awesome icons
                  $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                  if( isset( $font_awesome_fa_icons[0] ) && $font_awesome_fa_icons[0] == 'fa' ) {
                      
                      $tab_icon = substr(strstr($tab_icon," "), 1);
                      $tab_icon = pofo_get_fontawesome_icon( $tab_icon );
                  }

                  $active = ( ( $key + 1 ) == $active_tab ) ? ' class="active"' : '';
                  $output .= '<li '.$active.'>';
                    $tabuniqtab  =  $tab['atts']['tab_id'];
                    $output .= '<a href="#pofotabitem-3'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="text-medium-gray'.esc_attr( $pofo_title_dynamic_font_size ).'"'.$pofo_title_style_attr.'>';
                    
                    if( (isset($tab['atts']['custom_tab_icon']) == 1) && ! empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                      $output .= '<span><img src="'.wp_get_attachment_url( $tab['atts']['custom_tab_icon_image'] ).'" alt="" class="tab-icon-image" class="margin-10px-bottom display-block"'.$custom_tab_icon_max_height.'/></span>';
                    } elseif($tab_icon) {
                      $output .= '<span><i class="'.$tab_icon.$pofo_icon_size.'"></i></span>';
                    }
                    if(($title) && (isset($tab['atts']['show_title']) == 1)):
                      $output .= '<span>' . esc_html($title) . '</span>';
                    endif;
                    $output .= '</a>';
                  $output .= '</li>';
                }
              $output .= '</ul>';
              $output .= '<div class="tab-content position-relative overflow-hidden">';
                foreach ($pofo_global_tabs as $key => $tab) {
                  $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                  $title  = $tab['atts']['title'];
                  $tabuniqtab  =  $tab['atts']['tab_id'];
                  $output .= '<div class="tab-pane fade'.esc_attr( $active_content ).'" id="pofotabitem-3'.$tabuniqtab.'-'.$key.'">';
                    $output .=  do_shortcode($tab['content']);
                  $output .=  '</div>';
                }
              $output .= '</div>';
            $output .= '</div>';
          $output .= '</div>';
        $output .= '</div>';
      break;

      case 'tab-style4':

        $output .= '<div class="'.esc_attr( $tabs_style ).esc_attr( $class ).'"'.$id.'>';
            $output .= '<div class="row equalize xs-equalize-auto clearfix">';
              $output .= '<div class="col-md-2 col-sm-3 col-xs-12 no-padding-right">';
                $output .='<div class="display-table width-100 height-100">';
                  $output .= '<div class="display-table-cell vertical-align-middle">';
                  $output .= '<ul class="nav nav-tabs alt-font text-uppercase text-small display-inherit font-weight-600">';
                    foreach( $pofo_global_tabs as $key => $tab) {
                      $title      = $tab['atts']['title'];
                      $tab_icon   = ( isset($tab['atts']['show_icon'] ) == 1 ) && isset( $tab['atts']['tab_icon'] ) ? $tab['atts']['tab_icon'] : '';

                      $custom_tab_icon_max_height = ! empty( $tab['atts']['custom_tab_icon_max_height'] ) ? ' style="max-height: '. $tab['atts']['custom_tab_icon_max_height'] .';"' : '';

                      // new font awesome icons
                      $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                      if( isset( $font_awesome_fa_icons[0] ) && $font_awesome_fa_icons[0] == 'fa' ) {

                          $tab_icon = substr(strstr($tab_icon," "), 1);
                          $tab_icon = pofo_get_fontawesome_icon( $tab_icon );
                      }

                      $active = ( ( $key + 1 ) == $active_tab ) ? ' class="active"' : '';
                      $output .= '<li '.$active.'>';
                        $tabuniqtab  =  $tab['atts']['tab_id'];
                        $output .= '<a href="#pofotabitem-4'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="text-small'.esc_attr( $pofo_title_dynamic_font_size ).'"'.$pofo_title_style_attr.'>';
                        
                        if( (isset($tab['atts']['custom_tab_icon']) == 1) && ! empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                          $output .= '<span><img src="'.wp_get_attachment_url( $tab['atts']['custom_tab_icon_image'] ).'" alt="" class="tab-icon-image"'.$custom_tab_icon_max_height.'/></span>';
                        } elseif($tab_icon) {
                          $output .= '<span><i class="'.$tab_icon.$pofo_icon_size.'"></i></span>';
                        }
                        if(($title) && (isset($tab['atts']['show_title']) == 1)):
                          $output .= '<span class="alt-font text-medium-gray'.$text_transform.'">' . esc_html($title) . '</span>';
                        endif;
                        $output .= '</a>';
                      $output .= '</li>';
                    }
                  $output .= '</ul>';
             $output .= '</div>'; 
            $output .= '</div>'; 
          $output .= '</div>';   
        $output .=' <div class="col-md-10 col-sm-9 col-xs-12 no-padding-left">';
          $output .= '<div class="tab-content">';
            foreach ($pofo_global_tabs as $key => $tab) {
              $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
              $title  = $tab['atts']['title'];
              $tabuniqtab  =  $tab['atts']['tab_id'];
              $output .= '<div class="tab-pane fade'.esc_attr( $active_content ).'" id="pofotabitem-4'.$tabuniqtab.'-'.$key.'">';
                $output .= '<div class="inner-match-height">'; // equalize xs-equalize-auto
                $output .=  do_shortcode($tab['content']);
              $output .=  '</div>';
             $output .=  '</div>'; 
            }
            $output .= '</div>';
           $output .= '</div>'; 
          $output .= '</div>';
          $output .= '</div>';        
      break;

      case 'tab-style5':
        $output .= '<div class="'.esc_attr( $tabs_style ).esc_attr( $class ).'"'.$id.'>';            
              $output .= '<div class="tab-box">';
                  $output .= '<ul class="nav nav-tabs display-inherit">';
                      foreach( $pofo_global_tabs as $key => $tab) {
                          $title      = $tab['atts']['title'];
                          $tab_icon   = ( isset($tab['atts']['show_icon'] ) == 1 ) && isset( $tab['atts']['tab_icon'] ) ? $tab['atts']['tab_icon'] : '';

                          $custom_tab_icon_max_height = ! empty( $tab['atts']['custom_tab_icon_max_height'] ) ? ' style="max-height: '. $tab['atts']['custom_tab_icon_max_height'] .';"' : '';

                          // new font awesome icons
                          $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                          if( isset( $font_awesome_fa_icons[0] ) && $font_awesome_fa_icons[0] == 'fa' ) {

                              $tab_icon = substr(strstr($tab_icon," "), 1);
                              $tab_icon = pofo_get_fontawesome_icon( $tab_icon );
                          }

                          $active = ( ( $key + 1 ) == $active_tab ) ? ' class="active"' : '';
                          $output .= '<li '.$active.'>';
                              $tabuniqtab  =  $tab['atts']['tab_id'];
                              $output .= '<a href="#pofotabitem-5'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="'.esc_attr( $pofo_title_dynamic_font_size ).$text_transform.'"'.$pofo_title_style_attr.'>';
              
                                  if( (isset($tab['atts']['custom_tab_icon']) == 1) && ! empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                                      $output .= '<span><img src="'.wp_get_attachment_url( $tab['atts']['custom_tab_icon_image'] ).'" alt="" class="tab-icon-image"'.$custom_tab_icon_max_height.'/></span>';
                                  } elseif($tab_icon) {
                                      $output .= '<span><i class="'.$tab_icon.$pofo_icon_size.'"></i></span>';
                                  }
                                  if( ( $title ) && ( isset($tab['atts']['show_title'] ) == 1) ) {
                                      $output .= esc_html($title);
                                  }                                        
                              $output .= '</a>';
                          $output .= '</li>';
                      }
                  $output .= '</ul>';                        
              $output .= '</div>';
              $output .= '<div class="tab-content">';
                  foreach ($pofo_global_tabs as $key => $tab) {
                      $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                      $title  = $tab['atts']['title'];
                      $tabuniqtab  =  $tab['atts']['tab_id'];
                      $output .= '<div class="tab-pane fade'.esc_attr( $active_content ).'" id="pofotabitem-5'.$tabuniqtab.'-'.$key.'">';
                          $output .=  do_shortcode($tab['content']);                            
                      $output .=  '</div>'; 
                  }
              $output .= '</div>';            
        $output .= '</div>';        
      break;

      case 'tab-style1':
      default:
        $output .= '<div class="'.esc_attr( $tabs_style ).esc_attr( $class ).'"'.$id.'>';
          $output .= '<div class="row">';
            $output .= '<div class="col-md-12 col-sm-12">';
              $output .= '<ul class="nav nav-tabs margin-50px-bottom xs-no-margin-bottom'.$tabs_alignment.'">';
                foreach( $pofo_global_tabs as $key => $tab) {
                  $title      = $tab['atts']['title'];
                  $tab_icon   = ( isset( $tab['atts']['show_icon'] ) == 1 ) && isset( $tab['atts']['tab_icon'] ) ? $tab['atts']['tab_icon'] : '';

                  $custom_tab_icon_max_height = ! empty( $tab['atts']['custom_tab_icon_max_height'] ) ? ' style="max-height: '. $tab['atts']['custom_tab_icon_max_height'] .';"' : '';

                  // new font awesome icons
                  $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                  if( isset( $font_awesome_fa_icons[0] ) && $font_awesome_fa_icons[0] == 'fa' ) {

                      $tab_icon = substr(strstr($tab_icon," "), 1);
                      $tab_icon = pofo_get_fontawesome_icon( $tab_icon );
                  }

                  $active = ( ( $key + 1 ) == $active_tab ) ? ' class="active"' : '';
                  $output .= '<li '.$active.'>';
                    $tabuniqtab  =  $tab['atts']['tab_id'];
                    $output .= '<a href="#pofotabitem-1'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="text-small'.esc_attr( $pofo_title_dynamic_font_size ).'"'.$pofo_title_style_attr.'>';
                    
                    if( (isset($tab['atts']['custom_tab_icon']) == 1) && ! empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                      $output .= '<span><img src="'.wp_get_attachment_url( $tab['atts']['custom_tab_icon_image'] ).'" alt="" class="tab-icon-image" class="margin-10px-bottom display-block"'.$custom_tab_icon_max_height.'/></span>';
                    } elseif($tab_icon) {
                      $output .= '<span><i class="'.$tab_icon.$pofo_icon_size.' text-medium-gray margin-10px-bottom display-block"></i></span>';
                    }
                    if(($title) && (isset($tab['atts']['show_title']) == 1)):
                      $output .= '<span class="alt-font text-medium-gray'.$text_transform.'">' . esc_html($title) . '</span>';
                    endif;
                    $output .= '</a>';
                  $output .= '</li>';
                }
              $output .= '</ul>';
            $output .= '</div>';
          $output .= '</div>';
          $output .= '<div class="tab-content">';
            foreach ($pofo_global_tabs as $key => $tab) {
              $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
              $title  = $tab['atts']['title'];
              $tabuniqtab  =  $tab['atts']['tab_id'];
              $output .= '<div class="tab-pane fade'.esc_attr( $active_content ).'" id="pofotabitem-1'.$tabuniqtab.'-'.$key.'">';
                $output .=  do_shortcode($tab['content']);
              $output .=  '</div>';
            }
          $output .= '</div>';
        $output .= '</div>';
        break;
    }
    return $output;
  }
}
add_shortcode( 'vc_tabs', 'pofo_tabs' );

if ( ! function_exists( 'pofo_tab' ) ) {
  function pofo_tab( $atts, $content = null) {
    global $pofo_global_tabs;
    $pofo_global_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
}
add_shortcode( 'vc_tab', 'pofo_tab' );
