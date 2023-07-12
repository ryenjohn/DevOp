<template>
    <div class="container">

    <div class="form-container">
        <div class="image">
        <img
            src="../../assets/images/forgotPassword.png"
            style="width: 100%; height: initial"
            alt="Image description"
        />
        
        </div>
        <form @submit.prevent='submit'>
        <h1>Forgot password</h1>
            <p class="text-reset">
            Please enter your Email
            </p>
        <v-text-field
            class="err"
            v-model="email"
            required
            density="compact"
            placeholder="Enter your email"
            prepend-inner-icon="mdi-email"
            variant="outlined"
            color="#634B7A"
        ></v-text-field>
        <div class="btn">
            <div class="reset">
            <v-btn class="me-4 send-email" @click="getMail()"  type="submit">Send</v-btn>
            </div>
    
        </div>
        </form>
    </div>
    </div>
</template>

<script>
import axios from 'axios'
export default{
  data(){
    return{
      email: '',
      errors: null,
      url:'http://127.0.0.1:8000/api/sendMail'

    }
  },
  methods:{
    
    getMail() {
      axios.post(this.url,{email:this.email}).then((response)=>{
        console.log(response);
      })
    }
  }
}
</script>

<style scoped>
.container{
    display: flex;
    justify-content: center;
    width: 70%;
    align-items: center;
    align-self: center;
}
h1 {
  margin-bottom: 25px;
  margin-top: -5px;
  text-align: center;
}
label {
  color: #634b7a;
}
.image {
  flex: 1;
}
.image img {
  max-width: 90%;
  height: auto;
}
.text-reset{
    margin-left: 20%;
    margin-top: 35px;
}
.form-container {
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
  background-color: #fff;
  flex: 1;
  padding: 35px;
  margin-top: 40px;
  border-radius: 10px;
  justify-content: center;
  align-self: center;
  display: flex;

}
.send-email{
    background-color: #634b7a;
    color: #f6eeee;
    margin-left: 4px;
    margin-top: 15px;
    width: 40px;
}
.error {
  color: red;
  margin-top: 10px;
}

form{
    padding: 20px;
    width: 30%;
}
</style>