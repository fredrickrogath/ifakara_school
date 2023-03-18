<template>
    <div class="pt-1">
        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-blue rounded">
                                    <i class="fe-aperture avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">12,145</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Students Registered
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-success rounded">
                                    <i class="fe-shopping-cart avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">1576</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Items Boughted
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-primary rounded">
                                    <i class="fe-bar-chart-2 avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">8947</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Payouts
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-info rounded">
                                    <i class="fe-cpu avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">178</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Available Stores
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->
        </div>

        <!-- end row -->

        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="float-end d-none d-md-inline-block">
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-xs btn-light">
                                    Today
                                </button>
                                <button type="button" class="btn btn-xs btn-light">
                                    Weekly
                                </button>
                                <button type="button" class="btn btn-xs btn-secondary">
                                    Monthly
                                </button>
                            </div>
                        </div>

                        <h4 class="header-title mb-3">
                            Analytics Performance
                        </h4>

                        <div class="d-flex text-center">
                            <!-- <div class="col-md-4">
                                <p class="text-muted mb-0 mt-3">Current Week</p>
                                <h4 class="fw-normal mb-3">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"
                                    ></small>
                                    <span>$58,254</span>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-3">
                                    Previous Week
                                </p>
                                <h4 class="fw-normal mb-3">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"
                                    ></small>
                                    <span>$69,524</span>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-3">Targets</p>
                                <h4 class="fw-normal mb-3">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"
                                    ></small>
                                    <span>$95,025</span>
                                </h4>
                            </div> -->
                            <div class="text-center">
                                <pie-chart3-d></pie-chart3-d>
                            </div>
                        </div>
                        <!-- <div
                            id="revenue-chart"
                            class="apex-charts mt-3"
                            data-colors="#6658dd,#1abc9c"
                        ></div> -->



                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->

            <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-1">
                            Recently Student Registered
                        </h4>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Identity</th>
                                        <th class="border-top-0">
                                            Full name
                                        </th>
                                        <th class="border-top-0">Class</th>
                                        <th class="border-top-0">Registered Date</th>
                                        <th class="border-top-0">View</th>
                                        <th class="border-top-0">Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="assets/images/users/user-2.jpg" alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg" />
                                        </td>
                                        <td>
                                            <span class="text-center">Finance</span>
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>27.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22">mdi-download</v-icon>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/users/user-3.jpg" alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg" />
                                        </td>
                                        <td>
                                            <span class="text-center">Procurement</span>
                                        </td>

                                        <td>Finacial report of ...</td>

                                        <td>28.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22">mdi-download</v-icon>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/users/user-1.jpg" alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg" />
                                        </td>
                                        <td>
                                            <span class="text-center">Procurement</span>
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>28.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22">mdi-download</v-icon>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/users/user-4.jpg" alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg" />
                                        </td>
                                        <td>
                                            <span class="text-center">Finance</span>
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>29.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22">mdi-download</v-icon>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/users/user-5.jpg" alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg" />
                                        </td>
                                        <td>
                                            <span class="text-center">Account</span>
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>31.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22">mdi-download</v-icon>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/users/user-3.jpg" alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg" />
                                        </td>
                                        <td>
                                            <span class="text-center">Finance</span>
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>28.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22">mdi-download</v-icon>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/users/user-1.jpg" alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg" />
                                        </td>
                                        <td>
                                            <span class="text-center">Procurement</span>
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>28.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22">mdi-download</v-icon>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
        </div>

        <!-- <div>
            <pie-chart3-d></pie-chart3-d>
        </div> -->
        <!-- end row -->
    </div>
</template>

<script>
import PieChart3D from "../.././Components/Charts/GoogleCharts/PieChart3D.vue";
export default {
    components: {
        PieChart3D,
    },
    mounted() {
        let recaptchaScript = document.createElement("script");
        recaptchaScript.setAttribute(
            "src",
            "assets/js/pages/ecommerce-dashboard.init.js"
        );
        document.head.appendChild(recaptchaScript);

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                console.log(e);
            }
        );
    },

    data() {
        return { echo: null };
    },
    computed: {
        //Add computed properties
    },
    watch: {
        //Add watchers...
    },
    methods: {
        //Add methods...
    },
};
</script>
