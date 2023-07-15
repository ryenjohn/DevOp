<template>
  <v-card class="search-input">
    <v-toolbar color="primary"  height="88"  flat>
      <v-text-field class="input"
        v-model="searchKey"
        clearable
        hide-details
        label="Search News"
        prepend-inner-icon="mdi-magnify"
        single-line
      ></v-text-field>
    </v-toolbar>

    <v-list >
      {{ searching }}
      <v-list-item
        v-for="(item, i) in searching"
        :key="i" 
 
        link>
        <div v-text="item"></div>
      </v-list-item>
    </v-list>
  </v-card>
</template>
<script>
import axios from 'axios'
  export default {
    data: () => ({
      items: [],
      searchKey: '',
    }),
    methods: {
      searchName(){
        axios.get(`http://127.0.0.1:8000/api/schools/address/${this.searchKey}`)
        .then((res)=>{
            console.log(res)
      })
      },
    },
    watch: {
      searchKey () {
        this.$emit('searchKey',this.searchKey)
      },
    },

  }
</script>
<style scoped>
  .search-input{
    margin-right: 10%;
    width: 50%;
    margin-top: 10px;
  }
  .input{
    padding: 10px;
  }
</style>
