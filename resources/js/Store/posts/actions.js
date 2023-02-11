export default {
    pushPosts(context, data) {
        // for data will be data.value

        context.commit("pushPosts", data);
    },
};