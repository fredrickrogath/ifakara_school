<template>
    <div class="pt-0 bg-gray-100" data-app>
        <div class="d-flex">
            <div class="my-0 pt-0 flex-grow-1">
                <div class="card bg-pattern py-0 my-0 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-yellow-400 rounded">
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
                                <div class="avatar-sm bg-yellow-400 rounded">
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
                                <div class="avatar-sm bg-yellow-400 rounded">
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
                                <div class="avatar-sm bg-yellow-400 rounded">
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
                                            uploadTitles ? uploadTitles : "Wait"
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
            <div class="mr-1">
                <div class="card">
                    <div class="card-body">
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
                                            :head="head"
                                            :content="content"
                                        ></pie-chart3-d>
                                    </v-container>
                                </v-tab-item>

                                <v-tab-item key="2">
                                    <v-container fluid>
                                        <pie-chart3-d
                                            :data="finances"
                                            :head="head"
                                            :content="content"
                                        ></pie-chart3-d>
                                    </v-container>
                                </v-tab-item>
                            </v-tabs>
                        </v-card>
                        <div class=""></div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->

            <div class="col-xl-6 col-md-6 mx-0 px-0 pt-0">
                <div class="card">
                    <div class="px-1">
                        <div
                            class="d-flex justify-content-start align-content-center"
                        >
                            <h4 class="header-title mb-1 pl-3 pt-3">
                                School Staffs {{ staffs.length }}
                                in total
                            </h4>
                            <a href="departiment" class="ml-5 mt-3">
                                <v-icon size="21" class="mb-2">
                                    mdi-eye
                                </v-icon>
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table table-centered table-nowrap table-hover mb-0 text-gray-900"
                            >
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Identity</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">
                                            Departiment
                                        </th>
                                        <th class="border-top-0">Email</th>
                                        <!-- <th class="border-top-0">
                                            Registered On
                                        </th> -->
                                        <!-- <th class="border-top-0">Download</th> -->
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 italic font-semibold">
                                    <tr
                                        v-for="(staff, index) in staffs"
                                        :key="staff.id"
                                        v-if="index < 8"
                                    >
                                        <td class="py-1">
                                            <img
                                                class="h-8 w-8 rounded-full object-cover"
                                                :src="
                                                    'https://ui-avatars.com/api/?name=' +
                                                    formatName(staff.name) +
                                                    '&color=F8FAFC&background=6b7280'
                                                "
                                                :alt="staff.name"
                                            />
                                            <!-- <img
                                                src="assets/images/users/user-2.jpg"
                                                alt="user-pic"
                                                class="rounded-circle avatar-sm bx-shadow-lg"
                                            /> -->
                                        </td>
                                        <td class="italic font-semibold">
                                            <span class="text-center">
                                                {{ staff.name }}
                                            </span>
                                        </td>
                                        <td class="italic font-semibold">
                                            {{ department(staff.role) }}
                                        </td>
                                        <td class="italic font-semibold">
                                            {{ staff.email }}
                                        </td>
                                        <!-- <td>
                                            {{
                                                formattedDate(staff.created_at)
                                            }}
                                        </td> -->
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
            staffs: [],
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

        formatName(name) {
            const nameArr = name.split(" ");
            const formattedNameArr = nameArr.map((name) => {
                return name.charAt(0).toUpperCase() + name.slice(1);
            });
            const formattedName = formattedNameArr.join("+");
            // this.formattedName = formattedName;
            return formattedName;
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
                return "Academic Office";
            } else if (role == 1) {
                return "Head Office";
            } else if (role == 5) {
                return "Accountant Office";
            } else if (role == 6) {
                return "Procurement Office";
            }
        },

        formattedDate(date) {
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },
    },
};
</script>
