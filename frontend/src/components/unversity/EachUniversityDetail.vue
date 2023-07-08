<template>
    <card-item>
        <!-- <template #title><v-card-title>Royal University of Phnom Penh</v-card-title></template> -->
        <template #img>    <v-img
            class="align-end text-white"
            height="400"
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
      url: 'http://127.0.0.1:8000/api/schools/',
    }
    },
  methods:{
    listUniversity(){
        const id = this.$route.params.id;
        console.log(id);
        axios.get(this.url+id).then((response) =>{
        this.university = response.data.data
        console.log(response.data.data);
      })
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