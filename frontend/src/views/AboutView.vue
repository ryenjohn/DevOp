<template>
  <div class="about">
    <h1>This is an about page</h1>
    <ListMajorView :listMajor="majors"/>
  </div>
</template>


<script>
import axios from 'axios';
import ListMajorView from '../views/ListMajorView.vue';

export default ({
  components: {
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

    listMajor(){
      axios.get(this.url).then((response) =>{
        this.showMajor = response.data.data
        this.majors = response.data.data
        console.log(this.majors)
      })
    },

  },
  mounted() {
    this.listMajor();
  }
})
</script>

