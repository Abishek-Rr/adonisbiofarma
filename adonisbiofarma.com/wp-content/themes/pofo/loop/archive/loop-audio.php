<?php
/**
 * displaying audio for archive page
 *
 * @package Pofo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

$pofo_blog_audio = pofo_post_meta('pofo_audio');
if( $pofo_blog_audio ) {
    echo '<div class="blog-image fit-videos">';
        if ( $pofo_blog_audio  ) {
            echo wp_oembed_get( $pofo_blog_audio );               
        } else {
            printf( $pofo_blog_audio );
        }
    echo '</div>';
}