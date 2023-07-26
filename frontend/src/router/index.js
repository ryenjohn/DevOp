import { createRouter, createWebHistory } from 'vue-router'

import SignUp from '../components/authentication/SignUp.vue'
import LogIn from '../components/authentication/LogIn.vue'

import sendMail from '../components/authentication/sendEmail.vue'
import resetPassword from '../components/authentication/resetPassword.vue'
import universityManager from '../components/authentication/registerUniversityManager.vue'

import AddWorkshop from '../components/workshop/workShop.vue'

import UpdateWorkshop from '../components/workshop/workShopUpdate.vue'

import About from '../views/AboutView.vue'
import Contact from '../views/ContactView.vue'

import MajorForm from '../components/major/majorForm.vue'

import PaymentForm from '../components/payment/PaymentForm.vue'
import PaymentByCard from '../components/payment/PaymentByCard.vue'


import Home from '../views/HomeView.vue'
import Detail from '../views/DetailView.vue'
import Admin from '../views/AdminView.vue'
import UniversityApplyForm from '../components/university/UniversityApplyForm.vue'

import University from '../views/UniversityAdminView.vue'



const routes = [
  {
    path: '/',
    name: 'Home',
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
    path: '/addMajor',
    name: 'addMajor',
    component: MajorForm
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
  path: '/apply',
  name: 'apply',
  component: UniversityApplyForm
  },
  {
    path: '/university',
    name: 'university',
    component: University
  },

  {
    path: '/sendMail/:title',
    name: 'sendMail',
    component: sendMail
  },
  {
    path: '/resetPassword',
    name: 'resetPassword',
    component: resetPassword
  },
  {
    path: '/registerAdmin',
    name: 'registerAdmin',
    component: universityManager
  },
  {
    path: '/addWorkshop',
    name: 'addWorkshop',
    component: AddWorkshop
  },
  {
    path: '/updateWorkshop',
    name: 'updateWorkshop',
    component: UpdateWorkshop
  },
  {
    path: '/payment',
    name: 'payment',
    component: PaymentForm
  },
  {
    path: '/paymentbycard',
    name: 'paymentbycard',
    component: PaymentByCard
  }

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
