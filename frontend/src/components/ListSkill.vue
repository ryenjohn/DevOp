<template>
    <card-container>
      <v-col v-for="(major, index) in majors"  :key="index" >
        <v-sheet class="ma-5 ">
              <card-info :to="`/skill/${major.id}`" class="card-item">
                <template #img>
                        <v-img
                        :src="major.image"
                        height="200px"
                        cover
                      ></v-img>
                </template>
                <template #title>
                            <v-card-text>
                              <strong>{{major.description}}</strong>
                          </v-card-text>
                </template>
              </card-info>
        </v-sheet>
      </v-col>
    </card-container>
</template>

<script>
import axios from 'axios';

export default ({

  data(){
    return {
      majors: [],
      is_update: false,
      url: 'http://127.0.0.1:8000/api/majors',
    }
  },
  methods:{

    listMajor(){
      axios.get(this.url).then((response) =>{
        this.majors = response.data.data
      })
    },

  },
  mounted() {
    this.listMajor();
  }
})
</script>
<style scoped>
  .card-item{
    transition: all 0.2s ease-in-out;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;
  }
  .card-item:hover{
    transform: scale(1.05);
    border: 1px solid rgb(110, 110, 110)
  }
  .card-item:hover strong {
    color: orange;
}
</style>