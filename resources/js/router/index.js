import { createRouter, createWebHistory } from 'vue-router'
import Vitrine from '../Pages/vitrine.vue'
import Connexion from '../Pages/conexion/login.vue'
import Inscription from '../Pages/inscriptions/create.vue'

const routes = [
  { path: '/', name: 'Vitrine', component: Vitrine },
  { path: '/connexion', name: 'Connexion', component: Connexion },
  { path: '/inscription', name: 'Inscription', component: Inscription },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
