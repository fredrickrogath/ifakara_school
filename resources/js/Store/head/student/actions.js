export default {
    setTab(context, tab) {
        // for data will be data.value

        context.commit("setTab", tab);
    },

    setAddStudent(context){
        context.commit("setAddStudent");
    },
    
    setSnackBarState(context){
        context.commit("setSnackBarState");
    },

    setInvoiceView(context, id){
        context.commit("setInvoiceView", id);
    }
};