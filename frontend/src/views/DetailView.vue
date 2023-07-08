<template>
  <h1></h1>
    <card-item>
        <template #img>    <v-img
            class="align-end text-white"
            height="200"
            :src="university.img"
            cover
            >
            </v-img>
        </template>
        <template #info>    
            <v-card-text>
                <div> <strong>Name: </strong>{{university.name}}</div>
                <div> <strong>Type: </strong>{{university.type}}</div>
                <iframe class="mt-8" :src="university.address"></iframe>
            </v-card-text>
        </template>
    </card-item>
   
</template>
<script>
// @ is an alias to /src
import axios from 'axios';
    export default {
        
        data(){
            return {
                university: [],
                is_update: false,
                url: 'http://127.0.0.1:8000/api/',
                id:'',
                dataname:''
            }
        },
        methods:{
                listUniversity(){
                this.id = this.$route.params.id;
                this.dataname = this.$route.params.dataname;

                axios.get(this.url+this.dataname+"/"+this.id).then((response) =>{
                    this.university = response.data.data})
                },
                showDetail(id){
                    this.$router.push("/university/" + id)
                 }
            },
         mounted() {
                this.listUniversity();
        },
    }
</script>
<style scoped>
 iframe{
  width:100%; height:200px;
 }
</style>