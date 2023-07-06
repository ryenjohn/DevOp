<template>

    <card-container>
        <v-col v-for="school in listSchools"  :key="school">
        <v-sheet class=" ma-5">
              <card-info  class='card-item' >
                <template #img >
                        <v-img 
                        :src="school.img"
                        height="200px"
                        cover
                      ></v-img>
                </template>
                <template #title>
                        <v-card-text>
                            <strong>{{school.name}}</strong>
                        </v-card-text>
                        <v-card-text v-for="subject in listSubjects"  :key="subject" >
                            <strong>{{subject}}</strong>
                        </v-card-text>
                </template>
              </card-info>
        </v-sheet>
    </v-col>
    </card-container>
</template>

<script>

import axios from "axios";
export default {
  data() {
    return {
      listSchools:{},
      listSubjects:{},
      url: "http://127.0.0.1:8000/api/majors/",
    };
  },
  methods: {
    Detail() {
      const id = this.$route.params.id;
      axios.get(`http://127.0.0.1:8000/api/majors/${id}`).then((response) => {
        this.listSchools = response.data.data.schools;
        this.listSubjects = response.data.data.subjects;

        console.log(this.listSchools)
        console.log(this.listSubjects)
      });
    },
  },

  mounted() {
    this.Detail();
  },
}
</script>