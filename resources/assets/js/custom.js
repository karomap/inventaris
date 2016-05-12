function boxTool() {
    if ($('.panel_toolbox').length > 0) {
        $('.collapse-link').on('click', function() {
            var $BOX_PANEL = $(this).closest('.x_panel'),
                $ICON = $(this).find('i'),
                $BOX_CONTENT = $BOX_PANEL.find('.x_content');

            // fix for some div with hardcoded fix class
            if ($BOX_PANEL.attr('style')) {
                $BOX_CONTENT.slideToggle(200, function(){
                    $BOX_PANEL.removeAttr('style');
                });
            } else {
                $BOX_CONTENT.slideToggle(200);
                $BOX_PANEL.css('height', 'auto');
            }

            $ICON.toggleClass('fa-chevron-up fa-chevron-down');
        });

        $('.close-link').click(function () {
            var $BOX_PANEL = $(this).closest('.x_panel');

            $BOX_PANEL.remove();
        });
    }
}

var URL = window.location,
    $BODY = $('body'),
    $MENU_TOGGLE = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer'),

    ajaxlinks = function() {
        $('.left_col a').each(function(){
          $(this).click(function(e){
            e.preventDefault();

            if($(this).prop('href') != "") {
              NProgress.start();
              $('.right_col').load($(this).prop('href'), function(){
                $('title').html($('.judul').html());
                NProgress.done();
              });
            }
          });
        });
    },

    ajaxlink = function(selector) {
      selector.click(function(e){
        e.preventDefault();

        if(selector.prop('href') != "") {
          NProgress.start();
          $('.right_col').load(selector.prop('href'), function(){
            $('title').html($('.judul').html());
            NProgress.done();
          });
        }
      });
    },

    setContentHeight = function () {
        var contentHeight = $(window).height() < $LEFT_COL.outerHeight() ? $LEFT_COL.outerHeight() - $FOOTER.outerHeight() : $(window).height() - $FOOTER.outerHeight();

        $RIGHT_COL.css('min-height', contentHeight);
    };

// Sidebar
$(document).ready(function() {

    if($('.right_col').html() == "") {
      NProgress.start();
      $('.right_col').load("/dashboard", function(){
        $('title').html($('.judul').html());
        $('li.dashboard').addClass('active');
        NProgress.done();
      });
    }

    ajaxlinks();

    setContentHeight();

    $NAV_MENU.css('width', $RIGHT_COL.css('width'));
    $NAV_MENU.slideDown('slow');

    $(window).resize(function(){
        $NAV_MENU.css('width', $RIGHT_COL.css('width'));
    });

    ajaxlink($('a.profil'));
    ajaxlink($('a.pengaturan'));

    $SIDEBAR_MENU.find('a').on('click', function(e){
        var $li = $(this).parent();

        if ($li.parent().hasClass('child_menu')) {
            $li.parent().find('.active').removeClass('active');
            $li.addClass('active');
        } else {
            if ($li.children('.child_menu').length) {
                $li.parent().find('.active').not($li).removeClass('active');
                $li.toggleClass('active');
                $li.children('.child_menu').slideToggle(function(){
                    setContentHeight();
                });
            } else {
                $li.parent().find('.active').removeClass('active');
                $li.parent().find('.child_menu').slideUp(function(){
                    setContentHeight();
                });
                $li.addClass('active');
            }
        }
    });

    // toggle small or large menu
    $MENU_TOGGLE.on('click', function() {
        if ($BODY.hasClass('nav-md')) {
            $BODY.removeClass('nav-md').addClass('nav-sm');
            $LEFT_COL.removeClass('scroll-view').removeAttr('style');

            if ($SIDEBAR_MENU.find('li').hasClass('active')) {
                $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
            }
        } else {
            $BODY.removeClass('nav-sm').addClass('nav-md');

            if ($SIDEBAR_MENU.find('li').hasClass('active-sm')) {
                $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
            }
        }

        $NAV_MENU.css('width', $RIGHT_COL.css('width'));
        setContentHeight();
    });

    // recompute content when resizing
    $(window).smartresize(function(){
        setContentHeight();
    });

    if ($("input.flat")[0]) {
        $(document).ready(function () {
            $('input.flat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
        });
    }

    $(".expand").on("click", function () {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");

        if ($expand.text() == "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });
});

(function($,sr){
    var debounce = function (func, threshold, execAsap) {
      var timeout;

        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null; 
            }

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100); 
        };
    };

    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');
