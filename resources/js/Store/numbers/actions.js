export default {
    increment(context, data) {
        // for data will be data.value

        context.commit("increment");
    },
};