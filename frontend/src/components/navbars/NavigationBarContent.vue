<template>
 <v-tabs class="category">
    <v-tab @click="contentData('schools')">Universities</v-tab>
    <v-tab @click="contentData('majors')">Skills</v-tab>
    <v-tab @click="contentData('workshops')">Workshops</v-tab>
    <v-tab @click="contentData('scholarships')">Scholarships</v-tab>
  </v-tabs>
  <content-list v-if='dataname!="scholarships" && dataname!="workshops" ' :datas="datas" :dataname='dataname' ></content-list>
 <scholarship-workshop-card v-else  class="mt-10" :datas="datas" :dataname='dataname'></scholarship-workshop-card>
</template>
<script>
import axios from 'axios'
// import api_base from '../../router/api.js'
export default {
  data(){
    return{
       university:false,
       skill:false,
       scholarship:false, 
       workshop:false,
       datas:[],
       dataname:'schools'

    }
  },
  methods:{
    contentData(dataName){
      this.dataname=dataName
      axios.get(`${ process.env.VUE_APP_API_URL}${dataName}`).then((response)=>{
        this.datas = response.data.data
        console.log(this.datas)
      })
    }
  },
  mounted(){
    axios.get(`${ process.env.VUE_APP_API_URL}schools`).then((response)=>{
        this.datas = response.data.data
      })
  }
}
</script>
<style scoped>
    button.v-btn.v-slide-group-item--active.v-tab--selected.v-theme--light.v-btn--density-default.v-btn--size-default.v-btn--variant-text.v-tab {
        color: white;
        background: orange;
    }
    a{
    color: rgb(32, 10, 10);
    }
    .category{
      margin-left:50px;
      margin-top: 10px;
    }
</style>