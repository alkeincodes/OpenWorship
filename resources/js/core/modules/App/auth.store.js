const namespaced = true;

const state = {
    user: null
}

const mutations = {
    SET_CURRENT_USER(state, payload) {
        state.user = payload
    }
}

const actions = {
    logout() {
        axios.post('/logout').then(() => {
            location.href = '/login'
        })
    }
}

const getters = {
    user: state => state.user
}

export default {
    namespaced,
    state,
    mutations,
    actions,
    getters
  }
