<template>

 <title-text v-if='datas!=null && datas!=""'>Choose {{dataname}}</title-text>
      <div class="container mt-10 mb-10" v-for="(data) in datas" :key="data.id">
        <div v-if="isNotExpired(data)" class="card" >
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
                
                  <button v-if="dataname=='workshops'" @click="checkLoginStatus; "><register-account-popup  :workshop_id="data.id"></register-account-popup></button>
                  <button v-if="dataname=='scholarships'">Apply</button>
                </div>
              </div>
          </div>
        </div>
      </div>
 
</template>

<script>
import Cookies from 'js-cookie';
    export default{
      props:{datas:Array,dataname:String},
      data() {
    return {
      isLoggedIn: false,
      userId: '',
    };
  },
    mounted() {
    this.setUser();
  },
  methods: {
    setUser() {
      const userData = Cookies.get('userData');
      if (userData) {
        const userDataObj = JSON.parse(userData);
        this.userId = userDataObj.data.id;
      }
    },
    checkLoginStatus() {
      if (this.userId) {
        this.isLoggedIn = true;
      } 
    },
    joinWorkshop(id){
      console.log(id);
    },
    isNotExpired(data) {
      const endDate = new Date(data.expired_date);
      const today = new Date();
      return endDate >= today;
    },
  },
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
  }
  .text-h5{
  color: orange;
  }
  .text{
  color: #634b7a;
  }
  p{
  color: white;
  background-color: purple;
  padding: 5px;
  width: 70px;
  text-align: center;
  border-radius: 5px;
  margin-bottom: 25%;
  margin-right: 15%;
}
  
</style>