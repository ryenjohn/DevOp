<template>
  <v-card class="card"  >
    <v-layout>
      <v-navigation-drawer style="height: 700px; width:14%" class="sidebar" >
        <v-divider style="height: 300px"></v-divider>
        <v-list density="compact" class="" nav>
          <div v-if="this.$route.name!='admin'">
            <v-list-item  @click="changedata('students')" prepend-icon="mdi-account-school"  title="Students" value="Students"></v-list-item>
            <v-list-item  @click="changedata('workshops')" prepend-icon="mdi-hammer-wrench"  title="Workshop" value="Workshop"></v-list-item>
            <v-list-item  @click="changedata('scholaship')" prepend-icon="mdi-school-outline"  title="Scholarship" value="Scholarship"></v-list-item>
            <v-list-item  @click="changedata('students')" prepend-icon="mdi-format-list-bulleted"  title="Majors" value="Majors"></v-list-item>
          </div>
          <div v-else>
            <v-list-item  @click="changedata('users')" prepend-icon="mdiAccount"  title="All Users" value="Users"></v-list-item>
            <v-list-item  @click="changedata('students')" prepend-icon="mdi-account-school"  title="Students" value="Students"></v-list-item>
            <v-list-item  @click="changedata('managers')" prepend-icon="mdi-school" title="University" value="University"></v-list-item>
         </div>
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
      margin-top: 4.5%;
      background: blueviolet;
      color: white;
    }
</style>
