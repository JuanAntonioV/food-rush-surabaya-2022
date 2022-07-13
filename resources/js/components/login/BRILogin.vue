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
                        id="username"
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
                        id="password"
                        name="password"
                        placeholder="Password"
                        v-model="password"
                        required
                    />
                </div>
                <p>{{ msg }}</p>
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
    },
    methods: {
        handleSubmit() {
            axios
                .post("/api/login", {
                    username: this.username,
                    password: this.password,
                })
                .then((res) => {
                    if (res.data.code === 200) {
                        this.$router.push("/bridashboard");
                    }
                })
                .catch(() => {
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

    height: 90vh;

    .login_container {
        width: 300px;
        padding: 50px;

        background-color: white;

        box-shadow: 0 10px 30px -2px rgba(0, 0, 0, 0.3);

        border-radius: 30px;

        h1 {
            font-size: 28px;
            text-align: center;
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
                margin-top: 10px;
            }

            button {
                border: none;
                background-color: #73c000;
                color: white;

                border-radius: 20px;
                padding: 16px 30px;
                margin: 10px 0 20px 0;

                width: 85%;

                &:hover {
                    background-color: #60a500;
                }
            }
        }
    }
}
</style>
