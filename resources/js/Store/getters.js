export default {
    getRoutes(state) {
        //Get routes from the store
        return state.routes;
    },

    areRoutesLoaded(state){
        return state.areRoutesLoaded;
    },

    getPosts(state) {
        //Get posts from the store
        return state.posts;
    },

    // finalCounter2(_, getters){
    //     // the dash is for the state
    //     return getters.finalCounter;
    // }
};