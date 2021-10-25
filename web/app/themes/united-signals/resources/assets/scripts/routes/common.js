export default {
  init() {
    var status = false;
    $('#discord').click(function () {
      console.log('test');
      if (status) {
        $('#iframe').removeClass('active');
        status = false;
      } else {
        $('iframe').addClass('active');
        status = true;
      }
    });

    var menuState = false;
    $('#menu-button').click(function () {
      if (menuState) {
        $('#fullscreenMenu').removeClass('active');
        menuState = false;
      } else {
        $('#fullscreenMenu').addClass('active');
        menuState = true;
      }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
