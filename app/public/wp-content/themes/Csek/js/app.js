(() => {
  // resources/js/app.js
  window.addEventListener("load", function() {
    let full_navigation = document.querySelector("#full-screen-menu");
    document.querySelector("#primary-menu-toggle").addEventListener("click", function(e) {
      e.preventDefault();
      full_navigation.classList.toggle("hidden");
      document.body.classList.toggle("overflow-hidden");
    });
  });
  jQuery(function($) {
    $(".slides").slick({
      infinite: true,
      autoplay: true,
      speed: 1e3,
      autoplaySpeed: 4e3,
      slidesToScroll: 1,
      arrows: false,
      dots: true
    });
    $("body").on("click", function(e) {
      var $target = $(e.target);
      if (!$target.closest("#primary-menu, #full-screen-menu").length) {
        $(".menu-item").removeClass("opened");
        $(".sub-menu").slideUp();
      }
    });
    function determineScrollForHeader() {
      if ($(window).scrollTop() > 10) {
        $("body").addClass("started-scrolling");
      } else {
        $("body").removeClass("started-scrolling");
      }
    }
    determineScrollForHeader();
    $(window).scroll(function() {
      determineScrollForHeader();
    });
    $(".carousel-slides").slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1
        }
      }]
    });
    $(".posts-carousel-wrapper .posts-list").slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1
        }
      }]
    });
    $(".accordian-faqs dt").click(function() {
      $(this).toggleClass("opened");
      $(this).next("dd").slideToggle();
      $(this).next("dd").css("opacity", 1);
    });
    $(".faq-view-more").click(function() {
      if ($(this).hasClass("opened")) {
        $(this).html("View More");
      } else {
        $(this).html("View Less");
      }
      $(this).toggleClass("opened");
      $(".extra-faqs").slideToggle();
      return false;
    });
    $("#full-screen-menu .menu-item-has-children>a").click(function(e) {
      e.preventDefault();
      $(this).parent().toggleClass("opened");
      $(this).siblings(".sub-menu").slideToggle();
    });
    var y_when_menu_opened = 0;
    var menu_close_distance = 70;
    $("#menu-primary>.menu-item-has-children>a").click(function(e) {
      e.preventDefault();
      y_when_menu_opened = window.scrollY;
      if ($(this).parent().hasClass("opened")) {
        $(".menu-item").removeClass("opened");
        $(".sub-menu").slideUp();
      } else {
        $(".menu-item").removeClass("opened");
        $(".sub-menu").slideUp();
        $(this).parent().toggleClass("opened");
        $(this).siblings(".sub-menu").slideToggle();
      }
    });
    $(window).scroll(function() {
      if (y_when_menu_opened + menu_close_distance < window.scrollY) {
        $(".menu-item").removeClass("opened");
        $(".sub-menu").slideUp();
      }
    });
  });
})();
