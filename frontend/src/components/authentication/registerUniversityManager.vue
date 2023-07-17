<template>
<div class="groupForm">
  <form>
    <h2>Manager data:</h2>
    <div class="item">
      <v-text-field
        v-model="state.userName"
        :error-messages="v$.userName.$errors.map(e => e.$message)"
        :counter="10"
        label="User name"
        variant="outlined"
        color="#634B7A"
        required
        @input="v$.userName.$touch"
        @blur="v$.userName.$touch"
      ></v-text-field>
    </div>

    <div class="item">
       <v-text-field
        v-model="state.email"
        :error-messages="v$.email.$errors.map(e => e.$message)"
        label="E-mail"
        required
        variant="outlined"
        color="#634B7A"
        @input="v$.email.$touch"
        @blur="v$.email.$touch"
      ></v-text-field>

      <v-text-field
        v-model="state.phoneNumber"
        :error-messages="v$.phoneNumber.$errors.map(e => e.$message)"
        :counter="10"
        label="Phone Number"
        required
        variant="outlined"
        color="#634B7A"
        @input="v$.phoneNumber.$touch"
        @blur="v$.phoneNumber.$touch"
      ></v-text-field>
      
    </div>

    <div class="item">
      <select class="select">
        <option value="none">Choose the user address:</option>
         <option  v-for='address in addresses ' :key="address" value="{{addresses.id}}">{{address.name}}</option>
      </select>

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
    </div>

    <h2>Universty data</h2>
    <div class="item">
      <v-text-field
        v-model="state.universityName"
        :error-messages="v$.universityName.$errors.map(e => e.$message)"
        :counter="10"
        label="School Name"
        required
        variant="outlined"
        color="#634B7A"
        @input="v$.universityName.$touch"
        @blur="v$.universityName.$touch"
      ></v-text-field>
    </div>
    <div class="item">
      
      <select class="select" >
        <option value="none">Choose the school address:</option>
        <option  v-for='address in addresses ' :key="address" value="{{address.id}}">{{address.name}}</option>
      </select>
      
    
       <select class="select">
        <option value="none">Choose the school type:</option>
        <option  v-for='type in schoolTypes ' :key="type" value="{{type.id}}">{{type.name}}</option>
      </select>
    </div>

    <!-- check box -->
    <!-- https://codepen.io/johnjleider/pen/GVoaNe -->
    <v-container fluid class="pt-0">
      <h3>Choose the skills in your university: </h3> <br>
          <v-row>
            <v-col class="pt-0" v-for='skill in skills' :key='skill'>
              <input type="checkbox"  name="{{skill.name}}" value="{{skill.id}}"> <br>
              <label for="{{skill.name}}"> {{skill.name}}</label><br>
            </v-col>
          </v-row>
        </v-container>
  

    <v-file-input
      accept="image/*"
      label="Input your file image"
      variant="outlined"
      color="#634B7A"
    ></v-file-input>

    <v-textarea
      v-model="state.description"
      bg-color="grey-lighten-2"
      color="cyan"
      variant="outlined"
      label="University Description"
    ></v-textarea>

    <v-checkbox
      v-model="state.checkbox"
      :error-messages="v$.checkbox.$errors.map(e => e.$message)"
      label="Do you agree?"
      required
      variant="outlined"
      color="#634B7A"
      @change="v$.checkbox.$touch"
      @blur="v$.checkbox.$touch"
    ></v-checkbox>

    <v-btn
      class="me-4"
      @click="v$.$validate"
    >
      submit
    </v-btn>
  </form>
</div>
</template>


<script setup>
  
  import { reactive } from 'vue'
  import { useVuelidate } from '@vuelidate/core'
  import { email, required } from '@vuelidate/validators'


  const initialState = {
    userName: '',
    email: '',
    userAddress: null,
    phoneNumber:'',
    universityName:'',
    universityAddress: null,
    image:'',
    description:'',
    checkbox: null,
    checkMajors: null,
    password:'',
    selectedOptions: [],
    menu: true,
  }
 

  const state = reactive({
    ...initialState,
  })
  
  // const  items= {
  //   site_i: { label: "Site" },
  //   vpn_i: { label: "VPN" },
  //   addr: { label: "IP Address" },
  //   hostname: { label: "Hostname" },
  //   descr: { label: "Description" },
  //   vlanno: { label: "VLAN Number" },
  //   site_type_i: { label: "Site type" },
  //   tags_: { label: "Tags" },
  //   zones_i: { label: "Security zone" },
  //   grpid: { label: "Owner Group" },
  //   ipcat_i: { label: "Category" },
  //   sources_i: { label: "Source" },
  // }


  const passwordRule = (value) => {
  const regex =
      /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}|:"<>?~`]).{8,}$/;
    const result = regex.test(value);
    return result;
  };
  const rules = {
    userName: { required },
    email: { required, email },
    userAddress: { required },
    phoneNumber: { required },
    addressUserItems: { required },

    universityName: { required },
    universityAddress: { required },
    addressUniversityItems: { required },
    image: { required },
    description: { required },
    options: { required },
    selectedOptions: { required },
    checkMajors: { required },
    checkbox: { required },
    password:{ required, custom: passwordRule}
  }

  const v$ = useVuelidate(rules, state)
  
</script>

<script>
import axios from 'axios'
export default {
     data() {
        return {
            addresses:'',
            schoolTypes:'',
            skills:''
          }
      },
      methods:{
        getAddress(){
          axios.get(`${ process.env.VUE_APP_API_URL}addresses`).then((res)=>{
            this.addresses = res.data.data
            console.log(this.addresses)
          })
        },
        getSchoolTypes(){
          axios.get(`${ process.env.VUE_APP_API_URL}schoolType`).then((res)=>{
            this.schoolTypes = res.data.data
          })
        },
        getskills(){
          axios.get(`${ process.env.VUE_APP_API_URL}majors`).then((res)=>{
            this.skills = res.data.data
          })
        }
      },
      mounted(){
        this.getAddress()
        this.getSchoolTypes()
        this.getskills()
      }
}
</script>


<style scoped>
form{
  width: 80%;
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
  /* border: 1px solid rgb(124, 121, 121); */
  padding: 20px;
  background: #d8d6d6;
  margin: 20px;

  
}
.select{
  width: 50%;
  height: 60px;
  border: 1px solid black;
  outline-style:solid 1px ;
}
.groupForm{
  margin-left: 13%;
}
.item{
  display: flex;
  gap: 20px;
}
h2{
  text-align: center;
  color: orange;
  margin-top: 20px;
}
h3{
  margin-top: 10px;
}
v-text-field{
  /* height: 10px; */
  background: #000;
}
</style>