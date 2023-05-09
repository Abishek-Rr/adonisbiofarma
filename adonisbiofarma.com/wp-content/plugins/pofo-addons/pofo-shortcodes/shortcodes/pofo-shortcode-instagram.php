<?php
/**
 * Shortcode For Video & Sound
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Video & Sound */
/*-----------------------------------------------------------------------------------*/
 
if ( ! function_exists( 'pofo_instagram' ) ) {
    function pofo_instagram( $atts, $content = null ) {
        extract( shortcode_atts( array(
        	'pofo_instagram_style' => '',
            'pofo_enable_new_instagram_access_token' => '0',
            'pofo_new_instagram_access_token' => '',
            'pofo_enable_masonry' => '0',
            'pofo_instagram_column' => '',
            'pofo_instagram_type' => '',
            'pofo_instagram_feed' => '',
            'pofo_enable_video' => '',
            'pofo_enable_likes' =>'',
            'pofo_enable_comments' => '',
            'pofo_time_stamp' => '',
            'pofo_change_background_overlay_color'=>'',
            'pofo_icon_color'=>'',
            'pofo_counter_color'=>'',
            'pofo_counter_background_color'=>'',
            'pofo_animation_style'=> '',
        ), $atts ) );

        global $pofo_featured_array, $pofo_slider_script;
        $column_classes = $output = '';
        $pofo_instagram_style = ( $pofo_instagram_style ) ? $pofo_instagram_style : '';
        $pofo_instagram_column = ( $pofo_instagram_column ) ? $pofo_instagram_column : '';
        $pofo_instagram_type = ( $pofo_instagram_type ) ? ' ' . $pofo_instagram_type : '';
        $pofo_instagram_feed = ( $pofo_instagram_feed ) ? $pofo_instagram_feed : '';
        $pofo_time_stamp = ( $pofo_time_stamp ) ? $pofo_time_stamp : '';
        $pofo_animation_style = ! empty( $pofo_animation_style ) ? ' wow '.$pofo_animation_style : '';

        /* Enabel/Disable Masonary */
        $masonry_item_class = ( $pofo_enable_masonry == '1' ) ? ' grid-item' : '';
        $masonry_main_class = ( $pofo_enable_masonry == '1' ) ? ' pofo-instagram-masonary' : '';
        /* Enabel/Disable likes Counter */
        $pofo_enable_likes = ( $pofo_enable_likes == '1' ) ? '<span><i class="ti-heart"></i><span class="count-number">{{likes}}</span></span>' : '';
        /* Enabel/Disable Comments Counter */
        $pofo_enable_comments = ( $pofo_enable_comments == '1' ) ? '<span><i class="ti-comment"></i><span class="count-number">{{comments}}</span></span>' : '';

        if( ! empty( $pofo_icon_color ) ){
            $pofo_featured_array[] = '#pofo-'.$pofo_time_stamp.' .'.$pofo_instagram_style.' .insta-counts i{ color : '.$pofo_icon_color.' }';
        }
        if( ! empty( $pofo_counter_color ) ){
            $pofo_featured_array[] = '#pofo-'.$pofo_time_stamp.' .'.$pofo_instagram_style.' .insta-counts span.count-number{ color : '.$pofo_counter_color.'; }';
        }
        if( ! empty( $pofo_counter_background_color )){
            $pofo_featured_array[] = '#pofo-'.$pofo_time_stamp.' .'.$pofo_instagram_style.' .insta-counts span.count-number{ background : '.$pofo_counter_background_color.'; }';
        }
        
        if( ! empty( $pofo_new_instagram_access_token ) ) {
            $instagram_api_data = wp_remote_get( 'https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,username,timestamp,permalink,comments_count,like_count&access_token='.$pofo_new_instagram_access_token, array( 'timeout' => 200, ) );

            if ( ! is_wp_error( $instagram_api_data ) && wp_remote_retrieve_response_code( $instagram_api_data ) === 200 ) {
                $instagram_api_data = json_decode( $instagram_api_data['body'] );

                $pofo_instagram_feed = $pofo_instagram_feed != '' ? $pofo_instagram_feed : 8;
                if( $pofo_instagram_feed ) {
                    $instagram_api_data->data = array_slice( $instagram_api_data->data, 0, $pofo_instagram_feed, true );
                }
                $column_classes = '';
                if( ! empty( $instagram_api_data->data ) ) {
                    switch ( $pofo_instagram_style ) {
                        case 'instagram-style1':

                            switch ( $pofo_instagram_column ) {
                                case 'column-1':
                                    $column_classes .= ' class="col-md-12 col-sm-12 col-xs-12 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                                case 'column-2':
                                    $column_classes .= ' class="col-md-6 col-sm-6 col-xs-12 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                                case 'column-3':
                                    $column_classes .= ' class="col-md-4 col-sm-6 col-xs-12 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                                case 'column-5':
                                    $column_classes .= ' class="vc_col-md-1/5 col-sm-6 col-xs-12 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                                case 'column-6':
                                    $column_classes .= ' class="col-md-2 col-sm-4 col-xs-12 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                                case 'column-4':
                                default:
                                    $column_classes .= ' class="col-md-3 col-sm-6 col-xs-12 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                            }

                            $output .= '<div id="pofo_insta_'.$pofo_time_stamp.'" class="pofo_insta_style_1">';
                                $output .= '<div>';
                                    $output .= '<ul id="pofo-'.$pofo_time_stamp.'" class="pofo-instagram-feed'.esc_attr( $pofo_instagram_type ).esc_attr( $masonry_main_class ).esc_attr( $pofo_animation_style ).'">';
                                        if( $pofo_enable_masonry == '1' ) {
                                            $output .= '<li class="grid-sizer"></li>';
                                        }
                                        foreach( $instagram_api_data->data as $key => $instagram_data ) {
                                            if( isset( $instagram_data->media_type ) && $instagram_data->media_type == 'IMAGE' ) {
                                                $output .= '<li'.$column_classes.'>';
                                                    $output .= '<figure>';
                                                        $output .= '<a href="'.$instagram_data->permalink.'" target="_blank">';
                                                            $output .= '<img src="'.$instagram_data->media_url.'">';
                                                            if( $pofo_enable_likes == '1' || $pofo_enable_comments == '1' ) {
                                                                $output .= '<div class="insta-counts">';
                                                                    if( $pofo_enable_likes == 1 && ! empty( $instagram_data->like_count ) ) {
                                                                        $output .= '<span><i class="ti-heart"></i><span class="count-number">'.$instagram_data->like_count.'</span></span>';
                                                                    }
                                                                    if( $pofo_enable_comments == 1 && ! empty( $instagram_data->comments_count ) ) {
                                                                        $output .= '<span><i class="ti-comment"></i><span class="count-number">'.$instagram_data->comments_count.'</span></span>';
                                                                    }
                                                                $output .= '</div>';
                                                            } else {
                                                                $output .= '<div class="insta-counts">';
                                                                    $output .= '<span><i class="ti-instagram"></i></span>';
                                                                $output .= '</div>';
                                                            }
                                                        $output .= '</a>';
                                                    $output .= '</figure>';
                                                $output .= '</li>';
                                            }else if( isset( $instagram_data->media_type ) && $instagram_data->media_type == 'VIDEO' && $pofo_enable_video == '1') {
                                                $output .= '<li'.$column_classes.'>';
                                                    $output .= '<a href="'.$instagram_data->permalink.'" target="_blank">';
                                                        $output .= '<video playsinline autoplay muted loop controls>';
                                                            $output .= '<source src="'.$instagram_data->media_url.'">';
                                                            if( $pofo_enable_likes == '1' || $pofo_enable_comments == '1' ) {
                                                                $output .= '<div class="insta-counts">';
                                                                    if( $pofo_enable_likes == 1 && ! empty( $instagram_data->like_count ) ) {
                                                                        $output .= '<span><i class="ti-heart"></i><span class="count-number">'.$instagram_data->like_count.'</span></span>';
                                                                    }
                                                                    if( $pofo_enable_comments == 1 && ! empty( $instagram_data->comments_count ) ) {
                                                                        $output .= '<span><i class="ti-comment"></i><span class="count-number">'.$instagram_data->comments_count.'</span></span>';
                                                                    }
                                                                $output .= '</div>';
                                                            } else {
                                                                $output .= '<div class="insta-counts">';
                                                                    $output .= '<span><i class="ti-instagram"></i></span>';
                                                                $output .= '</div>';
                                                            }
                                                        $output .= '</video>';
                                                    $output .= '</a>';
                                                $output .= '</li>';
                                            }
                                        }
                                    $output .= '</ul>';
                                $output .= '</div>';
                            $output .= '</div>';
                            if( ! empty( $pofo_change_background_overlay_color ) ){
                                $pofo_featured_array[] = '#pofo-'.$pofo_time_stamp.' .'.$pofo_instagram_style.' a{ background : '.$pofo_change_background_overlay_color.'; }';
                            }
                        break;
                        case 'instagram-style2':
                            switch ($pofo_instagram_column) {
                                case 'column-1':
                                    $column_classes .= ' class="col-md-12 col-sm-12 col-xs-12 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                                case 'column-2':
                                    $column_classes .= ' class="col-md-6 col-sm-6 col-xs-12 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                                case 'column-3':
                                    $column_classes .= ' class="col-md-4 col-sm-4 col-xs-4 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                                case 'column-5':
                                    $column_classes .= ' class="vc_col-md-1/5 col-sm-6 col-xs-12 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                                case 'column-6':
                                    $column_classes .= ' class="col-md-2 col-sm-4 col-xs-12 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                                case 'column-4':
                                default:
                                    $column_classes .= ' class="col-md-3 col-sm-4 col-xs-4 '.$pofo_instagram_style.$masonry_item_class.'"';
                                break;
                            }
                            $output .= '<div id="pofo_insta_'.$pofo_time_stamp.'" class="pofo_insta_style_2">';
                                $output .= '<div class="instagram-follow-api">';
                                    $output .= '<ul id="pofo-'.$pofo_time_stamp.'" class="pofo-instagram-feed'.esc_attr( $pofo_instagram_type ).esc_attr( $masonry_main_class ).esc_attr( $pofo_animation_style ).'">';
                                        if( $pofo_enable_masonry == '1' ) {
                                            $output .=  '<li class="grid-sizer"></li>';
                                        }
                                        foreach( $instagram_api_data->data as $key => $instagram_data ) {
                                            if( isset( $instagram_data->media_type ) && $instagram_data->media_type == 'IMAGE' ) {
                                                $output .= '<li'.$column_classes.'>';
                                                    $output .= '<figure>';
                                                        $output .= '<a href="'.$instagram_data->permalink.'" target="_blank">';
                                                            $output .= '<img src="'.$instagram_data->media_url.'">';
                                                            if( $pofo_enable_likes == '1' || $pofo_enable_comments == '1' ) {
                                                                $output .= '<div class="insta-counts">';
                                                                    if( $pofo_enable_likes == 1 && ! empty( $instagram_data->like_count ) ) {
                                                                        $output .= '<span><i class="ti-heart"></i><span class="count-number">'.$instagram_data->like_count.'</span></span>';
                                                                    }
                                                                    if( $pofo_enable_comments == 1 && ! empty( $instagram_data->comments_count ) ) {
                                                                        $output .= '<span><i class="ti-comment"></i><span class="count-number">'.$instagram_data->comments_count.'</span></span>';
                                                                    }
                                                                $output .= '</div>';
                                                            }
                                                        $output .= '</a>';
                                                    $output .= '</figure>';
                                                $output .= '</li>';
                                            }else if( isset( $instagram_data->media_type ) && $instagram_data->media_type == 'VIDEO' && $pofo_enable_video == '1') {
                                                $output .= '<li'.$column_classes.'>';
                                                    $output .= '<a href="'.$instagram_data->permalink.'" target="_blank">';
                                                        $output .= '<video playsinline autoplay muted loop controls>';
                                                            $output .= '<source src="'.$instagram_data->media_url.'">';
                                                            if( $pofo_enable_likes == '1' || $pofo_enable_comments == '1' ) {
                                                                $output .= '<div class="insta-counts">';
                                                                    if( $pofo_enable_likes == 1 && ! empty( $instagram_data->like_count ) ) {
                                                                        $output .= '<span><i class="ti-heart"></i><span class="count-number">'.$instagram_data->like_count.'</span></span>';
                                                                    }
                                                                    if( $pofo_enable_comments == 1 && ! empty( $instagram_data->comments_count ) ) {
                                                                        $output .= '<span><i class="ti-comment"></i><span class="count-number">'.$instagram_data->comments_count.'</span></span>';
                                                                    }
                                                                $output .= '</div>';
                                                            }
                                                        $output .= '</video>';
                                                    $output .= '</a>';
                                                $output .= '</li>';
                                            }
                                        }
                                    $output .= '</ul>';
                                $output .= '</div>';
                            $output .= '</div>';
                            if( ! empty( $pofo_change_background_overlay_color ) ){
                                $pofo_featured_array[] = '.instagram-follow-api #pofo-'.$pofo_time_stamp.' li.'.$pofo_instagram_style.' figure a .insta-counts{ background : '.$pofo_change_background_overlay_color.'; }';
                            }
                        break;
                    }
                }
            }
        }
        return $output;
    }
}
add_shortcode( 'pofo_instagram', 'pofo_instagram' );