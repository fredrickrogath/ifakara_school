export default {
    setTab(state, tab) {
        state.tab = tab;
    },

    setInvoiceGenerate(state) {
        state.invoiceGenerate = !state.invoiceGenerate;
    },

    setSnackBarState(state){
        state.snackBarState = !state.snackBarState;
    },
};