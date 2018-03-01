
import Vue from 'nativescript-vue'
import VueRouter from 'vue-router'
import Home from '../components/Home'
import Register from '../components/Register'
import Login from '../components/Login'
import Panel from '../components/Panel'
Vue.use(VueRouter);

const router = new VueRouter({
    pageRouting: true,
    routes: [
      {path: '/home', component: Home},
      {path: '/register', component: Register},
      {path: '/login', component: Login},
      {path: '/panel', component: Panel},
      {path: '*', redirect: '/home'}
    ]
  });

export default router