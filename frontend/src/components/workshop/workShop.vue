<template>
  <div class="form-container">
    <div class="image">
      <img
          src="../../assets/images/workshop.png"
          style="width: 100%; height: initial"
          alt="Image description"
      /> 
    </div>
      <v-form @submit.prevent="" ref="form" class="form-item">
        <h2>Add Workshop</h2>
        <div class="side-input">
          <div class="right-input">
              <v-text-field
              v-model="name"
              label="Name of Workshop"
              :rules="nameRules"
              required
            ></v-text-field>
              <v-text-field
              v-model="startDate"
              label="Start Date"
              type="date"
              :rules="startDateRules"
              required
          ></v-text-field>
            <v-file-input
              v-model="image"
              label="Image"
              :rules="imageRules"
              accept="image/*"
              required
            ></v-file-input>

            <v-textarea
              v-model="description"
              label="Description"
              :rules="descriptionRules"
              required
            ></v-textarea>
          </div>
          <div class="left-input">
              <v-text-field
              v-model="number"
              label="Number Of Workshop"
              type="number"
              :rules="numberRules"
              required
            ></v-text-field>

          <v-text-field
            v-model="endDate"
            label="End Date"
            type="date"
            :rules="endDateRules"
            required
          ></v-text-field>
        <v-text-field
          v-model="time"
          label="Time"
          :rules="timeRules"
          required
        ></v-text-field>
        <v-select
          v-model="school"
          :items="schools"
          label="School"
          :rules="schoolRules"
          required
        ></v-select>
        <v-select
          v-model="address"
          :items="addresses"
          label="Address"
          :rules="addressRules"
          required
        ></v-select>
          </div>
        </div>
        <div class="btn">
          <v-btn type="button" class="bg-purple text-white">Cancel</v-btn>
          <v-btn type="submit" @click.prevent="submitForm" class="bg-orange text-white">Submit</v-btn>
        </div>
      </v-form>
    </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      description: "",
      image: null,
      number: null,
      startDate: null,
      endDate: null,
      school: null,
      time: null,
      schools: [
        "RUPP",
        "PNC",
        "PNV",
        "PNP"
      ],
      addresses: [
        "Phnom Penh",
        "Kompong Cham",
        "Kompong Speu",
        "Tbong Khom"
      ],
      timeRules: [
        (v) => !!v || "Time is required",
        (v) => /^([01]\d|2[0-3]):([0-5]\d)$/.test(v) || "Time must be in the format 'HH:mm'",
      ],
      nameRules: [
        (v) => !!v || "Name is required",
        (v) => v.length <= 50 || "Name must be less than 50 characters",
      ],
      numberRules: [
        (v) => !!v || "Number is required",
        (v) => /^\d+$/.test(v) || "Number must be a whole number",
        (v) => v >= 0 && v <= 100 || "Number must be between 0 and 100",
      ],
      descriptionRules: [
        (v) => !!v || "Description is required",
        (v) => v.length <= 500 || "Description must be less than 500 characters",
      ],
      imageRules: [
        (v) => !!v || "Image is required",
        (v) => v && v.type.startsWith("image/") || "Please select an image file",
      ],
      startDateRules: [
        (v) => !!v || "Start date is required",
        (v) => v <= this.endDate || "Start date must be before end date",
      ],
      endDateRules: [
        (v) => !!v || "End date is required",
        (v) => v >= this.startDate || "End date must be after start date",
      ],
      schoolRules: [
        (v) => !!v || "School is required",
      ],
      addressRules: [
        (v) => !!v || "Address is required",
      ],
    };
  },
  methods: {
    submitForm() {
      if (this.$refs.form.validate()) {
        // Submit form data
      }
    },
  },
};
</script>
<style scoped>
  h2{
    color:orange;
    text-align:center;
  }
  .form-item{
    width:800px;
   box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
    padding:20px;
  }
  .form-container {
  width: 70%;
  flex: 1;
  padding: 35px;
  margin: 40px 0px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  margin-left: 15%;
  }
  .btn{
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .side-input{
    width: 100%;
    display: flex;
    align-items: center;
    gap:20px
  }
  .right-input{
    width:50%;
  }
  .left-input{
    width:50%;
    margin-top: -15px;
  }
</style>