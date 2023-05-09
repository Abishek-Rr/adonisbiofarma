if (function($) {
  // vc pofo responsive font settings js
    vc.atts.responsive_font_settings = {
      parse: function(param) {
      var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
      var $block = $field.parent();
      var options = {},
      string_pieces,
      string;

      // Mini Desktop Values
      options.font_md = $block.find('[data-type="font-md"]').val();
      options.line_md = $block.find('[data-type="line-md"]').val();
      options.transform_md = $block.find('[data-type="transform-md"]').val();
      options.align_md = $block.find('[data-type="alignment-md"]').val();
      options.letter_md = $block.find('[data-type="letter-md"]').val();
      options.weight_md = $block.find('[data-type="weight-md"]').val(); 
      // Tablet values
      options.font_sm = $block.find('[data-type="font-sm"]').val();
      options.line_sm = $block.find('[data-type="line-sm"]').val();
      options.transform_sm = $block.find('[data-type="transform-sm"]').val();
      options.align_sm = $block.find('[data-type="alignment-sm"]').val();
      options.letter_sm = $block.find('[data-type="letter-sm"]').val();
      options.weight_sm = $block.find('[data-type="weight-sm"]').val();
      // Mobile values
      options.font_xs = $block.find('[data-type="font-xs"]').val();
      options.line_xs = $block.find('[data-type="line-xs"]').val();
      options.transform_xs = $block.find('[data-type="transform-xs"]').val();
      options.align_xs = $block.find('[data-type="alignment-xs"]').val();
      options.letter_xs = $block.find('[data-type="letter-xs"]').val();
      options.weight_xs = $block.find('[data-type="weight-xs"]').val();
        string_pieces = _.map(options, function(value, key) {
          if (_.isString(value) && 0 < value.length) {
            if( ! ( key == 'transform_md' || key == 'transform_sm' || key == 'transform_xs' || key == 'align_md' || key == 'align_sm' || key == 'align_xs' ) && $.isNumeric( value ) ) { // if not used pixel
            value = value + 'px';
          }
            return key + ':' + encodeURIComponent(value);
          }
        });
        font_setting_string = $.grep(string_pieces, function(value) {
          return _.isString(value) && 0 < value.length;
        }).join('|');
        if ( font_setting_string ) {
          return ".pofo_font_" + Date.now() + "{" + font_setting_string + "},";
        }
      },
      init: function(param, $field) {
      $('h3.pofo-responsive-css-heading', $field).click(function(e) {
        var selected_tab = $(this).attr('data-device');
        $(this).parent().parent().find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).parents('.pofo-font-settings-container').find('.'+selected_tab).addClass('active');
      });
      },
    }

}(window.jQuery), _.isUndefined(window.vc)) var vc = {
  atts: {}
};
(jQuery);
