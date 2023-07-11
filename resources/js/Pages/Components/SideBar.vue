<template>
    <div>
        <!-- Head Office -->
        <div v-if="$page.props.role == 'head'" class="max-w-2xl mx-auto">
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Navigation</li>

                    <li>
                        <my-custom-link
                            :href="route('head.dashboard')"
                            :active="route().current('head.dashboard')"
                        >
                            <v-icon>mdi-view-dashboard</v-icon>
                            <span> Dashboard </span>
                        </my-custom-link>
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <li>
                        <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                            <v-icon size="24">mdi-account-tie</v-icon>
                            <span> Accountant </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                        :href="route('head.accountant_uploads')"
                                        :active="
                                            route().current(
                                                'head.accountant_uploads'
                                            )
                                        "
                                    >
                                        <v-icon size="20">mdi-upload</v-icon>
                                        <span> Uploads </span>
                                    </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                        :href="
                                            route('head.accountant_invoices')
                                        "
                                        :active="
                                            route().current(
                                                'head.accountant_invoices'
                                            )
                                        "
                                    >
                                        <v-icon size="20">mdi-cash</v-icon>
                                        <span> Invoices </span>
                                    </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                        :href="route('head.accountant_reports')"
                                        :active="
                                            route().current(
                                                'head.accountant_reports'
                                            )
                                        "
                                    >
                                        <v-icon size="18">mdi-poll</v-icon>
                                        <span> Reports </span>
                                    </my-custom-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarEcommerce1" data-bs-toggle="collapse">
                            <v-icon size="24">mdi-account-tie</v-icon>
                            <span> Academic </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce1">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                        :href="route('head.academic_uploads')"
                                        :active="
                                            route().current(
                                                'head.academic_uploads'
                                            )
                                        "
                                    >
                                        <v-icon size="20">mdi-upload</v-icon>
                                        <span> Uploads </span>
                                    </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                        :href="route('head.academic_students')"
                                        :active="
                                            route().current(
                                                'head.academic_students'
                                            )
                                        "
                                    >
                                        <v-icon size="20">mdi-school</v-icon>
                                        <span> Students </span>
                                    </my-custom-link>
                                </li>

                                <!-- <li>
                                    <my-custom-link
                                        :href="route('head.academic_invoices')"
                                        :active="
                                            route().current(
                                                'head.academic_invoices'
                                            )
                                        "
                                    >
                                        <v-icon size="20">mdi-cash</v-icon>
                                        <span> Invoices </span>
                                    </my-custom-link>
                                </li> -->

                                <li>
                                    <my-custom-link
                                        :href="route('head.academic_reports')"
                                        :active="
                                            route().current(
                                                'head.academic_reports'
                                            )
                                        "
                                    >
                                        <v-icon size="18">mdi-poll</v-icon>
                                        <span> Reports </span>
                                    </my-custom-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarEcommerce2" data-bs-toggle="collapse">
                            <v-icon size="24">mdi-account-tie</v-icon>
                            <span> Procurement </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce2">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                        :href="
                                            route(
                                                'head.procurement_item_registration'
                                            )
                                        "
                                        :active="
                                            route().current(
                                                'head.procurement_item_registration'
                                            )
                                        "
                                    >
                                        <v-icon size="20">mdi-pen-plus</v-icon>
                                        <span> Item Registration </span>
                                    </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                        :href="
                                            route('head.procurement_uploads')
                                        "
                                        :active="
                                            route().current(
                                                'head.procurement_uploads'
                                            )
                                        "
                                    >
                                        <v-icon size="20">mdi-upload</v-icon>
                                        <span> Uploads </span>
                                    </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                        :href="
                                            route('head.procurement_reports')
                                        "
                                        :active="
                                            route().current(
                                                'head.procurement_reports'
                                            )
                                        "
                                    >
                                        <v-icon size="18">mdi-poll</v-icon>
                                        <span> Reports </span>
                                    </my-custom-link>
                                </li>
                                <li></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('head.departments')"
                            :active="route().current('head.departments')"
                        >
                            <v-icon size="22">mdi-account-group</v-icon>
                            <span> Departiment </span>
                        </my-custom-link>
                    </li>

                    <!-- <li>
                        <my-custom-link
                            :href="route('head.about_school')"
                            :active="route().current('head.about_school')"
                        >
                            <v-icon size="22">mdi-school</v-icon>
                            <span> About School </span>
                        </my-custom-link>
                    </li> -->
                </ul>
            </div>
        </div>

        <!-- Academic -->
        <div v-if="$page.props.role == 'academic'" class="max-w-2xl mx-auto">
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Navigation</li>

                    <li>
                        <my-custom-link
                            :href="route('academic.dashboard')"
                            :active="route().current('academic.dashboard')"
                        >
                            <v-icon>mdi-view-dashboard</v-icon>
                            <span> Dashboard </span>
                        </my-custom-link>
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <li>
                    <my-custom-link
                        :href="route('academic.students_registration')"
                        :active="route().current('academic.students_registration')"
                    >
                        <v-icon size="22">mdi-school</v-icon>
                        <span> Students </span>
                    </my-custom-link>
                </li>
                
                    
                    <li>
                        <my-custom-link
                        :href="route('academic.departiment')"
                        :active="route().current('academic.departiment')"
                        >
                        <v-icon size="22">mdi-account-group</v-icon>
                        <span> Departiment </span>
                    </my-custom-link>
                </li>

                <li>
                    <my-custom-link
                        :href="route('academic.uploads')"
                        :active="route().current('academic.uploads')"
                    >
                        <v-icon size="22">mdi-upload</v-icon>
                        <span> Uploads </span>
                    </my-custom-link>
                </li>

                    <li>
                        <my-custom-link
                            :href="route('academic.reports')"
                            :active="route().current('academic.reports')"
                        >
                            <v-icon size="22">mdi-poll</v-icon>
                            <span> Reports </span>
                        </my-custom-link>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Procurement -->
        <div v-if="$page.props.role == 'procurement'" class="max-w-2xl mx-auto">
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Navigation</li>

                    <li>
                        <my-custom-link
                            :href="route('procurement.dashboard')"
                            :active="route().current('procurement.dashboard')"
                        >
                            <v-icon>mdi-view-dashboard</v-icon>
                            <span> Dashboard </span>
                        </my-custom-link>
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <li>
                        <my-custom-link
                            :href="route('procurement.tools')"
                            :active="route().current('procurement.tools')"
                        >
                            <v-icon size="20">mdi-tools</v-icon>
                            <span> Tools & Items </span>
                        </my-custom-link>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('procurement.invoice')"
                            :active="route().current('procurement.invoice')"
                        >
                        <v-icon size="22">mdi-cash-multiple</v-icon>
                            <span> Invoices </span>
                        </my-custom-link>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('procurement.uploads')"
                            :active="route().current('procurement.uploads')"
                        >
                            <v-icon size="22">mdi-upload</v-icon>
                            <span> Uploads </span>
                        </my-custom-link>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('procurement.reports')"
                            :active="route().current('procurement.reports')"
                        >
                            <v-icon size="22">mdi-poll</v-icon>
                            <span> Reports </span>
                        </my-custom-link>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Accountant -->
        <div v-if="$page.props.role == 'accountant'" class="max-w-2xl mx-auto">
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Navigation</li>

                    <li>
                        <my-custom-link
                            :href="route('accountant.dashboard')"
                            :active="route().current('accountant.dashboard')"
                        >
                            <v-icon>mdi-view-dashboard</v-icon>
                            <span> Dashboard </span>
                        </my-custom-link>
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <!-- <li>
                        <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                            <v-icon size="20">mdi-cash</v-icon>
                            <span> Invoice </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                        :href="
                                            route('accountant.invoice.incoming')
                                        "
                                        :active="
                                            route().current(
                                                'accountant.invoice.incoming'
                                            )
                                        "
                                    >
                                        <v-icon size="20"
                                            >mdi-inbox-arrow-down</v-icon
                                        >
                                        <span> Incoming </span>
                                    </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                        :href="
                                            route('accountant.invoice.pending')
                                        "
                                        :active="
                                            route().current(
                                                'accountant.invoice.pending'
                                            )
                                        "
                                    >
                                        <v-icon size="20"
                                            >mdi-account-clock</v-icon
                                        >
                                        <span> Pending </span>
                                    </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                        :href="
                                            route(
                                                'accountant.invoice.successful'
                                            )
                                        "
                                        :active="
                                            route().current(
                                                'accountant.invoice.successful'
                                            )
                                        "
                                    >
                                        <v-icon size="20"
                                            >mdi-check-bold</v-icon
                                        >
                                        <span> Successful </span>
                                    </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                        :href="
                                            route('accountant.invoice.create')
                                        "
                                        :active="
                                            route().current(
                                                'accountant.invoice.create'
                                            )
                                        "
                                    >
                                        <v-icon size="20">mdi-pen-plus</v-icon>
                                        <span> Create </span>
                                    </my-custom-link>
                                </li>
                            </ul>
                        </div>
                    </li> -->

                    <li>
                        <my-custom-link
                            :href="route('accountant.invoice')"
                            :active="route().current('accountant.invoice')"
                        >
                            <v-icon size="20">mdi-cash-multiple</v-icon>
                            <span> Invoice </span>
                        </my-custom-link>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('accountant.payment_details')"
                            :active="route().current('accountant.payment_details')"
                        >
                            <v-icon size="20">mdi-school</v-icon>
                            <span> Student Payments </span>
                        </my-custom-link>
                    </li>

                    <!-- <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <v-icon size="20">mdi-school</v-icon>
                            <span> Student </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                        :href="
                                            route('accountant.payment_details')
                                        "
                                        :active="
                                            route().current(
                                                'accountant.payment_details'
                                            )
                                        "
                                    >
                                        <v-icon size="20"
                                            >mdi-cash-multiple</v-icon
                                        >
                                        <span> Payment Detail </span>
                                    </my-custom-link>
                                </li>
                            </ul>
                        </div>
                    </li> -->

                    <li>
                        <my-custom-link
                            :href="route('accountant.uploads')"
                            :active="route().current('accountant.uploads')"
                        >
                            <v-icon size="20">mdi-upload</v-icon>
                            <span> Uploads </span>
                        </my-custom-link>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('accountant.reports')"
                            :active="route().current('accountant.reports')"
                        >
                            <v-icon size="20">mdi-poll</v-icon>
                            <span> Reports </span>
                        </my-custom-link>
                    </li>

                    <li>
                        <my-custom-link
                            :href="route('accountant.chart_of_accounts')"
                            :active="route().current('accountant.chart_of_accounts')"
                        >
                            <v-icon size="23">mdi-finance</v-icon>
                            <span> Charts Of Accounts </span>
                        </my-custom-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import MyCustomLink from "@/Jetstream/MyCustomLink";
// import PieChart3D from "../Components/Charts/GoogleCharts/PieChart3D.vue";

export default {
    components: {
        MyCustomLink,
        // PieChart3D,
    },

    mounted() {
        this.initializeRoutes();
    },

    data() {
        return {
            routes: [],

            isDropdownOpen: false,
        };
    },

    methods: {
        initializeRoutes() {
            this.$store.getters["getRoutes"].forEach((route) => {
                this.routes.push(route);
            });
            // this.$page.props.routes.forEach((route) => {
            //     this.routes.push(route);
            // });
            // console.log(this.routes);
        },

        // select: function (path) {
        //     if (path.extension !== "") {
        //         window.location.href = path.url + path.extension;
        //     }
        //     window.location.href = path.url;
        // },
    },

    computed: {},
};
</script>
