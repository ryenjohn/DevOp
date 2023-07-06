import { createRouter, createWebHistory } from 'vue-router'
import UniversityDetail from '../views/UniversityDetail.vue'
import SkillDetail from '../views/SkillDetail.vue'
import UniversityView from '../views/UniversityView.vue'
import SkillView from '../views/SkillView.vue'
import WorkshopView from '../views/WorkshopView.vue'
import ScholarshipView from '../views/ScholarshipView.vue'

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
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
