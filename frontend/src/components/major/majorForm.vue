
<template>
    <div class="major-container">
      <div>
        <img src="../../assets/images/register.png" alt="">
      </div>
        <!--  copy right by vuetify https://vuetifyjs.com/en/components/forms/ -->
      <v-sheet width="500" class="form-add">
        <v-form fast-fail @submit.prevent>
            <h2>Add Major</h2>

          <h4>Name of Major</h4>
          <v-text-field
            v-model="name"
            label="name"
            :rules="nameRules"
          ></v-text-field>

          <h4>Description</h4>
          <v-text-field
            v-model="description"
            label="Description"
            :rules="descriptionRules"
          ></v-text-field>
          <!-- copy right vuitfy https://vuetifyjs.com/en/components/checkboxes/ -->
          <h4>Choose subjects</h4>
          <div class="subject" >
            <div v-for="(subject, id) in listSubject" :key="id">
                <v-checkbox class='text-black'
                    v-model="subjectsId"
                    :label="subject.subject"
                    :value="id"
                ></v-checkbox>
            </div>
          </div>
          <div class="input-image">
            <strong class="form-label">Image</strong>
            <input type="file" @change="getImage" />
            <p class='text' v-if="isAdd">image required</p>
          </div>
          <div class="btn">
            <button type="buttom" @click='this.$router.push("/")' block class="mt-2 text-white bg-purple" >cancel</button>
            <button type="submit" @click ="addMajor" class="mt-2 bg-orange text-white" >Create</button>
          </div>
        </v-form>
      </v-sheet>
    </div>
</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
      image: null,
      isAdd: false,
      name: '',
      listSubject:[],
      subjectsId:[],
      nameRules: [
        value => {
          if (value?.length > 0) return true

          return 'name reuqired.'
        },
      ],
      description: '',
      descriptionRules: [
        value => {
          if (value?.length > 0) return true

          return 'description required.'
        },

      ],
    };
  },
    methods:{
    addMajor() {
        if(this.image == null){
            this.isAdd = true;
        }
      if(this.name != "" && this.description != '' && this.image != ''){
        this.isAdd = false;
        const newMajor = {
          name: this.name,
          description: this.description,
          image: this.image, // Pass the image file to the API
          subjects:this.subjectsId,
        };
        axios.post(`${process.env.VUE_APP_API_URL}majors`,newMajor)
          .then(() => {
            this.$router.push("/");
          })
          .catch((error) => {
            console.error(error);
          });
      }
    },
    fechSubject(){
        axios.get(`${ process.env.VUE_APP_API_URL}subjects`)
        .then(response => {
            this.listSubject= response.data.data
        })
        .catch(error => {
            console.log(error)
        })
    },
    // get link image from back-end 
    // copy right by https://www.youtube.com/watch?v=chCtrNGrQhk
    getImage(event) {
      var file = event.target.files[0];
      var form = new FormData();
      form.append('image', file);
        axios.post(`${ process.env.VUE_APP_API_URL}image`,form)
        .then(response => {
            this.image = response.data.data
        })
        .catch(error => {
            console.log(error)
        })
    },
  },
    mounted(){
        this.fechSubject();
    }
};
</script>

<style scoped>
  .form-add{
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 20px;
    height:auto;
    border-radius: 10px;
  }
  .major-container{
    height:100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  h2{
    text-align: center;
    color:orange;
  }
  .text{
    color:rgb(168, 25, 20);
    font-size:12px;
    margin-left:20px;
  }
  .btn{
    display: flex;
    justify-content: space-between;
  }
  button{
        padding:8px 20px;
        border-radius: 10px;
    }
    .subject{
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }
    .input-image,h4{
        text-align: start;
        margin-bottom:10px;
    }
    .text{
    color:rgb(168, 25, 20);
    font-size:12px;
    margin-left:20px;
  }
  img{
    width:600px
  }


</style>