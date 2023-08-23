export default {
    setTab(state, tab) {
        state.tab = tab;
    },

    setAddStudent(state) {
        state.addStudent = !state.addStudent;
    },

    setStudentId(state, id) {
        state.studentId = id;
    },

    setEditStudent(state) {
        state.editStudent = !state.editStudent;
    },

    setSnackBarState(state) {
        state.snackBarState = !state.snackBarState;
    },

    setInvoiceView(state, id) {
        state.invoiceView = !state.invoiceView;
        state.invoiceId = id;
    },

    setCommentView(state) {
        state.commentView = !state.commentView;
    },

    setNotificationId(state, id){
        state.notificationId = id;
    },

    setChatId(state, id){
        state.chatId = id;
    },
    
    setSnackBarState(state){
        state.snackBarState = !state.snackBarState;
    },

    setActiveClass(state, activeClass){
        state.activeClass = activeClass;
    },

    setActivePayment(state, activePayment){
        state.activePayment = activePayment;
    },
    
};
