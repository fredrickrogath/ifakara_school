<template>
    <div class="bg-gray-100">
        <div class="row bg-grey-100 mb-5">
            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern py-0 my-0 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm  rounded">
                                    <i class=" fas fa-users font-10 text-primary" style="font-size:40px;"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">
                                            {{ students ? students : 'please wait ...' }}
                                        </span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Students
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3 px-0">
                <div class="card bg-pattern py-0 my-0">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm rounded">
                                    <i class="fas fa-money-check avatar-title font-22 text-danger" style="font-size:40px"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">12</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Paid Fees
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern py-0 my-0">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm rounded">
                                    <i class="fas fa-minus-square  avatar-title  text-warning" style="font-size:40px"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">87</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Unpaid Fees
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3 px-0">
                <div class="card bg-pattern py-0 my-0">
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
                                        <span data-plugin="counterup"> {{ totalTool ? totalTool : 'please wait ...'  }} </span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Tools
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

        <div class="row pt-0 mt-0">
            <div class="col-xl-6 col-md-6 mb-0 pb-0">
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

                        <h4 class="header-title mb-2">Analytics Performance</h4>

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
                                <v-tab>Students</v-tab>
                                <v-tab>Cash Flow</v-tab>

                                <v-tab-item key="1">
                                    <v-container fluid>
                                        <pie-chart3-d
                                            :data="registeredStudents"
                                        ></pie-chart3-d>
                                    </v-container>
                                </v-tab-item>

                                <v-tab-item key="2">
                                    <v-container fluid>
                                        <pie-chart3-d
                                            :data="finances"
                                        ></pie-chart3-d>
                                    </v-container>
                                </v-tab-item>
                            </v-tabs>
                        </v-card>
                        <div class="">
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->

            <div class="col-xl-6 col-md-6 mx-0 px-0 pt-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-1">School Staffs</h4>

                        <div class="table-responsive">
                            <table
                                class="table table-centered table-nowrap table-hover mb-0"
                            >
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Identity</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">
                                            Departiment
                                        </th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">
                                            Registered On
                                        </th>
                                        <!-- <th class="border-top-0">Download</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="staff in staffs" :key="staff.id">
                                        <td>
                                            <img
                                                class="h-8 w-8 rounded-full object-cover"
                                                :src="
                                                    $page.props.user
                                                        .profile_photo_url
                                                "
                                                :alt="$page.props.user.name"
                                            />
                                            <!-- <img
                                                src="assets/images/users/user-2.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            /> -->
                                        </td>
                                        <td>
                                            <span class="text-center">
                                                {{ staff.name }}
                                            </span>
                                        </td>
                                        <td>{{ department(staff.role) }}</td>
                                        <td>{{ staff.email }}</td>
                                        <td>
                                            {{
                                                formattedDate(staff.created_at)
                                            }}
                                        </td>
                                        <!-- <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22"
                                                >mdi-download</v-icon
                                            >
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
            students: null,
            paidStudents: null,
            unpaidStudents: null,
            registeredStudents: [],
            totalUploads: null,
            uploadTitles: '',
            staffs: null,
            tools: [],
            finances: [],
            invoices: null,
            chartData: [],
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
            this.headDashboardGetStudents();
            // this.headDashboardGetInvoices();
            this.headDashboardGetStaffs();
            // this.headDashboardGetTools();
            this.headDashboardGetUploads();

            this.finances = [
                ["Language", "Finances"],
                ["Incomes", 120000],
                ["Expenses", 320000],
                ["Liabilities", 6700000],
                ["Assets", 700000],
            ];
        },

        async headDashboardGetStudents() {
            axios.get("/academic/headDashboardGetStudents").then((response) => {
                this.students = response.data.data.totalStudents;
                // this.showLoader = false;
                this.registeredStudents = [
                    ["Language", "Students"],
                    // ["Total Students", response.data.data.totalStudents],
                    ["Paid Students", response.data.data.paidStudents],
                    ["Unpaid Students", response.data.data.unpaidStudents],
                ];

                // console.log(response.data.data);
            });
        },

        async headDashboardGetInvoices() {
            axios.get("/academic/headDashboardGetInvoices").then((response) => {
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

        async headDashboardGetStaffs() {
            axios.get("/academic/headDashboardGetStaffs").then((response) => {
                this.staffs = response.data.data;
                // this.showLoader = false;
                // console.log(response.data.data);
            });
        },

        async headDashboardGetTools() {
            axios.get("/academic/headDashboardGetTools").then((response) => {
                this.tools = [
                    ["Language", "Tools"],
                    ["Total tools", response.data.data.totalTools],
                    ["New Tools", response.data.data.newTools],
                    ["Broken Tools", response.data.data.brokenTools],
                ];
            });
        },

        async headDashboardGetUploads() {
            axios.get("/academic/headDashboardGetUploads").then((response) => {
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
            }
        },

        formattedDate(date) {
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },
    },
};
</script>
