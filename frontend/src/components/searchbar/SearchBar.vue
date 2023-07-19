<template>
    <div class="search-input">
      <v-toolbar  color="primary" rounded="" height="74"  flat>
        <v-text-field class="input"
          v-model="searchKey"
          clearable
          hide-details
          label="Search skill, city or province"
          prepend-inner-icon="mdi-magnify"
          single-line
        ></v-text-field>
      </v-toolbar>
    </div>
    <v-list >
      <v-list-item
        v-for="(item, i) in searching"
        :key="i" link>
        <div v-text="item"></div>
      </v-list-item>
    </v-list>
</template>
<script>
// import axios from 'axios'
  export default {
    data: () => ({
      items: [],
      searchKey: '',
    }),
    watch: {
      searchKey () {
        this.$emit('searchKey',this.searchKey)
      },
    },

  }
</script>
<style scoped>
  .search-input{
    margin: 4%;
    width: 50%;
    margin-top: 10px;
    margin-bottom: 10px;
  }
  .input{
    padding: 10px;
  }
</style>
