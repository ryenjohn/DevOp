// copy from register form
<template>
        <v-container> 
        <div class="container">
          <div class="image">
            <img 
              src="https://img.freepik.com/premium-vector/happy-graduated-students-illustration_179970-1004.jpg?w=996"
              style="width: 600px; height: 500px"
              alt="Image description"
            />
        </div>
      <div class="form-container">
        <form style="height: 800px;">
          <h1>Join Our University</h1>

          <!-- name -->
          <v-text-field
            class="err"
            v-model="state.name"
            :error-messages="v$.name.$errors.map((e) => e.$message)"
            :counter="10"
            density="compact"
            placeholder="Enter your name"
            prepend-inner-icon="mdi-account"
            variant="outlined"
            color="#634B7A"
            required
            @input="v$.name.$touch"
            @blur="v$.name.$touch"
          ></v-text-field>

          <!-- gender -->
          <v-container fluid class="d-flex">
              <v-checkbox class="selectbox"
                v-model="state.selected"
                label="Female"
                value="Female"
                @input="v$.selected.$touch"
                @blur="v$.selected.$touch"
              ></v-checkbox>
              <v-checkbox class="selectbox male"
                v-model="state.selected"
                label="Male"
                value="Male"
                @input="v$.selected.$touch"
                @blur="v$.selected.$touch"
              ></v-checkbox>
          </v-container>
 
          <!-- date -->
          <!-- https://www.youtube.com/watch?v=q5TP2XygqUw -->
          <div class="date">
            <label for="">Enter your birthdate : </label>
            <input type="date" v-model="mydate">
          </div>
       
          <!-- email -->
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
          <p v-if="state.emailTakenError" class="text-error">
            Email is already taken.
          </p>

          <!-- password -->
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
            @input="v$.password.$touch"
            @blur="v$.password.$touch"
          ></v-text-field>

          <!-- phone number -->
          <v-text-field
            class="err"
            color="#634B7A"
            :type="visible ? 'text' : 'phone_number'"
            density="compact"
            placeholder="Enter your phone number"
            prepend-inner-icon="mdi-phone-outline"
            variant="outlined"
            @click:append-inner="visible = !visible"
            v-model="state.phone_number"
            :error-messages="
              v$.phone_number.$errors.map((e) =>
                e.$params.custom
                  ? e.$params.custom.message
                  : 'Value required and should contain only number, between 9 and 10 degit'
              )
            "
            @input="v$.phone_number.$touch"
            @blur="v$.phone_number.$touch"
          ></v-text-field>

          <!-- address -->
          <v-text-field
            class="err"
            color="#634B7A"
            :type="visible ? 'text' : 'address'"
            density="compact"
            placeholder="Enter your address"
            prepend-inner-icon="mdi-home-outline"
            variant="outlined"
            @click:append-inner="visible = !visible"
            v-model="state.address"
            :error-messages="
              v$.address.$errors.map((e) =>
                e.$params.custom
                  ? e.$params.custom.message
                  : 'Your address should contain your province'
              )
            "
            @input="v$.address.$touch"
            @blur="v$.address.$touch"
          ></v-text-field>

          <!-- choose major -->
          <v-select
            label="Select Major"
            :items="['IT', 'Engineering', 'Architecture ', 'Accounting', 'IFL', 'Food Chemistry']"
            class="err"
            color="#634B7A"
            :type="visible ? 'text' : 'major'"
            density="compact"
            placeholder="Choose your major"
            prepend-inner-icon="mdi-tools"
            variant="outlined"
            @click:append-inner="visible = !visible"
            v-model="state.major"
            :error-messages="
              v$.major.$errors.map((e) =>
                e.$params.custom
                  ? e.$params.custom.message
                  : 'Choose your major'
              )
            "
            @input="v$.major.$touch"
            @blur="v$.major.$touch"
          ></v-select>

          <!-- Education level -->
          <v-select
            label="Enter you education level"
            :items="['High school diploma','Associate degree','Bachelor degree']"
            class="err"
            color="#634B7A"
            :type="visible ? 'text' : 'Education levelEducation level'"
            density="compact"
            placeholder="Enter your education level"
            prepend-inner-icon="mdi-school-outline"
            variant="outlined"
            @click:append-inner="visible = !visible"
            v-model="state.education_level"
            :error-messages="
              v$.education_level.$errors.map((e) =>
                e.$params.custom
                  ? e.$params.custom.message
                  : 'Enter your education level'
              )
            "
            @input="v$.education_level.$touch"
            @blur="v$.education_level.$touch"
          ></v-select>
          
          <!-- check box -->
          <v-checkbox
            class="err"
            v-model="state.checkbox"
            :error-messages="v$.checkbox.$errors.map((e) => e.$message)"
            label="Do you agree?"
            required
            @change="v$.checkbox.$touch"
            @blur="v$.checkbox.$touch"
          ></v-checkbox>

          <div class="btn d-flex justify-space-between">
            <div class="btn">
                <v-btn class="btnone"
                  color="purple-darken-1"
                  variant="text"
                  @click="dialog = false; clear()">
                  Cancel
                  </v-btn>
            </div>
            <div class="btn">
              <div class="btn" v-if="v$.$invalid">
                <v-btn class="me-4" @click="v$.$touch()">Submit</v-btn>
              </div>
              <div v-else class="sign-in">
                <v-btn class="me-4" @click="singIn">
                  <router-link class="link-sign-up" to="/"
                    >Create</router-link>
                  </v-btn>
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>
    </v-container>
