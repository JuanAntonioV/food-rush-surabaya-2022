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
const Dashboard = Vue.component(
    "Dashboard",
    require("../components/BRIDashboard/Dashboard.vue").default
);
const Customer = Vue.component(
    "Customer",
    require("../components/BRIDashboard/Customer.vue").default
);
const ApprovedTable = Vue.component(
    "ApprovedTable",
    require("../components/BRIDashboard/ApprovedTable.vue").default
);
const PendingTable = Vue.component(
    "PendingTable",
    require("../components/BRIDashboard/PendingTable.vue").default
);
const DeclinedTable = Vue.component(
    "DeclinedTable",
    require("../components/BRIDashboard/DeclinedTable.vue").default
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
        // meta: {
        //     requiresAuth: true,
        // },
        children: [
            {
                path: "/Dashboard",
                name: "Dashboard",
                component: Dashboard,
            },
            {
                path: "/Customer",
                name: "Customer",
                component: Customer,
                children: [
                    {
                        path: ":category",
                        name: "Pending",
                        component: PendingTable,
                    },
                    {
                        path: ":category",
                        name: "Approved",
                        component: ApprovedTable,
                    },
                    {
                        path: ":category",
                        name: "Declined",
                        component: DeclinedTable,
                    },
                ],
            },
        ],
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
