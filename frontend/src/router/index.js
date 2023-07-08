import { createRouter, createWebHistory } from 'vue-router'
import SignUp from '../components/authentication/SignUp.vue'
import About from '../views/AboutView.vue'
import Contact from '../views/ContactView.vue'
import Home from '../views/HomeView.vue'
import Detail from '../views/DetailView.vue'
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
    path: '/detail/:id/:dataname',
    name: 'detail',
    component: Detail
  }
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
