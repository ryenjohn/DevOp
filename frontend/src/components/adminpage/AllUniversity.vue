<template>
    <h1>All Universities List</h1>
    <div class="button">
        <!-- <v-btn @click="add()" style="color: blue;"><span class="mdi mdi-plus">Add</span></v-btn> -->
        <span @click="add()" class="mdi mdi-plus">Add</span>
        
    </div>
  <div>
    <v-table class="my-table">
    <thead>
      <tr>
        <th class="text-center">
         No
        </th>
        <th class="text-center">
         Name
        </th>
        <th class="text-center">
         Email
        </th>
        <th class="text-center">
         Action
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="student in students" :key="student.id">
        <td>{{ student.id }}</td>
        <td>{{ student.name }}</td>
        <td>{{ student.email }}</td>
        <td>        
          <span @click="edit()" class="mdi mdi-pencil" style="color: blue;"></span>
          <span @click="del()" class="mdi mdi-delete" style="color: red;"></span>
        </td>
      </tr>
    </tbody>
  </v-table>
  </div>
  <SideBar />
</template>

<script>
import SideBar from '../views/SideBar.vue';
export default {
  components: {
        SideBar,
  },
  
  data() {
    return {
      students: [],
    };
  },

  methods: {
      add(){
        alert("Add new student");
      },
      edit(){
        alert("edit student");

      },
        del(){
        alert("Do you want to delete student?");

      }
  },
  
  mounted() {
    fetch('http://127.0.0.1:8000/api/users')
      .then(response => response.json())
      .then(data => {
        this.students = data.data;
      })
      .catch(error => {
        console.error('Error fetching student data:', error);
      });
  },
}

</script>

<style  scoped>
.my-table {
  /* font-size: 14px; */
  padding: 8px;
  width: 72%;
  margin-left: 23%;
  border: 1px solid rgb(181, 177, 177);
}

th{
  font-size: 25px;
}
td{
  font-size: 18px;
}
.button span {
  font-size: 19px;
  background-color: rgb(195, 11, 195);
  padding: 8px;
  border-radius: 20px;
  color: white;
  
}
.button {
      margin-left: -46%;
      margin-bottom: 2%;
}
h1{
  margin-top: 5%;
  margin-bottom: 5%;
}

</style>