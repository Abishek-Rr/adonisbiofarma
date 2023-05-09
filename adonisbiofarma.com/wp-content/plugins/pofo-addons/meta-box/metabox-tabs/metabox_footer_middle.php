<?php
/**
 * Metabox For Footer.
 *
 * @package Pofo
 */
?>
<?php

$pofo_desktop_columns = pofo_columns_customizer_array( 'lg' );
$pofo_mini_desktop_columns = pofo_columns_customizer_array( 'md' );
$pofo_ipad_columns = pofo_columns_customizer_array( 'sm' );
$pofo_mobile_columns = pofo_columns_customizer_array( 'xs' );
pofo_after_main_separator_start(
	    'separator_main_start',
	    ''
	);
pofo_meta_box_separator(
	    'pofo_footer_middle_separator_single',
	    esc_html__( 'General', 'pofo-addons' )
	);
pofo_after_inner_separator_start(
	  'separator_start',
	  ''
	);

pofo_meta_box_dropdown('pofo_disable_footer_single',
				esc_html__('Footer', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown('pofo_footer_style_single',
				esc_html__('Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'footer-style-one' => esc_html__('Footer Style 1', 'pofo-addons'),
					  'footer-style-two' => esc_html__('Footer Style 2', 'pofo-addons'),
					  'footer-style-three' => esc_html__('Footer Style 3', 'pofo-addons'),
					  'footer-style-four' => esc_html__('Footer Style 4', 'pofo-addons'),
					 )
			);
pofo_meta_box_dropdown('pofo_footer_container_fluid_single',
				esc_html__('Container Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('Fluid / Full Width', 'pofo-addons'),
					  '0' => esc_html__('Fixed', 'pofo-addons')
					 )
			);
$pofo_sidebar_array = pofo_register_sidebar_array();
pofo_meta_box_dropdown('pofo_disable_footer_sidebar1_single',
				esc_html__('Column 1 Sidebar?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar1_single',
				esc_html__('Column 1 Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar1_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar1_desktop_column_single',
				esc_html__('Sidebar 1 Column ( Desktop )', 'pofo-addons'),
				$pofo_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar1_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar1_mini_desktop_column_single',
				esc_html__('Sidebar 1 Column ( Mini Desktop )', 'pofo-addons'),
				$pofo_mini_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar1_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar1_ipad_column_single',
				esc_html__('Sidebar 1 Column ( Ipad )', 'pofo-addons'),
				$pofo_ipad_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar1_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar1_mobile_column_single',
				esc_html__('Sidebar 1 Column ( Mobile )', 'pofo-addons'),
				$pofo_mobile_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar1_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown('pofo_disable_footer_sidebar2_single',
				esc_html__('Column 2 Sidebar?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar2_single',
				esc_html__('Column 2 Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar2_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar2_desktop_column_single',
				esc_html__('Sidebar 2 Column ( Desktop )', 'pofo-addons'),
				$pofo_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar2_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar2_mini_desktop_column_single',
				esc_html__('Sidebar 2 Column ( Mini Desktop )', 'pofo-addons'),
				$pofo_mini_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar2_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar2_ipad_column_single',
				esc_html__('Sidebar 2 Column ( Ipad )', 'pofo-addons'),
				$pofo_ipad_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar2_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar2_mobile_column_single',
				esc_html__('Sidebar 2 Column ( Mobile )', 'pofo-addons'),
				$pofo_mobile_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar2_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown('pofo_disable_footer_sidebar3_single',
				esc_html__('Column 3 Sidebar?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar3_single',
				esc_html__('Column 3 Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar3_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar3_desktop_column_single',
				esc_html__('Sidebar 3 Column ( Desktop )', 'pofo-addons'),
				$pofo_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar3_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar3_mini_desktop_column_single',
				esc_html__('Sidebar 3 Column ( Mini Desktop )', 'pofo-addons'),
				$pofo_mini_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar3_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar3_ipad_column_single',
				esc_html__('Sidebar 3 Column ( Ipad )', 'pofo-addons'),
				$pofo_ipad_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar3_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar3_mobile_column_single',
				esc_html__('Sidebar 3 Column ( Mobile )', 'pofo-addons'),
				$pofo_mobile_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar3_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown('pofo_disable_footer_sidebar4_single',
				esc_html__('Column 4 Sidebar?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar4_single',
				esc_html__('Column 4 Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar4_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar4_desktop_column_single',
				esc_html__('Sidebar 4 Column ( Desktop )', 'pofo-addons'),
				$pofo_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar4_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar4_mini_desktop_column_single',
				esc_html__('Sidebar 4 Column ( Mini Desktop )', 'pofo-addons'),
				$pofo_mini_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar4_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar4_ipad_column_single',
				esc_html__('Sidebar 4 Column ( Ipad )', 'pofo-addons'),
				$pofo_ipad_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar4_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar4_mobile_column_single',
				esc_html__('Sidebar 4 Column ( Mobile )', 'pofo-addons'),
				$pofo_mobile_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar4_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown('pofo_disable_footer_sidebar5_single',
				esc_html__('Column 5 Sidebar?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar5_single',
				esc_html__('Column 5 Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar5_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar5_desktop_column_single',
				esc_html__('Sidebar 5 Column ( Desktop )', 'pofo-addons'),
				$pofo_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar5_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar5_mini_desktop_column_single',
				esc_html__('Sidebar 5 Column ( Mini Desktop )', 'pofo-addons'),
				$pofo_mini_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar5_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar5_ipad_column_single',
				esc_html__('Sidebar 5 Column ( Ipad )', 'pofo-addons'),
				$pofo_ipad_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar5_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar5_mobile_column_single',
				esc_html__('Sidebar 5 Column ( Mobile )', 'pofo-addons'),
				$pofo_mobile_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar5_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown('pofo_disable_footer_sidebar6_single',
				esc_html__('Column 6 Sidebar?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar6_single',
				esc_html__('Column 6 Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar6_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar6_desktop_column_single',
				esc_html__('Sidebar 6 Column ( Desktop )', 'pofo-addons'),
				$pofo_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar6_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar6_mini_desktop_column_single',
				esc_html__('Sidebar 6 Column ( Mini Desktop )', 'pofo-addons'),
				$pofo_mini_desktop_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar6_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar6_ipad_column_single',
				esc_html__('Sidebar 6 Column ( Ipad )', 'pofo-addons'),
				$pofo_ipad_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar6_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar6_mobile_column_single',
				esc_html__('Sidebar 6 Column ( Mobile )', 'pofo-addons'),
				$pofo_mobile_columns,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar6_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown('pofo_footer_padding_setting_single',
				esc_html__('Padding Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'small-padding' => esc_html__('Small Padding', 'pofo-addons'),
					  'medium-padding' => esc_html__('Medium Padding', 'pofo-addons'),
					  'large-padding' => esc_html__('Large Padding', 'pofo-addons'),
					 )
			);
pofo_before_inner_separator_end(
      'separator_end',
      ''
    );
pofo_meta_box_separator(
		'pofo_footer_middle_color_single',
		esc_html__( 'Color Settings', 'pofo-addons' )
	);
pofo_after_inner_separator_start(
	  'separator_start',
	  ''
	);
pofo_meta_box_colorpicker( 'pofo_footer_bg_color_single',
		esc_html__( 'Background Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_text_color_single',
		esc_html__( 'Text Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_link_color_single',
		esc_html__( 'Link Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_link_hover_color_single',
		esc_html__( 'Link Hover Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_border_color_single',
		esc_html__( 'Vertical Separator Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_footer_style_single', 'value' => array( 'default', 'footer-style-two' ))
	);
pofo_meta_box_colorpicker( 'pofo_footer_widget_title_color_single',
		esc_html__( 'Widget Title Color', 'pofo-addons' )
	);
pofo_before_inner_separator_end(
      'separator_end',
      ''
    );
pofo_before_main_separator_end(
      'separator_main_end',
      ''
    );
