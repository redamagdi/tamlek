$(function () {
    "use strict";

    /**
     * PJax Setup.
     */
    $(document).pjax('a[data-pjax]', '#pjax-container', {timeout: 5000});
    $(document).on('submit', 'form[data-form-pjax]', function (event) {
        event.preventDefault();

        $.pjax.submit(event, '#pjax-container');
    });
    $(document).on('pjax:timeout', function (xhr, textStatus, error, options) {
        swal({
            title: 'حدث خطأ',
            text: 'يبدو أننا نواجه خطأ برجاء إعادة تحميل الصفحة',
            type: 'warning',
            showCancelButton: false,
            showConfirmButton: false,
        });
    });
    $(document).on('pjax:send', function (xhr, options) {
        loading();
    });
    $(document).on('pjax:complete', function (xhr) {
        $('meta[name="scripts"]').nextAll('script, style').remove();
        loading(true);
    });

    /**
     * Select2 Setup.
     */
    $.fn.select2.defaults.set("theme", "bootstrap");

    /**
     * Show Text Field on select `other option`
     */
    $(document).on('change', '.has-other-field', function (event) {
        if ($(this).val() === 'other')
            $(this).parents('.form-group').next().fadeIn();
        else
            $(this).parents('.form-group').next().fadeOut();
    });
});

/**
 * Loading function.
 * @param stop
 */
loading = function (stop) {
    var html = '<div id="loading"><div class="container">' +
        '<div class="row"><div class="col-xs-6 col-xs-offset-3 col-md-3 col-md-offset-4 body">' +
        '<img src="'+ window.Kesswa.asset_path +'/images/loading.svg" alt="loading" width="32px" class="center-block"><br>' +
        '<h5 class="text-center">جارِ معالجة طلبك</h5>' +
        '</div></div></div></div>';

    if (stop !== undefined && stop) {
        $('#loading').stop().fadeOut(function() {
            $('#loading').remove();
        });
    } else {
        $(html).prependTo('html').stop().fadeIn();
    }
};