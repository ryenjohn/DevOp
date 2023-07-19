<template>
    
<div>
    <h1 v-if="datanameEmitted">All {{ pageTitle }}</h1>
    <h1 v-else>All Users</h1>
    <add-form v-if="datanameEmitted" ></add-form>
    <!-- <button class='add-btn' @click="addUser">Add new user</button> -->
    <list-user :datas="datas" @edit='edit' @del='del' ></list-user> 
    <side-bar @dataname="changedata"></side-bar>
  
   
    

</div>
</template>

<script>

export default {

 
  data() {
    return {
        datanameEmitted: false,
        datas: [],
        isAdd:false,
        pageTitle: '',
        open:false
    };
  },

  methods: {
    changedata(dataname){
      this.datanameEmitted = true;
      this.pageTitle = dataname;
        
        fetch('http://127.0.0.1:8000/api/'+dataname)
        .then(response => response.json())
        .then(data => {
            this.datas = data.data;
            console.log(this.datas)
        })
        .catch(error => {
            console.error('Error fetching student data:', error);
        });
    },
    
    
  },
  
  mounted() {

    fetch('http://127.0.0.1:8000/api/users')
      .then(response => response.json())
      .then(data => {
        this.datas = data.data;
        console.log(this.datas)
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