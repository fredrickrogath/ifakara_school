<template>
    <div>
        <spinner v-if="showLoader"></spinner>

        <v-card-title class="px-1 py-0 my-0 font-15">
           
            <div class="pl-2 pt-1 text-sm uppercase">STUDENT PAYMENTS REPORT <span class="d-none">{{ formattedDateRange }}</span></div>

            <v-spacer></v-spacer>

            <v-row class="px-2 pt-1 font-14">
                <v-menu
                    ref="datePickerMenu"
                    :close-on-content-click="false"
                    v-model="datePickerMenu"
                    :return-value.sync="dates"
                    transition="scale-transition"
                    offset-y
                    max-width="290px"
                >
                    <template v-slot:activator="{ on }">
                        <v-text-field
                            v-model="dateRangeText"
                            label="Date range"
                            prepend-icon="mdi-calendar"
                            class=""
                            readonly
                            v-on="on"
                        ></v-text-field>
                    </template>
                    <v-date-picker
                        color="#52525b"
                        header-color="#52525b"
                        v-model="dates"
                        range
                    ></v-date-picker>
                    <v-card-actions>
                        <v-btn
                            text
                            color="primary"
                            class="w-full bg-gray-600 text-white"
                            @click="
                                datePickerMenu = false;
                                filteredStudentsByDate();
                            "
                        >
                            Done
                        </v-btn>
                    </v-card-actions>
                </v-menu>
            </v-row>

            <!-- <v-spacer></v-spacer> -->
            <div class="flex col-3 p-0 pt-1 mr-2">
                    <input v-model="search" type="text" class="form-control form-control-sm" />
                    <v-icon size="20" class="px-1">mdi-magnify</v-icon>
                </div>
            <!-- <v-spacer></v-spacer> -->
            <v-icon size="22" @click="resetData"> mdi-restore </v-icon>
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
                        getActivePayment == 'ALL' ? 'text-warning' : 'underline'
                    "
                    @click="setActivePayment('ALL')"
                    >ALL</span
                >
                <div v-for="classs in classes" :key="classs.id" class="d-flex">
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
                        getActivePayment == 'ALL' ? 'text-warning' : 'underline'
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
            :items="students"
            item-key="name"
            :search="search"
            class="elevation-1 font-14"
            :items-per-page="20"
        >
            <template v-slot:body="{ items, headers }">
                <tbody>
                    <tr v-for="(item, idx, k) in items" :key="idx">
                        <td v-for="(header, key) in headers" :key="key">
                            <!-- <v-icon
                                v-if="header.value == 'delete'"
                                size="22"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#warning-alert-modal"
                                @click="setIdForAction(items[idx]['id'])"
                            >
                                mdi-delete
                            </v-icon>

                            <v-icon
                                v-if="header.value == 'view'"
                                size="22"
                                @click="setInvoiceView(items[idx]['id'])"
                            >
                                mdi-eye
                            </v-icon>

                            <v-icon
                                v-if="header.value == 'edit'"
                                size="22"
                                @click="setEditStudent(items[idx]['id'])"
                            >
                                mdi-pen
                            </v-icon> -->

                            <!-- <v-icon
                                        v-if="header.value == 'starred'"
                                        size="22"
                                        :class="
                                            item[header.value]
                                                ? 'text-warning'
                                                : ''
                                        "
                                        @click="
                                            starredInvoice(
                                                items[idx]['id'],
                                                item[header.value],
                                                header.value
                                            )
                                        "
                                    >
                                        mdi-star
                                    </v-icon> -->

                            <v-icon
                                v-if="header.value == 'view'"
                                size="22"
                                @click="studentDetails(items[idx]['id'])"
                            >
                                mdi-eye
                            </v-icon>

                            <!-- <span
                                class="text-gray-600"
                                v-else-if="header.value == 'id'"
                                >{{ item[header.value] }}</span
                            > -->

                            <!-- <span
                                class="text-gray-600 italic font-semibold"
                                v-else-if="header.value == 'created_at'"
                                >{{ formattedDate(item[header.value]) }}</span
                            >

                            <span
                                class="text-gray-600"
                                v-else-if="header.value == 'updated_at'"
                                >{{ formattedDate(item[header.value]) }}</span
                            > -->

                            <span
                                class="text-gray-600 italic font-semibold text-xs"
                                v-else-if="header.value == 'first_name'"
                                >{{ item[header.value] }}</span
                            >

                            <span
                                class="text-gray-600 italic font-semibold text-xs"
                                v-else-if="header.value == 'middle_name'"
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
                                >{{ item[header.value].class_level }}</span
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
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-yellow-500">{{
                                                formattedPrice(
                                                    item[header.value][0]
                                                        .chart_of_account.level1
                                                )
                                            }}</span>
                                        </span>
                                        <span>
                                            TOTAL PAYMENTS
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-green-500">{{
                                                formattedPrice(
                                                    item[header.value].reduce(
                                                        (total, entry) =>
                                                            total +
                                                            entry.level_1,
                                                        0
                                                    )
                                                )
                                            }}</span>
                                        </span>
                                        <span>
                                            REMAINED
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-red-500">{{
                                                formattedPrice(
                                                    item[header.value][0]
                                                        .chart_of_account
                                                        .level1 -
                                                        item[
                                                            header.value
                                                        ].reduce(
                                                            (total, entry) =>
                                                                total +
                                                                entry.level_1,
                                                            0
                                                        )
                                                )
                                            }}</span>
                                        </span>
                                    </div>
                                </template>
                                <template v-else>
                                    <!-- {{ formattedPrice(0) }} -->
                                    <div class="d-flex flex-col">
                                        <span>
                                            EXPECTED
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-yellow-500">{{
                                                formattedPrice(0)
                                            }}</span>
                                        </span>
                                        <span>
                                            TOTAL PAYMENTS
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-green-500">{{
                                                formattedPrice(0)
                                            }}</span>
                                        </span>
                                        <span>
                                            REMAINED
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-red-500">{{
                                                formattedPrice(0)
                                            }}</span>
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
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-yellow-500">{{
                                                formattedPrice(
                                                    item[header.value][0]
                                                        .chart_of_account.level2
                                                )
                                            }}</span>
                                        </span>
                                        <span>
                                            TOTAL PAYMENTS
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-green-500">{{
                                                formattedPrice(
                                                    item[header.value].reduce(
                                                        (total, entry) =>
                                                            total +
                                                            entry.level_2,
                                                        0
                                                    )
                                                )
                                            }}</span>
                                        </span>
                                        <span>
                                            REMAINED
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-red-500">{{
                                                formattedPrice(
                                                    item[header.value][0]
                                                        .chart_of_account
                                                        .level2 -
                                                        item[
                                                            header.value
                                                        ].reduce(
                                                            (total, entry) =>
                                                                total +
                                                                entry.level_2,
                                                            0
                                                        )
                                                )
                                            }}</span>
                                        </span>
                                    </div>
                                </template>
                                <template v-else>
                                    <!-- {{ formattedPrice(0) }} -->
                                    <div class="d-flex flex-col">
                                        <span>
                                            EXPECTED
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-yellow-500">{{
                                                formattedPrice(0)
                                            }}</span>
                                        </span>
                                        <span>
                                            TOTAL PAYMENTS
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-green-500">{{
                                                formattedPrice(0)
                                            }}</span>
                                        </span>
                                        <span>
                                            REMAINED
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-red-500">{{
                                                formattedPrice(0)
                                            }}</span>
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
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-yellow-500">{{
                                                formattedPrice(
                                                    item[header.value][0]
                                                        .chart_of_account.level3
                                                )
                                            }}</span>
                                        </span>
                                        <span>
                                            TOTAL PAYMENTS
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-green-500">{{
                                                formattedPrice(
                                                    item[header.value].reduce(
                                                        (total, entry) =>
                                                            total +
                                                            entry.level_3,
                                                        0
                                                    )
                                                )
                                            }}</span>
                                        </span>
                                        <span>
                                            REMAINED
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-red-500">{{
                                                formattedPrice(
                                                    item[header.value][0]
                                                        .chart_of_account
                                                        .level3 -
                                                        item[
                                                            header.value
                                                        ].reduce(
                                                            (total, entry) =>
                                                                total +
                                                                entry.level_3,
                                                            0
                                                        )
                                                )
                                            }}</span>
                                        </span>
                                    </div>
                                </template>
                                <template v-else>
                                    <!-- {{ formattedPrice(0) }} -->
                                    <div class="d-flex flex-col">
                                        <span>
                                            EXPECTED
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-yellow-500">{{
                                                formattedPrice(0)
                                            }}</span>
                                        </span>
                                        <span>
                                            TOTAL PAYMENTS
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-green-500">{{
                                                formattedPrice(0)
                                            }}</span>
                                        </span>
                                        <span>
                                            REMAINED
                                            <v-icon size="20" class="mb-1 px-1"
                                                >mdi-hand-pointing-right</v-icon
                                            >
                                            <span class="text-red-500">{{
                                                formattedPrice(0)
                                            }}</span>
                                        </span>
                                    </div>
                                </template>
                            </span>

                            <span
                                class="text-gray-600 italic font-semibold text-xs"
                                v-else-if="header.text === 'Last Pay On'"
                            >
                                {{
                                    item[header.value] &&
                                    item[header.value].length > 0
                                        ? formattedDate(
                                              item[header.value][
                                                  item[header.value].length - 1
                                              ].updated_at
                                          )
                                        : "No Payment Done"
                                }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </template>
        </v-data-table>
        <v-btn class="w-screen" @click="generatePDF"
            >Generate REPORT {{ reportRange }}</v-btn
        >
    </div>
</template>

<script>
import moment from "moment";
import jsPDF from "jspdf";
import Spinner from "../../.././Components/SpinnerLoader.vue";
import SnackBar from "../../.././Components/SnackBar.vue";
import SellerProfile from "../../../Components/SellerProfile.vue";
export default {
    components: {
        Spinner,
        SnackBar,
        SellerProfile,
    },

    mounted() {
        this.showLoader = true;
        this.getStudents();
        this.getStudentClasses();
        // this.getTools();

        // window.Echo.channel(
        //     "student-event." + this.$page.props.user.school_id
        // ).listen("Academic\\StudentEvent", (e) => {
        //     this.getStudents();
        // });
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            showLoader: true,
            search: "",
            searchTools: "",
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
                // { text: "Details", value: "view" },
                // { text: "Parent", value: "parent" },
                // { text: "Contact", value: "parent_contact" },
                // { text: "Edit", value: "edit" },
            ],

            showLoader: true,
            students: [],
            payType: "ALL",

            classes: [],

            classType: "ALL",
            storeStudents: [],

            idForAction: null,

            dates: [null, null],
            reportRange: "By search ,No Date Seleted",
            datePickerMenu: false,
            dateRangeText: "",
            sellerInfo: [],
        };
    },

    watch: {
        //Add watchers...
        // dates() {
        // },
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        getCurrentTab() {
            return this.$store.getters["ProcurementReportModule/getTab"];
        },

        formattedDateRange() {
            const startDate = this.dates[0];
            const endDate = this.dates[1];

            if (startDate && endDate) {
                const formattedStartDate =
                    moment(startDate).format("MMM D, YYYY");
                const formattedEndDate = moment(endDate).format("MMM D, YYYY");
                this.reportRange = `${formattedStartDate} - ${formattedEndDate}`;
                // return `${formattedStartDate} - ${formattedEndDate}`;
            }

            // return "No Date Selected";
        },

        // filteredStudents() {
        //     return this.students.filter((student) => {
        //         const matchesSearch = this.headers.some((header) => {
        //             const value = student[header.value];
        //             return (
        //                 value &&
        //                 value
        //                     .toString()
        //                     .toLowerCase()
        //                     .includes(this.search.toLowerCase())
        //             );
        //         });

        //         if (!matchesSearch) return false;

        //         if (!this.selectedDate) return true;

        //         const startDate = moment(this.selectedDate.start);
        //         const endDate = moment(this.selectedDate.end);
        //         const studentDate = moment(student.created_at);

        //         return studentDate.isBetween(startDate, endDate, "day", "[]");
        //     });
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

        // filteredStudents() {
        //     if (this.payType === "ALL") {
        //         return this.students; // Display all rows
        //     } else if (this.payType === "PAID") {
        //         // Show only students who have paid (entries.length > 0)
        //         return this.students.filter(
        //             (student) => student.entries.length > 0
        //         );
        //     } else if (this.payType === "UNPAID") {
        //         // Show only students who have not paid (entries.length == 0)
        //         return this.students.filter(
        //             (student) => student.entries.length === 0
        //         );
        //     } else if (this.payType === "PARTIALPAID") {
        //         const filteredStudents = this.students.filter(
        //             (student) => student.entries.length > 0
        //         );

        //         const studentsWithTrueComparison = filteredStudents.filter(
        //             (student) => {
        //                 const total = student.entries.reduce((acc, entry) => {
        //                     return (
        //                         acc +
        //                         entry.level_1 +
        //                         entry.level_2 +
        //                         entry.level_3
        //                     );
        //                 }, 0);

        //                 const chartOfAccountTotal = student.entries[0]
        //                     ? student.entries[0].chart_of_account.level1 +
        //                       student.entries[0].chart_of_account.level2 +
        //                       student.entries[0].chart_of_account.level3
        //                     : 0;

        //                 return total !== chartOfAccountTotal;
        //             }
        //         );

        //         return studentsWithTrueComparison;
        //     } else if (this.payType === "FULLPAID") {
        //         const filteredStudents = this.students.filter(
        //             (student) => student.entries.length > 0
        //         );

        //         const studentsWithTrueComparison = filteredStudents.filter(
        //             (student) => {
        //                 const total = student.entries.reduce((acc, entry) => {
        //                     return (
        //                         acc +
        //                         entry.level_1 +
        //                         entry.level_2 +
        //                         entry.level_3
        //                     );
        //                 }, 0);

        //                 const chartOfAccountTotal = student.entries[0]
        //                     ? student.entries[0].chart_of_account.level1 +
        //                       student.entries[0].chart_of_account.level2 +
        //                       student.entries[0].chart_of_account.level3
        //                     : 0;

        //                 return total === chartOfAccountTotal;
        //             }
        //         );

        //         return studentsWithTrueComparison;
        //     } else {
        //         return this.students.filter(
        //             (item) => item.class_type.class_level === this.classType
        //         );
        //     }
        // },

        filteredStudents() {
            return this.students.filter((student) => {
                const matchesSearch = this.headers.some((header) => {
                    const value = student[header.value];
                    return (
                        value &&
                        value
                            .toString()
                            .toLowerCase()
                            .includes(this.search.toLowerCase())
                    );
                });

                if (!matchesSearch) return false;

                if (!this.selectedDate) return true;

                const startDate = moment(this.selectedDate.start);
                const endDate = moment(this.selectedDate.end);
                const studentDate = moment(student.created_at);

                if (!studentDate.isBetween(startDate, endDate, "day", "[]"))
                    return false;

                if (this.payType === "ALL") {
                    return true;
                } else if (
                    this.payType === "PAID" &&
                    student.entries.length > 0
                ) {
                    return true;
                } else if (
                    this.payType === "UNPAID" &&
                    student.entries.length === 0
                ) {
                    return true;
                } else if (this.payType === "PARTIALPAID") {
                    const total = student.entries.reduce((acc, entry) => {
                        return (
                            acc + entry.level_1 + entry.level_2 + entry.level_3
                        );
                    }, 0);

                    const chartOfAccountTotal = student.entries[0]
                        ? student.entries[0].chart_of_account.level1 +
                          student.entries[0].chart_of_account.level2 +
                          student.entries[0].chart_of_account.level3
                        : 0;

                    return total !== chartOfAccountTotal;
                } else if (this.payType === "FULLPAID") {
                    const total = student.entries.reduce((acc, entry) => {
                        return (
                            acc + entry.level_1 + entry.level_2 + entry.level_3
                        );
                    }, 0);

                    const chartOfAccountTotal = student.entries[0]
                        ? student.entries[0].chart_of_account.level1 +
                          student.entries[0].chart_of_account.level2 +
                          student.entries[0].chart_of_account.level3
                        : 0;

                    return total === chartOfAccountTotal;
                } else {
                    return student.class_type.class_level === this.classType;
                }
            });
        },
        
        filteredStudentCount() {
            return this.filteredStudents.length;
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

        totalPrice(item) {
            return item.reduce((total, item) => {
                return total + item.tool.price * item.count;
            }, 0);
        },

        setEditStudent(id) {
            this.$store.dispatch("AcademicStudentModule/setStudentId", id);
            this.$store.dispatch("AcademicStudentModule/setEditStudent");
        },

        applyDateFilter() {
            this.menu = false;
        },

        resetData() {
            this.students = this.storeStudents;
        },

        filteredStudentsByDate() {
            const startDate = new Date(this.dates[0]);
            const endDate = new Date(this.dates[1]);

            if (!startDate || !endDate) {
                return this.students;
            }

            this.students = this.students.filter((student) => {
                const date =
                    student.entries.length > 0
                        ? new Date(
                              student.entries[
                                  student.entries.length - 1
                              ].updated_at
                          )
                        : null;
                return date >= startDate && date <= endDate;
            });

            // return this.students.filter((student) => {
            //     const date = new Date(student.created_at);
            //     return date >= startDate && date <= endDate;
            // });
        },

        setTab(tab) {
            this.$store.dispatch("ProcurementReportModule/setTab", tab);
        },

        getSellerProfile(seller) {
            this.sellerInfo = seller;
        },

        setActivePayment(payType) {
            this.payType = payType;
            this.$store.dispatch(
                "AcademicStudentModule/setActivePayment",
                payType
            );
        },

        getStudents() {
            axios.get("/accountant/getStudentPayments").then((response) => {
                this.students = response.data.data;
                this.storeStudents = response.data.data;
                this.showLoader = false;
                // console.log(this.students)
            });
        },

        getStudentClasses() {
            axios.get("/accountant/getStudentClasses").then((response) => {
                this.classes = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data);
            });
        },

        generatePDF() {
            const doc = new jsPDF();

            // Set PDF colors
            const pdfColor = "#d1d5db";
            const pdfTextColor = "#1f2937";

            // Define table headers and columns
            const headers = this.headers
                .filter((header) => header.value !== "edit")
                .map((header) => header.text);

            const columns = this.headers
                .filter((header) => header.value !== "edit")
                .map((header) => ({
                    value: header.value,
                    text: header.text,
                }));
            // console.log(this.filteredStudents);
            // Extract table data from filteredStudents computed property
            const data = this.filteredStudents.map((student, studentIndex) =>
                columns.map((column, columnIndex) => {
                    // If the current column value is an object, create a string representation of it
                    if (
                        typeof student[column.value] === "object" &&
                        student[column.value] !== null
                    ) {
                        if (
                            Array.isArray(student[column.value]) &&
                            column.text === "Level 1"
                        ) {
                            if (student[column.value].length > 0) {
                                return (
                                    "Expected: " +
                                    this.formattedPrice(
                                        student[column.value][0]
                                            .chart_of_account.level1
                                    ) +
                                    ", " +
                                    "Total Payment: " +
                                    this.formattedPrice(
                                        student[column.value].reduce(
                                            (total, entry) =>
                                                total + entry.level_1,
                                            0
                                        )
                                    ) +
                                    ", " +
                                    "Remained: " +
                                    this.formattedPrice(
                                        student[column.value][0]
                                            .chart_of_account.level1 -
                                            student[column.value].reduce(
                                                (total, entry) =>
                                                    total + entry.level_1,
                                                0
                                            )
                                    )
                                );
                            }

                            return "No Payment";
                        }
                        if (
                            Array.isArray(student[column.value]) &&
                            column.text === "Level 2"
                        ) {
                            if (student[column.value].length > 0) {
                                return (
                                    "Expected: " +
                                    this.formattedPrice(
                                        student[column.value][0]
                                            .chart_of_account.level2
                                    ) +
                                    ", " +
                                    "Total Payment: " +
                                    this.formattedPrice(
                                        student[column.value].reduce(
                                            (total, entry) =>
                                                total + entry.level_2,
                                            0
                                        )
                                    ) +
                                    ", " +
                                    "Remained: " +
                                    this.formattedPrice(
                                        student[column.value][0]
                                            .chart_of_account.level2 -
                                            student[column.value].reduce(
                                                (total, entry) =>
                                                    total + entry.level_2,
                                                0
                                            )
                                    )
                                );
                            }

                            return "No Payment";
                        }
                        if (
                            Array.isArray(student[column.value]) &&
                            column.text === "Level 3"
                        ) {
                            if (student[column.value].length > 0) {
                                return (
                                    "Expected: " +
                                    this.formattedPrice(
                                        student[column.value][0]
                                            .chart_of_account.level3
                                    ) +
                                    ", " +
                                    "Total Payment: " +
                                    this.formattedPrice(
                                        student[column.value].reduce(
                                            (total, entry) =>
                                                total + entry.level_3,
                                            0
                                        )
                                    ) +
                                    ", " +
                                    "Remained: " +
                                    this.formattedPrice(
                                        student[column.value][0]
                                            .chart_of_account.level3 -
                                            student[column.value].reduce(
                                                (total, entry) =>
                                                    total + entry.level_3,
                                                0
                                            )
                                    )
                                );
                            }

                            return "No Payment";
                        } else if (
                            Array.isArray(student[column.value]) &&
                            column.text === "Last Pay On"
                        ) {
                            return student[column.value] &&
                                student[column.value].length > 0
                                ? this.formattedDate(
                                      student[column.value][
                                          student[column.value].length - 1
                                      ].updated_at
                                  )
                                : "No Payment";
                        }
                    } else if (column.text === "First Name") {
                        return student[column.value];
                    } else if (column.text === "Middle Name") {
                        return student[column.value];
                    } else if (column.text === "Last Name") {
                        return student[column.value];
                    } else if (column.text === "Last Pay On") {
                        // console.log('testing' + student[column.value])
                        // return this.formattedDate(student[column]);
                    }
                    // else {
                    //     return student[column];
                    // }
                })
            );

            // Set table styles
            const tableStyles = {
                fillColor: pdfColor,
                textColor: pdfTextColor,
            };

            // Add header content
            const headerText = "REPORT: " + this.reportRange;
            const headerX = doc.internal.pageSize.getWidth() / 2;
            const headerY = 15;
            doc.setFontSize(13);
            doc.setTextColor(pdfTextColor);
            doc.text(headerText, headerX, headerY, { align: "center" });

            // Add table to the PDF
            doc.autoTable({
                head: [headers],
                body: data,
                styles: tableStyles,
                startY: 30, // Adjust the position of the table below the heading
            });

            // Add "Issued on" information
            const issuedOnText = "Issued on: " + new Date().toLocaleString();
            const issuedOnX = doc.internal.pageSize.getWidth() - 15;
            const issuedOnY = doc.internal.pageSize.getHeight() - 10;
            doc.setFontSize(8);
            doc.setTextColor(pdfTextColor);
            doc.text(issuedOnText, issuedOnX, issuedOnY, { align: "right" });

            // Save the PDF
            doc.save("REPORT: " + this.reportRange + ".pdf");
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
