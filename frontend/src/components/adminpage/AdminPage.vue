<template>
<!-- <navigation-bar></navigation-bar> -->
<h1>All Users List <br>
      <span @click="add()" class=" button mdi mdi-plus-circle">ADD</span>
    </h1>

    
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
      <tr v-for="student in students" :key="student.id" class="text-center">
        <td>{{ student.id }}</td>
        <td>{{ student.name }}</td>
        <td>{{ student.email }}</td>
        <td>        
          <span @click="edit()" class="mdi mdi-pencil" style="color: blue; font-size: 24px; "></span>
          <span @click="del()" class="mdi mdi-delete" style="color: red; font-size: 24px;"></span>
          
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
.button{
  font-size: 23px; 
  margin-left: -48%;
  margin-bottom: 2%;
  background-color: rgb(137, 27, 240);
  color: white;
  padding: 6px;
  font-family: sans-serif;
}

h1{
  text-align: center;
  margin-top: 5%;
}

</style>