import { createWebHistory, createRouter  } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import SignUp from '../components/authentication/SignUp.vue'
import About from '../views/AboutView.vue'
import Contact from '../views/ContactView.vue'
import MajorForm from '../components/major/majorForm.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
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
    path: '/addMajor',
    name: 'addMajor',
    component: MajorForm
  },
  {
    path: '/contact',
    name: 'contact',
    component: Contact
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
