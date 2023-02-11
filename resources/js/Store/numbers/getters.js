export default {
    finalCounter(state) {
        return state.counter;
    },

    finalCounter2(_, getters){
        // the dash is for the state
        return getters.finalCounter;
    }
};