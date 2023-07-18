<template>
    <h1>All Users List <br>
      <span @click="add()" class=" button mdi mdi-plus-circle">ADD</span>
    </h1>
    <list-user :datas="datas" @edit='edit' @del='del'></list-user> 
    <side-bar @dataname="changedata"></side-bar>
</template>

<script>
import axios from 'axios';

export default {

 
  data() {
    return {
        datas: [],
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
    },
    changedata(dataname){
        
        axios.get(`${ process.env.VUE_APP_API_URL}${dataname}`)
        .then(res => {
            this.datas = res.data.data;
        })
        .catch(error => {
            console.error('Error axios student data:', error);
        });
    }
    
  },
  
  mounted() {

    axios.get(`${ process.env.VUE_APP_API_URL}users`)
      .then(res => {
        this.datas = res.data.data;
      })
      .catch(error => {
        console.error('Error axios student data:', error);
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
        margin-top: 100px;
    }

</style>