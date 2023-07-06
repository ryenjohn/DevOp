<template>
    <card-container>
        <v-col v-for="index of 4" :key="index">
        <v-sheet class="ma-5">
              <card-info @click="showDetail(index)" >
                <template #img>
                        <v-img
                        src="https://lh5.googleusercontent.com/p/AF1QipOZYrRjXSe_d6OrkvLJRdQXjhbGp8EmhLwhyh-n=w408-h305-k-no"
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
      this.$router.push("/university/" + id)
    }
  }
}
</script>