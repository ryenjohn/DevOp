<template>
<div class="groupForm">
  <v-form v-model="valid" @submit.prevent="createUser()">
    <v-text-field 
        v-model="name" 
        :rules="nameRules" 
        required
        density="compact"
        placeholder="Enter your Name"
        variant="outlined"
        color="#634B7A"
    ></v-text-field>
    <div class="item">
        <v-text-field 
            v-model="email" 
            label="Email" 
            :rules="emailRules"
            density="compact"
            placeholder="Enter your email"
            variant="outlined"
            color="#634B7A"
        ></v-text-field>
        <v-text-field 
            v-model="phone" 
            label="Phone" 
            :rules="phoneRules"
            density="compact"
            placeholder="Enter your phone number"
            variant="outlined"
            color="#634B7A"
        ></v-text-field>
    </div>
    <div class="item">
        <v-text-field 
            v-model="password" 
            label="Password" 
            :rules="PasswordRules"
            density="compact"
            placeholder="Enter your Password number"
            variant="outlined"
            color="#634B7A"
        ></v-text-field>

        <select class="select" style="width:49%">
            <option value="none">Choose the user address:</option>
            <option  v-for='address in addresses ' :key="address" value="{{addresses.id}}">{{address.name}}</option>
        </select>
    </div>
    <h2>Universty data</h2> 
    <v-text-field
        v-model="universityName"
        required
        density="compact"
        placeholder="Enter your Name"
        variant="outlined"
        color="#634B7A"
        :rules="universityRules"
    ></v-text-field>
     <div class="item">  
        <select class="select" >
            <option value="none" >Choose the school address:</option>
            <option  v-for='address in addresses ' :key="address" value="{{address.id}}">{{address.name}}</option>
        </select>
        <select class="select">
            <option value="none">Choose the school type:</option>
            <option  v-for='type in schoolTypes ' :key="type" value="{{type.id}}">{{type.name}}</option>
        </select>
    </div>
    <v-container fluid class="pt-0"  id="checkbox">
        <v-checkbox
            v-for="skill in skills" :key="skill"
            v-model="selected"
            :label=skill.name
            :value="skill.id"
        ></v-checkbox>
    </v-container>
    <v-file-input
        v-model="image"
        accept="image/*"
        label="Input your file image"
        density="compact"
        placeholder="Enter your Name"
        variant="outlined"
        color="#634B7A"
    ></v-file-input>
    <v-textarea
      v-model="descriptions"
      bg-color="grey-lighten-2"
      color="cyan"
      variant="outlined"
      label="University Description"
    ></v-textarea>
    <v-btn type="submit" :disabled="!valid">Submit</v-btn>
  </v-form>
</div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            name: '',
            phone: '',
            email: '',
            addresses: '',
            checkbox: '',
            password: '',
            universityName: '',
            schoolTypes:null,
            skills :null,
            selected: [],
            image:'',
            descriptions:'',
            valid: true,
            nameRules: [
                value => !!value || 'Name is required',
                value => (value && value.length >= 2) || 'Name needs to be at least 2 characters',
            ],
            phoneRules: [
                value => !value || (value && value.length > 8 && /[0-9-]+/.test(value)) || 'Phone number needs to be at least 9 digits',
            ],
            emailRules: [
                value => !!value || 'Email is required',
                value => /^[a-z.-]+@[a-z.-]+\.[a-z]+$/i.test(value) || 'Must be a valid e-mail',
            ],
            addressRules: [
                value => !!value || 'Select an item',
            ],
            checkboxRules: [
                value => !!value || 'Must be checked',
            ],
            PasswordRules: [
                value => !!value || 'password is required',
                value => /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}|:"<>?~`]).{8,}$/i.test(value)|| 'password is required',
            ],
            universityRules: [
                value => !!value || 'Name university is required',
                value => (value && value.length >= 2) || 'Name needs to be at least 2 characters',
            ],
            imageRules: [
                value => !!value || 'Email is required',
            ],
            descriptionRules: [
                value => !!value || 'Descripiton is required',
                value => (value && value.length >= 10) || 'Name needs to be at least 2 characters',
            ],
        }
    },
    methods: {

        createUser(){
        // form is valid, submit it
            axios.post(`${ process.env.VUE_APP_API_URL}users`,(this.name,this.email, this.password))
            .then((res)=>{
                this.addresses = res.data.data
            })
        console.log(this.name)
        console.log(this.email)
        console.log(this.phone)
        console.log(this.addresses)
        console.log(this.password)
        console.log(this.universityName)
        console.log(this.selected)
        console.log(this.image[0].name)
        console.log(this.descriptions)
        },
        getAddress(){
            axios.get(`${ process.env.VUE_APP_API_URL}addresses`).then((res)=>{
            this.addresses = res.data.data
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

/* option{
    background: #df6d6d;
    margin: 20px;
    padding: 20px;
} */
.select{
    width: 50%;
    height: 44px;
    color: rgb(141, 137, 137);
    border: 1px solid rgb(124, 123, 123);
    outline-style:solid 1px ;
    border-radius: 5px;
}
.groupForm{
  margin-left: 13%;
}
.item{
  display: flex;
  gap: 20px;
}
#checkbox{
    display: flex;
    flex-wrap: wrap;
    align-self: center;
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