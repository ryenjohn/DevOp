<template>
  <section>
    <nav>
      <router-link to="/">University</router-link> |
      <router-link to="/skill">Skill</router-link> |
      <router-link to="/workshop">Workshop</router-link> |
      <router-link to="/scholarship">Scholarship</router-link> |
      <router-link to="/signUp">sign up</router-link>
    </nav>
    <router-view/>
  </section>
</template>
<script>
</script>
<style>
:root {
  --main-color: #ffff;
  --main-color-light: #e21ee9;
  --secondary-color: orange;
}
* {
  box-sizing: border-box;
}

html {
  font-family: 'Roboto', sans-serif;
}

body {
  margin: 0;
  background: var(--main-color);
}

.right-main-button {
  float: right;
  margin-right: 2rem;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
