<template>
    
<div>
    <h1 v-if="!datanameEmitted">All {{ pageTitle }}</h1>
    <h1 v-else>All Users</h1>
    <add-form v-if="datanameEmitted" ></add-form>
    <!-- <button class='add-btn' @click="addUser">Add new user</button> -->
    <list-user :datas="datas" @edit='edit' @del='del' ></list-user> 
    <side-bar @dataname="changedata"></side-bar>
  
   
    

</div>
</template>

<script>
import axios from 'axios';

export default {

 
  data() {
    return {
        datanameEmitted: true,
        datas: [],
        isAdd:false,
        pageTitle: '',
        open:false
    };
  },

  methods: {
    changedata(dataname){
      this.datanameEmitted = false;
      this.pageTitle = dataname;
        
        axios.get(`${ process.env.VUE_APP_API_URL}${dataname}`)
        .then(res => {
            this.datas = res.data.data;
        })
        .catch(error => {
            console.error('Error axios student data:', error);
        });
    },
    
    
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
    .add-btn{
      background-color: rgb(124, 49, 196);
      color: white;
      font-size: 20px;
      padding: 8px;
      border-radius: 8px;
      margin-left: 23%;
      margin-top: 20px;
      margin-bottom: 20px;
       
      }
   

</style>