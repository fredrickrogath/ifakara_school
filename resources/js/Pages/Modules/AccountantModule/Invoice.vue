<template>
    <div data-app class="">
        <v-row justify="center">
            <v-dialog v-model="dialog" scrollable width="300px">
                <v-card>
                    <h5 class="text-center text-gray-600">{{ dialogForm }}</h5>
                    <!-- <v-divider></v-divider> -->
                    <div class="px-2">
                        <form @submit.prevent="submitForm">
                            <!-- <div class="mb-3 text-gray-600">
                                <label class="form-label">Student</label> <br />
                                <input
                                    value="1"
                                    type="text"
                                    class="form-control form-control-sm"
                                />
                                <select
                                    id="topic"
                                    class="form-control form-control-md"
                                    v-model="amount"
                                >
                                    {{-- <option value='0'>Select topic</option> --}}

                                    Read Departments
                                    <option
                                        v-for="student in students"
                                        :key="student.id"
                                    >
                                        {{ student.user.name }}
                                    </option> -->
                            <!-- @endforeach -->
                            <!-- </select>
                            </div> -->

                            <!-- <div class="mb-1 text-gray-600">
                                <label for="simpleinput" class="form-label"
                                    >Identity</label
                                >
                                <input
                                    type="text"
                                    id="simpleinput"
                                    class="form-control form-control-sm"
                                    placeholder="Identity"
                                />
                            </div> -->

                            <div class="mb-1 text-gray-600">
                                <label for="example-email" class="form-label"
                                    >Amount</label
                                >
                                <input
                                    type="number"
                                    id="example-email"
                                    v-model="amount"
                                    class="form-control form-control-sm"
                                    placeholder="Amount"
                                />
                            </div>

                            <!-- <div class="mb-1 text-gray-600">
                                <label for="example-email" class="form-label"
                                    >Amount</label
                                >
                                <input
                                    type="email"
                                    id="example-email"
                                    name="amount"
                                    class="form-control form-control-sm"
                                    placeholder="Amount"
                                />
                            </div> -->

                            <!-- <div class="mb-1 text-gray-600">
                                <label for="example-email" class="form-label"
                                    >Amount</label
                                >
                                <input
                                    type="email"
                                    id="example-email"
                                    name="amount"
                                    class="form-control form-control-sm"
                                    placeholder="Amount"
                                />
                            </div> -->

                            <!-- <div class="mb-1 text-gray-600">
                            <label for="example-palaceholder" class="form-label"
                                >Placeholder</label
                            >
                            <input
                                type="text"
                                id="example-palaceholder"
                                class="form-control form-control-sm"
                                placeholder="placeholder"
                            />
                        </div> -->

                            <div class="mb-1 text-gray-600">
                                <label for="example-textarea" class="form-label"
                                    >Naration</label
                                >
                                <textarea
                                    class="form-control form-control-sm"
                                    id="example-textarea"
                                    rows="5"
                                    v-model="narration"
                                ></textarea>
                            </div>

                            <!-- <div class="mb-1">
                            <label for="example-readonly" class="form-label"
                                >Readonly</label
                            >
                            <input
                                type="text"
                                id="example-readonly"
                                class="form-control form-control-sm"
                                readonly=""
                                value="Readonly value"
                            />
                        </div> -->

                            <div
                                class="d-flex justify-content-between my-1 mt-2"
                            >
                                <button
                                    @click="dialog = false"
                                    type="submit"
                                    class="btn btn-success waves-effect waves-light"
                                >
                                    Submit
                                </button>
                                <button
                                    @click="dialog = false"
                                    type="button"
                                    class="btn btn-danger waves-effect waves-light"
                                >
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </v-card>
            </v-dialog>
        </v-row>

        <!-- End of Right modal content -->

        <div class="row">
            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body pt-1">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar">
                            <div class="btn-group dropend d-block mb-2 mx-2">
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
                            </div>

                            <div class="btn-group d-block mb-0 mx-2">
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
                            </div>

                            <hr class="bg-gray-100 mb-1" />

                            <div class="mail-list">
                                <span class="text-center pl-3 mx-auto"
                                    >From Procurement</span
                                >

                                <a
                                    @click="setTab('home')"
                                    href="#"
                                    class="list-group-item border-0 mt-1"
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
                                    class="list-group-item border-0"
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
                                    class="list-group-item border-0"
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
                                    class="list-group-item border-0"
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
                                    class="list-group-item border-0"
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

                            <div class="mt-2 ml-3">
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
                            </div>
                        </div>
                        <!-- End Left sidebar -->

                        <div class="inbox-rightbar">
                            <div
                                class="d-md-flex justify-content-between align-items-center"
                            >
                                <form class="search-bar">
                                    <div class="position-relative">
                                        <input
                                            type="text"
                                            class="form-control form-control-light"
                                            placeholder="Search files..."
                                        />
                                        <span class="mdi mdi-magnify"></span>
                                    </div>
                                </form>
                                <div class="mt-2 mt-md-0">
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-white"
                                    >
                                        <i
                                            class="mdi mdi-format-list-bulleted"
                                        ></i>
                                    </button>
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-white"
                                    >
                                        <i class="mdi mdi-view-grid"></i>
                                    </button>
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-white"
                                    >
                                        <i
                                            class="mdi mdi-information-outline"
                                        ></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mt-3">
                                <!-- <h5 class="mb-3">Recent</h5> -->
                                <transition name="fade">
                                    <requisitions
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
                                    ></rejected-requisitions>
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
import Requisitions from "./Invoices/Requisitions.vue";
import AcceptedRequisitions from "./Invoices/AcceptedRequisitions.vue";
import DeletedRequisitions from "./Invoices/DeletedRequisitions.vue";
import StarredRequisitions from "./Invoices/StarredRequisitions.vue";
import RejectedRequisitions from "./Invoices/RejectedRequisitions.vue";

export default {
    components: {
        Requisitions,
        AcceptedRequisitions,
        DeletedRequisitions,
        StarredRequisitions,
        RejectedRequisitions,
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
            selectedLegerEntry: "Nothing Selected",
            student: null,
            students: null,
            name: "",
            amount: "",
            narration: "",
        };
    },
    computed: {
        //Add computed properties
        getCurrentTab() {
            return this.$store.getters["invoice/getTab"];
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
            this.$store.dispatch("invoice/setTab", tab);
        },

        getSpecificLegerEntries() {
            // console.log("Loading next page");
            axios
                .get("/accountant/getSpecificLegerEntries")
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

        async submitForm() {
            const formData = this.form;
            axios
                .post("/accountant/submitTuitionFee", {
                    amount: this.amount,
                    narration: this.narration,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    this.amount = "";
                    this.narration = "";
                    console.log(response.data);
                });
            // handle response here
        },
    },
};
</script>

<style scoped>
.fade-enter-active,
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
}
</style>
