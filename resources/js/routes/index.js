import Vue from "vue";

const App = Vue.component("App", require("../components/App.vue").default);
const BRILogin = Vue.component(
    "App",
    require("../components/login/BRILogin.vue").default
);
const BRIDashboard = Vue.component(
    "BRIDashboard",
    require("../components/BRIDashboard/BRIDashboard.vue").default
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
        // beforeEnter: (to, form, next) => {
        //     axios.get('/api/authenticated').then(() => {
        //         next()
        //     }).catch(() => {
        //         return next({ name: "BRILogin" })
        //     })
        // }
    },
];

export default routes;
