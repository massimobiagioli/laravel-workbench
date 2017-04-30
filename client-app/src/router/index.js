import Vue from 'vue'
import Router from 'vue-router'
import Vuetify from 'vuetify'
import Home from '@/components/Home'
import Counter from '@/components/Counter'
import Machine from '@/components/Machine'

Vue.use(Router)
Vue.use(Vuetify)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/counter',
      name: 'Counter',
      component: Counter
    },
    {
      path: '/machine',
      name: 'Machine',
      component: Machine
    }
  ]
})
