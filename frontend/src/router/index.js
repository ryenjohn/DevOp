import { createRouter, createWebHistory } from 'vue-router'

import SignUp from '../components/authentication/SignUp.vue'
import LogIn from '../components/authentication/LogIn.vue'
import sendMail from '../components/authentication/sendEmail.vue'
import resetPassword from '../components/authentication/resetPassword.vue'
import About from '../views/AboutView.vue'
import Contact from '../views/ContactView.vue'

import MajorForm from '../components/major/majorForm.vue'

import PaymentForm from '../components/payment/PaymentForm.vue'
import PaymentByCard from '../components/payment/PaymentByCard.vue'


import Home from '../views/HomeView.vue'
import Detail from '../views/DetailView.vue'
import Admin from '../views/AdminView.vue'
import UniversityApplyForm from '../components/university/UniversityApplyForm.vue'
// import 



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
    path: '/sendMail',
    name: 'sendMail',
    component: sendMail
  },
  {
    path: '/resetPassword',
    name: 'resetPassword',
    component: resetPassword
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
