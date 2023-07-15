export default {
    setTab(state, tabInvoice) {
        state.tabInvoice = tabInvoice;
    },

    setInvoiceGenerate(state) {
        state.invoiceGenerate = !state.invoiceGenerate;
    },

    setSnackBarState(state){
        state.snackBarState = !state.snackBarState;
    },

    setInvoiceView(state, id){
        state.invoiceView = !state.invoiceView;
        state.invoiceId = id;
    },

    setChartOfAcountForm(state , tab){
        state.chartOfAcountForm = tab;
    },

    setPaymentView(state , id){
        state.paymentView = !state.paymentView;
        state.paymentId = id;
    },

    setInvoice(state){
        state.setInvoice = !state.setInvoice;
    },
};