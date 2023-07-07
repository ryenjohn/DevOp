<template>
  <v-tabs>
    <router-link to="/"><v-tab>Home</v-tab></router-link>
    <router-link to="/about"><v-tab>About</v-tab></router-link>
    <router-link to="/contact"><v-tab>Contact</v-tab></router-link>
  </v-tabs>
</template>
<script>
export default {
  data: () => ({}),
};
</script>

<style scoped>
button.v-btn.v-slide-group-item--active.v-tab--selected.v-theme--light.v-btn--density-default.v-btn--size-default.v-btn--variant-text.v-tab {
  color: white;
  background: orange;
}
a{
  color: white;
}
</style>
