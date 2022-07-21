<template>
    <div class="containers">
        <table class="table table-striped table-bordered w-[50vh]">
            <thead>
                <tr>
                    <th>ID Tim</th>
                    <th>Nama Tim</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1239</td>
                    <td>Tim Kacau</td>
                    <td>
                        <button
                            @click="handlerClick"
                            class="btn bg-slate-700 text-white"
                        >
                            Vote
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>#1319</td>
                    <td>Tim Hancur</td>
                    <td>
                        <button
                            @click="handlerClick"
                            class="btn bg-slate-700 text-white"
                        >
                            Vote
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
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
