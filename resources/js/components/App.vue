<template>
    <div class="containers">
        <TableTeam />
    </div>
</template>

<script>
import TableTeam from "./TableTeam.vue";

export default {
    components: {
        TableTeam,
    },
    methods: {
        handlerClick() {
            alert("You have voted");
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
}
</style>
