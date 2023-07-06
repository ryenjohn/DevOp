<template>
    <v-card
      class="mx-auto "
      max-width="344"
    >
      <slot name="img">

      </slot>
      
      <slot name="title"></slot>
    </v-card>
</template>
<script>
  export default {
    data: () => ({
      show: false,
    }),
  }
</script>