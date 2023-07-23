<template>
    <div data-app>
        <!-- End of Right modal content -->

        <div class="row">
            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="h-screen card bg-white">
                    <div class="pt-1">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar bg-white">
                            <div class="btn-group dropend d-block mb-2 mx-2">
                                <button
                                    type="button"
                                    class="bg-gray-200 py-1 w-100 waves-effect waves-light dropdown-toggle font-semibold"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    Select Entry Type
                                </button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                        <v-icon size="18" class="me-1"
                                            >mdi-cart</v-icon
                                        >
                                        Sales</a
                                    >
                                    <a
                                        class="dropdown-item font-semibold"
                                        href="#"
                                        @click="
                                            getSpecificLegerEntries('Income');
                                            setLegerEntry(
                                                'Income Entry Selected'
                                            );
                                        "
                                        ><v-icon size="16" class="me-1"
                                            >mdi-cash-multiple</v-icon
                                        >
                                        Income</a
                                    >

                                    <a
                                        class="dropdown-item font-semibold"
                                        href="#"
                                        @click="
                                            getSpecificLegerEntries('Expense');
                                            setLegerEntry(
                                                'Expense Entry Selected'
                                            );
                                        "
                                        ><v-icon size="16" class="me-1"
                                            >mdi-cash-multiple</v-icon
                                        >
                                        Expense</a
                                    >

                                    <a
                                        class="dropdown-item font-semibold"
                                        href="#"
                                        @click="
                                            (dialog = true),
                                                (dialogForm = 'Loans')
                                        "
                                    >
                                        <v-icon size="18" class="me-1"
                                            >mdi-scale-balance</v-icon
                                        >
                                        Loans</a
                                    >
                                </div>
                            </div>

                            <div class="btn-group d-block mb-0 mx-2">
                                <button
                                    type="button"
                                    class="bg-gray-200 py-1 w-100 waves-effect waves-light dropdown-toggle font-semibold"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    {{ setLegerEntryListener }}
                                </button>

                                <div class="dropdown-menu font-semibold">
                                    <a
                                        v-for="item in legerEntriesListener"
                                        :key="item.id"
                                        class="dropdown-item font-semibold"
                                        href="#"
                                        @click="setChartOfAcountForm(item)"
                                        ><i class="mdi mdi-cart me-1"></i>
                                        {{ item.name }}</a
                                    >
                                    <a
                                        v-if="legerEntriesListener == null"
                                        class="dropdown-item font-semibold"
                                        href="#"
                                    >
                                        Please Select Entry</a
                                    >
                                    <!-- <a
                                        class="dropdown-item"
                                        href="#"
                                        @click="
                                            (dialog = true),
                                                (dialogForm = 'Loans')
                                        "
                                    >
                                        <v-icon size="14" class="me-1"
                                            >mdi-scale-balance</v-icon
                                        >
                                        Loans</a
                                    > -->
                                </div>
                                <button
                                    type="button"
                                    class="bg-gray-200 py-1 mt-2 w-100 waves-effect waves-light dropdown-toggle font-semibold"
                                    @click="setInvoice"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    {{
                                        getInvoice
                                            ? "Invoice Cancel"
                                            : "Add Invoice"
                                    }}
                                </button>
                            </div>

                            <hr class="bg-gray-100 mb-1" />

                            <div class="mail-list">
                                <span class="text-center pl-3 mx-auto"
                                    >From Leger Entry</span
                                >

                                <a
                                    @click="setTab('entries')"
                                    href="#"
                                    class="list-group-item border-0 mt-1 font-semibold"
                                    :class="[
                                        getCurrentTab == 'entries'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-form-select font-18 align-middle me-2 pb-1"
                                    ></i
                                    >All Entries
                                </a>
                            </div>

                            <hr class="bg-gray-100 mb-1 mt-0" />

                            <div class="mail-list">
                                <span class="text-center pl-3 mx-auto"
                                    >From Invoice Creation</span
                                >

                                <div class="d-flex">
                                    <a
                                    @click="setTab('invoices')"
                                    href="#"
                                    class="list-group-item border-0 mt-1 font-semibold"
                                    :class="[
                                        getCurrentTab == 'invoices'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-form-select font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Invoices
                                </a>

                                <a
                                    @click="setTab('invoicesDeleted')"
                                    href="#"
                                    class="list-group-item border-0 mt-1 font-semibold"
                                    :class="[
                                        getCurrentTab == 'invoicesDeleted'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-form-select font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Deleted
                                </a>
                                </div>
                            </div>

                            <hr class="bg-gray-100 mb-1 mt-0" />

                            <div class="mail-list">
                                <span class="text-center pl-3 mx-auto"
                                    >From Procurement</span
                                >

                                <a
                                    @click="setTab('home')"
                                    href="#"
                                    class="list-group-item border-0 mt-1 font-semibold"
                                    :class="[
                                        getCurrentTab == 'home'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-form-select font-18 align-middle me-2 pb-1"
                                    ></i
                                    >All Requisitions
                                </a>
                                <a
                                    @click="setTab('accepted')"
                                    href="#"
                                    class="list-group-item border-0 font-semibold"
                                    :class="[
                                        getCurrentTab == 'accepted'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-check-bold font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Accepted Requisitions</a
                                >
                                <a
                                    @click="setTab('rejected')"
                                    href="#"
                                    class="list-group-item border-0 font-semibold"
                                    :class="[
                                        getCurrentTab == 'rejected'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-alert-circle font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Rejected Requisitions</a
                                >
                                <a
                                    @click="setTab('starred')"
                                    href="#"
                                    class="list-group-item border-0 font-semibold"
                                    :class="[
                                        getCurrentTab == 'starred'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-star font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Starred Requisitions</a
                                >
                                <a
                                    @click="setTab('deleted')"
                                    href="#"
                                    class="list-group-item border-0 font-semibold"
                                    :class="[
                                        getCurrentTab == 'deleted'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-delete font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Deleted Requisitions</a
                                >
                            </div>

                            <!-- <div class="mt-2 ml-3">
                                <h5>
                                    <span
                                        class="badge rounded-pill p-1 px-2 badge-soft-secondary"
                                        >TASKS</span
                                    >
                                </h5>
                                <h6 class="text-uppercase mt-3">Pending</h6>
                                <div class="progress my-2 progress-sm">
                                    <div
                                        class="progress-bar progress-lg bg-danger"
                                        role="progressbar"
                                        style="width: 46%"
                                        aria-valuenow="46"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                                <p class="text-muted font-12 mb-0">
                                    7 (25%) of 35 incomplete tasks
                                </p>
                            </div> -->
                        </div>
                        <!-- End Left sidebar -->

                        <div class="inbox-rightbar pt-1 h-screen p-0">
                            <div class="">
                                <!-- <h5 class="mb-3">Recent</h5> -->
                                <!-- <transition name="fade"> -->
                                <div v-show="getInvoiceView">
                                    <view-invoice></view-invoice>
                                </div>

                                <div v-show="!getInvoiceView">
                                    <entries
                                        v-show="
                                            getCurrentTab == 'entries' &&
                                            getChartOfAcountForm == '' && !getInvoice
                                        "
                                    ></entries>

                                    <school-fee
                                        v-show="
                                            getCurrentTab == 'entries' &&
                                            getChartOfAcountForm !== '' && !getInvoice
                                        "
                                    ></school-fee>

                                    <invoice-create
                                        v-show="getInvoice"
                                    ></invoice-create>

                                    <div></div>
                                    <invoice-creation v-show="getCurrentTab == 'invoices'"></invoice-creation>
                                    <invoice-creation-deleted v-show="getCurrentTab == 'invoicesDeleted'"></invoice-creation-deleted>
                                    <requisitions
                                        v-show="getCurrentTab == 'home' && !getInvoice"
                                    ></requisitions>
                                    <accepted-requisitions
                                        v-show="getCurrentTab == 'accepted' && !getInvoice"
                                    ></accepted-requisitions>
                                    <deleted-requisitions
                                        v-show="getCurrentTab == 'deleted' && !getInvoice"
                                    ></deleted-requisitions>
                                    <starred-requisitions
                                        v-show="getCurrentTab == 'starred' && !getInvoice"
                                    ></starred-requisitions>
                                    <rejected-requisitions
                                        v-show="getCurrentTab == 'rejected' && !getInvoice"
                                    ></rejected-requisitions>
                                </div>
                                <!-- </transition> -->
                            </div>
                            <!-- end .mt-3-->
                        </div>
                        <!-- end inbox-rightbar-->

                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end Col -->
        </div>
        <!-- End row -->
    </div>
