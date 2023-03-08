export default {
    setTab(context, tab) {
        // for data will be data.value

        context.commit("setTab", tab);
    },

    setInvoiceGenerate(context){
        context.commit("setInvoiceGenerate");
    },
    
    setSnackBarState(context){
        context.commit("setSnackBarState");
    }
};