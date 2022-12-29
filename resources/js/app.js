require("./bootstrap");

window.Vue = require("vue").default;

import Vue from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import router from "./router";
import JwPagination from "jw-vue-pagination";

Vue.config.productionTip = false;
Vue.component("pagination", JwPagination);

Vue.use(VueAxios, axios);

const app = new Vue({
    el: "#app",
    router,
});
