var block = function() {
    $('.content-wrapper').block({
        message: $('.blockui-message'),
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8,
            cursor: 'wait'
        },
        css: {
            width: 'auto',
            '-webkit-border-radius': 2,
            '-moz-border-radius': 2,
            padding: 0,
            border: 0,
            backgroundColor: 'transparent',
        }
    });
};

$(function() {
    // Mini sidebar
    function miniSidebar() {
        if ($('body').hasClass('sidebar-xs')) {
            $('.sidebar-main.sidebar-fixed .sidebar-content').on('mouseenter', function () {
                if ($('body').hasClass('sidebar-xs')) {

                    // Expand fixed navbar
                    $('body').removeClass('sidebar-xs').addClass('sidebar-fixed-expanded');
                }
            }).on('mouseleave', function () {
                if ($('body').hasClass('sidebar-fixed-expanded')) {

                    // Collapse fixed navbar
                    $('body').removeClass('sidebar-fixed-expanded').addClass('sidebar-xs');
                }
            });
        }
    }
    miniSidebar();

    $('.sidebar-main-toggle').on('click', function (e) {
        miniSidebar();
    });

    // Nice scroll
    function initScroll() {
        $(".sidebar-fixed .sidebar-content").niceScroll({
            mousescrollstep: 100,
            cursorcolor: '#ccc',
            cursorborder: '',
            cursorwidth: 3,
            hidecursordelay: 100,
            autohidemode: 'scroll',
            horizrailenabled: false,
            preservenativescrolling: false,
            railpadding: {
                right: 0.5,
                top: 1.5,
                bottom: 1.5
            }
        });
    }
    function removeScroll() {
        $(".sidebar-fixed .sidebar-content").getNiceScroll().remove();
        $(".sidebar-fixed .sidebar-content").removeAttr('style').removeAttr('tabindex');
    }
    initScroll();

    $(window).on('resize', function() {
        setTimeout(function() {
            if($(window).width() <= 768) {

                // Remove nicescroll on mobiles
                removeScroll();
            }
            else {

                // Init scrollbar
                initScroll();
            }
        }, 100);
    }).resize();

    // Headroom
    $(".navbar-fixed-top").headroom({
        classes: {
            pinned: "headroom-top-pinned",
            unpinned: "headroom-top-unpinned"
        },
        offset: $('.navbar').outerHeight(),
        onPin: function() {
            $('.sidebar-fixed .sidebar-content').animate({
                top: $('.navbar').outerHeight()
            }, 200);
        },
        onUnpin: function() {
            $('.navbar .dropdown-menu').parent().removeClass('open');

            $('.sidebar-fixed .sidebar-content, .sidebar-fixed').animate({
                top: 0
            }, 200);
        }
    });

    // DataTables
    if ($.fn.dataTable)
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            pagingType: "simple",
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Arabic.json'
            },
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            processing: true,
            serverSide: true
        });
});