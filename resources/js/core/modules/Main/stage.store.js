const namespaced = true;

const state = {}

const mutations = {}

const actions = {
    createStageSession({commit}, payload) {
        return axios.post('/create-session', payload).then(({data}) => {
            return data
        }).catch((e) => {
            return e.response
        })
    }
}

const getters = {}

export default {
    namespaced,
    state,
    mutations,
    actions,
    getters
  }
