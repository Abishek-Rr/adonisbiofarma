<?php
/**
 * Shortcode For Popup
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Popup */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_popup_shortcode' ) ) {
    function pofo_popup_shortcode( $atts, $content = null ) {
        global $pofo_featured_array, $pofo_button,$pofo_slider_script;
        extract( shortcode_atts( array(
                'id' => '',
                'class' => '',
                'pofo_popup_type' => '',
                'pofo_popup_animation_effect' => '',
                'pofo_enable_icon' => '',
                'custom_icon' => '',
                'custom_icon_image' => '',
                'custom_icon_max_height' => '',
                'pofo_icon_list' => '',
                'pofo_popup_button_title' => '',
                'pofo_inside_popup_title' => '',
                'pofo_contact_forms_shortcode' => '',
                'pofo_popup_youtube_url' => '',
                'pofo_popup_vimeo_url' => '',
                'pofo_popup_mp4_url' =>'',
                'pofo_popup_webm_url' =>'',
                'pofo_popup_ogg_url' =>'',
                'pofo_popup_google_map_url' => '',
                'video_autoplay' => '1',
                'video_muted' => '1',
                'video_loop' => '1',
                'video_controls' => '1',
                'pofo_icon_color' => '',
                'pofo_button_type' => 'medium',
                'pofo_button_bg_color' => '',
                'pofo_button_text_color' => '',
                'pofo_button_hover_bg_color' => '',
                'pofo_button_hover_text_color' => '',
                'pofo_button_border_color' => '',
                'pofo_icon_size' => '',
                'enable_background_icon' => '',
                'background_icon_main_color' => '',
                'background_icon_gradient_color' => '',
                'pofo_dismiss_text' => esc_html__( 'Dismiss','pofo-addons' ),
                'pofo_popup_form_id' => '',
                'pofo_width' => '',
                'pofo_offset' => '',
                'enable_responsive_video' => '0',
                'pofo_max_width' => '900px',
                'pofo_max_width_desktop' => '900px',
                'pofo_max_width_minidesktop' => '',
                'pofo_max_width_tablet' => '',
                'pofo_max_width_mobile' => '',
                'pofo_video_width_desktop' => '100%',
                'pofo_video_width_mini_desktop' => '',
                'pofo_video_width_tablet' => '',
                'pofo_video_width_mobile' => '',
            ), $atts ) );

        $output = $pofo_popup_button = '';
        $classes = $classes_icon = array();

        $pofo_button = ! empty( $pofo_button ) ? $pofo_button : 0;
        $pofo_button = $pofo_button + 1;

        $pofo_icon_list                 = ( $pofo_icon_list) ? $pofo_icon_list : '';
        $pofo_inside_popup_title        = ( $pofo_inside_popup_title ) ? $pofo_inside_popup_title : '';
        $pofo_contact_forms_shortcode   = ( $pofo_contact_forms_shortcode ) ? $pofo_contact_forms_shortcode : '';
        $pofo_popup_youtube_url         = ( $pofo_popup_youtube_url ) ? $pofo_popup_youtube_url : '';
        $pofo_popup_vimeo_url           = ( $pofo_popup_vimeo_url ) ? $pofo_popup_vimeo_url : '';
        $pofo_popup_mp4_url             = ( $pofo_popup_mp4_url ) ? $pofo_popup_mp4_url : '';
        $pofo_popup_webm_url            = ( $pofo_popup_webm_url ) ? $pofo_popup_webm_url : '';
        $pofo_popup_ogg_url             = ( $pofo_popup_ogg_url ) ? $pofo_popup_ogg_url : '';
        $pofo_popup_google_map_url      = ( $pofo_popup_google_map_url ) ? $pofo_popup_google_map_url : '';
        $autoplay = ( $video_autoplay == 1 ) ? ' autoplay' : '';
        $muted = ( $video_muted == 1 ) ? ' muted' : '';
        $loop = ( $video_loop == 1 ) ? ' loop' : '';
        $controls = ( $video_controls == 1 ) ? ' controls' : '';

        // Replace || to <br /> in title
        $pofo_inside_popup_title = ! empty( $pofo_inside_popup_title ) ? str_replace('||', '<br />',$pofo_inside_popup_title) : '';

        // new font awesome icons
        $font_awesome_fa_icons  = ! empty( $pofo_icon_list ) ? explode( ' ', trim( $pofo_icon_list ) ) : array();

        if( isset( $font_awesome_fa_icons[0] ) && $font_awesome_fa_icons[0] == 'fa' ) {

            $pofo_icon_list = substr( strstr( $pofo_icon_list, " " ), 1 );
            $pofo_icon_list = pofo_get_fontawesome_icon( $pofo_icon_list );
        }

        $pofo_icon_list = ( $pofo_icon_list ) ? $classes_icon[] = $pofo_icon_list : '' ;
        $pofo_icon_color= ( $pofo_icon_color ) ? 'color:'.$pofo_icon_color.' !important;' : '';
        $pofo_icon_size = ( $pofo_icon_size ) ? $classes_icon[] = $pofo_icon_size : $classes_icon[] ='icon-medium';
        $enable_background_icon = ( $enable_background_icon == 1 ) ? $classes[] = 'popup-icon-round' : '';
        $icon_background_color = ( $background_icon_main_color && $background_icon_gradient_color ) ? 'background: linear-gradient( to right top, ' . $background_icon_main_color . ', ' . $background_icon_gradient_color . ' );' : ( $background_icon_main_color ? 'background: ' . $background_icon_main_color . ';' : '' ) ;

        if( ! empty( $pofo_icon_color ) ) {

            $pofo_featured_array[] = 'a.btn.pofo-button-'.$pofo_button.' i, .pofo-button-'.$pofo_button.' .pofo-popup-icon { '.$pofo_icon_color.' }';
        }

        if( ! empty( $icon_background_color ) ) {

            $pofo_featured_array[] = '.popup-icon-round.pofo-button-'.$pofo_button.' { ' . $icon_background_color . ' }';
        }

        // Image Alt, Title, Caption
        $icon_img_alt           = ! empty( $custom_icon_image ) ? pofo_option_image_alt( $custom_icon_image) : '';
        $icon_img_title         = ! empty( $custom_icon_image ) ? pofo_option_image_title( $custom_icon_image) : '';
        $icon_image_alt         = ! empty( $icon_img_alt['alt'] ) ? ' alt="'.$icon_img_alt['alt'].'"' : ' alt=""' ;
        $icon_image_title       = ! empty( $icon_img_title['title'] ) ? ' title="'.$icon_img_title['title'].'"' : '';

        $custom_icon_image      = ! empty( $custom_icon_image ) ? wp_get_attachment_url( $custom_icon_image ) : '';
        $custom_icon_max_height = ! empty( $custom_icon_max_height ) ? ' style="max-width: '. $custom_icon_max_height .';"' : '';

        $class_list3            = ! empty( $classes_icon ) ? implode( " ", $classes_icon ) : '';
        $class_icon_attr        = ( $class_list3 ) ? ' '.$class_list3 : '';

        $pofo_popup_button = ! empty( $pofo_popup_button_title ) ? $pofo_popup_button_title : '';
        if( $pofo_enable_icon == 1 ) {

            if( $custom_icon == 1 && ! empty( $custom_icon_image ) ) {

                $pofo_popup_button .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image"'.$custom_icon_max_height.'/>';

            } elseif( $pofo_icon_list ) {

                $pofo_popup_button .= '<i class="pofo-popup-icon' . esc_attr( $class_icon_attr ) . '"></i>';
            }
        } 
        // Column Offset and sm width
        $pofo_offset = ( $pofo_offset ) ? ' '. str_replace( 'vc_', '', $pofo_offset ) : '';
        
        if( $pofo_width != '' ) {

            $pofo_width = explode( '/', $pofo_width );
            $pofo_width = ( $pofo_width[0] != '1' ) ? ' col-sm-'.$pofo_width[0] * floor(12 / $pofo_width[1]) : ' col-sm-'.floor( 12 / $pofo_width[1] );
        }

        // Button Color Settings
        $pofo_button_type             = ! empty( $pofo_button_type ) ? 'btn-' . $pofo_button_type . ' ' : '';
        $pofo_button_bg_color         = ! empty( $pofo_button_bg_color ) ? $style_array[] = 'background-color:'.$pofo_button_bg_color.'; ' : '';
        $pofo_button_text_color       = ! empty( $pofo_button_text_color ) ? $style_array[] = 'color:'.$pofo_button_text_color.'; ' : '';
        $pofo_button_border_color     = ! empty( $pofo_button_border_color ) ? $style_array[] = 'border-color:'.$pofo_button_border_color.'; ' : '';
        if( ! empty( $pofo_button_hover_bg_color ) ) {
            $pofo_featured_array[] = 'a.btn.pofo-button-'.$pofo_button.':hover, a.btn.pofo-button-'.$pofo_button.':focus { background-color:'.$pofo_button_hover_bg_color.' !important; }';   
        }
        if( ! empty( $pofo_button_hover_text_color ) ) {
            $pofo_featured_array[] = 'a.btn.pofo-button-'.$pofo_button.':hover, a.btn.pofo-button-'.$pofo_button.':focus, a.btn.pofo-button-'.$pofo_button.':hover i, a.btn.pofo-button-'.$pofo_button.':focus i { color:'.$pofo_button_hover_text_color.' !important; }';   
        }
        
        ! empty( $pofo_popup_animation_effect ) ? $classes[] = $pofo_popup_animation_effect : '';

        $id         = ( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';
        $classes[]  = $pofo_popup_type;

        // Class List
        $class_list = ! empty( $classes ) ? implode(" ", $classes) . ' ' : '';

        // Style Property List
        $style_attr = ! empty( $style_array ) ? implode(" ", $style_array) : '';
        $style = ! empty( $style_attr ) ? ' style="'.$style_attr.'"' : '';

        switch ( $pofo_popup_type ) {
            case 'popup-form-1':

                $pofo_width = ! empty( $pofo_width ) ? $pofo_width : '';
                $pofo_offset = ! empty( $pofo_offset ) ? $pofo_offset : ' col-lg-3 col-md-6';

                if( strchr( $pofo_offset,'col-xs' ) ) :
                    $pofo_offset = $pofo_offset;
                else:
                    $pofo_offset = $pofo_offset." col-xs-mobile-fullwidth";
                endif;
                
                $pofo_btn_class = ! empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                $contact_form   = do_shortcode( '[contact-form-7 id='.$pofo_contact_forms_shortcode.']' );
                    if( $pofo_popup_button ) :
                        $output .= '<a'.$id.' class="'.esc_attr( $class_list ).esc_attr( $pofo_btn_class ).'wow fadeInDown popup-with-form pofo-button-'.$pofo_button.'" href="#popup-form-'.$pofo_popup_form_id.'"'.$style.'>'.$pofo_popup_button.'</a>';
                    endif;
                    $output .= '<div id="popup-form-'.$pofo_popup_form_id.'" class="'.$pofo_offset.$pofo_width.' white-popup-block mfp-hide center-col bg-white border-radius-6 padding-four-half-all md-padding-seven-all">';
                        $output .= $contact_form;
                    $output .= '</div>';
                break;

            case 'modal-popup':

                $pofo_width = ! empty( $pofo_width ) ? $pofo_width : ' col-sm-7';
                $pofo_offset = ! empty( $pofo_offset ) ? $pofo_offset : ' col-lg-3 col-md-6 col-xs-11';
                
                if( strchr( $pofo_offset,'col-xs' ) ) :
                    $pofo_offset = $pofo_offset;
                else:
                    $pofo_offset = $pofo_offset." col-xs-mobile-fullwidth";
                endif;
                
                $animation_dialog   = ! empty( $pofo_popup_animation_effect ) ? 'zoom-anim-dialog ' : '';
                $pofo_btn_class     = ! empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                if( $pofo_popup_button ) :
                    $output .= '<a'.$id.' class="'.esc_attr( $class_list ).esc_attr( $pofo_btn_class ).' pofo-button-'.$pofo_button.'" href="#modal-popup-'.$pofo_popup_form_id.'"'.$style.'>'.$pofo_popup_button.'</a>';
                endif;
                $output .= '<div id="modal-popup-'.$pofo_popup_form_id.'" class="'.$animation_dialog.'white-popup-block mfp-hide center-col bg-white text-center modal-popup-main padding-50px-all '.$pofo_offset.$pofo_width.'">';
                    if( $pofo_inside_popup_title):
                        $output .= '<h6 class="text-extra-large text-extra-dark-gray alt-font font-weight-600 margin-15px-bottom">'.$pofo_inside_popup_title.'</h6>';
                    endif;
                    if( $content):
                        $output .= '<p class="margin-four">'.do_shortcode( $content).'</p>';
                    endif;
                    
                    $pofo_dismiss_text = ( $pofo_dismiss_text ) ? $pofo_dismiss_text : '';
                    if ( ! empty( $pofo_dismiss_text ) ) {
                        $output .= '<a class="' . esc_attr( $pofo_button_type ) . 'btn btn-rounded btn-dark-gray popup-modal-dismiss" href="#">'.$pofo_dismiss_text.'</a>';
                    }
                $output .= '</div>';
                break;

            case 'youtube-video-1':

                $pofo_max_width_desktop = ( $enable_responsive_video == 0 )?  $pofo_max_width_desktop : '100%';
                if( $pofo_max_width_desktop ){
                    $pofo_featured_array[] = '.mfp-iframe-holder .mfp-content{ max-width:'. $pofo_max_width_desktop .';}';
                }
                $pofo_btn_class = ! empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                if( $pofo_popup_button ) :
                    $output .='<a'.$id.' class="'.esc_attr( $class_list ).esc_attr( $pofo_btn_class ).' popup-youtube pofo-button-'.$pofo_button.'" href="'.esc_url( $pofo_popup_youtube_url ).'"'.$style.'>'.$pofo_popup_button.'</a>';
                endif;
                break;

            case 'vimeo-video-1':
                $pofo_max_width_desktop = ( $enable_responsive_video == 0 )?  $pofo_max_width_desktop : '100%';
                if( $pofo_max_width_desktop ){
                    $pofo_featured_array[] = '.mfp-iframe-holder .mfp-content{ max-width:'. $pofo_max_width_desktop .';}';
                }
                $pofo_btn_class = ! empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                if( $pofo_popup_button ) :
                    $output .='<a'.$id.' class="'.esc_attr( $class_list ).esc_attr( $pofo_btn_class ).' popup-vimeo pofo-button-'.$pofo_button.'" href="'.esc_url( $pofo_popup_vimeo_url ).'"'.$style.'>'.$pofo_popup_button.'</a>';
                endif;
                break;

           case 'html5-video-1':
                $pofo_video_width_desktop = ( $enable_responsive_video == 0 )?  $pofo_video_width_desktop : '100%';
                if( $pofo_video_width_desktop ){
                    $pofo_featured_array[] = '.mfp-inline-holder .mfp-content .html5-video-1{ width:'. $pofo_video_width_desktop .';}';
                }
                $pofo_btn_class = ! empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                if( $pofo_popup_button ) :
                    $output .= '<a'.$id.' class="'.esc_attr( $class_list).esc_attr( $pofo_btn_class).'wow fadeInDown popup-with-form pofo-button-'.esc_attr( $pofo_button).'" href="#html5-video-1-'.$pofo_popup_form_id.'"'.$style.'>'.$pofo_popup_button.'</a>';
                endif;
                $output .= '<div id="html5-video-1-'.$pofo_popup_form_id.'" class="mfp-hide html5-video-1">';
                    $output .= '<video'.$autoplay.$muted.$loop.$controls.' playsinline class="pofo_popup_video">';
                        if( $pofo_popup_mp4_url ) {
                            $output .= '<source type="video/mp4" src="'.esc_url( $pofo_popup_mp4_url ).'">';
                        }
                        if( $pofo_popup_webm_url ) {
                            $output .= '<source type="video/mp4" src="'.esc_url( $pofo_popup_webm_url ).'">';
                        }
                        if( $pofo_popup_ogg_url ) {
                            $output .= '<source type="video/mp4" src="'.esc_url( $pofo_popup_ogg_url ).'">';
                        }
                    $output .= '</video>';
                $output .= '</div>';
                break;    
                
            case 'google-map-1':
                $pofo_max_width = ( $enable_responsive_video == 0 )?  $pofo_max_width : '100%';
                if( $pofo_max_width ){
                    $pofo_featured_array[] = '.mfp-iframe-holder .mfp-content{ max-width:'. $pofo_max_width .';}';
                }
                $pofo_popup_google_map_url = ! empty( $pofo_popup_google_map_url ) ? add_query_arg( 'output', 'embed', $pofo_popup_google_map_url ) : '';
                $pofo_btn_class = ! empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                if( $pofo_popup_button ) :
                    $output .='<a'.$id.' class="'.esc_attr( $class_list ).esc_attr( $pofo_btn_class ).' popup-youtube pofo-button-'.$pofo_button.'" href="'.esc_url( $pofo_popup_google_map_url ).'"'.$style.'>'.$pofo_popup_button.'</a>';
                endif;
                break;

        }
         ob_start();  
                ?>
                jQuery(document).ready(function () {
                    <?php if( $pofo_popup_type == 'youtube-video-1' || $pofo_popup_type == 'vimeo-video-1' ){ ?>
                        if($(window).width() < 1199){
                            <?php
                                if($pofo_max_width_minidesktop){ 
                                    $pofo_featured_array[] = '@media only screen and (max-width: 1199px){ .mfp-iframe-holder .mfp-content{ max-width:'. $pofo_max_width_minidesktop .';} }'; 
                                } ?> 
                        } else if($(window).width() < 767) {
                            <?php 
                                if($pofo_max_width_tablet){ 
                                    $pofo_featured_array[] = '@media only screen and (max-width: 767px){ .mfp-iframe-holder .mfp-content{ max-width:'. $pofo_max_width_tablet .';} }';
                                } ?> 
                        } else if($(window).width() < 374) {
                            <?php 
                                if($pofo_max_width_tablet){ 
                                    $pofo_featured_array[] = '@media only screen and (max-width: 374px){ .mfp-iframe-holder .mfp-content{ max-width:'. $pofo_max_width_mobile .';} }'; 
                                } ?> 
                        }
                    <?php } elseif( $pofo_popup_type == 'html5-video-1' ){ ?>
                        if($(window).width() < 1199){
                            <?php 
                                if($pofo_video_width_mini_desktop) { 
                                    $pofo_featured_array[] = '@media only screen and (max-width: 1199px){ .mfp-inline-holder .mfp-content .html5-video-1{ width:'. $pofo_video_width_mini_desktop .';} }'; 
                                } ?> 
                        } else if($(window).width() < 767) {
                            <?php
                                if($pofo_video_width_tablet) {
                                     $pofo_featured_array[] = '@media only screen and (max-width: 767px){ .mfp-inline-holder .mfp-content .html5-video-1{ width:'. $pofo_video_width_tablet .';} }'; 
                                 } ?> 
                        } else if($(window).width() < 374) {
                            <?php 
                                if($pofo_video_width_mobile) {
                                    $pofo_featured_array[] = '@media only screen and (max-width: 374px){ .mfp-inline-holder .mfp-content .html5-video-1{ width:'. $pofo_video_width_mobile .';} }'; 
                                } ?> 
                        }
                    <?php } ?>    
                });
                <?php 
                $pofo_slider_script .= ob_get_contents();
                ob_end_clean();
        return $output;
    }
}
add_shortcode( 'pofo_popup', 'pofo_popup_shortcode' );
