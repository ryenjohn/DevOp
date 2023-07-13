<template>
  <v-card>
    <v-layout>
      <v-navigation-drawer style="height: 300px" class="sidebar" color="purple">
        <v-list>
          <v-list-item
            prepend-avatar="https://i.pinimg.com/564x/4a/61/d8/4a61d8c53b8a1219b0bd7319c5eb8b69.jpg"
            subtitle="sandra_a88@gmailcom">
          </v-list-item>
        </v-list>

        <v-divider style="height: 300px"></v-divider>

        <v-list density="compact" nav>
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
      margin-top: 5%;
    }
</style>
