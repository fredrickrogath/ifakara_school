<template>
    <div class="pt-0 bg-gray-100">
        <div class="d-flex">
            <div class="my-0 pt-0 flex-grow-1">
                <div class="card bg-pattern py-0 my-0 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm rounded">
                                    <i
                                        class="fas fa-users font-10 text-primary"
                                        style="font-size: 40px"
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
                                <div class="avatar-sm rounded">
                                    <i
                                        class="fas fa-money-check avatar-title font-22 text-danger"
                                        style="font-size: 40px"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">{{ paidStudents ? paidStudents : 0 }}</span>
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
                                <div class="avatar-sm rounded">
                                    <i
                                        class="fas fa-minus-square avatar-title text-warning"
                                        style="font-size: 40px"
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
                                            {{ totalTool ? totalTool : 0 }}
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
                                <button type="button" class="btn btn-xs btn-light">
                                    Weekly
                                </button>
                                <button type="button" class="btn btn-xs btn-secondary">
                                    Monthly
                                </button>
                            </div> -->
                        </div>

                        <h4 class="header-title mb-2">Analytics Performance</h4>

                        <!-- <div class="text-center">
                            <pie-chart3-d></pie-chart3-d>
                        </div>
 -->

                        <v-card flat>
                            <v-tabs color="deep-purple accent-4" right>
                                <v-tab>Students</v-tab>
                                <v-tab>Tools</v-tab>
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
                                            :data="tools"
                                            :head="headDonghurt"
                                            :content="contentDonghurt"
                                        ></pie-chart3-d>
                                    </v-container>
                                </v-tab-item>

                                <v-tab-item key="3">
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
                    </div>
                </div>
            </div> -->
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
                                height="400"
                            ></google-bar>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>

        <div>
            <div class="col-xl-12 col-md-12 mx-0 px-0 -mt-5 pt-0">
                <div class="card">
                    <div class="">
                        <h4 class="header-title my-1 px-1">School Staffs</h4>

                        <div class="table-responsive">
                            <v-data-table
                                :headers="headers"
                                :items="staffs"
                                item-key="name"
                                class="elevation-1"
                                :items-per-page="7"
                            >
                                <template v-slot:body="{ items, headers }">
                                    <tbody>
                                        <tr
                                            v-for="(item, idx, k) in items"
                                            :key="idx"
                                        >
                                            <td
                                                v-for="(header, key) in headers"
                                                :key="key"
                                            >
                                                <v-icon
                                                    v-if="
                                                        header.value == 'delete'
                                                    "
                                                    size="22"
                                                    type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#warning-alert-modal"
                                                    @click="
                                                        setIdForAction(
                                                            items[idx]['id']
                                                        )
                                                    "
                                                >
                                                    mdi-delete
                                                </v-icon>

                                                <span
                                                    class="text-gray-600"
                                                    v-else-if="
                                                        header.value == 'id'
                                                    "
                                                    >{{
                                                        item[header.value]
                                                    }}</span
                                                >

                                                <span
                                                    class="text-gray-600"
                                                    v-else-if="
                                                        header.value ==
                                                        'created_at'
                                                    "
                                                    >{{
                                                        formattedDate(
                                                            item[header.value]
                                                        )
                                                    }}</span
                                                >

                                                <span
                                                    class="text-gray-600"
                                                    v-else-if="
                                                        header.value ==
                                                        'updated_at'
                                                    "
                                                    >{{
                                                        formattedDate(
                                                            item[header.value]
                                                        )
                                                    }}</span
                                                >

                                                <span
                                                    class="text-gray-600 italic font-semibold"
                                                    v-else-if="
                                                        header.value == 'name'
                                                    "
                                                    >{{
                                                        item[header.value]
                                                    }}</span
                                                >

                                                <span
                                                    class="text-gray-600 italic font-semibold"
                                                    v-else-if="
                                                        header.value == 'email'
                                                    "
                                                >
                                                    {{ item[header.value] }}
                                                </span>

                                                <span
                                                    class="text-gray-600 italic font-semibold"
                                                    v-else-if="
                                                        header.value == 'role'
                                                    "
                                                >
                                                    {{
                                                        department(
                                                            item[header.value]
                                                        )
                                                    }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-data-table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
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
            headers: [
                {
                    text: "Name",
                    align: "start",
                    sortable: false,
                    value: "name",
                },
                {
                    text: "Email",
                    value: "email",
                },
                {
                    text: "Department",
                    value: "role",
                },
                { text: "Date", value: "created_at" },
            ],
            echo: null,
            students: null,
            paidStudents: null,
            unpaidStudents: null,
            registeredStudents: [],
            staffs: [],
            totalTool: null,
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
            this.headDashboardGetStaffs();
            this.headDashboardGetTools();

            this.finances = [
                ["Language", "Finances"],
                ["Incomes", 120000],
                ["Expenses", 320000],
                ["Liabilities", 6700000],
                ["Assets", 700000],
            ];
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
            } else if (role == 8) {
                return "Other Offices";
            }
        },

        async headDashboardGetStudents() {
            axios.get("/head/headDashboardGetStudents").then((response) => {
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
            axios.get("/head/headDashboardGetInvoices").then((response) => {
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
            axios.get("/head/headDashboardGetStaffs").then((response) => {
                this.staffs = response.data.data;
                // this.showLoader = false;
                // console.log(response.data.data);
            });
        },

        async headDashboardGetTools() {
            axios.get("/head/headDashboardGetTools").then((response) => {
                this.totalTool = response.data.data.totalTools;
                this.tools = [
                    ["Language", "Tools"],
                    ["Total tools", response.data.data.totalTools],
                    ["New Tools", response.data.data.newTools],
                    ["Broken Tools", response.data.data.brokenTools],
                ];
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
            }else if (role == 8) {
                return "Other Offices";
            }
        },

        formattedDate(date) {
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },
    },
};
</script>
