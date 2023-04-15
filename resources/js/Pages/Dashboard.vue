<template>

    <!-- Begin page -->
    <div>
        <app-layout>
            <div id="wrapper" class="bg-gray-100">
                <!-- Topbar Start -->
                <!-- <top-bar></top-bar> -->
                <!-- end Topbar -->

                <!-- ========== Left Sidebar Start ========== -->
                <div class="left-side-menu pt-0">
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

                <div class="content-page pt-0 px-0 bg-gray-100">
                    <div class="content">
                        <!-- Start Content-->
                        <div class="container-fluid px-1">
                            <accountant-home-page
                                v-if="route().current('accountant.dashboard')"
                            ></accountant-home-page>
                            <!-- <accountant-create v-if="route().current('accountant.invoice.create')"></accountant-create>
                            <accountant-incoming v-if="route().current('accountant.invoice.incoming')"></accountant-incoming> -->
                            <accountant-payment-deatails v-if="route().current('accountant.payment_details')"></accountant-payment-deatails>
                            <!-- <accountant-pending v-if="route().current('accountant.invoice.pending')"></accountant-pending> -->
                            <accountant-reports v-if="route().current('accountant.reports')"></accountant-reports>
                            <accountant-uploads v-if="route().current('accountant.uploads')"></accountant-uploads>
                            <accountant-chart-of-accounts v-if="route().current('accountant.chart_of_accounts')"></accountant-chart-of-accounts>
                            <accountant-invoice v-if="route().current('accountant.invoice')"></accountant-invoice>





                            <academic-dashboard v-if="route().current('academic.dashboard')"></academic-dashboard>
                            <academic-student-registration v-if="route().current('academic.students_registration')"></academic-student-registration>
                            <academic-upload-results v-if="route().current('academic.upload_results')"></academic-upload-results>
                            <academic-view v-if="route().current('academic.view')"></academic-view>
                            <academic-upload v-if="route().current('academic.uploads')"></academic-upload>
                            <academic-departiment v-if="route().current('academic.departiment')"></academic-departiment>
                            <academic-reports v-if="route().current('academic.reports')"></academic-reports>



                            <head-dashboard v-if="route().current('head.dashboard')"></head-dashboard>
                            <head-accountant-uploads v-if="route().current('head.accountant_uploads')"></head-accountant-uploads>
                            <head-accountant-invoices v-if="route().current('head.accountant_invoices')"></head-accountant-invoices>
                            <head-accountant-reports v-if="route().current('head.accountant_reports')"></head-accountant-reports>
                            <head-academic-uploads v-if="route().current('head.academic_uploads')"></head-academic-uploads>
                            <head-academic-students v-if="route().current('head.academic_students')"></head-academic-students>
                            <head-academic-invoices v-if="route().current('head.academic_invoices')"></head-academic-invoices>
                            <head-academic-reports v-if="route().current('head.academic_reports')"></head-academic-reports>
                            <head-procurement-item-registration v-if="route().current('head.procurement_item_registration')"></head-procurement-item-registration>
                            <head-procurement-uploads v-if="route().current('head.procurement_uploads')"></head-procurement-uploads>
                            <head-procurement-reports v-if="route().current('head.procurement_reports')"></head-procurement-reports>
                            <head-department v-if="route().current('head.departments')"></head-department>
                            <head-about-school v-if="route().current('head.about_school')"></head-about-school>



                            <procurement-dashboard v-if="route().current('procurement.dashboard')"></procurement-dashboard>
                            <procurement-invoice v-if="route().current('procurement.invoice')"></procurement-invoice>
                            <procurement-reports v-if="route().current('procurement.reports')"></procurement-reports>
                            <procurement-tools v-if="route().current('procurement.tools')"></procurement-tools>
                            <procurement-tools-view v-if="route().current('procurement.tools_view')"></procurement-tools-view>
                            <procurement-uplaods v-if="route().current('procurement.uploads')"></procurement-uplaods>

                            
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

