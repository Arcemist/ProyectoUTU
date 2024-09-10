// router/index.js
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'inicio',
    component: () => import('@/pages/Registro.vue'),
  },
  {
    path: '/paginas/:id',
    name: 'paginas',
    component: () => import('@/pages/AdminPage.vue'),
  },
  {
    path: '/Formulario',
    name: 'Formulario',
    component: () => import('@/components/Formulario.vue'),
  },
  {
    path: '/AdminPage',
    name: 'AdminPage',
    component: () => import('@/pages/AdminPage.vue'),
  },
  // Otras rutas dinámicas aquí
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
})

export default router
