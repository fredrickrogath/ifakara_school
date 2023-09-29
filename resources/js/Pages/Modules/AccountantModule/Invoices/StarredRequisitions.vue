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
                id="warning-alert-modal1"
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
                                        @click="deleteInvoice()"
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

            <v-card-title class="px-0 pt-0 pb-1">
                <div class="pl-2 pt-1 text-sm uppercase">Invoices</div>
                <v-spacer></v-spacer>
            <snackbar message="Task completed successfully"></snackbar>

                <div class="flex col-3 p-0 pt-1 mr-2">
                    <input v-model="search" type="text" class="form-control form-control-sm" />
                    <v-icon size="20" class="px-1">mdi-magnify</v-icon>
                </div>
            </v-card-title>
            <hr class="bg-gray-200 mb-1 mt-0" />
            <!-- {{ $page.props.posts }} -->

            <v-data-table
                :headers="headers"
                :items="invoices"
                item-key="name"
                :search="search"
                class="elevation-1"
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <v-icon
                                    v-if="header.value == 'delete'"
                                    size="22"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#warning-alert-modal1"
                                    @click="setIdForAction(items[idx]['id'])"
                                >
                                    mdi-delete
                                </v-icon>

                                <v-icon
                                    v-if="header.value == 'view'"
                                    size="22"
                                    @click=" setInvoiceView(items[idx]['id'])"
                                >
                                    mdi-eye
                                </v-icon>

                                <v-icon
                                    v-if="header.value == 'starred'"
                                    size="22"
                                    :class="
                                        item[header.value] ? 'text-warning' : ''
                                    "
                                    @click="
                                        starredInvoices(
                                            items[idx]['id'],
                                            item[header.value],
                                            header.value
                                        )
                                    "
                                >
                                    mdi-star
                                </v-icon>

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'id'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
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
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'sellers'"
                                    >
                                    
                                    <span
                                        v-for="seller in item[header.value]"
                                        :key="seller.id"
                                        class="d-block"
                                    >
                                        <div class="">
                                            <v-menu transition="fab-transition">
                                                <template
                                                    v-slot:activator="{
                                                        on,
                                                        attrs,
                                                    }"
                                                >
                                                    <span
                                                        class="seller-name"
                                                        v-bind="attrs"
                                                        v-on="on"
                                                        @click="getSellerProfile(seller)"
                                                    >
                                                        {{ seller.name }}
                                                    </span>
                                                </template>

                                                <seller-profile :seller="sellerInfo"></seller-profile>
                                            </v-menu>
                                        </div>
                                    </span>
                                    
                                    </span
                                >

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'tools'"
                                >
                                    <div v-for="tool in item[header.value]">
                                        <span>
                                            {{ tool.name }}
                                        </span>
                                        <!-- <span class="mx-1">
                                            {{ formattedPrice(tool.price) }}
                                        </span> -->

                                        <!-- <span class="px-1"> * </span> -->

                                        <!-- <span>
                                            {{ tool.count }}
                                        </span> -->

                                        <!-- <span class="px-1"> = </span> -->

                                        <!-- <span>
                                            {{
                                                formattedPrice(
                                                    tool.price * tool.count
                                                )
                                            }}
                                        </span> -->
                                        
                                        <!-- <span class="px-1 font-bold"> {{ tool.id == item[header.value].length? ' . ': ' , ' }} </span> -->
                                    </div>
                                </span>

                                <span
                                    class="text-gray-600 italic font-semibold"
                                    v-else-if="header.value == 'tool_sum'"
                                >
                                    {{
                                        formattedPrice(totalPrice(item.invoice_tool))
                                    }}
                                </span>

                                <!-- <v-edit-dialog
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
                                </v-edit-dialog> -->
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-data-table>
        </v-col>
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
import moment from "moment";
import Spinner from "../../.././Components/SpinnerLoader.vue";
import Snackbar from "../../.././Components/Snackbar";
import SellerProfile from "../../.././Components/SellerProfile";
export default {
    components: {
        Spinner,
        Snackbar,
        SellerProfile,
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
        this.getStarredInvoices();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.getStarredInvoices();
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
                // {
                //     text: "Invoice #",
                //     align: "start",
                //     sortable: false,
                //     value: "id",
                // },
                {
                    text: "Seller",
                    value: "sellers",
                },
                {
                    text: "Tools",
                    value: "tools",
                },
                {
                    text: "Total",
                    value: "tool_sum",
                },
                // { text: "Starred", value: "starred" },
                { text: "Date", value: "created_at" },
                { text: "View", value: "view" },
                // { text: "Delete", value: "delete" },
            ],
            invoices: [],

            idForAction: null,

            sellerInfo: [],
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

        totalPrice(item) {
            return item.reduce((total, item) => {
                return total + item.tool.price * item.count;
            }, 0);
        },

        getSellerProfile(seller) {
            this.sellerInfo = seller
        },

        getStarredInvoices() {
            axios.get("/accountant/getStarredInvoices").then((response) => {
                this.invoices = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data)
            });
        },

        async updateTools(id, column, data) {
            axios
                .post("/accountant/updateTools", {
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

        async starredInvoices(id, data, column) {
            axios
                .post("/accountant/starredInvoice", {
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

        async deleteInvoice() {
            axios
                .post("/accountant/deleteInvoice", {
                    id: this.idForAction,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // console.log(response.data.data);
                });
            // handle response here
        },

        setInvoiceView(id) {
            this.$store.dispatch("AccountantInvoiceModule/setInvoiceView", id);
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
