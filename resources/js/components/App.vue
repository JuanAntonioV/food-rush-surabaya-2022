<template>
    <div class="container">
        <h1>FOOD RUST SURABAYA 2022</h1>
        <button @click="directBRI">Login As BRI Admin</button>
    </div>
</template>

<script>
export default {
    methods: {
        directBRI() {
            this.$router.push("/brilogin");
        },
    },
};
</script>

<style lang="scss" scoped>
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

    height: 90vh;

    h1 {
        font-family: "Poppins", sans-serif;
        text-align: center;
    }

    button {
        font-family: "Poppins", sans-serif;
        background-color: #00bcd4;
        color: white;
        border: none;
        border-radius: 30px;
        padding: 16px 50px;
        margin: 10px 0;

        box-shadow: 0 10px 30px -2px rgba(0, 0, 0, 0.3);
    }
}
</style>
