<template>
    <div class="pt-0 bg-gray-100">
        <div class="d-flex">
            <div class="my-0 pt-0 flex-grow-1">
                <div class="card bg-pattern py-0 my-0 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-blue rounded">
                                    <i
                                        class="fe-aperture avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">
                                            {{ totalTools ? totalTools : 0 }}
                                        </span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Tools
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="my-0 pt-0 flex-grow-1 pl-1">
                <div class="card bg-pattern py-0 my-0">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-success rounded">
                                    <i
                                        class="fe-shopping-cart avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">12</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        {{
                                            newToolTitle
                                                ? newToolTitle
                                                : "Please wait"
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="my-0 pt-0 flex-grow-1 pl-1">
                <div class="card bg-pattern py-0 my-0">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-primary rounded">
                                    <i
                                        class="fe-bar-chart-2 avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">87</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        {{
                                            brokenToolTitle
                                                ? brokenToolTitle
                                                : "Please wait"
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="my-0 pt-0 flex-grow-1 pl-1">
                <div class="card bg-pattern py-0 my-0">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-info rounded">
                                    <i
                                        class="fe-cpu avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">
                                            {{
                                                totalUploads ? totalUploads : 0
                                            }}
                                        </span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        {{
                                            uploadTitles
                                                ? uploadTitles
                                                : "Please wait"
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>

        <!-- end row -->

        <div class="d-flex pt-1 bg-white h-screen">
            <div class="mb-0 pb-0 mr-1">
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="float-end d-none d-md-inline-block">
                            <!-- <div class="btn-group mb-2">
                                <button
                                    type="button"
                                    class="btn btn-xs btn-light"
                                >
                                    Today
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-xs btn-light"
                                >
                                    Weekly
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-xs btn-secondary"
                                >
                                    Monthly
                                </button>
                            </div> -->
                        </div>

                        <h4 class="header-title mb-2">Tools Analytics</h4>

                        <!-- <div class="d-flex text-center">
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-0">Current Week</p>
                                <h4 class="fw-normal mb-0">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"
                                    ></small>
                                    <span>$58,254</span>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-0">
                                    Previous Week
                                </p>
                                <h4 class="fw-normal mb-0">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"
                                    ></small>
                                    <span>$69,524</span>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-0">Targets</p>
                                <h4 class="fw-normal mb-0">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"
                                    ></small>
                                    <span>$95,025</span>
                                </h4>
                            </div>
                        </div> -->

                        <v-card flat>
                            <v-tabs color="deep-purple accent-4" right>
                                <v-tab>Tools</v-tab>
                                <v-tab-item key="2">
                                    <v-container fluid>
                                        <pie-chart3-d
                                            :data="tools"
                                            :head="headDonghurt"
                                            :content="contentDonghurt"
                                        ></pie-chart3-d>
                                    </v-container>
                                </v-tab-item>
                            </v-tabs>
                        </v-card>
                        <!-- <div class="">
                            <google-donut></google-donut>
                        </div> -->
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->

            <div class="mb-0 pb-0 mr-1">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="float-end d-none d-md-inline-block"> -->
                        <!-- <div class="btn-group mb-2">
                                <button
                                    type="button"
                                    class="btn btn-xs btn-light"
                                >
                                    Today
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-xs btn-light"
                                >
                                    Weekly
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-xs btn-secondary"
                                >
                                    Monthly
                                </button>
                            </div> -->
                        <!-- </div> -->

                        <h4 class="header-title">Invoices Status</h4>

                        <!-- <div class="d-flex text-center">
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-0">Current Week</p>
                                <h4 class="fw-normal mb-0">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"
                                    ></small>
                                    <span>$58,254</span>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-0">
                                    Previous Week
                                </p>
                                <h4 class="fw-normal mb-0">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"
                                    ></small>
                                    <span>$69,524</span>
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted mb-0 mt-0">Targets</p>
                                <h4 class="fw-normal mb-0">
                                    <small
                                        class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"
                                    ></small>
                                    <span>$95,025</span>
                                </h4>
                            </div>
                        </div> -->
                        <div class="">
                            <google-bar
                                :data="chartData"
                                YText="Invoice Count"
                                :head="head"
                                :content="content"
                            ></google-bar>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>

        <!-- <div>   
            <pie-chart3-d></pie-chart3-d>
            <google-donut></google-donut>
            <google-bar></google-bar>
            <google-grouped-bar></google-grouped-bar>
        </div> -->
        <!-- end row -->
    </div>
</template>

<script>
import moment from "moment";
import PieChart3D from "../.././Components/Charts/GoogleCharts/PieChart3D.vue";
import GoogleDonut from "../.././Components/Charts/GoogleCharts/GoogleDonut.vue";
import GoogleBar from "../.././Components/Charts/GoogleCharts/GoogleBar.vue";
import GoogleGroupedBar from "../.././Components/Charts/GoogleCharts/GoogleGroupedBar.vue";
export default {
    components: {
        PieChart3D,
        GoogleDonut,
        GoogleBar,
        GoogleGroupedBar,
    },
    mounted() {
        this.initialize();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                console.log(e);
            }
        );
    },

    data() {
        return {
            echo: null,
            // students: null,
            // paidStudents: null,
            // unpaidStudents: null,
            // registeredStudents: [],
            totalTools: null,
            toolTitle: "",
            newToolTitle: "",
            brokenToolTitle: "",
            totalUploads: null,
            uploadTitles: "",
            tools: [],
            // finances: [],
            invoices: null,
            chartData: [],
            headDonghurt: "3D New Tools vs Total Tools",
            contentDonghurt: "3D This chart shows the percentage of new tools compared to the total number of tools. The pie chart is divided into two sections: new tools and total tools. The chart provides a visual representation of the tool data.",
            head: "Bar New Tools vs Total Tools",
            content:
                "Bar This chart shows the percentage of new tools compared to the total number of tools. The pie chart is divided into two sections: new tools and total tools. The chart provides a visual representation of the tool data.",
        };
    },
    computed: {
        //Add computed properties
    },
    watch: {
        //Add watchers...
    },
    methods: {
        //Add methods...
        async initialize() {
            // this.headDashboardGetStudents();
            this.headDashboardGetInvoices();
            this.headDashboardGetUploads();
            this.headDashboardGetTools();

            // this.finances = [
            //     ["Language", "Finances"],
            //     ["Incomes", 120000],
            //     ["Expenses", 320000],
            //     ["Liabilities", 6700000],
            //     ["Assets", 700000],
            // ];
        },

        async headDashboardGetInvoices() {
            axios
                .get("/procurement/headDashboardGetInvoices")
                .then((response) => {
                    // this.classOptions = response.data.data;
                    // this.showLoader = false;
                    this.chartData = [
                        ["Language", "INVOICES"],
                        ["procurement", response.data.data.procurementCount],
                        [
                            "Accountant School",
                            response.data.data.accountantSchoolCount,
                        ],
                        [
                            "Accountant Financial",
                            response.data.data.accountantFinancialCount,
                        ],
                    ];
                    // console.log(response.data.data);
                    // console.log(this.chartData);
                });
        },

        async headDashboardGetTools() {
            axios.get("/procurement/headDashboardGetTools").then((response) => {
                this.totalTools = response.data.data.totalTools;
                this.newToolTitle = response.data.data.newToolTitle;
                this.brokenToolTitle = response.data.data.brokenToolTitle;
                this.tools = [
                    ["Language", "Tools"],
                    ["Total tools", response.data.data.totalTools],
                    ["New Tools", response.data.data.newTools],
                    ["Broken Tools", response.data.data.brokenTools],
                ];
            });
        },

        async headDashboardGetUploads() {
            axios
                .get("/procurement/headDashboardGetUploads")
                .then((response) => {
                    this.totalUploads = response.data.data.totalUploads;
                    this.uploadTitles = response.data.data.uploadTitles;
                    // console.log(response.data.data)
                });
        },

        department(role) {
            if (role == 3) {
                return "Academic";
            } else if (role == 1) {
                return "Head Master";
            } else if (role == 5) {
                return "Accountant";
            } else if (role == 6) {
                return "Procurement";
            }else if (role == 8){
                return 'Other Offices'
            }
        },

        formattedDate(date) {
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },
    },
};
</script>
