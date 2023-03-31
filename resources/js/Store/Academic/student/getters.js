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
    }
    
    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};