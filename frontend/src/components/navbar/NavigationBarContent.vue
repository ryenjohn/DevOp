<template>
 <v-tabs>
    <router-link to="/"><v-tab>Universities</v-tab></router-link>
    <router-link to="/"><v-tab>Skills</v-tab></router-link>
    <router-link to="/"><v-tab>Workshops</v-tab></router-link>
    <router-link to="/"><v-tab>Scholarships</v-tab></router-link>
  </v-tabs>
 
    
</template>
<style scoped>
    button.v-btn.v-slide-group-item--active.v-tab--selected.v-theme--light.v-btn--density-default.v-btn--size-default.v-btn--variant-text.v-tab {
        color: white;
        background: orange;
    }
    a{
    color: rgb(32, 10, 10);
    }
</style>