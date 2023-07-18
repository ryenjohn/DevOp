<template>
    <h1>All Users List <br>
      <span @click="add()" class=" button mdi mdi-plus-circle">ADD</span>
    </h1>
    <side-bar @dataname="changedata" class="side-bar"></side-bar>
    <list-user :datas="datas" ></list-user> 
</template>

<script>

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
    changedata(dataname){
        
        fetch('http://127.0.0.1:8000/api/'+dataname)
        .then(response => response.json())
        .then(data => {
            this.datas = data.data;
            console.log(this.datas)
        })
        .catch(error => {
            console.error('Error fetching student data:', error);
        });
    }
    
    
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
   

</style>