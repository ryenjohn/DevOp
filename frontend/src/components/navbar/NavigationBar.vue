<template>
  <v-card>
    <div class="navbar">
      <v-toolbar-title>
        <navigationbar-link></navigationbar-link>
      </v-toolbar-title>
      <navigationbar-right></navigationbar-right>
    </div>
  </v-card>
</template>
<script></script>

<style scoped>
.navbar {
  display: flex;
  justify-content: start;
  align-items: center;
  background-color: blueviolet;
  padding: 5px;
  position: fixed;
  top: 0;
  width: 100%;
}
</style>
