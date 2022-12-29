import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

import users from "./modules/user";

export default new Vuex.Store({
    state: {
        users,
    },
});
