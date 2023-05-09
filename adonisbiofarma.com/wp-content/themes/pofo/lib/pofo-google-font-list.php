<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    if ( ! function_exists( 'pofo_google_font_list' ) ) {
        function pofo_googlefonts_list() {
            $pofo_google_fonts = pofo_google_font_list();
            $pofo_google_font_array = array();
            foreach ($pofo_google_fonts as $fontkey => $fontvalue) {
                $pofo_google_font_array[$fontvalue] = $fontvalue;
            }
            return $pofo_google_font_array;
        }
    }

    if ( ! function_exists( 'pofo_google_font_list' ) ) {
        function pofo_google_font_list() {

            $fonts = $googlefonts = array();
            $google_font_json = '';
            global $wp_filesystem;

            require_once ( ABSPATH . '/wp-admin/includes/file.php' );
            WP_Filesystem();

            $local_file =   POFO_THEME_LIB.'/pofo-google-font.json';
            if ( $wp_filesystem->exists( $local_file ) ) {
                $google_font_json = $wp_filesystem->get_contents( $local_file );
            }

            if ( ! empty( $google_font_json ) ) {
                $google_fonts = json_decode( $google_font_json );
                if ( ! empty( $google_fonts->items ) ) {
                    foreach( $google_fonts->items as $key => $value ) {
                        if ( ! empty( $value ) && ! empty( $value->family ) ) {
                            $googlefonts[] = $value->family;
                        }
                    }
                }
            }
            
            return apply_filters( 'pofo_google_font_lists', $googlefonts );
        }
    }