export default {
    getTab(state) {
        return state.tabUpload;
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

    getUploadId(state){
        return state.uploadId;
    }
    
    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};