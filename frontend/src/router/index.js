import { createRouter, createWebHistory } from 'vue-router'
import UniversityDetail from '../views/UniversityDetail.vue'
import SkillDetail from '../views/SkillDetail.vue'
import UniversityView from '../views/UniversityView.vue'
import SkillView from '../views/SkillView.vue'
import WorkshopView from '../views/WorkshopView.vue'
import ScholarshipView from '../views/ScholarshipView.vue'
import SignUp from '../components/authentication/SignUp.vue'
import ScholarshipDetailView from '../views/ScholarshipDetailView.vue'

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
    name: 'SignUp',
    component: SignUp
  },
  {
    path: '/scholarship/:id',
    name: 'scholarship/:id',
    component: ScholarshipDetailView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
