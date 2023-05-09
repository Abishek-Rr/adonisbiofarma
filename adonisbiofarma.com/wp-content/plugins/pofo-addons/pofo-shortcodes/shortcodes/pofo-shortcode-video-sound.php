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
 
if ( ! function_exists( 'pofo_video_sound' ) ) {
    function pofo_video_sound( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'pofo_video_type' => '',
            'pofo_vimeo_id' => '',
            'pofo_youtube_url' => '',
            'mp4_video' => '',
            'ogg_video' => '',
            'webm_video' => '',
            'video_autoplay' => '1',
            'video_muted' => '1',
            'video_loop' => '1',
            'video_controls' => '1',
            'enable_responsive_video' => '1',
            'width' => '',
            'height' => '',
        ), $atts ) );
        $output = $style_attr = '';
        $mp4_video = ( $mp4_video ) ? $mp4_video : '';
        $ogg_video = ( $ogg_video ) ? $ogg_video : '';
        $webm_video = ( $webm_video ) ? $webm_video : '';
        $autoplay = ( $video_autoplay == 1 ) ? ' autoplay' : '';
        $muted = ( $video_muted == 1 ) ? ' muted' : '';
        $loop = ( $video_loop == 1 ) ? ' loop' : '';
        $controls = ( $video_controls == 1 ) ? ' controls' : '';
        $id = ($id) ? ' id="'.esc_attr( $id ).'"' : '';
        $video_class = ( $enable_responsive_video == 1 ) ? ' fit-videos' : ' without-fit-videos';
        $video_class .= ( $class )? ' '. $class : '';
        
        switch ($pofo_video_type) {
            case 'vimeo':
                if($pofo_vimeo_id){
                    $width = $enable_responsive_video == 1 ? '640px' : $width; // Its default width from vimeo
                    $height = $enable_responsive_video == 1 ? '360px' : $height; // Its default height from vimeo

                    if( $enable_responsive_video != 1 ) {
                        $style_attr = ( $width ) ? 'width: ' . $width . '; ' : '';
                        $style_attr .= ( $height ) ? 'height: ' . $height . '; ' : '';
                        $style_attr = ! empty( $style_attr ) ? ' style="' . $style_attr . '"' : '';
                    }

                    $width = ( $width ) ? ' width="'.$width.'"' : '';
                    $height = ( $height ) ? ' height="'.$height.'"' : '';
                    $output .= '<div'.$id.' class="pofo-vimeo '.esc_attr( $video_class ).'">';
                      $output .='<iframe'.$width.$height.' src="'.esc_url( $pofo_vimeo_id ).'" allow="fullscreen" allowFullScreen'.$style_attr.'></iframe>';
                    $output .= '</div>';
                }
            break;

            case 'youtube':
                if($pofo_youtube_url){
                    $width = $enable_responsive_video == 1 ? '560px' : $width; // Its default width from youtube
                    $height = $enable_responsive_video == 1 ? '315px' : $height; // Its default height from youtube

                    if( $enable_responsive_video != 1 ) {
                        $style_attr = ( $width ) ? 'width: ' . $width . '; ' : '';
                        $style_attr .= ( $height ) ? 'height: ' . $height . '; ' : '';
                        $style_attr = ! empty( $style_attr ) ? ' style="' . $style_attr . '"' : '';
                    }

                    $width = ( $width ) ? ' width="'.$width.'"' : '';
                    $height = ( $height ) ? ' height="'.$height.'"' : '';
                    $output .= '<div'.$id.' class="pofo-youtube '.esc_attr( $video_class ).'">';
                      $output .='<iframe'.$width.$height.' src="'.esc_url( $pofo_youtube_url ).'" allow="autoplay; fullscreen" allowFullScreen'.$style_attr.'></iframe>';
                    $output .= '</div>';
                }
            break;

            case 'html5':
                $class = ( $class ) ? ' '.$class : '';
                $output .= '<video'.$autoplay.$muted.$loop.$controls.$id.' playsinline class="pofo-html5-video'.esc_attr( $class ).'">';
                    if( $mp4_video ){
                        $output .= '<source type="video/mp4" src="'.esc_url( $mp4_video ).'">';
                    }if( $ogg_video ){
                        $output .= '<source type="video/ogg" src="'.esc_url( $ogg_video ).'">';
                    }if( $webm_video ){
                        $output .= '<source type="video/webm" src="'.esc_url( $webm_video ).'">';
                    }
                $output .= '</video>';
            break;
        }
        return $output;
    }
}
add_shortcode( 'pofo_video_sound', 'pofo_video_sound' );