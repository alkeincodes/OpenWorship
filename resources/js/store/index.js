import Vue from 'vue'
import Vuex from 'vuex'

import auth from '@/core/modules/App/auth.store'
import stage from '@/core/modules/Main/stage.store'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      ongoingRequest: false
    },
    modules: {
      auth,
      stage
    }
  });
