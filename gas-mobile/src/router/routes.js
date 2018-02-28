
import Vue from 'nativescript-vue'
import VueRouter from 'vue-router'

import Home from '../components/Home'
import Detail from '../components/Details'

Vue.use(VueRouter);

const router = new VueRouter({
    pageRouting: true,
    routes: [
      {path: '/home', component: Home},
      {path: '/detail', component: Detail},
      {path: '*', redirect: '/home'}
    ]
  });

export default router