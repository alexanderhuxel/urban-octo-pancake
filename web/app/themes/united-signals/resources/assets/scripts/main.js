// import external dependencies
/* eslint-disable */
import "jquery";
import barbaInit from "./barba/init";

// Import everything from autoload
import "./autoload/**/*";

// import local dependencies
import Router from "./util/Router";
import common from "./routes/common";
import home from "./routes/home";

/** Populate Router instance with DOM routes */
const routes = new Router({
  common,
  home,
});

// Load Events
jQuery(document).ready(() => {
  routes.loadEvents();
  barbaInit(routes);
});
