<template>
    <main>
        <h1>Dashboard</h1>

        <div class="insights">
            <div class="registered">
                <span class="material-icons-round"> bar_chart </span>

                <div class="middle">
                    <div class="left">
                        <h3>Total Registered</h3>
                    </div>
                    <div class="progress">
                        <h1>{{ this.users.length }}</h1>
                    </div>
                </div>
                <small>Start From Events</small>
            </div>

            <div class="pending">
                <span class="material-icons-round"> hourglass_bottom </span>

                <div class="middle">
                    <div class="left">
                        <h3>Total Pending</h3>
                    </div>
                    <div class="progress">
                        <h1>{{ usersPending.length }}</h1>
                    </div>
                </div>
                <small>Start From Events</small>
            </div>

            <div class="declined">
                <span class="material-icons-round"> thumb_down_alt </span>

                <div class="middle">
                    <div class="left">
                        <h3>Total Declined</h3>
                    </div>
                    <div class="progress">
                        <h1>{{ usersDeclined.length }}</h1>
                    </div>
                </div>
                <small>Start From Events</small>
            </div>
        </div>

        <div class="recent-change">
            <h2>Recent Change</h2>
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
                    <tr
                        v-for="user in users.filter((item) => item.id <= 10)"
                        :key="user.id"
                    >
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

            <router-link
                :to="{ name: 'Pending', params: { category: 'Pending' } }"
            >
                Show All
            </router-link>
        </div>
    </main>
</template>

<script>
import Loading from "../loading/Loading.vue";

export default {
    name: "Dashboard",
    data() {
        return {
            users: [],
            usersPending: [],
            usersDeclined: [],
            loading: false,
        };
    },
    mounted() {
        this.loading = true;
        axios
            .get("/api/dashboardBRIs")
            .then((res) => {
                this.users = res.data.data.sort((a, b) => {
                    return new Date(b.updated_at) - new Date(a.updated_at);
                });
                this.usersPending = res.data.data.filter(
                    (user) => user.status === "2"
                );
                this.usersDeclined = res.data.data.filter(
                    (user) => user.status === "3"
                );
                this.loading = false;
            })
            .catch((err) => {
                console.log(err);
                this.loading = false;
            });
    },
    components: {
        Loading,
    },
};
</script>

<style lang="scss" scoped>
main {
    font-family: "Poppins", sans-serif;
    margin: 1.4rem 1.4rem 0 15rem;

    h1 {
        font-size: 16pt;
        font-weight: 600;
    }

    .insights {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.6rem;
        user-select: none;

        small {
            color: #7d8da1;
        }

        h3 {
            margin: 1rem 0 0.6rem;
            font-size: 1rem;
            font-weight: 700;
        }

        .progress {
            background: none;
            width: 100px;
            height: 40px;
            display: flex;
            justify-content: end;
            align-items: center;

            h1 {
                font-size: 2rem;
                font-weight: 700;
                margin: 0;
            }
        }
    }

    .insights > div {
        width: 320px;
        background: white;
        padding: 1.8rem;
        border-radius: 2rem;
        margin-top: 1rem;
        box-shadow: 0 2rem 3rem rgba(132, 139, 200, 0.18);
        transition: all 0.3s ease-in-out;

        &:hover {
            box-shadow: none;
        }
    }

    .insights > div span {
        background: coral;
        padding: 0.5rem;
        border-radius: 50%;
        color: white;
        font-size: 2rem;
    }

    .insights > div.pending span {
        background: #ebe700;
    }

    .insights > div.declined span {
        background: #ff7782;
    }

    .insights > div .middle {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .recent-change {
        position: relative;
        margin-top: 2rem;

        h2 {
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        a {
            text-align: center;
            display: block;
            margin: 1rem auto;
            color: #7380ec;
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

                        &:last-child {
                            font-weight: 600;
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
    }
}
</style>
