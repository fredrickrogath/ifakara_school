<template>
    <div data-app>

        <div class="row bg-white">
            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="card h-screen">
                    <div class="card-body px-0 pt-1">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar h-screen">
                            <!-- <div class="btn-group dropend d-block mb-2 mx-2">
                                <button
                                    type="button"
                                    class="bg-gray-200 py-1 w-100 waves-effect waves-light dropdown-toggle"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    Select Entry Type
                                </button>

                                <div class="dropdown-menu">
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        @click="
                                            (dialog = true),
                                                (dialogForm = 'Sales')
                                        "
                                    >
                                        <v-icon size="18" class="me-1"
                                            >mdi-cart</v-icon
                                        >
                                        Sales</a
                                    >
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        @click="
                                            getSpecificLegerEntries();
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
                                        class="dropdown-item"
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
                            </div> -->

                            <!-- <div class="btn-group d-block mb-0 mx-2">
                                <button
                                    type="button"
                                    class="bg-gray-200 py-1 w-100 waves-effect waves-light dropdown-toggle"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    {{ setLegerEntryListener }}
                                </button>

                                <div class="dropdown-menu">
                                    <a
                                        v-for="item in legerEntriesListener"
                                        :key="item.id"
                                        class="dropdown-item"
                                        href="#"
                                        @click="
                                            (dialog = true),
                                                (dialogForm = item.name)
                                        "
                                        ><i class="mdi mdi-cart me-1"></i>
                                        {{ item.name }}</a
                                    >
                                    <a
                                        v-if="legerEntriesListener == null"
                                        class="dropdown-item"
                                        href="#"
                                    >
                                        Please Select Entry</a
                                    >
                                     <a
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
                                    >
                                </div>
                            </div> -->

                            <!-- <hr class="bg-gray-100 mb-1" /> -->

                            <!-- <div class="mail-list">
                                <span class="text-center pl-3 mx-auto"
                                    >From Leger Entry</span
                                >

                                <a
                                    @click="setTab('entries')"
                                    href="#"
                                    class="list-group-item border-0 mt-1"
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

                            <hr class="bg-gray-100 mb-1 mt-0" /> -->

                            <div class="mail-list">
                                <div
                                    class="d-flex justify-content-between align-items-center"
                                >
                                    <div class="ml-3 mt-1 font-15">My Office</div>

                                </div>

                                <hr class="bg-gray-200 my-2 mx-2" />

                                <a
                                    href="#"
                                    class="list-group-item border-0 mt-1"
                                    @click="setTab('all')"
                                    :class="[
                                        getCurrentTab == 'all'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >All Staffs
                                </a>
                                <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setTab('new')"
                                    :class="[
                                        getCurrentTab == 'new'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-school font-19 align-middle me-2 pb-1"
                                    ></i
                                    >New Staffs</a
                                >
                            </div>

                            <hr class="bg-gray-200 mx-2 mb-2 mt-2" />

                            <!-- <div class="mt-2 ml-3">
                                <h5>
                                    <span
                                        class="badge rounded-pill p-1 px-2 badge-soft-secondary"
                                        >PAYMENTS</span
                                    >
                                </h5>
                                <h6 class="text-uppercase mt-3">
                                    School fee payments
                                </h6>
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
                                    7 (25%) of 350
                                </p>
                            </div> -->
                        </div>
                        <!-- End Left sidebar -->

                        <div class="inbox-rightbar pt-1 px-0">
                        
                            <div class="bg-white h-screen">
                                <!-- <h5 class="mb-3">Recent</h5> -->
                                <!-- <transition-group name="slide" mode="in-out"> -->
                                    <div v-show="getAddStudent && !getInvoiceView" key="1">
                                        <!-- <add-staff></add-staff> -->
                                    </div>

                                    <!-- <div v-show="getInvoiceView && !getAddStudent">
                                        <view-staff></view-staff>
                                    </div> -->
                                    <div v-show="!getAddStudent && !getInvoiceView" key="2">
                                        <all-staffs v-show="getCurrentTab == 'all'"></all-staffs>
                                        <new-staffs v-show="getCurrentTab == 'new'"></new-staffs>
                                    </div>
                                <!-- <requisitions
                                    v-if="getCurrentTab == 'home'"
                                ></requisitions>
                                <accepted-requisitions
                                    v-if="getCurrentTab == 'accepted'"
                                ></accepted-requisitions>
                                <deleted-requisitions
                                    v-if="getCurrentTab == 'deleted'"
                                ></deleted-requisitions>
                                <starred-requisitions
                                    v-if="getCurrentTab == 'starred'"
                                ></starred-requisitions>
                                <rejected-requisitions
                                    v-if="getCurrentTab == 'rejected'"
                                ></rejected-requisitions> -->
                                <!-- </transition-group> -->
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
import JetApplicationMark from "@/Jetstream/ApplicationMark";

