<template>
    <div class="container">
        <div class="login_container">
            <h1>Login</h1>

            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        placeholder="Your Username"
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
                    />
                </div>
                <button type="submit">Masuk</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {};
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
            button {
                border: none;
                background-color: #73c000;
                color: white;

                border-radius: 20px;
                padding: 16px 30px;
                margin: 30px 0 20px;

                width: 85%;

                &:hover {
                    background-color: #60a500;
                }
            }
        }
    }
}
</style>
