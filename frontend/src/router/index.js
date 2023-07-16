import { createRouter, createWebHistory } from 'vue-router'

import SignUp from '../components/authentication/SignUp.vue'
import LogIn from '../components/authentication/LogIn.vue'
import sendMail from '../components/authentication/sendEmail.vue'
import resetPassword from '../components/authentication/resetPassword.vue'
import About from '../views/AboutView.vue'
import Contact from '../views/ContactView.vue'

import Home from '../views/HomeView.vue'
import Detail from '../views/DetailView.vue'
import Admin from '../views/AdminView.vue'



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
  
  {
    path: '/admin',
    name: 'admin',
    component: Admin
  },
  {
    path: '/sendMail',
    name: 'sendMail',
    component: sendMail
  },
  {
    path: '/resetPassword',
    name: 'resetPassword',
    component: resetPassword
  }

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
