<template>
  <div class="about">
    <h1>This is an about page</h1>
    <!-- <router-link to="/major">Major</router-link>| -->
    <ListMajorView :listMajor="majors"/>
    <!-- <router-link to="/majorDetail">majorDetail</router-link> -->
  </div>
</template>


<script>
import axios from 'axios';
// import MajorDetail from './components/MajorDetail.vue';
import ListMajorView from '../views/ListMajorView.vue';

export default ({
  components: {
    // MajorDetail,
    ListMajorView

  },
  data(){
    return {
      majors: [],
      showMajor:{},
      is_update: false,
      url: 'http://127.0.0.1:8000/api/majors',
    }
  },
  methods:{

    getMajorDetail(){
      const bookId = 1;
      axios.get(this.url).then((response) =>{
        this.showMajor = response.data.data[bookId-1]
        this.majors = response.data.data
        console.log(this.majors)
      })
    },

  },
  mounted() {
    this.getMajorDetail();
  }
})
</script>

