<?php
/**
 * The main template file For Pofo Theme Addons.
 *
 * @package Pofo
 */
?>
<?php
/**
 * Defind Class 
 */
defined('POFO_SHORTCODE_ADDONS_URI') or define('POFO_SHORTCODE_ADDONS_URI', POFO_ADDONS_ROOT.'/pofo-shortcodes');
defined('POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER') or define('POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER', POFO_SHORTCODE_ADDONS_URI.'/extend-composer');
defined('POFO_SHORTCODE_ADDONS_SHORTCODE_URI') or define('POFO_SHORTCODE_ADDONS_SHORTCODE_URI', POFO_SHORTCODE_ADDONS_URI.'/shortcodes');
defined('POFO_SHORTCODE_ADDONS_MAP_URI') or define('POFO_SHORTCODE_ADDONS_MAP_URI', POFO_SHORTCODE_ADDONS_URI.'/maps');
defined('POFO_SHORTCODE_ADDONS_PREVIEW_IMAGE') or define('POFO_SHORTCODE_ADDONS_PREVIEW_IMAGE', POFO_ADDONS_ROOT_DIR.'/pofo-shortcodes/images/preview-image');
if(! class_exists('Pofo_Shortcodes_Addons'))
{
  class Pofo_Shortcodes_Addons
  {
    // Construct
    public function __construct()
    {
      // Load Required Style For Addons.
      add_action('init', array($this, 'init'));
    }
    public function init(){

      require_once( POFO_ADDONS_ROOT.'/pofo-shortcodes/pofo-shortcode-addons-post-like.php' );
      
      // Load Required Style For Addons.
      add_action( 'admin_enqueue_scripts', array($this,'load_custom_wp_admin_style') );
      add_action( 'admin_print_scripts-post.php',   array($this, 'load_custom_wp_admin_style'), 99);
      add_action( 'admin_print_scripts-post-new.php', array($this, 'load_custom_wp_admin_style'), 99);
      if(class_exists('Vc_Manager')){
        // Action For Add Pofo Maps And Shortcode In VC.
        add_action('init', array($this,'pofo_addons_init'),40);
      }
		add_action( 'wp_head', array( $this,'pofo_custom_css' ), 2000 );
		if ( is_admin() ) {
		    add_action( 'save_post', array( $this, 'pofo_save_custom_css' ) );
		}
    }

    public function load_custom_wp_admin_style() {
      // Enqueue Custom JS For WP Admin.*/
      wp_enqueue_script( 'pofo-custom-script',   POFO_ADDONS_ROOT_DIR . '/pofo-shortcodes/js/custom.js' , array('jquery'), '1.0', true );
    }
    
    public function pofo_addons_init() {
        $this->pofo_addons_vc_set_default_post_type();
        // Load Shortcode For Pofo Theme.
        $this->pofo_addons_vc_load_shortcodes();
        // Load Custom Maps.php For VC.
        $this->pofo_addons_vc_integration();
    }

    public function pofo_addons_vc_set_default_post_type() {
        global $vc_manager;
          
        $list = array( 'page', 'post', 'portfolio');
        $pofo_vc_default_set = $vc_manager->editorPostTypes();
        $pofo_vc_default_get = get_option( 'pofo_set_default_vc_post_type' );
        if( ( $pofo_vc_default_get != 'yes' ) && ( count($pofo_vc_default_set) == 1 )  && ( $pofo_vc_default_set[0] == 'page') ) {
            $finalArray = array_unique( array_merge( $pofo_vc_default_set, $list ) );
            sleep(1);
            $vc_manager->setEditorPostTypes( $finalArray );
            add_option( 'pofo_set_default_vc_post_type', 'yes' );
        }
    }

    public function pofo_custom_css( $id = null ) {

        $custom_css = '';

        if ( is_singular() ) {
            if ( ! $id ) {
                $id = get_the_ID();
            }
            // Check if post preview then add print preview css otherwise main css.
            if ( is_preview() && $id ) {
                $custom_css .= get_post_meta( $id, '_pofo_custom_css_preview', true );
            } elseif ( $id ) {
                $custom_css .= get_post_meta( $id, '_pofo_custom_css', true );
            }
        }

        // Added filter for custom css
        $custom_css = apply_filters( 'pofo_custom_css', $custom_css );

        if ( ! empty( $custom_css ) ) {
            echo '<style type="text/css" data-type="pofo-custom-css">';
                echo sprintf( '%s', $custom_css );
            echo '</style>';
        }
    }

    public function pofo_parseShortcodesCustomCss( $content ) {
        $css = '';
        if ( ! preg_match( '/\s*(\.[^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $content ) ) {
            return $css;
        }
        if ( class_exists( 'WPBMap' ) ) {
            WPBMap::addAllMappedShortcodes();
            preg_match_all( '/' . get_shortcode_regex() . '/', $content, $shortcodes );

            foreach ( $shortcodes[2] as $index => $tag ) {

                $shortcode = WPBMap::getShortCode( $tag );
                $attr_array = shortcode_parse_atts( trim( $shortcodes[3][ $index ] ) );
                if ( isset( $shortcode['params'] ) && ! empty( $shortcode['params'] ) ) {
                    foreach ( $shortcode['params'] as $param ) {
                        if ( isset( $param['type'] ) && 'responsive_font_settings' === $param['type'] && isset( $attr_array[ $param['param_name'] ] ) ) {
                            $css .= $attr_array[ $param['param_name'] ];
                        }
                    }
                }
            }
            foreach ( $shortcodes[5] as $shortcode_content ) {
                $css .= $this->pofo_parseShortcodesCustomCss( $shortcode_content );
            }
        }

        return $css;
    }

    public function pofo_save_custom_css( $post_id ) {
        $post_data = get_post( $post_id );
        // Check if post preview then add post meta in preview otherwise in main post meta
        if ( isset( $_POST['wp-preview'] ) && 'dopreview' == $_POST['wp-preview'] ) {
            if ( ! empty( $post_id ) ) {
                $css = $this->pofo_parseShortcodesCustomCss( $post_data->post_content );
                if ( ! empty( $css ) ) {
                    $shortcodes_custom_css = Pofo_Vc_Custom_Settings::generate_css( $css );
                    update_post_meta( $post_id, '_pofo_custom_css_preview', $shortcodes_custom_css );
                } else {
                    delete_post_meta( $post_id, '_pofo_custom_css_preview' );
                }
            }
        } else {
            if ( ! empty( $post_id ) && ! ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) {
                $css = $this->pofo_parseShortcodesCustomCss( $post_data->post_content );
                if ( ! empty( $css ) ) {
                    $shortcodes_custom_css = Pofo_Vc_Custom_Settings::generate_css( $css );
                    update_post_meta( $post_id, '_pofo_custom_css', $shortcodes_custom_css );
                } else {
                    delete_post_meta( $post_id, '_pofo_custom_css' );
                }
            }
        }
    }

    public function pofo_addons_vc_load_shortcodes()
    {
      require_once( POFO_SHORTCODE_ADDONS_URI . '/shortcodes.php' );
    }

    public function pofo_addons_vc_integration()
    {
      require_once( POFO_SHORTCODE_ADDONS_URI . '/maps.php' );
      
    }
  
} // end of class
$Pofo_Shortcodes_Addons = new Pofo_Shortcodes_Addons();
} // end of class_exists
