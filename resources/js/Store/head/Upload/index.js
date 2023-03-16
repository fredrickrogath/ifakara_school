import mutations from './mutations';
import actions from './actions';
import getters from './getters';

export default {

    namespaced: true,

    state() {
        return {
            tabUpload: 'all',
            // invoiceGenerate: false,

            uploadView: false,
            uploadId: null,

            // SNACKBAR
            snackBarState: false,
            snackBarMessage: 'Successfully submited',
        };
    },
    mutations: mutations,
    actions: actions,
    getters: getters,
};