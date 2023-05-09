<?php
/**
 * Pofo Footer Menu Walker.
 *
 * @package Pofo
 */
?>
<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}

/*==============================================================*/
// Pofo Footer Menu Front walkar
/*==============================================================*/

if( ! class_exists( 'Pofo_Footer_Menu_Walker' ) ) {

    class Pofo_Footer_Menu_Walker extends Walker_Nav_Menu {

        public $get_first_level_menu_id = '';

        /**
         * Starts the list before the elements are added.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"sub-menu\">\n";
        }

        /**
         * Ends the list of after the elements are added.
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {

            if( $depth == 0){
                $this->get_first_level_menu_id = '';
            }

            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }

        /**
         * Start the element output.
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            // Get All Postmeta Of Current Item
            $col_setting = '';
            $pofo_mega_menu_item_status       = get_post_meta( $item->ID, '_pofo_mega_menu_item_status', true );
            $pofo_mega_menu_single_item_status= get_post_meta( $item->ID, '_pofo_mega_menu_single_item_status', true );
            $pofo_menu_item_icon             = get_post_meta( $item->ID, '_pofo_menu_item_icon', true );

            // Replace old Awesome Font Icons
            $pofo_menu_item_icon = pofo_get_fontawesome_icon( $pofo_menu_item_icon );

            if( $depth == 0 && $pofo_mega_menu_single_item_status != 'enabled' ){
                $this->get_first_level_menu_id = $item->ID;
            }

            //Get parent data third level
            $pofo_get_first_level_status = get_post_meta( $this->get_first_level_menu_id, '_pofo_mega_menu_item_status', true );

            /**
             * Filter the CSS class(es) applied to a menu item's list item element.
             */
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) .'"' : '';

            /**
             * Filter the ID applied to a menu item's list item element.
             */
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : 'javascript:void(0);';
            
            /**
             * Filter the HTML attributes applied to a menu item's anchor element.
             */
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = $icon_attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;
            
              if( $pofo_mega_menu_single_item_status == 'enabled' && $pofo_mega_menu_item_status != 'enabled' ) {
                  $atts['class']   = 'inner-link';
              }

              $item_output .= '<a'. $attributes .'>';
              if( $pofo_menu_item_icon != '1' && $depth == 0 ) {
                  $item_output .= '<i class="'.$pofo_menu_item_icon.' margin-5px-right menu-icon-left"></i>';
              }

              if( $pofo_menu_item_icon != '1' && $depth == 1 ){
                  $item_output .= '<i class="'.$pofo_menu_item_icon.' margin-5px-right menu-icon-left"></i>';
              }

              if( $pofo_menu_item_icon != '1' && $depth == 2 ){
                  $item_output .= '<i class="'.$pofo_menu_item_icon.' margin-5px-right menu-icon-left"></i>';
              }

              $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
              $item_output .= '</a>';
          
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        /**
         * Ends the element output, if needed.
         */
        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
            $output .= "</li>\n";
        }

    }
}