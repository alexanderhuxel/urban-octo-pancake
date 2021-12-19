/* eslint-disable */
export default {
  init() {
    var status = false;
    $("#discord").click(function () {
      if (status) {
        $("#iframe").removeClass("active");
        status = false;
      } else {
        $("iframe").addClass("active");
        status = true;
      }
    });

    var menuState = false;
    $("#menu-button").click(function () {
      if (menuState) {
        $(".menu-frontpagemenu-container").removeClass("active");
        $("#html").removeClass("noscroll");
        menuState = false;
      } else {
        $(".menu-frontpagemenu-container").addClass("active");
        $("#html").addClass("noscroll");
        menuState = true;
      }
    });

    $("#menu-frontpagemenu").on("click", "li", function () {
      $(".menu-frontpagemenu-container ").removeClass("active");
      $("#html").removeClass("noscroll");
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
