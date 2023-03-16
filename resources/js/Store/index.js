import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

import rootMutations from './mutations';
import rootActions from './actions';
import rootGettes from './getters';

import invoiceModules from '../Store/invoice/index';
import Procurementinvoice from '../Store/Procurement/invoice/index';
import Procurementtool from '../Store/Procurement/tool/index';
import ProcurementUpload from '../Store/Procurement/Upload/index';
import AccountantInvoice from '../Store/Accountant/invoice/index';
import AcademicStudent from '../Store/Academic/student/index';
import HeadDepartment from "../Store/head/department/index";
import HeadInvoice from '../Store/head/invoice/index';
import HeadTool from '../Store/head/tool/index';

Vue.use(Vuex);

const counterModule = invoiceModules;

const ProcurementInvoiceModule = Procurementinvoice;

const ProcurementToolModule = Procurementtool;

const ProcurementUploadModule = ProcurementUpload;

const AccountantInvoiceModule  = AccountantInvoice;

const AcademicStudentModule = AcademicStudent;

const HeadDepartmentModule = HeadDepartment;

const HeadInvoiceModule = HeadInvoice;

const HeadToolModule = HeadTool;

const store = new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        invoice: counterModule,
        
        ProcurementInvoiceModule: ProcurementInvoiceModule,

        ProcurementToolModule: ProcurementToolModule,

        ProcurementUploadModule: ProcurementUploadModule,

        AccountantInvoiceModule: AccountantInvoiceModule,

        AcademicStudentModule: AcademicStudentModule,

        HeadDepartmentModule: HeadDepartmentModule,
        
        HeadInvoiceModule: HeadInvoiceModule,

        HeadToolModule: HeadToolModule,
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
