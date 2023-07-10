import { createRouter, createWebHistory } from 'vue-router'
import UniversityDetail from '../views/UniversityDetail.vue'
import SkillDetail from '../views/SkillDetail.vue'
import UniversityView from '../views/UniversityView.vue'
import SkillView from '../views/SkillView.vue'
import WorkshopView from '../views/WorkshopView.vue'
import ScholarshipView from '../views/ScholarshipView.vue'
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
    component: UniversityView
  },
  {
    path: '/skill/',
    name: 'skill/',
    component: SkillView
  },
  {
    path: '/workshop/',
    name: 'workshop/',
    component: WorkshopView
  },
  {
    path: '/scholarship/',
    name: 'scholarship/',
    component: ScholarshipView
  },
  {
    path: '/university/:id',
    name: 'university/:id',
    component: UniversityDetail
  },
  {
    path: '/skill/:id',
    name: 'skill/:id',
    component: SkillDetail
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
