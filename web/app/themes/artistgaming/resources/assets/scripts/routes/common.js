/* eslint-disable */
export default {
  init() {
    var status = false;
    $('#discord').click(function () {
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
        $('.menu-frontpagemenu-container').removeClass('active');
        $('#html').removeClass('noscroll');
        menuState = false;
      } else {
        $('.menu-frontpagemenu-container').addClass('active');
        $('#html').addClass('noscroll');
        menuState = true;
      }
    });
  },
  finalize() {
    if ($('.Layout-sc-nxg1ff-0.c-te__chat')) {
      $('.Layout-sc-nxg1ff-0.c-te__chat').addClass('hidden');
      console.log('test');
    }
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
