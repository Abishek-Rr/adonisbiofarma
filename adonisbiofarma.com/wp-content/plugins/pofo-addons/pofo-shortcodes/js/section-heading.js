if (function($) {
  // vc pofo section heading js

    vc.atts.pofo_custom_title = {
        init: function( param, $field ) {
            var attr = '';
            $('.responsive-tab-setting', $field).on('click', function() {
                attr = $(this).attr('data-hide-show');
                $('body').find('[data-vc-shortcode-param-name="'+attr+'"]').show();
                 var findClassTypo = $(this).parents().next().attr('class');
                 var classArrayTypo = findClassTypo.split(' ');
                 findClassTypo ='.'+classArrayTypo[0];
                 $(this).prev().removeClass("active");
                 $(this).addClass("active");
                 $(findClassTypo).hide();
            });
            $('.tab-responsive-font', $field).on('click', function() {
                 var selectParam = '';
                 var findClassFont = $(this).parents().next().attr('class');
                 var classArrayFont = findClassFont.split(' ');
                 findClassFont ='.'+classArrayFont[0];
                 $(this).next().removeClass("active");
                 $(this).addClass("active");
                 $(findClassFont).show();
                 selectParam = $(findClassFont).last().next().attr('data-vc-shortcode-param-name');
                 $('body').find('[data-vc-shortcode-param-name="'+selectParam+'"]').hide();
            });
        },
    }

}(window.jQuery), _.isUndefined(window.vc)) var vc = {
  atts: {}
};
(jQuery);
