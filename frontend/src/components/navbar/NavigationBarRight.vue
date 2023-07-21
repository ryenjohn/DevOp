<template>
  <div class="sidebarleft">
    <div class="icon">
      <v-icon size="large" color="light" icon="mdi-bell"></v-icon>
    </div>
    <v-avatar>
      <v-img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John"></v-img>
    </v-avatar>
  </div>
</template>
<script>
export default {
  data: () => ({}),
};
</script>

<style scoped>
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
