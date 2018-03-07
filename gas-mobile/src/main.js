import Vue from 'nativescript-vue'
import router from './router/routes'
import store from './store'
import './styles.scss'

router.replace('/home')
new Vue({
  store,
  router
}).$start()
