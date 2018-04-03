import Vue from 'nativescript-vue'
import router from './router/routes'
import store from './store'
// import { setStatusBarColors } from './utils/statusBar'
import './styles.scss'
// setStatusBarColors()
Vue.prototype.$store = store
router.replace('/home')
new Vue({
  store,
  router
}).$start()
