<template>
    <div>
        <!-- <spinner v-if="showLoader"></spinner> -->

        <div class="h-screen bg-white" style="overflow-y: auto">
            <div class="d-flex justify-content-between bg-warning">
                <a @click="setInvoiceView()" class="btn text-lg-700">
                    <strong class="text-white" style="font-size: large"
                        ><i class="fe-arrow-left"></i>
                    </strong>
                </a>
            </div>

            <payment></payment>
        </div>
    </div>
</template>

<script>
// import moment from "moment";
// import Spinner from "../../../Components/SpinnerLoader.vue";
// import SnackBar from "../../../Components/SnackBar.vue";
import Payment from "../../../Components/Payment/Payment.vue";
export default {
    components: {
        // Spinner,
        // SnackBar,
        Payment,
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
        // this.getStudents();

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

        // window.Echo.channel("EventTriggered").listen(
        //     "NewPostPublished",
        //     (e) => {
        //         // console.log(e);
        //     }
        // );
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            showLoader: true,
            // search: "",
            // headers: [
            //     {
            //         text: "First Name",
            //         align: "start",
            //         sortable: false,
            //         value: "first_name",
            //     },
            //     {
            //         text: "Middle Name",
            //         value: "middle_name",
            //     },
            //     {
            //         text: "Last Name",
            //         value: "last_name",
            //     },
            //     {
            //         text: "Level 1",
            //         value: "entries",
            //     },

            //     {
            //         text: "Level 2",
            //         value: "entries",
            //     },

            //     {
            //         text: "Level 3",
            //         value: "entries",
            //     },
            //     { text: "Last Pay On", value: "entries" },
            //     { text: "Details", value: "view" },
            //     // { text: "Parent", value: "parent" },
            //     // { text: "Contact", value: "parent_contact" },
            //     // { text: "Edit", value: "edit" },
            // ],
            // students: [],

            // idForAction: null,
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

        getPaymentView() {
            return this.$store.getters[
                "AccountantInvoiceModule/getPaymentView"
            ];
        },
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

        // setEditStudent(id) {
        //     this.$store.dispatch("AcademicStudentModule/setStudentId", id);
        //     this.$store.dispatch("AcademicStudentModule/setEditStudent");
        // },

        // studentDetails(id) {
        //     this.setInvoiceView(id);
        // },

        setInvoiceView() {
            this.$store.dispatch("AccountantInvoiceModule/setPaymentView", null);
        },

        // getStudents() {
        //     axios.get("/accountant/getStudentPayments").then((response) => {
        //         this.students = response.data.data;
        //         this.showLoader = false;
        //         // console.log(response.data.data);
        //     });
        // },

        // save(id, column, data) {
        //      this.updateTools(id, data, column);
        //     // console.log(id + " , " +data);
        // },
        // cancel() {},
        // open() {},
        // close() {},
    },
};
</script>
