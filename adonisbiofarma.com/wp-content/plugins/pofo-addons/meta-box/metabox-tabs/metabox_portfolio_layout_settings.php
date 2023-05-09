<?php
/**
 * Metabox For Portfolio Layout Setting.
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
	    'pofo_footer_social_icon_separator_single',
	    esc_html__( 'General', 'pofo-addons' )
	);
pofo_after_inner_separator_start(
	  'separator_start',
	  ''
	);
pofo_meta_box_dropdown('pofo_single_portfolio_layout_setting_single',
				esc_html__('Sidebar Settings', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'pofo_layout_left_sidebar' => esc_html__('Two Columns Left', 'pofo-addons'),
					  'pofo_layout_right_sidebar' => esc_html__('Two Columns Right', 'pofo-addons'),
					  'pofo_layout_both_sidebar' => esc_html__('Three Columns', 'pofo-addons'),
					  'pofo_layout_full_screen_12col' => esc_html__('One Column', 'pofo-addons')
					 )
			);

$pofo_sidebar_array = pofo_register_sidebar_array();
pofo_meta_box_dropdown_sidebar(	'pofo_single_portfolio_left_sidebar_single',
				esc_html__('Left Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				esc_html__('Select sidebar to display in left column of portfolio', 'pofo-addons'),
				array( 'element' => 'pofo_single_portfolio_layout_setting_single', 'value' => array('default','pofo_layout_left_sidebar','pofo_layout_both_sidebar' ))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_single_portfolio_right_sidebar_single',
				esc_html__('Right Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				esc_html__('Select sidebar to display in right column of portfolio', 'pofo-addons'),
				array( 'element' => 'pofo_single_portfolio_layout_setting_single', 'value' => array('default','pofo_layout_right_sidebar','pofo_layout_both_sidebar' ))
			);
pofo_meta_box_dropdown(	'pofo_single_portfolio_container_style_single',
				esc_html__( 'Container Style', 'pofo-addons' ),
				array(
					'default' => esc_html__( 'Default', 'pofo-addons' ),
					'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo-addons' ),
					'container' => esc_html__( 'Fixed', 'pofo-addons' ),
				)
			);
pofo_meta_box_text( 'pofo_single_portfolio_top_section_space_single',
		esc_html__( 'Main Section Top Space', 'pofo-addons' ),
		esc_html__('Note: Setting will work while you have setup page without WPBakery Page Builder.', 'pofo-addons')
	);
pofo_meta_box_text( 'pofo_single_portfolio_bottom_section_space_single',
		esc_html__( 'Main Section Bottom Space', 'pofo-addons' ),
		esc_html__('Note: Setting will work while you have setup page without WPBakery Page Builder.', 'pofo-addons')
	);
pofo_meta_box_colorpicker( 'pofo_body_background_color_single',
            esc_html__( 'Body Background Color', 'pofo-addons' )
        );
pofo_meta_box_upload( 'pofo_portfolio_body_background_image_single', 
			esc_html__( 'Body Background Image', 'pofo-addons' ),
			''
		);
pofo_meta_box_dropdown(	'pofo_portfolio_background_size_single',
			esc_html__( 'Body Background Size', 'pofo-addons' ),
			array(
				'default' => esc_html__( 'Default', 'pofo-addons' ),
				'contain' => esc_html__( 'Contain', 'pofo-addons' ),
				'cover' => esc_html__( 'Cover', 'pofo-addons' ),
			)
		);
pofo_meta_box_dropdown(	'pofo_portfolio_background_postion_single',
			esc_html__( 'Body Background Position', 'pofo-addons' ),
			array(
				'default' => esc_html__( 'Default', 'pofo-addons' ),
				'left-top' => esc_html__( 'left top', 'pofo-addons' ),
				'left-center' => esc_html__( 'left center', 'pofo-addons' ),
				'left-bottom' => esc_html__( 'left bottom', 'pofo-addons' ),
				'right-top' => esc_html__( 'right top', 'pofo-addons' ),
				'right-center' => esc_html__( 'right center', 'pofo-addons' ),
				'right-bottom' => esc_html__( 'right bottom', 'pofo-addons' ),
				'center-top' => esc_html__( 'center top', 'pofo-addons' ),
				'center-center' => esc_html__( 'center center', 'pofo-addons' ),
				'center-bottom' => esc_html__( 'center bottom', 'pofo-addons' ),
			)
		);
pofo_meta_box_dropdown(	'pofo_portfolio_background_attachment_single',
			esc_html__( 'Body Background Attachment', 'pofo-addons' ),
			array(
				'default' => esc_html__( 'Default', 'pofo-addons' ),
				'yes' => esc_html__( 'Yes', 'pofo-addons' ),
				'no' => esc_html__( 'No', 'pofo-addons' ),
			)
		);
pofo_meta_box_dropdown(	'pofo_portfolio_background_repeat_single',
			esc_html__( 'Body Background Repeat', 'pofo-addons' ),
			array(
				'default' => esc_html__( 'Default', 'pofo-addons' ),
				'repeat' => esc_html__( 'Repeat', 'pofo-addons' ),
				'repeat-x' => esc_html__( 'Repeat-x', 'pofo-addons' ),
				'repeat-y' => esc_html__( 'Repeat-y', 'pofo-addons' ),
				'no-repeat' => esc_html__( 'No Repeat', 'pofo-addons' ),
			)
		);
pofo_before_inner_separator_end(
      'separator_end',
      ''
    );
pofo_before_main_separator_end(
      'separator_main_end',
      ''
    );