</template>

<script>
import Requisitions from "./Invoices/Requisitions.vue";
import AcceptedRequisitions from "./Invoices/AcceptedRequisitions.vue";
import DeletedRequisitions from "./Invoices/DeletedRequisitions.vue";
import StarredRequisitions from "./Invoices/StarredRequisitions.vue";
import RejectedRequisitions from "./Invoices/RejectedRequisitions.vue";
import ViewInvoice from "./Invoices/ViewInvoice.vue";
import SchoolFee from "./Invoices/Forms/SchoolFee.vue";
import InvoiceCreate from "./Invoices/InvoiceCreate.vue";
import InvoiceCreation from "./Invoices/InvoiceCreation/InvoiceCreation.vue";
import InvoiceCreationView from "./Invoices/InvoiceCreation/InvoiceCreationView.vue";
import InvoiceCreationDeleted from "./Invoices/InvoiceCreation/InvoiceCreationDeleted.vue";

import Entries from "./Invoices/Entries.vue";

// import Select2 from "v-select2-component";

export default {
    components: {
        Requisitions,
        AcceptedRequisitions,
        DeletedRequisitions,
        StarredRequisitions,
        RejectedRequisitions,
        ViewInvoice,
        InvoiceCreate,
        InvoiceCreation,
        InvoiceCreationView,
        InvoiceCreationDeleted,

        Entries,

        // Select2,

        SchoolFee,
    },

    mounted() {
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
            echo: null,
            dialogm1: "",
            dialog: false,
            dialogForm: "",
            legerEntries: null,
            legerEntries1: null,
            selectedLegerEntry: "Nothing Selected",
            student: null,
            students: null,

            formType: "",
        };
    },
    computed: {
        //Add computed properties
        getCurrentTab() {
            return this.$store.getters["AccountantInvoiceModule/getTab"];
        },

        getChartOfAcountForm() {
            return this.$store.getters[
                "AccountantInvoiceModule/getChartOfAcountForm"
            ];
        },

        getInvoiceView() {
            return this.$store.getters[
                "AccountantInvoiceModule/getInvoiceView"
            ];
        },

        getInvoice() {
            return this.$store.getters["AccountantInvoiceModule/getInvoice"];
        },

        legerEntriesListener() {
            return this.legerEntries !== null ? this.legerEntries.data : null;
        },

        setLegerEntryListener() {
            return this.selectedLegerEntry;
        },
    },
    watch: {
        //Add watchers...
        student() {
            this.getStudents();
        },
    },
    methods: {
        //Add methods...
        setTab(tab) {
            this.$store.dispatch("AccountantInvoiceModule/setTab", tab);
        },

        setInvoice() {
            this.$store.dispatch("AccountantInvoiceModule/setInvoice");
        },

        setChartOfAcountForm(tab) {
            this.$store.dispatch(
                "AccountantInvoiceModule/setChartOfAcountForm",
                tab
            );
        },

        getSpecificLegerEntries(type) {
            // console.log("Loading next page");
            axios
                .post("/accountant/getSpecificLegerEntries", {
                    type: type,
                })
                .then((response) => {
                    this.legerEntries = response.data;
                    // console.log(response.data)
                });
        },

        setLegerEntry(entry) {
            this.selectedLegerEntry = entry;
        },

        getStudents() {
            axios.get("/accountant/searchStudent").then((response) => {
                this.students = response.data.data;
                // console.log(response.data);
            });
        },

        // async submitForm() {
        //     axios
        //         .post("/accountant/submitTuitionFee", {
        //             amount: this.amount,
        //             narration: this.narration,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             this.submitFormToMain();
        //             this.amount = "";
        //             this.narration = "";
        //             // console.log(response.data);
        //         });
        //     // handle response here
        // },

        // async submitFormToMain() {
        //     axios
        //         .post("http://127.0.0.1:8001/api/accountant/getLegerEntries", {
        //             amount: this.amount,
        //             narration: this.narration,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             // this.amount = "";
        //             // this.narration = "";
        //             // console.log(response.data.data);
        //         });
        //     // handle response here
        // },

        setInvoiceView(id) {
            this.$store.dispatch("AccountantInvoiceModule/setInvoiceView", id);
        },

        myChangeEvent(val) {
            // console.log(val);
        },
        mySelectEvent({ id, text }) {
            // console.log({ id, text });
        },
    },
};
</script>

<style scoped>
/* .fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.slide-enter-active,
.slide-leave-active {
    transition: transform 0.5s;
}
.slide-enter,
.slide-leave-to {
    transform: translateX(-100%);
} */

/* .fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
} */
</style>
