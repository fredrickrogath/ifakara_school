<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <!-- <spinner v-if="showLoader"></spinner> -->

        <v-col sm="12" md="12">
            <div class="row pt-2">
                <div class="col-12">
                    <div class="h-screen">
                        <div class="mt-0 pt-0 mb-1">
                            <v-icon
                                class="ml-1 pr-0 mr-0"
                                size="22"
                                @click="setEditStudent()"
                            >
                                mdi-keyboard-backspace
                            </v-icon>

                            {{ getStudentId }}
                        </div>

                        <div
                            v-if="!permissionFromFinancialSecretary"
                            class="pt-2"
                        >
                            <div class="center">
                                <div class="d-flex justify-content-center">
                                    <form
                                        @submit.prevent="
                                            permissionToEditStudent
                                        "
                                    >
                                        <div class="">
                                            <h3 class="px-5 text-gray-500 py-2">
                                                Ask for permission to edit :
                                            </h3>

                                            <h5
                                                class="px-5 text-center text-gray-400 py-2"
                                            >
                                                {{ firstName }} {{ middleName }}
                                            </h5>

                                            <div>
                                                <div
                                                    class="d-flex justify-content-center align-content-center"
                                                >
                                                    <div>
                                                        <h4
                                                            v-if="
                                                                !permissionSeen &&
                                                                permissionReceived
                                                            "
                                                            class="d-flex justify-content-center text-green-500 button-list mb-1 mx-2 mb-sm-0 center"
                                                        >
                                                            Request Received
                                                        </h4>

                                                        <h4
                                                            v-if="
                                                                permissionSeen &&
                                                                permissionReceived
                                                            "
                                                            class="d-flex justify-content-center text-green-500 button-list mb-1 mx-4 mb-sm-0 center"
                                                        >
                                                            Request Received &
                                                            Reviewed
                                                        </h4>
                                                    </div>

                                                    <v-icon
                                                        v-if="
                                                            permissionReceived
                                                        "
                                                        size="22"
                                                        class="mt-1"
                                                        @click=""
                                                    >
                                                        mdi-close
                                                    </v-icon>
                                                </div>
                                            </div>

                                            <div
                                                v-if="
                                                    permissionReceived
                                                "
                                            >
                                                <div
                                                    class="d-flex justify-content-center align-content-center mt-4 ml-5"
                                                >
                                                    <v-icon
                                                        size="28"
                                                        class="mr-5"
                                                        @click="
                                                            setCommentView()
                                                        "
                                                    >
                                                        mdi-chat-processing
                                                    </v-icon>

                                                    <!-- <v-icon size="22" @click="">
                                                        mdi-close
                                                    </v-icon> -->
                                                </div>
                                            </div>

                                            <div
                                                v-if="
                                                    !permissionSeen &&
                                                    !permissionReceived
                                                "
                                                class="d-flex justify-content-center mt-2 button-list mb-1 mx-5 mb-sm-0 center"
                                            >
                                                <button
                                                    v-if="!showLoader"
                                                    class="btn btn-sm btn-white py-0 text-white"
                                                    type="submit"
                                                >
                                                    <i
                                                        class="mdi mdi-lock-open-variant text-green-500 font-28 align-middle me-2 pb-1"
                                                    ></i>
                                                </button>
                                                <button
                                                    v-else
                                                    class="btn btn-sm btn-white"
                                                    type="button"
                                                    disabled
                                                >
                                                    <span
                                                        class="spinner-border spinner-border-sm me-1"
                                                        role="status"
                                                        aria-hidden="true"
                                                    ></span>
                                                    Loading...
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div v-else class="">
                            <form @submit.prevent="editStudent">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label
                                                for="simpleinput"
                                                class="form-label"
                                                >First Name</label
                                            >
                                            <input
                                                type="text"
                                                id="simpleinput"
                                                class="form-control form-control-sm"
                                                v-model="firstName"
                                            />
                                        </div>

                                        <div class="mb-3">
                                            <label
                                                for="simpleinput"
                                                class="form-label"
                                                >Last Name</label
                                            >
                                            <input
                                                type="text"
                                                id="simpleinput"
                                                class="form-control form-control-sm"
                                                v-model="lastName"
                                            />
                                        </div>

                                        <div class="mb-3">
                                            <label
                                                for="gender"
                                                class="form-label"
                                                >Student Gender
                                            </label>
                                            <select
                                                class="form-select form-select-sm"
                                                id="gender"
                                                v-model="gender"
                                            >
                                                <option value="male">
                                                    Male
                                                </option>
                                                <option value="female">
                                                    Female
                                                </option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label
                                                for="simpleinput"
                                                class="form-label"
                                                >Parent Name</label
                                            >
                                            <input
                                                type="text"
                                                id="simpleinput"
                                                class="form-control form-control-sm"
                                                v-model="parent"
                                            />
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label
                                                for="simpleinput"
                                                class="form-label"
                                                >Middle Name</label
                                            >
                                            <input
                                                type="text"
                                                id="simpleinput"
                                                class="form-control form-control-sm"
                                                v-model="middleName"
                                            />
                                        </div>

                                        <div class="mb-3">
                                            <label
                                                for="simpleinput"
                                                class="form-label"
                                                >Location</label
                                            >
                                            <input
                                                type="text"
                                                id="simpleinput"
                                                class="form-control form-control-sm"
                                                v-model="location"
                                            />
                                        </div>

                                        <div class="mb-3">
                                            <label
                                                for="gender"
                                                class="form-label"
                                                >Select Class
                                            </label>
                                            <select
                                                class="form-select form-select-sm"
                                                v-model="classLevel"
                                                id="gender"
                                            >
                                                <option
                                                    v-for="classLevel in classOptions"
                                                    :key="classLevel.id"
                                                    :value="classLevel.id"
                                                >
                                                    {{ classLevel.class_level }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label
                                                for="simpleinput"
                                                class="form-label"
                                                >Parent Contact</label
                                            >
                                            <input
                                                type="text"
                                                id="simpleinput"
                                                class="form-control form-control-sm"
                                                v-model="contact"
                                            />
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div
                                                class="button-list mb-1 mb-sm-0"
                                            >
                                                <button
                                                    v-if="!showLoader"
                                                    class="btn btn-sm btn-primary text-white"
                                                    type="submit"
                                                >
                                                    Submit
                                                </button>
                                                <button
                                                    v-else
                                                    class="btn btn-sm btn-primary"
                                                    type="button"
                                                    disabled
                                                >
                                                    <span
                                                        class="spinner-border spinner-border-sm me-1"
                                                        role="status"
                                                        aria-hidden="true"
                                                    ></span>
                                                    Loading...
                                                </button>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end row-->
                            </form>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </v-col>
    </div>
    <!-- </v-row>

        
    </v-col> -->
</template>

<script>
import moment from "moment";
import Select2 from "v-select2-component";
import SnackBar from "../../.././Components/SnackBar.vue";

import Spinner from "../../../.././Pages/Components/SpinnerLoader.vue";

export default {
    components: {
        Spinner,
        Select2,
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
        this.showLoader = false;
        this.initialize();

        // Receiving broadicasting
        window.Echo.channel("student-permission." + this.$page.props.user.school_id).listen(
            "Academic\\Student\\PermissionEvent",
            (e) => {
                this.initialize();
            }
        );
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            showLoader: false,
            // search: "",
            // headers: [
            //     {
            //         text: "Name",
            //         value: "name",
            //     },
            //     { text: "Price", value: "price", align: "center" },
            //     { text: "Count", value: "count" },
            //     { text: "Action", value: "action" },
            // ],

            // tools: [],

            // idForAction: null,

            identifier: "",
            identifierOptions: [],

            // tool: "",
            // toolId: null,
            // toolOptions: [],

            // newTool: [],

            // supplierIsSet: false,
            // toolIsSet: false,
            // countIsSet: false,

            firstName: "",
            middleName: "",
            lastName: "",
            location: "",
            gender: "",
            classLevel: "",
            parent: "",
            contact: "",

            classLevel: "",
            classOptions: [],

            // totalPrice: 0,

            studentlId: null,
            schoolId: null,

            permissionFromFinancialSecretary: 0,

            permissionToEdit: null,
            permissionReceived: false,
            permissionSeen: false,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        getStudentId() {
            this.studentlId =
                this.$store.getters["HeadStudentModule/getStudentId"];
            // console.log(this.studentlId);
            return this.$store.getters["HeadStudentModule/getStudentId"];
        },
    },

    watch: {
        studentlId(newVal, oldVal) {
            if (newVal !== null) {
                this.getStudent();
                this.getclasses();
            }
            // console.log(
            //     `The message has changed from "${oldVal}" to "${newVal}"`
            // );
        },
    },

    methods: {
        async initialize() {
            this.getStudent();
            // this.checkPermissionToEditStudent();
            // this.getCommentsForStudentPermission();
        },

        // clearData() {
        //     this.tools = [];
        //     this.totalPrice = 0;
        // },

        setEditStudent() {
            // this.studentlId = null;
            this.$store.dispatch("HeadStudentModule/setStudentId", null);
            this.$store.dispatch("HeadStudentModule/setEditStudent");
        },

        setCommentView() {
            this.$store.dispatch("HeadStudentModule/setCommentView");
        },

        // getStudent() {
        //     axios.get("/academic/getStudent").then((response) => {
        //         // this.students = response.data.data;
        //         // this.showLoader = false;
        //         console.log(response.data.data)
        //     });
        // },

        async getclasses() {
            axios.get("/head/getStudentClasses").then((response) => {
                this.classOptions = response.data.data;
                // this.showLoader = false;
                // console.log(response.data.data);
            });
        },

        async getStudent() {
            this.showLoader = true;
            axios
                .post("/head/getStudent", {
                    studentId: this.getStudentId,
                    // name: this.name,
                    // email: this.email,
                    // lastName: this.lastName,
                    // password: this.formatName(this.name),
                    // identifier: this.identifier,
                })
                .then((response) => {
                    // this.clearData()
                    this.showLoader = false;

                    if (response.data.data != null) {
                        this.firstName = response.data.data.first_name;
                        this.middleName = response.data.data.middle_name;
                        this.lastName = response.data.data.last_name;
                        this.location = response.data.data.from;
                        this.gender = response.data.data.gender;
                        this.parent = response.data.data.parent;
                        this.contact = response.data.data.parent_contact;
                        this.classLevel = response.data.data.class_level_id;
                        this.permissionFromFinancialSecretary =
                            response.data.data.financial_secreatary_permission;
                        this.permissionReceived =
                            response.data.data.permission_received;
                        this.permissionSeen =
                            response.data.data.permission_seen;
                        this.schoolId = response.data.data.school_id;

                        // this.getCommentsForStudentPermission();
                        // console.log(this.permissionReceived);
                    }
                });
        },

        async editStudent() {
            this.showLoader = true;
            axios
                .post("/head/editStudent", {
                    studentId: this.getStudentId,
                    class_level_id: this.classLevel,
                    first_name: this.firstName,
                    middle_name: this.middleName,
                    last_name: this.lastName,
                    gender: this.gender,
                    from: this.location,
                    parent: this.parent,
                    parent_contact: this.contact,
                })
                .then((response) => {
                    // this.clearData()
                    this.showLoader = false;
                    this.setEditStudent();
                });
        },

        async permissionToEditStudent() {
            this.showLoader = true;
            axios
                .post("/academic/permissionToEditStudent", {
                    studentId: this.getStudentId,
                    schoolId: this.schoolId,
                    permission_received: this.permissionReceived,
                })
                .then((response) => {
                    this.initialize();
                    this.showLoader = false;
                    // this.setEditStudent();
                    // console.log(response.data.data);
                });
        },

        // async getCommentsForStudentPermission() {
        //     this.showLoader = true;
        //     axios
        //         .post("/academic/getCommentsForStudentPermission", {
        //             studentId: this.getStudentId,
        //             schoolId: this.schoolId,
        //         })
        //         .then((response) => {
        //             // this.initialize()
        //             this.showLoader = false;
        //             // this.setEditStudent();
        //             console.log(response.data.data);
        //         });
        // },

        async checkPermissionToEditStudent() {
            this.showLoader = true;
            axios
                .post("/academic/checkPermissionToEditStudent", {
                    studentId: this.getStudentId,
                })
                .then((response) => {
                    // this.clearData()
                    this.showLoader = false;
                    // this.setEditStudent();
                    this.permissionToEdit = response.data.data;
                    // console.log(response.data.data);
                });
        },

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

        // mySelectEvent(e, action) {
        //     if (action == "tool") {
        //         this.id = e.id;
        //         this.name = e.text;
        //         this.price = e.price;
        //         this.toolIsSet = true;
        //     } else if (action == "count") {
        //         this.countIsSet = true;
        //     } else if (action == "supplier") {
        //         this.supplier = e.text;
        //         this.supplierId = e.id;
        //         this.supplierIsSet = true;
        //     }

        //     if (this.toolIsSet && this.countIsSet) {
        //         this.buildInvoiceTools();
        //     }
        // },

        // myChangeEvent(e) {
        //     console.log(e);
        // },

        // async buildInvoiceTools() {
        //     this.totalPrice = this.totalPrice + this.price * this.count;

        //     const newTool = {
        //         id: this.id,
        //         name: this.name,
        //         price: this.price * this.count,
        //         count: this.count,
        //     };

        //     this.tools.push(newTool);

        //     this.toolIsSet = false;
        //     this.countIsSet = false;

        //     this.tool = "";
        //     this.count = "";
        // },
        // formatName(name) {
        //     const capitalized = name
        //         .split(" ")
        //         .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
        //         .join(" ");

        //     const cropped = capitalized.split(" ")[0];

        //     const allCapsCropped = cropped.toUpperCase();

        //     return allCapsCropped;
        // },

        // setAddStaff() {
        //     this.$store.dispatch("SecretarySchoolDetailModule/setAddStaff");
        // },

        // async addStaff() {
        //     this.showLoader = true;
        //     axios
        //         .post("http://127.0.0.1:8000/api/secretary/addStaff", {
        //             schoolId: this.getSchoolId,
        //             name: this.name,
        //             email: this.email,
        //             lastName: this.lastName,
        //             password: this.formatName(this.name),
        //             identifier: this.identifier,
        //         })
        //         .then((response) => {
        //             // this.clearData()
        //             this.showLoader = false;
        //             this.setAddStaff();
        //             this.name = "";
        //             this.email = "";
        //             this.password = "";
        //             console.log(response.data.data);
        //         });
        // },

        // async getDepartments() {
        //     // this.showLoader = true;
        //     axios
        //         .post("http://127.0.0.1:8000/api/secretary/getDepartments", {
        //             schoolId: this.getSchoolId,
        //         })
        //         .then((response) => {
        //             // this.clearData()
        //             this.identifierOptions = response.data.data;
        //             // this.showLoader = false;
        //             // console.log(response.data.data);
        //         });
        // },
        // identifier
        // async getDepartments() {
        //     axios
        //         .get("http://127.0.0.1:8000/api/secretary/getDepartments")
        //         .then((response) => {
        //             this.identifierOptions = response.data.data;
        //             // this.showLoader = false;
        //             console.log(response.data.data);
        //         });
        // },

        // async getSellers() {
        //     axios.get("/procurement/getSellers").then((response) => {
        //         this.supplierOptions = response.data.data;
        //         // console.log(response.data.data);
        //     });
        // },

        // async updateTools(id, column, data) {
        //     axios
        //         .post("/procurement/updateTools", {
        //             id: id,
        //             data: data,
        //             column: column,
        //         })
        //         .then((response) => {
        //             // console.log(response.data.data);
        //         });
        // },

        // async starredTools(id, data, column) {
        //     axios
        //         .post("/procurement/starredTools", {
        //             id: id,
        //             data: data,
        //             column: column,
        //         })
        //         .then((response) => {
        //             // console.log(response.data.data);
        //         });
        // },

        // async deleteTools() {
        //     axios
        //         .post("/procurement/deleteTools", {
        //             id: this.idForAction,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             // console.log(response.data.data);
        //         });
        //     // handle response here
        // },

        setSnackBarState() {
            this.$store.dispatch("HeadDepartmentModule/setSnackBarState");
        },

        // save(id, column, data) {
        //     this.updateTools(id, data, column);
        //     // console.log(id + " , " +data);
        // },
        // cancel() {},
        // open() {},
        // close() {},
    },

    // watch: {
    //     someObject: {
    //         name(newValue, oldValue) {},
    //         deep: true,
    //     },
    // },
};
</script>
