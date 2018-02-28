import Vue from 'nativescript-vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router'

import counter from './modules/counter'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    counter,
  },
  strict: debug,
})
