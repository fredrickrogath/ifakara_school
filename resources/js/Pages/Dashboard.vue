<template>

    <!-- Begin page -->
    <div>
        <app-layout>
            <div id="wrapper">
                <!-- Topbar Start -->
                <!-- <top-bar></top-bar> -->
                <!-- end Topbar -->

                <!-- ========== Left Sidebar Start ========== -->
                <div class="left-side-menu">
                    <div class="h-100" data-simplebar>

                        <!--- Sidemenu -->

                        <side-bar></side-bar>

                        <!-- End Sidebar -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -left -->
                </div>
                <!-- Left Sidebar End -->

                <!-- ============================================================== -->
                <!-- Start Page Content here -->
                <!-- ============================================================== -->

                <div class="content-page">
                    <div class="content">
                        <!-- Start Content-->
                        <div class="container-fluid">
                            <home-page
                                v-if="route().current('accountant.dashboard')"
                            ></home-page>
                            <create v-if="route().current('accountant.invoice.create')"></create>
                            <incoming v-if="route().current('accountant.invoice.incoming')"></incoming>
                            <payment-deatails v-if="route().current('accountant.payment_details')"></payment-deatails>
                            <pending v-if="route().current('accountant.invoice.pending')"></pending>
                            <reports v-if="route().current('accountant.reports')"></reports>
                            <uploads v-if="route().current('accountant.uploads')"></uploads>
                            <successful v-if="route().current('accountant.invoice.successful')"></successful>
                        </div>
                        <!-- container -->
                    </div>
                    <!-- content -->

                    <!-- Footer Start -->
                    <!-- <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    {{ new Date().getFullYear() }} &copy; UBold
                                    theme by <a href="">Coderthemes</a>
                                </div>
                                <div class="col-md-6">
                                    <div
                                        class="text-md-end footer-links d-none d-sm-block"
                                    >
                                        <a href="javascript:void(0);"
                                            >About Us</a
                                        >
                                        <a href="javascript:void(0);">Help</a>
                                        <a href="javascript:void(0);"
                                            >Contact Us</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer> -->
                    <!-- end Footer -->
                </div>

                <!-- ============================================================== -->
                <!-- End Page content -->
                <!-- ============================================================== -->
            </div>
            <!-- END wrapper -->

            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>
        </app-layout>
    </div>
</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
// const toggleDark = useToggle(isDark);
</script>

<script>
//end of inertiajs progress
import { InertiaProgress } from "@inertiajs/progress";
InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: "#6366F1",

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: true,
});
//end of inertiajs progress

import { SidebarMenu } from "vue-sidebar-menu";

// import gsap from "gsap";
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import SideBar from "./Components/SideBar.vue";
import TopBar from "./Components/TopBar.vue";

// import PostCard from "./Components/PostCard.vue";
// import Tables from './Components/Tables.vue';

//PAGES

import HomePage from "./Modules/AccountantModule/HomePage.vue";
import Create from "./Modules/AccountantModule/Create.vue";
import Incoming from "./Modules/AccountantModule/Incoming.vue";
import PaymentDeatails from "./Modules/AccountantModule/PaymentDetails.vue";
import Pending from "./Modules/AccountantModule/Pending.vue";
import Reports from "./Modules/AccountantModule/Reports.vue";
import Uploads from "./Modules/AccountantModule/Uploads.vue";
import Successful from "./Modules/AccountantModule/Successful.vue";

export default {
    components: {
        AppLayout,
        Welcome,
        SideBar,
        SidebarMenu,
        TopBar,

        // MY PAGES
        HomePage,
        Create,
        Incoming,
        PaymentDeatails,
        Pending,
        Reports,
        Uploads,
        Successful,

    },

    mounted() {
        // console.log(this.$page.props.routes);
    },

    data() {
        return {
            page: "dashboard",

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
