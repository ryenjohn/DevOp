// copy from vutity
<template>
    <div class="container">
      <div class="imageregister">
        <img src="../../assets/images/register.png" style="width: 600px; height: 800px;" alt="Image description">
      </div>
      <div class="form-container">
        <form >
          <h1>Register</h1>
          <v-text-field class="err"
            v-model="state.name"
            :error-messages="v$.name.$errors.map(e => e.$message)"
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
  
           <v-text-field class="err"
            v-model="state.email"
            :error-messages="v$.email.$errors.map(e=> e.$message )"
            required
            density="compact"
            placeholder="Enter your email"
            prepend-inner-icon="mdi-email"
            variant="outlined"
            color="#634B7A"
            @input="v$.email.$touch"
            @blur="v$.email.$touch"
            ></v-text-field>
            <p  v-if="state.emailTakenError" class="text-error">
              Email is already taken.
            </p>

            <v-text-field class="err"
           
            :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'"
            color="#634B7A"
            :type="visible ? 'text' : 'password'"
            density="compact"
            placeholder="Enter your password"
            prepend-inner-icon="mdi-lock-outline"
            variant="outlined"
            @click:append-inner="visible = !visible"
            v-model="state.password"
            :error-messages="v$.password.$errors.map(e => e.$params.custom ? e.$params.custom.message : 'Value required and should contain uppercase, lowercase, number, sign and more than 8 characters')"
            @input="v$.password.$touch"
            @blur="v$.password.$touch"
          ></v-text-field>
          <!-- <v-select
            class="err select-role"
            v-model="state.role_id"
            :items="role_id"
            :error-messages="v$.role_id.$errors.map((e) => e.$message)"
            label="Role"
            disabled
            required
            @change="v$.role_id.$touch"
            @blur="v$.role_id.$touch"
          ></v-select> -->
          <v-checkbox class="err"
            v-model="state.checkbox"
            :error-messages="v$.checkbox.$errors.map(e => e.$message)"
            label="Do you agree?"
            required
            @change="v$.checkbox.$touch"
            @blur="v$.checkbox.$touch"
          ></v-checkbox>
        <div class="btn">
            <div >
                <div v-if="v$.$invalid">
                  <v-btn class="me-4" @click="v$.$touch()">Sign up</v-btn>
                </div>
                <div v-else class="sign-in">
                  <v-btn class="me-4" @click="submit">Sign up</v-btn>
                </div>
            </div>
            <p>Already have an account?<a href="" class="log-in"> Log in</a></p>
        </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { reactive } from 'vue'
  import { useVuelidate } from '@vuelidate/core'
  import { email, required, minLength } from '@vuelidate/validators'
  import axios from 'axios'
  import Cookies from 'js-cookie'
  
  const initialState = {
    name: '',
    email: '',
    role_id: '',
    checkbox: null,
    password: '',
    emailTakenError: false,
    visible: false,
  }
  const state = reactive(Object.assign({}, initialState))
 
  // Set role for password
  const passwordRule = (value) => {
  const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}|:"<>?~`]).{8,}$/;
  const result = regex.test(value);
  return result;
  };
  
  // Rule for name email password
  const rules = {
      name: { required, minLength: minLength(3) },
      email: { required, email, async unique() {
      const response = await axios.get(`http://127.0.0.1:8000/api/users`)
      // compare new data email with data in database
      const datas = response.data.data;
      const emailExists = datas.some(data => data.email === state.email);
      state.emailTakenError = emailExists;
      }},
      password: { required, minLength: minLength(8),  custom: passwordRule },
      checkbox: { required }
  }

  // Clear validation when input correct 
  const v$ = useVuelidate(rules, state)
  function clear() {
    for (const [key, value] of Object.entries(initialState)) {
      state[key] = value
    }
    v$.value.$reset()
  }
  // Insert data into dabase
  async function submit() {
    try {
      const data = {
        name: state.name,
        email: state.email,
        role_id: 1,
        checkbox: state.checkbox,
        password: state.password,
      }      

      // Make an API call to add data to the database
      const response = await axios.post('http://127.0.0.1:8000/api/users', data)
        Cookies.set('userData', JSON.stringify(response.data.token), { expires: 10 })

      // Check the server response and alert the user accordingly
      if (response.status === 200) {
        alert('Form submitted successfully')
        clear()
      }
      else {
        alert('Failed to submit the form')
      }
    } catch (error) {
      console.error(error)
    }
  }

  </script>
  
  <style>
  .container {
    display: flex;
  }
  .image {
    flex: 1;
  }
  .btn{
    display: flex;
  }
  h1{
    margin-bottom: 25px;
    margin-top: 10px;
  }
  p{
    margin-bottom: 20px;
    margin-left: 23%;
    margin-top: 12px;
  }
  .err{
    text-align: start;
  }
  .text-error{
    text-align: start;
    font-family: sans-serif;
    font-size: 12px;
    margin-bottom: 15px;
    margin-top: -20px;
    margin-left: 15px;
  }
  label{
    color:#634B7A;
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
    background-color: #634B7A;
    color: #F6EEEE;
    margin-left: 10px;
  }
  </style>