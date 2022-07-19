<template>
    <div class="containers">
        <table>
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Nomor Rekening</th>
                    <th>Tanggal Registrasi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in pageItems" :key="user.id">
                    <td data-label="Nama Lengkap">{{ user.nama_akun }}</td>
                    <td data-label="Nomor Rekening">
                        {{ user.no_akun }}
                    </td>
                    <td data-label="Tanggal Registrasi">
                        {{
                            new Date(user.created_at).toLocaleDateString(
                                "id-ID"
                            )
                        }}
                    </td>
                    <td
                        data-label="Status"
                        :class="{
                            approved: user.status === '1',
                            warning: user.status === '2',
                            declined: user.status === '3',
                        }"
                    >
                        {{ user.status === "1" ? "Approved" : "" }}
                        {{ user.status === "2" ? "Pending" : "" }}
                        {{ user.status === "3" ? "Declined" : "" }}
                    </td>
                </tr>
            </tbody>
        </table>

        <Loading v-if="loading" />
        <NoData v-if="this.users.length == 0 && !loading" />

        <div class="tabs">
            <pagination
                class="pagination"
                :pageSize="12"
                :items="users"
                @changePage="onChangePage"
            ></pagination>
        </div>
    </div>
</template>

<script>
import Loading from "../Handler/Loading.vue";
import NoData from "../Handler/NoData.vue";

export default {
    name: "PendingTable",
    data() {
        return {
            users: [],
            pageItems: [],
            loading: false,
        };
    },
    mounted() {
        this.loading = true;
        axios
            .get("/api/dashboardBRIs")
            .then((res) => {
                this.users = res.data.data.filter(
                    (user) => user.status === "1"
                );
                this.loading = false;
            })
            .catch((err) => {
                this.loading = false;
                console.log(err);
            });
    },
    components: {
        Loading,
        NoData,
    },
    methods: {
        onChangePage(pageItems) {
            this.pageItems = pageItems;
        },
    },
};
</script>

<style lang="scss" scoped>
.containers {
    font-family: "Poppins", sans-serif;
    margin-top: 2.3rem;

    h1 {
        font-size: 16pt;
        font-weight: 600;
    }

    table {
        background: white;
        width: 100%;
        border-radius: 2rem;
        padding: 1.8rem;
        text-align: center;
        transition: all 0.3s ease;

        tbody {
            height: 2.8rem;
            color: #677483;

            .approved {
                color: #41f1b6;
            }

            .warning {
                color: #ffbb55;
            }

            .declined {
                color: #ff7782;
            }

            tr {
                td {
                    border-bottom: 1px solid rgba(132, 139, 200, 0.18);
                    padding: 0.8rem 0;

                    &:first-child {
                        text-transform: capitalize;
                    }

                    &:nth-child(4) {
                        font-weight: 600;
                    }

                    button {
                        color: white;
                        padding: 8px 30px;
                        transition: all 0.3s ease;
                        box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.3);
                        border-radius: 4px;

                        &:hover {
                            box-shadow: none;
                        }

                        &:nth-child(1) {
                            background-color: #02ca34;
                            margin-right: 20px;

                            &:hover {
                                background-color: #00bb2f;
                            }
                        }

                        &:nth-child(2) {
                            background-color: #d40000;

                            &:hover {
                                background-color: #b10000;
                            }
                        }
                    }
                }

                &:last-child {
                    td {
                        border: none;
                    }
                }
            }
        }
    }

    .tabs {
        position: fixed;
        bottom: 3em;
        font-size: 12pt;
        font-weight: 500;
        letter-spacing: 0.35px;
        margin-top: 30px;

        .pagination {
            justify-content: center;
            flex-wrap: wrap;
        }
    }
}
</style>
