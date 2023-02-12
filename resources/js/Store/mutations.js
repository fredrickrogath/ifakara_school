export default {
    //Save routes into the store
    storeRoutes(state, routes){
        state.routes = [];
        state.routes = routes;
    },

    //Check if routes are stored
    areRoutesLoaded(state){
        state.areRoutesLoaded = !state.areRoutesLoaded;
    },

    //Save posts into the store
    storePosts(state, posts){
        state.posts = posts;
    }

    // showTopBar(state) {
    //     state.showTopBar = true;
    // },

    // hideTopBar(state) {
    //     state.showTopBar = false;
    // },
};