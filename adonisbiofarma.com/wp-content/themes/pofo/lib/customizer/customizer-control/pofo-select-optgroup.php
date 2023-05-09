<?php
/**
 * Customizer Control : Select control with optgroup
 *
 * @package Pofo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( class_exists('WP_Customize_Control') ) {

	if ( ! class_exists( 'Pofo_Select_Optgroup' ) ) {

		class Pofo_Select_Optgroup extends WP_Customize_Control {

		    public $type = 'pofo_select';
			public function render_content() {
				$input_id         = '_customize-input-' . $this->id;
				$description_id   = '_customize-description-' . $this->id;
				$describedby_attr = ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : '';
			    ?>
				<?php if ( ! empty( $this->label ) ) : ?>
					<label for="<?php echo esc_attr( $input_id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
				<?php endif; ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>

				<select id="<?php echo esc_attr( $input_id ); ?>" <?php echo sprintf( '%s', $describedby_attr ); ?> <?php $this->link(); ?>>
					<?php
					echo '<option value="">' . esc_html__( 'Select', 'pofo' ) . '</option>';
					foreach ( $this->choices as $label => $values ) {

						echo '<optgroup label="'.ucfirst( esc_attr( $label ) ).'">';
							foreach ( $values as $key => $value ) {
								echo '<option value="' . esc_attr( $key ) . '"' . selected( $this->value(), $value, false ) . '>' . $value . '</option>';
							}
						echo '</optgroup>';
					}
					?>
				</select>
				<?php
			}
		}
	}
}