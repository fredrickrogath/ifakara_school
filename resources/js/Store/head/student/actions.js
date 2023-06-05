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
    },

    setCommentView(context){
        context.commit("setCommentView");
    },

    setStudentId(context, id){
        context.commit("setStudentId", id);
    },

    setEditStudent(context){
        context.commit("setEditStudent");
    },

    setChatId(context, id){
        context.commit("setChatId", id);
    },

    setNotificationId(context, id){
        context.commit("setNotificationId", id);
    },
};