<template>
    <!-- <div class="btn"> 
        <router-link to="/"><v-tab>Back</v-tab></router-link>
    </div> -->
    <div class="cardImage">
        <card-item class="ms-12 me-12 mt-10 mb-5">
        <template #img>    <v-img
            class="align-end text-white"
            height="400"
            width="100%"
            :src="data.img"
            cover
            >
            </v-img>
        </template>
        <template #info>    
            <v-card-text>
                <div> <strong>Name: </strong>{{data.name}}</div>
                <div><strong>Description: </strong> {{data.description}}</div>
                <div  v-if='dataname=="majors"'><strong>Subject that match with this skill: </strong>
                    <ul>
                        <li v-for='subject in data.subjects' :key="subject">{{subject}}</li>
                    </ul>
                </div>
                <div v-if='dataname=="schools"'> <strong>Type: </strong>{{data.type}}</div>
            </v-card-text>
        </template>
    </card-item>
    </div>
    <content-list  :datas="listSkill"  :dataname="'majors'"></content-list>
    <content-list   :datas="listSchool" :dataname='"schools"'></content-list>
    <scholarship-workshop-card  :datas="listWorkshop" :dataname='"workshops"'></scholarship-workshop-card>
    <scholarship-workshop-card  :datas="listScholarship" :dataname='"scholarships"'></scholarship-workshop-card>

    <map-show v-if="dataname=='schools'" :address='data.address' ></map-show>
  
   
</template>

<script>

import axios from 'axios';
    export default {
        
        data(){
            return {
                data: [],
                is_update: false,
                url: 'http://127.0.0.1:8000/api/',
                id:'',
                dataname:'',
                listSchool:'',
                listSkill:'',
                listWorkshop:'',
                listScholarship:''
            }
        },
        methods:{
                detailData(){
                    this.id = this.$route.params.id;
                    this.dataname = this.$route.params.dataname;
                    axios.get(this.url+this.dataname+"/"+this.id).then((response) =>{
                        this.data = response.data.data
                        this.listScholarship = this.data.scholarship
                        this.listSkill = this.data.skills
                        this.listWorkshop= this.data.workshops
                        this.listSchool = this.data.schools
                        console.log( this.listScholarship);
                    })
                    
                },
            
            },
         mounted() {
            
                this.detailData();
        },
    }
</script>
<style scoped>
    .cardImage {
        width: 100%;
        margin-top:100px ;
    }
    .btn{
        display: flex;
        flex-direction: column;
        justify-content:end;
    }
    button{
        padding:10px 20px 10px 20px;
        border-radius:20px;
        border:none;
        color:white;
        background:orange;
        width: 10%;
        margin:10px;
    }
</style>