(function ($) {
    'use strict';

    function stickMenu() {
        console.log();
        $(".stick").scrollToFixed({
            preFixed: function () {
                $(".menu-top").animate({
                    height: 83
                }, 400, function () {
                    $(this).css("overflow", "visible");
                });
            },
            postFixed: function () {
                $(".menu-top").css("overflow", "hidden").animate({
                    height: 0
                }, 400);
            }
        });
    }

    function mobileMenu() {

        $('.menu-toggle-icon').on('click', function (event) {
            $(this).toggleClass('act');
            if ($(this).hasClass('act')) {
                $('.mobi-menu').addClass('act');
            } else {
                $('.mobi-menu').removeClass('act');
            }
        });

        $('.mobi-menu .menu-item-has-children').append('<span class="sub-menu-toggle"></span>');

        $('.sub-menu-toggle').on('click', function (event) {
            $(this).parent('li').toggleClass('open-submenu');
        });
    }

    function backToTop() {
        var o = $("body").width();
        o > 450 && $(window).scroll(function () {
            $(this).scrollTop() > 100 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut();
        }), $(".back-to-top").on('click', function () {
            return $("html, body").animate({
                scrollTop: 0
            }, 700), !1;
        });
    }

    function searchForm() {
        $(".searh-toggle").on('click', function () {
            $('header .search-form').toggleClass('open-search');
            if (!$('header .search-form').hasClass('open-search')) {
               $('.search-result').hide();
            }
        });
    }

    function scrollBar() {
        $(window).scroll(function () {
            // calculate the percentage the user has scrolled down the page
            var scrollPercent = 100 * $(window).scrollTop() / ($(document).height() - $(window).height());
            $('.top-scroll-bar').css('width', scrollPercent + "%");

        });
    }

    function initSearchForm() {
        $('.search_field').on('input', function () {
            if ($(this).val() === '') {
                $('.search-result').hide();
                return;
            }
            let $this = this;
            let data = $($this).parent().serialize();
            let timeOut;
            clearTimeout(timeOut);
            timeOut = setTimeout((() => {
                $.ajax({
                    type: 'POST',
                    url: BASEURL + 'articles/search',
                    data: data,
                    success(res) {
                        let $ul = $('.search-result ul');
                        $ul.html('');
                        let data = res.data;
                        if (data.length === 0)
                            $ul.html('');
                        for (let i = 0; i < data.length; i++) {
                            $ul.append(`<li class="text-left dropdown-item cursor-pointer"><a href="/articles/${data[i].slug}"><b>${data[i].title}</b></a><br><small>${data[i].summary.substring(0, 50)}...</small></li>`);
                        }
                        $('.search-result').show();
                    }
                });
            }), 1000);
        });
    }

    $(window).load(function () {
        backToTop();
        mobileMenu();
        stickMenu();
        searchForm();
        scrollBar();
        initSearchForm();
    });

})(jQuery);
