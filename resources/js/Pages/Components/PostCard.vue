<template>
    <v-col sm="9" :md="contentFullWidthWhenSideBarHidesComputed" offset-sm="7">
        <div
            class="mx-auto sm:px-6 lg:px-8"
            :class="contentNoPaddingWhenSideBarHides"
        >
            <div class="overflow-hidden sm:rounded-lg">
                <!-- <welcome /> -->
                <!-- <v-row>
                    <div class="pt-16 sm:pt-4">
                        heloooooooooooooooooooo
                    </div>
                </v-row> -->
                <v-row>
                    <v-col>
                        <v-row>
                            <v-col
                                :sm="colDivisionCountComputed"
                                :md="contentForCardsWhenSideBarHidesComputed"
                                offset-sm="7"
                                v-for="(post, i) in posts"
                                :key="post.id + i"
                            >
                                <v-card :dark="isDark">
                                    <v-card outlined :dark="isDark">
                                        <v-img
                                            :src="storagePath + post.post_url"
                                            :lazy-src="
                                                storagePath + post.post_url
                                            "
                                        >
                                            <template v-slot:placeholder>
                                                <v-row
                                                    class="fill-height ma-0 flex items-center"
                                                    align="center"
                                                    justify="center"
                                                >
                                                    <v-progress-circular
                                                        indeterminate
                                                        class="text-white"
                                                    ></v-progress-circular>
                                                </v-row>
                                            </template>
                                        </v-img>
                                        <v-card-title>
                                            {{ post.post_title }}
                                        </v-card-title>
                                        <v-card-subtitle>
                                            <div class="flex flex-row gap-3">
                                                <v-btn icon
                                                    ><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="dark:text-white text-gray-700 hover:cursor-pointer h-6 w-6 transition ease-in-out delay-170 hover:-translate-y-1 hover:scale-110 duration-300"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                        @click="incrementByOne"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                                        />
                                                    </svg>
                                                </v-btn>
                                                <v-btn icon
                                                    ><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="dark:text-white text-gray-700 hover:cursor-pointer h-6 w-6 transition ease-in-out delay-170 hover:-translate-y-1 hover:scale-110 duration-300"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                                        />
                                                    </svg>
                                                </v-btn>
                                                <v-btn icon>
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="dark:text-white text-gray-700 hover:cursor-pointer h-6 w-6 transition ease-in-out delay-170 hover:-translate-y-1 hover:scale-110 duration-300"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                                        />
                                                    </svg>
                                                </v-btn>
                                                <v-btn icon>
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="dark:text-white text-gray-700 hover:cursor-pointer h-6 w-6 transition ease-in-out delay-170 hover:-translate-y-1 hover:scale-110 duration-300"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                                                        />
                                                    </svg>
                                                </v-btn>
                                            </div>

                                            <div
                                                class="text-sm font-semibold dark:text-white text-gray-700"
                                            >
                                                11,552 Likes
                                            </div>
                                            <div
                                                class="text-sm dark:text-white text-gray-700 text-truncate"
                                            >
                                                <span class="font-semibold"
                                                    >gnfi</span
                                                >
                                                <span>
                                                    {{
                                                        post.post_body
                                                            | truncate(
                                                                150,
                                                                "..."
                                                            )
                                                    }}
                                                </span>
                                            </div>

                                            <div
                                                class="flex justify-between items-center"
                                            >
                                                <div
                                                    class="text-gray-400 text-sm"
                                                >
                                                    877 comments
                                                </div>

                                                <div
                                                    class="text-gray-400 text-xs"
                                                >
                                                    {{ post.created_at }}
                                                </div>
                                            </div>
                                        </v-card-subtitle>
                                    </v-card>
                                </v-card>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </div>
        </div>

        <div v-if="showSpinner" class="text-center py-2">
            <v-progress-circular
                class="dark:text-white text-purple-500"
                :size="40"
                indeterminate
            ></v-progress-circular>
        </div>
    </v-col>
</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
// const toggleDark = useToggle(isDark);
</script>

<script>
import HeatMapFromApexCharts from "./Charts/ApexCharts/HeatMap.vue";
export default {
    components: {
        HeatMap: HeatMapFromApexCharts,
    },
    //   inject:['switchToComments'],
    filters: {
        //For filter long sentences into a limited number of characters
        truncate: function (text, length, suffix) {
            if (text.length > length) {
                return text.substring(0, length) + suffix;
            } else {
                return text;
            }
        },
    },

    mounted() {
        setInterval(() => {
            this.number = 1111;
        }, 5000);
        var prevScrollpos = window.pageYOffset;
        this.showSpinner = true;
        this.getPosts();
        window.onscroll = () => {
            if (
                window.scrollY + window.innerHeight >=
                    document.body.scrollHeight &&
                !this.nextPageLoaded
            ) {
                // console.log("fired");
                this.nextPageLoaded = true;
                this.showSpinner = true;
                this.nextPage();
            }

            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                // show sidebar
                // this.showSideBarBeforeSrollDown = true;
                // show topbar
                // this.showTopBar();
            } else {
                // hide sidebar
                // this.showSideBarBeforeSrollDown = false;
                // hide topbar
                // this.hideTopBar();
            }
            prevScrollpos = currentScrollPos;
        };
    },

    data() {
        return {
            storagePath: window.location.origin + "/storage/systemFiles/",
            contentForCardsWhenSideBarHides: 4,
            contentFullWidthWhenSideBarHides: 10,
            contentNoPaddingWhenSideBarHides: "max-w-7xl",
            optionsAreVisible: false,
            colDivisionCount: 6, //4 = 3 divisions , 6 = 2 divisions
            showSpinner: false,
            tweened: 0,
            posts: [],
            number: 0,
            page: 1,
        };
    },
    methods: {
        toggleOptions() {
            this.optionsAreVisible = !this.optionsAreVisible;
        },

        //Get the first post with page=1
        getPosts() {
            // console.log("Loading next page");
            axios.get("/posts?page=1").then((response) => {
                this.posts = response.data.data.data;
                //increament url pages
                this.page = this.page + 1;
            });
        },

        nextPage() {
            // console.log(this.page);
            // console.log("Loading next page");
            axios.get("/posts?page=" + this.page).then((response) => {
                response.data.data.data.forEach((data) => {
                    this.posts.push(data);
                });
                setTimeout(() => {
                    this.showSpinner = false;
                }, 9000);
                this.nextPageLoaded = false;
            });

            this.page = this.page + 1;
        },

        incrementByOne() {
            this.$store.dispatch("numbers/increment", { value: 5 });
        },

        showTopBar() {
            this.$store.dispatch("showTopBar");
        },

        hideTopBar() {
            this.$store.dispatch("hideTopBar");
        },
    },

    computed: {
        contentForCardsWhenSideBarHidesComputed() {
            return this.contentForCardsWhenSideBarHides;
        },

        colDivisionCountComputed() {
            return this.colDivisionCount;
        },

        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },
    },
};
</script>

<style scoped>
.post-options-enter-from {
    opacity: 0;
    transform: translateY(50px);
}
.post-options-enter-active {
    transition: all 0.5s ease-out;
}
.post-options-enter-to {
    opacity: 1;
    transform: translateY(0);
}
.post-options-leave-from {
    opacity: 1;
    transform: translateY(0);
}
.post-options-leave-active {
    transition: all 0.5s ease-in;
}
.post-options-leave-to {
    opacity: 0;
    transform: translateY(-30px);
}
</style>
