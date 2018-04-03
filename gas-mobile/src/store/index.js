import Vue from 'nativescript-vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

const store = new Vuex.Store({
  state: {
    session: null
  },
  mutations: {
    SET_USER (store, payload) {
      store.session = payload
    }
  }
})

export default store