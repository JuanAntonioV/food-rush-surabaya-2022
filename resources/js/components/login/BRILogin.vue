<template>
    <div class="container">
        <div class="login_container">
            <h1>Login</h1>

            <form @submit.prevent="handleSubmit">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        class="form-control"
                        ref="username"
                        name="username"
                        placeholder="Your Username"
                        v-model="username"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        placeholder="Password"
                        v-model="password"
                        required
                    />
                </div>
                <!-- <p v-if="errors.name">{{ errors[0] }}</p> -->
                <p v-if="msg">{{ msg }}</p>
                <button type="submit">Masuk</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            username: "",
            password: "",
            msg: "",
        };
        // errors: [];
    },
    methods: {
        async handleSubmit() {
            await axios
                .post("/api/login", {
                    username: this.username,
                    password: this.password,
                })
                .then((res) => {
                    if (res.data.code === 200) {
                        this.$router.push({ name: "BRIDashboard" });
                    }
                })
                .catch(() => {
                    // this.msg = "Username atau password kamu salah !!!";
                    this.username = "";
                    this.password = "";
                    this.$refs.username.focus();
                    this.msg = "Username atau password kamu salah !!!";
                });
        },
    },
};
</script>

<style lang="scss" scoped>
.container {
    display: flex;
    justify-content: center;
    align-items: center;

    font-family: "Poppins", sans-serif;

    height: 100vh;

    background-color: #60a500;
    user-select: none;

    .login_container {
        width: 400px;
        padding: 50px;

        background-color: white;

        box-shadow: 0 10px 30px -2px rgba(0, 0, 0, 0.3);

        border-radius: 30px;

        h1 {
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

            .form-group {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                width: 100%;

                margin: 10px 0;

                label {
                    padding: 0;
                    margin-right: auto;
                    font-size: 13px;

                    color: black;
                }

                input {
                    width: 100%;
                    border-radius: 10px;
                    border: 1px solid rgb(172, 172, 172);
                    padding: 14px 20px;

                    margin-top: 10px;

                    &::placeholder {
                        font-family: "Poppins", sans-serif;
                        font-size: 12px;

                        color: rgb(172, 172, 172);
                    }
                }
            }

            p {
                font-family: "Poppins", sans-serif;
                font-weight: 500;
                font-style: italic;

                text-align: center;

                color: red;
                font-size: 12px;
                margin: 10px 0 0 0;
            }

            button {
                border: none;
                background-color: #73c000;
                color: white;

                border-radius: 20px;
                padding: 16px 30px;
                margin: 20px 0 10px 0;

                width: 100%;

                &:hover {
                    background-color: #60a500;
                }
            }
        }
    }
}
</style>
