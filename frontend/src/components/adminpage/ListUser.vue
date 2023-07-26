<template>
  <div class="tablecontainer">
    <v-table class="my-table">
      <thead>
        <tr>
          <th class="text-center">
            No
          </th>
          <th class="text-center">
            Name
          </th>
          <th class="text-center">
            Email
          </th>
          <th class="text-center">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(data,index) in datas" :key="index" class="text-center">
          <td>{{ index+1 }}</td>
          <td>{{ data.name }}</td>
          <td>{{ data.email }}</td>
          <td>
            <v-btn color="primary">
              <span class="mdi mdi-pencil" @click="openDialogEdit(data.id)" style=" font-size: 24px; "></span>
            </v-btn>
            <span class="mdi mdi-delete" @click="openDialogDelete(data.id)" style="color: red; font-size: 24px;"></span>

          </td>
        </tr>
      </tbody>
    </v-table>
  </div>
  <v-dialog v-model="dialogDelete" max-width="400px">
    <v-card>
      <v-card-title>Delete Confirmation</v-card-title>
      <v-card-text>
        <p>Are you sure you want to delete this item?</p>
      </v-card-text>
      <v-card-actions>
        <v-btn @click="cancelEdit">No</v-btn>
        <v-btn color="red" dark @click="deleteUser">Yes</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>

  <v-dialog v-model="dialogEdit" width="auto">
    <v-card class="custom-dialog">
      <v-card-title class="custom-dialog-title">
        <v-icon left>mdi-pencil</v-icon>
        Edit Form
      </v-card-title>
      <v-card-text>
        <div class="container">
          <form @submit.prevent="updateUser" class="p-3">
            <div class="mb-5">
              <label class="form-label">Name</label>
              <input type="text" v-model="name" class="form-control" />
            </div>

            <div class="mb-5">
              <label class="form-label">Email</label>
              <input type="text" v-model="email" class="form-control" />
            </div>
          </form>
        </div>
      </v-card-text>
      <v-card-actions class="custom-dialog-actions">
        <v-btn color="primary" @click="cancelEdit" type="submit">Cancel</v-btn>
        <v-btn color="primary" @click="saveEdit(data.id)" type="submit">Save</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import axios from 'axios';

export default {
  props: ['datas'],
  data() {
    return {
      dialogEdit: false,
      dialogDelete:false,
      url: 'http://127.0.0.1:8000/api/user',
      data: [],
      name: '',
      email: '',
      deleteId: '',

    };
  },
  methods: {
    del() {
      return this.$emit('del')
    },
    fectchUser($id) {
      axios.get(this.url + `/${$id}`)
        .then((response) => {
          this.data = response.data.data;
          this.name = this.data.name
          this.email = this.data.email
        })
        .catch((error) => {
          console.error(error);
        })
    },

    openDialogEdit($id) {
      this.fectchUser($id);
      this.dialogEdit = true;

    },
    
    openDialogDelete($id){
      this.deleteId = $id;
      this.dialogDelete = true;
      console.log(this.dialogDelete);
    },

    cancelEdit() {
      this.dialogEdit = false;
      this.dialogDelete = false;
    },

    saveEdit($id) {

      console.log($id)
      const newData = {
        name: this.name,
        email: this.email,
      }

      axios.put(`${ process.env.VUE_APP_API_URL}user/` + $id, newData).then((res) => {
        console.log(res.data.data)
        this.dialog = false
      })
      axios.put(this.url + `/${$id}`, newData)
        .then(() => {


          this.dialog = false;
          location.reload();
        })
        .catch(error => {
          console.error('Error updating data:', error);
        })
    },

    updateUser() {

      const userId = this.$route.params.id;
      const newData = {
        name: this.data.name,
        email: this.data.email,
      }
      axios.get(this.url + `/${userId}`, newData)
        .then(() => {
          this.$route.push("/");
        })
        .catch((error) => {
          console.error(error);
        })
    },
    deleteUser() {
      axios.delete(`${ process.env.VUE_APP_API_URL}user/`+this.deleteId ).then(() => {
        this.dialogDelete = false
        location.reload()
      })
    }
  },
}

</script>

<style scoped>
.tablecontainer {
  margin-bottom: 100px;
}

.my-table {
  padding: 8px;
  width: 72%;
  margin-left: 23%;
  border: 1px solid rgb(181, 177, 177);
}

th {
  font-size: 25px;
}

td {
  font-size: 18px;

}

.button {
  font-size: 23px;
  margin-left: -48%;
  margin-bottom: 2%;
  background-color: rgb(137, 27, 240);
  color: white;
  padding: 6px;
  font-family: sans-serif;
}

h1 {
  text-align: center;
  margin-top: 5%;
}

.custom-dialog {
  background-color: #f3f3f3;
  width: 500px;
  border-radius: 8px;
}

.custom-dialog-title {
  background-color: #1a237e;
  color: white;
  border-radius: 8px 8px 0 0;
  padding: 16px;
}

.custom-dialog-actions {
  background-color: #e8e8e8;
  border-radius: 0 0 8px 8px;
  padding: 8px;
}

.form-label {
  color: #1a237e;
  font-weight: bold;
}

.form-control {
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 8px;
  width: 100%;
}
.role{
  outline-style: solid;
  outline-width: 1px;
}
</style>