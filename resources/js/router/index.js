import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

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
        meta: { requiresGuest: true },
    },
    {
        path: "/bridashboard",
        name: "BRIDashboard",
        component: BRIDashboard,
        meta: {
            requiresAuth: true,
        },
    },
];

const router = new VueRouter({
    mode: "history",
    routes: routes,
});

function inLogin() {
    return false;
    // return localStorage.getItem("token");
}

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (!inLogin()) {
            next({
                path: "/brilogin",
                query: { redirect: to.fullPath },
            });
        } else {
            next();
        }
    } else if (to.matched.some((record) => record.meta.requiresGuest)) {
        if (inLogin()) {
            next({
                path: "/bridashboard",
                query: { redirect: to.fullPath },
            });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
