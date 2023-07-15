import mutations from './mutations';
import actions from './actions';
import getters from './getters';

export default {

    namespaced: true,

    state() {
        return {
            tabInvoice: 'entries',
            chartOfAcountForm: '',
            invoiceGenerate: false,

            paymentView: false,
            paymentId: null,

            invoiceView: false,
            invoiceId: null,

            setInvoice: false,

            // SNACKBAR
            snackBarState: false,
            snackBarMessage: 'Successfully submited',
        };
    },
    mutations: mutations,
    actions: actions,
    getters: getters,
};