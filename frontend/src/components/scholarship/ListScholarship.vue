<template>
    <div class="tablecontainer">
      <v-table class="my-table">
        <thead>
          <tr>
            <th class="text-center">
                Id
            </th>
            <th class="text-center">
                name
            </th>
            <th class="text-center">
                user_number
            </th>
            <th class="text-center">
                full
            </th>
            <th class="text-center">
                post date
            </th>
            <th class="text-center">
                expired date
            </th>
            <th class="text-center">
                Image
            </th>
            <th class="text-center">
                actions
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(data, index) in dataScholarships" :key="index" class="text-center">
            <td>{{data.id}}</td>
            <td>{{data.name}}</td>
            <td>{{data.user_number}}</td>
            <td>{{data.full}}</td>
            <td>{{data.post_date}}</td>
            <td>{{data.expired_date}}</td>
            <td>
                <img :src="data.image" alt="" style="width: 30%">
            </td>
            <td>
              <v-btn color="primary">
                <span class="mdi mdi-pencil" style=" font-size: 24px; "> <router-link class="btn btn-success" :to="`/scholarships/${data.id}`">Edit</router-link></span>
              </v-btn>
              <span class="mdi mdi-delete" @click="openDialogDelete(data.id)" style="color: red; font-size: 24px;"></span>
            </td>
          </tr>
        </tbody>
      </v-table>
    </div>
  </template>
  <script>
  import axios from 'axios';
  export default {
    data() {
      return {
        url: 'http://127.0.0.1:8000/api/scholarships',
        dataScholarships: [],
        getScholarshipById: [],
        name: '',
        deleteId: '',
      };
    },
    methods: {
        fetchScholarship(){
            axios.get(this.url).then((res)=>{
                this.dataScholarships = res.data.data;
            })
        },
    },
    mounted(){
        this.fetchScholarship();
    }
  }
  
  </script>
  
  <style scoped>
  .tablecontainer {
    margin-bottom: 100px;
  }
  
  .my-table {
    padding: 8px;
    width: 72%;
    margin-left: 23%;
    border: 1px solid rgb(181, 177, 177);
  }
  
  th {
    font-size: 25px;
  }
  
  td {
    font-size: 18px;
  
  }
  
  .button {
    font-size: 23px;
    margin-left: -48%;
    margin-bottom: 2%;
    background-color: rgb(137, 27, 240);
    color: white;
    padding: 6px;
    font-family: sans-serif;
  }
  
  h1 {
    text-align: center;
    margin-top: 5%;
  }
  
  .custom-dialog {
    background-color: #f3f3f3;
    width: 500px;
    border-radius: 8px;
  }
  
  .custom-dialog-title {
    background-color: #1a237e;
    color: white;
    border-radius: 8px 8px 0 0;
    padding: 16px;
  }
  
  .custom-dialog-actions {
    background-color: #e8e8e8;
    border-radius: 0 0 8px 8px;
    padding: 8px;
  }
  
  .form-label {
    color: #1a237e;
    font-weight: bold;
  }
  
  .form-control {
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 8px;
    width: 100%;
  }
  .role{
    outline-style: solid;
    outline-width: 1px;
  }
  </style>