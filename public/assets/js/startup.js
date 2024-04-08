(function ($) {
  'use strict';
  //tooltip speed
  $(".tooltip-tiny").tooltip({
    delay: {delay: 300}
  });
  // head-search
  $("li.search").on("click", function () {
    var $this = $(this).find('i');
    if ($this.hasClass('fa-search')) {
      $this.removeClass('fa-search').addClass('fa-times');
    } else {
      $this.removeClass('fa-times').addClass('fa-search');
    }
    $(".topbar-search").toggleClass('search-visible');
  });
  //fix header
  $(window).scroll(function () {
    var sticky = $('.main-navigation-style-1, .header-style-2'),
      scroll = $(window).scrollTop();
    if (scroll >= 100) sticky.addClass('sticky');
    else sticky.removeClass('sticky');
  });

  // navigation
  $('.menu-item-has-children>a').append('<span class="arrow"></span>');
  $('.menu-item-has-megamenu>a').append('<span class="arrow"></span>');
  //mobile nav
  $(document).ready(function () {
    $(".hamburger-menu").click(function () {
      $(".menu-btn").toggleClass("active");
      $(".main-menu, .main-navigation-style-2").toggleClass("active");
      $("body").toggleClass("menu-open");
      $('html').toggleClass('overflow');
    });
  });
  $(document).ready(function () {
    $('.menu-item-has-children>a, .menu-item-has-megamenu>a').on('click', function () {
      $(this).removeAttr('href');
      var element = $(this).parent('li');
      if (element.hasClass('open')) {
        element.removeClass('open');
        element.find('li').removeClass('open');
        element.find('ul.sub-menu, .megamenu').slideUp();
      } else {
        element.addClass('open');
        element.children('ul.sub-menu, .megamenu').slideDown();
        element.siblings('li').children('ul.sub-menu, .megamenu').slideUp();
        element.siblings('li').removeClass('open');
        element.siblings('li').find('li').removeClass('open');
        element.siblings('li').find('ul.sub-menu, .megamenu').slideUp();
      }
    });
  });
  // back to top
  var offset = 220;
  var duration = 500;
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > offset) {
      $('.back-top').fadeIn(duration);
    } else {
      $('.back-top').fadeOut(duration);
    }
  });
  $('.back-top').on('click', function (event) {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, "slow");
    return false;
  });
  if ($(window).scrollTop() > offset) {
    $('.back-top').fadeOut(0);
  }
  $('a[href="#"]').click(function (e) {
    e.preventDefault ? e.preventDefault() : e.returnValue = false;
  });
  // smooth scroll
  $.fn.smoothScroll = function (setting) {
    var _default = {
        duration: 1000,
        easing: 'swing',
        offset: 0,
        top: '100px'
      },
      _setting = $.extend(_default, setting),
      _handler = function () {
        var dest = 0,
          target = this.hash,
          $target = $(target);
        $(this).on('click', function (e) {
          e.preventDefault();
          if ($target.offset().top > ($(document).height() - $(window).height())) {
            dest = $(document).height() - $(window).height();
          } else {
            dest = $target.offset().top - _setting.offset;
          }
          $('html, body').animate({
            scrollTop: dest
          }, _setting.duration, _setting.easing);
        });
      };
    return this.each(_handler);
  };
  $('.scrollbtn').smoothScroll({
    duration: 1000, // animation speed
    easing: 'swing', // find more easing options on http://api.jqueryui.com/easings/
    offset: 0 // custom offset
  });

})(jQuery);
