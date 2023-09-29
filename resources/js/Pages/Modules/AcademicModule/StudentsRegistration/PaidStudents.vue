<template>
    <!-- <v-col>
        <v-row> -->
    <div class="">
        <!-- Right Sidebar -->
        <div class="col-12 p-0 m-0 pt-2">
            <div class="h-screen bg-white" v-show="getPaymentView">
                <payment-view></payment-view>
            </div>
            <div class="h-screen bg-white" v-show="!getPaymentView">
                <spinner v-if="showLoader"></spinner>

                <!-- <v-col v-else sm="12" md="12"> -->
                <!-- <v-card flat :dark="isDark"> -->
                <!-- <v-card elevation="0" data-app> -->

                    <v-card-title class="px-0 pt-0 pb-1">
                <div class="pl-2 pt-1 text-sm uppercase">Payments</div>
                <v-spacer></v-spacer>
                
                <snack-bar
                    class="absolute right-0 top-14"
                    message="Task completed successfully"
                    ></snack-bar>
                    
                    <v-spacer></v-spacer>
                

                <div class="flex col-3 p-0 pt-1 mr-2">
                    <input v-model="search" type="text" class="form-control form-control-sm" />
                    <v-icon size="20" class="px-1">mdi-magnify</v-icon>
                </div>
            </v-card-title>
            <hr class="bg-gray-200 mb-1 mt-0" />
                <!-- {{ $page.props.posts }} -->

                <hr class="bg-gray-200 mb-2 mt-0" />

                <div class="d-flex justify-content-between">
                    <div class="ml-3">
                        <span class="text-xl font-semibold">
                            {{ filteredStudentCount }}
                        </span>
                        <span>
                            {{ payType }}
                        </span>
                        <span>STUDENTS</span>
                    </div>

                    <div class="d-flex justify-content-end">
                        <span
                            class="cursor-pointer uppercase ml-3"
                            :class="
                                getActivePayment == 'ALL'
                                    ? 'text-warning'
                                    : 'underline'
                            "
                            @click="setActivePayment('ALL')"
                            >ALL</span
                        >
                        <div
                            v-for="classs in classes"
                            :key="classs.id"
                            class="d-flex"
                        >
                            <span
                                class="cursor-pointer uppercase ml-3"
                                :class="
                                    getActivePayment == classs.class_level
                                        ? 'text-warning'
                                        : 'underline'
                                "
                                @click="setActivePayment(classs.class_level)"
                                >{{ classs.class_level }}</span
                            >
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <span
                            class="cursor-pointer uppercase ml-3"
                            :class="
                                getActivePayment == 'ALL'
                                    ? 'text-warning'
                                    : 'underline'
                            "
                            @click="setActivePayment('ALL')"
                            >ALL</span
                        >
                        <div class="d-flex">
                            <span
                                class="cursor-pointer uppercase ml-3"
                                :class="
                                    getActivePayment == 'PAID'
                                        ? 'text-warning'
                                        : 'underline'
                                "
                                @click="setActivePayment('PAID')"
                            >
                                paid
                            </span>

                            <span
                                class="cursor-pointer uppercase ml-3 mr-2"
                                :class="
                                    getActivePayment == 'UNPAID'
                                        ? 'text-warning'
                                        : 'underline'
                                "
                                @click="setActivePayment('UNPAID')"
                            >
                                unpaid
                            </span>

                            <span
                                class="cursor-pointer uppercase ml-3 mr-2"
                                :class="
                                    getActivePayment == 'PARTIALPAID'
                                        ? 'text-warning'
                                        : 'underline'
                                "
                                @click="setActivePayment('PARTIALPAID')"
                            >
                                partial paid
                            </span>

                            <span
                                class="cursor-pointer uppercase ml-3 mr-2"
                                :class="
                                    getActivePayment == 'FULLPAID'
                                        ? 'text-warning'
                                        : 'underline'
                                "
                                @click="setActivePayment('FULLPAID')"
                            >
                                full paid
                            </span>
                        </div>
                    </div>
                </div>

                <hr class="bg-gray-200 mb-2 mt-1" />

                <v-data-table
                    :headers="headers"
                    :items="filteredStudents"
                    item-key="name"
                    :search="search"
                    class="elevation-1"
                    :items-per-page="20"
                >
                    <template v-slot:body="{ items, headers }">
                        <tbody>
                            <tr v-for="(item, idx, k) in items" :key="idx">
                                <td v-for="(header, key) in headers" :key="key">
                                    <v-icon
                                        v-if="header.value == 'view'"
                                        size="22"
                                        @click="
                                            studentDetails(items[idx]['id'])
                                        "
                                    >
                                        mdi-eye
                                    </v-icon>

                                    <span
                                        class="text-gray-600 italic font-semibold text-xs"
                                        v-else-if="header.value == 'created_at'"
                                        >{{
                                            formattedDate(item[header.value])
                                        }}</span
                                    >

                                    <span
                                        class="text-gray-600"
                                        v-else-if="header.value == 'updated_at'"
                                        >{{
                                            formattedDate(item[header.value])
                                        }}</span
                                    >

                                    <span
                                        class="text-gray-600 italic font-semibold text-xs"
                                        v-else-if="header.value == 'first_name'"
                                        >{{ item[header.value] }}</span
                                    >

                                    <span
                                        class="text-gray-600 italic font-semibold text-xs"
                                        v-else-if="
                                            header.value == 'middle_name'
                                        "
                                    >
                                        {{ item[header.value] }}
                                    </span>

                                    <span
                                        class="text-gray-600 italic font-semibold text-xs"
                                        v-else-if="header.value == 'last_name'"
                                    >
                                        {{ item[header.value] }}
                                    </span>

                                    <span
                                        class="text-gray-600 italic font-semibold text-xs"
                                        v-else-if="header.value == 'class_type'"
                                        >{{
                                            item[header.value].class_level
                                        }}</span
                                    >

                                    <span
                                        class="text-gray-600 italic font-semibold text-xs"
                                        v-else-if="header.text === 'Level 1'"
                                    >
                                        <template
                                            v-if="
                                                item[header.value] &&
                                                item[header.value].length > 0
                                            "
                                        >
                                            <div class="d-flex flex-col">
                                                <span>
                                                    EXPECTED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-yellow-500"
                                                        >{{
                                                            formattedPrice(
                                                                item[
                                                                    header.value
                                                                ][0]
                                                                    .chart_of_account
                                                                    .level1
                                                            )
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    TOTAL PAYMENTS
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-green-500"
                                                        >{{
                                                            calculateTotal(
                                                                item[
                                                                    header.value
                                                                ],
                                                                "level_1"
                                                            )
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    REMAINED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span class="text-red-500">
                                                        {{
                                                            calculateRemained(
                                                                item[
                                                                    header.value
                                                                ][0]
                                                                    .chart_of_account
                                                                    .level1,
                                                                item[
                                                                    header.value
                                                                ],
                                                                "level_1"
                                                            )
                                                        }}
                                                    </span>
                                                </span>
                                            </div>
                                        </template>
                                        <template v-else>
                                            <!-- {{ formattedPrice(0) }} -->
                                            <div class="d-flex flex-col">
                                                <span>
                                                    EXPECTED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-yellow-500"
                                                        >{{
                                                            formattedPrice(0)
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    TOTAL PAYMENTS
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-green-500"
                                                        >{{
                                                            formattedPrice(0)
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    REMAINED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-red-500"
                                                        >{{
                                                            formattedPrice(0)
                                                        }}</span
                                                    >
                                                </span>
                                            </div>
                                        </template>
                                    </span>

                                    <span
                                        class="text-gray-600 italic font-semibold text-xs"
                                        v-else-if="header.text === 'Level 2'"
                                    >
                                        <template
                                            v-if="
                                                item[header.value] &&
                                                item[header.value].length > 0
                                            "
                                        >
                                            <div class="d-flex flex-col">
                                                <span>
                                                    EXPECTED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-yellow-500"
                                                        >{{
                                                            formattedPrice(
                                                                item[
                                                                    header.value
                                                                ][0]
                                                                    .chart_of_account
                                                                    .level2
                                                            )
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    TOTAL PAYMENTS
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-green-500"
                                                        >{{
                                                            calculateTotal(
                                                                item[
                                                                    header.value
                                                                ],
                                                                "level_2"
                                                            )
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    REMAINED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span class="text-red-500">
                                                        {{
                                                            calculateRemained(
                                                                item[
                                                                    header.value
                                                                ][0]
                                                                    .chart_of_account
                                                                    .level2,
                                                                item[
                                                                    header.value
                                                                ],
                                                                "level_2"
                                                            )
                                                        }}
                                                    </span>
                                                </span>
                                            </div>
                                        </template>
                                        <template v-else>
                                            <!-- {{ formattedPrice(0) }} -->
                                            <div class="d-flex flex-col">
                                                <span>
                                                    EXPECTED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-yellow-500"
                                                        >{{
                                                            formattedPrice(0)
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    TOTAL PAYMENTS
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-green-500"
                                                        >{{
                                                            formattedPrice(0)
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    REMAINED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-red-500"
                                                        >{{
                                                            formattedPrice(0)
                                                        }}</span
                                                    >
                                                </span>
                                            </div>
                                        </template>
                                    </span>

                                    <span
                                        class="text-gray-600 italic font-semibold text-xs"
                                        v-else-if="header.text === 'Level 3'"
                                    >
                                        <template
                                            v-if="
                                                item[header.value] &&
                                                item[header.value].length > 0
                                            "
                                        >
                                            <div class="d-flex flex-col">
                                                <span>
                                                    EXPECTED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-yellow-500"
                                                        >{{
                                                            formattedPrice(
                                                                item[
                                                                    header.value
                                                                ][0]
                                                                    .chart_of_account
                                                                    .level3
                                                            )
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    TOTAL PAYMENTS
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-green-500"
                                                        >{{
                                                            calculateTotal(
                                                                item[
                                                                    header.value
                                                                ],
                                                                "level_3"
                                                            )
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    REMAINED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span class="text-red-500">
                                                        {{
                                                            calculateRemained(
                                                                item[
                                                                    header.value
                                                                ][0]
                                                                    .chart_of_account
                                                                    .level3,
                                                                item[
                                                                    header.value
                                                                ],
                                                                "level_3"
                                                            )
                                                        }}
                                                    </span>
                                                </span>
                                            </div>
                                        </template>
                                        <template v-else>
                                            <!-- {{ formattedPrice(0) }} -->
                                            <div class="d-flex flex-col">
                                                <span>
                                                    EXPECTED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-yellow-500"
                                                        >{{
                                                            formattedPrice(0)
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    TOTAL PAYMENTS
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-green-500"
                                                        >{{
                                                            formattedPrice(0)
                                                        }}</span
                                                    >
                                                </span>
                                                <span>
                                                    REMAINED
                                                    <v-icon
                                                        size="20"
                                                        class="mb-1 px-1"
                                                        >mdi-hand-pointing-right</v-icon
                                                    >
                                                    <span
                                                        class="text-red-500"
                                                        >{{
                                                            formattedPrice(0)
                                                        }}</span
                                                    >
                                                </span>
                                            </div>
                                        </template>
                                    </span>

                                    <span
                                        class="text-gray-600 italic font-semibold text-xs"
                                        v-else-if="
                                            header.text === 'Last Pay On'
                                        "
                                    >
                                        {{
                                            item[header.value] &&
                                            item[header.value].level_3 !== null
                                                ? formattedDate(
                                                      item[header.value]
                                                          .updated_at
                                                  )
                                                : 0
                                        }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </v-data-table>
                <!-- </v-col> -->
            </div>
        </div>
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
import moment from "moment";
import Spinner from "../../../Components/SpinnerLoader.vue";
import SnackBar from "../../../Components/SnackBar.vue";
import PaymentView from "../PaymentDetails/PaymentView.vue";
export default {
    components: {
        Spinner,
        SnackBar,
        PaymentView,
    },

    props: {
        // postsData: {
        // type: Number,
        // default: [],
        // default(rawProps) {
        //     return { message: "hello" };
        // },
        // DATA TYPES
        // String
        // Number
        // Boolean
        // Array
        // Object
        // Date
        // Function
        // Symbol
        // disabled: [Boolean, Number]
        // },
    },

    mounted() {
        this.showLoader = true;
        this.getStudents();
        this.getStudentClasses();

        // window.Echo.channel("EventTriggered").listen(
        //     "NewPostPublished",
        //     (e) => {
        //         console.log('abc');
        //         // this.getTools();
        //     }
        // );

        // Receiving broadicasting
        // window.Echo.channel("StudentTriggered").listen(
        //     ".Api\\Secretary\\StudentEvent",
        //     (e) => {
        //         console.log('abc');
        //         this.getStudents();
        //     }
        // );

        // window.Echo.channel("student-event." + this.$page.props.user.school_id).listen(
        //     "Academic\\StudentEvent",
        //     (e) => {
        //         this.getStudents();
        //     }
        // );

        // Receiving broadicasting
        //  window.Echo.channel("student-trigger-from-financial-secretary").listen(
        //     "ApiSecretaryStudentEvent",
        //     (e) => {
        //         console.log('student-trigger-from-financial-secretary');
        //         // this.getTools();
        //     }
        // );

        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log(e);
            }
        );
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            showLoader: true,
            search: "",
            headers: [
                {
                    text: "First Name",
                    align: "start",
                    sortable: false,
                    value: "first_name",
                },
                {
                    text: "Middle Name",
                    value: "middle_name",
                },
                {
                    text: "Last Name",
                    value: "last_name",
                },
                {
                    text: "Class",
                    value: "class_type",
                },
                {
                    text: "Level 1",
                    value: "entries",
                },

                {
                    text: "Level 2",
                    value: "entries",
                },

                {
                    text: "Level 3",
                    value: "entries",
                },
                { text: "Last Pay On", value: "entries" },
                { text: "Details", value: "view" },
                // { text: "Parent", value: "parent" },
                // { text: "Contact", value: "parent_contact" },
                // { text: "Edit", value: "edit" },
            ],
            students: [],

            payType: "ALL",

            classes: [],

            classType: "ALL",

            idForAction: null,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        // getStudentId() {
        //     this.$store.dispatch("AcademicStudentModule/setStudentId", id);
        //     this.$store.dispatch("AcademicStudentModule/setEditStudent");
        // },

        getActivePayment() {
            this.classType =
                this.$store.getters["AcademicStudentModule/getActivePayment"];
            this.payType =
                this.$store.getters["AcademicStudentModule/getActivePayment"];
            return this.$store.getters[
                "AcademicStudentModule/getActivePayment"
            ];
        },

        filteredStudents() {
            if (this.payType === "ALL") {
                return this.students; // Display all rows
            } else if (this.payType === "PAID") {
                // Show only students who have paid (entries.length > 0)
                return this.students.filter(
                    (student) => student.entries.length > 0
                );
            } else if (this.payType === "UNPAID") {
                // Show only students who have not paid (entries.length == 0)
                return this.students.filter(
                    (student) => student.entries.length === 0
                );
            } else if (this.payType === "PARTIALPAID") {
                const filteredStudents = this.students.filter(
                    (student) => student.entries.length > 0
                );

                const studentsWithTrueComparison = filteredStudents.filter(
                    (student) => {
                        const total = student.entries.reduce((acc, entry) => {
                            return (
                                acc +
                                entry.level_1 +
                                entry.level_2 +
                                entry.level_3
                            );
                        }, 0);

                        const chartOfAccountTotal = student.entries[0]
                            ? student.entries[0].chart_of_account.level1 +
                              student.entries[0].chart_of_account.level2 +
                              student.entries[0].chart_of_account.level3
                            : 0;

                        return total !== chartOfAccountTotal;
                    }
                );

                return studentsWithTrueComparison;
            } else if (this.payType === "FULLPAID") {
                const filteredStudents = this.students.filter(
                    (student) => student.entries.length > 0
                );

                const studentsWithTrueComparison = filteredStudents.filter(
                    (student) => {
                        const total = student.entries.reduce((acc, entry) => {
                            return (
                                acc +
                                entry.level_1 +
                                entry.level_2 +
                                entry.level_3
                            );
                        }, 0);

                        const chartOfAccountTotal = student.entries[0]
                            ? student.entries[0].chart_of_account.level1 +
                              student.entries[0].chart_of_account.level2 +
                              student.entries[0].chart_of_account.level3
                            : 0;

                        return total === chartOfAccountTotal;
                    }
                );

                return studentsWithTrueComparison;
            } else {
                return this.students.filter(
                    (item) => item.class_type.class_level === this.classType
                );
            }
        },

        filteredStudentCount() {
            return this.filteredStudents.length;
        },

        getPaymentView() {
            return this.$store.getters[
                "AccountantInvoiceModule/getPaymentView"
            ];
        },
    },

    methods: {
        async setIdForAction(id) {
            this.idForAction = id;
        },

        formattedPrice(amount) {
            return amount.toLocaleString("sw-TZ", {
                style: "currency",
                currency: "Tsh",
            });
        },

        formattedDate(date) {
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        studentDetails(id) {
            this.setInvoiceView(id);
        },

        setInvoiceView(id) {
            this.$store.dispatch("AccountantInvoiceModule/setPaymentView", id);
        },

        setActivePayment(payType) {
            this.payType = payType;
            this.$store.dispatch(
                "AcademicStudentModule/setActivePayment",
                payType
            );
        },

        calculateRemained(level, entries, levelPropertyName) {
            // Check if levelPropertyName exists in the first entry
            if (
                entries.length > 0 &&
                entries[0].hasOwnProperty(levelPropertyName)
            ) {
                const totalLevel = entries.reduce(
                    (acc, entry) => acc + entry[levelPropertyName],
                    0
                );
                return this.formattedPrice(level - totalLevel);
            } else {
                return "Invalid level property name";
            }
        },

        calculateTotal(entries, level) {
            const total = entries.reduce((acc, entry) => acc + entry[level], 0);
            return this.formattedPrice(total);
        },

        getStudents() {
            axios.get("/academic/getStudentPayments").then((response) => {
                this.students = response.data.data;
                // console.log(this.students)
                this.showLoader = false;
                // console.log(
                //     response.data.data[2].entries.chart_of_account.level1 -
                //         response.data.data[2].entries.reduce(
                //             (total, entry) => total + entry.level_1,
                //             0
                //         )
                // );

                // console.log(
                //     response.data.data[2].entries.reduce(
                //         (total, entry) => total + entry.level_2,
                //         0
                //     )
                // );

                // console.log(
                //     response.data.data[2].entries.reduce(
                //         (total, entry) => total + entry.level_3,
                //         0
                //     )
                // );
            });
        },

        getStudentClasses() {
            axios.get("/academic/getStudentClasses").then((response) => {
                this.classes = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data);
            });
        },

        save(id, column, data) {
            this.updateTools(id, data, column);
            // console.log(id + " , " +data);
        },
        cancel() {},
        open() {},
        close() {},
    },
};
</script>
