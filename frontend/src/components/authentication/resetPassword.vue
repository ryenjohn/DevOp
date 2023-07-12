<template>
  <div class="form-container">
    <form >
      <h1>Change password</h1>
        <p class="text-reset">
          Please input password  from email
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
       <v-text-field
          class="err"
          v-model="password"
          :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'"
          color="#634B7A"
          :type="visible ? 'text' : 'password'"
          density="compact"
          placeholder="Enter your password"
          prepend-inner-icon="mdi-lock-outline"
          variant="outlined"
        ></v-text-field>
      <div class="btn">
        <div class="reset">
          <v-btn to="/changePassword" class="me-4 send-email" @click="resetPassword()" type="submit">Send</v-btn>
          <!-- <router-link to="/resetPassword">Send</router-link> -->
        </div>
 
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios'

export default{
  data(){
    return{
      email: '',
      password: '',
      errors: null,
      url:'http://127.0.0.1:8000/api/resetPassword'

    }
  },
  methods:{
    resetPassword() {
      axios.patch(this.url, {email:this.email,password:this.password}).then((response)=>{
        console.log(response);
        this.$router.push('/')
      })
    }
  }
}
</script>

<style scoped>

h1 {
  margin-bottom: 25px;
  margin-top: -5px;
  text-align: center;
}
label {
  color: #634b7a;
}
.text-reset{
    margin-left: 20%;
    margin-top: 35px;
}
.form-container {
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
  background-color: #fff;
  margin: auto;
  flex: 1;
  padding: 35px;
  margin-top: 40px;
  border-radius: 10px;
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
</style>