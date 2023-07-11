import { createRouter, createWebHistory } from 'vue-router'

import SignUp from '../components/authentication/SignUp.vue'
import LogIn from '../components/authentication/LogIn.vue'
import About from '../views/AboutView.vue'
import Contact from '../views/ContactView.vue'

import Home from '../views/HomeView.vue'
import Detail from '../views/DetailView.vue'
// import 

import AdminPage from '../components/adminpage/AdminPage.vue'
import AllStudentData from '../components/adminpage/AllStudentData.vue'
import AllUniversity from '../components/adminpage/AllUniversity.vue'
import AllUser from '../components/adminpage/AllUser.vue'


const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/signUp',
    name: 'signUp',
    component: SignUp
  },

  {
    path: '/logIn',
    name: 'logIn',
    component: LogIn
  },

  {
    path: '/about',
    name: 'about',
    component: About
  },
  {
    path: '/contact',
    name: 'contact',
    component: Contact
  },
  {
    path: '/detail/:dataname/:id',
    name: 'detail',
    component: Detail
  },
  


  // Admin route
  {
    path: '/admin',
    name: 'admin',
    component: AdminPage
  },
  {
    path: '/allstudents',
    name: 'student',
    component: AllStudentData
  },
  {
    path: '/alluniversity',
    name: 'alluniversity',
    component: AllUniversity
  },
  {
    path: '/allusers',
    name: 'allusers',
    component: AllUser
  }

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
