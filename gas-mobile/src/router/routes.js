
import Vue from 'nativescript-vue'
import VueRouter from 'vue-router'
import Home from '../components/Home'
import Register from '../components/Register'

Vue.use(VueRouter);

const router = new VueRouter({
    pageRouting: true,
    routes: [
      {path: '/home', component: Home},
      {path: '/register', component: Register},
      {path: '*', redirect: '/home'}
    ]
  });

export default router