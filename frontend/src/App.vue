<template>
  <navigation-bar @submit.delete="submitLogOut"></navigation-bar>
  <router-view></router-view>
  <footer-bar></footer-bar>
</template>
<script>


</script>
<style scoped> 
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
