import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import App from "../components/App.vue";

// BRI - COMPONENTS
import BRI_App from "../components/BRI_Components/BRI_App.vue";
import BRI_Login from "../components/BRI_Components/BRI_Login.vue";
import BRI_Dashboard from "../components/BRI_Components/menus/BRI_Dashboard.vue";
import BRI_Customer from "../components/BRI_Components/menus/BRI_Customer.vue";
import BRI_ApprovedTable from "../components/BRI_Components/partials/BRI_ApprovedTable.vue";
import BRI_PendingTable from "../components/BRI_Components/partials/BRI_PendingTable.vue";
import BRI_DeclinedTable from "../components/BRI_Components/partials/BRI_DeclinedTable.vue";

// USER - COMPONENTS

const routes = [
    {
        path: "/",
        name: "App",
        component: App,
    },
    {
        path: "/brilogin",
        name: "BRI_Login",
        component: BRI_Login,
        meta: { requiresGuest: true },
    },
    {
        path: "/bri",
        name: "BRI_App",
        component: BRI_App,
        meta: {
            requiresAuth: true,
        },
        children: [
            {
                path: ":menus",
                name: "Dashboard",
                component: BRI_Dashboard,
            },
            {
                path: ":menus",
                name: "Customer",
                component: BRI_Customer,
                children: [
                    {
                        path: ":category",
                        name: "Pending",
                        component: BRI_PendingTable,
                    },
                    {
                        path: ":category",
                        name: "Approved",
                        component: BRI_ApprovedTable,
                    },
                    {
                        path: ":category",
                        name: "Declined",
                        component: BRI_DeclinedTable,
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
    return localStorage.getItem("token-bri");
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
                path: "/bri/dashboard",
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
