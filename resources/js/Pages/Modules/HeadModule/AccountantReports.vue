<template>
    <div class="card p-0 h-screen" data-app>
        <!-- <spinner v-if="showLoader"></spinner> -->

        <!-- <v-col v-else sm="12" md="12" class="p-0"> -->
            <!-- <v-card flat :dark="isDark"> -->
            <!-- <v-card elevation="0" data-app> -->

            <!-- Warning Alert Modal -->
            <div
                id="warning-alert-modal"
                class="modal fade"
                tabindex="-1"
                role="dialog"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body p-2">
                            <div class="text-center">
                                <i
                                    class="dripicons-warning h1 text-warning"
                                ></i>
                                <h4 class="mt-2 text-gray-500">
                                    Are you sure you want to delete this data ?
                                </h4>
                                <p class="mt-3">
                                    Do not worry, deleting this can be restored
                                    in your trash within 30 days.
                                </p>
                                <div class="flex justify-around">
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-warning my-1 text-white"
                                        data-bs-dismiss="modal"
                                        @click="deleteInvoice()"
                                    >
                                        Continue
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-danger my-1 text-white"
                                        data-bs-dismiss="modal"
                                    >
                                        cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div>
                <div class="mail-list">
                    <div class="flex justify-end">
                        <a
                            href="#"
                            class="list-group-item font-semibold border-0"
                            @click="setTab('invoices')"
                            :class="[
                                getCurrentTab == 'invoices'
                                    ? 'text-warning'
                                    : '',
                            ]"
                            ><i
                                class="mdi mdi-form-select font-18 align-middle me-1 pb-1"
                            ></i
                            >Invoices
                        </a>
                        <a
                            href="#"
                            class="list-group-item font-semibold border-0 pb-1"
                            @click="setTab('studentPayment')"
                            :class="[
                                getCurrentTab == 'studentPayment' ? 'text-warning' : '',
                            ]"
                            ><i
                                class="mdi mdi-cash-multiple font-18 align-middle me-1 pb-2"
                            ></i
                            >Student Payments</a
                        >
                    </div>
                    <hr class="bg-gray-200 mb-1 mt-1 mx-2" />
                </div>
            </div>

            <div v-show="getCurrentTab == 'invoices'">
                <invoice-report></invoice-report>
            </div>

            <div v-show="getCurrentTab == 'studentPayment'">
                <student-payment-report></student-payment-report>
            </div>
        <!-- </v-col> -->
    </div>
</template>

