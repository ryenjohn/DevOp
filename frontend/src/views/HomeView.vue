<template>
  <hidede-limiter class="mt-5"></hidede-limiter>
  <search-bar @searchKey="searchKey"></search-bar>
  <navigationbar-content @contentData="contentData" :datas="datas"></navigationbar-content>

</template>

<script>
  import axios from 'axios'
  export default {
    data(){
      return{
        datas:[],
        url:'http://127.0.0.1:8000/api/',
        dataname:'schools',
        isSearch:false,
        key:''
      }
    },
    methods:{
      contentData(dataName){
          this.dataname=dataName
          axios.get(this.url+dataName).then((response)=>{
            this.datas = response.data.data
           
          })
        
      },
      defaultData(){
          axios.get(this.url+'schools').then((response)=>{
            this.datas = response.data.data
           
          })
      },
      searchdata(){
        axios.get(`http://127.0.0.1:8000/api/schools/address/${this.key}`)
        .then((res)=>{
          this.datas = res.data.data
          })
      },
      searchKey(key){
        this.key=key
        this.isSearch = true
        this.searchdata()
    
      }
    },
    mounted(){
      this.defaultData()
    }
  }
</script>
