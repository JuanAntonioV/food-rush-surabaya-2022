<template>
    <main>
        <h1>Customer</h1>
        <div class="category">
            <router-link
                :to="{
                    name: 'BRI_Pending',
                    params: { category: 'pending' },
                }"
                exact
                active-class="active"
                class="subMenu"
            >
                <h3>Pending</h3>
            </router-link>
            <router-link
                :to="{ name: 'BRI_Approved', params: { category: 'approved' } }"
                exact
                active-class="active"
                class="subMenu"
            >
                <h3>Approved</h3>
            </router-link>
            <router-link
                :to="{ name: 'BRI_Declined', params: { category: 'declined' } }"
                exact
                active-class="active"
                class="subMenu"
            >
                <h3>Declined</h3>
            </router-link>
        </div>
        <router-view />
    </main>
</template>

<script>
export default {
    name: "BRI_Customer",
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

    .category {
        display: flex;
        justify-content: flex-start;
        align-items: center;

        .subMenu {
            margin-top: 1.4rem;
            margin-right: 1.4rem;
            border: 1px solid rgba(132, 139, 200, 0.2);
            border-radius: 2rem;
            padding: 0.5rem 1.8rem;
            text-decoration: none;
            transition: all 0.3s ease;

            h3 {
                font-size: 11pt;
                font-weight: 500;
            }

            &:nth-child(1) {
                &:hover {
                    background: #ffbb55;
                    color: white;
                }
            }
            &:nth-child(2) {
                &:hover {
                    background: #41f1b6;
                    color: white;
                }
            }
            &:nth-child(3) {
                &:hover {
                    background: #ff7782;
                    color: white;
                }
            }
        }

        .subMenu.active {
            color: white;

            &:nth-child(1) {
                background: #ffbb55;
            }
            &:nth-child(2) {
                background: #41f1b6;
            }
            &:nth-child(3) {
                background: #ff7782;
            }
        }
    }
}
</style>