</template>


<script>
  export default {
    data() {
      return {
        selected: '',
        mydate: null,
      }
    }   
}


</script>
<script setup>
import { reactive } from "vue";
import { useVuelidate } from "@vuelidate/core";
import { email, required, minLength } from "@vuelidate/validators";
import axios from "axios";
import Cookies from "js-cookie";

const initialState = {
  name: "",
  selected: "",
  mydate: "",
  major: "",
  education_level: "",
  email: "",
  checkbox: null,
  password: "",
  phone_number:"",
  address:"",
  emailTakenError: false,
  visible: false,
};
const state = reactive(Object.assign({}, initialState));
// Set role for password
const passwordRule = (value) => {
  const regex =
    /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}|:"<>?~`]).{8,}$/;
  const result = regex.test(value);
  return result;
};
// https://poe.com/Sage
const phone_number = (value) => {
  const regex = /^\d{9,10}$/;
  const result = regex.test(value);
  return result;
};
// Rule for name email password
const rules = {
  name: { required, minLength: minLength(3) },
  selected: {required},
  mydate: {required},
  major: {required},
  education_level: {required},
  email: {
    required,
    email,
    async unique() {
      const response = await axios.get('http://127.0.0.1:8000/api/users');
      // compare new data email with data in database
      const datas = response.data.data;
      const emailExists = datas.some((data) => data.email === state.email);
      state.emailTakenError = emailExists;
    },
  },
  password: { required, minLength: minLength(10), custom: passwordRule },
  phone_number: {required, custom: phone_number},
  address: {required},
  checkbox: { required },
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
async function singIn() {
  try {
    const data = {
      name: state.name,
      mydate: state.mydate,
      major: state.major,
      education_level: state.education_level,
      email: state.email,
      checkbox: state.checkbox,
      password: state.password,
      phone_number: state.phone_number,
      address: state.address
    };
    // Make an API call to add data to the database
    const response = await axios.post("http://127.0.0.1:8000/api/users", data);
    Cookies.set("userData", JSON.stringify(response.data.token), {
      expires: 10,
    });

    // Check the server response and alert the user accordingly
    if (response.status === 200) {
      clear();
    } else {
      alert("Failed to singIn the form");
    }
  } catch (error) {
    console.error(error);
  }
}
</script>

<style scoped>
.date{
  border: 1px solid rgba(128, 128, 128, 0.518);
  padding: 7px;
  border-radius: 4px;
  margin-bottom: 6%;

}
.date label, input {
  color: rgba(128, 128, 128, 0.518);
}
.date input{
  margin-left: 15%;
}
img{
  margin-top: 22%;
}
form{
  margin-top: -25%;
}
.container {
  display: flex;
  margin-top: 3%;
}
.image {
  flex: 1;
  margin-left: -50px;
}
.btn {
  display: flex;
  margin-top: 3%;
  margin-top: -1%;
}
h1 {
  margin-bottom: 75px;
  margin-top: 10px;
  color: #634b7a;
  text-align: center;
}
.err {
  text-align: start;
}
.text-error {
  text-align: start;
  font-family: sans-serif;
  font-size: 12px;
  margin-bottom: 15px;
  margin-top: -20px;
  margin-left: 15px;
}
label {
  color: #634b7a;
}
.form-container {
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
  background-color: #fff;
  margin-right: 60px;
  margin-top: 40px;
  margin-bottom: 10px;
  margin: 60px;
  flex: 1;
  padding: 35px;
  /* height: 90vh; */
  border-radius: 10px;
}
.btn > div > div > button {
  background-color: #634b7a;
  color: #f6eeee;
  margin-left: 10px;
}
.link-sign-up {
  color: #fff;
  background-color: #634b7a;
  text-decoration: none;
}
.selectbox{
  margin-top: -9%;
  margin-left: -6%;
  margin-bottom: -10%;
}
.male{
   margin-left: -45%;
}
</style>