<template>
  <div>
    <h1>Student List</h1>
    <v-table>
    <thead>
      <tr>
        <th class="text-left">
         Name
        </th>
        <th class="text-left">
         Email
        </th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="student in students"
        :key="student.id"
      >
        <td>{{ student.name }}</td>
        <td>{{ student.email }}</td>
       

      </tr>
    </tbody>
  </v-table>
  </div>
  <SideBar />
</template>

<script>
import SideBar from '../views/SideBar.vue'

export default {
 components: {
        SideBar
  },
  name: 'StudentList',
  data() {
    return {
      students: [],
    };
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

<style>

</style>