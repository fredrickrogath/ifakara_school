<template>
    <div>new</div>
</template>
<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12">
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
                <div class="pl-2 pt-1 text-sm uppercase">Students</div>
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
                        {{ getActiveClass }}
                    </span>
                    <span>STUDENTS</span>
                </div>
                <div class="d-flex justify-content-end">
                    <span
                        class="cursor-pointer uppercase ml-3"
                        :class="
                            getActiveClass == 'ALL'
                                ? 'text-warning'
                                : 'underline'
                        "
                        @click="setActiveClass('ALL')"
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
                                getActiveClass == classs.class_level
                                    ? 'text-warning'
                                    : 'underline'
                            "
                            @click="setActiveClass(classs.class_level)"
                            >{{ classs.class_level }}</span
                        >
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
                                    class="text-gray-600"
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
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'class_type'"
                                    >{{ item[header.value].class_level }}</span
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
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
import moment from "moment";
import Spinner from "../../.././Components/SpinnerLoader.vue";
import SnackBar from "../../.././Components/SnackBar.vue";
export default {
    components: {
        Spinner,
        SnackBar,
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

        window.Echo.channel(
            "student-event." + this.$page.props.user.school_id
        ).listen("Academic\\StudentEvent", (e) => {
            this.getStudents();
        });

        // Receiving broadicasting
        //  window.Echo.channel("student-trigger-from-financial-secretary").listen(
        //     "ApiSecretaryStudentEvent",
        //     (e) => {
        //         console.log('student-trigger-from-financial-secretary');
        //         // this.getTools();
        //     }
        // );
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
                    text: "Gender",
                    value: "gender",
                },
                { text: "Location", value: "from" },
                // { text: "Parent", value: "parent" },
                { text: "Contact", value: "parent_contact" },
                { text: "Edit", value: "edit" },
            ],
            students: [],

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

        // getStudentId() {
        //     return this.$store.getters["AcademicStudentModule/getStudentId"];
        // },

        getActiveClass() {
            this.classType =
                this.$store.getters["AcademicStudentModule/getActiveClass"];
            return this.$store.getters["AcademicStudentModule/getActiveClass"];
        },

        filteredStudents() {
            if (this.classType === "ALL") {
                return this.students; // Display all rows
            } else {
                return this.students.filter(
                    (item) => item.class_type.class_level === this.classType
                );
            }
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
            return moment(date).format("MMMM Do YYYY");
            // return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        setEditStudent(id) {
            this.$store.dispatch("AcademicStudentModule/setStudentId", id);
            this.$store.dispatch("AcademicStudentModule/setEditStudent");
        },

        // totalPrice(item) {
        //     return item.reduce((total, item) => {
        //         return total + item.tool.price * item.count;
        //     }, 0);
        // },

        setActiveClass(setActiveClass) {
            this.classType = setActiveClass;
            this.$store.dispatch(
                "AcademicStudentModule/setActiveClass",
                setActiveClass
            );
        },

        getStudents() {
            axios.get("/academic/getStudentsNew").then((response) => {
                this.students = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data)
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
