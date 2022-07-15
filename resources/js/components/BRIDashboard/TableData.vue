<template>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Nomor Rekening</th>
                    <th>Tanggal Registrasi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in pageItems" :key="user.id">
                    <td data-label="Nama Lengkap">{{ user.nama }}</td>
                    <td data-label="Nomor Rekening">
                        {{ user.noRekening }}
                    </td>
                    <td data-label="Tanggal Registrasi">
                        {{ user.tanggalRegistrasi }}
                    </td>
                    <td data-label="Actions">
                        <button class="btn">Terima</button>
                        <button class="btn">Tolak</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="tabs">
            <pagination
                class="pagination"
                :pageSize="10"
                :items="users"
                @changePage="onChangePage"
            ></pagination>
        </div>
    </div>
</template>

<script>
export default {
    name: "TableData",
    data() {
        return {
            users: this.$store.state.users.state.user,
            pageItems: [],
        };
    },
    methods: {
        onChangePage(pageItems) {
            this.pageItems = pageItems;
        },
    },
};
</script>

<style lang="scss" scoped>
.table-container {
    font-family: "Poppins", sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

    .table {
        thead {
            tr {
                th {
                    width: 340px;
                    background-color: #252525;
                    color: white;
                    padding: 20px 50px;
                    text-align: center;
                    font-size: 12pt;
                    font-weight: 500;

                    &:nth-child(1) {
                        border-right: 1px solid #dee2e685;
                        border-radius: 20px 0 0 0;
                    }

                    &:nth-child(2) {
                        border-right: 1px solid #dee2e685;
                    }

                    &:nth-child(3) {
                        border-right: 1px solid #dee2e685;
                    }

                    &:nth-child(4) {
                        border-radius: 0 20px 0 0;
                    }
                }
            }
        }
        tbody {
            tr {
                td {
                    text-align: center;
                    font-size: 12pt;
                    font-weight: 500;
                    padding: 16px 0;
                    letter-spacing: 0.35px;
                    border: 1px solid #dee2e685;

                    line-height: 40px;

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

                &:nth-child(even) {
                    background-color: #00bbd427;
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
            // border: 1px solid #dee2e685;
            // background-color: #252525;
            // color: white;
            // border-radius: 10px;

            justify-content: center;
            flex-wrap: wrap;
        }
    }
}
</style>
