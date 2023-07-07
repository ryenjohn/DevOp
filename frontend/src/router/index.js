import { createWebHistory, createRouter  } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import SignUp from '../components/authentication/SignUp.vue'
import About from '../views/AboutView.vue'
import Contact from '../views/ContactView.vue'
import AdminPage from '../components/adminpage/AdminPage.vue'
import AllStudentData from '../components/adminpage/AllStudentData.vue'
import AllUniversity from '../components/adminpage/AllUniversity.vue'
import AllUser from '../components/adminpage/AllUser.vue'

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
    path: '/contact',
    name: 'contact',
    component: Contact
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
