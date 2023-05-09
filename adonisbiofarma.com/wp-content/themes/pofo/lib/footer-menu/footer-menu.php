<?php
	/**
 	 * Pofo Footer Menu Class.
     *
     * @package Pofo
    */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

	/**
	 * Defind Footer Menu Class 
	 */
	
	if( ! class_exists( 'Pofo_Footer_Menu' ) ) {
  
  		class Pofo_Footer_Menu {

			public function __construct() {
      			add_action( 'init', array( $this, 'pofo_footer_menu_init' ), 40 );
    		}

			public function pofo_footer_menu_init() {
				get_template_part( 'lib/footer-menu/footer-menu-addon' );
	    	}
	  	}
	  	
		$Pofo_Footer_Menu = new Pofo_Footer_Menu();
	}