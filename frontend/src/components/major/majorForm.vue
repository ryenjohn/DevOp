<template>
<section>
    <div class="form-container">
        <!--  copy right by vuetify https://vuetifyjs.com/en/components/forms/ -->
      <v-sheet width="600" class="form-add">
        <v-form fast-fail @submit.prevent>
            <h2>Add Major</h2>
          <v-text-field
            v-model="name"
            label="name"
            :rules="nameRules"
          ></v-text-field>
          <v-text-field
            v-model="description"
            label="Description"
            :rules="descriptionRules"
          ></v-text-field>
          <!-- copy right vuitfy https://vuetifyjs.com/en/components/checkboxes/ -->
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
            <input type="file" class="form-control" />
          </div>
          <div class="btn">
            <button type="submit" block class="mt-2 bg-orange text-white" >Create</button>
            <button type="buttom" @click='this.$router.push("/")' block class="mt-2 text-white bg-purple" >cancel</button>
          </div>
        </v-form>
      </v-sheet>
    </div>
</section>
</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
      image: null, 
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
        fechSubject(){
            axios.get('http://127.0.0.1:8000/api/subjects')
            .then(response => {
                this.listSubject= response.data.data
                console.log(this.listSubject);
            })
            .catch(error => {
                console.log(error)
            })
        }
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
  .form-container{
    height:80vh;
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
    .input-image{
        text-align: start;
        margin-bottom:10px;
    }

</style>