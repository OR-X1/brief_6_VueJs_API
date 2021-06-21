import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/authenticationParReference',
    name: 'AuthenticationParReference',

    component: () => import('../views/authenticationParReference.vue')
  },
  {
    path: '/nouveauUtilisateur',
    name: 'NouveauUtilisateur',

    component: () => import('../views/nouveauUtilisateur.vue')
  },
  {
    path: '/creneauxDisponibles/:reference',
    name: 'CreneauxDisponibles',

    component: () => import('../views/creneauxDisponibles.vue')
  },
  {
    path: '/AjouterUnCreneau/:reference',
    name: 'ajouterUnCreneau',

    component: () => import('../views/ajouterUnCreneau.vue')
  }
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
