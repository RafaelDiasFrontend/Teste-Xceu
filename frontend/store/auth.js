export const getters = {
  authenticated (state) {
    return state.loggedIn
  },
  user (state) {
    return state.user
  },
  logincount (state) {
    return state.logincount
  },
  ability (state) {
    return state.ability
  }
}