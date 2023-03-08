import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

import rootMutations from './mutations';
import rootActions from './actions';
import rootGettes from './getters';

import invoiceModules from '../Store/invoice/index';
import Procurementinvoice from '../Store/Procurement/invoice/index';
import Procurementtool from '../Store/Procurement/tool/index';

Vue.use(Vuex);

const counterModule = invoiceModules;

const ProcurementInvoiceModule = Procurementinvoice;

const ProcurementToolModule = Procurementtool;

const store = new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        invoice: counterModule,
        
        ProcurementInvoiceModule: ProcurementInvoiceModule,

        ProcurementToolModule: ProcurementToolModule,
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
