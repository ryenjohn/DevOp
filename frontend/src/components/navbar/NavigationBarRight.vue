<template>
  <div class="sidebarleft">
    <div class="icon">
      <v-icon size="large" color="light" icon="mdi-bell"></v-icon>
    </div>
    <v-avatar>
      <v-img src="https://cdn.vuetifyjs.com/images/john.jpg" @click="submitLogOut" alt="John"></v-img>
    </v-avatar>
  </div>
</template>
<script>
import axios from "axios";
import Cookies from "js-cookie";
export default {
  name: "App",
  data() {
    return {
    };
  },
  methods: {
    // copy https://stackoverflow.com/questions/52021405/vue-js-laravel-handle-logout-correctly
    submitLogOut() {
      if (confirm("Are you sure you want to log out?")) {
        axios
          .get("http://127.0.0.1:8000/api/logOut")
          .then(() => {
            Cookies.remove("userData");
            delete axios.defaults.headers.common["Authorization"];
            this.$router.push("/signUp");
          })
          .catch(() => {
            Cookies.remove("userData");
            delete axios.defaults.headers.common["Authorization"];
            this.$router.push("/signUp");
          });
      }
    },
  },
};
</script>

<style scoped>
.sidebarleft {
  display: flex;
  justify-content: center;
  align-items: center;
}
.icon {
  margin-right: 20px;
  margin-left: 20px;
}

</style>
