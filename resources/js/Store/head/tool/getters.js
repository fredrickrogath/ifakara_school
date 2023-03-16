export default {
    getTab(state) {
        return state.tab;
    },

    getInvoiceGenerate(state){
        return state.invoiceGenerate;
    },

    getSnackBarMessage(state){
        return state.snackBarMessage;
    },

    getSnackBarState(state){
        return state.snackBarState;
    }

    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};