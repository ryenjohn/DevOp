<template>
  <div class="groupForm">
    <v-form >
      <h1>Payment</h1>
      <div class="content-img">
        <img src="../../assets/payment/unionPay.png" class="img-card">
        <img src="../../assets/payment/visa.png" class="img-card">
        <img src="../../assets/payment/aba.png" class="img-card aba">
      </div>
      <div class="item" > 
          <v-text-field 
            v-model="name" 
            label="Card number" 
            :rules="cardNumberRules" 
            density="compact"
            placeholder="Enter your card number"
            variant="outlined"
            color="#634B7A"
        ></v-text-field>
      </div>
      <div class="item">
        <v-text-field 
              v-model="nameOnCard" 
              label="Name on card" 
              :rules="nameOnCardRules"
              density="compact"
              placeholder="Enter your phone number"
              variant="outlined"
              color="#634B7A"
          ></v-text-field>
      </div>
      <div class="item">
        <v-text-field 
              v-model="expiryDate" 
              label="Expiry date" 
              :rules="expiryDateRules"
              density="compact"
              placeholder="Enter your student id"
              variant="outlined"
              color="#634B7A"
          ></v-text-field>
          <v-text-field 
              v-model="securityCode" 
              label="Security code" 
              :rules="securityCodeRules"
              density="compact"
              placeholder="Enter your year of study"
              variant="outlined"
              color="#634B7A"
          ></v-text-field>
      </div>
  
      <v-btn type="submit" class="btn-payment">
        <route-link  to="/"></route-link>Payment</v-btn>
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
              valid: true,
              cardNumberRules: [
                  value => !!value || 'Card number is required',
                  value => (value && value.length >= 2) || 'Name needs to be at least 2 characters',
              ],
              nameOnCardRules: [
                  value => !!value || 'Name on card is required',
                  value => !value || (value && value.length > 8 && /[0-9-]+/.test(value)) || 'Phone number needs to be at least 9 digits',
              ],
              expiryDateRules: [
                  value => !!value || 'Expiry date is required',
                  value => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'E-mail must be valid',
              ],
              securityCodeRules: [
                  value => !!value || 'Security code required',
              ],
          }
      },
  }
  </script>
  
  <style scoped>
  form{
    width: 50%;
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
    margin-bottom: 10px;
  }
  h3{
    margin-top: 10px;
  }
  .btn-payment{
    margin-left: 80%;
  }
 .img-card {
  width: 13%;
  margin-left: 6%;
  margin-bottom: 10px;
 }
 .content-img{
  margin-left: 24%; 
  cursor: pointer;
 }
 .aba{
  margin-bottom: 5%;
 }
  </style>