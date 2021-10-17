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
        $("#fullscreenMenu").removeClass("active");
        menuState = false;
      } else {
        $("#fullscreenMenu").addClass("active");
        menuState = true;
      }
    });
    // JavaScript to be fired on all pages
    // let openState = false;
    // document.getElementById("button").addEventListener("click", () => {
    //   if (!openState) {
    //     document.getElementById("body").classList.add("mobilemenu--open");
    //     openState = true;
    //   } else {
    //     document.getElementById("body").classList.remove("mobilemenu--open");
    //     openState = false;
    //   }
    // });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
