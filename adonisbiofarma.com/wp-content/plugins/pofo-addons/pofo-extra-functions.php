<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    if( ! function_exists( 'pofo_meta_prefix' ) ) :
        function pofo_meta_prefix() {

            $meta_prefix = '';

            $pofodetails_theme_update_meta = get_option( 'pofodetails_theme_update_meta' );
            if( $pofodetails_theme_update_meta == '1' ) {

                $meta_prefix = '_';
            }

            return $meta_prefix;
        }
    endif;

    if( ! function_exists( 'pofo_option' ) ) :
        function pofo_option( $option, $default_value ) {
            global $post;

            $pofo_option_value = '';
            if( is_404() ){
                $pofo_option_value = get_theme_mod( $option, $default_value );
            }else{
                if( ! ( is_category() || is_archive() || is_author() || is_tag() || is_search() || is_home() ) || ( class_exists( 'WooCommerce' ) && is_shop() ) ) {

                    // Meta Prefix
                    $meta_prefix = pofo_meta_prefix();
                    if( ( class_exists( 'WooCommerce' ) && is_shop() ) ) {
                        $page_id = wc_get_page_id( 'shop' );
                        $meta_value = $meta_prefix.$option.'_single';
                    } else {
                        $page_id = $post->ID;
                        $meta_value = $meta_prefix.$option.'_single';
                    }
                    $value = get_post_meta( $page_id, $meta_value, true );
                    if( is_string( $value ) && ( strlen( $value ) > 0 || is_array( $value ) ) && ( $value != 'default' ) ) {
                        if( strtolower( $value ) == '.' ) {
                            $pofo_option_value = '';
                        } else {
                            $pofo_option_value = $value;
                        }
                    } else {
                        $pofo_option_value = get_theme_mod( $option, $default_value );
                    }
                }else{
                    $pofo_option_value = get_theme_mod( $option, $default_value );
                }
            }
            return $pofo_option_value;
        }
    endif;

    /* Check For Category Title */
    if( ! function_exists( 'pofo_category_title_option' ) ) :
        function pofo_category_title_option( $option, $default_value ) {
            
            $pofo_option_value = '';
            if( is_tax('portfolio-category') || is_tax('portfolio-tags') || is_tax('product_cat') || is_tax('product_tag') || is_tag() ) {
                $pofo_t_id = get_queried_object()->term_id;
            } else {
                $pofo_t_id = get_query_var('cat');
            }

            $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" );
            if( strlen( $pofo_term_meta[$option] ) > 0 && ( $pofo_term_meta[$option] != 'default' ) && ( is_category() || is_tag() || is_tax('portfolio-category') || is_tax('product_cat') || is_tax('portfolio-tags') || is_tax('product_tag') ) && !( is_author() || is_search() ) ) {
                $pofo_option_value = $pofo_term_meta[$option];
            } else {
                $pofo_option_value = get_theme_mod( $option, $default_value );
            }
            return $pofo_option_value;
        }
    endif;

    if( ! function_exists( 'pofo_post_meta' ) ) :
        function pofo_post_meta( $option ) {
            global $post;

            // Meta Prefix
            $meta_prefix = pofo_meta_prefix();
            $value = get_post_meta( $post->ID, $meta_prefix.$option.'_single', true);
            return $value;
        }
    endif;

    if ( ! function_exists( 'pofo_is_theme_licence_active' ) ) :
        function pofo_is_theme_licence_active() {
            $pofo_theme_active = get_option( 'pofo_theme_active' );
            if( $pofo_theme_active == 'yes' ){
                return true;
            } else {
                return false;
            }
        }
    endif;
    
    /* For Image Alt Text */
    if ( ! function_exists( 'pofo_option_image_alt' ) ) :
        function pofo_option_image_alt( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image alt is on / off */
            $pofo_image_alt = get_theme_mod( 'pofo_image_alt', '1' );

            if( $attachment_id && ( $pofo_image_alt == 1 ) ){
                /* Get attachment metadata by attachment id */
                $pofo_image_meta = array(
                    'alt' => get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ),
                );
                
                return $pofo_image_meta;
            }else{
                return;
            }
        }
    endif;

    /* For Image Title Text */
    if ( ! function_exists( 'pofo_option_image_title' ) ) :
        function pofo_option_image_title( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image title is on / off */
            $pofo_image_title = get_theme_mod( 'pofo_image_title', '0' );
            
            if( $attachment_id && ( $pofo_image_title == 1 ) ){
                /* Get attachment metadata by attachment id */
                $pofo_image_meta = array(
                    'title' =>  esc_attr( get_the_title( $attachment_id ) ),
                );
 
                return $pofo_image_meta;
            }else{
                return;
            }
        }
    endif;

    /* For Lightbox Image Title */
    if ( ! function_exists( 'pofo_option_lightbox_image_title' ) ) :
        function pofo_option_lightbox_image_title( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image title for lightbox popup */
            $pofo_image_title_lightbox_popup = get_theme_mod( 'pofo_image_title_lightbox_popup', '0' );

            if( $attachment_id && ( $pofo_image_title_lightbox_popup == 1 ) ){

                /* Get attachment metadata by attachment id */
                $attachment = get_post( $attachment_id );
                $pofo_image_meta = array(
                    'title' =>  esc_attr( get_the_title( $attachment_id ) ),
                );

                return $pofo_image_meta;
            }else{
                return;
            }
        }
    endif;

    /* For Lightbox Image Caption */
    if ( ! function_exists( 'pofo_option_lightbox_image_caption' ) ) :
        function pofo_option_lightbox_image_caption( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image alt is on / off */
            $pofo_image_caption_lightbox_popup = get_theme_mod( 'pofo_image_caption_lightbox_popup', '0' );

            if( $attachment_id && ( $pofo_image_caption_lightbox_popup == 1 ) ){
                /* Get attachment metadata by attachment id */
                $attachment = get_post( $attachment_id );
                $pofo_image_meta = array(
                    'caption' =>  esc_attr( $attachment->post_excerpt ),
                );
                
                return $pofo_image_meta;
                
            }else{
                return;
            }
        }
    endif;

    if( ! function_exists( 'pofo_post_meta' ) ) :
        function pofo_post_meta( $option ) {
            global $post;

            // Meta Prefix
            $meta_prefix = pofo_meta_prefix();
            $value = get_post_meta( $post->ID, $meta_prefix.$option.'_single', true);
            return $value;
        }
    endif;
    
    /* To get Register Sidebar list in metabox */
    if( ! function_exists( 'pofo_register_sidebar_array' ) ) :
        function pofo_register_sidebar_array() {
            global $wp_registered_sidebars;
            if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ){ 
                $sidebar_array = array();
                $sidebar_array['default'] = esc_html__( 'Default', 'pofo-addons' );
                foreach( $wp_registered_sidebars as $sidebar ){
                    $sidebar_array[$sidebar['id']] = $sidebar['name'];
                }
            }
            return $sidebar_array;
        }
    endif;

    /* To get Columns size Details */
    if( ! function_exists( 'pofo_columns_customizer_array' ) ) {
        function pofo_columns_customizer_array( $size ) {
            $output = '';
            $output = array(
                        ''                  => __( 'Default', 'pofo-addons' ),
                        'col-'.$size.'-1'   => __( '1 column - 1/12', 'pofo-addons' ),
                        'col-'.$size.'-2'   => __( '2 columns - 1/6', 'pofo-addons' ),
                        'col-'.$size.'-3'   => __( '3 columns - 1/4', 'pofo-addons' ),
                        'col-'.$size.'-4'   => __( '4 columns - 1/3', 'pofo-addons' ),
                        'col-'.$size.'-5'   => __( '5 columns - 5/12', 'pofo-addons' ),
                        'col-'.$size.'-6'   => __( '6 columns - 1/2', 'pofo-addons' ),
                        'col-'.$size.'-7'   => __( '7 columns - 7/12', 'pofo-addons' ),
                        'col-'.$size.'-8'   => __( '8 columns - 2/3', 'pofo-addons' ),
                        'col-'.$size.'-9'   => __( '9 columns - 3/4', 'pofo-addons' ),
                        'col-'.$size.'-10'  => __( '10 columns - 5/6', 'pofo-addons' ),
                        'col-'.$size.'-11'  => __( '11 columns - 11/12', 'pofo-addons' ),
                        'col-'.$size.'-12'  => __( '12 columns - 1/1', 'pofo-addons' )
                    );
            return $output;
        }
    }

    if( ! function_exists( 'pofo_remove_wpautop' ) ) :
      function pofo_remove_wpautop( $content, $force_br = true ) {
        if ( $force_br ) {
          $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
        }
        return do_shortcode( shortcode_unautop( $content ) );
      }
    endif;

    if ( ! function_exists( 'pofo_get_the_excerpt_theme' ) ) {
        function pofo_get_the_excerpt_theme($length)
        {
            return pofo_Excerpt::pofo_get_by_length($length);
        }
    }

    if ( ! function_exists( 'pofo_get_the_post_content' ) ) {
        function pofo_get_the_post_content()
        {
            return apply_filters( 'the_content', get_the_content() );
        }
    }

    if( ! function_exists( 'pofo_get_style_attribute' ) ) :
        function pofo_get_style_attribute( $style_array, $font_size, $line_height ) {
            
            $html = '';
            if( ! empty( $style_array ) ) {
                $html .= ' style="' . implode(" ", $style_array) . '"';
                if( ! empty( $font_size ) ) {
                    $html .= ' data-fontsize="'.$font_size.'"';
                }
                if( ! empty( $line_height ) ) {
                    $html .= ' data-lineheight="'.$line_height.'"';
                }
            }
            return $html;
        }
    endif;

    // [pofo_single_post_share] Shortcode.
    if ( ! function_exists( 'pofo_single_post_share_shortcode' ) ) :
        function pofo_single_post_share_shortcode( $pofo_style ) {
            global $post;

            if( !$post )
                return false;
            
            $output = $border_bottom = '';
            $pofo_single_post_disable_social_share = pofo_option( 'pofo_single_post_disable_social_share', '1' );
            $pofo_single_post_social_share = pofo_option( 'pofo_single_post_social_sharing', '' );
            $pofo_single_portfolio_share = pofo_option( 'pofo_single_portfolio_share', 'social-icon-style-3' );

            $permalink      = get_permalink( $post->ID );
            $featuredimage  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $featured_image = $featuredimage['0'];
            $post_title     = rawurlencode( get_the_title( $post->ID ) );

            ob_start();
            ?>
            <?php if( $pofo_single_post_disable_social_share == 1 && ! empty( $pofo_single_post_social_share ) ) { 
                if( is_singular('portfolio') ){
                    ?>
                     <div class="<?php echo $pofo_single_portfolio_share; ?> medium-icon">
                    <?php
                }else{
                     ?>
                    <div class="<?php echo $pofo_style['style'] ?> extra-small-icon">
                    <?php
                }
            ?>
                <ul>
                    <?php
                        $i = 0; 
                        $count = count($pofo_single_post_social_share);
                        foreach ($pofo_single_post_social_share as $key => $value) {
                            if( $i < $count ){
                                if($pofo_single_post_social_share[$i+1] == '1' ){
                                    switch($pofo_single_post_social_share[$i]){
                                        case 'facebook':?>
                                            <li><a class="social-sharing-icon facebook-f" href="//www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-facebook-f"></i><span></span></a></li>
                                        <?php break;

                                        case 'twitter':?>
                                            <li><a class="social-sharing-icon twitter" href="//twitter.com/share?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-twitter"></i><span></span></a></li>
                                        <?php break;

                                        case 'google-plus':?>
                                            <li><a class="social-sharing-icon google-plus-g" href="//plus.google.com/share?url=<?php echo $permalink; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $post_title; ?>"><i class="fab fa-google-plus-g"></i><span></span></a></li>
                                        <?php break;

                                        case 'linkedin':?>
                                            <li><a class="social-sharing-icon linkedin-in" href="//linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink; ?>&amp;title=<?php echo $post_title; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $post_title; ?>"><i class="fab fa-linkedin-in"></i><span></span></a></li>
                                        <?php break;

                                        case 'pinterest':?>
                                            <li><a class="social-sharing-icon pinterest-p" href="//pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&amp;media=<?php echo $featured_image; ?>&amp;description=<?php echo $post_title; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-pinterest-p"></i><span></span></a></li>
                                        <?php break;

                                        case 'delicious':?>
                                            <li><a class="social-sharing-icon delicious" href="//del.icio.us/post?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-delicious"></i><span></span></a></li>
                                        <?php break;

                                        case 'reddit':?>
                                            <li><a class="social-sharing-icon reddit" href="//reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-reddit"></i><span></span></a></li>
                                        <?php break;

                                        case 'stumbleupon':?>
                                            <li><a class="social-sharing-icon stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-stumbleupon"></i><span></span></a></li>
                                        <?php break;

                                        case 'digg':?>
                                            <li><a class="social-sharing-icon digg" href="//www.digg.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-digg"></i><span></span></a></li>
                                        <?php break;

                                        case 'tumblr':?>
                                            <li><a class="social-sharing-icon tumblr" href="//www.tumblr.com/share/link?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-tumblr"></i><span></span></a></li>
                                        <?php break;

                                        case 'vk':?>
                                            <li><a class="social-sharing-icon vk" href="//vk.com/share.php?url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-vk"></i><span></span></a></li>
                                        <?php break;

                                        case 'xing':?>
                                            <li><a class="social-sharing-icon xing" href="//www.xing.com/app/user?op=share&url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-xing"></i><span></span></a></li>
                                        <?php break;

                                    }
                                }
                                $i = $i + 3;
                            }
                        }
                    ?>
                </ul>
                </div>
            <?php } ?>
            <?php
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    endif;
    add_shortcode('pofo_single_post_share','pofo_single_post_share_shortcode');

    // [pofo_single_portfolio_share] Shortcode.
    if ( ! function_exists( 'pofo_single_portfolio_share_shortcode' ) ) :
        function pofo_single_portfolio_share_shortcode( $social_style ) {
            global $post;

            if( !$post )
                return false;
            
            $output = $border_bottom = '';
            $pofo_single_portfolio_disable_social_share = pofo_option( 'pofo_single_portfolio_disable_social_share', '1' );
            $pofo_single_portfolio_social_share = pofo_option( 'pofo_single_portfolio_social_sharing', '' );
            $pofo_post_share_style = pofo_option( 'pofo_post_share_style', 'social-icon-style-6' );

            $permalink      = get_permalink( $post->ID );
            $featuredimage  =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $featured_image = $featuredimage['0'];
            $post_title     = rawurlencode( get_the_title( $post->ID ) );

            ob_start();
            ?>
            <?php if( $pofo_single_portfolio_disable_social_share == 1 && ! empty( $pofo_single_portfolio_social_share ) ) { 
                 if( is_singular('portfolio') ){
                    ?>
                    <div class="<?php echo $social_style['style']; ?> medium-icon">
                    <?php
                }else{
                     ?>
                    <div class="<?php echo $pofo_post_share_style; ?> extra-small-icon">
                    <?php
                }
            ?>
                <ul>
                    <?php
                        $i = 0; 
                        $count = count($pofo_single_portfolio_social_share);
                        foreach ($pofo_single_portfolio_social_share as $key => $value) {
                            if( $i < $count ){
                                if($pofo_single_portfolio_social_share[$i+1] == '1' ){
                                    switch($pofo_single_portfolio_social_share[$i]){
                                        case 'facebook':?>
                                            <li><a class="social-sharing-icon facebook-f" href="//www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-facebook-f"></i><span></span></a></li>
                                        <?php break;

                                        case 'twitter':?>
                                            <li><a class="social-sharing-icon twitter" href="//twitter.com/share?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-twitter"></i><span></span></a></li>
                                        <?php break;

                                        case 'google-plus':?>
                                            <li><a class="social-sharing-icon google-plus-g" href="//plus.google.com/share?url=<?php echo $permalink; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $post_title; ?>"><i class="fab fa-google-plus-g"></i><span></span></a></li>
                                        <?php break;

                                        case 'linkedin':?>
                                            <li><a class="social-sharing-icon linkedin-in" href="//linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink; ?>&amp;title=<?php echo $post_title; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $post_title; ?>"><i class="fab fa-linkedin-in"></i><span></span></a></li>
                                        <?php break;

                                        case 'pinterest':?>
                                            <li><a class="social-sharing-icon pinterest-p" href="//pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&amp;media=<?php echo $featured_image; ?>&amp;description=<?php echo $post_title; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-pinterest-p"></i><span></span></a></li>
                                        <?php break;

                                        case 'delicious':?>
                                            <li><a class="social-sharing-icon delicious" href="//del.icio.us/post?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-delicious"></i><span></span></a></li>
                                        <?php break;

                                        case 'reddit':?>
                                            <li><a class="social-sharing-icon reddit" href="//reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-reddit"></i><span></span></a></li>
                                        <?php break;

                                        case 'stumbleupon':?>
                                            <li><a class="social-sharing-icon stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-stumbleupon"></i><span></span></a></li>
                                        <?php break;

                                        case 'digg':?>
                                            <li><a class="social-sharing-icon digg" href="//www.digg.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-digg"></i><span></span></a></li>
                                        <?php break;

                                        case 'tumblr':?>
                                            <li><a class="social-sharing-icon tumblr" href="//www.tumblr.com/share/link?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-tumblr"></i><span></span></a></li>
                                        <?php break;

                                        case 'vk':?>
                                            <li><a class="social-sharing-icon vk" href="//vk.com/share.php?url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-vk"></i><span></span></a></li>
                                        <?php break;

                                        case 'xing':?>
                                            <li><a class="social-sharing-icon xing" href="//www.xing.com/app/user?op=share&url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-xing"></i><span></span></a></li>
                                        <?php break;

                                    }
                                }
                                $i = $i + 3;
                            }
                        }
                    ?>
                </ul>
                </div>
            <?php } ?>
            <?php
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    endif;
    add_shortcode('pofo_single_portfolio_share','pofo_single_portfolio_share_shortcode');

    // [pofo_single_product_share] Shortcode.
    if ( ! function_exists( 'pofo_single_product_share_shortcode' ) ) :
        function pofo_single_product_share_shortcode() {
            global $post;

            if( !$post )
                return false;

            $output = $border_bottom = '';
            $pofo_single_product_enable_social_share = get_theme_mod( 'pofo_single_product_enable_social_share', '1' );
            $pofo_single_product_share_title = get_theme_mod( 'pofo_single_product_share_title', __( 'Share', 'pofo-addons' ) );
            $pofo_single_product_social_share = get_theme_mod( 'pofo_single_product_social_sharing', '' );
            $pofo_product_share_style = get_theme_mod( 'pofo_product_share_style', 'social-icon-style-7' );

            $permalink      = get_permalink( $post->ID );
            $featuredimage  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $featured_image = $featuredimage['0'];
            $product_title     = rawurlencode( get_the_title( $post->ID ) );

            ob_start();
            ?>
            <?php if( $pofo_single_product_enable_social_share == 1 && ! empty( $pofo_single_product_social_share ) && class_exists( 'WooCommerce' ) ) {/* if enable social share & WooCommerce plugin is activated */ ?>
                <div class="<?php echo $pofo_product_share_style; ?> extra-small-icon products-social-icon">
                <?php
                    if( ! empty( $pofo_single_product_share_title ) ) {
                        echo '<span class="pofo-product-sharebox-title">'.esc_attr( $pofo_single_product_share_title ).':</span>';
                    }
                ?>
                <ul>
                    <?php
                        $i = 0; 
                        $count = count($pofo_single_product_social_share);
                        foreach ($pofo_single_product_social_share as $key => $value) {
                            if( $i < $count ){
                                if($pofo_single_product_social_share[$i+1] == '1' ){
                                    switch($pofo_single_product_social_share[$i]){
                                        case 'facebook':?>
                                            <li><a class="social-sharing-icon facebook-f" href="//www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $product_title; ?>"><i class="fab fa-facebook-f"></i><span></span></a></li>
                                        <?php break;

                                        case 'twitter':?>
                                            <li><a class="social-sharing-icon twitter" href="//twitter.com/share?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $product_title; ?>"><i class="fab fa-twitter"></i><span></span></a></li>
                                        <?php break;

                                        case 'google-plus':?>
                                            <li><a class="social-sharing-icon google-plus-g" href="//plus.google.com/share?url=<?php echo $permalink; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $product_title; ?>"><i class="fab fa-google-plus-g"></i><span></span></a></li>
                                        <?php break;

                                        case 'linkedin':?>
                                            <li><a class="social-sharing-icon linkedin-in" href="//linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink; ?>&amp;title=<?php echo $product_title; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $product_title; ?>"><i class="fab fa-linkedin-in"></i><span></span></a></li>
                                        <?php break;

                                        case 'pinterest':?>
                                            <li><a class="social-sharing-icon pinterest-p" href="//pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&amp;media=<?php echo $featured_image; ?>&amp;description=<?php echo $product_title; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $product_title; ?>"><i class="fab fa-pinterest-p"></i><span></span></a></li>
                                        <?php break;

                                        case 'delicious':?>
                                            <li><a class="social-sharing-icon delicious" href="//del.icio.us/post?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($product_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-delicious"></i><span></span></a></li>
                                        <?php break;

                                        case 'reddit':?>
                                            <li><a class="social-sharing-icon reddit" href="//reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($product_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-reddit"></i><span></span></a></li>
                                        <?php break;

                                        case 'stumbleupon':?>
                                            <li><a class="social-sharing-icon stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($product_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-stumbleupon"></i><span></span></a></li>
                                        <?php break;

                                        case 'digg':?>
                                            <li><a class="social-sharing-icon digg" href="//www.digg.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($product_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-digg"></i><span></span></a></li>
                                        <?php break;

                                        case 'tumblr':?>
                                            <li><a class="social-sharing-icon tumblr" href="//www.tumblr.com/share/link?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($product_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-tumblr"></i><span></span></a></li>
                                        <?php break;

                                        case 'vk':?>
                                            <li><a class="social-sharing-icon vk" href="//vk.com/share.php?url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-vk"></i><span></span></a></li>
                                        <?php break;

                                        case 'xing':?>
                                            <li><a class="social-sharing-icon xing" href="//www.xing.com/app/user?op=share&url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-xing"></i><span></span></a></li>
                                        <?php break;

                                    }
                                }
                                $i = $i + 3;
                            }
                        }
                    ?>
                </ul>
                </div>
            <?php } ?>
            <?php
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    endif;
    add_shortcode('pofo_single_product_share','pofo_single_product_share_shortcode');

    // [pofo_login_link] Shortcode.
    if ( ! function_exists( 'pofo_login_link_shortcode' ) ) :
        function pofo_login_link_shortcode() {

            $login_page_url = $logout_page_url = '';

            /* if WooCommerce plugin is activated */
            if( class_exists( 'WooCommerce' ) ) {
                $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
                $login_page_url = get_permalink( $myaccount_page_id );
                $logout_page_url = wp_logout_url( $login_page_url );
            } else {

                $login_page_url = wp_login_url();
                $logout_page_url = wp_logout_url();
            }

            if ( is_user_logged_in() ) {

                return '<a href="'.esc_url( $logout_page_url ).'" class="pofo-login-logout-link pofo-logout">' . __( 'Logout', 'pofo-addons' ) . '</a>';

            } else {

                return '<a href="'.esc_url( $login_page_url ).'" class="pofo-login-logout-link pofo-login">' . __( 'Login', 'pofo-addons' ) . '</a>';
            }
        }
    endif;
    add_shortcode( 'pofo_login_link', 'pofo_login_link_shortcode' );

    add_shortcode( 'pofo_siteurl', 'pofo_link_replace');
    if( ! function_exists( 'pofo_link_replace' ) ) :
        function pofo_link_replace(){
            $link = home_url('/');
            return $link;
        }
    endif;

    // Get all social icons
    if( ! function_exists( 'pofo_get_social_icons' ) ) {
        function pofo_get_social_icons() {

            $social_icons = array(
                                  'facebook'    => 'facebook-f',
                                  'twitter'     => 'twitter',
                                  'gplus'       => 'google-plus-g',
                                  'dribbble'    => 'dribbble',
                                  'linkedin'    => 'linkedin-in',
                                  'instagram'   => 'instagram',
                                  'tumblr'      => 'tumblr',
                                  'pinterest'   => 'pinterest-p',
                                  'youtube'     => 'youtube',
                                  'vimeo'       => 'vimeo-v',
                                  'soundcloud'  => 'soundcloud',
                                  'flickr'      => 'flickr',
                                  'rss'         => 'rss',
                                  'reddit'      => 'reddit',
                                  'behance'     => 'behance',
                                  'vine'        => 'vine',
                                  'github'      => 'github',
                                  'xing'        => 'xing',
                                  'vk'          => 'vk',
                                  'yelp'        => 'yelp',
                                  'discord'     => 'discord',
                                  'email'       => 'envelope',
                                  'skype'       => 'skype',
                              );
            return $social_icons;
        }
    }

    // Get sorted social icons
    if( ! function_exists( 'pofo_get_sorted_social_data' ) ) {
        function pofo_get_sorted_social_data( $social_sorting, $social_data ) {

            // Get all social icons
            $social_icons = pofo_get_social_icons();

            // Check social sorting value exists
            if( ! empty( $social_sorting ) ) {

                $sorted_social_data = array();

                $pofo_social_sorting_data = explode( ',', $social_sorting );
                
                foreach( $pofo_social_sorting_data as $social_key ) {

                    if( ! empty( $social_data[$social_key] ) ) {

                        $sorted_social_data[$social_key] = $social_data[$social_key];
                    }
                }
                return $sorted_social_data;
            }
            return $social_data;
        }
    }

    if ( ! function_exists('pofo_footer_sidebar_style_classes') ) {
        function pofo_footer_sidebar_style_classes( $params ) {

            /* Check Footer Style */
            $pofo_footer_style = pofo_option( 'pofo_footer_style', 'footer-style-one' );
            if( $pofo_footer_style == 'footer-style-three' ) {

                if( $params[0]['id'] == 'sidebar-1' ) {
                    $params[0]['before_title'] = str_replace( '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );

                    $params[0]['after_title'] = str_replace( '</span></div>', '</div>', $params[0]['after_title'] );
                }
                
                $params[0]['before_title'] = str_replace( '<div class="widget-title">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );

                $params[0]['before_title'] = str_replace( '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );
            }
            if( $pofo_footer_style == 'footer-style-two' ) {

                if( $params[0]['id'] == 'sidebar-1' ) {
                    $params[0]['before_title'] = str_replace( '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );

                    $params[0]['after_title'] = str_replace( '</span></div>', '</div>', $params[0]['after_title'] );
                }
                
                $params[0]['before_title'] = str_replace( '<div class="widget-title">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );

                $params[0]['before_title'] = str_replace( '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );
            }
            if( $pofo_footer_style == 'footer-style-one' ) {

                if( $params[0]['id'] == 'sidebar-1' ) {
                    $params[0]['before_title'] = str_replace( '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', $params[0]['before_title'] );

                    $params[0]['after_title'] = str_replace( '</span></div>', '</div>', $params[0]['after_title'] );
                }
                
                $params[0]['before_title'] = str_replace( '<div class="widget-title">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', $params[0]['before_title'] );

                $params[0]['before_title'] = str_replace( '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', $params[0]['before_title'] );
            }
            
            return $params;
        }
    }

    if( ! function_exists( 'pofo_addon_footer_sidebar_style_before' ) ) {
        function pofo_addon_footer_sidebar_style_before() {

            add_filter( 'dynamic_sidebar_params', 'pofo_footer_sidebar_style_classes' );
        }
    }
    add_action( 'pofo_footer_sidebar_style_before', 'pofo_addon_footer_sidebar_style_before' );
    add_action( 'pofo_footer_sidebar_style_three_before', 'pofo_addon_footer_sidebar_style_before' );

    if( ! function_exists( 'pofo_add
        on_footer_sidebar_style_after' ) ) {
        function pofo_addon_footer_sidebar_style_after() {

            remove_filter( 'dynamic_sidebar_params', 'pofo_footer_sidebar_style_classes' );
        }
    }
    add_action( 'pofo_footer_sidebar_style_after', 'pofo_addon_footer_sidebar_style_after' );
    add_action( 'pofo_footer_sidebar_style_three_after', 'pofo_addon_footer_sidebar_style_after' );

    if ( ! function_exists('pofo_page_sidebar_style_classes') ) {
        function pofo_page_sidebar_style_classes( $params ) {
            
            /* Check if not Main Sidebar or not Shop Sidebar */
            if( !( $params[0]['id'] == 'sidebar-1' || $params[0]['id'] == 'pofo-shop-1' ) ) {
                $params[0]['before_title'] = str_replace( '<div class="widget-title">', '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>', $params[0]['before_title'] );

                $params[0]['after_title'] = str_replace( '</div>', '</span></div>', $params[0]['after_title'] );

                $params[0]['before_title'] = str_replace( '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>', $params[0]['before_title'] );

                $params[0]['after_title'] = str_replace( '</div>', '</span></div>', $params[0]['after_title'] );
            }
            
            return $params;
        }
    }

    if( ! function_exists( 'pofo_addon_page_sidebar_style_before' ) ) {
        function pofo_addon_page_sidebar_style_before() {

            add_filter( 'dynamic_sidebar_params', 'pofo_page_sidebar_style_classes' );
        }
    }
    add_action( 'pofo_page_sidebar_style_before', 'pofo_addon_page_sidebar_style_before' );

    if( ! function_exists( 'pofo_addon_page_sidebar_style_after' ) ) {
        function pofo_addon_page_sidebar_style_after() {

            remove_filter( 'dynamic_sidebar_params', 'pofo_page_sidebar_style_classes' );
        }
    }
    add_action( 'pofo_page_sidebar_style_after', 'pofo_addon_page_sidebar_style_after' );

    if ( ! function_exists( 'pofo_extract_shortcode_contents' ) ) :
        /**
         * Extract text contents from all shortcodes for usage in excerpts
         *
         * @return string The shortcode contents
         **/
        function pofo_extract_shortcode_contents( $m ) {
            global $shortcode_tags;

            // Setup the array of all registered shortcodes
            $shortcodes = array_keys( $shortcode_tags );
            $no_space_shortcodes = array( 'dropcap' );
            $omitted_shortcodes  = array( 'slide' );

            // Extract contents from all shortcodes recursively
            if ( in_array( $m[2], $shortcodes ) && ! in_array( $m[2], $omitted_shortcodes ) ) {
                $pattern = get_shortcode_regex();
                // Add space the excerpt by shortcode, except for those who should stick together, like dropcap
                $space = ' ' ;
                if ( in_array( $m[2], $no_space_shortcodes ) ) {
                    $space = '' ;
                }
                $content = preg_replace_callback( "/$pattern/s", 'pofo_extract_shortcode_contents', rtrim( $m[5] ) . $space );
                return $content;
            }

            // allow [[foo]] syntax for escaping a tag
            if ( $m[1] == '[' && $m[6] == ']' ) {
                return substr( $m[0], 1, -1 );
            }

           return $m[1] . $m[6];
        }
    endif;

    /* Get pofo font awesome icon with fa class */
    if ( ! function_exists( 'pofo_get_fontawesome_icon' ) ) {
        function pofo_get_fontawesome_icon( $pofo_fontawesome_icon ) {

            // Replace old Awesome Font Icons
            $pofo_fontawesome_solid_icon_lists  = pofo_fontawesome_solid();
            $pofo_fontawesome_reg_icon_lists    = pofo_fontawesome_reg();
            $pofo_fontawesome_brand_icon_lists  = pofo_fontawesome_brand();
            $pofo_fontawesome_light_icon_lists  = pofo_fontawesome_light();
            $pofo_fontawesome_duotone_icon_lists= pofo_fontawesome_duotone();
            $pofo_fontawesome_old_icon_lists    = pofo_fontawesome_old();

            if( ! empty( $pofo_fontawesome_icon ) ) {

                if( ! empty( $pofo_fontawesome_old_icon_lists ) && array_key_exists( $pofo_fontawesome_icon, $pofo_fontawesome_old_icon_lists ) ) {
                    
                    $pofo_fontawesome_icon = $pofo_fontawesome_old_icon_lists[$pofo_fontawesome_icon];

                } else {

                    if( ! empty( $pofo_fontawesome_solid_icon_lists ) && in_array( $pofo_fontawesome_icon, $pofo_fontawesome_solid_icon_lists ) ) {

                        $pofo_fontawesome_icon = 'fas '.$pofo_fontawesome_icon;

                    } else if( ! empty( $pofo_fontawesome_reg_icon_lists ) && in_array( $pofo_fontawesome_icon, $pofo_fontawesome_reg_icon_lists ) ) {
                        
                        $pofo_fontawesome_icon = 'far '.$pofo_fontawesome_icon;

                    } else if( ! empty( $pofo_fontawesome_brand_icon_lists ) && in_array( $pofo_fontawesome_icon, $pofo_fontawesome_brand_icon_lists ) ) {
                        
                        $pofo_fontawesome_icon = 'fab '.$pofo_fontawesome_icon;

                    } else if( ! empty( $pofo_fontawesome_light_icon_lists ) && in_array( $pofo_fontawesome_icon, $pofo_fontawesome_light_icon_lists ) ) {

                        $pofo_fontawesome_icon = 'fal '.$pofo_fontawesome_icon;

                    } else if( ! empty( $pofo_fontawesome_duotone_icon_lists ) && in_array( $pofo_fontawesome_icon, $pofo_fontawesome_duotone_icon_lists ) ) {
                        
                        $pofo_fontawesome_icon = 'fad '.$pofo_fontawesome_icon;
                    }
                }
            }
            return $pofo_fontawesome_icon;
        }
    }

    /* Add social share on product page */
    add_action( 'woocommerce_product_meta_end', 'pofo_override_woocommerce_product_meta_end' );
    if ( ! function_exists( 'pofo_override_woocommerce_product_meta_end' ) ) {
        function pofo_override_woocommerce_product_meta_end() {
            
            $pofo_single_product_enable_social_share = get_theme_mod( 'pofo_single_product_enable_social_share', '1' );
            if( $pofo_single_product_enable_social_share == 1 && function_exists( 'pofo_single_product_share_shortcode' ) ){
                echo do_shortcode("[pofo_single_product_share]");
            }
        }
    }

    if( class_exists('WP_Customize_Control') ) {

        if( ! class_exists('Pofo_Customize_switch_Control') ) {
            class Pofo_Customize_switch_Control extends WP_Customize_Control {

                public $type = 'pofo_switch';
             
                public function render_content() {

                    if ( empty( $this->choices ) )
                        return;

                    $name = '_customize-radio-' . $this->id;

                    if ( ! empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                    <?php endif;
                    ?>
                    <ul class="pofo-switch-option">
                    <?php
                        $pofo_switch_class = '';
                        foreach ( $this->choices as $value => $label ) :
                            $pofo_switch_class = ( $value == 1 ) ? 'pofo-switch-option switch-option-enable' : 'pofo-switch-option switch-option-disable';
                            $active_class = ( $this->value() == $value ) ? ' active': '';
                    ?>
                            <li class="<?php echo esc_html($pofo_switch_class); ?><?php echo esc_attr( $active_class ); ?>">
                                <label>
                                    <?php echo esc_html( $label ); ?>
                                    <input type="radio" style="display:none" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                                </label>
                            </li>
                    <?php
                        endforeach;
                    ?>
                    </ul>
                    <?php
                }
            }
        }

        if( ! class_exists('Pofo_Customize_Separator_Control') ) {
            class Pofo_Customize_Separator_Control extends WP_Customize_Control {

                public $type = 'pofo_separator';
             
                public function render_content() {

                    if ( ! empty( $this->label ) ) :
                    ?>
                    <label><h2><?php echo esc_html( $this->label ); ?></h2></label>
                    <?php
                    endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <div class="description customize-section-description"><?php echo esc_html( $this->description ); ?></div>
                    <?php endif;
                }
            }
        }
    }

    if( ! function_exists('pofo_animation_style_customizer')) {
        function pofo_animation_style_customizer() {
            $output = '';
            $output = array(
                        'default' => __( 'Default', 'pofo-addons' ),                        
                        'bounce' => __('bounce', 'pofo-addons'),
                        'flash' => __('flash', 'pofo-addons'),
                        'pulse' => __('pulse', 'pofo-addons'),
                        'rubberBand' => __('rubberBand', 'pofo-addons'),
                        'shake' => __('shake', 'pofo-addons'),
                        'swing' => __('swing', 'pofo-addons'),
                        'tada' => __('tada', 'pofo-addons'),
                        'wobble' => __('wobble', 'pofo-addons'),
                        'jello' => __('jello', 'pofo-addons'),
                        'bounceIn' => __('bounceIn', 'pofo-addons'),
                        'bounceInDown' => __('bounceInDown', 'pofo-addons'),
                        'bounceInLeft' => __('bounceInLeft', 'pofo-addons'),
                        'bounceInRight' => __('bounceInRight', 'pofo-addons'),
                        'bounceInUp' => __('bounceInUp', 'pofo-addons'),
                        'bounceOut' => __('bounceOut', 'pofo-addons'),
                        'bounceOutDown' => __('bounceOutDown', 'pofo-addons'),
                        'bounceOutLeft' => __('bounceOutLeft', 'pofo-addons'),
                        'bounceOutRight' => __('bounceOutRight', 'pofo-addons'),
                        'bounceOutUp' => __('bounceOutUp', 'pofo-addons'),
                        'fadeIn' => __('fadeIn', 'pofo-addons'),
                        'fadeInDown' => __('fadeInDown', 'pofo-addons'),
                        'fadeInDownBig' => __('fadeInDownBig', 'pofo-addons'),
                        'fadeInLeft' => __('fadeInLeft', 'pofo-addons'),
                        'fadeInLeftBig' => __('fadeInLeftBig', 'pofo-addons'),
                        'fadeInRight' => __('fadeInRight', 'pofo-addons'),
                        'fadeInRightBig' => __('fadeInRightBig', 'pofo-addons'),
                        'fadeInUp' => __('fadeInUp', 'pofo-addons'),
                        'fadeInUpBig' => __('fadeInUpBig', 'pofo-addons'),
                        'fadeOut' => __('fadeOut', 'pofo-addons'),
                        'fadeOutDown' => __('fadeOutDown', 'pofo-addons'),
                        'fadeOutDownBig' => __('fadeOutDownBig', 'pofo-addons'),
                        'fadeOutLeft' => __('fadeOutLeft', 'pofo-addons'),
                        'fadeOutLeftBig' => __('fadeOutLeftBig', 'pofo-addons'),
                        'fadeOutRight' => __('fadeOutRight', 'pofo-addons'),
                        'fadeOutRightBig' => __('fadeOutRightBig', 'pofo-addons'),
                        'fadeOutUp' => __('fadeOutUp', 'pofo-addons'),
                        'fadeOutUpBig' => __('fadeOutUpBig', 'pofo-addons'),
                        'flipInX' => __('flipInX', 'pofo-addons'),
                        'flipInY' => __('flipInY', 'pofo-addons'),
                        'flipOutX' => __('flipOutX', 'pofo-addons'),
                        'flipOutY' => __('flipOutY', 'pofo-addons'),
                        'lightSpeedIn' => __('lightSpeedIn', 'pofo-addons'),
                        'lightSpeedOut' => __('lightSpeedOut', 'pofo-addons'),
                        'rotateIn' => __('rotateIn', 'pofo-addons'),
                        'rotateInDownLeft' => __('rotateInDownLeft', 'pofo-addons'),
                        'rotateInDownRight' => __('rotateInDownRight', 'pofo-addons'),
                        'rotateInUpLeft' => __('rotateInUpLeft', 'pofo-addons'),
                        'rotateInUpRight' => __('rotateInUpRight', 'pofo-addons'),
                        'rotateOut' => __('rotateOut', 'pofo-addons'),
                        'rotateOutDownLeft' => __('rotateOutDownLeft', 'pofo-addons'),
                        'rotateOutDownRight' => __('rotateOutUpLeft', 'pofo-addons'),
                        'rotateOutUpRight' => __('rotateOutUpRight', 'pofo-addons'),
                        'hinge' => __('hinge', 'pofo-addons'),
                        'rollIn' => __('rollIn', 'pofo-addons'),
                        'rollOut' => __('rollOut', 'pofo-addons'),
                        'zoomIn' => __('zoomIn', 'pofo-addons'),
                        'zoomInDown' => __('zoomInDown', 'pofo-addons'),
                        'zoomInLeft' => __('zoomInLeft', 'pofo-addons'),
                        'zoomInRight' => __('zoomInRight', 'pofo-addons'),
                        'zoomInUp' => __('zoomInUp', 'pofo-addons'),
                        'zoomOut' => __('zoomOut', 'pofo-addons'),
                        'zoomOutDown' => __('zoomOutDown', 'pofo-addons'),
                        'zoomOutLeft' => __('zoomOutLeft', 'pofo-addons'),
                        'zoomOutRight' => __('zoomOutRight', 'pofo-addons'),
                        'zoomOutUp' => __('zoomOutUp', 'pofo-addons'),
                        'slideInDown' => __('slideInDown', 'pofo-addons'),
                        'slideInLeft' => __('slideInLeft', 'pofo-addons'),
                        'slideInRight' => __('slideInRight', 'pofo-addons'),
                        'slideInUp' => __('slideInUp', 'pofo-addons'),
                        'slideOutDown' => __('slideOutDown', 'pofo-addons'),
                        'slideOutLeft' => __('slideOutLeft', 'pofo-addons'),
                        'slideOutRight' => __('slideOutRight', 'pofo-addons'),
                        'slideOutUp' => __('slideOutUp', 'pofo-addons'),
                        );
            return $output;
        }
    }

    // Get shortcode custom css class
    if ( ! function_exists( 'pofo_shortcode_custom_css_class' ) ) {
        function pofo_shortcode_custom_css_class( $paramname = '' ) {

            global $pofo_featured_array;
            $responsive_class = '';

            // Front end editor css
            if ( vc_is_inline() ) {
                $pofo_featured_array[] = Pofo_Vc_Custom_Settings::generate_front_end_css( $paramname );
            }

            $paramname = str_replace( ',', '', $paramname );
            $responsive_class = vc_shortcode_custom_css_class( $paramname, ' ' );
            return $responsive_class;
        }
    }
