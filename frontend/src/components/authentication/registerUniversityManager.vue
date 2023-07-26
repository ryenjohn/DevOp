<template>
    <div class="groupForm">
        <v-form v-model="valid" @submit="checkForm">
            <h2 style="margin-top:-12px">User data</h2> 
            <div class="item">
                <v-text-field 
                    v-model="name" 
                    :rules="nameRules" 
                    required
                    density="compact"
                    placeholder="Enter your Name"
                    variant="outlined"
                    color="#634B7A"
                ></v-text-field>
                <div class="gender" style="width:48%;">
                    <select class="select" style="width:100%" v-model="gender" >
                        <option value="null">Choose the user gender:</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                        <option value="other">other</option>
                    </select>
                    <p v-if="errors.length">
                        <span v-for="error in errors" :key="error" style="color:#ae2012; font-size:13px">
                            {{error.gender}}
                        </span>
                    </p>
                </div>
            </div>
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
                <select class="select" style="width:49%" v-model="userAddresses">
                    <option v-for='address in userAddresses' :key="address" :value="address.id">{{address.name}}</option>
                </select>
            </div>
            <h2 style="margin-top:-12px">Universty data</h2> 
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
                <select class="select"  v-model="universityAddresses">
                    <option value="Choose the school address" >Choose the school address:</option>
                    <option  v-for='address in universityAddresses ' :key="address" :value="address.id">{{address.name}}</option>
                </select>
                <select class="select" v-model="schoolTypes">
                    <option value="none">Choose the school type:</option>
                    <option  v-for='type in schoolTypes ' :key="type" :value="type.id">{{type.name}}</option>
                </select>
            </div>
            <v-container fluid class="pt-0"  id="checkbox">
                <v-checkbox
                    v-for="skill in skills" :key="skill"
                    v-model="skillSelect"
                    :label=skill.name
                    :value="skill.id"
                    :rules="checkboxRules"
                    
                    style="height:30px"
                ></v-checkbox>
                <p v-if="errors.length">
                    <span v-for="error in errors" :key="error" style="color:#ae2012; font-size:13px">
                        {{error.skillSelect}}
                    </span>
                </p>
            </v-container>

            <input type="file" @change="onFileChange"  />
            <p v-if="errors.length">
                <span v-for="error in errors" :key="error" style="color:#ae2012; font-size:13px">
                    {{error.image}}
                </span>
            </p>

            <v-textarea
                v-model="descriptions"
                bg-color="grey-lighten-2"
                color="cyan"
                variant="outlined"
                label="University Description"
                :rules="descriptionRules"
                rows="2"
            ></v-textarea>
            <v-btn type="button" @click="createSchool()">Submit</v-btn>
        </v-form>
    </div>
</template>

<script>
import axios from 'axios'
import Cookies from "js-cookie";
export default {
    data() {
        return {
            errors: [],
            name: '',
            phone: '',
            email: '',
            userAddresses: null, 
            universityAddresses: '',
            checkbox: '',
            password: '',
            universityName: '',
            schoolTypes:null,
            skills :null,
            skillSelect: [],
            image:null,
            descriptions:'',
            valid: true,
            newUserID:'',
            newSchool:[],
            role_id:2,
            selectedUserAddress:null,
            gender:null,
            imageValidate:null,
            nameRules: [
                value => !!value || 'Name is required',
                value => (value && value.length >= 2) || 'Name needs to be at least 2 characters',
            ],
            phoneRules: [
                value => !!value || 'phone is required',
                value => !value || (value && value.length > 8 && /[0-9-]+/.test(value)) || 'Phone number needs to be at least 9 digits',
            ],
            emailRules: [
                value => !!value || 'Email is required',
                value => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'E-mail must be valid',
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
        createSchool(){
            //  create school
            axios.post(`${ process.env.VUE_APP_API_URL}schools`, {
                name: this.universityName,
                image: this.image,
                description: this.descriptions,
                type_education_id: this.schoolTypes,
                address_id: this.universityAddresses,
                skills: this.getMajorId()
            })
            .then((res) => {
                console.log(res)
                this.createUser(res.data.data.id)
               
            })
            .catch((error) => {
                console.log(error);
            })

        },
        createUser($id){
            console.log($id)
             axios.post(`${ process.env.VUE_APP_API_URL}users`, {

                name: this.name,
                email: this.email,
                password: this.password,
                phone: this.phone,
                gender:this.gender,
                role_id: this.role_id,
                address_id: this.userAddresses,
                school_id: $id
            })
            .then((res) => {
                Cookies.set("userData", JSON.stringify(res.data), { expires: 30 });
                this.$router.push('/')
            

            })
            .catch((error) => {
                console.error(error.response.data);
            }) 
        },

        getAddress(){
            axios.get(`${ process.env.VUE_APP_API_URL}addresses`).then((res)=>{
            this.userAddresses = res.data.data;
            this.universityAddresses = res.data.data;
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
        },

        getMajorId(){
            let total = []
            for(let i=0;i<this.skillSelect.length;i++){
                total.push(this.skillSelect[i]);
            }
            return total
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

        /* https://v2.vuejs.org/v2/cookbook/form-validation.html */
        checkForm: function (e) {
            if (this.gender && this.skillSelect && this.image) {
                return true;
            }
            this.errors = [];

            if (!this.gender) {
                this.errors.push({gender:'Gender required.'});
            } 
            if ((this.skillSelect).length==0) {
                this.errors.push({skillSelect:'SkillSelect required.' });
            }
            if (!this.image) {
                    this.errors.push({image:'Image required.'});
            }
            console.log(this.errors);
            e.preventDefault();
        },
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
  border: 1px solid rgb(124, 121, 121);
  padding: 20px;
  background: #d8d6d6;
  margin: 20px;
}

.select{
    width: 50%;
    height: 44px;
    color: rgb(141, 137, 137);
    border: 1px solid rgb(124, 123, 123);
    outline-style:solid 1px ;
    border-radius: 5px;
}
input[type="file"]{
    padding: 8px;
    width: 100%;
    background: white;
    border: 1px solid rgb(124, 123, 123);
    margin-bottom: 15px;

}
.groupForm{
  margin-left: 13%;
}
.item{
  display: flex;
  gap: 20px;
  margin-bottom: 10px;
}

#checkbox {
    display: grid;
    grid-template-columns: repeat(5, 1fr); 
    grid-gap: 10px; 
    margin-bottom: 10px;
}
/* v-checkbox{
    background-color: aqua;
} */
h2{
  text-align: center;
  color: orange;
  margin-top: 20px;
}
h3{
  margin-top: 10px;
}


</style>