import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

// BRI - COMPONENTS
import BRI_App from "../components/BRI_Components/BRI_App.vue";
import BRI_Login from "../components/BRI_Components/BRI_Login.vue";
import BRI_Dashboard from "../components/BRI_Components/menus/BRI_Dashboard.vue";
import BRI_Customer from "../components/BRI_Components/menus/BRI_Customer.vue";
import BRI_ApprovedTable from "../components/BRI_Components/partials/BRI_ApprovedTable.vue";
import BRI_PendingTable from "../components/BRI_Components/partials/BRI_PendingTable.vue";
import BRI_DeclinedTable from "../components/BRI_Components/partials/BRI_DeclinedTable.vue";

// USER - COMPONENTS
// import App from "../components/App.vue";
// import User_Login from "../components/User_Components/User_Login.vue";

// GAME - COMPONENTS
// import Game from "../components/Game/Game.vue";

const routes = [
    // USER - ROUTER
    // {
    //     path: "/",
    //     name: "Home",
    //     component: App,
    //     children: [
    //         {
    //             path: "/login",
    //             name: "User_Login",
    //             component: User_Login,
    //             meta: { requiresGuestUser: true },
    //         },
    //     ],
    // },
    // {
    //     path: "/game",
    //     name: "Game",
    //     component: Game,
    //     meta: { requiresAuthUser: true },
    // },
    // BRI - ROUTER
    {
        path: "/",
        name: "BRI_Login",
        component: BRI_Login,
        meta: { requiresGuestBRI: true },
    },
    {
        path: "/bri",
        name: "BRI_App",
        component: BRI_App,
        meta: { requiresAuthBRI: true },
        children: [
            {
                path: ":menus",
                name: "BRI_Dashboard",
                component: BRI_Dashboard,
            },
            {
                path: ":menus",
                name: "BRI_Customer",
                component: BRI_Customer,
                children: [
                    {
                        path: ":category",
                        name: "BRI_Pending",
                        component: BRI_PendingTable,
                    },
                    {
                        path: ":category",
                        name: "BRI_Approved",
                        component: BRI_ApprovedTable,
                    },
                    {
                        path: ":category",
                        name: "BRI_Declined",
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

function inLoginBRI() {
    return sessionStorage.getItem("token-bri");
}

// function inLoginUser() {
//     return true;
//     // return localStorage.getItem("token-user");
// }

// AUTHENTICATION MIDDLEWARE
router.beforeEach((to, from, next) => {
    // BRI - AUTHENTICATION
    if (to.matched.some((record) => record.meta.requiresAuthBRI)) {
        if (!inLoginBRI()) {
            next({
                path: "/",
                query: { redirect: to.fullPath },
            });
        } else {
            next();
        }
    } else if (to.matched.some((record) => record.meta.requiresGuestBRI)) {
        if (inLoginBRI()) {
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

    // USER - AUTHENTICATION
    // if (to.matched.some((record) => record.meta.requiresAuthUser)) {
    //     if (!inLoginUser()) {
    //         next({
    //             path: "/login",
    //             query: { redirect: to.fullPath },
    //         });
    //     } else {
    //         next();
    //     }
    // } else if (to.matched.some((record) => record.meta.requiresGuestUser)) {
    //     if (inLoginUser()) {
    //         next({
    //             path: "/dashboard",
    //             query: { redirect: to.fullPath },
    //         });
    //     } else {
    //         next();
    //     }
    // } else {
    //     next();
    // }
});

export default router;
