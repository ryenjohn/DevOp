// https://vuetifyjs.com/en/components/dialogs/
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
        <p v-bind="props" @click="checkLoginStatus">Join</p>
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
            CENCEL
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
        <p v-bind="props" @click="checkLoginStatus">Join</p>
      </template>
      <v-card>
        <v-card-title class="text-h5">
          Do you want to join the workshop?
        </v-card-title>
        <div style="text-align:center;">
          <img src="../../assets/images/workshop.jpg" alt="" width="300" height="250"/>
        </div>
        <v-card-text class="text" style="text-align:center;">Join our workshop.</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="purple"
            variant="text"
            @click="dialog = false"
          >
            NO
          </v-btn>
          <v-btn
            variant="text"
            @click="dialog = false"
          >
            <router-link to="/signUp" style="color: purple; text-decoration: none;"
              >YES</router-link>
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </template>
  </v-row>
</template>


