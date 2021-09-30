// import '@babel/polyfill';
// import 'custom-event-polyfill';
import barba from '@barba/core';
import barbaCss from '@barba/css';
import anime from 'animejs';
import SmoothScroll from 'smooth-scroll/dist/smooth-scroll.min.js';
// eslint-disable-next-line
// import { analyticevents } from '../routes/common.js';
// import { gtag } from '../routes/common.js';

export default function (routes) {
  // Blacklist all WordPress Links (e.g. for adminbar)
  function addBlacklistClass() {
    $('a').each(function () {
      if (
        this.href.indexOf('/wp-admin/') !== -1 ||
        this.href.indexOf('/wp-login.php') !== -1 ||
        this.href.indexOf('.pdf') !== -1 ||
        this.href.indexOf('#') !== -1
      ) {
        $(this)
          .addClass('no-barba')
          .addClass('preventbarba')
          .addClass('wp-link');
      }
    });
  }

  // Set blacklist links
  addBlacklistClass();

  // use barba css
  barba.use(barbaCss);

  // Fire Barba.js
  barba.init({
    // cacheIgnore: false,
    // preventRunning: true,
    // debug: true,
    // logLevel: 'debug',
    timeout: 5000,
    prevent: ({ el }) => el.classList && el.classList.contains('preventbarba'),
    transitions: [
      {
        name: 'slide',
        beforeAppear() {},
        appear() {},
        afterAppear() {},
        beforeLeave() {
          // show animation
          const done = this.async();

          //   Analytics;
          if (typeof gtag === 'function') {
            /* eslint-disable */

            var path = window.location.href
              .replace(window.location.origin, '')
              .toLowerCase();

            gtag('config', 'UA-37676080-13', {
              page_title: document.title,
              page_path: path,
              send_page_view: true,
            });
            /* eslint-enable */
          }

          $('html').addClass('noscroll');
          anime({
            targets: '.barba-animation',
            opacity: 1,
            easing: 'easeInOutQuad',
            direction: 'alternate',
            loop: false,
            duration: 300,
            complete: function () {
              done();
            },
          });
        },
        afterLeave() {
          // Close Menu
          $('body').removeClass('mobilemenu--open');

          // Set new classes from #af-classes to body
          $('body').attr('class', $('#body-classes').attr('class'));
        },
        beforeEnter() {},
        enter() {},
        afterEnter(data) {
          const to = data.next.url;

          var scroll = new SmoothScroll();
          var anchor;
          if (typeof to.hash !== 'undefined') {
            anchor = document.querySelector('#' + to.hash);
            scroll.animateScroll(anchor, false, {
              speed: 100,
              easing: 'easeOutCubic',
              offset: 100,
            });
          } else {
            $(window).scrollTop(0);
          }
        },
        after() {
          $('html').removeClass('noscroll');

          return new Promise((resolve) => {
            routes.loadEvents();

            anime({
              delay: 100,
              targets: '.barba-animation',
              opacity: 0,
              easing: 'easeInOutQuad',
              direction: 'alternate',
              loop: false,
              duration: 500,
              complete: function () {
                // Fire routes again after new content loaded
                resolve();
              },
            });
          });
        },
      },
    ],
  });
}
