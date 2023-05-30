<template>
    <div data-app>
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
                                <label for="example-email" class="form-label text-gray-500 font-normal"
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
                                <label for="example-email" class="form-label text-gray-500 font-normal"
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
                                <label for="example-email" class="form-label text-gray-500 font-normal"
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
                                <label for="example-textarea" class="form-label text-gray-500 font-normal"
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

        <!-- End of Right modal content -->

        <div class="row bg-white">
            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="h-screen">
                    <div class="pt-1">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar bg-white h-screen">

                            <div class="mail-list">

                                <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setTab('all')"
                                    :class="[
                                        getCurrentTab == 'all'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-pen-plus font-18 align-middle me-2 pb-1"
                                    ></i
                                    >School Registration
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
                                        class="mdi mdi-clock font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Shool Schedules</a
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
                                >
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
                                > -->
                            </div>

                        </div>
                        <!-- End Left sidebar -->

                        <div class="inbox-rightbar pt-1 px-0 h-screen">

                            <div class="">
                                <!-- <h5 class="mb-3">Recent</h5> -->
                                <transition name="fade">
                                <school-registration v-if="getCurrentTab == 'all'"></school-registration>
                                <school-schedules
                                    v-if="getCurrentTab == 'starred'"
                                ></school-schedules>
                                </transition>
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
import SchoolRegistration from "./AboutSchool/SchoolRegistration.vue";
import SchoolSchedules from "./AboutSchool/SchoolSchedules.vue";

// import Entries from "./Invoices/Entries.vue";

// import Select2 from "v-select2-component";

export default {
    components: {
        SchoolRegistration,
        SchoolSchedules,

        // Entries,

        // Select2,
    },

    mounted() {
        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                console.log(e);
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
            count: '',
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
