<template>
    <div>
        <!-- Head Office -->
        <div v-if="$page.props.role == 'head'" class="max-w-2xl mx-auto"></div>

        <!-- Academic -->
        <div
            v-if="$page.props.role == 'academic'"
            class="max-w-2xl mx-auto"
        ></div>

        <!-- Procurement -->
        <div
            v-if="$page.props.role == 'procurement'"
            class="max-w-2xl mx-auto"
        ></div>

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
                            <i data-feather="activity"></i>
                            <span> Dashboard </span>
                            </my-custom-link>
                       
                    </li>

                    <li class="menu-title mt-2">Apps</li>

                    <!-- <li>
        <a href="apps-calendar.html">
            <i data-feather="calendar"></i>
            <span> Calendar </span>
        </a>
    </li>

    <li>
        <a href="apps-chat.html">
            <i data-feather="message-square"></i>
            <span> Chat </span>
        </a>
    </li> -->

                    <li>
                        <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                            <i data-feather="shopping-cart"></i>
                            <span> Invoice </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                :href="route('accountant.invoice.incoming')"
                                :active="route().current('accountant.invoice.incoming')"
                            >
                            <i data-feather="activity"></i>
                            <span> Incoming </span>
                            </my-custom-link>
                                   
                                </li>
                                <li>
                                    <my-custom-link
                                :href="route('accountant.invoice.pending')"
                                :active="route().current('accountant.invoice.pending')"
                            >
                            <i data-feather="activity"></i>
                            <span> Pending </span>
                            </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                :href="route('accountant.invoice.successful')"
                                :active="route().current('accountant.invoice.successful')"
                            >
                            <i data-feather="activity"></i>
                            <span> Successful </span>
                            </my-custom-link>
                                </li>
                                <li>
                                    <my-custom-link
                                :href="route('accountant.invoice.create')"
                                :active="route().current('accountant.invoice.create')"
                            >
                            <i data-feather="activity"></i>
                            <span> Create </span>
                            </my-custom-link>
                                
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Student </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <my-custom-link
                                :href="route('accountant.payment_details')"
                                :active="route().current('accountant.payment_details')"
                            >
                            <i data-feather="activity"></i>
                            <span> Payment Detail </span>
                            </my-custom-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- <li>
        <a href="apps-social-feed.html">
            <span class="badge bg-pink float-end">Hot</span>
            <i data-feather="rss"></i>
            <span> Social Feed </span>
        </a>
    </li> -->

                    <li>
                            <my-custom-link
                                :href="route('accountant.uploads')"
                                :active="route().current('accountant.uploads')"
                            >
                            <i data-feather="activity"></i>
                            <span> Uploads </span>
                            </my-custom-link>
                    </li>

                    <li>
                            <my-custom-link
                                :href="route('accountant.reports')"
                                :active="route().current('accountant.reports')"
                            >
                            <i data-feather="activity"></i>
                            <span> Reports </span>
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
