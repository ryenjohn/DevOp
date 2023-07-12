<template>
  <div class="title-menu">
    <div>
      <h3>Find University</h3>
    </div>
  </div>
  <v-card color="#8a2be2" max-width="500" class="search-field">
    <v-card-text >
      <v-text-field
        :loading="loading"
        density="compact"
        variant="solo"
        label="Search templates"
        append-inner-icon="mdi-magnify"
        single-line
        hide-details
        @click:append-inner="onClick"
      ></v-text-field>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  data: () => ({
    loaded: false,
    loading: false,
    
  }),
  methods: {
    onClick() {
      this.loading = true;

      setTimeout(() => {
        this.loading = false;
        this.loaded = true;
      }, 2000);
    },
  },
};
</script>
<style scoped>

h3 {
  margin-top: 10px;
  display: flex;
  justify-content: flex-start;
}
.search-field{
  margin-bottom: 20px;
}

</style>
