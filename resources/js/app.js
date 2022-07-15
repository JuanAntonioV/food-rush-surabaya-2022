require("./bootstrap");

window.Vue = require("vue").default;

import VueRouter from "vue-router";
import routes from "./routes";
import axios from "axios";
import store from "./store";
import JwPagination from "jw-vue-pagination";
import Vue from "vue";

Vue.component("pagination", JwPagination);

Vue.use(VueRouter, axios);

const router = new VueRouter({
    mode: "history",
    routes: routes,
});

const app = new Vue({
    el: "#app",
    router,
    store: store,
});
