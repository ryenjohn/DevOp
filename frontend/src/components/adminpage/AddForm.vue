<template>
  <v-row justify="center">
    <v-dialog
      v-model="dialog"
      persistent
      width="1024"
    >
      <template v-slot:activator="{ props }">
        <p class="addbtn"
          color="primary"
          v-bind="props"
        >
          Add New User
        </p>
      </template>
      <v-card>
        <v-card-title>
        </v-card-title>
        <v-card-text>
          <v-container>
            
        <div class="container">
          <div class="image">
            <img
              src="../../assets/images/register.png"
              style="width: 400px; height: inherit"
              alt="Image description"
            />
        </div>
      <div class="form-container">
        <form style="height: 500px;">
          <h1>Add Student</h1>
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

          <v-checkbox
            class="err"
            v-model="state.checkbox"
            :error-messages="v$.checkbox.$errors.map((e) => e.$message)"
            label="Do you agree?"
            required
            @change="v$.checkbox.$touch"
            @blur="v$.checkbox.$touch"
          ></v-checkbox>
        
          <div class="select">
            <select class="role" v-model="state.role_id">
              <option color="purple" value="">Choose_Role</option>
              <option value="1">Student</option>
              <option value="2">Universtiy manager</option>
            </select>
            <p>Your role is: {{ state.role_id }}</p>
          </div>
  
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
                <v-btn class="me-4" @click="v$.$touch()">Create</v-btn>
              </div>
              <div v-else class="sign-in">
                  <v-btn class="me-4" @click="singIn">Create</v-btn>
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>

  </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>


<script>
  export default {
    data (){
      return {
        dialog: false,
        role_id: '',
      }
    },
  };
</script>
<script setup>
import { reactive } from "vue";
import { useVuelidate } from "@vuelidate/core";
import { email, required, minLength } from "@vuelidate/validators";
import axios from "axios";

const initialState = {
  name: "",
  email: "",
  role_id: "",
  checkbox: null,
  password: "",
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
// Rule for name email password
const rules = {
  name: { required, minLength: minLength(3) },
  email: {
    required,
    email,
    async unique() {
      const response = await axios.get(`${ process.env.VUE_APP_API_URL}users`);
      // compare new data email with data in database
      const datas = response.data.data;
      const emailExists = datas.some((data) => data.email === state.email);
      state.emailTakenError = emailExists;
    },
  },
  password: { required, minLength: minLength(8), custom: passwordRule },
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
      email: state.email,
      role_id: state.role_id,
      checkbox: state.checkbox,
      password: state.password,
    };
    console.log(data)
    // Make an API call to add data to the database
    const response = await axios.post(`${ process.env.VUE_APP_API_URL}users`, data);
    this.dialog = false

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
img{
  margin-top: 10%;
}
form{
  margin-top: -25%;
}
.container {
  display: flex;
  margin-top: -5%;
}
.image {
  flex: 1;
}

.btn {
  display: flex;
  margin-top: 7%;
}
.role{
    border: 5px solid #634b7a;
    padding: 5px;
    border-radius: 8px;
}
.role option{
  color: #634b7a;
}
.select p{
  color: #634b7a;
  margin-left: -0%;
}
.addbtn{
  font-size: 20px;
  background-color: rgb(124, 49, 196);
  padding: 8px;
  color: white;
  margin-left: -42%;
  border-radius: 8px;
}
.addbtn:hover{
  background-color: rgb(89, 12, 161);

}
h1 {
  margin-bottom: 25px;
  margin-top: 10px;
}
p {
  margin-bottom: 20px;
  margin-left: 23%;
  margin-top: 12px;
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
</style>