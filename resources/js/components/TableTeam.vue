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
                <tr v-for="team in teams" :key="team.id">
                    <td>#{{ team.id }}</td>
                    <td>{{ team.participants }}</td>
                    <td>
                        <button
                            @click="handlerClick(team.id)"
                            class="btn bg-slate-700 text-white"
                        >
                            Vote
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <DialogBoxVerified
            :show="showDialogVerified"
            :confirm="confirmVerified"
            :title="titleDialogBoxVerified"
            :description="descriptionDialogBoxVerified"
            :btnText="btnDialogBoxVerified"
        />

        <DialogBox
            :show="showDialog"
            :confirm="confirm"
            :title="titleDialogBox"
            :description="descriptionDialogBox"
        />
    </div>
</template>

<script>
import DialogBox from "./Handler/DialogBox/DialogBox.vue";
import DialogBoxVerified from "./Handler/DialogBox/DialogBoxVerified.vue";

export default {
    name: "TableTeam",
    data() {
        return {
            teams: [],
            showDialog: false,
            showDialogVerified: false,
            titleDialogBox: "",
            descriptionDialogBox: "",

            titleDialogBoxVerified: "",
            descriptionDialogBoxVerified: "",
            btnDialogBoxVerified: "",
        };
    },
    mounted() {
        this.fetchTeam();
    },
    components: {
        DialogBox,
        DialogBoxVerified,
    },
    methods: {
        async fetchTeam() {
            await axios.get("/api/vote").then((res) => {
                this.teams = res.data.data;
            });
        },
        async handlerClick(id) {
            await axios
                .put("/api/member/" + 23, {
                    vote_id: id,
                })
                .then((res) => {
                    if (res.data.code == 200) {
                        if (
                            res.data.data.phone_verified == 0 ||
                            res.data.data.email_verified == 0
                        ) {
                            this.titleDialogBoxVerified = "Verifikasi Akun";
                            this.descriptionDialogBoxVerified =
                                res.data.message;
                            this.btnDialogBoxVerified = "Verifikasi";
                            this.showDialogVerified = true;
                        } else {
                            this.titleDialogBox = "Food Rush Vote 2022";
                            this.descriptionDialogBox = res.data.message;
                            this.showDialog = true;
                        }
                    }
                });
        },
        confirm() {
            this.showDialog = false;
        },
        confirmVerified() {
            alert("Navigated to Verified Account Page");
            this.showDialogVerified = false;
        },
    },
};
</script>
