<template>
  <v-card>
    <v-card-title>
      <h3>Find University</h3>
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      search: "",
    };
  },
};
</script>
<style>
  h3{
    display: flex;
    
    justify-content: flex-start;
  }
</style>
