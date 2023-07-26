<template>
  <div class="tablecontainer">
    <v-btn class="add"  text>
      <router-link class="btn btn-success btn-scholarship" :to="`/addScholarship`">Add scholarship</router-link></v-btn>
    <v-table class="my-table">
      <thead>
        <tr>
          <th class="text-center" style="width: 10%; color:#ffffff;">Id</th>
          <th class="text-center" style="width: 15%; color:#ffffff;">Name</th>
          <th class="text-center" style="width: 15%; color:#ffffff;">Post Date</th>
          <th class="text-center" style="width: 15%; color:#ffffff;">Expired Date</th>
          <th class="text-center" style="width: 10%; color:#ffffff;">Full</th>
          <th class="text-center" style="width: 10%; color:#ffffff;">User Number</th>
          <th class="text-center" style="width: 10%; color:#ffffff;">Image</th>
          <th class="text-center" style="width: 10%; color:#ffffff;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(data, index) in dataScholarships" :key="index" class="text-center">
          <td>{{data.id}}</td>
          <td>{{data.name}}</td>
          <td>{{data.post_date}}</td>
          <td>{{data.expired_date}}</td>
          <td>{{data.full}}</td>
          <td>{{data.user_number}}</td>
          <td>
            <img :src="data.image" alt="" style="width: 60%" />
          </td>
          <td class="btn-action">
            <!-- <v-btn class="edit" color="primary" text > -->
              <span class="mdi mdi-pencil" style="color: rgb(11, 7, 249); font-size:20px; cursor: pointer;">
                <router-link class="btn btn-success" :to="`/scholarships/${data.id}`">d</router-link>
              </span>
            <!-- </v-btn> -->
            <!-- <v-btn class="delete" color="error" text > -->
              <span
                class="mdi mdi-delete"
                @click="deleteScholarship(data.id)"
                style="color: rgb(249, 7, 7); font-size:20px; cursor: pointer;"
              ></span>
            <!-- </v-btn> -->
          </td>
        </tr>
      </tbody>
    </v-table>
  </div>
</template>

<script>
import axios from 'axios';
// import Swal from 'sweetalert2'
export default {
  data() {
    return {
      dataScholarships: [],
    };
  },
  methods: {
    fetchScholarship() {
      axios.get(`${process.env.VUE_APP_API_URL}scholarships`).then((res) => {
        this.dataScholarships = res.data.data;
      });
    },
    
  },
  mounted() {
    this.fetchScholarship();
  },
};
</script>

<style scoped>
body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}
.tablecontainer {
  margin-bottom: 10%;
  margin-top: 5%;
}
.my-table {
  margin-left: auto;
  margin-right: 10px;
  max-width: 85%;
  border-collapse: collapse;
  box-shadow: 0px 10px 20px rgba(150, 147, 147, 0.1);
}

th{
  font-size: 12px;
  font-weight: 600;
  background-color: blueviolet;
  border-bottom: 2px solid #e0e0e0;
  padding: 12px;
  text-align: center;
}

td {
  font-size: 10px;
  color: #333131cc;
  border-bottom: 1px solid #e0e0e0;
  padding: 12px;
  text-align: center;
}

.btn-action {
  display: flex;
  justify-content: center;
  align-items: center;
}
.edit,
.delete {
  width: 20px;
  margin-left: 10px;
  margin-right: 10px;
}
.add{
  margin-left: 14.3%;
  margin-bottom: 10px;
  background: blueviolet;
}

.btn-success{
  color: white;
  text-decoration: none;
}
</style>