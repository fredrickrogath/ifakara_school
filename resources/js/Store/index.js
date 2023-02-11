import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

import rootMutations from './mutations';
import rootActions from './actions';
import rootGettes from './getters';

import counterModules from '../Store/numbers/index';

Vue.use(Vuex);

const counterModule = counterModules;

const store = new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        numbers: counterModule,
    },
    state: {
        posts: [],
        routes: [],
        areRoutesLoaded: false,
    },
    mutations: rootMutations,
    actions: rootActions,
    getters: rootGettes,
});

export default store;
