export default {
    setTab(context, tab) {
        // for data will be data.value

        context.commit("setTab", tab);
    },

    setAddStudent(context){
        context.commit("setAddStudent");
    },

    setStudentId(context, id){
        context.commit("setStudentId", id);
    },

    setEditStudent(context){
        context.commit("setEditStudent");
    },
    
    setSnackBarState(context){
        context.commit("setSnackBarState");
    },

    setInvoiceView(context, id){
        context.commit("setInvoiceView", id);
    }
};