<template>
  <v-btn
    v-for="icon in icons"
    :key="icon"
    class="mx-4"
    :icon="icon"
    variant="text"
  ></v-btn>
</template>

<script>
export default {
  data: () => ({
    icons: ["mdi-facebook", "mdi-linkedin", "mdi-instagram", "mdi-twitter"],
  }),
};
</script>
<style>
img {
  height: 100px;
  width: 100px;
}
</style>
