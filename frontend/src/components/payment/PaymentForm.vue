<template>
<div class="groupForm" @submit.prevent="submit">
  <v-form  v-model="valid">
    <h1>Payment</h1>
    <div class="item" > 
        <v-text-field 
          v-model="name" 
          label="Name" 
          :rules="nameRules" 
          density="compact"
          placeholder="Enter your Name"
          variant="outlined"
          color="#634B7A"
          
      ></v-text-field>
        <v-text-field 
            v-model="email" 
            label="Email" 
            :rules="emailRules"
            density="compact"
            placeholder="Enter your email"
            variant="outlined"
            color="#634B7A"
        ></v-text-field>
    </div>
    <div class="item">
      <v-text-field 
            v-model="phone" 
            label="Phone" 
            :rules="phoneRules"
            density="compact"
            placeholder="Enter your phone number"
            variant="outlined"
            color="#634B7A"
        ></v-text-field>
        <v-text-field 
            v-model="courseProgramName" 
            label="Course/Program name" 
            :rules="courselRules"
            density="compact"
            placeholder="Enter your email"
            variant="outlined"
            color="#634B7A"
        ></v-text-field>
     
    </div>
    <div class="item">
      <v-text-field 
            v-model="studentId" 
            label="Student id" 
            :rules="studentIdRules"
            density="compact"
            placeholder="Enter your student id"
            variant="outlined"
            color="#634B7A"
        ></v-text-field>
        <v-text-field 
            v-model="yearOfStudy" 
            label="Year of study" 
            :rules="yearOfStudyRules"
            density="compact"
            placeholder="Enter your year of study"
            variant="outlined"
            color="#634B7A"
        ></v-text-field>
    </div>
    
    <p class="select-fee">Select what fee/s you want to pay</p>
    <v-container fluid class="pt-0"  id="radio">
        <v-radio
            v-for="(typePayment, index) in typePayments" :key="index" 
            v-model="typePaymentSelect"
            :label=typePayments.name
            :rules="radioRules"
            :value="typePayment.id"
        ></v-radio>
    </v-container>
    <v-btn type="submit" v-if="!valid" @click="goToPayment()">Submit</v-btn>
  </v-form>
</div>
</template>

<script>
// import axios from 'axios'

export default {
    data() {
        return {
            name: '',
            phone: '',
            email: '',
            studentId: '',
            radio: '',
            yearOfStudy: '',
            typePaymentSelect: [],
            valid: true,
            courseProgramName:'',
            nameRules: [
                value => !!value || 'Name is required',
                value => (value && value.length >= 2) || 'Name needs to be at least 2 characters',
            ],
            phoneRules: [
                value => !!value || 'Phone number is required',
                value => !value || (value && value.length > 8 && /[0-9-]+/.test(value)) || 'Phone number needs to be at least 9 digits',
            ],
            emailRules: [
                value => !!value || 'Email is required',
                value => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'E-mail must be valid',
            ],
            courselRules: [
                value => !!value || 'Course/Program name required',
            ],
            radioRules: [
                value => !!value || 'Must be selected',
            ],
            studentIdRules: [
                value => !!value || 'Student id is required',
            ],
            yearOfStudyRules: [
                value => !!value || 'Name year of study is required',
            ],
            typePayments:[
               'Admission fee',
               'Exam fee',
               'Tuition fee'
            ] 
        }
    },
    methods:{
      goToPayment(){
          this.$router.push('/')
      }
    }
}
</script>

<style scoped>
form{
  width: 60%;
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  padding: 20px;
  background: #ffffff;
  margin: auto ;

  
}

.select{
    width: 50%;
    height: 44px;
    color: rgb(141, 137, 137);
    border: 1px solid rgb(124, 123, 123);
    outline-style:solid 1px ;
    border-radius: 5px;
}
.groupForm{
  margin: 20px; 

  /* margin-left: 13%; */
}
.item{
  display: flex;
  gap: 20px;
  margin: 10px;
}
.select-fee {
  margin-left: 10px;
}
#radio{
    display: flex;
    flex-wrap: wrap;
    align-self: center;
}
h1{
  text-align: center;
  color: orange;
  margin-top: 20px;
  margin-bottom: 20px;
}
h3{
  margin-top: 10px;
}
.btn-payment{
  margin-left: 84%;

}

</style>