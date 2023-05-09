! function( $ ) {
    "use strict";

    /* Widget Social bar on header drag and drop Start */

    jQuery(document).on('widget-updated', function(e, widget){
        jQuery(".social-widget-sortable").sortable({
            handle: 'img.widget-move',
            update : function () {
                var arr = [];
                var i = 0;
                jQuery(this).find( "p input:text" ).each(function( index ) {
                    arr.push(jQuery( this ).attr('data-type'));
                    i++;
                });
                jQuery( this ).parent().find( '.social-bar-hidden-val' ).val( arr ).trigger( 'change' );
            }
        });
    });

    /* Widget Social bar on header drag and drop End */

    $( document ).ready(function() {

        jQuery( '.customize-control-textbox' ).on('keyup',function() {
                var arr = [];
                var i = 0;
                jQuery( ".customize-control-textbox" ).each(function( index ) {
                    if(jQuery( this ).val() != '')
                        arr.push(jQuery( this ).val(), jQuery(this).attr("data-value"), jQuery(this).attr("data-label"));
                        i++;
                });
                jQuery( this ).parents( '.customize-control' ).find( '.pofo-footer-social-icon-list' ).val( arr ).trigger( 'change' );
            }
        );
        $( ".pofo-social-icon-list" ).sortable({
            handle: 'img.icon-move',
            cancel: '',
            update : function () {
                var arr = [];
                var i = 0;
                jQuery( ".customize-control-textbox" ).each(function( index ) {
                    if(jQuery( this ).val() != '')
                        arr.push(jQuery( this ).val(), jQuery(this).attr("data-value"), jQuery(this).attr("data-label"));
                        i++;
                });
                jQuery( this ).parents( '.customize-control' ).find( '.pofo-footer-social-icon-list' ).val( arr ).trigger( 'change' );
           }
        });

        /* Widget Social bar on header drag and drop Start */

        jQuery(".social-widget-sortable").sortable({
            handle: 'img.widget-move',
            update : function () {
                var arr = [];
                var i = 0;
                jQuery(this).find( "p input:text" ).each(function( index ) {
                    arr.push(jQuery( this ).attr('data-type'));
                    i++;
                });

                jQuery( this ).parent().find( '.social-bar-hidden-val' ).val( arr ).trigger( 'change' );
            }
        });

        /* Widget Social bar on header drag and drop End */

        /* post social icon list */

        var counter = jQuery(".pofo-post-social-icon-list li").length;
        
        jQuery( '.customize-control-checkbox-social' ).each(function() {
            if($(this).is(':checked')){
                $(this).val(1);
            }
            else{
                $(this).val(0);
            }
        });

        jQuery( '.customize-control-checkbox-social' ).on('change',function() {
            if($(this).is(':checked')){
                $(this).val(1);
            }
            else{
                $(this).val(0);
            }
                var arr1 = [];
                $(this).parents('.pofo-post-social-icon-list').find( ".customize-control-textbox-social" ).each(function( index ) {
                    if(jQuery( this ).attr("data-value") != ''){
                        arr1.push(jQuery( this ).attr("data-value"));
                        arr1.push(jQuery( this ).siblings(".customize-control-checkbox-social").attr("value"));
                        arr1.push(jQuery( this ).attr("data-label"));
                        i++;
                    }
                });
            jQuery( this ).parents( '.customize-control' ).find( '.pofo-post-social-icon-list' ).val( arr1 ).trigger( 'change' );
        });

        $( ".pofo-post-social-icon-list" ).sortable({
            handle: 'img.icon-move',
            cancel: '',
            update : function () {
                var arr = [];
                var i = 0;
                $(this).find( ".customize-control-textbox-social" ).each(function( index ) {
                    if(jQuery( this ).attr("data-value") != ''){
                        arr.push(jQuery( this ).attr("data-value"));
                        arr.push(jQuery( this ).siblings(".customize-control-checkbox-social").attr("value"));
                        arr.push(jQuery( this ).attr("data-label"));
                        i++;
                    }
                });
                jQuery( this ).parents( '.customize-control' ).find( '.pofo-post-social-icon-list' ).val( arr ).trigger( 'change' );
           }
        });


        /* multiple image upload */

        jQuery( document ).on( 'click', '.pofo_upload_button_multiple_customizer', function(event) {          
            var file_frame;
            var button = $(this);

            var button_parent = $(this).parent();
            var id = button.attr('id').replace('_button', '');

            event.preventDefault();
            

            // If the media frame already exists, reopen it.
            if ( file_frame ) {
              file_frame.open();
              return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
              title: jQuery( this ).data( 'uploader_title' ),
              button: {
                text: jQuery( this ).data( 'uploader_button_text' ),
              },
              multiple: true  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {

              var thumb_hidden = button_parent.find('.upload_field_multiple_customizer').attr('name');
             
                var selection = file_frame.state().get('selection');

                    selection.map( function( attachment ) {
                    var attachment = attachment.toJSON();
                    button_parent.find('.multiple_images').append( '<div id="'+attachment.id+'"><img src="'+attachment.url+'" class="upload_image_screenshort_multiple" alt="" style="width:100px;"/><a href="javascript:void(0)" class="remove">remove</a></div>' );
                });
                var pr_div;
                var attach_id = [];
                button_parent.find('.multiple_images').each(function(){
                    if(jQuery(this).children().length > 0){
                        var pr_div = jQuery(this).parent();
                        jQuery(this).children('div').each(function(){
                            attach_id.push(jQuery(this).attr('id'));                        
                        });
                    }                        
                });
                button_parent.find('.multiple_images').parent().parent().find( '.upload_field_multiple_customizer' ).val( attach_id ).trigger( 'change' );     
            });
            // Finally, open the modal
            file_frame.open();
        });

        jQuery(".multiple_images").on('click','.remove', function() {
            var button_parent = $(this).parent().parent();
            jQuery(this).parent().slideUp();
            jQuery(this).parent().remove();
            var attach_id = [];
            button_parent.each(function(){
                if(jQuery(this).children().length > 0){
                    var pr_div = jQuery(this).parent();
                    jQuery(this).children('div').each(function(){
                        attach_id.push(jQuery(this).attr('id'));                        
                    });
                }                        
            });
            button_parent.parent().parent().find( '.upload_field_multiple_customizer' ).val( attach_id ).trigger( 'change' );
        });


        /* Add Custom Sidebars */      
        if(jQuery('#pofo_field_add_sidebar').length >0){
            var current_val = jQuery('#pofo_field_add_sidebar').find('input[type=hidden]').val();      
            if(current_val != ''){
                var count = current_val.split(",").length;            
                for(var i=0;i<count;i++){
                    jQuery('.add-custom-text-box').append('<li><input type="text" class="add-text-input" value="'+current_val.split(",")[i]+'"><input type="button" class="remove-text-box" value="remove"></li>');
                }
            }
        }
        jQuery( document ).on( 'click', '.add_more_sidebar', function() {     
            jQuery('.add-custom-text-box').append('<li><input type="text" class="add-text-input"><input type="button" class="remove-text-box" value="'+pofoadmin.remove_button_text+'"></li>');
        });
        
        jQuery( document ).on( 'keyup', '.add-text-input', function(){
            display();
        });

        jQuery( document ).on( 'click', '.remove-text-box', function(){
            jQuery( this ).parent().remove();
            display();  
        });

        function display(){
            var array = [];
            if(jQuery('.add-custom-text-box li').length >0){                
                jQuery('.add-text-input').each(function(index){
                    array.push(jQuery(this).val());
                    jQuery(this).parents('#customize-control-pofo_custom_sidebars').find('input[type=hidden]').val(array).trigger("change");
                });
            }
            else{
                wp.customize.value('pofo_custom_sidebars')('');
            }
        }

        /* Add Custom Fonts */

            // Font Upload Button Click

            $( document ).on( 'click', '.pofo_font_upload_button', function(event) {
                var file_frame;
                var button = $(this);

                var button_parent = $(this).parent();
                var id = button.attr('id').replace('_button', '');
                event.preventDefault();
                

                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                  file_frame.open();
                  return;
                }

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                  title: $( this ).data( 'uploader_title' ),
                  button: {
                    text: $( this ).data( 'uploader_button_text' ),
                  },
                  multiple: false  // Set to true to allow multiple files to be selected
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                    // We set multiple to false so only get one image from the uploader
                    var full_attachment = file_frame.state().get('selection').first().toJSON();

                    var attachment = file_frame.state().get('selection').first();

                    var thumburl = attachment;
                    var thumb_hidden = button_parent.find('.upload_field').attr('name');

                    if ( thumburl || full_attachment ) {
                      button_parent.find("#"+id).val(full_attachment.url);

                      customFontValue();
                    }
                });

                // Finally, open the modal
                file_frame.open();
            });
        if( $('#pofo_custom_fonts').length > 0 ) {
            var current_val = $('#pofo_custom_fonts').find('input[type="hidden"]').val();

            if( current_val != '' ){
                current_val = JSON.parse(current_val);
                $.each(current_val, function(i, item) {
                    $('.add-custom-font').append('<ul class="custom-font"> <li><label>'+pofoadmin.fontNameText+'</label><input type="text" class="font-name" value="'+item[0]+'" ></li> <li><label>'+pofoadmin.woff2Text+'</label><input class="upload_field" id="pofo_upload" value="'+item[1]+'" type="text" /><span class="dashicons dashicons-upload pofo_font_upload_button" id="pofo_upload_button"></span></li> <li><label>'+pofoadmin.woffText+'</label><input type="text" class="upload_field" id="pofo_upload" value="'+item[2]+'" /><span class="dashicons dashicons-upload pofo_font_upload_button" id="pofo_upload_button"></span></li> <li><label>'+pofoadmin.ttfText+'</label><input type="text" class="upload_field" id="pofo_upload" value="'+item[3]+'" /><span class="dashicons dashicons-upload pofo_font_upload_button" id="pofo_upload_button"></span></li> <li><label>'+pofoadmin.eotText+'</label><input type="text" class="upload_field" id="pofo_upload" value="'+item[4]+'" /><span class="dashicons dashicons-upload pofo_font_upload_button" id="pofo_upload_button"></span></li> <li><input type="button" class="button button-secondary remove-custom-font" value="'+pofoadmin.removeFontText+'"></li> </ul>');
                });
            }
        } 
        $( document ).on( 'click', '.add_more_fonts', function() {
            $('.add-custom-font').append('<ul class="custom-font"><li><label>'+pofoadmin.fontNameText+'</label><input type="text" class="font-name" ></li> <li><label>'+pofoadmin.woff2Text+'</label><input class="upload_field" id="pofo_upload" type="text" /><span class="dashicons dashicons-upload pofo_font_upload_button" id="pofo_upload_button" ></span></li> <li><label>'+pofoadmin.woffText+'</label><input type="text" class="upload_field" id="pofo_upload" /><span class="dashicons dashicons-upload pofo_font_upload_button" id="pofo_upload_button"></span></li> <li><label>'+pofoadmin.ttfText+'</label><input type="text" class="upload_field" id="pofo_upload" /><span class="dashicons dashicons-upload pofo_font_upload_button" id="pofo_upload_button"></span></li> <li><label>'+pofoadmin.eotText+'</label><input type="text" class="upload_field" id="pofo_upload" ><span class="dashicons dashicons-upload pofo_font_upload_button" id="pofo_upload_button"></span></li> <li><input type="button" class="button button-secondary remove-custom-font" value="'+pofoadmin.removeFontText+'"></li></ul>');
        });

        $( document ).on( 'keyup', '.custom-font input', function() {
            customFontValue();
        });

        $( document ).on( 'click', '.remove-custom-font', function() {
            $(this).parent().parent().remove();
            customFontValue();
        });
        
        function customFontValue() {
            var final_array = [];
            if( $('.add-custom-font ul').length >0 ) {
                $( document ).find('.custom-font').each(function(index) {
                    var _this = $(this);
                    var array = [];
                    $(_this).find('input[type="text"]').each(function(index){
                        array.push($(this).val());
                    });
                    final_array.push( array );
                    $(this).parents('#customize-control-pofo_custom_fonts').find('input[type="hidden"]').val( JSON.stringify( final_array ) ).trigger('change');
                });
            }
            else{
                wp.customize.value('pofo_custom_fonts')('');
            }
        }

        /* Pofo Customizer Control For Multiple Checkbox Start */

        jQuery( '.customize-control-pofo_checkbox_multiple input[type="checkbox"]' ).on( 'change', function() {

            var checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map( 
                function() {
                    return this.value;
                }
            ).get().join( ',' );

            jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        });

        /* Pofo Customizer Control For Multiple Checkbox End */

    });
}( jQuery );
