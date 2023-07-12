<template>
    <div class="tablecontainer" >
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
        </thead >
        <tbody >
        <tr v-for="data in datas" :key="data.id" class="text-center">
            <td>{{ data.id }}</td>
            <td>{{ data.name }}</td>
            <td>{{ data.email }}</td>
            <td>        
            <span @click="edit()" class="mdi mdi-pencil" style="color: blue; font-size: 24px; "></span>
            <span @click="del()" class="mdi mdi-delete" style="color: red; font-size: 24px;"></span>
            
            </td>
        </tr>
        </tbody>
    </v-table>
  </div>
</template>

<script>

export default {
    props:['datas'],
    methods:{
        edit(){
            return this.$emit('edit')
        },
        del(){
             return this.$emit('del')
        }
    }
}

</script>

<style  scoped>
.tablecontainer{
    margin-bottom: 100px;
}
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