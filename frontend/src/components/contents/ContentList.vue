<template>

    <card-container>
        <v-col cols="12" sm="3" v-for="(data, index) in datas" :key="data">
        <v-sheet class=" ma-5">
       
              <card-info class='card-item pa-5' :to="{ name: 'detail', params: { id: index+1,dataname:dataname}}"   >
                <template #img >
                        <v-img 
                        :src="data.img"
                        height="200px"
                        cover
                      ></v-img>
                </template>
                <template #title>
                            <v-card-text>
                            <strong>{{data.name}}</strong>
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
