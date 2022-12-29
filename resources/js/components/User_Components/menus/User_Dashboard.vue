<template>
    <div class="containers">
        <h1>USER DASHBOARD PAGE</h1>
        <button :v-if="[(this.$router.params = 'game')]" @click="playGame">
            PLAY NOW
        </button>
        <router-view />
    </div>
</template>

<script>
export default {
    methods: {
        playGame() {
            location.href = "/game";
        },
    },
};
</script>

<style lang="scss" scoped>
.containers {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 100%;

    height: 90vh;

    h1 {
        font-family: "Poppins", sans-serif;
    }
}
</style>
