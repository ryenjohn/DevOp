<template>
    <card-container>
        <v-col cols="12" sm="3" v-for="(scholarship, index) in scholarships" :key="scholarship">
        <v-sheet class=" ma-5">
              <card-info @click="showDetail(index)" class='card-item pa-5' >
                <template #img >
                        <v-img 
                        :src="scholarship.img"
                        height="200px"
                        cover
                      ></v-img>
                </template>
                <template #title>
                            <v-card-text>
                            <strong>{{scholarship.name}}</strong>
                          </v-card-text>
                </template>
              </card-info>
        </v-sheet>
    </v-col>
    </card-container>
</template>
<script>
// @ is an alias to /src
import axios from 'axios';
export default {
data(){
    return {
      scholarships: [],
      is_update: false,
      url: 'http://127.0.0.1:8000/api/scholarships',
    }
    },
  methods:{

    listScholarship(){
      axios.get(this.url).then((response) =>{
        this.scholarships = response.data.data
        console.log(this.scholarships)
      })
    },
    showDetail(id){
      this.$router.push("/scholarship/" + id)
    }
    },
    mounted() {
      this.listScholarship();
    },
}
</script>
<style scoped>
  .card-item{
    transition: all 0.2s ease-in-out;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;
  }
  .card-item:hover{
    transform: scale(1.05);
    border: 1px solid rgb(110, 110, 110)
  }
  .card-item:hover strong {
    color: orange;
}
</style>