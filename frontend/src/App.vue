<template>
  <nav>
    <!-- <MajorDetail :majorDetail="showMajor"/>
    <ListMajorView :listMajor="majors"/> -->
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>|
    <!-- <router-link :majorDetail="showMajor"  to="/majorDetail">majorDetail</router-link>|
    <router-link to="/major">Major</router-link>| -->
  </nav>
 
  <router-view/>
</template>
<script>
// import axios from 'axios';
// import MajorDetail from './components/MajorDetail.vue';
// import ListMajorView from './components/ListMajorView.vue';

// export default ({
//   // components: {
//   //   MajorDetail,
//   //   ListMajorView

//   // },
//   data(){
//     return {
//       majors: [],
//       showMajor:{},
//       is_update: false,
//       url: 'http://127.0.0.1:8000/api/majors',
//     }
//   },
//   methods:{

//     getMajorDetail(){
//       const bookId = 1;
//       axios.get(this.url).then((response) =>{
//         this.showMajor = response.data.data[bookId-1]
//         this.majors = response.data.data
//         console.log(this.majors)
//       })
//     },

//   },
//   mounted() {
//     this.getMajorDetail();
//   }
// })
</script>

<style>

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  background: #634B7A;
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
