<?php
/**
 * Shortcode Map For Testimonial
 *
 * @package Pofo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Testimonial */
/*-----------------------------------------------------------------------------------*/

  vc_map(
    array(
      'name' => esc_html__( 'Testimonial', 'pofo-addons' ),
      'base' => 'pofo_testimonial',
      'category' => 'Pofo',
      'icon' => 'fas fa-quote-left pofo-shortcode-icon',
      'description' => esc_html__( 'Create a testimonial block', 'pofo-addons' ),
      'params' => array(
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Style', 'pofo-addons'),
          'param_name' => 'pofo_testimonial_style',
          'value' => array( esc_html__( 'Select Testimonial Style', 'pofo-addons') => '',
                            esc_html__( 'Testimonial style 1', 'pofo-addons') => 'testimonial-1',
                            esc_html__( 'Testimonial style 2', 'pofo-addons') => 'testimonial-2',
                            esc_html__( 'Testimonial style 3', 'pofo-addons') => 'testimonial-3',
                          ),
        ),
        array(
          'type' => 'pofo_preview_image',
          'heading' => esc_html__( 'Select pre-made style for block', 'pofo-addons'),
          'param_name' => 'pofo_testimonial_preview_image',
          'admin_label' => true,
          'value' => array( esc_html__( 'Testimonial image', 'pofo-addons') => '',
                            esc_html__( 'Testimonial style 1', 'pofo-addons') => 'testimonial-1',
                            esc_html__( 'Testimonial style 2', 'pofo-addons') => 'testimonial-2',
                            esc_html__( 'Testimonial style 3', 'pofo-addons') => 'testimonial-3',
                          ),
        ),
        array(
          'type' => 'attach_image',
          'heading' => esc_html__( 'Image', 'pofo-addons' ),
          'param_name' => 'pofo_testimonial_image',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2') ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Image thumbnail size', 'pofo-addons' ),
          'param_name' => 'pofo_image_srcset',
          'value' => pofo_get_thumbnail_image_sizes(),
          'std' => 'full',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2') ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Name', 'pofo-addons' ),
          'param_name'  => 'pofo_member_name',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Designation', 'pofo-addons' ),
          'param_name'  => 'pofo_member_des',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Content', 'pofo-addons'),
          'param_name' => 'pofo_enable_content',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'std' => '1',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
        ),
        array(
          'type' => 'textarea_html',
          'heading' => esc_html__( 'Content text', 'pofo-addons'),
          'param_name' => 'content',
          'dependency'  => array( 'element' => 'pofo_enable_content', 'value' => array('1') ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Name text case', 'pofo-addons'),
          'param_name' => 'pofo_title_text_transform',
          'value' => array(  esc_html__('Select', 'pofo-addons') => '', 
                             esc_html__('Lowercase', 'pofo-addons') => 'text-lowercase',
                             esc_html__('Uppercase', 'pofo-addons') => 'text-uppercase',
                             esc_html__('Capitalize', 'pofo-addons') => 'text-capitalize',
                             esc_html__( 'None', 'pofo-addons' ) => 'text-none',
                            ),
          'std' => 'text-uppercase',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Designation text case', 'pofo-addons'),
          'param_name' => 'pofo_des_text_transform',
          'value' => array(  esc_html__('Select', 'pofo-addons') => '', 
                             esc_html__('Lowercase', 'pofo-addons') => 'text-lowercase',
                             esc_html__('Uppercase', 'pofo-addons') => 'text-uppercase',
                             esc_html__('Capitalize', 'pofo-addons') => 'text-capitalize',
                             esc_html__( 'None', 'pofo-addons' ) => 'text-none',
                            ),
          'std' => 'text-uppercase',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Quote icon', 'pofo-addons'),
          'param_name' => 'pofo_enable_quote',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'std' => '1',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-2', 'testimonial-3') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Box background color', 'pofo-addons' ),
          'param_name' => 'pofo_box_bg_color',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Icon size', 'pofo-addons'),
          'param_name' => 'pofo_icon_size',
          'admin_label' => true,
          'value' => array(esc_html__( 'Default', 'pofo-addons') => '',
                           esc_html__( 'Extra Large', 'pofo-addons') => 'icon-extra-large', 
                           esc_html__( 'Large', 'pofo-addons') => 'icon-large',
                           esc_html__( 'Extra Medium', 'pofo-addons') => 'icon-extra-medium',
                           esc_html__( 'Medium', 'pofo-addons') => 'icon-medium',
                           esc_html__( 'Small', 'pofo-addons') => 'icon-small',
                           esc_html__( 'Extra Small', 'pofo-addons') => 'icon-extra-small',
                          ),
          'dependency'  => array( 'element' => 'pofo_enable_quote', 'value' => array('1') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Icon color', 'pofo-addons' ),
          'param_name' => 'pofo_icon_color',
          'dependency'  => array( 'element' => 'pofo_enable_quote', 'value' => array('1') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'param_name' => 'pofo_custom_name_heading', // all params must have a unique name
          'type' => 'pofo_custom_title', // this param type
          'value' => esc_html__( 'Name Typography', 'pofo-addons' ), // your custom markup
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'responsive_settings' => true,
          'hide_show_element' => 'pofo_member_name_responsive_settings',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Font size', 'pofo-addons' ),
          'param_name' => 'pofo_member_name_font_size',
          'description' => esc_html__( 'In pixel like 12px.', 'pofo-addons' ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_name vc_col-sm-4 vc_column-with-padding',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Line height', 'pofo-addons' ),
          'param_name' => 'pofo_member_name_line_height',
          'description' => esc_html__( 'In pixel like 20px.', 'pofo-addons' ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_name vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Letter spacing', 'pofo-addons' ),
          'param_name' => 'pofo_member_name_letter_spacing',
          'description' => esc_html__( 'Define letter spacing like 12px', 'pofo-addons' ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_name vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'param_name' => 'pofo_member_name_font_weight',
          'heading' => esc_html__( 'Font weight', 'pofo-addons' ),
          'value' => pofo_font_weight_style(),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_name vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Font italic', 'pofo-addons'),
          'param_name' => 'pofo_member_name_italic',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_name vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Font underline', 'pofo-addons'),
          'param_name' => 'pofo_member_name_underline',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_name vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Element tag', 'pofo-addons'),
          'param_name' => 'pofo_member_name_element_tag',
          'value' => array(esc_html__( 'Element tag', 'pofo-addons') => '',
                           esc_html__( 'h1', 'pofo-addons') => 'h1',
                           esc_html__( 'h2', 'pofo-addons') => 'h2',
                           esc_html__( 'h3', 'pofo-addons') => 'h3',
                           esc_html__( 'h4', 'pofo-addons') => 'h4',
                           esc_html__( 'h5', 'pofo-addons') => 'h5',
                           esc_html__( 'h6', 'pofo-addons') => 'h6',
                          ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_name vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Color', 'pofo-addons' ),
          'param_name' => 'pofo_member_name_color',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_name vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Auto responsive font size', 'pofo-addons'),
          'param_name' => 'pofo_member_name_enable_responsive_font',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'description' => esc_html__( 'If ON then it will display font size automatically as per device size instead of above mentioned fixed font size in all devices.', 'pofo-addons' ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_name vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'responsive_font_settings',
          'param_name' => 'pofo_member_name_responsive_settings',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
          'hide_element_keys' => array( 'text-align', 'font-transform', ),
        ),
        array(
          'param_name' => 'pofo_custom_designation_heading', // all params must have a unique name
          'type' => 'pofo_custom_title', // this param type
          'value' => esc_html__( 'Designation Typography', 'pofo-addons' ), // your custom markup
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'responsive_settings' => true,
          'hide_show_element' => 'pofo_member_des_responsive_settings',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Font size', 'pofo-addons' ),
          'param_name' => 'pofo_member_des_font_size',
          'description' => esc_html__( 'In pixel like 12px.', 'pofo-addons' ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_des vc_col-sm-4 vc_column-with-padding',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Line height', 'pofo-addons' ),
          'param_name' => 'pofo_member_des_line_height',
          'description' => esc_html__( 'In pixel like 20px.', 'pofo-addons' ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_des vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Letter spacing', 'pofo-addons' ),
          'param_name' => 'pofo_member_des_letter_spacing',
          'description' => esc_html__( 'Define letter spacing like 12px', 'pofo-addons' ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_des vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'param_name' => 'pofo_member_des_font_weight',
          'heading' => esc_html__( 'Font weight', 'pofo-addons' ),
          'value' => pofo_font_weight_style(),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_des vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Font italic', 'pofo-addons'),
          'param_name' => 'pofo_member_des_italic',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_des vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Font underline', 'pofo-addons'),
          'param_name' => 'pofo_member_des_underline',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_des vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Element tag', 'pofo-addons'),
          'param_name' => 'pofo_member_des_element_tag',
          'value' => array(esc_html__( 'Element tag', 'pofo-addons') => '',
                           esc_html__( 'h1', 'pofo-addons') => 'h1',
                           esc_html__( 'h2', 'pofo-addons') => 'h2',
                           esc_html__( 'h3', 'pofo-addons') => 'h3',
                           esc_html__( 'h4', 'pofo-addons') => 'h4',
                           esc_html__( 'h5', 'pofo-addons') => 'h5',
                           esc_html__( 'h6', 'pofo-addons') => 'h6',
                          ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_des vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Color', 'pofo-addons' ),
          'param_name' => 'pofo_member_des_color',
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_des vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Auto responsive font size', 'pofo-addons'),
          'param_name' => 'pofo_member_des_enable_responsive_font',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'description' => esc_html__( 'If ON then it will display font size automatically as per device size instead of above mentioned fixed font size in all devices.', 'pofo-addons' ),
          'dependency'  => array( 'element' => 'pofo_testimonial_style', 'value' => array('testimonial-1', 'testimonial-2', 'testimonial-3') ),
          'edit_field_class' => 'pofo_responsive_tab_member_des vc_col-sm-4',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'responsive_font_settings',
          'param_name' => 'pofo_member_des_responsive_settings',
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
          'hide_element_keys' => array( 'text-align', 'font-transform', ),
        ),
        $pofo_vc_extra_id,
        $pofo_vc_extra_class,
      )
    )
  );