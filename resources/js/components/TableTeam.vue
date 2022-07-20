<template>
    <table class="table table-striped table-bordered w-[50vh]">
        <thead>
            <tr>
                <th>ID Tim</th>
                <th>Nama Tim</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="team in teams" :key="team.id">
                <td>#{{ team.id }}</td>
                <td>{{ team.participants }}</td>
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
</template>

<script>
export default {
    name: "TableTeam",
    data() {
        return {
            teams: [],
        };
    },
    mounted() {
        this.fetchTeam();
    },
    methods: {
        async fetchTeam() {
            await axios.get("/api/vote").then((res) => {
                this.teams = res.data.data;
            });
        },
        async handlerClick() {
            // CREATE TEAM FUNCTION

            // await axios
            //     .post("/api/log-vote", {
            //         vote_id: 3,
            //         member_id: 12,
            //     })
            //     .then((res) => {
            //         console.log(res.statusText);
            //     });

            // RUBAH DATA TABEL TEAM NAMBAH 1 Yang Vote && DI TABLE MEMBER, VOTE_ACCESS AKAN JADI 1 = GA BISA VOTE LAGI

            await axios.put("/api/vote/" + 2, {}).then((res) => {
                console.log(res);
            });

            await axios.put("/api/member/" + 12, {}).then((res) => {
                console.log(res);
            });

            alert("You have voted");
        },
    },
};
</script>
