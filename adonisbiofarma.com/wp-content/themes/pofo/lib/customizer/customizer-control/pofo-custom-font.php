<?php
/**
 * Customizer Control: Custom Fonts
 *
 * @package Pofo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( class_exists('WP_Customize_Control') ) {

	if ( ! class_exists( 'Pofo_Custom_Font' ) ) {

		class Pofo_Custom_Font extends WP_Customize_Control {

		    /**
		     * The type of customize control being rendered.
		     *
		     * @since  1.0.0
		     * @access public
		     * @var    string
		    */
		    public $type = 'pofo_custom_font';
			public function render_content() {
			    ?>
				    <?php if ( ! empty( $this->label ) ) : ?>
			            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			        <?php endif; ?>

			        <?php if ( ! empty( $this->description ) ) : ?>
			            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			        <?php endif; ?>

				    <div id="pofo_custom_fonts">			   
					    <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>">
				    </div>
				    <div id="add_li" class="add-custom-font"></div>
				    <input type="button" class="button button-primary add_more_fonts" name="add_more_fonts" value="<?php esc_attr_e( 'Add more font', 'pofo' ); ?>">
			    <?php
			}
		}
	}
}