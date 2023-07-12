<template>
  <div class="menu" v-if="showMenu">
    <div class="icon-item">
      <v-icon class="logout-icon text-orange me-2 " size="20">mdi-account </v-icon> 
      <div class="username">{{ userName }}</div>
    </div>
    <div class="icon-item">
      <v-icon class="logout-icon text-orange me-2" size="20" @click="submitLogOut">mdi-logout</v-icon> 
      <div class="icon-log-out">log out</div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Cookies from "js-cookie";

export default {
  name: "UserMenu",
  emits: ["submitLogOut"],
  props: ['showMenu', 'userName'],
  methods: {
    submitLogOut() {
      if (confirm("Are you sure you want to log out?")) {
        const userId = this.userId;
        axios
          .get("http://127.0.0.1:8000/api/logOut")
          .then(() => {
            Cookies.remove("userData");
            delete axios.defaults.headers.common["Authorization"];
            this.$router.push("/");
          })
          .catch(() => {
            Cookies.remove("userData");
            delete axios.defaults.headers.common["Authorization"];
            if (userId == "1") {
              this.$router.push("/");
            } else if (userId == "2") {
              this.$router.push("/");
            } else {
              this.$router.push("/logIn");
            }
          });
      }
    },
  },
};
</script>

<style scoped>
.menu{
  /* z-index: 1; */
  /* position: absolute; */
  /* margin-top:-30px; */
  color: #ffff;
  display: flex;
  flex-direction: column;
  align-items: center;
  background:rgb(141, 75, 202);
  gap: 10px;
}
.icon-item{
  display: flex;
}

.username,  .icon-log-out{
  cursor: pointer;
  color: #fff;
  font-size: 14px;
  font-weight: bold;
  text-align: center;
}
</style>