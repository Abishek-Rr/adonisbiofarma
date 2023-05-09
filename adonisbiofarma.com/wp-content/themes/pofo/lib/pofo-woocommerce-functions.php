<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( class_exists( 'WooCommerce' ) ) {

    /* Remove default woocommerce sidebar */
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

    /* To get Product Attribute list in Customize */
    if( ! function_exists( 'pofo_product_attribute_customizer_array' ) ) :
        function pofo_product_attribute_customizer_array() {
            
            $attribute_array      = array();
            $attribute_taxonomies = wc_get_attribute_taxonomies();

            if ( ! empty($attribute_taxonomies) ) {
                foreach ( $attribute_taxonomies as $tax ) {
                    if ( taxonomy_exists( wc_attribute_taxonomy_name( $tax->attribute_name ) ) ) {
                        $attribute_array[ $tax->attribute_name ] = $tax->attribute_name;
                    }
                }
            }
            return $attribute_array;
        }
    endif;

    /* To Remove woocommerce_breadcrumb Action And Add New Action For WooCommerce Breadcrumb */
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    add_action( 'pofo_woocommerce_breadcrumb', 'pofo_woocommerce_breadcrumb', 20, 0 );
    if ( ! function_exists( 'pofo_woocommerce_breadcrumb' ) ) {
        function pofo_woocommerce_breadcrumb( $args = array() ) {
            $args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
                'delimiter'   => '',
                'wrap_before' => '',
                'wrap_after'  => '',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'Home', 'breadcrumb', 'pofo' ),
            ) ) );

            $breadcrumbs = new WC_Breadcrumb();

            if ( ! empty( $args['home'] ) ) {
                $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
            }

            $args['breadcrumb'] = $breadcrumbs->generate();

            /**
             * WooCommerce Breadcrumb hook
             *
             * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
             */
            do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

            wc_get_template( 'global/breadcrumb.php', $args );
        }
    }

    /* WordPress Shop Rich Snippet Code */
    add_action( 'woocommerce_before_shop_loop', 'pofo_override_woocommerce_before_shop_loop' );
    if ( ! function_exists( 'pofo_override_woocommerce_before_shop_loop' ) ) {
        function pofo_override_woocommerce_before_shop_loop() {

            if( is_shop() ) { // Check if product shop page

                $output = '';
                $output .= '<div class="pofo-rich-snippet display-none">';
                    $output .= '<span class="entry-title">'.woocommerce_page_title( false ).'</span>';
                    $output .= '<span class="author vcard"><a class="url fn n" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></span>';
                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                $output .= '</div>';
                echo wp_kses_post( $output );
            }
        }
    }

    /* WordPress Product Rich Snippet Code */
    add_action( 'woocommerce_before_single_product_summary', 'pofo_override_woocommerce_after_shop_loop_item' );
    add_action( 'woocommerce_after_shop_loop_item', 'pofo_override_woocommerce_after_shop_loop_item' );
    if ( ! function_exists( 'pofo_override_woocommerce_after_shop_loop_item' ) ) {
        function pofo_override_woocommerce_after_shop_loop_item() {

            $output = '';
            $output .= '<div class="pofo-rich-snippet display-none">';
                $output .= '<span class="entry-title">'.get_the_title().'</span>';
                
                $output .= '<span class="author vcard"><a class="url fn n" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></span>';
                $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
            $output .= '</div>';
            echo wp_kses_post( $output );
        }
    }
    
    /* WordPress Wp Action */
    add_action( 'wp', 'pofo_wp_hook' );
    if ( ! function_exists( 'pofo_wp_hook' ) ) {
        function pofo_wp_hook() {

            if ( ! is_admin() && is_product() ) {

                /* To Remove product title */
                $pofo_single_product_enable_title = get_theme_mod( 'pofo_single_product_enable_title', '1' );
                if( $pofo_single_product_enable_title != 1 ) {
                    remove_action ('woocommerce_single_product_summary', 'woocommerce_template_single_title',5);
                }

                /* On / Off setting for related products */
                $pofo_single_product_enable_related = get_theme_mod( 'pofo_single_product_enable_related', '1' );
                if( $pofo_single_product_enable_related != 1 ) {
                    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
                }

                /* On / Off setting for Up Sells products */
                $pofo_single_product_enable_up_sells = get_theme_mod( 'pofo_single_product_enable_up_sells', '1' );
                if( $pofo_single_product_enable_up_sells != 1 ) {
                    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
                }
            }

            if ( ! is_admin() && is_cart() ) {

                /* On / Off setting for Cross Sells products */
                $pofo_single_product_enable_cross_sells = get_theme_mod( 'pofo_single_product_enable_cross_sells', '1' );
                if( $pofo_single_product_enable_cross_sells != 1 ) {
                    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
                }
            }
        }
    }

    /* To Remove product star rating */
    add_filter( 'woocommerce_product_get_rating_html', 'pofo_override_woocommerce_product_get_rating_html', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_product_get_rating_html' ) ) {
        function pofo_override_woocommerce_product_get_rating_html( $star_rating_html ) {
            if ( ! is_admin() ) {

                if( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) {

                    $pofo_product_archive_enable_star_rating = get_theme_mod( 'pofo_product_archive_enable_star_rating', '1' );
                    if( $pofo_product_archive_enable_star_rating != '1' ) {
                        return false;
                    }
                }
            }
            return $star_rating_html;
        }
    }

    /* To Remove product short description */
    add_filter( 'woocommerce_short_description', 'pofo_override_woocommerce_short_description', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_short_description' ) ) {
        function pofo_override_woocommerce_short_description( $short_description ) {
            if ( ! is_admin() && is_product() ) {
                $pofo_single_product_enable_short_description = get_theme_mod( 'pofo_single_product_enable_short_description', '1' );
                if( $pofo_single_product_enable_short_description != '1' ) {
                    return false;
                }
            }
            return $short_description;
        }
    }

    /* To Remove product SKU */
    add_filter( 'wc_product_sku_enabled', 'pofo_override_product_page_skus', 99 );
    if ( ! function_exists( 'pofo_override_product_page_skus' ) ) {
        function pofo_override_product_page_skus( $enabled ) {
            if ( ! is_admin() && is_product() ) {
                $pofo_single_product_enable_sku = get_theme_mod( 'pofo_single_product_enable_sku', '1' );
                if( $pofo_single_product_enable_sku != '1' ) {
                    return false;
                }
            }
            return $enabled;
        }
    }

    /* To Remove Tab Content Heading */
    add_filter( 'woocommerce_product_description_heading', 'pofo_override_woocommerce_product_tab_content_heading', 99 );
    add_filter( 'woocommerce_product_additional_information_heading', 'pofo_override_woocommerce_product_tab_content_heading', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_product_tab_content_heading' ) ) {
        function pofo_override_woocommerce_product_tab_content_heading( $heading ) {
            if ( ! is_admin() && is_product() ) {
                $pofo_single_product_enable_tab_content_heading = get_theme_mod( 'pofo_single_product_enable_tab_content_heading', '1' );
                if( $pofo_single_product_enable_tab_content_heading != '1' ) {
                    return false;
                }
            }
            return $heading;
        }
    }

    /* Add product per page & no. of column for related products */
    add_filter( 'woocommerce_output_related_products_args', 'pofo_override_woocommerce_output_related_products_args', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_output_related_products_args' ) ) {
        function pofo_override_woocommerce_output_related_products_args( $args ) {
            
            $pofo_single_product_no_of_products_related = get_theme_mod( 'pofo_single_product_no_of_products_related', '3' );
            $pofo_single_product_no_of_columns_related = get_theme_mod( 'pofo_single_product_no_of_columns_related', '3' );

            if( ! empty( $pofo_single_product_no_of_products_related ) ) {
                $args['posts_per_page'] = esc_attr( $pofo_single_product_no_of_products_related );
            }
            if( ! empty( $pofo_single_product_no_of_columns_related ) ) {
                $args['columns'] = esc_attr( $pofo_single_product_no_of_columns_related );
            }

            return $args;
        }
    }

    /* Add product per page & no. of column for Up Sells products */
    add_filter( 'woocommerce_upsell_display_args', 'pofo_override_woocommerce_upsell_display_args', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_upsell_display_args' ) ) {
        function pofo_override_woocommerce_upsell_display_args( $args ) {
            
            $pofo_single_product_no_of_products_up_sells = get_theme_mod( 'pofo_single_product_no_of_products_up_sells', '3' );
            $pofo_single_product_no_of_columns_up_sells = get_theme_mod( 'pofo_single_product_no_of_columns_up_sells', '3' );

            if( ! empty( $pofo_single_product_no_of_products_up_sells ) ) {
                $args['posts_per_page'] = esc_attr( $pofo_single_product_no_of_products_up_sells );
            }
            if( ! empty( $pofo_single_product_no_of_columns_up_sells ) ) {
                $args['columns'] = esc_attr( $pofo_single_product_no_of_columns_up_sells );
            }

            return $args;
        }
    }

    /* Add product no. of column for Cross Sells products */
    add_filter( 'woocommerce_cross_sells_columns', 'pofo_override_woocommerce_cross_sells_columns', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_cross_sells_columns' ) ) {
        function pofo_override_woocommerce_cross_sells_columns( $no_of_columns ) {
            
            $pofo_single_product_no_of_columns_cross_sells = get_theme_mod( 'pofo_single_product_no_of_columns_cross_sells', '2' );
            if( ! empty( $pofo_single_product_no_of_columns_cross_sells ) ) {
                $no_of_columns = esc_attr( $pofo_single_product_no_of_columns_cross_sells );
            }

            return $no_of_columns;
        }
    }

    /* Add product per page for Cross Sells products */
    add_filter( 'woocommerce_cross_sells_total', 'pofo_override_woocommerce_cross_sells_total', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_cross_sells_total' ) ) {
        function pofo_override_woocommerce_cross_sells_total( $per_page ) {
            
            $pofo_single_product_no_of_products_cross_sells = get_theme_mod( 'pofo_single_product_no_of_products_cross_sells', '2' );
            if( ! empty( $pofo_single_product_no_of_products_cross_sells ) ) {
                $per_page = esc_attr( $pofo_single_product_no_of_products_cross_sells );
            }

            return $per_page;
        }
    }

    /* Add dynamic class for no. of columns */
    add_filter( 'post_class', 'pofo_override_wc_product_post_class', 99, 3 );
    if ( ! function_exists( 'pofo_override_wc_product_post_class' ) ) {
        function pofo_override_wc_product_post_class( $classes, $class = '', $post_id = '' ) {
            if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ) ) ) {
                return $classes;
            }

            $product = wc_get_product( $post_id );

            if ( $product && ! is_admin() ) {

                global $woocommerce_loop;

                $columns = isset( $woocommerce_loop['columns'] ) ? $woocommerce_loop['columns'] : '';

                // Added Custom No. of column dynamic class
                $classes[] = 'pofo-product-'.$columns.'col';
            }

            return $classes;
        }
    }

    /* Add no. of column for shop or archive page */
    add_filter( 'loop_shop_columns', 'pofo_override_loop_shop_columns', 99 );
    if ( ! function_exists( 'pofo_override_loop_shop_columns' ) ) {
        function pofo_override_loop_shop_columns( $no_of_columns ) {
            
            $pofo_product_archive_page_column = get_theme_mod( 'pofo_product_archive_page_column', '3' );
            if( ! empty( $pofo_product_archive_page_column ) ) {
                $no_of_columns = esc_attr( $pofo_product_archive_page_column );
            }

            return $no_of_columns;
        }
    }

    /* Add product per page for shop or archive page */
    add_filter( 'loop_shop_per_page', 'pofo_override_loop_shop_per_page', 99 );
    if ( ! function_exists( 'pofo_override_loop_shop_per_page' ) ) {
        function pofo_override_loop_shop_per_page( $per_page ) {
            
            $pofo_product_archive_page_per_page = get_theme_mod( 'pofo_product_archive_page_per_page', '12' );
            if( ! empty( $pofo_product_archive_page_per_page ) ) {
                $per_page = esc_attr( $pofo_product_archive_page_per_page );
            }

            return $per_page;
        }
    }

    /* Add mini cart counter */
    if ( ! function_exists( 'pofo_start_mini_cart_counter' ) ) {
        function pofo_start_mini_cart_counter() {
            $pofo_enable_header_mini_cart_counter  = pofo_option( 'pofo_enable_header_mini_cart_counter', '0' );
            $mini_cart_counter_active_class = $pofo_enable_header_mini_cart_counter == '1' ? ' pofo-mini-cart-counter-active' : '';
            ?>
                <div class="pofo-mini-cart-wrapper<?php echo esc_attr( $mini_cart_counter_active_class ); ?>">
                    <div class="pofo-mini-cart-counter-wrap">
                        <i class="fas fa-shopping-cart pofo-cart-icon"></i>
                        <?php if( $pofo_enable_header_mini_cart_counter == '1' ) { ?>
                            <span class="pofo-mini-cart-counter alt-font"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        <?php } ?>
                    </div>
                </div>
                <div class="pofo-mini-cart-content-wrapper<?php echo esc_attr( $mini_cart_counter_active_class ); ?>">
            <?php
        }
    }
    add_action( 'woocommerce_before_mini_cart', 'pofo_start_mini_cart_counter' );

    if ( ! function_exists( 'pofo_end_mini_cart_counter' ) ) {
        function pofo_end_mini_cart_counter() {
            ?>
                </div><!-- .pofo-mini-cart-content-wrapper -->
            <?php
        }
    }
    add_action( 'woocommerce_after_mini_cart', 'pofo_end_mini_cart_counter' );
}