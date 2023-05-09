<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * @property mixed data
 */
if ( ! class_exists ( 'Pofo_Vc_Custom_Settings' ) ) {

	class Pofo_Vc_Custom_Settings {

		/**
		 * @var array
		 */
		protected $size_types = array(
									'md' => 'Medium',
									'sm' => 'Small',
									'xs' => 'Extrasmall',
								);
		/**
		 * @var array
		 */
		protected $layouts = array(
								'xs' => 'mobile-alt',
								'sm' => 'tablet-alt rotate-tablet',
								'md' => 'laptop',
							);
		/**
		 * @var array
		 */
		protected $devices_name = array(
									'xs' => 'Mobile',
									'sm' => 'Tablet',
									'md' => 'Mini desktop',
								);
		/**
		 * @var array
		 */
		protected $text_tranform = array();
		/**
		 * @var array
		 */
		protected $text_align = array();
		/**
		 * @var array
		 */
		protected $text_decoration = array();
		
        function __construct() {

            if ( function_exists( 'vc_add_shortcode_param' ) ) {
                vc_add_shortcode_param(	'responsive_font_settings', array( $this, 'pofo_font_settings' ), POFO_ADDONS_ROOT_DIR . '/pofo-shortcodes/js/responsive-font-settings.js');
            }
		}

		/**
		 * @param $settings
		 * @param $value
		 *
		 * @return string
		 */
		public function pofo_font_settings( $settings, $value ) {
			$output = '';
			$hide_element_keys 	= ! empty( $settings['hide_element_keys'] ) ? $settings['hide_element_keys'] : array();
			ob_start();
			$this->text_align = array(
									esc_html__( 'Center', 'pofo-addons' )   => 'center',
									esc_html__( 'Left', 'pofo-addons' )  => 'left',
									esc_html__( 'Right', 'pofo-addons' ) => 'right',
								);
			$this->text_tranform = array(
									esc_html__( 'Capitalize', 'pofo-addons' ) => 'capitalize',
									esc_html__( 'Lowercase', 'pofo-addons' ) => 'lowercase',
									esc_html__( 'Uppercase', 'pofo-addons' ) => 'uppercase',
									esc_html__( 'None', 'pofo-addons' ) => 'none',
								);
			$values = $this->pofo_resposive_values( $value );
			$sizes = $this->size_types;
			$layouts = $this->layouts;
			$devices_name = $this->devices_name;

			?>
			<div class="vc_column-offset" data-column-offset="true">
				<div class="pofo-font-settings-container button-container">
					<input name="<?php echo esc_attr( $settings['param_name'] ) ?>"
					       class="wpb_vc_param_value <?php echo esc_attr( $settings['param_name'] ) ?>
					<?php echo esc_attr( $settings['type'] ) ?> '_field" type="hidden" value="<?php echo esc_attr( $value ) ?>"/>
					<div class="pofo-responsive-title-wrapper">
						<?php
						$i = $j = 0;
						foreach ( $sizes as $key => $size ) : 
							$active = ( $i == 0 ) ? ' active' : '';
						?>
							<h3  class="pofo-responsive-css-heading <?php echo esc_attr( $size.$active );?>"  data-device="<?php echo esc_attr($size)?>-device">
								<i class="fas fa-<?php echo esc_attr($layouts[$key]);?>"></i>
								<span><?php echo esc_attr($devices_name[ $key ]); ?></span>
							</h3>
						<?php 
							$i++;
						endforeach;
						?>
					</div>
						<?php
						foreach ( $sizes as $key => $size ) : 
							$active1 = ( $j == 0 ) ? ' active' : '';
						?>
							<div class="<?php echo esc_attr( $size.'-device'.$active1 );?> font-setting-content tab-content">
								<div class="pofo-font-setting-wrapper">
								<?php 
								if ( ! in_array( 'text-align', $hide_element_keys ) ) {
									printf( '%s', $this->pofo_text_align( $key ,$values ) );
								}
								if ( ! in_array( 'font-size', $hide_element_keys ) ) {
									printf( '%s', $this->pofo_font_size( $key,$values ) );
								}
								if ( ! in_array( 'line-height', $hide_element_keys ) ) {
									printf( '%s', $this->pofo_font_height( $key,$values ) );
								}
								if ( ! in_array( 'letter-spacing', $hide_element_keys ) ) {
									printf( '%s', $this->pofo_font_letterspacing( $key,$values ) );
								}
								if ( ! in_array( 'font-transform', $hide_element_keys ) ) {
									printf( '%s', $this->pofo_font_transform( $key ,$values ) );
								}
								?>
								</div>
							</div>
						<?php  
							$j++; 
						endforeach;
						?>
				</div>
			</div>
			<?php
			$output .= ob_get_contents();
			ob_end_clean();
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function pofo_font_transform( $size ,$values = array() ) {

			$output = '';
			$prefix = 'text-' . $size . '-';
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'pofo-addons' ) : esc_html__( 'Inherit from smaller', 'pofo-addons' );
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Text transform', 'pofo-addons' ).'</div><select name="vc_' . $size . '_responsive_alignment" class="vc_column_offset_field" data-type="transform-' . $size . '"><option value="">'.esc_html__('Default','pofo-addons').'</option>';
			foreach ( $this->text_tranform as $label => $index ) {
				$value = $prefix . $index;
				$output .= '<option value="' . $value . '"' . selected( $values['transform_'.$size], $value, false ) . '>' . $label . '</option>';
			}
			$output .= '</select></div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function pofo_text_align( $size ,$values = array() ) {

			$output = '';
			$prefix = 'text-' . $size . '-';
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'pofo-addons' ) : esc_html__( 'Inherit from smaller', 'pofo-addons' );
			$output .= '<div class="vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Text alignment', 'pofo-addons' ).'</div><select name="vc_' . $size . '_responsive_alignment" class="vc_column_offset_field" data-type="alignment-' . $size . '"><option value="">'.esc_html__('Default','pofo-addons').'</option>';
				foreach ( $this->text_align as $label => $index ) {
					$value = $prefix . $index;
					$output .= '<option value="' . $value . '"' . selected( $values['align_'.$size], $value, false ) . '>' . $label . '</option>';
				}
			$output .= '</select></div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function pofo_font_size( $size, $values = array() ) {

			$output = '';
			$prefix = 'font_' . $size ;
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'pofo-addons' ) : esc_html__( 'Inherit from smaller', 'pofo-addons' );

			$output .= '<div class="vc_col-md-4 vc_col-sm-4 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Font size','pofo-addons').'</div><input type="text" data-type="font-' . $size . '" value="'.$values[$prefix].'"/>'.'<small class="pofo-description"> '.esc_html__( 'In pixel like 12px.','pofo-addons').'</small></div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function pofo_font_height( $size, $values = array()  ) {

			$output = '';
			$prefix = 'line_' . $size;
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'pofo-addons' ) : esc_html__( 'Inherit from smaller', 'pofo-addons' );
			$output = '<div class=" vc_col-md-4 vc_col-sm-4 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Line height','pofo-addons').'</div><input type="text" data-type="line-' . $size . '" value="'.$values[$prefix].'" /><small class="pofo-description"> '.esc_html__( 'In pixel like 20px.','pofo-addons').'</small></div>';
			return $output;
		}

		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function pofo_font_letterspacing( $size, $values = array()  ) {

			$output = '';
			$prefix = 'letter_' . $size;
			$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'pofo-addons' ) : esc_html__( 'Inherit from smaller', 'pofo-addons' );
			$output = '<div class=" vc_col-md-4 vc_col-sm-4 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Letter spacing','pofo-addons').'</div><input type="text" data-type="letter-' . $size . '" value="'.$values[$prefix].'" /><small class="pofo-description"> '.esc_html__( 'Define letter spacing like 12px.','pofo-addons').'</small></div>';
			return $output;
		}

		/**
		 * @param $value
		 *
		 * @return array
		 */
		public static function pofo_resposive_values( $value ) {

            $responsive_settings = array(
					            	'font_md' => '',
					            	'font_sm' => '', 
					            	'font_xs' => '', 
					            	'line_md' =>'' , 
					            	'line_sm' =>'',
					            	'line_xs' =>'', 
					            	'transform_md'=>'',
					            	'transform_sm'=>'',
					            	'transform_xs'=>'',
					            	'weight_md'=>'',
					            	'weight_sm'=>'',
					            	'weight_xs'=>'', 
					            	'decoration_md'=>'',
					            	'decoration_sm'=>'',
					            	'letter_md'=>'',
					            	'letter_sm'=>'',
					            	'letter_xs'=>'', 
					            	'text_decoration_md' => '',
					            	'text_decoration_sm' => '', 
					            	'align_md'=>'',
					            	'align_sm'=>'',
					            	'align_xs'=>'',
					            );

           	$value = str_replace( '},', '', explode( '{', $value ) );
			
			if ( ! empty( $value[1] ) ) {
				
				return vc_parse_multi_attribute( $value[1], $responsive_settings );
			}
			return $responsive_settings;
	    }

	    /**
		 * @param $value
		 *
		 * @return string
		 */
		public static function generate_css( $value ) {

            if ( empty( $value ) ) {
                return;
            }
            $pofo_separate_settings = explode('},', $value );

            /* Separate all settings */
            if ( ! empty( $pofo_separate_settings ) ) {

            	$res_css = $mini = $tablet = $mobile = '';
	            $positions = array( 'top', 'right', 'bottom', 'left' );
	            $res_style = array( 'mini'=>'', 'tablet' => '', 'mobile' => '' );

            	$media_query = apply_filters( 'pofo_resposive_options_breakpoints', array( 'mini' => '@media (max-width: 1199px)', 'tablet'  => '@media (max-width: 991px)', 'mobile'  => '@media (max-width: 767px)') );

	            $i = 0;
	            /* All settings loop */
            	foreach ( $pofo_separate_settings as $key => $value ) {
            		if ( ! empty($value) ) {

            			$value = str_replace( '}','', $value );
            			$value = explode( '{', $value );

            			if ( empty($value[1]) || empty($value[0]) ) {
            				continue;
            			}

            			$values = vc_parse_multi_attribute( $value[1] );
            			$selector_class = $value[0];
            			$res_style['mini'] = $res_style['tablet'] = $res_style['mobile'] = '';
            			
            			if ( ( strpos( $selector_class, 'font') !== false ) || ( strpos( $selector_class, 'button') !== false ) ) {

	            			$devices_loop_array = array( 'mini'=>'md', 'tablet'=>'sm', 'mobile'=>'xs' );

	            			/* Font settings & Button settings loop */
				            foreach ($devices_loop_array as $key => $value) {

					            if ( isset( $values['font_'.$value]) && $values['font_'.$value] != '' ) {

				            		// font-size
					                $res_style[$key] .= 'font-size: '.$values['font_'.$value].' !important;';

					            }
					            if ( isset( $values['line_'.$value]) && $values['line_'.$value] != '' ) {

					            	// line-height
				                	$res_style[$key] .= 'line-height: '.$values['line_'.$value].' !important;';

				            	}
				            	if ( isset( $values['transform_'.$value] ) && $values['transform_'.$value] != '' ) {

				            		// text-transform
					            	$text_transform = str_replace('text-'.$value.'-','',$values['transform_'.$value]);
					                $res_style[$key] .= 'text-transform: '.$text_transform.' !important;';

				            	}
				            	if ( isset( $values['letter_'.$value]) && $values['letter_'.$value] != '' ) {

				            		// letter-spacing
					                $res_style[$key] .= 'letter-spacing: '.$values['letter_'.$value].' !important;';

					            }
					            if ( isset( $values['align_'.$value] ) && $values['align_'.$value] != '' ) {

					            	// text-alignment
					            	$text_alignment = str_replace('text-'.$value.'-','',$values['align_'.$value]);
					                $res_style[$key] .= 'text-align: '.$text_alignment.' !important;';
					            }
			            	}
				        }

			            /* Generate dynamic responsive css by devices */
			            $devices = array( 'mini', 'tablet', 'mobile' );
			            foreach ( $devices as $key ) {
			            	if ( ! empty( $res_style[$key] ) && $res_style[$key] !== '' ) {
			            		${$key} .= $selector_class.'{'.$res_style[$key].'}';
			            	}
			            }
			        }
	        	}

	        	/* Combine all css by all devices */
			    $devices = array( 'mini', 'tablet', 'mobile' );
	        	foreach ( $devices as $key ) {
	        		if ( ! empty( ${$key} ) ) {
	        			${$key} = $media_query[$key].'{'. ${$key} .'}';
	        		}
	        	}

	        	$res_css .= $mini . $tablet . $mobile;
	        }

	        return $res_css;
        }

        /**
		 * @param $value
		 *
		 * @return string
		 */
		public static function generate_front_end_css( $value ) {

			if ( empty( $value ) ) {
                return;
            }

            $res_css = $mini = $tablet = $mobile = '';
            $positions = array( 'top', 'right', 'bottom', 'left' );
            $res_style = array( 'mini'=>'', 'tablet' => '', 'mobile' => '' );

        	$media_query = apply_filters( 'pofo_resposive_options_breakpoints', array( 'mini' => '@media (max-width: 1199px)', 'tablet'  => '@media (max-width: 991px)', 'mobile'  => '@media (max-width: 767px)') );

            $i = 0;
            /* All settings loop */
    		if ( ! empty($value) ) {

    			$value = str_replace( '},','', $value );
    			$value = explode( '{', $value );

    			$values = vc_parse_multi_attribute( $value[1] );
    			$selector_class = $value[0];
    			$res_style['mini'] = $res_style['tablet'] = $res_style['mobile'] = '';
    			
    			if ( ( strpos( $selector_class, 'font') !== false ) || ( strpos( $selector_class, 'button') !== false ) ) {

        			$devices_loop_array = array( 'mini'=>'md', 'tablet'=>'sm', 'mobile'=>'xs' );

        			/* Font settings & Button settings loop */
		            foreach ($devices_loop_array as $key => $value) {

			            if ( isset( $values['font_'.$value]) && $values['font_'.$value] != '' ) {

		            		// font-size
			                $res_style[$key] .= 'font-size: '.$values['font_'.$value].' !important;';

			            }
			            if ( isset( $values['line_'.$value]) && $values['line_'.$value] != '' ) {

			            	// line-height
		                	$res_style[$key] .= 'line-height: '.$values['line_'.$value].' !important;';

		            	}
		            	if ( isset( $values['transform_'.$value] ) && $values['transform_'.$value] != '' ) {

		            		// text-transform
			            	$text_transform = str_replace('text-'.$value.'-','',$values['transform_'.$value]);
			                $res_style[$key] .= 'text-transform: '.$text_transform.' !important;';

		            	}
		            	if ( isset( $values['letter_'.$value]) && $values['letter_'.$value] != '' ) {

		            		// letter-spacing
			                $res_style[$key] .= 'letter-spacing: '.$values['letter_'.$value].' !important;';

			            }
			            if ( isset( $values['align_'.$value] ) && $values['align_'.$value] != '' ) {

			            	// text-alignment
			            	$text_alignment = str_replace('text-'.$value.'-','',$values['align_'.$value]);
			                $res_style[$key] .= 'text-align: '.$text_alignment.' !important;';
			            }
	            	}
		        }

	            /* Generate dynamic responsive css by devices */
	            $devices = array( 'mini', 'tablet', 'mobile' );
	            foreach ( $devices as $key ) {
	            	if ( ! empty( $res_style[$key] ) && $res_style[$key] !== '' ) {
	            		${$key} .= $selector_class.'{'.$res_style[$key].'}';
	            	}
	            }
	        }

        	/* Combine all css by all devices */
		    $devices = array( 'mini', 'tablet', 'mobile' );
        	foreach ( $devices as $key ) {
        		if ( ! empty( ${$key} ) ) {
        			${$key} = $media_query[$key].'{'. ${$key} .'}';
        		}
        	}

        	$res_css .= $mini . $tablet . $mobile;

	        return $res_css;
        }
	}
}

new Pofo_Vc_Custom_Settings;
