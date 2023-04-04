import { createRouter, createWebHistory } from 'vue-router'
import DashboardView from '../views/DashboardView.vue';
import RegisterView from '../views/RegisterView.vue';
import LoginView from '../views/LoginView.vue';
import RevenueView from '../views/RevenueView.vue';
import RevenueNewView from '../views/RevenueNewView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: LoginView
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: DashboardView
    },
    {
      path: '/revenue',
      name: 'revenue',
      component: RevenueView
    },
    {
      path: '/revenueNew',
      name: 'revenueNew',
      component: RevenueNewView
    },
    {
      path: '/revenueNew/:id',
      name: 'revenueNew',
      component: RevenueNewView
    },
  ]
})

export default router