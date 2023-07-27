<template>
  <div class="groupForm">
    <v-form ref="form" v-model="valid" @submit.prevent="submitScholarship">
      <h1>Add scholarship</h1>
      <div class="item">
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
          v-model="user_number"
          label="User number"
          :rules="userNumberRules"
          density="compact"
          placeholder="Enter your user number"
          variant="outlined"
          color="#634B7A"
        ></v-text-field>
      </div>
      <div class="item"></div>
      <div class="item">
        <v-text-field
          v-model="postDate"
          label="Post date"
          type="date"
          :rules="postDateRules"
          density="compact"
          placeholder="Enter your post date"
          variant="outlined"
          color="#634B7A"
        ></v-text-field>
        <v-text-field
          v-model="expiredDate"
          label="Expired date"
          type="date"
          :rules="expiredDateRules"
          density="compact"
          placeholder="Enter your expired date"
          color="#634B7A"
          variant="outlined"
        ></v-text-field>
      </div>
      <div class="item">
        <v-select
          v-model="skill_id"
          :items="skills"
          label="Skill"
          variant="outlined"
          :rules="skillRules"
        ></v-select>
        <v-file-input
          @change="onFileChange"
          label="Image"
          :rules="imageRules"
          variant="outlined"
        ></v-file-input>
      </div>
      <div class="item">
        <v-textarea
          v-model="description"
          label="Description"
          :rules="descriptionRules"
          color="#634B7A"
          variant="outlined"
          placeholder="Enter your description"
        ></v-textarea>
      </div>
      <div class="add-cancel">
        <v-btn type="submit" class="cancel" @click="cancel()">Cancel</v-btn>
        <v-btn type="submit" class="add">Create</v-btn>
      </div>
      
    </v-form>
  </div>
</template>



<script>
import axios from "axios";
import Cookies from 'js-cookie';
export default {
  data() {
    return {
      valid: false,
      name: "",
      user_number: "",
      skill_id: "",
      school_id:'',
      postDate: "",
      expiredDate: "",
      image: null,
      description: "",
      skills: [],
      getSkills: null,
      nameRules: [
        (value) => !!value || "Name is required",
        (value) =>
          (value && value.length >= 2) ||
          "Name needs to be at least 2 characters",
      ],
      userNumberRules: [
        (value) => !!value || "User number is required",
        (value) =>
          /^\d+$/.test(value) || "User number must contain only digits",
      ],
      skillRules: [(value) => !!value || "Skill  required"],
      postDateRules: [(value) => !!value || "Post date is required"],
      expiredDateRules: [
        (value) => !!value || "Expired date is required",
        (value) =>
          new Date(value) > new Date(this.postDate) ||
          "Expired date must be greater than post date",
      ],
      imageRules: [(value) => !!value || "Image is required"],
      descriptionRules: [(value) => !!value || "Description is required"],
    };
  },
  methods: {
    submitScholarship() {
     
      if (this.valid) {
        const new_idaship = {
          name: this.name,
          user_number: this.user_number,
          skill_id: this.skillId(),
          school_id: this.shoolId(),
          image: this.image,
          post_date: this.postDate,
          expired_date: this.expiredDate,
          description: this.description,
        };
        axios
          .post(`${process.env.VUE_APP_API_URL}addScholarships`, new_idaship)
          .then((res) => {
            console.log(res.data)
            console.log(this.school_id)
            this.$router.push("/university");
            return this.$emit("show", "scholarship");
          })
          .catch((error) => {
            console.error(error);
          });
      }
    },
    cancel() {
      this.$router.push("/university");
      return this.$emit("show", "scholarship");
    },
    onFileChange(event) {
      // Retrieve the selected image file
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          // Convert the image to base64 encoding
          const base64Image = reader.result;
          this.image = base64Image; // Store the base64 encoded image
        };
        reader.readAsDataURL(file);
      }
    },

    fetchSkills() {
      axios
        .get(`${process.env.VUE_APP_API_URL}majors`)
        .then((response) => {
          this.getSkills = response.data.data;
          this.getSkills.forEach((item) => {
            this.skills.push(item.name);
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
    // covert name _id to id from select
    skillId() {
      let id = null;
      this.getSkills.forEach((item) => {
        if (item.name == this.skill_id) {
          id = item.id;
        }
      });
      return id;
    },
    shoolId(){
      const userData = Cookies.get('userData');
      let school_id = ''
          // If the "userData" cookie exists, parse it and set the user ID in the component data
        if (userData) {
            const userDataObj = JSON.parse(userData);
            school_id= userDataObj.data.school_id

        }
        return school_id;
    },
  },
  
  mounted() {
    this.fetchSkills();
  },
};
</script>

<style scoped>
form {
  width: 80%;
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  padding: 20px;
  background: #ffffff;
  margin: auto;
  margin-right: 15px;
}
.groupForm {
  margin: 20px;
}

.item {
  display: flex;
  gap: 20px;
  margin: 10px;
}

h1 {
  text-align: center;
  color: orange;
  margin-top: 20px;
  margin-bottom: 20px;
}

.add,
.cancel {
  margin-left: 5px;
  background-color: #634b7a;
  color: #f6eeee;
}
.add-cancel {
  display: flex;
  margin-left: 77%;
}
</style>