<script>
// import moment from "moment";
// import jsPDF from "jspdf";
// import Spinner from "../.././Components/SpinnerLoader.vue";
// import SnackBar from "../.././Components/SnackBar.vue";
// import SellerProfile from "../../Components/SellerProfile.vue";
import InvoiceReport from "./Reports/InvoiceReport.vue";
import StudentPaymentReport from "./Reports/StudentPaymentReport.vue";
export default {
    components: {
        // Spinner,
        // SnackBar,
        // SellerProfile,
        InvoiceReport,
        StudentPaymentReport,
    },

    mounted() {
        this.showLoader = true;
        // this.getStudents();
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            // showLoader: true,
            // search: "",
            // headers: [
            //     {
            //         text: "Suppliers",
            //         value: "sellers",
            //     },
            //     {
            //         text: "Tools",
            //         value: "tools",
            //     },
            //     {
            //         text: "Total",
            //         value: "tool_sum",
            //     },
            //     { text: "Date", value: "created_at" },
            //     // { text: "Edit", value: "edit" },
            // ],
            // students: [],
            // storeStudents: [],

            // idForAction: null,

            // dates: [null, null],
            // reportRange: "By search ,No Date Seleted",
            // datePickerMenu: false,
            // dateRangeText: "",
            // sellerInfo: [],
        };
    },

    watch: {},

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        getCurrentTab() {
            return this.$store.getters["AccountantReportModule/getTab"];
        },

        // formattedDateRange() {
        //     const startDate = this.dates[0];
        //     const endDate = this.dates[1];

        //     if (startDate && endDate) {
        //         const formattedStartDate =
        //             moment(startDate).format("MMM D, YYYY");
        //         const formattedEndDate = moment(endDate).format("MMM D, YYYY");
        //         this.reportRange = `${formattedStartDate} - ${formattedEndDate}`;
        //         // return `${formattedStartDate} - ${formattedEndDate}`;
        //     }

        //     // return "No Date Selected";
        // },

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
    },

    methods: {
        // async setIdForAction(id) {
        //     this.idForAction = id;
        // },

        // formattedPrice(amount) {
        //     return amount.toLocaleString("sw-TZ", {
        //         style: "currency",
        //         currency: "Tsh",
        //     });
        // },

        // formattedDate(date) {
        //     // return moment(date).format("MMMM Do YYYY");
        //     return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        // },

        // totalPrice(item) {
        //     return item.reduce((total, item) => {
        //         return total + item.tool.price * item.count;
        //     }, 0);
        // },

        // totalPriceReport(item, count) {
        //     return item.reduce((total, item) => {
        //         console.log(total + " " + item.price + " " + count);
        //         return total + item.price * count;
        //     }, 0);
        // },

        // setEditStudent(id) {
        //     this.$store.dispatch("AcademicStudentModule/setStudentId", id);
        //     this.$store.dispatch("AcademicStudentModule/setEditStudent");
        // },

        // applyDateFilter() {
        //     this.menu = false;
        // },
        
        // resetData() {
        //     this.students = this.storeStudents;
        // },

        // filteredStudentsByDate() {
        //     const startDate = new Date(this.dates[0]);
        //     const endDate = new Date(this.dates[1]);

        //     if (!startDate || !endDate) {
        //         return this.students;
        //     }

        //     this.students = this.students.filter((student) => {
        //         const date = new Date(student.created_at);
        //         return date >= startDate && date <= endDate;
        //     });
        // },

        setTab(tab) {
            this.$store.dispatch("AccountantReportModule/setTab", tab);
        },

        // getStudents() {
        //     axios.get("/accountant/getInvoices").then((response) => {
        //         this.students = response.data.data;
        //         this.storeStudents = response.data.data;
        //         this.showLoader = false;
        //     });
        // },

        // generatePDF() {
        //     const doc = new jsPDF();

        //     // Set PDF colors
        //     const pdfColor = "#d1d5db";
        //     const pdfTextColor = "#1f2937";

        //     // Define table headers and columns
        //     const headers = this.headers
        //         .filter((header) => header.value !== "edit")
        //         .map((header) => header.text);
        //     const columns = this.headers
        //         .filter((header) => header.value !== "edit")
        //         .map((header) => header.value);
        //     // console.log(this.filteredStudents);
        //     // Extract table data from filteredStudents computed property
        //     const data = this.filteredStudents.map((student, studentIndex) =>
        //         columns.map((column, columnIndex) => {
        //             // If the current column value is an object, create a string representation of it
        //             if (
        //                 typeof student[column] === "object" &&
        //                 student[column] !== null
        //             ) {
        //                 if (
        //                     Array.isArray(student[column]) &&
        //                     column === "sellers"
        //                 ) {
        //                     // If the column data is an array of objects (e.g., multiple sellers),
        //                     // map the array to extract the desired property (e.g., name) and join them into a string
        //                     return student[column]
        //                         .map((item) => item.name)
        //                         .join(", ");
        //                 } else if (
        //                     Array.isArray(student[column]) &&
        //                     column === "tools"
        //                 ) {
        //                     // If the column data is an array of objects (e.g., multiple sellers),
        //                     // map the array to extract the desired property (e.g., name) and join them into a string
        //                     return student[column]
        //                         .map((item) => item.name)
        //                         .join(", ");
        //                 } else if (
        //                     Array.isArray(student[column]) &&
        //                     column === "tool_sum"
        //                 ) {
        //                     return this.formattedPrice(student['total'])
        //                 }
        //             }
        //             //  else if (column === "tool_sum") {
        //             //     return this.formattedPrice(
        //             //         this.totalPrice(student[column])
        //             //     );
        //             //     return this.formattedDate(student[column]);
        //             // }
        //             else if (
        //                 column === "created_at" ||
        //                 column === "updated_at"
        //             ) {
        //                 return this.formattedDate(student[column]);
        //             }
        //             // else {
        //             //     return student[column];
        //             // }
        //         })
        //     );

        //     // Set table styles
        //     const tableStyles = {
        //         fillColor: pdfColor,
        //         textColor: pdfTextColor,
        //     };

        //     // Add header content
        //     const headerText = "REPORT: " + this.reportRange;
        //     const headerX = doc.internal.pageSize.getWidth() / 2;
        //     const headerY = 15;
        //     doc.setFontSize(13);
        //     doc.setTextColor(pdfTextColor);
        //     doc.text(headerText, headerX, headerY, { align: "center" });

        //     // Add table to the PDF
        //     doc.autoTable({
        //         head: [headers],
        //         body: data,
        //         styles: tableStyles,
        //         startY: 30, // Adjust the position of the table below the heading
        //     });

        //     // Add "Issued on" information
        //     const issuedOnText = "Issued on: " + new Date().toLocaleString();
        //     const issuedOnX = doc.internal.pageSize.getWidth() - 15;
        //     const issuedOnY = doc.internal.pageSize.getHeight() - 10;
        //     doc.setFontSize(10);
        //     doc.setTextColor(pdfTextColor);
        //     doc.text(issuedOnText, issuedOnX, issuedOnY, { align: "right" });

        //     // Save the PDF
        //     doc.save("REPORT: " + this.reportRange + ".pdf");
        // },

        //gap

        // generatePDF() {
        //     const doc = new jsPDF();

        //     // Set PDF colors
        //     const pdfColor = "#d1d5db";
        //     const pdfTextColor = "#1f2937";

        //     // Define table headers and columns
        //     const headers = this.headers
        //         .filter((header) => header.value !== "edit")
        //         .map((header) => header.text);
        //     const columns = this.headers
        //         .filter((header) => header.value !== "edit")
        //         .map((header) => header.value);

        //     // Extract table data from filteredStudents computed property
        //     const data = this.filteredStudents.map((student) =>
        //         columns.map((column) => {
        //             if (column === "created_at" || column === "updated_at") {
        //                 return this.formattedDate(student[column]);
        //             } else {
        //                 return student[column];
        //             }
        //         })
        //     );

        //     // Set table styles
        //     const tableStyles = {
        //         fillColor: pdfColor,
        //         textColor: pdfTextColor,
        //     };

        //     // Add header content
        //     const headerText = "REPORT: " + this.reportRange;
        //     const headerX = doc.internal.pageSize.getWidth() / 2;
        //     const headerY = 15;
        //     doc.setFontSize(13);
        //     doc.setTextColor(pdfTextColor);
        //     doc.text(headerText, headerX, headerY, { align: "center" });

        //     // Add table to the PDF
        //     doc.autoTable({
        //         head: [headers],
        //         body: data,
        //         styles: tableStyles,
        //         startY: 30, // Adjust the position of the table below the heading
        //     });

        //     // Add "Issued on" information
        //     const issuedOnText = "Issued on: " + new Date().toLocaleString();
        //     const issuedOnX = doc.internal.pageSize.getWidth() - 15;
        //     const issuedOnY = doc.internal.pageSize.getHeight() - 10;
        //     doc.setFontSize(10);
        //     doc.setTextColor(pdfTextColor);
        //     doc.text(issuedOnText, issuedOnX, issuedOnY, { align: "right" });

        //     // Save the PDF
        //     doc.save("REPORT: " + this.reportRange + ".pdf");
        // },

        // save(id, column, data) {
        //     this.updateTools(id, data, column);
        //     // console.log(id + " , " +data);
        // },
        // cancel() {},
        // open() {},
        // close() {},
    },
};
</script>
