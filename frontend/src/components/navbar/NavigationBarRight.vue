<template>
  <div class="sidebarleft">
    <v-tabs>
      <router-link to="/signUp"><v-tab>SignUp</v-tab></router-link>
      <router-link to="/signUp"><v-tab>SignIn</v-tab></router-link>
    </v-tabs>
    <div class="icon">
      <v-icon size="large" color="light" icon="mdi-bell"></v-icon>
    </div>
    
  </div>
</template>
<script>
export default {
  data: () => ({}),
};
</script>

<style>
.sidebarleft {
  display: flex;
  justify-content: center;
  align-items: center;
}
.icon {
  margin-right: 20px;
  margin-left: 20px;
}
::before {
    color: white;
}
a {
  color: white;
}

</style>
