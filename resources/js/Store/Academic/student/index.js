import mutations from './mutations';
import actions from './actions';
import getters from './getters';

export default {

    namespaced: true,

    state() {
        return {
            tab: 'all',
            addStudent: false,
            editStudent: false,

            // invoiceView: false,
            studentId: null,

            // SNACKBAR
            snackBarState: false,
            snackBarMessage: 'Successfully submited',
        };
    },
    mutations: mutations,
    actions: actions,
    getters: getters,
};