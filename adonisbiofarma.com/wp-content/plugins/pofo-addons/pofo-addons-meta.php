<?php
/**
 * Post Meta file.
 *
 * @package Pofo
 */
?>
<?php

/* Pofo category and tag extra custom fields */
if( ! function_exists( 'pofo_category_add_meta_field' ) ) :
    function pofo_category_add_meta_field() {
        // Get All Register Sidebar List.
        $sidebar_array = pofo_register_sidebar_array();

        // this will add the custom meta field to the add new term page
        ?>
        <div class="form-field">
            <label for="term_meta[pofo_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo-addons' ); ?></label>
            <input type="text" name="term_meta[pofo_archive_title_subtitle]" id="pofo_archive_title_subtitle" value="" class="category-custom-field-input">
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_archive_title_bg_image]"><?php echo esc_html__( 'Title Background Image', 'pofo-addons' ); ?></label>
            <input name="pofo_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="" />
            <input name="term_meta[pofo_archive_title_bg_image]" class="pofo_archive_title_bg_image_thumb" id="pofo_archive_title_bg_image_thumb" type="hidden" value="" />
            <img class="upload_image_screenshort" src="" />
            <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" />
            <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo-addons' ); ?></span>
        </div>

        <div class="form-field">
            <label for="term_meta[pofo_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo-addons' ); ?></label>
            <input name="term_meta[pofo_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
            <div class="multiple_images">
                
            </div>
            <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo-addons' ); ?>
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo-addons' ); ?></p>
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo-addons' ); ?></label>
            <select name="term_meta[pofo_archive_title_video_type]" id="pofo_archive_title_video_type" class="category-custom-field-select">
                <option value="default"><?php echo esc_html__( 'Default', 'pofo-addons' ); ?></option>
                <option value="self"><?php echo esc_html__( 'Self', 'pofo-addons' ); ?></option>
                <option value="external"><?php echo esc_html__( 'External', 'pofo-addons' ); ?></option>
            </select>
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo-addons' ); ?></label>
            <input type="text" name="term_meta[pofo_archive_title_video_mp4]" id="pofo_archive_title_video_mp4" value="" class="category-custom-field-input">
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo-addons' ); ?></label>
            <input type="text" name="term_meta[pofo_archive_title_video_ogg]" id="pofo_archive_title_video_ogg" value="" class="category-custom-field-input">
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo-addons' ); ?></label>
            <input type="text" name="term_meta[pofo_archive_title_video_webm]" id="pofo_archive_title_video_webm" value="" class="category-custom-field-input">
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_archive_title_video_youtube]"><?php echo esc_html__( 'External Video URL', 'pofo-addons' ); ?></label>
            <input type="text" name="term_meta[pofo_archive_title_video_youtube]" id="pofo_archive_title_video_youtube" value="" class="category-custom-field-input">
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
        </div>

    <?php
    }
endif;
add_action( 'category_add_form_fields', 'pofo_category_add_meta_field', 10, 2 );
add_action( 'post_tag_add_form_fields', 'pofo_category_add_meta_field', 10, 2 );

