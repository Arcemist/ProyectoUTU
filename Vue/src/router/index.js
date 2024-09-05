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
    path: '/FormularioGuardia',
    name: 'FormularioGuardia',
    component: () => import('@/pages/formularioGuardia.vue'),
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
