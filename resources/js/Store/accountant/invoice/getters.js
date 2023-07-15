export default {
    getTab(state) {
        return state.tabInvoice;
    },

    getInvoiceGenerate(state){
        return state.invoiceGenerate;
    },

    getSnackBarMessage(state){
        return state.snackBarMessage;
    },

    getSnackBarState(state){
        return state.snackBarState;
    },

    getInvoiceView(state){
        return state.invoiceView;
    },

    getInvoiceId(state){
        return state.invoiceId;
    },

    getChartOfAcountForm(state){
        return state.chartOfAcountForm;
    },

    getPaymentView(state){
        return state.paymentView;
    },

    getPaymentId(state){
        return state.paymentId;
    },

    getInvoice(state){
        return state.setInvoice;
    },
    
    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};