<template>
    <div class="containers">
        <div class="menu-side">
            <h1>BRI Dashboard</h1>

            <ul>
                <li>
                    <button class="btnActive">Dashboard</button>
                </li>
            </ul>
            <button class="btn btnLogout" @click="logout">Logout</button>
        </div>
        <div class="content-side">
            <TableData />
        </div>
    </div>
</template>

<script>
import TableData from "./TableData.vue";
import DialogBox from "./DialogBox.vue";

export default {
    components: {
        DialogBox,
        TableData,
    },

    methods: {
        async logout() {
            let token = "Bearer " + localStorage.getItem("token");

            await axios
                .post("/api/logout", {}, { headers: { Authorization: token } })
                .then((res) => {
                    localStorage.removeItem("token");
                    this.$router.push({ name: "BRILogin" });
                    console.log(res.data);
                });
        },
    },
};
</script>

<style lang="scss" scoped>
.containers {
    display: grid;
    grid-template-columns: 0.2fr 1fr;
    grid-template-rows: 1fr;

    height: 100vh;

    .btnActive {
        background-color: #383838;
    }

    .menu-side {
        background-color: #252525;
        font-family: "Poppins", sans-serif;
        color: white;

        display: flex;
        align-items: center;

        flex-direction: column;

        h1 {
            font-size: 24pt;
            font-weight: 700;
            text-align: center;
            margin-top: 30px;

            @media (max-width: 1558px) {
                font-size: 18pt;
            }
        }

        ul {
            margin-top: 100px;
            width: 100%;

            li {
                button {
                    padding: 20px 0;
                    width: 100%;
                    transition: 0.2s ease;

                    &:hover {
                        background-color: #383838;
                        color: white;
                    }

                    @media (max-width: 1558px) {
                        font-size: 12pt;
                    }
                }
            }
        }

        .btnLogout {
            margin-top: 60px;
            padding: 14px 40px;
            background: rgb(250, 121, 0);
            border-radius: 5px;
            color: white;
            font-size: 11pt;

            transition: all 0.2s ease;

            &:hover {
                background-color: rgb(223, 108, 0);
            }

            @media (max-width: 1558px) {
                padding: 10px 28px;
            }
        }
    }

    .content-side {
        display: flex;
        align-items: center;
        flex-direction: column;
        margin-top: 40px;
    }
}
</style>
