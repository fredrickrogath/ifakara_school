<template>
    <!-- <v-col>
        <v-row> -->
    <div class="card p-0" data-app>
        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12" class="p-0">
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

            <v-card-title class="px-0 pt-0 pb-1">

            <div class="pl-2 pt-1 text-sm uppercase">STUDENT REPORT <span class="d-none">{{ formattedDateRange }}</span></div>

                
                <v-spacer></v-spacer>

                <snack-bar
                    class="absolute right-0 top-14"
                    message="Printed successfully"
                ></snack-bar>

                <v-row class="px-2 pt-1">
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

            <v-data-table
                :headers="headers"
                :items="students"
                item-key="name"
                :search="search"
                class="elevation-1"
                :items-per-page="11"
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <v-icon
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
                                </v-icon>

                                <v-icon
                                    v-if="header.value == 'starred'"
                                    size="22"
                                    :class="
                                        item[header.value] ? 'text-warning' : ''
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
                                </v-icon>

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'id'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'created_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'updated_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'first_name'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'middle_name'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'last_name'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'gender'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'from'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'parent'"
                                >
                                    {{ item[header.value] }}
                                </span>

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'parent_contact'"
                                >
                                    {{ item[header.value] }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-data-table>
        </v-col>

        <v-btn @click="generatePDF">Generate REPORT {{ reportRange }}</v-btn>
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
import moment from "moment";
import jsPDF from "jspdf";
import Spinner from "../.././Components/SpinnerLoader.vue";
import SnackBar from "../.././Components/SnackBar.vue";
export default {
    components: {
        Spinner,
        SnackBar,
    },

    mounted() {
        this.showLoader = true;
        this.getStudents();

        window.Echo.channel(
            "student-event." + this.$page.props.user.school_id
        ).listen("Academic\\StudentEvent", (e) => {
            this.getStudents();
        });
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
                    text: "Gender",
                    value: "gender",
                },
                { text: "Location", value: "from" },
                { text: "Contact", value: "parent_contact" },
                { text: "Date", value: "created_at" },
                // { text: "Edit", value: "edit" },
            ],
            students: [],
            storeStudents: [],

            idForAction: null,

            dates: [null, null],
            reportRange: "By search ,No Date Seleted",
            datePickerMenu: false,
            dateRangeText: "",
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

                return studentDate.isBetween(startDate, endDate, "day", "[]");
            });
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
                const date = new Date(student.created_at);
                return date >= startDate && date <= endDate;
            });

            // return this.students.filter((student) => {
            //     const date = new Date(student.created_at);
            //     return date >= startDate && date <= endDate;
            // });
        },

        getStudents() {
            axios.get("/head/getStudentsNew").then((response) => {
                this.students = response.data.data;
                this.storeStudents = response.data.data;
                this.showLoader = false;
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
                .map((header) => header.value);

            // Extract table data from filteredStudents computed property
            const data = this.filteredStudents.map((student) =>
                columns.map((column) => {
                    if (column === "created_at" || column === "updated_at") {
                        return this.formattedDate(student[column]);
                    } else {
                        return student[column];
                    }
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
            doc.setFontSize(10);
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
