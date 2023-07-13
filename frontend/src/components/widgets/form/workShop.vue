<template>
  <div class="form-container">
    <div class="image">
      <img
          src="../../../assets/images/workshop.png"
          style="width: 100%; height: initial"
          alt="Image description"
      /> 
    </div>
    <form >
      <h1>Create workshop</h1>
      <v-text-field
        class="err"
        v-model="title"
        required
        density="compact"
        placeholder="Enter your title"
        variant="outlined"
        color="#634B7A"
      ></v-text-field>
      <v-file-input
        class="err"
        v-model="image"
        label="image input"
        required
        density="compact"
        placeholder="Enter your image"
      ></v-file-input>
      <v-text-field
        class="err"
        v-model="description"
        required
        density="compact"
        placeholder="Enter your description"
        variant="outlined"
        color="#634B7A"
      ></v-text-field>
      <input type="date" 
        placeholder="start_date" 
        v-model="start_date" 
        style="width:100%; padding:8px; border:1px solid #9e9e9e; margin-bottom:23px; color:#b5b5b5"
        
        >
      <input type="date" 
        placeholder="expired_date" 
        v-model="expired_date" 
        style="width:100%; padding:8px; border:1px solid #9e9e9e; margin-bottom:23px;  color:#b5b5b5"

        >
      <input type="time" 
        label="time" 
        v-model="expired_date" 
        style="width:100%; padding:8px; border:1px solid #9e9e9e; margin-bottom:23px;  color:#b5b5b5"

        >
     <v-select
        v-model="address_id"
        density="compact"
        variant="outlined"
        color="#634B7A"
        label="Select"
        :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
      ></v-select>
      <v-select
        v-model="scholl_id"
        density="compact"
        variant="outlined"
        color="#634B7A"
        label="Select"
        :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
      ></v-select>
      <v-row justify="center">
        <v-col cols="auto">
          <v-btn
            height="50"
            min-width="164"
            color="#725d87"

          >Create
          </v-btn>
        </v-col>
        <v-col cols="auto">
          <v-btn
            height="50"
            min-width="164"
            color="#725d87"
          >Cancel
          </v-btn>
        </v-col>
      </v-row>


    </form>
  </div>
</template>

<script>
// import axios from 'axios'

export default{

  data () {
    return {
      selected: []
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