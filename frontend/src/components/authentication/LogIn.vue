// copy from vutity
<template>
  <div class="container">
    <div class="image">
      <img
        src="../../assets/images/register.png"
        style="width: 100%; height: initial"
        alt="Image description"
      />
    </div>
    <div class="form-container">
      <form>
        <h1>Log in</h1>
        <v-text-field
          class="err"
          v-model="state.email"
          :error-messages="v$.email.$errors.map((e) => e.$message)"
          required
          density="compact"
          placeholder="Enter your email"
          prepend-inner-icon="mdi-email"
          variant="outlined"
          color="#634B7A"
          @input="v$.email.$touch"
          @blur="v$.email.$touch"
        ></v-text-field>

        <v-text-field
          class="err"
          :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'"
          color="#634B7A"
          :type="visible ? 'text' : 'password'"
          density="compact"
          placeholder="Enter your password"
          prepend-inner-icon="mdi-lock-outline"
          variant="outlined"
          @click:append-inner="visible = !visible"
          v-model="state.password"
          :error-messages="
            v$.password.$errors.map((e) =>
              e.$params.custom
                ? e.$params.custom.message
                : 'Value required and should contain uppercase, lowercase, number, sign and more than 8 characters'
            )
          "
          @input="
            v$.password.$touch;
            resetIncorrectPasswordError();
          "
          @blur="v$.password.$touch"
        ></v-text-field>
        <p v-if="state.incorrectPasswordError" class="text-error">
          Incorrect email or password. Please try again.
        </p>
        <p class="forgot-password">
          <!-- <router-link to="/">Forgot password</router-link> -->
          <router-link to="/sendMail">Forgot password</router-link>

        </p>
        <div class="btn">
          <div>
            <div v-if="v$.$invalid">
              <v-btn class="me-4" @click="v$.$touch()">Log in</v-btn>
            </div>
            <div v-else class="sign-in">
              <v-btn class="me-4"  @click="logIn" v-if="state.incorrectPasswordError==false">
                <router-link class="link-log-in" to='/' > log in</router-link>
              
              </v-btn>
              <v-btn class="me-4" v-else @click="logIn" >log in</v-btn>
            </div>
          </div>
          <p class="log-in">
            Have not an account?<router-link to="/signUp">Sign up</router-link>
          </p>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  methods:{
    backhome(){
      console.log('yes')
      return this.router.push('/');
    }
  }
}
</script>
<script setup>
import { reactive } from "vue";
import { useVuelidate } from "@vuelidate/core";
import { email, required, minLength } from "@vuelidate/validators";
import Cookies from "js-cookie";
import axios from "axios";

const initialState = {
  email: "",
  password: "",
  emailTakenError: false,
  visible: false,
  incorrectPasswordError: false,
};
const state = reactive(Object.assign({}, initialState));

// Set role for password
const passwordRule = (value) => {
  const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}|:"<>?~`]).{8,}$/;
  const result = regex.test(value);
  return result;
};

// Rule for email password
const rules = {
  email: { required, email },
  password: { required, minLength: minLength(8), custom: passwordRule },
};

// Clear validation when input correct
const v$ = useVuelidate(rules, state);
function clear() {
  for (const [key, value] of Object.entries(initialState)) {
    state[key] = value;
  }
  v$.value.$reset();
}
// Insert data into dabase
async function logIn() {
  try {
    const data = {
      email: state.email,
      password: state.password,
    };
    // Make an API call to add data to the database
    const response = await axios.post(`${ process.env.VUE_APP_API_URL}logIn`, data);
    console.log(response)
    // Check the server response and alert the user accordingly
    if (response.status === 200) {
      Cookies.set("userData", JSON.stringify(response.data), { expires: 30 });
      clear();
    }
  } catch (error) {
    state.incorrectPasswordError = true;
  }
  
}
// Add this event handler to the password field to hide the error message
function resetIncorrectPasswordError() {
  state.incorrectPasswordError = false;
}
</script>
<!-- style for sign up form -->
<style scoped>
.container {
  display: flex;
}
.image {
  flex: 1;
}
.image img {
  max-width: 90%;
  height: auto;
}
.btn {
  display: flex;
}
h1 {
  margin-bottom: 4%;
  margin-top: 3%;
  text-align: center;
}
.log-in {
  margin-bottom: 2%;
  margin-left: 40%;
  margin-top: 8%;
}
.err {
  text-align: start;
}
.text-error {
  color: red;
  font-size: 14px;
  margin-top: -15px;
}
label {
  color: #634b7a;
}
.form-container {
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
  background-color: #fff;
  margin-right: 6%;
  margin: 6%;
  flex: 1;
  padding: 2%;
  border-radius: 10px;
}
.btn > div > div > button {
  background-color: #634b7a;
  color: #f6eeee;
  margin-left: 4px;
  margin-top: 20px;
}
.link-log-in {
  color: #fff;
  background-color: #634b7a;
  text-decoration: none;
}
</style>