import AccountantHomePage from "./Modules/AccountantModule/HomePage.vue";
import AccountantInvoice from "./Modules/AccountantModule/Invoice.vue";
import AccountantCreate from "./Modules/AccountantModule/Create.vue";
// import AccountantIncoming from "./Modules/AccountantModule/Incoming.vue";
import AccountantPaymentDeatails from "./Modules/AccountantModule/PaymentDetails.vue";
// import AccountantPending from "./Modules/AccountantModule/Pending.vue";
import AccountantReports from "./Modules/AccountantModule/Reports.vue";
import AccountantUploads from "./Modules/AccountantModule/Uploads.vue";
import AccountantChartOfAccounts from "./Modules/AccountantModule/Invoices/ChartOfAccounts.vue";


import AcademicDashboard from "./Modules/AcademicModule/HomePage.vue";
import AcademicStudentRegistration from "./Modules/AcademicModule/StudentsRegistration.vue";
import AcademicUploadResults from "./Modules/AcademicModule/UploadResults.vue";
import AcademicView from "./Modules/AcademicModule/View.vue";
import AcademicStaffs from "./Modules/AcademicModule/Upload.vue";
import AcademicDepartiment from "./Modules/AcademicModule/Departiment.vue";
import AcademicReports from "./Modules/AcademicModule/Reports.vue";
import AcademicUpload from "./Modules/AcademicModule/Upload.vue";



import HeadDashboard from "./Modules/HeadModule/HomePage.vue";
import HeadAccountantUploads from "./Modules/HeadModule/AccountantUploads.vue";
import HeadAccountantInvoices from "./Modules/HeadModule/AccountantInvoices.vue";
import HeadAccountantReports from "./Modules/HeadModule/AccountantReports.vue";
import HeadAcademicUploads from "./Modules/HeadModule/AcademicUploads.vue";
import HeadAcademicStudents from "./Modules/HeadModule/AcademicStudentDetails.vue";
import HeadAcademicInvoices from "./Modules/HeadModule/AcademicInvoices.vue";
import HeadAcademicReports from "./Modules/HeadModule/AcademicReports.vue";
import HeadProcurementItemRegistration from "./Modules/HeadModule/ProcurementItemRegistration.vue";
import HeadProcurementUploads from "./Modules/HeadModule/ProcurementUploads.vue";
import HeadProcurementReports from "./Modules/HeadModule/ProcurementReports.vue";
import HeadDepartment from "./Modules/HeadModule/Departments.vue";
import HeadAboutSchool from "./Modules/HeadModule/AboutSchool.vue";



import ProcurementDashboard from "./Modules/ProcurementModule/HomePage.vue";
import ProcurementInvoice from "./Modules/ProcurementModule/Invoice.vue";
import ProcurementReports from "./Modules/ProcurementModule/Reports.vue";
import ProcurementTools from "./Modules/ProcurementModule/Tools.vue";
import ProcurementToolsView from "./Modules/ProcurementModule/ToolsView.vue";
import ProcurementUplaods from "./Modules/ProcurementModule/Uploads.vue";


export default {
    components: {
        AppLayout,
        Welcome,
        SideBar,
        SidebarMenu,
        TopBar,

        // MY PAGES
        AccountantHomePage,
        // AccountantCreate,
        // AccountantIncoming,
        AccountantPaymentDeatails,
        // AccountantPending,
        AccountantReports,
        AccountantUploads,
        AccountantChartOfAccounts,
        AccountantInvoice,


        AcademicDashboard,
        AcademicStudentRegistration,
        AcademicUploadResults,
        AcademicView,
        AcademicStaffs,
        AcademicDepartiment,
        AcademicReports,
        AcademicUpload,



        HeadDashboard,
        HeadAccountantUploads,
        HeadAccountantInvoices,
        HeadAccountantReports,
        HeadAcademicUploads,
        HeadAcademicStudents,
        HeadAcademicInvoices,
        HeadAcademicReports,
        HeadProcurementItemRegistration,
        HeadProcurementUploads,
        HeadProcurementReports,
        HeadDepartment,
        HeadAboutSchool,




        ProcurementDashboard,
        ProcurementInvoice,
        ProcurementReports,
        ProcurementTools,
        ProcurementToolsView,
        ProcurementUplaods,

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
