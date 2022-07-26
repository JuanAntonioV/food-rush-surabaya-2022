<template>
    <aside>
        <div class="header">
            <router-link
                :to="{ name: 'BRI_Dashboard', params: { menus: 'Dashboard' } }"
                class="logo"
            >
                <h1>BRI Dashboard</h1>
            </router-link>
            <button class="close">
                <span class="material-icons-round"> close </span>
            </button>
        </div>

        <div class="menus">
            <router-link
                :to="{ name: 'BRI_Dashboard', params: { menus: 'dashboard' } }"
                exact
                exact-active-class="active"
                class="menu"
            >
                <span class="material-icons-round"> space_dashboard </span>
                <h3>Dashboard</h3>
            </router-link>
            <router-link
                :to="{
                    name: 'BRI_Pending',
                    params: { category: 'pending' },
                }"
                exact
                active-class="active"
                class="menu"
            >
                <span class="material-icons-round"> group_add </span>
                <h3>Customers</h3>
            </router-link>
            <button class="menu" @click="logout">
                <span class="material-icons-round"> logout </span>
                <h3>Logout</h3>
            </button>
        </div>
    </aside>
</template>

<script>
export default {
    name: "NavbarBRIDashboard",
    methods: {
        async logout() {
            let token = "Bearer " + localStorage.getItem("token-bri");

            await axios
                .post("/api/logout", {}, { headers: { Authorization: token } })
                .then(() => {
                    localStorage.removeItem("token-bri");
                    this.$router.push({ name: "BRI_Login" });
                });
        },
    },
};
</script>

<style lang="scss" scoped>
aside {
    font-family: "Poppins", sans-serif;
    height: 100vh;
    position: fixed;
    background: white;

    .header {
        background: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.4rem;

        .logo {
            transition: 0.3s ease;
            font-size: 18pt;
            font-weight: 700;
            text-transform: uppercase;

            text-decoration: none;
        }

        .close {
            display: none;
        }
    }

    .menus {
        color: #7d8da1;
        display: flex;
        flex-direction: column;
        height: 86vh;
        position: relative;
        top: 3rem;

        h3 {
            font-weight: 500;
        }

        .menu.active {
            background: rgba(132, 139, 200, 0.18);
            color: #7380ec;
            margin-left: 0;

            &::before {
                content: "";
                width: 6px;
                height: 100%;
                background: #7380ec;
            }

            span {
                color: #7380ec;
                margin-left: calc(1rem - 3px);
            }
        }

        .menu {
            display: flex;
            align-items: center;
            position: relative;
            height: 3.7rem;
            gap: 1rem;
            margin-left: 2rem;
            transition: all 0.3s ease;
            text-decoration: none;

            span {
                font-size: 1.6rem;
                transition: all 0.3s ease;
            }

            &:nth-last-child(1) {
                position: absolute;
                bottom: 2rem;
                width: 100%;
            }

            &:hover {
                color: #7380ec;
                span {
                    margin-left: 1rem;
                }
            }
        }
    }
}
</style>
