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
import ProcurementReport from '../Store/procurement/Report/index'
import AccountantInvoice from '../Store/Accountant/invoice/index';
import AccountantUpload from "../Store/accountant/Upload/index";
import AccountantReport from "../Store/accountant/Report/index";
import AcademicStudent from '../Store/Academic/student/index';
import AcademicUpload from "../Store/Academic/Upload/index";
import HeadDepartment from "../Store/head/department/index";
import HeadInvoice from '../Store/head/invoice/index';
import HeadTool from '../Store/head/tool/index';
import HeadStudent from '../Store/head/student/index';

Vue.use(Vuex);

const counterModule = invoiceModules;

const ProcurementInvoiceModule = Procurementinvoice;

const ProcurementToolModule = Procurementtool;

const ProcurementUploadModule = ProcurementUpload;

const ProcurementReportModule = ProcurementReport;

const AccountantInvoiceModule  = AccountantInvoice;

const AccountantReportModule = AccountantReport;

const AcademicStudentModule = AcademicStudent;

const AcademicUploadModule = AcademicUpload;

const AccountantUploadModule = AccountantUpload;

const HeadDepartmentModule = HeadDepartment;

const HeadInvoiceModule = HeadInvoice;

const HeadToolModule = HeadTool;

const HeadStudentModule = HeadStudent;


const store = new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        invoice: counterModule,
        
        ProcurementInvoiceModule: ProcurementInvoiceModule,

        ProcurementToolModule: ProcurementToolModule,

        ProcurementUploadModule: ProcurementUploadModule,

        ProcurementReportModule: ProcurementReportModule,

        AccountantInvoiceModule: AccountantInvoiceModule,

        AccountantUploadModule: AccountantUploadModule,

        AccountantReportModule: AccountantReportModule,

        AcademicStudentModule: AcademicStudentModule,

        AcademicUploadModule: AcademicUploadModule,

        HeadDepartmentModule: HeadDepartmentModule,
        
        HeadInvoiceModule: HeadInvoiceModule,

        HeadToolModule: HeadToolModule,

        HeadStudentModule: HeadStudentModule,
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
