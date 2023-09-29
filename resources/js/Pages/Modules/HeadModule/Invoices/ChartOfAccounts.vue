<template>
    <div data-app>
        <spinner v-if="showLoader"></spinner>
        <div v-else class="h-screen card">
            <!-- <v-card elevation=""> -->

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
                                        @click="deleteChartOfAccounts()"
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

            <!-- Right modal content -->
            <div
                id="right-modal"
                class="modal fade"
                tabindex="-1"
                role="dialog"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-sm modal-right bg-transparent">
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
                                <form @submit.prevent="addChartOfAccounts">
                                    <div class="mb-1 font-sm text-gray-600">
                                        <label
                                            for="example-email"
                                            class="form-label text-gray-500"
                                            >Transaction Type</label
                                        >
                                        <select
                                            id="example-email"
                                            v-model="account_type"
                                            class="form-select form-select-sm font-normal"
                                            aria-label=".form-select-sm example"
                                        >
                                            <option value="Income" selected>
                                                Income
                                            </option>
                                            <option value="Expense">
                                                Expenses
                                            </option>
                                            <!-- <option value="3">Three</option> -->
                                        </select>
                                    </div>

                                    <div class="text-sm mb-1 text-gray-600">
                                        <label
                                            for="example-email"
                                            class="form-label text-gray-500 font-normal"
                                            >Level 1</label
                                        >
                                        <input
                                            type="text"
                                            id="example-email"
                                            v-model="level1"
                                            class="form-control form-control-sm"
                                            placeholder="Tool Price"
                                        />
                                    </div>

                                    <div class="text-sm mb-1 text-gray-600">
                                        <label
                                            for="example-email"
                                            class="form-label text-gray-500 font-normal"
                                            >Level 2</label
                                        >
                                        <input
                                            type="text"
                                            id="example-email"
                                            v-model="level2"
                                            class="form-control form-control-sm"
                                            placeholder="Tool Price"
                                        />
                                    </div>

                                    <div class="text-sm mb-1 text-gray-600">
                                        <label
                                            for="example-email"
                                            class="form-label text-gray-500 font-normal"
                                            >Level 3</label
                                        >
                                        <input
                                            type="text"
                                            id="example-email"
                                            v-model="level3"
                                            class="form-control form-control-sm"
                                            placeholder="Tool Price"
                                        />
                                    </div>

                                    <div class="text-sm mb-1 text-gray-600">
                                        <label
                                            for="example-email"
                                            class="form-label text-gray-500 font-normal"
                                            >Name</label
                                        >
                                        <input
                                            type="text"
                                            id="example-email"
                                            v-model="name"
                                            class="form-control form-control-sm"
                                            placeholder="Tool Price"
                                        />
                                    </div>

                                    <div class="text-sm mb-1 text-gray-600">
                                        <label
                                            for="example-textarea"
                                            class="form-label text-gray-500 font-normal"
                                            >Description</label
                                        >
                                        <textarea
                                            class="form-control form-control-sm"
                                            id="example-textarea"
                                            rows="2"
                                            v-model="description"
                                        ></textarea>
                                    </div>

                                    <div class="text-sm text-gray-600">
                                        <label
                                            for="example-textarea"
                                            class="form-label text-gray-500 font-normal"
                                            >Note</label
                                        >
                                        <textarea
                                            class="form-control form-control-sm"
                                            id="example-textarea"
                                            rows="2"
                                            v-model="notes"
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

            
            <v-card-title class="px-0 pt-0 pb-1">
                        <div class="pl-2 pt-1 text-sm uppercase">Chart Of Accounts</div>
                        <v-spacer></v-spacer>
                        
                        <div class="flex col-3 p-0 pt-1 mr-2">
                            <input v-model="search" type="text" class="form-control form-control-sm" />
                            <v-icon size="20" class="px-1">mdi-magnify</v-icon>
                        </div>
                        
                        <v-spacer></v-spacer>

                <v-icon
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#right-modal"
                    class="ml-4 px-1 mt-3 mr-1 py-1"
                    size="22"
                    @click=""
                >
                    mdi-pen-plus
                </v-icon>
            </v-card-title>
            <hr class="bg-gray-200 mb-1 mt-0" />

            <v-data-table
                :headers="headers"
                :items="chartOfAccounts"
                item-key="name"
                :search="search"
                class="elevation-1"
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <v-icon
                                    v-if="header.value == 'action'"
                                    size="22"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#warning-alert-modal"
                                    @click="setIdForAction(items[idx]['id'])"
                                >
                                    mdi-delete
                                </v-icon>

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
                                        class="text-gray-600"
                                        v-if="header.value == 'created_at'"
                                        >{{
                                            formattedDate(item[header.value])
                                        }}</span
                                    >

                                    <span
                                        class="text-gray-600"
                                        :class="
                                            item[header.value] == null &&
                                            header.value !== 'action' // header.value == 'level1'
                                                ? 'bg-gray-100 italic rounded px-1'
                                                : ''
                                        "
                                        v-else
                                        >{{
                                            item[header.value] !== null
                                                ? header.value == "level1" ||
                                                  header.value == "level2" ||
                                                  header.value == "level3"
                                                    ? formattedPrice(
                                                          item[header.value]
                                                      )
                                                    : item[header.value]
                                                : "Empty"
                                        }}</span
                                    >

                                    <template
                                        v-slot:input
                                        v-if="header.value !== 'action'"
                                    >
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
            <!-- </v-card> -->
        </div>
    </div>
