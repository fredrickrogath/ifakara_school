export default {
    setTab(state, tab) {
        state.tab = tab;
    },

    setAddStudent(state) {
        state.addStudent = !state.addStudent;
    },

    setSnackBarState(state){
        state.snackBarState = !state.snackBarState;
    },

    setInvoiceView(state, id){
        state.invoiceView = !state.invoiceView;
        state.invoiceId = id;
    },

    setInvoiceView(state, id) {
        state.invoiceView = !state.invoiceView;
        state.invoiceId = id;
    },

    setCommentView(state) {
        state.commentView = !state.commentView;
    },

    setEditStudent(state) {
        state.editStudent = !state.editStudent;
    },
    
    setStudentId(state, id) {
        state.studentId = id;
    },

    setChatId(state, id){
        state.chatId = id;
    },

    setNotificationId(state, id){
        state.notificationId = id;
    },
};