<template>
    <div class="containers">
        <h1 class="text-center">BRI DASHBOARD</h1>
    </div>
</template>

<script>
export default {
    // computed: {
    //     user() {
    //         return this.$store.state.users.state.user.data.name;
    //     },
    // },
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
        font-size: 24pt;
        font-weight: 700;
        text-align: center;
    }
}
</style>