</template>

<script>
import moment from "moment";
import Spinner from "./../../.././Components/SpinnerLoader.vue";
export default {
    components: {
        Spinner,
    },

    mounted() {
        this.showLoader = true;

        this.getChartOfAccounts();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.getChartOfAccounts();
            }
        );
    },

    data() {
        return {
            showLoader: true,

            search: "",
            chartOfAccounts: [],
            headers: [
                {
                    text: "Code",
                    align: "left",
                    sortable: false,
                    value: "id",
                },
                { text: "Type", value: "account_type" },
                { text: "Lev 1", value: "level1" },
                { text: "Lev 2", value: "level2" },
                { text: "Lev 3", value: "level3" },
                { text: "Name", value: "name" },
                { text: "Description", value: "description" },
                { text: "Notes", value: "notes" },
                { text: "Date", value: "created_at" },
                { text: "Action", value: "action" },
            ],

            account_type: "Income",
            level1: '',
            level2: '',
            level3: '',
            name: "",
            description: '',
            notes: '',

            idForAction: null,
        };
    },
    methods: {
        formattedPrice(amount) {
            return amount.toLocaleString("sw-TZ", {
                style: "currency",
                currency: "Tsh",
            });
        },

        formattedDate(date) {
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },
        getChartOfAccounts() {
            // console.log("Loading next page");
            axios.get("/head/getChartOfAccounts").then((response) => {
                this.chartOfAccounts = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data)
            });
        },

        async setIdForAction(id) {
            this.idForAction = id;
        },

        async addChartOfAccounts() {
            axios
                .post("/head/addChartOfAccounts", {
                    account_type: this.account_type,
                    level1: this.level1,
                    level2: this.level2,
                    level3: this.level3,
                    name: this.name,
                    description: this.description,
                    notes: this.notes,
                })
                .then((response) => {
                    this.account_type = "";
                    this.level1 = null;
                    this.level2 = null;
                    this.level3 = null;
                    this.name = "";
                    this.description = null;
                    this.notes = null;
                });
            // handle response here
        },

        async updateChartOfAccounts(id, column, data) {
            axios
                .post("/head/updateChartOfAccount", {
                    id: id,
                    data: data,
                    column: column,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // this.amount = "";
                    // this.narration = "";
                    // console.log(response.data.data);
                });
            // handle response here
        },

        async deleteChartOfAccounts() {
            axios
                .post("/head/deleteChartOfAccounts", {
                    id: this.idForAction,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // console.log(response.data.data);
                });
            // handle response here
        },

        save(id, column, data) {
            this.updateChartOfAccounts(id, data, column);
            // console.log(id + " , " +data);
        },
        cancel() {},
        open() {},
        close() {},
    },

    computed: {
        //   formattedDate(date) {
        //     return moment(date).format('MMMM Do YYYY, h:mm:ss a');
        //   }
    },
};
</script>
