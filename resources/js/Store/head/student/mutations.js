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
};