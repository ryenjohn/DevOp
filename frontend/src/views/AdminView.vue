<template>
  <div>
    <h1>All {{ pageTitle }}</h1>
    <add-form v-if="isAllUser"></add-form>
    <list-user :datas="datas" @edit="edit" @del="del"></list-user>
    <side-bar @dataname="changedata"></side-bar>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      datanameEmitted: true,
      datas: [],
      pageTitle: "Users",
      isAllUser: true,
    };
  },

  methods: {
    changedata(dataname) {
      this.pageTitle = dataname;
      if (this.pageTitle != "users") {
        this.isAllUser = false;
      } else {
        this.isAllUser = true;
      }
      axios
        .get(`${process.env.VUE_APP_API_URL}${dataname}`)
        .then((res) => {
          this.datas = res.data.data;
          console.log(this.datas);
        })
        .catch((error) => {
          console.error("Error axios student data:", error);
        });
    },
  },

  mounted() {
    axios
      .get(`${process.env.VUE_APP_API_URL}users`)
      .then((res) => {
        this.datas = res.data.data;
      })
      .catch((error) => {
        console.error("Error axios student data:", error);
      });
  },
};
</script>

<style scoped>
h1 {
  margin-top: 20px;
  margin-left: 17%;
}
</style>
