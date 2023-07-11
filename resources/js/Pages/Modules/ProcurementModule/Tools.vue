<template>
    <div data-app>
        <!-- End of Right modal content -->
        <!-- Right modal content -->
        <div
            id="right-modal"
            class="modal fade"
            tabindex="-1"
            role="dialog"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg modal-right bg-transparent">
                <div class="modal-content">
                    <!-- <div class="modal-header border-0 bg-info">
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div> -->
                    <div class="modal-body">
                        <div class="">
                            <form @submit.prevent="submitForm">
                                <div class="mb-1 text-gray-600">
                                    <label
                                        for="example-email"
                                        class="form-label text-gray-500 font-normal"
                                        >Tool Name</label
                                    >
                                    <input
                                        type="text"
                                        id="example-email"
                                        v-model="name"
                                        class="form-control form-control-sm"
                                        placeholder="Tool Name"
                                    />
                                </div>

                                <div class="mb-1 text-gray-600">
                                    <label
                                        for="example-email"
                                        class="form-label text-gray-500 font-normal"
                                        >Price</label
                                    >
                                    <input
                                        type="text"
                                        id="example-email"
                                        v-model="price"
                                        class="form-control form-control-sm"
                                        placeholder="Tool Price"
                                    />
                                </div>

                                <div class="mb-1 text-gray-600">
                                    <label
                                        for="example-email"
                                        class="form-label text-gray-500 font-normal"
                                        >Tool Count</label
                                    >
                                    <input
                                        type="text"
                                        id="example-email"
                                        v-model="count"
                                        class="form-control form-control-sm"
                                        placeholder="Tool Count"
                                    />
                                </div>

                                <div class="mb-1 text-gray-600">
                                    <label
                                        for="example-textarea"
                                        class="form-label text-gray-500 font-normal"
                                        >Description</label
                                    >
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="example-textarea"
                                        rows="2"
                                        v-model="narration"
                                    ></textarea>
                                </div>

                                <div
                                    class="d-flex justify-content-between my-1 mt-2"
                                >
                                    <button
                                        data-bs-dismiss="modal"
                                        type="submit"
                                        class="btn btn-success text-white btn-sm waves-effect waves-light"
                                    >
                                        Submit
                                    </button>
                                    <button
                                        data-bs-dismiss="modal"
                                        type="button"
                                        class="btn btn-danger btn-sm text-white waves-effect waves-light"
                                    >
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="row">
            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="card h-screen">
                    <div class="pt-1">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar">
                            <div class="mail-list">
                                <div
                                    class="d-flex justify-content-between align-items-center"
                                >
                                    <div class="ml-3 font-15">My Office</div>

                                    <v-icon
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#right-modal"
                                        class="ml-4 px-1 mt-1 mr-0 py-1"
                                        size="22"
                                        @click=""
                                    >
                                        mdi-pen-plus
                                    </v-icon>
                                </div>

                                <hr class="bg-gray-200 mb-1 mt-1 mx-2" />

                                <a
                                    href="#"
                                    class="list-group-item border-0 mt-1"
                                    @click="setTab('Sellers')"
                                    :class="[
                                        getCurrentTab == 'Sellers'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-store font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Sellers
                                </a>

                                <hr class="bg-gray-200 mb-1 mt-1 mx-2" />

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
                                        class="mdi mdi-form-select font-18 align-middle me-2 pb-1"
                                    ></i
                                    >All Tools
                                </a>
                                <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setTab('starred')"
                                    :class="[
                                        getCurrentTab == 'starred'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-star font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Starred Tools</a
                                >
                                <!-- <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setTab('lost')"
                                    :class="[
                                        getCurrentTab == 'lost'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-close-thick font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Broken & Lost Tools</a
                                > -->
                                <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setTab('deleted')"
                                    :class="[
                                        getCurrentTab == 'deleted'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-delete font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Trashed Tools</a
                                >
                            </div>

                            <hr class="bg-gray-200 mx-2 mb-2 mt-2" />

                            <div class="mt-2 ml-3">
                                <h5>
                                    <span
                                        class="badge rounded-pill p-1 px-2 badge-soft-secondary"
                                        >TOOLS & EQUIPMENTS</span
                                    >
                                </h5>
                                <h6 class="text-uppercase mt-3">
                                    Unmatched price
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
                                    7 (25%) of 35 Tools & Items
                                </p>
                            </div>
                        </div>
                        <!-- End Left sidebar -->

                        <div class="inbox-rightbar pt-1 px-0 h-screen">
                            <div class="">
                                <!-- <h5 class="mb-3">Recent</h5> -->
                                <div v-show="getAddSeller">
                                    <add-seller></add-seller>
                                </div>
                                <div v-show="!getAddSeller">
                                    <!-- <transition name="fade"> -->
                                        <AllTools
                                            v-show="getCurrentTab == 'all'"
                                        ></AllTools>
                                        <sellers
                                            v-show="getCurrentTab == 'Sellers'"
                                        ></sellers>
                                        <starred-tools
                                            v-show="getCurrentTab == 'starred'"
                                        ></starred-tools>
                                        <!-- <broken-tools
                                            v-show="getCurrentTab == 'lost'"
                                        ></broken-tools> -->
                                        <trashed-tools
                                            v-show="getCurrentTab == 'deleted'"
                                        ></trashed-tools>
                                    <!-- </transition> -->
                                </div>
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
import AllTools from "./Tools/AllTools.vue";
import StarredTools from "./Tools/StarredTools.vue";
// import BrokenTools from "./Tools/BrokenTools.vue";
import TrashedTools from "./Tools/TrashedTools.vue";
import Sellers from "./Tools/Sellers.vue";

import AddSeller from "./Tools/AddSeller.vue";

// import Entries from "./Invoices/Entries.vue";

// import Select2 from "v-select2-component";

export default {
    components: {
        AllTools,
        StarredTools,
        // BrokenTools,
        TrashedTools,
        Sellers,
        AddSeller,

        // Entries,

        // Select2,
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

            name: "",
            price: "",
            count: "",
            narration: "",

            myValue: "",
            myOptions: ["op1", "op2", "op3"],
        };
    },
    computed: {
        //Add computed properties
        getCurrentTab() {
            return this.$store.getters["ProcurementToolModule/getTab"];
        },

        getAddSeller() {
            return this.$store.getters["ProcurementToolModule/getInvoiceGenerate"];
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

        async submitForm() {
            axios
                .post("/procurement/add_tool", {
                    name: this.name,
                    price: this.price,
                    count: this.count,
                    narration: this.narration,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // this.submitFormToMain();
                    this.name = "";
                    this.price = "";
                    this.count = "";
                    this.narration = "";
                    // console.log(response.data);
                });
            // handle response here
        },

        setTab(tab) {
            this.$store.dispatch("ProcurementToolModule/setTab", tab);
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
