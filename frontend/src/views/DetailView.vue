<template>
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
                <div v-if='dataname=="schools"'> <strong>Type: </strong>{{data.type}}</div>
            </v-card-text>
        </template>
    </card-item>
    </div>
    <content-list  :datas="listSkill"  :dataname="'majors'"></content-list>
    <content-list  :datas="listSchool" :dataname='"schools"'></content-list>
    <scholarship-workshop-card :datas="listWorkshop" :dataname='"workshops"'></scholarship-workshop-card>
    <scholarship-workshop-card  :datas="listScholarship" :dataname='"scholarships"'></scholarship-workshop-card>

    <map-show v-if="dataname='schools'" :address='data.address' ></map-show>
  
   
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
                        
                       
                    })
                    
                },
            
            },
         mounted() {
                this.detailData();
        },
    }
</script>
<style >
    .cardImage {
        width: 100%;
    }
</style>