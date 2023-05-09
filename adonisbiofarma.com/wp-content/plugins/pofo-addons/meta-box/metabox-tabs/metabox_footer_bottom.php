<?php
/**
 * Metabox For Footer.
 *
 * @package Pofo
 */
?>
<?php
pofo_after_main_separator_start(
	    'separator_main_start',
	    ''
	);
pofo_meta_box_separator(
    	'pofo_footer_bottom_separator_single',
    	esc_html__( 'General', 'pofo-addons' )
	);
pofo_after_inner_separator_start(
 	 'separator_start',
 	 ''
	); 
pofo_meta_box_dropdown('pofo_disable_footer_bottom_single',
				esc_html__('Footer Bottom', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown('pofo_footer_bottom_style_single',
				esc_html__('Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'footer-bottom-style-1' => esc_html__('Footer bottom style 1', 'pofo-addons'),
					  'footer-bottom-style-2' => esc_html__('Footer bottom style 2', 'pofo-addons'),					  
					 )
			);
pofo_meta_box_dropdown('pofo_footer_bottom_container_fluid_single',
				esc_html__('Container Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('Fluid / Full Width', 'pofo-addons'),
					  '0' => esc_html__('Fixed', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown('pofo_disable_footer_bottom_left_single',
				esc_html__('Left Part', 'pofo-addons'),
				array(
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_textarea('pofo_footer_bottom_left_text_single',
				esc_html__('Left Text', 'pofo-addons'),
				'',
				'',
				array( 'element' => 'pofo_disable_footer_bottom_left_single', 'value' => array('1'))
			);
pofo_meta_box_dropdown('pofo_disable_footer_bottom_right_single',
				esc_html__('Right Part', 'pofo-addons'),
				array(
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_textarea('pofo_footer_bottom_right_text_single',
				esc_html__('Right Text', 'pofo-addons'),
				'',
				'',
				array( 'element' => 'pofo_disable_footer_bottom_right_single', 'value' => array('1'))
			);
pofo_meta_box_dropdown('pofo_footer_bottom_padding_setting_single',
				esc_html__('Padding Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'small-padding' => esc_html__('Small Padding', 'pofo-addons'),
					  'medium-padding' => esc_html__('Medium Padding', 'pofo-addons'),
					  'large-padding' => esc_html__('Large Padding', 'pofo-addons'),
					 )
			);
pofo_meta_box_text( 'pofo_footer_bottom_left_text_font_size_single', 
          esc_html__('Left Text Font Size', 'pofo-addons'),
          'Add font size like 12px.',
          '',
          array( 'element' => 'pofo_disable_footer_bottom_left_single', 'value' => array('1'))
        );
pofo_meta_box_text( 'pofo_footer_bottom_left_text_line_height_single', 
          esc_html__('Left Text Line Height', 'pofo-addons'),
          'Add line height like 12px.',
          '',
          array( 'element' => 'pofo_disable_footer_bottom_left_single', 'value' => array('1'))
        );
pofo_meta_box_text( 'pofo_footer_bottom_left_text_letter_spacing_single', 
          esc_html__('Left Text Character Spacing', 'pofo-addons'),
          'Add letter spacing like 1px.',
          '',
          array( 'element' => 'pofo_disable_footer_bottom_left_single', 'value' => array('1'))
        );
pofo_meta_box_text( 'pofo_footer_bottom_right_text_font_size_single', 
          esc_html__('Right Text Font Size', 'pofo-addons'),
          'Add font size like 12px.',
          '',
          array( 'element' => 'pofo_disable_footer_bottom_right_single', 'value' => array('1'))
        );
pofo_meta_box_text( 'pofo_footer_bottom_right_text_line_height_single', 
          esc_html__('Right Text Line Height', 'pofo-addons'),
          'Add line height like 12px.',
          '',
          array( 'element' => 'pofo_disable_footer_bottom_right_single', 'value' => array('1'))
        );
pofo_meta_box_text( 'pofo_footer_bottom_right_text_letter_spacing_single', 
          esc_html__('Right Text Character Spacing', 'pofo-addons'),
          'Add letter spacing like 1px.',
          '',
          array( 'element' => 'pofo_disable_footer_bottom_right_single', 'value' => array('1'))
        );
pofo_before_inner_separator_end(
      'separator_end',
      ''
    );
pofo_meta_box_separator(
		'pofo_footer_bottom_color_single',
		esc_html__( 'Color Settings', 'pofo-addons' )
	);
pofo_after_inner_separator_start(
 	 'separator_start',
 	 ''
	);
pofo_meta_box_colorpicker( 'pofo_footer_bottom_bg_color_single',
		esc_html__( 'Background Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_bottom_text_color_single',
		esc_html__( 'Text Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_bottom_link_color_single',
		esc_html__( 'Link Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_bottom_link_hover_color_single',
		esc_html__( 'Link Hover Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_bottom_border_color_single',
		esc_html__( 'Horizontal Separator Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_footer_bottom_style_single', 'value' => array( 'default', 'footer-bottom-style-1' ))
	);
pofo_before_inner_separator_end(
      'separator_end',
      ''
    );
pofo_before_main_separator_end(
      'separator_main_end',
      ''
    );