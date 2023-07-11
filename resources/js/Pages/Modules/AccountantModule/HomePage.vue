<template>
    <div class="pt-0 bg-white h-screen">
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
                                            {{ students ? students : 0 }}
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
                                        <span data-plugin="counterup">{{ paidStudents ? paidStudents : 0}}</span>
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
                                        <span data-plugin="counterup">{{ unpaidStudents ? unpaidStudents : 0 }}</span>
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

        <div class="d-flex pt-1">
            <div class="mb-0 pb-0 mr-1">
                <div class="card">
                    <div class="card-body">
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
                                            :head="headDonghurt"
                                            :content="contentDonghurt"
                                        ></pie-chart3-d>
                                    </v-container>
                                </v-tab-item>

                                <v-tab-item key="2">
                                    <v-container fluid>
                                        <pie-chart3-d
                                            :data="finances"
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

            <!-- <div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-1">
                            Recently Finance Reports
                        </h4>

                        <div class="table-responsive">
                            <table
                                class="table table-centered table-nowrap table-hover mb-0"
                            >
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Identity</th>
                                        <th class="border-top-0">
                                            Departiment
                                        </th>
                                        <th class="border-top-0">Title</th>
                                        <th class="border-top-0">Published</th>
                                        <th class="border-top-0">View</th>
                                        <th class="border-top-0">Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img
                                                src="assets/images/users/user-2.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            />
                                        </td>
                                        <td>
                                            <span class="text-center"
                                                >Finance</span
                                            >
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>27.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22"
                                                >mdi-download</v-icon
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img
                                                src="assets/images/users/user-3.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            />
                                        </td>
                                        <td>
                                            <span class="text-center"
                                                >Procurement</span
                                            >
                                        </td>

                                        <td>Finacial report of ...</td>

                                        <td>28.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22"
                                                >mdi-download</v-icon
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img
                                                src="assets/images/users/user-1.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            />
                                        </td>
                                        <td>
                                            <span class="text-center"
                                                >Procurement</span
                                            >
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>28.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22"
                                                >mdi-download</v-icon
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img
                                                src="assets/images/users/user-4.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            />
                                        </td>
                                        <td>
                                            <span class="text-center"
                                                >Finance</span
                                            >
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>29.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22"
                                                >mdi-download</v-icon
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img
                                                src="assets/images/users/user-5.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            />
                                        </td>
                                        <td>
                                            <span class="text-center"
                                                >Account</span
                                            >
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>31.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22"
                                                >mdi-download</v-icon
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img
                                                src="assets/images/users/user-3.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            />
                                        </td>
                                        <td>
                                            <span class="text-center"
                                                >Finance</span
                                            >
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>28.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22"
                                                >mdi-download</v-icon
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img
                                                src="assets/images/users/user-1.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            />
                                        </td>
                                        <td>
                                            <span class="text-center"
                                                >Procurement</span
                                            >
                                        </td>
                                        <td>Finacial report of ...</td>
                                        <td>28.03.2018</td>
                                        <td class="text-center">
                                            <v-icon size="20">mdi-eye</v-icon>
                                        </td>
                                        <td class="text-center">
                                            <v-icon size="22"
                                                >mdi-download</v-icon
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end col-->

            <div class="mb-0 pb-0 mr-1">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Invoices Status</h4>

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
                // console.log(e);
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
            uploadTitles: "",
            staffs: null,
            tools: [],
            finances: [],
            invoices: null,
            chartData: [],
            headDonghurt: "3D New Tools vs Total Tools",
            contentDonghurt:
                "3D This chart shows the percentage of new tools compared to the total number of tools. The pie chart is divided into two sections: new tools and total tools. The chart provides a visual representation of the tool data.",
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
            this.headDashboardGetStudents();
            this.headDashboardGetInvoices();
            this.headDashboardGetUploads();
            // this.headDashboardGetTools();

            this.finances = [
                ["Language", "Finances"],
                ["Incomes", 120000],
                ["Expenses", 320000],
                ["Liabilities", 6700000],
                ["Assets", 700000],
            ];
        },

        async headDashboardGetStudents() {
            axios
                .get("/accountant/headDashboardGetStudents")
                .then((response) => {
                    if (response.data.data != null) {
                        this.students = response.data.data.totalStudents;
                        // Filter the students with entries.length > 0
                        const studentsWithEntries =
                            response.data.data.paidStudents.filter(
                                (student) => student.entries.length > 0
                            );
                        // Get the count of students with entries
                        const count = studentsWithEntries.length;
                        this.unpaidStudents = response.data.data.totalStudents - count
                        this.paidStudents = count
                        this.registeredStudents = [
                            ["Language", "Students"],
                            // ["Total Students", response.data.data.totalStudents],
                            ["Paid Students", this.paidStudents],
                            [
                                "Unpaid Students",
                                this.unpaidStudents,
                            ],
                        ];

                        this.showLoader = false;
                    }

                    // console.log(response.data.data);
                });
        },

        async headDashboardGetInvoices() {
            axios
                .get("/accountant/headDashboardGetInvoices")
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

        async headDashboardGetUploads() {
            axios
                .get("/accountant/headDashboardGetUploads")
                .then((response) => {
                    this.totalUploads = response.data.data.totalUploads;
                    this.uploadTitles = response.data.data.uploadTitles;
                    // console.log(response.data.data)
                });
        },
        // async headDashboardGetTools() {
        //     axios.get("/accountant/headDashboardGetTools").then((response) => {
        //         this.tools = [
        //             ["Language", "Tools"],
        //             ["Total tools", response.data.data.totalTools],
        //             ["New Tools", response.data.data.newTools],
        //             ["Broken Tools", response.data.data.brokenTools],
        //         ];
        //     });
        // },

        // department(role) {
        //     if (role == 3) {
        //         return "Academic";
        //     } else if (role == 1) {
        //         return "Head Master";
        //     } else if (role == 5) {
        //         return "Accountant";
        //     } else if (role == 6) {
        //         return "Procurement";
        //     }
        // },

        // formattedDate(date) {
        //     // return moment(date).format("MMMM Do YYYY");
        //     return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        // },
    },
};
</script>
