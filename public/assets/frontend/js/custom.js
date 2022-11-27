(function ($) {
  "use strict";
  // for sticky navbar
  $(window).scroll(function () {
      if ($(window).scrollTop() > 0) {
          $(".header-nav").addClass("sticky");
      } else {
          $(".header-nav").removeClass("sticky");
      }
  });


  $("#example").countdown({
    date: "12/24/2023 23:59:59",
  });


})(jQuery);
