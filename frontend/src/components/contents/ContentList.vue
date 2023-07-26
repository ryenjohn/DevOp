<template>
  
  <title-text v-if='datas!=null && datas!=""' >Choose {{dataname}}</title-text>
  <card-container >
        <v-col cols="12" sm="3" v-for="(data, index) in datas" :key="data.id">

          <v-sheet class=" ma-8">
                <card-info class='card-item' :to="{name: 'detail', params: { id: index+1,dataname:dataname}}"   >
                  <template #img >
                          <v-img 
                          :src="data.image"
                          height="150px"
                          cover
                        ></v-img>
                  </template>
                  <template #title>
                              <v-card-text>
                              <h3>{{data.work_shop}}</h3>
                            </v-card-text>
                  </template>
                </card-info>
          </v-sheet>
       </v-col>
  </card-container>
</template>

<script>
    export default{
      props:{datas:Array,dataname:String},
     
    }
</script>
<style>
  h3{
    text-align: center;
  }
</style>
