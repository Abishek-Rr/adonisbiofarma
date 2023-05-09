<?php
/**
 * Metabox For Content.
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
if($post->post_type == 'post'){
	pofo_meta_box_dropdown('pofo_hide_comment_single',
				esc_html__('Comment', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
}elseif($post->post_type == 'portfolio'){

	pofo_meta_box_dropdown(	'pofo_hide_single_portfolio_comment_single',
				esc_html__('Comments', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
}else{
	pofo_meta_box_dropdown(	'pofo_hide_page_comment_single',
				esc_html__('Comments', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
}
pofo_before_inner_separator_end(
      'separator_end',
      ''
    );
pofo_before_main_separator_end(
      'separator_main_end',
      ''
    );