if ( ! function_exists( 'pofo_taxonomy_edit_meta_field' ) ) :
    function pofo_taxonomy_edit_meta_field($term) {
     
        // put the term ID into a variable
        $pofo_t_id = $term->term_id;
     
        // retrieve the existing value(s) for this meta field. This returns an array
        $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" );
        $pofo_archive_title_subtitle = isset( $pofo_term_meta['pofo_archive_title_subtitle'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_subtitle'] ) : '';
        $pofo_image_url = isset( $pofo_term_meta['pofo_archive_title_bg_image'] ) ? $pofo_term_meta['pofo_archive_title_bg_image'] : '';

        $pofo_archive_title_bg_image = isset( $pofo_term_meta['pofo_archive_title_bg_image'] ) ? 'src = "'.esc_attr( $pofo_term_meta['pofo_archive_title_bg_image'] ).'"' : '';

        $pofo_archive_title_bg_multiple_image = isset( $pofo_term_meta['pofo_archive_title_bg_multiple_image'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_bg_multiple_image'] ) : '';
        $pofo_archive_title_video_type = isset( $pofo_term_meta['pofo_archive_title_video_type'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_video_type'] ) : '';
        $pofo_archive_title_video_mp4 = isset( $pofo_term_meta['pofo_archive_title_video_mp4'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_video_mp4'] ) : '';
        $pofo_archive_title_video_ogg = isset( $pofo_term_meta['pofo_archive_title_video_ogg'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_video_ogg'] ) : '';
        $pofo_archive_title_video_webm = isset( $pofo_term_meta['pofo_archive_title_video_webm'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_video_webm'] ) : '';
        $pofo_archive_title_video_youtube = isset( $pofo_term_meta['pofo_archive_title_video_youtube'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_video_youtube'] ) : '';
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo-addons' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_archive_title_subtitle]" id="pofo_archive_title_subtitle" value="<?php echo esc_attr( $pofo_archive_title_subtitle ) ?>" class="category-custom-field-input">
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_bg_image]"><?php echo esc_html__( 'Title Background Image', 'pofo-addons' ); ?></label></th>
            <td>
                <input name="pofo_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                <input name="term_meta[pofo_archive_title_bg_image]" class="pofo_archive_title_bg_image_thumb" id="pofo_archive_title_bg_image_thumb" type="hidden" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                <img class="upload_image_screenshort" <?php echo wp_kses($pofo_archive_title_bg_image, wp_kses_allowed_html( 'post' )); ?> />
                <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" />
                <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo-addons' ); ?></span>
            </td>
        </tr>

        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo-addons' ); ?></label></th>
            <td>
                <input name="term_meta[pofo_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    <?php
                    $pofo_val = explode(",",$pofo_archive_title_bg_multiple_image);
                    foreach ($pofo_val as $key => $value) {
                        if(! empty($value)):
                            $pofo_image_url = wp_get_attachment_url( $value );
                            echo '<div id='.esc_attr($value).'>';
                                echo '<img class="upload_image_screenshort_multiple" alt="'.esc_html__( 'Image', 'pofo-addons' ).'" src="'.$pofo_image_url.'" style="width:100px;" />';
                                echo '<a href="javascript:void(0)" class="remove">'.esc_html__( 'Remove', 'pofo-addons' ).'</a>';
                            echo '</div>';
                        endif;
                    }
                    ?>
                </div>
                <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo-addons' ); ?>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo-addons' ); ?></label></th>
            <td>
                <select name="term_meta[pofo_archive_title_video_type]" id="pofo_archive_title_video_type" class="category-custom-field-select">
                    <option value="default" <?php echo esc_html( $pofo_archive_title_video_type ) == "default" ? 'selected="selected"' : '' ?> ><?php echo esc_html__( 'Default', 'pofo-addons' ); ?></option>
                    <option value="self" <?php echo esc_html( $pofo_archive_title_video_type ) == "self" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'Self', 'pofo-addons' ); ?></option>
                    <option value="external" <?php echo esc_html( $pofo_archive_title_video_type ) == "external" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'External', 'pofo-addons' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo-addons' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_archive_title_video_mp4]" id="pofo_archive_title_video_mp4" value="<?php echo esc_attr( $pofo_archive_title_video_mp4 ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo-addons' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_archive_title_video_ogg]" id="pofo_archive_title_video_ogg" value="<?php echo esc_attr( $pofo_archive_title_video_ogg ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo-addons' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_archive_title_video_webm]" id="pofo_archive_title_video_webm" value="<?php echo esc_attr( $pofo_archive_title_video_webm ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_video_youtube]"><?php echo esc_html__( 'External Video URL', 'pofo-addons' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_archive_title_video_youtube]" id="pofo_archive_title_video_youtube" value="<?php echo esc_attr( $pofo_archive_title_video_youtube ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
    <?php
    }
endif;
add_action( 'category_edit_form_fields', 'pofo_taxonomy_edit_meta_field', 10, 2 );
add_action( 'post_tag_edit_form_fields', 'pofo_taxonomy_edit_meta_field', 10, 2 );

if ( ! function_exists( 'pofo_save_taxonomy_custom_meta' ) ) :
    function pofo_save_taxonomy_custom_meta( $pofo_term_id ) {
        if ( isset( $_POST['term_meta'] ) ) {
            $pofo_t_id = $pofo_term_id;
            $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" );
            $pofo_cat_keys = array_keys( $_POST['term_meta'] );
            foreach ( $pofo_cat_keys as $key ) {
                if ( isset ( $_POST['term_meta'][$key] ) ) {
                    $pofo_term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            // Save the option array.
            update_option( "pofo_taxonomy_$pofo_t_id", $pofo_term_meta );
        }
    }  
endif;
add_action( 'edited_category', 'pofo_save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_category', 'pofo_save_taxonomy_custom_meta', 10, 2 );
add_action( 'edited_post_tag', 'pofo_save_taxonomy_custom_meta', 10, 2 );
add_action( 'create_post_tag', 'pofo_save_taxonomy_custom_meta', 10, 2 );

/* Pofo portfolio category extra custom fields */
if( ! function_exists( 'pofo_portfolio_category_add_meta_field' ) ) :
    function pofo_portfolio_category_add_meta_field() {
        // Get All Register Sidebar List.
        $sidebar_array = pofo_register_sidebar_array();

        // this will add the custom meta field to the add new term page
        ?>
        <div class="form-field">
            <label for="term_meta[pofo_portfolio_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo-addons' ); ?></label>
            <input type="text" name="term_meta[pofo_portfolio_archive_title_subtitle]" id="pofo_portfolio_archive_title_subtitle" value="" class="category-custom-field-input">
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_portfolio_archive_title_bg_image]"><?php echo esc_html__( 'Title Background Image', 'pofo-addons' ); ?></label>
            <input name="pofo_portfolio_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="" />
            <input name="term_meta[pofo_portfolio_archive_title_bg_image]" class="pofo_portfolio_archive_title_bg_image_thumb" id="pofo_portfolio_archive_title_bg_image_thumb" type="hidden" value="" />
            <img class="upload_image_screenshort" src="" />
            <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" />
            <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo-addons' ); ?></span>
        </div>

        <div class="form-field">
            <label for="term_meta[pofo_portfolio_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo-addons' ); ?></label>
            <input name="term_meta[pofo_portfolio_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
            <div class="multiple_images">
                
            </div>
            <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo-addons' ); ?>
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo-addons' ); ?></p>
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_portfolio_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo-addons' ); ?></label>
            <select name="term_meta[pofo_portfolio_archive_title_video_type]" id="pofo_portfolio_archive_title_video_type" class="category-custom-field-select">
                <option value="default"><?php echo esc_html__( 'Default', 'pofo-addons' ); ?></option>
                <option value="self"><?php echo esc_html__( 'Self', 'pofo-addons' ); ?></option>
                <option value="external"><?php echo esc_html__( 'External', 'pofo-addons' ); ?></option>
            </select>
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_portfolio_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo-addons' ); ?></label>
            <input type="text" name="term_meta[pofo_portfolio_archive_title_video_mp4]" id="pofo_portfolio_archive_title_video_mp4" value="" class="category-custom-field-input">
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_portfolio_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo-addons' ); ?></label>
            <input type="text" name="term_meta[pofo_portfolio_archive_title_video_ogg]" id="pofo_portfolio_archive_title_video_ogg" value="" class="category-custom-field-input">
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_portfolio_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo-addons' ); ?></label>
            <input type="text" name="term_meta[pofo_portfolio_archive_title_video_webm]" id="pofo_portfolio_archive_title_video_webm" value="" class="category-custom-field-input">
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
        </div>
        <div class="form-field">
            <label for="term_meta[pofo_portfolio_archive_title_video_youtube]"><?php echo esc_html__( 'External Video URL', 'pofo-addons' ); ?></label>
            <input type="text" name="term_meta[pofo_portfolio_archive_title_video_youtube]" id="pofo_portfolio_archive_title_video_youtube" value="" class="category-custom-field-input">
            <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
        </div>

    <?php
    }
endif;
add_action( 'portfolio-category_add_form_fields', 'pofo_portfolio_category_add_meta_field', 10, 2 );
add_action( 'portfolio-tags_add_form_fields', 'pofo_portfolio_category_add_meta_field', 10, 2 );

if ( ! function_exists( 'pofo_portfolio_taxonomy_edit_meta_field' ) ) :
    function pofo_portfolio_taxonomy_edit_meta_field($term) {
     
        // put the term ID into a variable
        $pofo_t_id = $term->term_id;
     
        // retrieve the existing value(s) for this meta field. This returns an array
        $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" );
        $pofo_portfolio_archive_title_subtitle = isset( $pofo_term_meta['pofo_portfolio_archive_title_subtitle'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_subtitle'] ) : '';
        $pofo_image_url = isset( $pofo_term_meta['pofo_portfolio_archive_title_bg_image'] ) ? $pofo_term_meta['pofo_portfolio_archive_title_bg_image'] : '';

        $pofo_portfolio_archive_title_bg_image = isset( $pofo_term_meta['pofo_portfolio_archive_title_bg_image'] ) ? 'src = "'.esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_bg_image'] ).'"' : '';

        $pofo_portfolio_archive_title_bg_multiple_image = isset( $pofo_term_meta['pofo_portfolio_archive_title_bg_multiple_image'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_bg_multiple_image'] ) : '';
        
        $pofo_portfolio_archive_title_video_type = isset( $pofo_term_meta['pofo_portfolio_archive_title_video_type'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_type'] ) : '';
        $pofo_portfolio_archive_title_video_mp4 = isset( $pofo_term_meta['pofo_portfolio_archive_title_video_mp4'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_mp4'] ) : '';
        $pofo_portfolio_archive_title_video_ogg = isset( $pofo_term_meta['pofo_portfolio_archive_title_video_ogg'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_ogg'] ) : '';
        $pofo_portfolio_archive_title_video_webm = isset( $pofo_term_meta['pofo_portfolio_archive_title_video_webm'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_webm'] ) : '';
        $pofo_portfolio_archive_title_video_youtube = isset( $pofo_term_meta['pofo_portfolio_archive_title_video_youtube'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_youtube'] ) : '';
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo-addons' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_subtitle]" id="pofo_portfolio_archive_title_subtitle" value="<?php echo esc_attr( $pofo_portfolio_archive_title_subtitle ) ?>" class="category-custom-field-input">
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_bg_image]"><?php echo esc_html__( 'Title Background Image', 'pofo-addons' ); ?></label></th>
            <td>
                <input name="pofo_portfolio_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                <input name="term_meta[pofo_portfolio_archive_title_bg_image]" class="pofo_portfolio_archive_title_bg_image_thumb" id="pofo_portfolio_archive_title_bg_image_thumb" type="hidden" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                <img class="upload_image_screenshort" <?php echo wp_kses($pofo_portfolio_archive_title_bg_image, wp_kses_allowed_html( 'post' )); ?> />
                <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" />
                <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo-addons' ); ?></span>
            </td>
        </tr>

        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo-addons' ); ?></label></th>
            <td>
                <input name="term_meta[pofo_portfolio_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    <?php
                    $pofo_val = explode(",",$pofo_portfolio_archive_title_bg_multiple_image);
                    foreach ($pofo_val as $key => $value) {
                        if(! empty($value)):
                            $pofo_image_url = wp_get_attachment_url( $value );
                            echo '<div id='.esc_attr($value).'>';
                                echo '<img class="upload_image_screenshort_multiple" src="'.$pofo_image_url.'" style="width:100px;" />';
                                echo '<a href="javascript:void(0)" class="remove">'.__( 'Remove', 'pofo-addons' ).'</a>';
                            echo '</div>';
                        endif;
                    }
                    ?>
                </div>
                <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo-addons' ); ?>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo-addons' ); ?></label></th>
            <td>
                <select name="term_meta[pofo_portfolio_archive_title_video_type]" id="pofo_portfolio_archive_title_video_type" class="category-custom-field-select">
                    <option value="default" <?php echo esc_attr( $pofo_portfolio_archive_title_video_type ) == "default" ? 'selected="selected"' : '' ?> ><?php echo esc_html__( 'Default', 'pofo-addons' ); ?></option>
                    <option value="self" <?php echo esc_attr( $pofo_portfolio_archive_title_video_type ) == "self" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'Self', 'pofo-addons' ); ?></option>
                    <option value="external" <?php echo esc_attr( $pofo_portfolio_archive_title_video_type ) == "external" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'External', 'pofo-addons' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo-addons' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_mp4]" id="pofo_portfolio_archive_title_video_mp4" value="<?php echo esc_attr( $pofo_portfolio_archive_title_video_mp4 ) ?>" class="category-custom-field-input">
                <p class="description">Use only for Page Title Style 8.</p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo-addons' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_ogg]" id="pofo_portfolio_archive_title_video_ogg" value="<?php echo esc_attr( $pofo_portfolio_archive_title_video_ogg ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo-addons' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_webm]" id="pofo_portfolio_archive_title_video_webm" value="<?php echo esc_attr( $pofo_portfolio_archive_title_video_webm ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_video_youtube]"><?php echo esc_html__( 'External Video URL', 'pofo-addons' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_youtube]" id="pofo_portfolio_archive_title_video_youtube" value="<?php echo esc_attr( $pofo_portfolio_archive_title_video_youtube ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </td>
        </tr>
    <?php
    }
endif;
add_action( 'portfolio-category_edit_form_fields', 'pofo_portfolio_taxonomy_edit_meta_field', 10, 2 );
add_action( 'portfolio-tags_edit_form_fields', 'pofo_portfolio_taxonomy_edit_meta_field', 10, 2 );

if ( ! function_exists( 'pofo_save_portfolio_taxonomy_custom_meta' ) ) :
    function pofo_save_portfolio_taxonomy_custom_meta( $pofo_term_id ) {
        if ( isset( $_POST['term_meta'] ) ) {
            $pofo_t_id = $pofo_term_id;
            $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" );
            $pofo_cat_keys = array_keys( $_POST['term_meta'] );
            foreach ( $pofo_cat_keys as $key ) {
                if ( isset ( $_POST['term_meta'][$key] ) ) {
                    $pofo_term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            // Save the option array.
            update_option( "pofo_taxonomy_$pofo_t_id", $pofo_term_meta );
        }
    }  
endif;
add_action( 'edited_portfolio-category', 'pofo_save_portfolio_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_portfolio-category', 'pofo_save_portfolio_taxonomy_custom_meta', 10, 2 );
add_action( 'edited_portfolio-tags', 'pofo_save_portfolio_taxonomy_custom_meta', 10, 2 );
add_action( 'create_portfolio-tags', 'pofo_save_portfolio_taxonomy_custom_meta', 10, 2 );

/* if WooCommerce plugin is activated */
if( class_exists( 'WooCommerce' ) ) {

    /* Pofo product category extra custom fields */

    if( ! function_exists( 'pofo_product_category_add_meta_field' ) ) :
        function pofo_product_category_add_meta_field() {
            
            // Get All Register Sidebar List.
            $sidebar_array = pofo_register_sidebar_array();

            // this will add the custom meta field to the add new term page
            ?>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo-addons' ); ?></label>
                <input type="text" name="term_meta[pofo_product_archive_title_subtitle]" id="pofo_product_archive_title_subtitle" value="" class="category-custom-field-input">
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_bg_image]"><?php echo esc_html__( 'Title background image', 'pofo-addons' ); ?></label>
                <input name="pofo_product_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="" />
                <input name="term_meta[pofo_product_archive_title_bg_image]" class="pofo_product_archive_title_bg_image_thumb" id="pofo_product_archive_title_bg_image_thumb" type="hidden" value="" />
                <img class="upload_image_screenshort" src="" />
                <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" />
                <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo-addons' ); ?></span>
            </div>

            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo-addons' ); ?></label>
                <input name="term_meta[pofo_product_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    
                </div>
                <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo-addons' ); ?>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo-addons' ); ?></label>
                <select name="term_meta[pofo_product_archive_title_video_type]" id="pofo_product_archive_title_video_type" class="category-custom-field-select">
                    <option value="default"><?php echo esc_html__( 'Default', 'pofo-addons' ); ?></option>
                    <option value="self"><?php echo esc_html__( 'Self', 'pofo-addons' ); ?></option>
                    <option value="external"><?php echo esc_html__( 'External', 'pofo-addons' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo-addons' ); ?></label>
                <input type="text" name="term_meta[pofo_product_archive_title_video_mp4]" id="pofo_product_archive_title_video_mp4" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo-addons' ); ?></label>
                <input type="text" name="term_meta[pofo_product_archive_title_video_ogg]" id="pofo_product_archive_title_video_ogg" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo-addons' ); ?></label>
                <input type="text" name="term_meta[pofo_product_archive_title_video_webm]" id="pofo_product_archive_title_video_webm" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_video_youtube]"><?php echo esc_html__( 'External Video Url', 'pofo-addons' ); ?></label>
                <input type="text" name="term_meta[pofo_product_archive_title_video_youtube]" id="pofo_product_archive_title_video_youtube" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
            </div>

        <?php
        }
    endif;
    add_action( 'product_cat_add_form_fields', 'pofo_product_category_add_meta_field', 99, 2 );
    add_action( 'product_tag_add_form_fields', 'pofo_product_category_add_meta_field', 99, 2 );

    if ( ! function_exists( 'pofo_product_taxonomy_edit_meta_field' ) ) :
        function pofo_product_taxonomy_edit_meta_field($term) {
         
            // put the term ID into a variable
            $pofo_t_id = $term->term_id;
         
            // retrieve the existing value(s) for this meta field. This returns an array
            $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" );
            $pofo_product_archive_title_subtitle = isset( $pofo_term_meta['pofo_product_archive_title_subtitle'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_subtitle'] ) : '';
            $pofo_image_url = isset( $pofo_term_meta['pofo_product_archive_title_bg_image'] ) ? $pofo_term_meta['pofo_product_archive_title_bg_image'] : '';

            $pofo_product_archive_title_bg_image = isset( $pofo_term_meta['pofo_product_archive_title_bg_image'] ) ? 'src = "'.esc_attr( $pofo_term_meta['pofo_product_archive_title_bg_image'] ).'"' : '';

            $pofo_product_archive_title_bg_multiple_image = isset( $pofo_term_meta['pofo_product_archive_title_bg_multiple_image'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_bg_multiple_image'] ) : '';
            
            $pofo_product_archive_title_video_type = isset( $pofo_term_meta['pofo_product_archive_title_video_type'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_video_type'] ) : '';
            $pofo_product_archive_title_video_mp4 = isset( $pofo_term_meta['pofo_product_archive_title_video_mp4'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_video_mp4'] ) : '';
            $pofo_product_archive_title_video_ogg = isset( $pofo_term_meta['pofo_product_archive_title_video_ogg'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_video_ogg'] ) : '';
            $pofo_product_archive_title_video_webm = isset( $pofo_term_meta['pofo_product_archive_title_video_webm'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_video_webm'] ) : '';
            $pofo_product_archive_title_video_youtube = isset( $pofo_term_meta['pofo_product_archive_title_video_youtube'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_video_youtube'] ) : '';
            ?>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="term_meta[pofo_product_archive_title_subtitle]" id="pofo_product_archive_title_subtitle" value="<?php echo esc_attr( $pofo_product_archive_title_subtitle ) ?>" class="category-custom-field-input">
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_bg_image]"><?php echo esc_html__( 'Title background image', 'pofo-addons' ); ?></label></th>
                <td>
                    <input name="pofo_product_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                    <input name="term_meta[pofo_product_archive_title_bg_image]" class="pofo_product_archive_title_bg_image_thumb" id="pofo_product_archive_title_bg_image_thumb" type="hidden" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                    <img class="upload_image_screenshort" <?php echo wp_kses($pofo_product_archive_title_bg_image, wp_kses_allowed_html( 'post' )); ?> />
                    <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" />
                    <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo-addons' ); ?></span>
                </td>
            </tr>

            <tr class="form-field">
                <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo-addons' ); ?></label></th>
                <td>
                    <input name="term_meta[pofo_product_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
                    <div class="multiple_images">
                        <?php
                        $pofo_val = explode(",",$pofo_product_archive_title_bg_multiple_image);
                        foreach ($pofo_val as $key => $value) {
                            if(! empty($value)):
                                $pofo_image_url = wp_get_attachment_url( $value );
                                echo '<div id='.esc_attr($value).'>';
                                    echo '<img class="upload_image_screenshort_multiple" src="'.$pofo_image_url.'" style="width:100px;" />';
                                    echo '<a href="javascript:void(0)" class="remove">'.__( 'Remove', 'pofo-addons' ).'</a>';
                                echo '</div>';
                            endif;
                        }
                        ?>
                    </div>
                    <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo-addons' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo-addons' ); ?>
                    <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo-addons' ); ?></label></th>
                <td>
                    <select name="term_meta[pofo_product_archive_title_video_type]" id="pofo_product_archive_title_video_type" class="category-custom-field-select">
                        <option value="default" <?php echo esc_attr( $pofo_product_archive_title_video_type ) == "default" ? 'selected="selected"' : '' ?> ><?php echo esc_html__( 'Default', 'pofo-addons' ); ?></option>
                        <option value="self" <?php echo esc_attr( $pofo_product_archive_title_video_type ) == "self" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'Self', 'pofo-addons' ); ?></option>
                        <option value="external" <?php echo esc_attr( $pofo_product_archive_title_video_type ) == "external" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'External', 'pofo-addons' ); ?></option>
                    </select>
                    <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="term_meta[pofo_product_archive_title_video_mp4]" id="pofo_product_archive_title_video_mp4" value="<?php echo esc_attr( $pofo_product_archive_title_video_mp4 ) ?>" class="category-custom-field-input">
                    <p class="description">Use only for Page Title Style 8.</p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="term_meta[pofo_product_archive_title_video_ogg]" id="pofo_product_archive_title_video_ogg" value="<?php echo esc_attr( $pofo_product_archive_title_video_ogg ) ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="term_meta[pofo_product_archive_title_video_webm]" id="pofo_product_archive_title_video_webm" value="<?php echo esc_attr( $pofo_product_archive_title_video_webm ) ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_video_youtube]"><?php echo esc_html__( 'External Video Url', 'pofo-addons' ); ?></label></th>
                <td>
                    <input type="text" name="term_meta[pofo_product_archive_title_video_youtube]" id="pofo_product_archive_title_video_youtube" value="<?php echo esc_attr( $pofo_product_archive_title_video_youtube ) ?>" class="category-custom-field-input">
                    <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo-addons' ); ?></p>
                </td>
            </tr>
        <?php
        }
    endif;
    add_action( 'product_cat_edit_form_fields', 'pofo_product_taxonomy_edit_meta_field', 99, 2 );
    add_action( 'product_tag_edit_form_fields', 'pofo_product_taxonomy_edit_meta_field', 99, 2 );

    if ( ! function_exists( 'pofo_save_product_taxonomy_custom_meta' ) ) :
        function pofo_save_product_taxonomy_custom_meta( $pofo_term_id ) {
            if ( isset( $_POST['term_meta'] ) ) {
                $pofo_t_id = $pofo_term_id;
                $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" );
                $pofo_cat_keys = array_keys( $_POST['term_meta'] );
                foreach ( $pofo_cat_keys as $key ) {
                    if ( isset ( $_POST['term_meta'][$key] ) ) {
                        $pofo_term_meta[$key] = $_POST['term_meta'][$key];
                    }
                }
                // Save the option array.
                update_option( "pofo_taxonomy_$pofo_t_id", $pofo_term_meta );
            }
        }  
    endif;
    add_action( 'edited_product_cat', 'pofo_save_product_taxonomy_custom_meta', 10, 2 );  
    add_action( 'create_product_cat', 'pofo_save_product_taxonomy_custom_meta', 10, 2 );
    add_action( 'edited_product_tag', 'pofo_save_product_taxonomy_custom_meta', 10, 2 );
    add_action( 'create_product_tag', 'pofo_save_product_taxonomy_custom_meta', 10, 2 );
}