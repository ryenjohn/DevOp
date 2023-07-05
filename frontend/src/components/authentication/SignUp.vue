<template>
    <div class="container">
      <div class="image">
        <img src="../../assets/register.png" style="width: 600px;" alt="Image description">
      </div>
      <div class="form-container">
        <form >
          <h1>Register</h1>
          <v-text-field class="err"
            v-model="state.name"
            :error-messages="v$.name.$errors.map(e => e.$message)"
            :counter="10"
            label="Name"
            required
            @input="v$.name.$touch"
            @blur="v$.name.$touch"
          ></v-text-field>
  
          <v-text-field class="err"
            v-model="state.email"
            :error-messages="v$.email.$errors.map(e => e.$message)"
            label="E-mail"
            required
            @input="v$.email.$touch"
            @blur="v$.email.$touch"
          ></v-text-field>
  
          <v-text-field class="err"
            v-model="state.password"
            :error-messages="v$.password.$errors.map(e => e.$message)"
            label="Password"
            required
            type="password"
            @input="v$.password.$touch"
            @blur="v$.password.$touch"
          ></v-text-field>
          
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
    checkbox: null,
    password: '',
  }
  const state = reactive(Object.assign({}, initialState))
  
  const rules = {
      name: { required, minLength: minLength(3) },
      email: { required, email },
      password: { required, minLength: minLength(8) },
      checkbox: { required }
  }
  const v$ = useVuelidate(rules, state)
  
  function clear() {
    for (const [key, value] of Object.entries(initialState)) {
      state[key] = value
    }
    v$.value.$reset()
  }
  
  async function submit() {
    try {
      const data = {
        name: state.name,
        email: state.email,
        checkbox: state.checkbox,
        password: state.password,
      }      
      console.log(data)
      // Make an API call to add data to the database
      const response = await axios.post('http://127.0.0.1:8000/api/users', data)
        Cookies.set('userData', JSON.stringify(response.data.token), { expires: 10 })

      // Check the server response and alert the user accordingly
      if (response.status === 200) {
        alert('Form submitted successfully')
        clear()
      } else {
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
    margin-left: 30%;
    margin-top: 12px;
  }
  .err{
    text-align: start;
  }
  .form-container {
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    margin-right: 55px;
    margin-top: 40px;
    flex: 1;
    padding: 35px;
    height: 90vh;
    border-radius: 10px;
  }
  .btn > div > div > button {
    background-color: #EFAA1D;
    color: #F6EEEE;
    margin-left: 10px;
  }
  </style>