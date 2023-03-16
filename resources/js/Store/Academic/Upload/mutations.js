export default {
    setTab(state, tab) {
        state.tabUpload = tab;
    },

    setInvoiceGenerate(state) {
        state.invoiceGenerate = !state.invoiceGenerate;
    },

    setSnackBarState(state){
        state.snackBarState = !state.snackBarState;
    },

    setInvoiceView(state, id){
        state.invoiceView = !state.invoiceView;
        state.uploadId = id;
    },
};