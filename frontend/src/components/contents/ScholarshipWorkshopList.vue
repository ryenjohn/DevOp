<template>

 <title-text v-if='datas!=null && datas!=""'>Choose {{dataname}}</title-text>
  <div class="container mt-10 mb-10"  v-for="(data) in datas" :key="data" >
    <div class="card" >
      <div class="image">
         <img :src="data.image" alt="">
      </div>
      <div class="text">
          <div class="detail">
            <div>
                <v-card-text>
                    <strong>{{data.name}}</strong>
                </v-card-text>
                <h4>{{data.description}}</h4>
            </div>
            <div class="btn">
              <button v-if="dataname=='workshops'">Join</button>
              <button v-if="dataname=='scholarships'">Apply</button>
            </div>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default{
      props:{datas:Array,dataname:String},

    }
</script>

<style scoped>
  .container{
    display: flex;
    justify-content: center;
  }
  .card{
    width:92%;
    height: 30vh;
    display: flex;
    justify-content: center;
    background:rgb(194, 194, 194);
  }
  .text{
    display: flex;
    justify-content: center;
    width:40%;
    padding: 10px;
  }
  img{
    width:80%;
    height: 100%;
  }
  .image{
    width:60%;
  }
  .detail{
    display: flex;
    width:100%;
    justify-content: space-between;
  }
  .btn{
    display: flex;
    flex-direction: column;
    justify-content:end;
  }
  button{
    padding:10px 20px 10px 20px;
    border-radius:20px;
    border:none;
    color:white;
    background:orange;
  }
</style>