<template>
    <div>
        <!-- <UserNavbar /> -->
        <router-view />
    </div>
</template>

<script>
import TableTeam from "./User_Components/partials/TableTeam.vue";
import UserNavbar from "./User_Components/partials/User_Navbar.vue";

export default {
    components: {
        TableTeam,
        UserNavbar,
    },
};
</script>
