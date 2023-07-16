<template>
  <div class="form-container">
    <div class="image">
      <img
          src="../../assets/images/forgotPassword.png"
          style="width: 100%; height: initial"
          alt="Image description"
      /> 
    </div>
    <form >
      <h1>Change password</h1>
      <p class="text-reset">
        Please input email and new password
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
        v-model="password"
        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
        :rules="[rules.required, rules.min]"
        :type="show1 ? 'text' : 'password'"
        name="input-10-1"
        label="Normal with number, sign, text"
        hint="At least 8 characters"
        variant="outlined"
        color="#634B7A"
        counter
        density="compact"

        @click:append="show1 = !show1"
      ></v-text-field>
      <div class="btn">
        <div class="reset">
          <v-btn to="/changePassword" class="me-4 send-email" @click="resetPassword()" type="submit">Send</v-btn>
        </div>
 
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios'
// import api_base from '../../router/api.js'

export default{

  data(){
    return{
      email: '',
      password: '',
      errors: null,
     

      show1: false,
      rules: {
        required: value => !!value || 'Required.',
        min: v => v.length >= 8 || 'Min 8 characters',
        emailMatch: () => ('The email and password you entered don\'t match'),
      },
    }
  },
  methods:{
    resetPassword() {
      axios.patch(`${ process.env.VUE_APP_API_URL}resetPassword`, {email:this.email,password:this.password})
      .then((response)=>{
        console.log(response);
        this.$router.push('/')
      })

      return "BAD"
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
.image {
  flex: 1;
}
.image img {
  max-width: 90%;
  height: auto;
}

.form-container {
  width: 70%;
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
  background-color: #e7e9e3;
  flex: 1;
  padding: 35px;
  margin: 40px 0px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  margin-left: 15%;
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
  width: 50%;
  background-color: #e1e4dba9;

}
</style>