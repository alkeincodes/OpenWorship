const namespaced = true;

const state = {
    stageContent: {
        user_id: null,
        background: null,
        stage_type: null,
        displayable: JSON.stringify({title:'',line: '',by:''})
    }
}

const mutations = {
    SET_STAGE_CONTENT(state, payload) {
        state.stageContent[payload.key] = payload.value
    },
    RIPPLE_SET_STAGE_CONTENT(state, payload) {
        state.stageContent = payload.value
    },
}

const actions = {
    createStageSession({commit}, payload) {
        return axios.post('/create-session', payload).then(({data}) => {
            return data
        }).catch((e) => {
            return e.response
        })
    },
    updateStageSession({commit}, payload) {
        return axios.put(`/stage/${payload.session_hash}`, payload).then(({data}) => {
            return data
        }).catch((e) => {
            return e.response
        })
    },
    endStageSession({commit}, hash) {
        return axios.delete(`/stage/${hash}`)
    }
}

const getters = {
    stageContent: state => state.stageContent
}

export default {
    namespaced,
    state,
    mutations,
    actions,
    getters
  }
