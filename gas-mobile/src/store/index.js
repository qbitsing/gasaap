import Vue from 'nativescript-vue'
import Vuex from 'vuex'

import sesion from './modules/sesion'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    sesion
  },
  strict: debug,
})
