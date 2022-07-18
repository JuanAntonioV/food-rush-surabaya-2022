<template>
    <div class="containers">
        <NavbarBRIDashboard />
        <router-view />
    </div>
</template>

<script>
import NavbarBRIDashboard from "./Navbar.vue";

export default {
    components: {
        NavbarBRIDashboard,
    },
};
</script>

<style lang="scss" scoped>
.containers {
    display: grid;
    width: 96%;
    margin: 0 auto;
    gap: 1.8rem;
    grid-template-columns: 1fr;
}
</style>
