<template>
  <div class="groupForm">
    <v-form ref="form" v-model="valid" @submit.prevent="updateScholarship">
      <h1>Update scholarship</h1>
      <div class="item">
        <v-text-field
          v-model="scholarships.name"
          label="Name"
          :rules="nameRules"
          density="compact"
          placeholder="Enter your Name"
          variant="outlined"
          color="#634B7A"
          class="input-field"
        ></v-text-field>
        <v-text-field
          v-model="scholarships.user_number"
          label="User number"
          :rules="userNumberRules"
          density="compact"
          placeholder="Enter your user number"
          variant="outlined"
          color="#634B7A"
          class="input-field"
        ></v-text-field>
      </div>
      <div class="item">
        <v-text-field
          v-model="scholarships.post_date"
          label="Post date"
          type="date"
          :rules="postDateRules"
          density="compact"
          placeholder="Enter your post date"
          variant="outlined"
          color="#634B7A"
          class="input-field"
        ></v-text-field>
        <v-text-field
          v-model="scholarships.expired_date"
          label="Expired date"
          type="date"
          :rules="expiredDateRules"
          density="compact"
          placeholder="Enter your expired date"
          color="#634B7A"
          variant="outlined"
          class="input-field"
        ></v-text-field>
      </div>
      <div class="item">
        <v-select
          v-model="scholarships.skill"
          :items="skills"
          label="Skill"
          variant="outlined"
          :rules="skillRules"
          class="input-field"
        ></v-select>
        <v-file-input
          @change="onFileChange"
          label="Image"
          :rules="imageRules"
          variant="outlined"
          class="input-field"
        ></v-file-input>
      </div>
      <div class="item">
        <v-textarea
          v-model="scholarships.description"
          label="Description"
          :rules="descriptionRules"
          color="#634B7A"
          variant="outlined"
          placeholder="Enter your description"
          
        ></v-textarea>
      </div>
      <div class="btn">
        <v-btn type="submit" class="text-white cancel-btn">Cancel</v-btn>
        <v-btn type="submit" class="bg-orange text-white edit">Update</v-btn>
      </div>
    </v-form>
  </div>
</template>

<script>
import Swal from 'sweetalert2'
import axios from "axios";
export default {
  props: ["editID"],
  data() {
    return {
      valid: false,
      scholarships: {
        name: "",
        user_number: "",
        skill: "",
        post_date: "",
        expired_date: "",
        image: null,
        description: "",
      },
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
          new Date(value) > new Date(this.scholarships.post_date) ||
          "Expired date must be greater than post date",
      ],
      imageRules: [(value) => !!value || "Image is required"],
      descriptionRules: [(value) => !!value || "Description is required"],
    };
  },
  methods: {
    showData() {
      axios
        .get(`${process.env.VUE_APP_API_URL}scholarships/edit/${this.editID}`)
        .then((response) => {
          this.scholarships = response.data.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },

    updateScholarship() {
      if (this.valid) {
        this.scholarships.image = this.image;
        axios
          .put(
            `${process.env.VUE_APP_API_URL}editScholarships/${this.editID}`, this.scholarships)
          .then(() => {
            this.alertMessage();
            this.$router.push("/university");
            return this.$emit("show", "scholarship");
          })
          .catch((error) => {
            console.error(error);
          });
      }
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
    // covert name school to id from select
    skillId() {
      let id = null;
      this.getSkills.forEach((item) => {
        if (item.name == this.scholarships.skill) {
          id = item.id;
        }
      });
      return id;
    },
    cancel() {
      this.$router.push("/university");
      return this.$emit("show", "scholarship");
    },
    alertMessage(){
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Your work has been updated',
        showConfirmButton: false,
        timer: 2000
      })
    },
  },
  mounted() {
    this.showData();
    this.fetchSkills();
  },
};
</script>
<style scoped>
form {
  width: 85%;
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
  border-radius: 3px;
  padding: 20px;
  background: #ffffff;
  margin: auto;
  margin-right: 5px;
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
.btn {
  display: flex;  
  justify-content: end;
  margin-right:1%;
}
.cancel-btn{
  margin-right:10px;
  background:#634b7a;
}

.input-field {
  width: 50%;
}
</style>
