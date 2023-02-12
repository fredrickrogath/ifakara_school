<template>
    <app-layout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template> -->

        <v-row>
            <v-col
                v-if="showSideBarBeforeSrollDown"
                sm="3"
                :md="dynamicColForSideBarComputed"
                offset-lg="1"
            >
                <!-- md 2 inaipa sidebar area besides the main content area -->
                <side-bar></side-bar>
            </v-col>
            
            <!-- MY PAGES -->
            <home-page v-if="route().current('head.dashboard')"></home-page>
            <page-one v-if="route().current('head.pageOne')"></page-one>
            <page-two v-if="route().current('head.pageTwo')"></page-two>
                
            
        </v-row>
    </app-layout>
</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
// const toggleDark = useToggle(isDark);
</script>

<script>
//end of inertiajs progress
import { InertiaProgress } from '@inertiajs/progress'
InertiaProgress.init({
  // The delay after which the progress bar will
  // appear during navigation, in milliseconds.
  delay: 250,

  // The color of the progress bar.
  color: '#6366F1',

  // Whether to include the default NProgress styles.
  includeCSS: true,

  // Whether the NProgress spinner will be shown.
  showSpinner: true,
})
//end of inertiajs progress

// import gsap from "gsap";
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import SideBar from "./Components/SideBar.vue";

// import PostCard from "./Components/PostCard.vue";
// import Tables from './Components/Tables.vue';

//PAGES

import HomePage from './Modules/HeadModule/HomePage.vue';
import PageOne from './Modules/HeadModule/PageOne.vue';
import PageTwo from './Modules/HeadModule/PageTwo.vue';

export default {
    components: {
        AppLayout,
        Welcome,
        SideBar,
        
        // MY PAGES
        HomePage,
        PageOne,
        PageTwo,
    },

    mounted() {
        // console.log(this.$page.props.routes);
    },

    data() {
        return {
            page: 'dashboard',

            contentForCardsWhenSideBarHides: 4,
            showSideBarBeforeSrollDown: true,
            dynamicColForSideBar: 2,
            
        };
    },

    methods: {},

    computed: {
        counter() {
            return this.$store.getters["numbers/finalCounter2"];    
        },

        dynamicColForSideBarComputed() {
            return this.dynamicColForSideBar;
        },
    },

    // watch: {
    //     showSideBarBeforeSrollDown(val) {
    //         if (val) {
    //             this.contentForCardsWhenSideBarHides = 4;
    //             this.dynamicColForSideBar = 2;
    //             this.contentFullWidthWhenSideBarHides = 10;
    //             this.contentNoPaddingWhenSideBarHides = "max-w-7xl";
    //         } else {
    //             this.contentForCardsWhenSideBarHides = 3;
    //             this.dynamicColForSideBar = 0;
    //             this.contentFullWidthWhenSideBarHides = 12;
    //             this.contentNoPaddingWhenSideBarHides = "";
    //         }
    //     },
    //     number(n) {
    //         gsap.to(this, { duration: 5, tweened: Number(n) || 0 });
    //     },
    // },
};
</script>
