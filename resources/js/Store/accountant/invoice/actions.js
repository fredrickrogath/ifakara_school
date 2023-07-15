export default {
    setTab(context, tabInvoice) {
        // for data will be data.value

        context.commit("setTab", tabInvoice);
    },

    setInvoiceGenerate(context){
        context.commit("setInvoiceGenerate");
    },
    
    setSnackBarState(context){
        context.commit("setSnackBarState");
    },

    setInvoiceView(context, id){
        context.commit("setInvoiceView", id);
    },

    setChartOfAcountForm(context, tab){
        context.commit("setChartOfAcountForm", tab);
    },

    setPaymentView(context, id){
        context.commit("setPaymentView", id);
    },

    setInvoice(context){
        context.commit("setInvoice");
    }
};