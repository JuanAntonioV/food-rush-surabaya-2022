require("./bootstrap");

window.Vue = require("vue").default;

window.VueRouter = require("vue-router").default;

Vue.use(VueRouter);

const App = Vue.component("App", require("./components/App.vue").default);
const BRILogin = Vue.component(
    "App",
    require("./components/login/BRILogin.vue").default
);
const BRIDashboard = Vue.component(
    "BRIDashboard",
    require("./components/BRIDashboard/BRIDashboard.vue").default
);

const routes = [
    {
        path: "/",
        name: "App",
        component: App,
    },
    {
        path: "/brilogin",
        name: "BRILogin",
        component: BRILogin,
    },
    {
        path: "/bridashboard",
        name: "BRIDashboard",
        component: BRIDashboard,
    },
];

const router = new VueRouter({
    mode: "history",
    routes: routes,
});

const app = new Vue({
    el: "#app",
    router,
});