import AllStaffs from "./Departments/AllStaffs.vue";
import NewStaffs from "./Departments/NewStaffs.vue";
// import AddStaff from "./Departments/AddStaff.vue";
import ViewStaff from "./Departments/ViewStaff.vue";

// import Entries from "./Invoices/Entries.vue";

import Select2 from "v-select2-component";

export default {
    components: {
        JetApplicationMark,

        AllStaffs,
        NewStaffs,
        // AddStaff,
        ViewStaff,
        // Entries,

        Select2,
    },

    mounted() {
        // Receiving broadicasting
    //     window.Echo.channel("EventTriggered").listen(
    //         "NewPostPublished",
    //         (e) => {
    //             // console.log(e);
    //         }
    //     );
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

            name: "",
            price: "",
            count: "",
            narration: "",

            myValue: "",
            myOptions: ["op1", "op2", "op3"],

            InvoiceGenerate: false,
        };
    },
    computed: {
        //Add computed properties
        pageTitle() {
            return document.title || "No Title";
        },

        getCurrentTab() {
            return this.$store.getters["HeadDepartmentModule/getTab"];
        },

        getInvoiceView() {
            return this.$store.getters["HeadDepartmentModule/getInvoiceView"];
        },
        
        legerEntriesListener() {
            return this.legerEntries !== null ? this.legerEntries.data : null;
        },

        setLegerEntryListener() {
            return this.selectedLegerEntry;
        },

        getAddStudent() {
            return this.$store.getters["HeadDepartmentModule/getAddStudent"];
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
        // async submitForm() {
        //     axios
        //         .post("/procurement/add_tool", {
        //             name: this.name,
        //             price: this.price,
        //             count: this.count,
        //             narration: this.narration,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             // this.submitFormToMain();
        //             this.name = "";
        //             this.price = "";
        //             this.count = "";
        //             this.narration = "";
        //             // console.log(response.data);
        //         });
        //     // handle response here
        // },
        setTab(tab) {
            this.$store.dispatch("HeadDepartmentModule/setTab", tab);
        },

        setAddStudent() {
            this.$store.dispatch("HeadDepartmentModule/setAddStudent");
        },

        // getSpecificLegerEntries() {
        //     // console.log("Loading next page");
        //     axios
        //         .get("/accountant/getSpecificLegerEntries")
        //         .then((response) => {
        //             this.legerEntries = response.data;
        //             // console.log(response.data)
        //         });
        // },

        // setLegerEntry(entry) {
        //     this.selectedLegerEntry = entry;
        // },

        // getStudents() {
        //     axios.get("/accountant/searchStudent").then((response) => {
        //         this.students = response.data.data;
        //         // console.log(response.data);
        //     });
        // },

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
        //             console.log(response.data);
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
        //             console.log(response.data.data);
        //         });
        //     // handle response here
        // },

        // myChangeEvent(val) {
        //     console.log(val);
        // },
        // mySelectEvent({ id, text }) {
        //     console.log({ id, text });
        // },
    },
};
</script>

<style scoped>
.slide-enter-active{
    animation: slide-in 200ms ease-out forwards;
}
.slide-leave-active {
    animation: slide-out 200ms ease-out forwards;
}

@keyframes slide-in {
    from {
        transform: translateY(-30px);
        opacity: 0;
    }

    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slide-out {
    from {
        transform: translateY(0);
        opacity: 1;
    }

    to {
        transform: translateY(-30);
        opacity: 0;
    }
}
/* .slide-enter,
.slide-leave-to {
    transform: translateX(-100%);
} */

</style>
