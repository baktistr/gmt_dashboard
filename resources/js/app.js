/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.coreui = require('@coreui/coreui');
window.coreuiUtils = require('@coreui/utils');

window.Vue = require('vue');

// Dashboard components...
import TregChart from "./components/dashboard/TregChart";
import WitelChart from "./components/dashboard/WitelChart";

import TotalUser from "./components/TotalUser";
import TotalSpaceBooked from "./components/TotalSpaceBooked";

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app',

  components: {
    TregChart,
    WitelChart,
    TotalUser,
    TotalSpaceBooked
  }
});
