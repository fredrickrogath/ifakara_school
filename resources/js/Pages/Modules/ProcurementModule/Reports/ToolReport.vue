<template>
    <div>
        <v-card-title class="px-1 py-0 my-0">
                <span class="pl-1">TOOL REPORT</span> {{ formattedDateRange }}
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
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search"
                    single-line
                    hide-details
                    class="pr-5 py-0 my-0"
                ></v-text-field>
                <!-- <v-spacer></v-spacer> -->
                <v-icon size="22" @click="resetData"> mdi-restore </v-icon>
            </v-card-title>
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
                                <div
                                    v-if="
                                        header.value == 'action' ||
                                        header.value == 'starred'
                                    "
                                >
                                    <v-icon
                                        v-if="header.value == 'action'"
                                        size="22"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#warning-alert-modal"
                                        @click="
                                            setIdForAction(items[idx]['id'])
                                        "
                                    >
                                        mdi-delete
                                    </v-icon>

                                    <v-icon
                                        v-if="header.value == 'starred'"
                                        size="22"
                                        :class="
                                            item[header.value]
                                                ? 'text-warning'
                                                : ''
                                        "
                                        @click="
                                            starredTools(
                                                items[idx]['id'],
                                                item[header.value],
                                                header.value
                                            )
                                        "
                                    >
                                        mdi-star
                                    </v-icon>
                                </div>

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
                                    v-else-if="header.value == 'id'"
                                >
                                    {{ encrypt() }}
                                    <!-- {{ item[header.value] }} -->
                                </span>

                                <v-edit-dialog
                                    v-else
                                    :return-value.sync="item[header.value]"
                                    @save="
                                        save(
                                            items[idx]['id'],
                                            item[header.value],
                                            header.value
                                        )
                                    "
                                    @cancel="cancel"
                                    @open="open"
                                    @close="close"
                                    large
                                >
                                    <span
                                        class="text-gray-600 italic font-semibold"
                                        :class="
                                            item[header.value] == null &&
                                            header.value !== 'action' // header.value == 'level1'
                                                ? 'bg-gray-100 italic rounded px-1'
                                                : ''
                                        "
                                        >{{
                                            item[header.value] !== null
                                                ? header.value == "price"
                                                    ? formattedPrice(
                                                          item[header.value]
                                                      )
                                                    : item[header.value]
                                                : "Empty"
                                        }}</span
                                    >

                                    <template v-slot:input>
                                        <v-text-field
                                            v-model="item[header.value]"
                                            label="Edit"
                                            single-line
                                        ></v-text-field>
                                    </template>
                                </v-edit-dialog>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-data-table>

            <v-btn class="w-full" @click="generatePDF">Generate REPORT {{ reportRange }}</v-btn>
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
            headers: [
            {
                    text: "Name",
                    value: "name",
                },
                { text: "Price", value: "price", align: "center" },
                { text: "Count", value: "count" },
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
                const date = new Date(student.created_at);
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
            this.sellerInfo = seller
        },

        getStudents() {
            axios.get("/procurement/get_tools").then((response) => {
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
            // console.log(this.filteredStudents);
            // Extract table data from filteredStudents computed property
            const data = this.filteredStudents.map((student, studentIndex) =>
                columns.map((column, columnIndex) => {
                    // If the current column value is an object, create a string representation of it
                    
                    
                    if (column === "name") {
                        return student[column]
                    }
                    else if (column === "price") {
                        return this.formattedPrice(student[column])
                    }
                    else if (column === "count") {
                        return student[column]
                    }
                    else if (
                        column === "created_at" ||
                        column === "updated_at"
                    ) {
                        return this.formattedDate(student[column]);
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