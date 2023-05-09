<?php
/**
 * Metabox For Title Wrapper.
 *
 * @package Pofo
 */
?>
<?php
/* if WooCommerce plugin is activated */
if( $post->post_type == 'product' && class_exists( 'WooCommerce' ) ){
  pofo_after_main_separator_start(
      'separator_main_start',
      ''
  );
  pofo_meta_box_separator(
      'pofo_single_product_title_separator_single',
      esc_html__( 'General', 'pofo-addons' )
  );
  pofo_after_inner_separator_start(
    'separator_start',
    ''
  );
  pofo_meta_box_dropdown('pofo_disable_single_product_title_single',
                    esc_html__('Title', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a title will display in page', 'pofo-addons')
                );
    pofo_meta_box_dropdown( 'pofo_single_product_title_style_single',
                    esc_html__('Style', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'page-title-style-1' => esc_html__('Page Title Style 1', 'pofo-addons'),
                          'page-title-style-2' => esc_html__('Page Title Style 2', 'pofo-addons'),
                          'page-title-style-3' => esc_html__('Page Title Style 3', 'pofo-addons'),
                          'page-title-style-4' => esc_html__('Page Title Style 4', 'pofo-addons'),
                          'page-title-style-5' => esc_html__('Page Title Style 5', 'pofo-addons'),
                          'page-title-style-6' => esc_html__('Page Title Style 6', 'pofo-addons'),
                          'page-title-style-7' => esc_html__('Page Title Style 7', 'pofo-addons'),
                          'page-title-style-8' => esc_html__('Page Title Style 8', 'pofo-addons'),
                          'page-title-style-9' => esc_html__('Page Title Style 9', 'pofo-addons'),
                          'page-title-style-10' => esc_html__('Page Title Style 10', 'pofo-addons')
                         ),
                    esc_html__('Choose page title style', 'pofo-addons')
                );
    pofo_meta_box_dropdown('pofo_enable_single_product_title_heading_single',
          esc_html__('Title Heading', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title Heading will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_disable_single_product_title_animation_single',
          esc_html__('Title Animation', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title Animation will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_single_product_title_animation_single',
          esc_html__('Animation', 'pofo-addons'),
          pofo_animation_style_customizer(),
          esc_html__('If on, a title Animation will display in page', 'pofo-addons'),
          array( 'element' => 'pofo_disable_single_product_title_animation_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_dropdown('pofo_single_product_title_text_transform_single',
                    esc_html__('Text Case', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
                          'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
                          'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
                          'text-normal' => esc_html__('Normal', 'pofo-addons'),
                          'text-none' => esc_html__('None', 'pofo-addons'),
                         )
                );
    pofo_meta_box_dropdown('pofo_disable_single_product_subtitle_single',
                    esc_html__('Subtitle', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, show Subtitle.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-1','page-title-style-2','page-title-style-3','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_subtitle_single', 
                    esc_html__('Subtitle', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_disable_single_product_subtitle_single', 'value' => array('default','1'))
                );
    pofo_meta_box_dropdown('pofo_disable_single_product_title_image_single',
                    esc_html__('Enable Background Image', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If no, background image will not show in title.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_upload( 'pofo_single_product_title_bg_image_single', 
                    esc_html__('Background Image', 'pofo-addons'),
                    esc_html__('Recommended image size is 1920px X 700px.', 'pofo-addons'),
                    array( 'element' => 'pofo_disable_single_product_title_image_single', 'value' => array('default','1'))
                );
    pofo_meta_box_upload_multiple('pofo_single_product_title_bg_multiple_image_single', 
                    esc_html__('Background Gallery Images', 'pofo-addons'),
                    '',
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_callto_section_id_single', 
                    esc_html__('Next Section ID', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_product_title_video_type_single',
                    esc_html__('Video type', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'self' => esc_html__('Self', 'pofo-addons'),
                          'external' => esc_html__('External', 'pofo-addons'),
                         ),
                    '',
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_video_mp4_single', 
                    esc_html__('MP4', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_video_ogg_single', 
                    esc_html__('OGG', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_video_webm_single', 
                    esc_html__('WEBM', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_video_youtube_single', 
                    esc_html__('External video url', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_product_title_parallax_effect_single',
                    esc_html__('Parallax effects', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'no-parallax' => esc_html__('No Parallax', 'pofo-addons'),
                          '0.1' => esc_html__('Parallax Effect 1', 'pofo-addons'),
                          '0.2' => esc_html__('Parallax Effect 2', 'pofo-addons'),
                          '0.3' => esc_html__('Parallax Effect 3', 'pofo-addons'),
                          '0.4' => esc_html__('Parallax Effect 4', 'pofo-addons'),
                          '0.5' => esc_html__('Parallax Effect 5', 'pofo-addons'),
                          '0.6' => esc_html__('Parallax Effect 6', 'pofo-addons'),
                          '0.7' => esc_html__('Parallax Effect 7', 'pofo-addons'),
                          '0.8' => esc_html__('Parallax Effect 8', 'pofo-addons'),
                          '0.9' => esc_html__('Parallax Effect 9', 'pofo-addons'),
                          '1.0' => esc_html__('Parallax Effect 10', 'pofo-addons')
                         ),
                    esc_html__('Choose parallax effect', 'pofo-addons'),
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_product_title_opacity_single',
                    esc_html__('Page title Opacity', 'pofo-addons'),
                    array('default'   => esc_html__( 'Default', 'pofo-addons' ),
                        '0.0'   => esc_html__( 'No Opacity', 'pofo-addons' ),
                        '0.1'   => esc_html__( '0.1', 'pofo-addons' ),
                        '0.2'   => esc_html__( '0.2', 'pofo-addons' ),
                        '0.3'   => esc_html__( '0.3', 'pofo-addons' ),
                        '0.4'   => esc_html__( '0.4', 'pofo-addons' ),
                        '0.5'   => esc_html__( '0.5', 'pofo-addons' ),
                        '0.6'   => esc_html__( '0.6', 'pofo-addons' ),
                        '0.7'   => esc_html__( '0.7', 'pofo-addons' ),
                        '0.8'   => esc_html__( '0.8', 'pofo-addons' ),
                        '0.9'   => esc_html__( '0.9', 'pofo-addons' ),
                        '1.0'   => esc_html__( '1.0', 'pofo-addons' ),
                         ),
                    esc_html__('Choose page title opacity', 'pofo-addons'),
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown('pofo_single_product_disable_breadcrumb_single',
                    esc_html__('Breadcrumb', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a breadcrumb will display in page', 'pofo-addons')
                );
    pofo_meta_box_dropdown('pofo_single_product_enable_breadcrumb_heading_single',
                    esc_html__('Breadcrumb Heading', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a breadcrumb heading will display in page', 'pofo-addons'),
                    array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
                );
    pofo_meta_box_dropdown('pofo_single_product_title_breadcrumb_position_single',
                    esc_html__( 'Breadcrumb Position', 'pofo-addons' ),
                    array(
                        'default' => esc_html__('Default', 'pofo-addons'),
                        'title-area'  => esc_html__( 'In title area', 'pofo-addons' ),
                        'after-title-area'  => esc_html__( 'After title area', 'pofo-addons' )
                    ),
                    '',
                    array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
                );
    pofo_meta_box_dropdown('pofo_single_product_title_breadcrumb_alignment_single',
                    esc_html__('Breadcrumb Alignment', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'text-left'   => esc_html__( 'Left', 'pofo-addons' ),
                          'text-center' => esc_html__( 'Center', 'pofo-addons' ),
                          'text-right'  => esc_html__( 'Right', 'pofo-addons' )
                         ),
                    '',
                    array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
                );
    pofo_before_inner_separator_end(
        'separator_end',
        ''
      );
    pofo_meta_box_separator('pofo_single_product_title_color_single',
            esc_html__( 'Color Settings', 'pofo-addons' )
    );
    pofo_after_inner_separator_start(
      'separator_start',
      ''
    );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_opacity_color_single',
            esc_html__( 'Opacity Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_bg_color_single',
            esc_html__( 'Background Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_color_single',
            esc_html__( 'Title Text Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_subtitle_color_single',
            esc_html__( 'Subtitle Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_disable_single_product_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_breadcrumb_bg_color_single',
            esc_html__( 'Breadcrumb Background', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_breadcrumb_border_color_single',
            esc_html__( 'Breadcrumb Border', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_breadcrumb_color_single',
            esc_html__( 'Breadcrumb Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_breadcrumb_text_hover_color_single',
            esc_html__( 'Breadcrumb Text Hover Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_before_inner_separator_end(
        'separator_end',
        ''
      );
    pofo_before_main_separator_end(
        'separator_main_end',
        ''
      );
}elseif($post->post_type == 'post'){
  pofo_after_main_separator_start(
      'separator_main_start',
      ''
  );
  pofo_meta_box_separator(
      'pofo_single_post_title_separator_single',
      esc_html__( 'General', 'pofo-addons' )
  );
  pofo_after_inner_separator_start(
    'separator_start',
    ''
  );
  pofo_meta_box_dropdown('pofo_disable_single_post_title_single',
                    esc_html__('Title', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a title will display in page', 'pofo-addons')
                );
    pofo_meta_box_dropdown( 'pofo_single_post_title_style_single',
                    esc_html__('Style', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'page-title-style-1' => esc_html__('Page Title Style 1', 'pofo-addons'),
                          'page-title-style-2' => esc_html__('Page Title Style 2', 'pofo-addons'),
                          'page-title-style-3' => esc_html__('Page Title Style 3', 'pofo-addons'),
                          'page-title-style-4' => esc_html__('Page Title Style 4', 'pofo-addons'),
                          'page-title-style-5' => esc_html__('Page Title Style 5', 'pofo-addons'),
                          'page-title-style-6' => esc_html__('Page Title Style 6', 'pofo-addons'),
                          'page-title-style-7' => esc_html__('Page Title Style 7', 'pofo-addons'),
                          'page-title-style-8' => esc_html__('Page Title Style 8', 'pofo-addons'),
                          'page-title-style-9' => esc_html__('Page Title Style 9', 'pofo-addons'),
                          'page-title-style-10' => esc_html__('Page Title Style 10', 'pofo-addons')
                         ),
                    esc_html__('Choose page title style', 'pofo-addons')
                );    
    pofo_meta_box_dropdown('pofo_enable_single_post_title_heading_single',
          esc_html__('Title Heading', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title heading will display in single post', 'pofo-addons')
        );
    pofo_meta_box_dropdown('pofo_disable_single_post_title_animation_single',
          esc_html__('Title Animation', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title Animation will display in Single post', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_single_post_title_animation_single',
          esc_html__('Animation', 'pofo-addons'),
          pofo_animation_style_customizer(),
          esc_html__('If on, a title Animation will display in Single post', 'pofo-addons'),
          array( 'element' => 'pofo_disable_single_post_title_animation_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_dropdown('pofo_single_post_title_text_transform_single',
                    esc_html__('Text Case', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
                          'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
                          'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
                          'text-normal' => esc_html__('Normal', 'pofo-addons'),
                          'text-none' => esc_html__('None', 'pofo-addons'),
                         )
                );
    pofo_meta_box_dropdown('pofo_disable_single_post_subtitle_single',
                    esc_html__('Subtitle', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, show Subtitle.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-1','page-title-style-2','page-title-style-3','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_subtitle_single', 
                    esc_html__('Subtitle', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_disable_single_post_subtitle_single', 'value' => array('default','1'))
                );
    pofo_meta_box_dropdown('pofo_disable_single_post_title_image_single',
                    esc_html__('Enable Background Image', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If no, background image will not show in title.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_upload( 'pofo_single_post_title_bg_image_single', 
                    esc_html__('Background Image', 'pofo-addons'),
                    esc_html__('Recommended image size is 1920px X 700px.', 'pofo-addons'),
                    array( 'element' => 'pofo_disable_single_post_title_image_single', 'value' => array('default','1'))
                );
    pofo_meta_box_upload_multiple('pofo_single_post_title_bg_multiple_image_single', 
                    esc_html__('Background Gallery Images', 'pofo-addons'),
                    esc_html__('Use only for Page Title Style 7.', 'pofo-addons'),
                    '',
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_callto_section_id_single', 
                    esc_html__('Next Section ID', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_post_title_video_type_single',
                    esc_html__('Video type', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'self' => esc_html__('Self', 'pofo-addons'),
                          'external' => esc_html__('External', 'pofo-addons'),
                         ),
                    '',
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_video_mp4_single', 
                    esc_html__('MP4', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_video_ogg_single', 
                    esc_html__('OGG', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_video_webm_single', 
                    esc_html__('WEBM', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_video_youtube_single', 
                    esc_html__('External video url', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_post_title_parallax_effect_single',
                    esc_html__('Parallax effects', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'no-parallax' => esc_html__('No Parallax', 'pofo-addons'),
                          '0.1' => esc_html__('Parallax Effect 1', 'pofo-addons'),
                          '0.2' => esc_html__('Parallax Effect 2', 'pofo-addons'),
                          '0.3' => esc_html__('Parallax Effect 3', 'pofo-addons'),
                          '0.4' => esc_html__('Parallax Effect 4', 'pofo-addons'),
                          '0.5' => esc_html__('Parallax Effect 5', 'pofo-addons'),
                          '0.6' => esc_html__('Parallax Effect 6', 'pofo-addons'),
                          '0.7' => esc_html__('Parallax Effect 7', 'pofo-addons'),
                          '0.8' => esc_html__('Parallax Effect 8', 'pofo-addons'),
                          '0.9' => esc_html__('Parallax Effect 9', 'pofo-addons'),
                          '1.0' => esc_html__('Parallax Effect 10', 'pofo-addons')
                         ),
                    esc_html__('Choose parallax effect', 'pofo-addons'),
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_post_title_opacity_single',
                    esc_html__('Page title Opacity', 'pofo-addons'),
                    array('default'   => esc_html__( 'Default', 'pofo-addons' ),
                        '0.0'   => esc_html__( 'No Opacity', 'pofo-addons' ),
                        '0.1'   => esc_html__( '0.1', 'pofo-addons' ),
                        '0.2'   => esc_html__( '0.2', 'pofo-addons' ),
                        '0.3'   => esc_html__( '0.3', 'pofo-addons' ),
                        '0.4'   => esc_html__( '0.4', 'pofo-addons' ),
                        '0.5'   => esc_html__( '0.5', 'pofo-addons' ),
                        '0.6'   => esc_html__( '0.6', 'pofo-addons' ),
                        '0.7'   => esc_html__( '0.7', 'pofo-addons' ),
                        '0.8'   => esc_html__( '0.8', 'pofo-addons' ),
                        '0.9'   => esc_html__( '0.9', 'pofo-addons' ),
                        '1.0'   => esc_html__( '1.0', 'pofo-addons' ),
                         ),
                    esc_html__('Choose page title opacity', 'pofo-addons'),
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown('pofo_single_post_disable_breadcrumb_single',
                    esc_html__('Breadcrumb', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a breadcrumb will display in page', 'pofo-addons')
                );
    pofo_meta_box_dropdown('pofo_single_post_enable_breadcrumb_heading_single',
                    esc_html__('Breadcrumb Heading', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a breadcrumb heading will display in page', 'pofo-addons'),
                    array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
                );
    pofo_meta_box_dropdown('pofo_post_single_title_breadcrumb_position_single',
                    esc_html__( 'Breadcrumb Position', 'pofo-addons' ),
                    array(
                        'default' => esc_html__('Default', 'pofo-addons'),
                        'title-area'  => esc_html__( 'In title area', 'pofo-addons' ),
                        'after-title-area'  => esc_html__( 'After title area', 'pofo-addons' )
                    ),
                    '',
                    array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
                );
    pofo_meta_box_dropdown('pofo_post_single_title_breadcrumb_alignment_single',
                    esc_html__('Breadcrumb Alignment', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'text-left'   => esc_html__( 'Left', 'pofo-addons' ),
                          'text-center' => esc_html__( 'Center', 'pofo-addons' ),
                          'text-right'  => esc_html__( 'Right', 'pofo-addons' )
                         ),
                    '',
                    array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
                );
    pofo_before_inner_separator_end(
        'separator_end',
        ''
      );
    pofo_meta_box_separator('pofo_single_post_title_color_single',
            esc_html__( 'Color Settings', 'pofo-addons' )
    );
      pofo_after_inner_separator_start(
      'separator_start',
      ''
    );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_opacity_color_single',
            esc_html__( 'Opacity Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_bg_color_single',
            esc_html__( 'Background Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_color_single',
            esc_html__( 'Title Text Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_subtitle_color_single',
            esc_html__( 'Subtitle Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_disable_single_post_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_breadcrumb_bg_color_single',
            esc_html__( 'Breadcrumb Background', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_breadcrumb_border_color_single',
            esc_html__( 'Breadcrumb Border', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_breadcrumb_color_single',
            esc_html__( 'Breadcrumb Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_breadcrumb_text_hover_color_single',
            esc_html__( 'Breadcrumb Text Hover Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_meta_color_single',
            esc_html__( 'Meta Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_meta_hover_color_single',
            esc_html__( 'Meta Hover Color', 'pofo-addons' )
        );
    pofo_before_inner_separator_end(
        'separator_end',
        ''
      );
    pofo_before_main_separator_end(
        'separator_main_end',
        ''
      );

}elseif( $post->post_type == 'portfolio' ){
  pofo_after_main_separator_start(
      'separator_main_start',
      ''
  );
  pofo_meta_box_separator(
      'pofo_single_portfoio_title_separator_single',
      esc_html__( 'General', 'pofo-addons' )
  );
  pofo_after_inner_separator_start(
    'separator_start',
    ''
  );
  pofo_meta_box_dropdown('pofo_disable_single_portfolio_title_single',
                    esc_html__('Title', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a title will display in page', 'pofo-addons')
                );
    pofo_meta_box_dropdown( 'pofo_single_portfolio_title_style_single',
                    esc_html__('Style', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'page-title-style-1' => esc_html__('Page Title Style 1', 'pofo-addons'),
                          'page-title-style-2' => esc_html__('Page Title Style 2', 'pofo-addons'),
                          'page-title-style-3' => esc_html__('Page Title Style 3', 'pofo-addons'),
                          'page-title-style-4' => esc_html__('Page Title Style 4', 'pofo-addons'),
                          'page-title-style-5' => esc_html__('Page Title Style 5', 'pofo-addons'),
                          'page-title-style-6' => esc_html__('Page Title Style 6', 'pofo-addons'),
                          'page-title-style-7' => esc_html__('Page Title Style 7', 'pofo-addons'),
                          'page-title-style-8' => esc_html__('Page Title Style 8', 'pofo-addons'),
                          'page-title-style-9' => esc_html__('Page Title Style 9', 'pofo-addons'),
                          'page-title-style-10' => esc_html__('Page Title Style 10', 'pofo-addons')
                         ),
                    esc_html__('Choose page title style', 'pofo-addons')
                );
    pofo_meta_box_dropdown('pofo_enable_single_portfolio_title_heading_single',
          esc_html__('Title Heading', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title Heading will display in page', 'pofo-addons')
        );
    pofo_meta_box_dropdown('pofo_disable_single_portfolio_title_animation_single',
          esc_html__('Title Animation', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title Animation will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_single_portfolio_title_animation_single',
          esc_html__('Animation', 'pofo-addons'),
          pofo_animation_style_customizer(),
          esc_html__('If on, a title Animation will display in page', 'pofo-addons'),
          array( 'element' => 'pofo_disable_single_portfolio_title_animation_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_dropdown('pofo_single_portfolio_title_text_transform_single',
                    esc_html__('Text Case', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
                          'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
                          'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
                          'text-normal' => esc_html__('Normal', 'pofo-addons'),
                          'text-none' => esc_html__('None', 'pofo-addons'),
                         )
                );
    pofo_meta_box_dropdown('pofo_disable_single_portfolio_subtitle_single',
                    esc_html__('Subtitle', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, show Subtitle.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-1','page-title-style-2','page-title-style-3','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_subtitle_single', 
                    esc_html__('Subtitle', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_disable_single_portfolio_subtitle_single', 'value' => array('default','1'))
                );
    pofo_meta_box_dropdown('pofo_disable_single_portfolio_title_image_single',
                    esc_html__('Enable Background Image', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, background image will show in title.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_upload( 'pofo_single_portfolio_title_bg_image_single', 
                    esc_html__('Background Image', 'pofo-addons'),
                    esc_html__('Recommended image size is 1920px X 700px.', 'pofo-addons'),
                    array( 'element' => 'pofo_disable_single_portfolio_title_image_single', 'value' => array('default','1'))
                );
    pofo_meta_box_upload_multiple('pofo_single_portfolio_title_bg_multiple_image_single', 
                    esc_html__('Background Gallery Images', 'pofo-addons'),
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_callto_section_id_single', 
                    esc_html__('Next Section ID', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_portfolio_title_video_type_single',
                    esc_html__('Video type', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'self' => esc_html__('Self', 'pofo-addons'),
                          'external' => esc_html__('External', 'pofo-addons'),
                         ),
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_video_mp4_single', 
                    esc_html__('MP4', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_video_ogg_single', 
                    esc_html__('OGG', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_video_webm_single', 
                    esc_html__('WEBM', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_video_youtube_single', 
                    esc_html__('External video url', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_portfolio_title_parallax_effect_single',
                    esc_html__('Parallax effects', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'no-parallax' => esc_html__('No Parallax', 'pofo-addons'),
                          '0.1' => esc_html__('Parallax Effect 1', 'pofo-addons'),
                          '0.2' => esc_html__('Parallax Effect 2', 'pofo-addons'),
                          '0.3' => esc_html__('Parallax Effect 3', 'pofo-addons'),
                          '0.4' => esc_html__('Parallax Effect 4', 'pofo-addons'),
                          '0.5' => esc_html__('Parallax Effect 5', 'pofo-addons'),
                          '0.6' => esc_html__('Parallax Effect 6', 'pofo-addons'),
                          '0.7' => esc_html__('Parallax Effect 7', 'pofo-addons'),
                          '0.8' => esc_html__('Parallax Effect 8', 'pofo-addons'),
                          '0.9' => esc_html__('Parallax Effect 9', 'pofo-addons'),
                          '1.0' => esc_html__('Parallax Effect 10', 'pofo-addons')
                         ),
                    esc_html__('Choose parallax effect', 'pofo-addons'),
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_portfolio_title_opacity_single',
                    esc_html__('Page title Opacity', 'pofo-addons'),
                    array('default'   => esc_html__( 'Default', 'pofo-addons' ),
                        '0.0'   => esc_html__( 'No Opacity', 'pofo-addons' ),
                        '0.1'   => esc_html__( '0.1', 'pofo-addons' ),
                        '0.2'   => esc_html__( '0.2', 'pofo-addons' ),
                        '0.3'   => esc_html__( '0.3', 'pofo-addons' ),
                        '0.4'   => esc_html__( '0.4', 'pofo-addons' ),
                        '0.5'   => esc_html__( '0.5', 'pofo-addons' ),
                        '0.6'   => esc_html__( '0.6', 'pofo-addons' ),
                        '0.7'   => esc_html__( '0.7', 'pofo-addons' ),
                        '0.8'   => esc_html__( '0.8', 'pofo-addons' ),
                        '0.9'   => esc_html__( '0.9', 'pofo-addons' ),
                        '1.0'   => esc_html__( '1.0', 'pofo-addons' ),
                         ),
                    esc_html__('Choose page title opacity', 'pofo-addons'),
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown('pofo_single_portfolio_disable_breadcrumb_single',
                    esc_html__('Breadcrumb', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a breadcrumb will display in page', 'pofo-addons')
                );
    pofo_meta_box_dropdown('pofo_single_portfolio_enable_breadcrumb_heading_single',
                    esc_html__('Breadcrumb Heading', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a breadcrumb heading will display in page', 'pofo-addons'),
                    array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
                );

    pofo_meta_box_dropdown('pofo_single_portfolio_title_breadcrumb_position_single',
                    esc_html__( 'Breadcrumb Position', 'pofo-addons' ),
                    array(
                        'default' => esc_html__('Default', 'pofo-addons'),
                        'title-area'  => esc_html__( 'In title area', 'pofo-addons' ),
                        'after-title-area'  => esc_html__( 'After title area', 'pofo-addons' )
                    ),
                    '',
                    array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
                );
    pofo_meta_box_dropdown('pofo_single_portfolio_title_breadcrumb_alignment_single',
                    esc_html__('Breadcrumb Alignment', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'text-left'   => esc_html__( 'Left', 'pofo-addons' ),
                          'text-center' => esc_html__( 'Center', 'pofo-addons' ),
                          'text-right'  => esc_html__( 'Right', 'pofo-addons' )
                         ),
                    '',
                    array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
                );
    pofo_meta_box_dropdown('pofo_portfolio_hide_category_single',
          esc_html__('Category', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             )
        );

    pofo_before_inner_separator_end(
      'separator_end',
      ''
    );
    pofo_meta_box_separator('pofo_single_portfolio_title_color_single',
            esc_html__( 'Color Settings', 'pofo-addons' )
    );
    pofo_after_inner_separator_start(
      'separator_start',
      ''
    );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_opacity_color_single',
            esc_html__( 'Opacity Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_bg_color_single',
            esc_html__( 'Background Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_color_single',
            esc_html__( 'Title Text Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_subtitle_color_single',
            esc_html__( 'Subtitle Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_disable_single_portfolio_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_breadcrumb_bg_color_single',
            esc_html__( 'Breadcrumb Background', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_breadcrumb_border_color_single',
            esc_html__( 'Breadcrumb Border', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_breadcrumb_color_single',
            esc_html__( 'Breadcrumb Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_breadcrumb_text_hover_color_single',
            esc_html__( 'Breadcrumb Text Hover Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_before_inner_separator_end(
        'separator_end',
        ''
      );
    pofo_before_main_separator_end(
        'separator_main_end',
        ''
      );
} elseif( $post->post_type == 'page' && class_exists( 'WooCommerce' ) && $post->ID == wc_get_page_id( 'shop' ) ){
  pofo_after_main_separator_start(
      'separator_main_start',
      ''
  );
  pofo_meta_box_separator(
      'pofo_product_archive_separator_single',
      esc_html__( 'General', 'pofo-addons' )
  );
  pofo_after_inner_separator_start(
    'separator_start',
    ''
  );
  pofo_meta_box_dropdown('pofo_disable_product_archive_title_single',
          esc_html__('Title', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown( 'pofo_product_archive_title_style_single',
          esc_html__('Style', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              'page-title-style-1' => esc_html__('Page Title Style 1', 'pofo-addons'),
              'page-title-style-2' => esc_html__('Page Title Style 2', 'pofo-addons'),
              'page-title-style-3' => esc_html__('Page Title Style 3', 'pofo-addons'),
              'page-title-style-4' => esc_html__('Page Title Style 4', 'pofo-addons'),
              'page-title-style-5' => esc_html__('Page Title Style 5', 'pofo-addons'),
              'page-title-style-6' => esc_html__('Page Title Style 6', 'pofo-addons'),
              'page-title-style-7' => esc_html__('Page Title Style 7', 'pofo-addons'),
              'page-title-style-8' => esc_html__('Page Title Style 8', 'pofo-addons'),
              'page-title-style-9' => esc_html__('Page Title Style 9', 'pofo-addons'),
              'page-title-style-10' => esc_html__('Page Title Style 10', 'pofo-addons')
             ),
          esc_html__('Choose page title style', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_enable_page_title_heading_single',
          esc_html__('Title Heading', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title text will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_disable_product_archive_title_animation_single',
          esc_html__('Title Animation', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title Animation will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_product_archive_title_animation_single',
          esc_html__('Animation', 'pofo-addons'),
          pofo_animation_style_customizer(),
          esc_html__('If on, a title Animation will display in page', 'pofo-addons'),
          array( 'element' => 'pofo_disable_product_archive_title_animation_single', 'value' => array('default','1' ))
        );
  pofo_meta_box_dropdown('pofo_product_archive_title_text_transform_single',
          esc_html__('Text Case', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
              'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
              'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
              'text-normal' => esc_html__('Normal', 'pofo-addons'),
              'text-none' => esc_html__('None', 'pofo-addons'),
             )
        );
  pofo_meta_box_dropdown('pofo_disable_product_archive_subtitle_single',
          esc_html__('Subtitle', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, show Subtitle.', 'pofo-addons'),
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-1','page-title-style-2','page-title-style-3','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
        );
  pofo_meta_box_text( 'pofo_product_archive_title_subtitle_single', 
          esc_html__('Subtitle', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_disable_product_archive_subtitle_single', 'value' => array('default','1'))
        );
  pofo_meta_box_dropdown('pofo_disable_product_archive_title_image_single',
          esc_html__('Enable Background Image', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If no, background image will not show in title.', 'pofo-addons'),
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
        );
  pofo_meta_box_upload( 'pofo_product_archive_title_bg_image_single', 
          esc_html__('Background Image', 'pofo-addons'),
          esc_html__('Recommended image size is 1920px X 700px.', 'pofo-addons'),
          array( 'element' => 'pofo_disable_product_archive_title_image_single', 'value' => array('default','1'))
        );
  pofo_meta_box_upload_multiple('pofo_product_archive_title_bg_multiple_image_single', 
          esc_html__('Background Gallery Images', 'pofo-addons'),
          '',
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-7' ))
        );
  pofo_meta_box_text( 'pofo_product_archive_title_callto_section_id_single', 
          esc_html__('Next Section ID', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-7' ))
        );
  pofo_meta_box_dropdown( 'pofo_product_archive_title_video_type_single',
          esc_html__('Video type', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              'self' => esc_html__('Self', 'pofo-addons'),
              'external' => esc_html__('External', 'pofo-addons'),
             ),
          '',
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-8' ))
        );
  pofo_meta_box_text( 'pofo_product_archive_title_video_mp4_single', 
          esc_html__('MP4', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-8' ))
        );
  pofo_meta_box_text( 'pofo_product_archive_title_video_ogg_single', 
          esc_html__('OGG', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-8' ))
        );
  pofo_meta_box_text( 'pofo_product_archive_title_video_webm_single', 
          esc_html__('WEBM', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-8' ))
        );
  pofo_meta_box_text( 'pofo_product_archive_title_video_youtube_single', 
          esc_html__('External video url', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-8' ))
        );
  pofo_meta_box_dropdown( 'pofo_product_archive_title_parallax_effect_single',
          esc_html__('Parallax effects', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              'no-parallax' => esc_html__('No Parallax', 'pofo-addons'),
              '0.1' => esc_html__('Parallax Effect 1', 'pofo-addons'),
              '0.2' => esc_html__('Parallax Effect 2', 'pofo-addons'),
              '0.3' => esc_html__('Parallax Effect 3', 'pofo-addons'),
              '0.4' => esc_html__('Parallax Effect 4', 'pofo-addons'),
              '0.5' => esc_html__('Parallax Effect 5', 'pofo-addons'),
              '0.6' => esc_html__('Parallax Effect 6', 'pofo-addons'),
              '0.7' => esc_html__('Parallax Effect 7', 'pofo-addons'),
              '0.8' => esc_html__('Parallax Effect 8', 'pofo-addons'),
              '0.9' => esc_html__('Parallax Effect 9', 'pofo-addons'),
              '1.0' => esc_html__('Parallax Effect 10', 'pofo-addons')
             ),
          esc_html__('Choose parallax effect', 'pofo-addons'),
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
        );
  pofo_meta_box_dropdown( 'pofo_product_archive_title_opacity_single',
          esc_html__('Page title Opacity', 'pofo-addons'),
          array('default'   => esc_html__( 'Default', 'pofo-addons' ),
            '0.0'   => esc_html__( 'No Opacity', 'pofo-addons' ),
              '0.1'   => esc_html__( '0.1', 'pofo-addons' ),
              '0.2'   => esc_html__( '0.2', 'pofo-addons' ),
              '0.3'   => esc_html__( '0.3', 'pofo-addons' ),
              '0.4'   => esc_html__( '0.4', 'pofo-addons' ),
              '0.5'   => esc_html__( '0.5', 'pofo-addons' ),
              '0.6'   => esc_html__( '0.6', 'pofo-addons' ),
              '0.7'   => esc_html__( '0.7', 'pofo-addons' ),
              '0.8'   => esc_html__( '0.8', 'pofo-addons' ),
              '0.9'   => esc_html__( '0.9', 'pofo-addons' ),
              '1.0'   => esc_html__( '1.0', 'pofo-addons' ),
             ),
          esc_html__('Choose page title opacity', 'pofo-addons'),
          array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
        );
  pofo_meta_box_dropdown('pofo_product_archive_disable_breadcrumb_single',
          esc_html__('Breadcrumb', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a breadcrumb will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_enable_breadcrumb_heading_single',
          esc_html__('Breadcrumb Heading', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a breadcrumb heading will display in page', 'pofo-addons'),
          array( 'element' => 'pofo_product_archive_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
  pofo_meta_box_dropdown('pofo_disable_product_archive_breadcrumb_animation_single',
          esc_html__('Breadcrumb Animation', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a breadcrumb Animation will display in page', 'pofo-addons'),
          array( 'element' => 'pofo_product_archive_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
  pofo_meta_box_dropdown('pofo_product_archive_breadcrumb_animation_single',
          esc_html__('Animation', 'pofo-addons'),
          pofo_animation_style_customizer(),
          esc_html__('If on, a title Animation will display in page', 'pofo-addons'),
          array( 'element' => 'pofo_disable_product_archive_breadcrumb_animation_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_text( 'pofo_product_archive_title_font_size_single', 
          esc_html__('Title Font Size', 'pofo-addons'),
          'In pixel like 15px',
          ''
        );
    pofo_meta_box_text( 'pofo_product_archive_title_line_height_single', 
          esc_html__('Title Line Height', 'pofo-addons'),
          'In pixel like 15px',
          ''
        );
    pofo_meta_box_text( 'pofo_product_archive_title_letter_spacing_single', 
          esc_html__('Title Letter Spacing', 'pofo-addons'),
          'In pixel like 1px',
          ''
        );
    pofo_meta_box_text( 'pofo_product_archive_subtitle_font_size_single', 
          esc_html__('Subtitle Font Size', 'pofo-addons'),
          'In pixel like 15px',
          '',
          array( 'element' => 'pofo_disable_product_archive_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_dropdown('pofo_product_archive_subtitle_opacity_single',
          esc_html__('Subtitle Opacity', 'pofo-addons'),
          array(
            'default' => esc_html__( 'Default', 'pofo-addons' ),
            '0.0'  => esc_html__( 'No opacity', 'pofo-addons' ),
            '0.1'  => '0.1',
            '0.2'  => '0.2',
            '0.3'  => '0.3',
            '0.4'  => '0.4',
            '0.5'  => '0.5',
            '0.6'  => '0.6',
            '0.7'  => '0.7',
            '0.8'  => '0.8',
            '0.9'  => '0.9',
            '1.0'  => '1.0',
             ),
          '',
          array( 'element' => 'pofo_disable_product_archive_subtitle_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_text( 'pofo_product_archive_subtitle_line_height_single', 
          esc_html__('Subtitle Line Height', 'pofo-addons'),
          'In pixel like 15px',
          '',
          array( 'element' => 'pofo_disable_product_archive_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_text( 'pofo_product_archive_subtitle_letter_spacing_single', 
          esc_html__('Subtitle Letter Spacing', 'pofo-addons'),
          'In pixel like 1px',
          '',
          array( 'element' => 'pofo_disable_product_archive_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_text( 'pofo_product_archive_breadcrumb_font_size_single', 
          esc_html__('Breadcrumb Font Size', 'pofo-addons'),
          'In pixel like 15px',
          '',
          array( 'element' => 'pofo_product_archive_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_text( 'pofo_product_archive_breadcrumb_line_height_single', 
          esc_html__('Breadcrumb Line Height', 'pofo-addons'),
          'In pixel like 15px',
          '',
          array( 'element' => 'pofo_product_archive_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_text( 'pofo_product_archive_breadcrumb_letter_spacing_single', 
          esc_html__('Breadcrumb Letter Spacing', 'pofo-addons'),
          'In pixel like 1px',
          '',
          array( 'element' => 'pofo_product_archive_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
  pofo_before_inner_separator_end(
      'separator_end',
      ''
    );  
  pofo_meta_box_separator('pofo_single_page_title_color_single',
            esc_html__( 'Color Settings', 'pofo-addons' )
    );
  pofo_after_inner_separator_start(
    'separator_start',
    ''
  );
  pofo_meta_box_colorpicker( 'pofo_product_archive_title_opacity_color_single',
      esc_html__( 'Opacity Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_product_archive_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
    );
  pofo_meta_box_colorpicker( 'pofo_product_archive_title_bg_color_single',
      esc_html__( 'Background Color', 'pofo-addons' )
    );
  pofo_meta_box_colorpicker( 'pofo_product_archive_title_color_single',
      esc_html__( 'Title Text Color', 'pofo-addons' )
    );
  pofo_meta_box_colorpicker( 'pofo_product_archive_subtitle_color_single',
      esc_html__( 'Subtitle Text Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_product_archive_subtitle_single', 'value' => array('default','1'))
    );
  pofo_meta_box_colorpicker( 'pofo_product_archive_title_breadcrumb_bg_color_single',
      esc_html__( 'Breadcrumb Background', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
  );
  pofo_meta_box_colorpicker( 'pofo_product_archive_title_breadcrumb_border_color_single',
      esc_html__( 'Breadcrumb Border', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
  );
  pofo_meta_box_colorpicker( 'pofo_product_archive_title_breadcrumb_color_single',
      esc_html__( 'Breadcrumb Text Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
    );
  pofo_meta_box_colorpicker( 'pofo_product_archive_title_breadcrumb_text_hover_color_single',
      esc_html__( 'Breadcrumb Text Hover Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
    );
   pofo_before_inner_separator_end(
      'separator_end',
      ''
    );
  pofo_before_main_separator_end(
      'separator_main_end',
      ''
    );
} else {
  pofo_after_main_separator_start(
      'separator_main_start',
      ''
  );
  pofo_meta_box_separator(
      'pofo_page_separator_single',
      esc_html__( 'General', 'pofo-addons' )
  );
  pofo_after_inner_separator_start(
    'separator_start',
    ''
  );
  pofo_meta_box_dropdown('pofo_disable_page_title_single',
          esc_html__('Title', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown( 'pofo_page_title_style_single',
          esc_html__('Style', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              'page-title-style-1' => esc_html__('Page Title Style 1', 'pofo-addons'),
              'page-title-style-2' => esc_html__('Page Title Style 2', 'pofo-addons'),
              'page-title-style-3' => esc_html__('Page Title Style 3', 'pofo-addons'),
              'page-title-style-4' => esc_html__('Page Title Style 4', 'pofo-addons'),
              'page-title-style-5' => esc_html__('Page Title Style 5', 'pofo-addons'),
              'page-title-style-6' => esc_html__('Page Title Style 6', 'pofo-addons'),
              'page-title-style-7' => esc_html__('Page Title Style 7', 'pofo-addons'),
              'page-title-style-8' => esc_html__('Page Title Style 8', 'pofo-addons'),
              'page-title-style-9' => esc_html__('Page Title Style 9', 'pofo-addons'),
              'page-title-style-10' => esc_html__('Page Title Style 10', 'pofo-addons')
             ),
          esc_html__('Choose page title style', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_enable_page_title_heading_single',
          esc_html__('Title Heading', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title text will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_disable_page_title_animation_single',
          esc_html__('Title Animation', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a title Animation will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_page_title_animation_single',
          esc_html__('Animation', 'pofo-addons'),
          pofo_animation_style_customizer(),
          esc_html__('If on, a title Animation will display in page', 'pofo-addons'),
          array( 'element' => 'pofo_disable_page_title_animation_single', 'value' => array('default','1' ))
        );
  pofo_meta_box_dropdown('pofo_page_title_text_transform_single',
          esc_html__('Text Case', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
              'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
              'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
              'text-normal' => esc_html__('Normal', 'pofo-addons'),
              'text-none' => esc_html__('None', 'pofo-addons'),
             )
        );
  pofo_meta_box_dropdown('pofo_disable_page_subtitle_single',
          esc_html__('Subtitle', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, show Subtitle.', 'pofo-addons'),
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-1','page-title-style-2','page-title-style-3','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
        );
  pofo_meta_box_text( 'pofo_page_title_subtitle_single', 
          esc_html__('Subtitle', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_disable_page_subtitle_single', 'value' => array('default','1'))
        );
  pofo_meta_box_dropdown('pofo_disable_page_title_image_single',
          esc_html__('Enable Background Image', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If no, background image will not show in title.', 'pofo-addons'),
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
        );
  pofo_meta_box_upload( 'pofo_page_title_bg_image_single', 
          esc_html__('Background Image', 'pofo-addons'),
          esc_html__('Recommended image size is 1920px X 700px.', 'pofo-addons'),
          array( 'element' => 'pofo_disable_page_title_image_single', 'value' => array('default', '1'))
        );
  pofo_meta_box_upload_multiple('pofo_page_title_bg_multiple_image_single', 
          esc_html__('Background Gallery Images', 'pofo-addons'),
          '',
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-7' ))
        );
  pofo_meta_box_text( 'pofo_page_title_callto_section_id_single', 
          esc_html__('Next Section ID', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-7' ))
        );
  pofo_meta_box_dropdown( 'pofo_page_title_video_type_single',
          esc_html__('Video type', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              'self' => esc_html__('Self', 'pofo-addons'),
              'external' => esc_html__('External', 'pofo-addons'),
             ),
          '',
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-8' ))
        );
  pofo_meta_box_text( 'pofo_page_title_video_mp4_single', 
          esc_html__('MP4', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-8' ))
        );
  pofo_meta_box_text( 'pofo_page_title_video_ogg_single', 
          esc_html__('OGG', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-8' ))
        );
  pofo_meta_box_text( 'pofo_page_title_video_webm_single', 
          esc_html__('WEBM', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-8' ))
        );
  pofo_meta_box_text( 'pofo_page_title_video_youtube_single', 
          esc_html__('External video url', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-8' ))
        );
  pofo_meta_box_dropdown( 'pofo_page_title_parallax_effect_single',
          esc_html__('Parallax effects', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              'no-parallax' => esc_html__('No Parallax', 'pofo-addons'),
              '0.1' => esc_html__('Parallax Effect 1', 'pofo-addons'),
              '0.2' => esc_html__('Parallax Effect 2', 'pofo-addons'),
              '0.3' => esc_html__('Parallax Effect 3', 'pofo-addons'),
              '0.4' => esc_html__('Parallax Effect 4', 'pofo-addons'),
              '0.5' => esc_html__('Parallax Effect 5', 'pofo-addons'),
              '0.6' => esc_html__('Parallax Effect 6', 'pofo-addons'),
              '0.7' => esc_html__('Parallax Effect 7', 'pofo-addons'),
              '0.8' => esc_html__('Parallax Effect 8', 'pofo-addons'),
              '0.9' => esc_html__('Parallax Effect 9', 'pofo-addons'),
              '1.0' => esc_html__('Parallax Effect 10', 'pofo-addons')
             ),
          esc_html__('Choose parallax effect', 'pofo-addons'),
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
        );
  pofo_meta_box_dropdown( 'pofo_page_title_opacity_single',
          esc_html__('Page title Opacity', 'pofo-addons'),
          array('default'   => esc_html__( 'Default', 'pofo-addons' ),
            '0.0'   => esc_html__( 'No Opacity', 'pofo-addons' ),
              '0.1'   => esc_html__( '0.1', 'pofo-addons' ),
              '0.2'   => esc_html__( '0.2', 'pofo-addons' ),
              '0.3'   => esc_html__( '0.3', 'pofo-addons' ),
              '0.4'   => esc_html__( '0.4', 'pofo-addons' ),
              '0.5'   => esc_html__( '0.5', 'pofo-addons' ),
              '0.6'   => esc_html__( '0.6', 'pofo-addons' ),
              '0.7'   => esc_html__( '0.7', 'pofo-addons' ),
              '0.8'   => esc_html__( '0.8', 'pofo-addons' ),
              '0.9'   => esc_html__( '0.9', 'pofo-addons' ),
              '1.0'   => esc_html__( '1.0', 'pofo-addons' ),
             ),
          esc_html__('Choose page title opacity', 'pofo-addons'),
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
        );
  pofo_meta_box_dropdown('pofo_disable_breadcrumb_single',
          esc_html__('Breadcrumb', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a breadcrumb will display in page', 'pofo-addons')
        );
  pofo_meta_box_dropdown('pofo_enable_breadcrumb_heading_single',
          esc_html__('Breadcrumb Heading', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a breadcrumb heading will display in page', 'pofo-addons'),
          array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
  pofo_meta_box_dropdown('pofo_page_breadcrumb_position_single',
                    esc_html__( 'Breadcrumb Position', 'pofo-addons' ),
                    array(
                        'default' => esc_html__('Default', 'pofo-addons'),
                        'title-area'  => esc_html__( 'In title area', 'pofo-addons' ),
                        'after-title-area'  => esc_html__( 'After title area', 'pofo-addons' )
                    ),
                    '',
                    array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
                );
  pofo_meta_box_dropdown('pofo_page_breadcrumb_alignment_single',
                  esc_html__('Breadcrumb Alignment', 'pofo-addons'),
                  array('default' => esc_html__('Default', 'pofo-addons'),
                        'text-left'   => esc_html__( 'Left', 'pofo-addons' ),
                        'text-center' => esc_html__( 'Center', 'pofo-addons' ),
                        'text-right'  => esc_html__( 'Right', 'pofo-addons' )
                       ),
                  '',
                  array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
              );
  pofo_meta_box_dropdown('pofo_disable_page_breadcrumb_animation_single',
          esc_html__('Breadcrumb Animation', 'pofo-addons'),
          array('default' => esc_html__('Default', 'pofo-addons'),
              '1' => esc_html__('On', 'pofo-addons'),
              '0' => esc_html__('Off', 'pofo-addons')
             ),
          esc_html__('If on, a breadcrumb Animation will display in page', 'pofo-addons'),
          array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
  pofo_meta_box_dropdown('pofo_page_breadcrumb_animation_single',
          esc_html__('Animation', 'pofo-addons'),
          pofo_animation_style_customizer(),
          esc_html__('If on, a title Animation will display in page', 'pofo-addons'),
          array( 'element' => 'pofo_disable_page_breadcrumb_animation_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_text( 'pofo_page_title_font_size_single', 
          esc_html__('Title Font Size', 'pofo-addons'),
          'In pixel like 15px',
          ''
        );
    pofo_meta_box_text( 'pofo_page_title_line_height_single', 
          esc_html__('Title Line Height', 'pofo-addons'),
          'In pixel like 15px',
          ''
        );
    pofo_meta_box_text( 'pofo_page_title_letter_spacing_single', 
          esc_html__('Title Letter Spacing', 'pofo-addons'),
          'In pixel like 1px',
          ''
        );
    pofo_meta_box_text( 'pofo_page_subtitle_font_size_single', 
          esc_html__('Subtitle Font Size', 'pofo-addons'),
          'In pixel like 15px',
          '',
          array( 'element' => 'pofo_disable_page_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_dropdown('pofo_page_subtitle_opacity_single',
          esc_html__('Subtitle Opacity', 'pofo-addons'),
          array(
            'default' => esc_html__( 'Default', 'pofo-addons' ),
            '0.0'  => esc_html__( 'No opacity', 'pofo-addons' ),
            '0.1'  => '0.1',
            '0.2'  => '0.2',
            '0.3'  => '0.3',
            '0.4'  => '0.4',
            '0.5'  => '0.5',
            '0.6'  => '0.6',
            '0.7'  => '0.7',
            '0.8'  => '0.8',
            '0.9'  => '0.9',
            '1.0'  => '1.0',
             ),
          '',
          array( 'element' => 'pofo_disable_page_subtitle_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_text( 'pofo_page_subtitle_line_height_single', 
          esc_html__('Subtitle Line Height', 'pofo-addons'),
          'In pixel like 15px',
          '',
          array( 'element' => 'pofo_disable_page_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_text( 'pofo_page_subtitle_letter_spacing_single', 
          esc_html__('Subtitle Letter Spacing', 'pofo-addons'),
          'In pixel like 1px',
          '',
          array( 'element' => 'pofo_disable_page_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_text( 'pofo_page_breadcrumb_font_size_single', 
          esc_html__('Breadcrumb Font Size', 'pofo-addons'),
          'In pixel like 15px',
          '',
          array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_text( 'pofo_page_breadcrumb_line_height_single', 
          esc_html__('Breadcrumb Line Height', 'pofo-addons'),
          'In pixel like 15px',
          '',
          array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_text( 'pofo_page_breadcrumb_letter_spacing_single', 
          esc_html__('Breadcrumb Letter Spacing', 'pofo-addons'),
          'In pixel like 1px',
          '',
          array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
  pofo_before_inner_separator_end(
      'separator_end',
      ''
    );  
  pofo_meta_box_separator('pofo_single_page_title_color_single',
            esc_html__( 'Color Settings', 'pofo-addons' )
    );
  pofo_after_inner_separator_start(
    'separator_start',
    ''
  );
  pofo_meta_box_colorpicker( 'pofo_page_title_opacity_color_single',
      esc_html__( 'Opacity Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
    );
  pofo_meta_box_colorpicker( 'pofo_page_title_bg_color_single',
      esc_html__( 'Background Color', 'pofo-addons' )
    );
  pofo_meta_box_colorpicker( 'pofo_page_title_color_single',
      esc_html__( 'Title Text Color', 'pofo-addons' )
    );
  pofo_meta_box_colorpicker( 'pofo_page_subtitle_color_single',
      esc_html__( 'Subtitle Text Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_page_subtitle_single', 'value' => array('default','1'))
    );
  pofo_meta_box_colorpicker( 'pofo_page_title_breadcrumb_bg_color_single',
      esc_html__( 'Breadcrumb Background', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
  );
  pofo_meta_box_colorpicker( 'pofo_page_title_breadcrumb_border_color_single',
      esc_html__( 'Breadcrumb Border', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
  );
  pofo_meta_box_colorpicker( 'pofo_page_title_breadcrumb_color_single',
      esc_html__( 'Breadcrumb Text Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
    );
  pofo_meta_box_colorpicker( 'pofo_page_title_breadcrumb_text_hover_color_single',
      esc_html__( 'Breadcrumb Text Hover Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
    );
  pofo_before_inner_separator_end(
      'separator_end',
      ''
    );
  pofo_before_main_separator_end(
      'separator_main_end',
      ''
    );
}