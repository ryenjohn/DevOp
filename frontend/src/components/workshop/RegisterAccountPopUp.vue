<template>
  <v-row justify="center">
    <!-- first diolog -->
    <template v-if="!isLoggedIn">
    <v-dialog
      v-model="dialog"
      persistent
      width="500px"
    >
      <template v-slot:activator="{ props }">
        <p v-bind="props">Join</p>
      </template>
      <v-card>
        <v-card-title class="text-h5">
          Do you have an account?
        </v-card-title>
        <div style="text-align:center;">
          <img src="../../assets/images/profile.jpg" alt="" width="300" height="300"/>
        </div>
        <v-card-text class="text" style="text-align:center;">Register now to join our workshop.</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="purple"
            variant="text"
            @click="dialog = false"
          >
            Cancel
          </v-btn>
          <v-btn
            variant="text"
            @click="dialog = false"
          >
            <router-link to="/signUp" style="color: purple; text-decoration: none;"
              >REGISTER</router-link>
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    </template>

    <!-- 2nd diolog -->
     <template v-else>
        <v-dialog
      v-model="dialog"
      persistent
      width="500px"
    >
      <template v-slot:activator="{ props }">
        <p v-bind="props">Join</p>
      </template>
      <v-card>
        <v-card-title class="text-h5">
          ?
        </v-card-title>
        <div style="text-align:center;">
          <img src="../../assets/images/profile.jpg" alt="" width="300" height="300"/>
        </div>
        <v-card-text class="text" style="text-align:center;">join our workshop.</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="purple"
            variant="text"
            @click="dialog = false"
          >
            no
          </v-btn>
          <v-btn
            variant="text"
            @click="dialog = false"
          >
            <router-link to="/signUp" style="color: purple; text-decoration: none;"
              >yes</router-link>
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    </template>
  </v-row>
</template>

<script>
export default {
    data () {
      return {
        isLoggedIn: true,
        dialog: false,
      }
    },
  }
</script>

<style>
.text-h5{
  color: orange;
}
.text{
  color: #634b7a;
}
p{
  color: white;
  background-color: orange;
  padding: 5px;
  width: 4%;
  text-align: center;
  border-radius: 5px;
  margin-top: 5%;
  margin-bottom: 5%;
}

</style>