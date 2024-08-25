// router/index.js

import { Component } from '@fullcalendar/core/preact.js'
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
  // Otras rutas dinámicas aquí
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
})

export default router