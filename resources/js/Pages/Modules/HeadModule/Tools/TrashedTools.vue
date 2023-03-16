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
                                    This operation can not be reversed.
                                </p>
                                <div class="flex justify-around">
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-warning my-1 text-white"
                                        data-bs-dismiss="modal"
                                        @click="permanentDeleteTools()"
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

            <v-card-title class="px-0 pt-0">
                Trashed Tools
                <v-spacer></v-spacer>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search"
                    single-line
                    hide-details
                ></v-text-field>
            </v-card-title>
            <!-- {{ $page.props.posts }} -->

            <v-data-table
                :headers="headers"
                :items="tools"
                item-key="name"
                :search="search"
                class="elevation-1"
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <div
                                    v-if="
                                        header.value == 'action' ||
                                        header.value == 'starred'
                                    "
                                >
                                    <v-icon
                                        v-if="header.value == 'action'"
                                        size="22"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#warning-alert-modal"
                                        @click="
                                            setIdForAction(items[idx]['id'])
                                        "
                                    >
                                        mdi-delete
                                    </v-icon>

                                    <v-icon
                                        v-if="header.value == 'starred'"
                                        size="22"
                                        :class="
                                            item[header.value]
                                                ? 'text-warning'
                                                : ''
                                        "
                                        @click="
                                            restoreTools(
                                                items[idx]['id'],
                                                item[header.value],
                                                header.value
                                            )
                                        "
                                    >
                                        mdi-restore
                                    </v-icon>
                                </div>

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
                                    class="text-gray-600"
                                    v-else-if="header.value == 'id'"
                                    >{{
                                        item[header.value]
                                    }}</span
                                >

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
                                        :class="
                                            item[header.value] == null &&
                                            header.value !== 'action' // header.value == 'level1'
                                                ? 'bg-gray-100 italic rounded px-1'
                                                : ''
                                        "
                                        >{{
                                            item[header.value] !== null
                                                ? header.value == "price"
                                                    ? formattedPrice(
                                                          item[header.value]
                                                      )
                                                    : item[header.value]
                                                : "Empty"
                                        }}</span
                                    >

                                    <template v-slot:input>
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

            <!-- <v-data-table
                mobile-breakpoint="0"
                :headers="headers"
                :items="tools"
                :search="search"
                class="bg-red-900"
            >
                <template v-slot:item.id="{ item }">
                    <span class="text-gray-600">{{ item.id }}</span>
                </template>

                <template v-slot:item.name="{ item }">
                    <span class="text-gray-600">{{
                        item.name
                    }}</span>
                </template>

                <template v-slot:item.price="{ item }">
                    <span class="text-gray-600">{{ formattedPrice(item.price) }}</span>
                </template>

                <template v-slot:item.count="{ item }">
                    <span class="text-gray-600">{{
                        item.count
                    }}</span>
                </template>

                <template v-slot:item.description="{ item }">
                    <span class="text-gray-600">{{ item.description }}</span>
                </template>

                <template v-slot:item.created_at="{ item }">
                    <span class="text-gray-600">{{
                        formattedDate(item.created_at)
                    }}</span>
                </template>

                <template v-slot:item.updated_at="{ item }">
                    <span class="text-gray-600">{{
                        formattedDate(item.updated_at)
                    }}</span>
                </template>
            </v-data-table> -->
            <!-- </v-card> -->
            <!-- </v-card> -->
        </v-col>
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
import moment from "moment";
import Spinner from "../../.././Components/SpinnerLoader.vue";
export default {
    components: {
        Spinner,
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
        // this.getLegerEntries();
        this.getTools();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.getTools();
            }
        );
    },

    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            showLoader: true,
            search: "",
            headers: [
                {
                    text: "Code",
                    align: "start",
                    sortable: false,
                    value: "id",
                },
                {
                    text: "Name",
                    value: "name",
                },
                { text: "Price", value: "price", align: "center" },
                { text: "Count", value: "count" },
                { text: "Date", value: "created_at" },
                // { text: "Update", value: "updated_at" },
                { text: "Restore", value: "starred" },
                { text: "Action", value: "action" },

                // { text: "Iron (%)", value: "iron" },
            ],
            // posts: this.$store.getters["getPosts"],
            // posts: null,
            tools: [],

            idForAction: null,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
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
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        getTools() {
            axios.get("/procurement/getTrashedTools").then((response) => {
                this.tools = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data)
            });
        },

        async updateTools(id, column, data) {
            axios
                .post("/procurement/updateTools", {
                    id: id,
                    data: data,
                    column: column,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // this.amount = "";
                    // this.narration = "";
                    console.log(response.data.data);
                });
            // handle response here
        },

        async restoreTools(id,data ,column) {
            axios
                .post("/procurement/restoreTools", {
                    id: id,
                    data: data,
                    column: column,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // this.amount = "";
                    // this.narration = "";
                    console.log(response.data.data);
                });
            // handle response here
        },

        async permanentDeleteTools() {
            axios
                .post("/procurement/deleteTools", {
                    id: this.idForAction,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    console.log(response.data.data);
                });
            // handle response here
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
