export default {
    getTab(state) {
        return state.tab;
    },

    getAddStudent(state){
        return state.addStudent;
    },

    getEditStudent(state){
        return state.editStudent;
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

    getStudentId(state){
        return state.studentId;
    },

    getCommentView(state){
        return state.commentView;
    },

    getNotificationId(state){
        return state.notificationId;
    },

    getChatId(state){
        return state.chatId;
    },

    getSnackBarState(state){
        return state.snackBarState;
    },

    getActiveClass(state){
        return state.activeClass;
    },

    getActivePayment(state){
        return state.activePayment;
    },
    
    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};