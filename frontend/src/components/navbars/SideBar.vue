<template>
  <v-card class="card"  >
    <v-layout>
      <v-navigation-drawer style="height: 700px" class="sidebar" >

        <v-divider style="height: 300px"></v-divider>

        <v-list density="compact" class="mt-10" nav>
          <v-list-item  @click="changedata('students')" prepend-icon="mdi-account-school"  title="Students" value="Students"></v-list-item>
          <v-list-item  @click="changedata('managers')" prepend-icon="mdi-school" title="University" value="University"></v-list-item>
  
         
        </v-list>
      </v-navigation-drawer>

      <v-main></v-main>
    </v-layout>
  </v-card>
</template>

<script>
  export default {
    methods:{
      changedata(dataname){
        return this.$emit("dataname",dataname);
      }
    }
  }
</script>

<style  scoped>
    .sidebar{
      margin-top: 3.5%;
      background: blueviolet;
      color: white;
    }
</style>
