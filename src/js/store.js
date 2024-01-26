import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    isVisibleTerms: false,
    isVisiblePolitics: false,

    view: 'main',
  },
  mutations: {
    updateModalTerms: function(state, object) {
      if (object.type == 'terms')
        state.isVisibleTerms = object.status;

      if (object.type == 'politics')
        state.isVisiblePolitics = object.status;
    },

    changeView: function(state, payload) {
      state.view = (payload.view) ? payload.view : state.view;
    }
  },
  actions: {
    openTerms: function({ commit }, object) {
      if (object.e) object.e.preventDefault();

      commit('updateModalTerms', object);
    },

    changeView: function({ commit }, payload) {
      commit('changeView', payload);
    },
  }
})
