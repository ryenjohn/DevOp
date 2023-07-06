<template>
    <card-container>
        <v-col v-for="index of 4" :key="index">
        <v-sheet class="ma-5 ">
              <card-info class="card-item" @click="showDetail(index)">
                <template #img>
                        <v-img
                        src="https://blog-consumer.glassdoor.com/app/uploads/sites/2/GoogleDrive_information-technology-skills.jpg"
                        height="200px"
                        cover
                      ></v-img>
                </template>
                <template #title>
                            <v-card-text>
                              <strong>Top western road trips</strong>
                          </v-card-text>
                </template>
              </card-info>
        </v-sheet>
    </v-col>
    </card-container>
</template>
<script>
// @ is an alias to /src
export default {
  methods:{
    showDetail(id){
      this.$router.push("/skill/" + id)
    }
  }
}
</script>
<style scoped>
  .card-item{
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;
  }
</style>