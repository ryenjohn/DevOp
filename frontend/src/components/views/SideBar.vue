<template>
  <v-card>
    <v-layout>
      <v-navigation-drawer
        
      >
        <v-list>
          <v-list-item
            prepend-avatar="https://i.pinimg.com/564x/4a/61/d8/4a61d8c53b8a1219b0bd7319c5eb8b69.jpg"
            subtitle="sandra_a88@gmailcom"
          ></v-list-item>
        </v-list>

        <v-divider></v-divider>

        <v-list density="compact" nav>
          <v-list-item :to="{ path: '/allstudents' }" prepend-icon="mdi-account-school"  title="Students" value="Students"></v-list-item>
          <v-list-item :to="{ path: '/alluniversity' }" prepend-icon="mdi-school" title="University" value="University"></v-list-item>
          <v-list-item :to="{ path: '/allusers' }" prepend-icon="mdi-account" title="Users" value="Users"></v-list-item>
        </v-list>
      </v-navigation-drawer>

      <v-main style="height: 250px"></v-main>
    </v-layout>
  </v-card>
</template>