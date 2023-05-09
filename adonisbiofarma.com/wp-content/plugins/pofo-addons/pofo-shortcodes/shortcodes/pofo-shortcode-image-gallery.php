<?php
/**
 * Shortcode For Image gallery
 *
 * @package Pofo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Image gallery */
/*-----------------------------------------------------------------------------------*/

$pofo_lightbox_unique_id = 1;
if ( ! function_exists( 'pofo_image_gallery_shortcode' ) ) {
	function pofo_image_gallery_shortcode( $atts, $content = null ) { 

        global $pofo_lightbox_unique_id, $pofo_responsive_style,$pofo_slider_script,$pofo_justified_gallery_unique_id, $pofo_featured_array;
		$style_attr=array();

		extract( shortcode_atts( array(
		        'id' => '',
		        'class' => '',
	            'css' => '',
	            'pofo_enable_responsive_css' => '',
	            'responsive_css' => '',

	        	'image_gallery_type' => '',
	        	'lightbox_type' => 'grid',
	        	'pofo_gutter_type' => 'gutter-medium',
	        	'pofo_justified_portfolio_gap' => '10',
	        	'justified_title' => '1',
	        	'pofo_justified_gallery_height' =>'400',//add height before html
	        	'pofo_justified_last_row' => 'nojustify',
	        	'pofo_column' => '3',
	        	'single_image' => '',
	        	'image_gallery' => '',
	        	'pofo_image_srcset' => 'full',
	        	'pofo_column_animation_style' => '',
	        	
		        'lightbox_gallery' => '1',
		        'pofo_enable_zoom' => '1',

	            'pofo_show_metro' => '',
	            'pofo_double_grid_position' => '',

	            'pofo_bg_image_type' => '',
	            'desktop_bg_image_position' => '',

	            'pofo_hover_bg_color' => '',
	            'pofo_hover_opacity' => '',
	            'pofo_hover_icon_color' => '',
	            'pofo_hover_icon_hover_bg_color' => '',
	            'pofo_hover_icon_hover_color' => '',
	            'pofo_hover_text_color' => '',
	    ), $atts ) );

		$output = $classes_desktop = $classes_ipad = $classes_masonry = $class_list = $style_property ='';
		$classes = $style_array = array();

        // Check if lightbox id and class
        $pofo_lightbox_unique_id  = ! empty( $pofo_lightbox_unique_id ) ? $pofo_lightbox_unique_id : 1;
        $pofo_lightbox_id      = ! empty( $id ) ? $id : 'pofo-lightbox';
        $pofo_lightbox_id      .= '-' . $pofo_lightbox_unique_id;
        $pofo_lightbox_unique_id++;

        // Check if portfolio id and class
        $pofo_justified_gallery_unique_id	= ! empty( $pofo_justified_gallery_unique_id ) ? $pofo_justified_gallery_unique_id : 1;

        $pofo_justified_gallery_id      = ( $id ) ? $id : 'pofo-justified-gallery';
        $pofo_justified_gallery_id      .= '-' . $pofo_justified_gallery_unique_id;
        $pofo_justified_gallery_unique_id++;

        $id         = ( $id ) ? ' id="'.esc_attr( $id ).'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';
        $classes[]  = $image_gallery_type;
        
        ! empty( $pofo_justified_portfolio_gap ) ? $pofo_justified_portfolio_gap : '0';
        $pofo_justified_gallery_height = ! empty( $pofo_justified_gallery_height ) ? $pofo_justified_gallery_height : '400';
        $pofo_justified_last_row = !empty( $pofo_justified_last_row ) ? $pofo_justified_last_row : 'nojustify';
        
        $pofo_image_srcset  = ! empty( $pofo_image_srcset ) ? $pofo_image_srcset : 'full';
		$explode_image = ! empty( $image_gallery ) ? explode( ",", $image_gallery ) : array();

	    $image_url = ! empty( $single_image ) ? wp_get_attachment_image_src( $single_image, $pofo_image_srcset ) : array();
        $pofo_full_url= ! empty( $single_image ) ? wp_get_attachment_image_url( $single_image, 'full' ) : ''; // Lightbox image

	    $srcset = $srcset_data = $sizes_data = '';
	    $srcset = ! empty( $single_image ) ? wp_get_attachment_image_srcset( $single_image, $pofo_image_srcset ) : '';
	    if( $srcset ){
	        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
	    }

	    $sizes = ! empty( $single_image ) ? wp_get_attachment_image_sizes( $single_image, $pofo_image_srcset ) : '';
	    if( $sizes ){
	        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
	    }

		// Column Animation
		$pofo_column_animation_style = ( $pofo_column_animation_style ) ? ' wow '.$pofo_column_animation_style : '';

        $pofo_column = ! empty( $pofo_column ) ? ' work-'.$pofo_column.'col' : '';
        ! empty( $pofo_gutter_type ) ? $pofo_column .= ' ' . $pofo_gutter_type : '';

        // Background Image
        ! empty( $pofo_bg_image_type ) ? $classes[] = $pofo_bg_image_type : '';
        ! empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';

        // Disable zoom
		if( $lightbox_gallery == 0 ) {
			
			$pofo_featured_array[] = '.'.$image_gallery_type.' .grid-item figure:hover .portfolio-img img { opacity: 1; }';// opacity 1
			$pofo_featured_array[] = '.'.$image_gallery_type.' .grid-item figure img { cursor: inherit !important; }';// cursor default
			$pofo_featured_array[] = '.simple-image-lightbox.grid-item figure:hover img { cursor: inherit !important; opacity: 1; filter: inherit; }';// cursor default, opacity 1 and remove image filter
		}

        // Disable zoom
		if( $pofo_enable_zoom == 0 ) {
			
			$pofo_featured_array[] = '.'.$image_gallery_type.' .grid-item figure .portfolio-img img, .simple-image-lightbox.grid-item figure .portfolio-img img { transform: scale(1, 1); }';// disalbe zoom
			$pofo_featured_array[] = '.lightbox-gallery .grid-item figure:hover img, .zoom-gallery .grid-item figure:hover img { filter: inherit; }';// remove image filter
		}

		if( $image_gallery_type == 'simple-image-lightbox' ) {

	        // Image Alt, Title, Caption
	        $img_alt            = ! empty( $single_image ) ? pofo_option_image_alt($single_image) : array();
	        $img_title          = ! empty( $single_image ) ? pofo_option_image_title($single_image) : array();
	        $image_alt          = ! empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
	        $image_title        = ! empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';        

			$img_lightbox_caption 	= ! empty( $single_image ) ? pofo_option_lightbox_image_caption($single_image) : array();
			$img_lightbox_title 	= ! empty( $single_image ) ? pofo_option_lightbox_image_title($single_image) : array();
			$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
			$image_lightbox_title 	= ! empty($img_lightbox_title['title'] ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;
		}

        // Metro Gallery
        ( $pofo_show_metro == 1 ) ? $classes[] = 'portfolio-metro-grid' : '';
        $double_grid_position = $pofo_show_metro == 1 && ! empty( $pofo_double_grid_position ) ? explode(',', $pofo_double_grid_position) : array();

        // CSS Box
        $css_class  = vc_shortcode_custom_css_class( $css, ' ' );
        $css_class  = ( $css_class ) ? $classes[] = $css_class : '';
        
        // Responsive CSS Box
        if( $pofo_enable_responsive_css == 1 && ! empty( $responsive_css ) ) {
            $responsive_id = uniqid('pofo-image-gallery-responsive-');
            $responsive_style = pofo_addons_get_responsive_style( $responsive_css, $responsive_id );
            $classes[] = $responsive_id;
        }

		// Class List
		$class_list = ! empty( $classes ) ? ' ' . implode(" ", $classes) : '';

		// Style Property List
		$style_property_list = ! empty( $style_array ) ? implode(" ", $style_array) : '';
		$style_property = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

		// Hover Style
		$pofo_hover_opacity = $pofo_hover_opacity != '' ? 'opacity:'.$pofo_hover_opacity.';' : '';
		$pofo_hover_bg_color = ($pofo_hover_bg_color) ? 'background-color:'.$pofo_hover_bg_color.'; ' : '';
		$pofo_hover_icon_color = ($pofo_hover_icon_color) ? 'color:'.$pofo_hover_icon_color.'; ' : '';
		$pofo_hover_text_color = ($pofo_hover_text_color) ? 'color:'.$pofo_hover_text_color.'; ' : '';

		if( $image_gallery_type != 'justified-gallery' ) {

	        if( ! empty( $pofo_hover_bg_color ) ) {
	            $pofo_featured_array[] = '.'.$image_gallery_type.' figure .portfolio-img { '.$pofo_hover_bg_color.' }';
	        }
	        if( ! empty( $pofo_hover_opacity ) ) {
	            $pofo_featured_array[] = '.'.$image_gallery_type.' figure:hover .portfolio-img img { '.$pofo_hover_opacity.' }';
	        }
	        if( ! empty( $pofo_hover_icon_color ) ) {
	            $pofo_featured_array[] = '.'.$image_gallery_type.' figure .portfolio-hover-main i { '.$pofo_hover_icon_color.' }';
	        }
	    }
		if( $image_gallery_type == 'metro-gallery' ) {

	        if( ! empty( $pofo_hover_icon_hover_bg_color ) ) {
	            $pofo_featured_array[] = '.metro-gallery.hover-option10 .grid-item .portfolio-icon a, .metro-gallery.hover-option10 .grid-item .portfolio-icon a:hover { border-color: '.$pofo_hover_icon_hover_bg_color.'; }';
	            $pofo_featured_array[] = '.metro-gallery.hover-option10 .grid-item .portfolio-icon a:hover { background-color: '.$pofo_hover_icon_hover_bg_color.'; }';
	        }
	        if( ! empty( $pofo_hover_icon_hover_color ) ) {
	            $pofo_featured_array[] = '.metro-gallery.hover-option10 .grid-item .portfolio-icon a:hover i { color: '.$pofo_hover_icon_hover_color.'; }';
	        }
		}
		if( $image_gallery_type == 'justified-gallery' ) {

	        if( ! empty( $pofo_hover_bg_color ) ) {
	            $pofo_featured_array[] = '.justified-gallery > a > .caption { '.$pofo_hover_bg_color.' }';
	        }
	        if( ! empty( $pofo_hover_text_color ) ) {
	            $pofo_featured_array[] = '.justified-gallery > a > .caption { '.$pofo_hover_text_color.' }';
	        }
		}

		switch ($image_gallery_type) {
	     	case 'simple-image-lightbox':
				if( ! empty( $image_url[0] ) ):

					$portfolio_img_wrap = $lightbox_gallery == 1 ? ' bg-extra-dark-gray' : '';
                    $output .='<div class="portfolio-grid hover-option2 single-image-lightbox-wrapper">';
                        $output .='<div class="grid-sizer"></div>';
                        $output .= '<div '.$id.' class="grid-item'.esc_attr( $class_list ).esc_attr( $pofo_column_animation_style ).'"'.$style_property.'>';
                            if( $lightbox_gallery == 1 ) {
                                $output .= '<a class="single-image-lightbox" href="'.esc_url( $pofo_full_url ).'" '.$image_lightbox_title.$image_lightbox_caption.'>';
                        	}
                            		$output .= '<figure>';
                                                $output .= '<div class="portfolio-img'.esc_attr( $portfolio_img_wrap ).'">';
                            						$output .= '<img src="'.esc_url( $image_url[0] ).'" '.$image_alt.$image_title.' width="'.$image_url[1].'" height="'.$image_url[2].'"'.$srcset_data.$sizes_data.' class="project-img-gallery"/>';
                        						$output .= '</div>';
                        	if( $lightbox_gallery == 1 ){
			                            $output .= '<figcaption>';
			                                $output .= '<div class="portfolio-hover-main text-center">';
			                                    $output .= '<div class="portfolio-hover-box vertical-align-middle">';
			                                        $output .= '<div class="portfolio-hover-content position-relative">';
			                                            $output .= '<i class="ti-zoom-in text-white fa-2x"></i>';
			                                        $output .= '</div>';
			                                    $output .= '</div>';
			                                $output .= '</div>';
			                            $output .= '</figcaption>';
                        	}
                                	$output .= '</figure>';
                        	if( $lightbox_gallery == 1 ) {
                                	$output .= '</a>';
                        	}
                		$output .='</div>';
			        $output .='</div>';
			    endif;
	     	break;
	     	case 'lightbox-gallery':
	     		switch ($lightbox_type) {
					case 'grid':
						if($explode_image):

							$output .='<ul '.$id.' class="portfolio-grid hover-option2'.$class_list.$pofo_column.'"'.$style_property.'>';
            					$output .='<li class="grid-sizer"></li>';
								
		                    	$i = 0;
								foreach ($explode_image as $key => $value) {

		                        	$i++;
			                        $double_grid_class = ! empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? ' grid-item-double ' : '';

							        // Image Alt, Title, Caption
							        $img_alt            = ! empty( $value ) ? pofo_option_image_alt($value) : array();
							        $img_title          = ! empty( $value ) ? pofo_option_image_title($value) : array();
							        $image_alt          = ! empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
							        $image_title        = ! empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';        

									$img_lightbox_caption 	= ! empty( $value ) ? pofo_option_lightbox_image_caption($value) : array();
									$img_lightbox_title 	= ! empty( $value ) ? pofo_option_lightbox_image_title($value) : array();
									$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
									$image_lightbox_title 	= ! empty($img_lightbox_title['title'] ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;

								    $thumb = ! empty( $value ) ? wp_get_attachment_image_src($value, $pofo_image_srcset) : array();
        							$pofo_full_url= ! empty( $value ) ? wp_get_attachment_image_url( $value, 'full' ) : ''; // Lightbox image

								    $srcset = $srcset_data = $sizes_data = '';
								    $srcset = ! empty( $value ) ? wp_get_attachment_image_srcset( $value, $pofo_image_srcset ) : '';
								    if( $srcset ){
								        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
								    }

								    $sizes = ! empty( $value ) ? wp_get_attachment_image_sizes( $value, $pofo_image_srcset ) : '';
								    if( $sizes ){
								        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
								    }

									$output .='<li class="grid-item'.$double_grid_class.$pofo_column_animation_style.'">';
										if( $lightbox_gallery == 1 ){
								            $output .='<a href="'.esc_url( $pofo_full_url ).'" class="lightbox-group-gallery-item" data-group="'.$pofo_lightbox_id.'" '.$image_lightbox_title.$image_lightbox_caption.'>';
								        }
					        					$output .= '<figure>';
									        		$output .= '<div class="portfolio-img bg-extra-dark-gray">';
				                                    	$output .= '<img src="'.esc_url( $thumb[0] ).'" '.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'"'.$srcset_data.$sizes_data.' class="project-img-gallery" data-no-retina="" />';
				                                    $output .= '</div>';
							            if( $lightbox_gallery == 1 ){
				                                    $output .= '<figcaption>';
				                                        $output .= '<div class="portfolio-hover-main text-center">';
				                                            $output .= '<div class="portfolio-hover-box vertical-align-middle">';
				                                                $output .= '<div class="portfolio-hover-content position-relative">';
				                                                    $output .= '<i class="ti-zoom-in text-white fa-2x"></i>';
				                                                $output .= '</div>';
				                                            $output .= '</div>';
				                                        $output .= '</div>';
				                                    $output .= '</figcaption>';
				                        }
					        					$output .= '</figure>';
				                        if( $lightbox_gallery == 1 ) {
								            $output .='</a>';
								        }
		                            $output .='</li>';
							    }
					        $output .='</ul>';
					    endif;
					break;
					case 'masonry':
						if($explode_image):

							$output .='<ul '.$id.' class="portfolio-grid hover-option2'.$class_list.$pofo_column.'"'.$style_property.'>';
            					$output .='<li class="grid-sizer"></li>';

		                    	$i = 0;
								foreach ($explode_image as $key => $value) {

		                        	$i++;
			                        $double_grid_class = ! empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? ' grid-item-double ' : '';

							        // Image Alt, Title, Caption
							        $img_alt            = ! empty( $value ) ? pofo_option_image_alt($value) : array();
							        $img_title          = ! empty( $value ) ? pofo_option_image_title($value) : array();
							        $image_alt          = ! empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
							        $image_title        = ! empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';        

									$img_lightbox_caption 	= ! empty( $value ) ? pofo_option_lightbox_image_caption($value) : array();
									$img_lightbox_title 	= ! empty( $value ) ? pofo_option_lightbox_image_title($value) : array();
									$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
									$image_lightbox_title 	= ! empty($img_lightbox_title['title'] ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;

								    $thumb = ! empty( $value ) ? wp_get_attachment_image_src($value, $pofo_image_srcset) : array();
        							$pofo_full_url= ! empty( $value ) ? wp_get_attachment_image_url( $value, 'full' ) : ''; // Lightbox image

								    $srcset = $srcset_data = $sizes_data = '';
								    $srcset = ! empty( $value ) ? wp_get_attachment_image_srcset( $value, $pofo_image_srcset ) : '';
								    if( $srcset ){
								        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
								    }

								    $sizes = ! empty( $value ) ? wp_get_attachment_image_sizes( $value, $pofo_image_srcset ) : '';
								    if( $sizes ){
								        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
								    }

									$output .='<li class="grid-item'.$double_grid_class.$pofo_column_animation_style.'">';
										if( $lightbox_gallery == 1 ) {
								            $output .='<a href="'.esc_url( $pofo_full_url ).'" class="lightbox-group-gallery-item" data-group="'.$pofo_lightbox_id.'" '.$image_lightbox_title.$image_lightbox_caption.'>';
								        }
					        					$output .= '<figure>';
									        		$output .= '<div class="portfolio-img bg-extra-dark-gray">';
				                                    	$output .= '<img src="'.esc_url( $thumb[0] ).'" '.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'"'.$srcset_data.$sizes_data.' class="project-img-gallery" data-no-retina="" />';
				                                    $output .= '</div>';
							            if( $lightbox_gallery == 1 ){
				                                    $output .= '<figcaption>';
				                                        $output .= '<div class="portfolio-hover-main text-center">';
				                                            $output .= '<div class="portfolio-hover-box vertical-align-middle">';
				                                                $output .= '<div class="portfolio-hover-content position-relative">';
				                                                    $output .= '<i class="ti-zoom-in text-white fa-2x"></i>';
				                                                $output .= '</div>';
				                                            $output .= '</div>';
				                                        $output .= '</div>';
				                                    $output .= '</figcaption>';
				                        }
					        					$output .= '</figure>';
				                        if( $lightbox_gallery == 1 ) {
								            $output .='</a>';
								        }
		                            $output .='</li>';
							    }
					        $output .='</ul>';
					    endif;
					break;
				}
	     	break;
     		case 'zoom-gallery':
				if($explode_image):
					$output .= '<div '.$id.' class="zoom-gallery">';
						$output .='<ul class="portfolio-grid hover-option2'.$class_list.$pofo_column.'"'.$style_property.'>';
        					$output .='<li class="grid-sizer"></li>';
							
	                    	$i = 0;
							foreach ($explode_image as $key => $value) {

	                        	$i++;
		                        $double_grid_class = ! empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? ' grid-item-double ' : '';

						        // Image Alt, Title, Caption
						        $img_alt            = ! empty( $value ) ? pofo_option_image_alt($value) : array();
						        $img_title          = ! empty( $value ) ? pofo_option_image_title($value) : array();
						        $image_alt          = ! empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
						        $image_title        = ! empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';        

								$img_lightbox_caption 	= ! empty( $value ) ? pofo_option_lightbox_image_caption($value) : array();
								$img_lightbox_title 	= ! empty( $value ) ? pofo_option_lightbox_image_title($value) : array();
								$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
								$image_lightbox_title 	= ! empty($img_lightbox_title['title'] ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;

							    $thumb = ! empty( $value ) ? wp_get_attachment_image_src($value, $pofo_image_srcset) : array();
        						$pofo_full_url= ! empty( $value ) ? wp_get_attachment_image_url( $value, 'full' ) : ''; // Lightbox image

							    $srcset = $srcset_data = $sizes_data = '';
							    $srcset = ! empty( $value ) ? wp_get_attachment_image_srcset( $value, $pofo_image_srcset ) : '';
							    if( $srcset ){
							        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
							    }

							    $sizes = ! empty( $value ) ? wp_get_attachment_image_sizes( $value, $pofo_image_srcset ) : '';
							    if( $sizes ){
							        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
							    }

								$output .='<li class="grid-item'.$double_grid_class.$pofo_column_animation_style.'">';
									if( $lightbox_gallery == 1 ) {
							            $output .='<a href="'.esc_url( $pofo_full_url ).'" '.$image_lightbox_title.$image_lightbox_caption.'>';
							        }
				        				$output .= '<figure>';
								        		$output .= '<div class="portfolio-img bg-extra-dark-gray">';
			                                    	$output .= '<img src="'.esc_url( $thumb[0] ).'" '.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'"'.$srcset_data.$sizes_data.' class="project-img-gallery" data-no-retina="" />';
			                                    $output .= '</div>';
						            if( $lightbox_gallery == 1 ){
			                                    $output .= '<figcaption>';
			                                        $output .= '<div class="portfolio-hover-main text-center">';
			                                            $output .= '<div class="portfolio-hover-box vertical-align-middle">';
			                                                $output .= '<div class="portfolio-hover-content position-relative">';
			                                                    $output .= '<i class="ti-zoom-in text-white fa-2x"></i>';
			                                                $output .= '</div>';
			                                            $output .= '</div>';
			                                        $output .= '</div>';
			                                    $output .= '</figcaption>';
			                        }
			                            $output .= '</figure>';
			                        if( $lightbox_gallery == 1 ) {
							            $output .='</a>';
							        }
	                            $output .='</li>';
						    }
				        $output .='</ul>';
				    $output .='</div>';
			    endif;
     		break;

			case 'metro-gallery':
				if($explode_image):
					
					$class_list .= $lightbox_gallery == 1 ? ' lightbox-portfolio' : '';
					$portfolio_img_wrap = $lightbox_gallery == 1 ? ' bg-black' : '';
					$output .='<ul '.$id.' class="portfolio-grid hover-option10'.$class_list.$pofo_column.'"'.$style_property.'>';
    					$output .='<li class="grid-sizer"></li>';

                    	$i = 0;
						foreach ($explode_image as $key => $value) {

                        	$i++;
	                        $double_grid_class = ! empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? ' grid-item-double ' : '';

					        // Image Alt, Title, Caption
					        $img_alt            = ! empty( $value ) ? pofo_option_image_alt($value) : array();
					        $img_title          = ! empty( $value ) ? pofo_option_image_title($value) : array();
					        $image_alt          = ! empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
					        $image_title        = ! empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';        

							$img_lightbox_caption 	= ! empty( $value ) ? pofo_option_lightbox_image_caption($value) : array();
							$img_lightbox_title 	= ! empty( $value ) ? pofo_option_lightbox_image_title($value) : array();
							$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
							$image_lightbox_title 	= ! empty($img_lightbox_title['title'] ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;

						    $thumb = ! empty( $value ) ? wp_get_attachment_image_src($value, $pofo_image_srcset) : array();
							$pofo_full_url= ! empty( $value ) ? wp_get_attachment_image_url( $value, 'full' ) : ''; // Lightbox image

						    $srcset = $srcset_data = $sizes_data = '';
						    $srcset = ! empty( $value ) ? wp_get_attachment_image_srcset( $value, $pofo_image_srcset ) : '';
						    if( $srcset ){
						        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
						    }

						    $sizes = ! empty( $value ) ? wp_get_attachment_image_sizes( $value, $pofo_image_srcset ) : '';
						    if( $sizes ){
						        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
						    }

							$output .='<li class="grid-item'.$double_grid_class.$pofo_column_animation_style.'">';
		        					$output .= '<figure>';
						        		$output .= '<div class="portfolio-img pofo-portfolio-page-background'.esc_attr( $portfolio_img_wrap ).'">';
	                                    	$output .= '<img src="'.esc_url( $thumb[0] ).'" '.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'"'.$srcset_data.$sizes_data.' class="project-img-gallery" data-no-retina="" />';
	                                    $output .= '</div>';
			            		if( $lightbox_gallery == 1 ){
	                                    $output .= '<figcaption>';
		                                    $output .='<div class="portfolio-hover-main text-center">';
		                                        $output .='<div class="portfolio-hover-box vertical-align-middle">';
	                                                $output .= '<div class="portfolio-icon">';
														$output .= '<a href="'.esc_url( $pofo_full_url ).'" class="gallery-link" data-group="'.$pofo_lightbox_id.'" '.$image_lightbox_title.$image_lightbox_caption.'><i class="ti-zoom-in text-white fa-2x" aria-hidden="true"></i></a>';
                                            		$output .= '</div>';
		                                        $output .= '</div>';
		                                    $output .= '</div>';
	                                    $output .= '</figcaption>';
                            	}
		        					$output .= '<figure>';
                            $output .='</li>';
					    }
			        $output .='</ul>';
			    endif;
			break;

     		case 'justified-gallery':
				if($explode_image):

					$class_list .= $lightbox_gallery == 1 ? ' lightbox-portfolio' : '';
					$output .= '<div '.$id.' class="justified-gallery no-transition '.$pofo_justified_gallery_id.$class_list.'" data-height="'.$pofo_justified_gallery_height.'" data-spacing="'.$pofo_justified_portfolio_gap.'" data-uniqueid="'.$pofo_justified_gallery_id.'">';
						
							foreach( $explode_image as $key => $value ) {
						        // Image Alt, Title, Caption
						        $img_alt            = ! empty( $value ) ? pofo_option_image_alt($value) : array();
						        $img_title          = ! empty( $value ) ? pofo_option_image_title($value) : array();
						        $image_alt          = ! empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
						        $image_title        = ! empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

								$img_lightbox_caption 	= ! empty( $value ) ? pofo_option_lightbox_image_caption($value) : array();
								$img_lightbox_title 	= ! empty( $value ) ? pofo_option_lightbox_image_title($value) : array();
								$image_lightbox_caption = ! empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
								$image_lightbox_title 	= ! empty($img_lightbox_title['title'] ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;
								
								if( $justified_title != 1  ) {
									$image_lightbox_caption = '';
									$image_lightbox_title = '';
								}

							    $thumb = ! empty( $value ) ? wp_get_attachment_image_src($value, $pofo_image_srcset) : array();
        						$pofo_full_url= ! empty( $value ) ? wp_get_attachment_image_url( $value, 'full' ) : ''; // Lightbox image

							    $srcset = $srcset_data = $sizes_data = '';
							    $srcset = ! empty( $value ) ? wp_get_attachment_image_srcset( $value, $pofo_image_srcset ) : '';
							    if( $srcset ){
							        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
							    }

							    $sizes = ! empty( $value ) ? wp_get_attachment_image_sizes( $value, $pofo_image_srcset ) : '';
							    if( $sizes ){
							        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
							    }
							    
							    if( $lightbox_gallery == 1 ) {
							    	$output .= '<a class="gallery-link" href="'.esc_url( $pofo_full_url ).'"'.$image_lightbox_title.$image_lightbox_caption.'>';
								} else {
							    	$output .= '<div class="gallery-link">';
							    }
                                    $output .= '<img src="'.esc_url( $thumb[0] ).'" '.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'"'.$srcset_data.$sizes_data.' class="project-img-gallery" data-no-retina="" />';
										$justified_title = ! empty( $justified_title ) ? $justified_title : '';
										$caption_title='';
                                     	if( $justified_title == 1 && ! empty( $img_lightbox_caption['caption'] ) ) {
                                        	$output .= '<div class="caption pofo-portfolio-page-background">';
                                            	   $output .= '<div class="entry-title">'.$img_lightbox_caption['caption'].'</div>';
                                        	$output .= '</div>';
                                        	$caption_title='captions: true,';
                                        }
                                if( $lightbox_gallery == 1 ) {
                                	$output .= '</a>';
                                } else {
                                	$output .= '</div>';
                                }
						    }
				      $output .='</div>';
				     ob_start(); ?>
	                $(document).ready(function () {$(document).imagesLoaded(function () { if ($('.<?php echo $pofo_justified_gallery_id; ?>').length > 0) { $('.<?php echo $pofo_justified_gallery_id; ?>').justifiedGallery({ lastRow: '<?php echo $pofo_justified_last_row; ?>', rowHeight: <?php echo $pofo_justified_gallery_height ?>, maxRowHeight: false, <?php  echo $caption_title; ?> margins: <?php echo $pofo_justified_portfolio_gap ?>, waitThumbnailsLoad: true, }); } }); });
	                <?php 
	                $pofo_slider_script .= ob_get_contents();

                ob_end_clean();
			    endif;
     		break;
		}

        // Responsive CSS Box Style
        if( $pofo_enable_responsive_css == 1 && ! empty( $responsive_style ) ) {
            
            $pofo_responsive_style .= $responsive_style;
        }

		return $output;   
	}
}
add_shortcode( 'pofo_image_gallery', 'pofo_image_gallery_shortcode' );
