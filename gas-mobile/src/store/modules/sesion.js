const state = {
    userData: null,
 }
  
  const mutations = {
    setUser (state, user) {
        state.userData = user
    }
  }
  
  export default {
    state,
    mutations
  }