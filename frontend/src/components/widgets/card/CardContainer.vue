<template>
  <v-container class="pa-2">
    <v-row
      class="mb-4"
      no-gutters
    >
    <slot></slot>
    </v-row>
  </v-container>
</template>
<script>
export default {
  methods:{
      showDetail(Id){
        this.$router.push('/university/'+Id);
        }
  }
}
</script>