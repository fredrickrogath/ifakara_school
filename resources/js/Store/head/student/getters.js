export default {
    getTab(state) {
        return state.tab;
    },

    getAddStudent(state){
        return state.addStudent;
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

    getStudentId(state){
        return state.studentId;
    },

    getCommentView(state){
        return state.commentView;
    },

    getEditStudent(state){
        return state.editStudent;
    },

    getChatId(state){
        return state.chatId;
    },

    getNotificationId(state){
        return state.notificationId;
    }
    
    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};