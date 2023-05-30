<!-- <template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <!-- <spinner v-if="showLoader"></spinner> -->

        <v-col sm="12" md="12">
            <div class="row">
                <div class="col-12">
                    <div class="card h-screen">
                        <div class="card-body">
                            <form @submit.prevent="addStaff">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label
                                                for="simpleinput"
                                                class="form-label"
                                                >Name</label
                                            >
                                            <input
                                                type="text"
                                                id="simpleinput"
                                                class="form-control"
                                                v-model="name"
                                            />
                                        </div>

                                        <!-- <div class="mb-3">
                                            <label
                                                for="simpleinput"
                                                class="form-label"
                                                >Password</label
                                            >
                                            <input
                                                type="text"
                                                id="simpleinput"
                                                class="form-control"
                                                v-model="password"
                                            />
                                        </div> -->
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label
                                                for="simpleinput"
                                                class="form-label"
                                                >Email</label
                                            >
                                            <input
                                                type="email"
                                                id="simpleinput"
                                                class="form-control"
                                                v-model="email"
                                            />
                                        </div>

                                        <div class="mb-3">
                                            <label
                                                for="gender"
                                                class="form-label"
                                                >Select Class
                                            </label>
                                            <select
                                                class="form-select"
                                                v-model="identifier"
                                                id="gender"
                                            >
                                                <option
                                                    v-for="identifier in identifierOptions"
                                                    :key="identifier.id"
                                                    :value="
                                                        identifier.identifier
                                                    "
                                                >
                                                    {{ identifier.department }}
                                                </option>
                                            </select>
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
                                                    class="btn btn-primary text-white"
                                                    type="submit"
                                                >
                                                    Submit
                                                </button>
                                                <button
                                                    v-else
                                                    class="btn btn-primary"
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
// import SnackBar from "../../.././Components/SnackBar.vue";

import Spinner from "../../.././Components/SpinnerLoader.vue";

export default {
    components: {
        Spinner,
        Select2,
        // SnackBar,
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
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                // this.getTools();
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

            name: "",
            email: "",
            password: "",
            identifier: "",

            // totalPrice: 0,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },
    },

    methods: {
        async initialize() {
            this.getDepartments();
            // this.getSellers();
        },

        clearData() {
            this.tools = [];
            this.totalPrice = 0;
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
        formatName(name) {
            const capitalized = name
                .split(" ")
                .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
                .join(" ");

            const cropped = capitalized.split(" ")[0];

            const allCapsCropped = cropped.toUpperCase();

            return allCapsCropped;
        },

        setAddStudent() {
            this.$store.dispatch("HeadDepartmentModule/setAddStudent");
        },

        async addStaff() {
            this.showLoader = true;
            axios
                .post("/head/addStaff", {
                    name: this.name,
                    email: this.email,
                    lastName: this.lastName,
                    password: this.formatName(this.name),
                    identifier: this.identifier,
                })
                .then((response) => {
                    // this.clearData()
                    this.showLoader = false;
                    this.setAddStudent();
                    this.name = "";
                    this.email = "";
                    this.password = "";
                    console.log(response.data.data);
                });
        },
        // identifier
        async getDepartments() {
            axios.get("/head/getDepartments").then((response) => {
                this.identifierOptions = response.data.data;
                // this.showLoader = false;
                // console.log(response.data.data);
            });
        },

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

    watch: {
    someObject: {
      name(newValue, oldValue) {
      },
      deep: true
    }
  }
};
</script> -->
