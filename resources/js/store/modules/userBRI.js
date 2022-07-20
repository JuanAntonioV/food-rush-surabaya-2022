import { axios } from "vue/types/umd";

const state = {
    userBRI: {
        username: "",
        password: "",
    },
    errors: [],
};
const getters = {
    setErrors: (state) => state.errors,
};
const mutations = {
    setErrors(state, setErrors) {
        state.errors = setErrors;
    },
};
const actions = {
    // create the actions for the post data
    async postUserBRI({ commit }, userBRI) {
        try {
            await axios
                .post("/api/login", userBRI)
                .then((res) => {
                    if (res.data.token) {
                        localStorage.setItem("token", res.data.token);
                    }
                })
                .catch((err) => {
                    commit("setErrors", err.response.data.message);
                });
        } catch (error) {
            commit("setErrors", error.response.data.message);
        }
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
};
