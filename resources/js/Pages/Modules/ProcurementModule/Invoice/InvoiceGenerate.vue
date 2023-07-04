<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12">
            <snack-bar
                message="The Requsition has sent successfully to accountant for futher process"
            ></snack-bar>

            <div class="d-flex justify-content-between">
                <div class="col-5">
                    <!-- <div class="col-5"> -->
                    <div class="-mb-6">Select Supplier</div>
                    <v-select
                        v-model="selectedSuppliers"
                        :items="supplierOptions"
                        item-value="id"
                        chips
                        multiple
                    ></v-select>
                    <!-- </div> -->

                    <!-- <div class="mb-1">Select Supplier</div>
                    <Select2
                        v-model="supplier"
                        :options="supplierOptions"
                        :settings="{ width: '100%', 'z-index': '1060' }"
                        @change="myChangeEvent($event, 'supplier')"
                        @select="mySelectEvent($event, 'supplier')"
                    /> -->
                </div>

                <div class="col-5">
                    <div class="mb-1">Select Tool / Equipment</div>
                    <Select2
                        v-model="tool"
                        :options="toolOptions"
                        :settings="{ width: '100%', 'z-index': '1060' }"
                        @change="myChangeEvent($event, 'tool')"
                        @select="mySelectEvent($event, 'tool')"
                    />
                </div>

                <div class="col-2">
                    <div class="mb-1">Select Count</div>
                    <Select2
                        v-model="count"
                        :options="countOptions"
                        :settings="{ width: '100%', 'z-index': '1060' }"
                        @change="myChangeEvent($event, 'count')"
                        @select="mySelectEvent($event, 'count')"
                    />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="">
                        <p>
                            <!-- <b>Suppliers : {{ selectedSuppliers }}</b> -->
                            <!-- <b class="d-none">Suppliers : {{ selectedSuppliersList }}</b> -->
                        </p>
                        <p class="">
                            Thanks a lot because you keep purchasing our
                            products. Our company promises to provide high
                            quality products for you as well as outstanding
                            customer service for every transaction.
                        </p>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-4 offset-md-2">
                    <div class="float-end">
                        <p>
                            <strong>Order Date : </strong>
                            <span class="float-end">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                {{ formattedDate }}</span
                            >
                        </p>
                        <p>
                            <strong>Order Status : </strong>
                            <span class="float-end"
                                ><span class="badge bg-danger"
                                    >Unpaid</span
                                ></span
                            >
                        </p>
                        <p>
                            <strong>Order No. : </strong>
                            <span class="float-end">000028 </span>
                        </p>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <v-data-table
                :headers="headers"
                :items="tools"
                item-key="name"
                :search="search"
                class="elevation-1"
                dense
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
                                        mdi-minus-circle
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
                                            starredTools(
                                                items[idx]['id'],
                                                item[header.value],
                                                header.value
                                            )
                                        "
                                    >
                                        mdi-star
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
                                    >{{ item[header.value] }}</span
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

            <div class="row">
                <div class="col-sm-6">
                    <div class="clearfix">
                        <h6 class="">Notes:</h6>

                        <small class="">
                            All accounts are to be paid within 7 days from
                            receipt of invoice. To be paid by cheque or credit
                            card or direct payment online. If account is not
                            paid within 7 days the credits details supplied as
                            confirmation of work undertaken will be charged the
                            agreed quoted fee noted above.
                        </small>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-sm-6">
                    <div class="float-end">
                        <p>
                            <b>Sub-total:</b>
                            <span class="float-end">{{
                                formattedPrice(totalPrice)
                            }}</span>
                        </p>
                        <p>
                            <b>Discount (18%):</b>
                            <span class="float-end">
                                &nbsp;&nbsp;&nbsp;
                                {{
                                    formattedPrice((totalPrice * 18) / 100)
                                }}</span
                            >
                        </p>
                        <h4>
                            {{
                                formattedPrice(
                                    totalPrice - (totalPrice * 18) / 100
                                )
                            }}
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- end col -->
            </div>

            <div class="d-flex justify-content-center mt-3">
                <form @submit.prevent="submitInvoice">
                    <div class="d-flex justify-content-between my-1 mt-2">
                        <button
                            type="submit"
                            class="btn btn-success text-white btn-sm waves-effect waves-light"
                        >
                            Submit to accountant
                        </button>
                    </div>
                </form>
            </div>
        </v-col>
    </div>
    <!-- </v-row>

        
    </v-col> -->
</template>

<script>
import moment from "moment";
import Select2 from "v-select2-component";
import SnackBar from "../../.././Components/SnackBar.vue";

import Spinner from "../../.././Components/SpinnerLoader.vue";

export default {
    components: {
        Spinner,
        Select2,
        SnackBar,
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

            showLoader: true,
            search: "",
            headers: [
                {
                    text: "Name",
                    value: "name",
                },
                { text: "Price", value: "price", align: "center" },
                { text: "Count", value: "count" },
                // { text: "Action", value: "action" },
            ],

            tools: [],

            idForAction: null,

            supplier: [],
            supplierId: null,
            supplierOptions: [],
            selectedSuppliers: [],

            tool: "",
            toolId: null,
            toolOptions: [],

            count: "",
            countOptions: [
                "1",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7",
                "8",
                "9",
                "10",
                "11",
                "12",
                "13",
                "14",
                "15",
                "16",
                "17",
                "18",
                "19",
                "20",
                "21",
                "22",
                "23",
                "24",
                "25",
                "26",
                "27",
                "28",
                "29",
                "30",
                "31",
                "32",
                "33",
                "34",
                "35",
                "36",
                "37",
                "38",
                "39",
                "40",
                "41",
                "42",
                "43",
                "44",
                "45",
                "46",
                "47",
                "48",
                "49",
                "50",
                "51",
                "52",
                "53",
                "54",
                "55",
                "56",
                "57",
                "58",
                "59",
                "60",
                "61",
                "62",
                "63",
                "64",
                "65",
                "66",
                "67",
                "68",
                "69",
                "70",
                "71",
                "72",
                "73",
                "74",
                "75",
                "76",
                "77",
                "78",
                "79",
                "80",
                "81",
                "82",
                "83",
                "84",
                "85",
                "86",
                "87",
                "88",
                "89",
                "90",
                "91",
                "92",
                "93",
                "94",
                "95",
                "96",
                "97",
                "98",
                "99",
                "100",
                "101",
                "102",
                "103",
                "104",
                "105",
                "106",
                "107",
                "108",
                "109",
                "110",
                "111",
                "112",
                "113",
                "114",
                "115",
                "116",
                "117",
                "118",
                "119",
                "120",
                "121",
                "122",
                "123",
                "124",
                "125",
                "126",
                "127",
                "128",
                "129",
                "130",
                "131",
                "132",
                "133",
                "134",
                "135",
                "136",
                "137",
                "138",
                "139",
                "140",
                "141",
                "142",
                "143",
                "144",
                "145",
                "146",
                "147",
                "148",
                "149",
                "150",
                "151",
                "152",
                "153",
                "154",
                "155",
                "156",
                "157",
                "158",
                "159",
                "160",
                "161",
                "162",
                "163",
                "164",
                "165",
                "166",
                "167",
                "168",
                "169",
                "170",
                "171",
                "172",
                "173",
                "174",
                "175",
                "176",
                "177",
                "178",
                "179",
                "180",
                "181",
                "182",
                "183",
                "184",
                "185",
                "186",
                "187",
                "188",
                "189",
                "190",
                "191",
                "192",
                "193",
                "194",
                "195",
                "196",
                "197",
                "198",
                "199",
                "200",
                "201",
                "202",
                "203",
                "204",
                "205",
                "206",
                "207",
                "208",
                "209",
                "210",
                "211",
                "212",
                "213",
                "214",
                "215",
                "216",
                "217",
                "218",
                "219",
                "220",
                "221",
                "222",
                "223",
                "224",
                "225",
                "226",
                "227",
                "228",
                "229",
                "230",
                "231",
                "232",
                "233",
                "234",
                "235",
                "236",
                "237",
                "238",
                "239",
                "240",
                "241",
                "242",
                "243",
                "244",
                "245",
                "246",
                "247",
            ],

            // newTool: [],

            supplierIsSet: false,
            toolIsSet: false,
            countIsSet: false,

            id: "",
            name: "",
            price: "",

            totalPrice: 0,

            currentDate: new Date(),
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        formattedDate() {
            return moment(this.currentDate).format("MMM DD, YYYY");
        },

        // selectedSuppliersList() {console.log(this.selectedSuppliers)
        //     // return this.selectedSuppliers.map((supplier) => {
        //     //     return {
        //     //         id: supplier.id,
        //     //         text: supplier.text,
        //     //     };
        //     // });
        // },
    },

    methods: {
        async initialize() {
            this.getTools();
            this.getSellers();
        },

        clearData() {
            this.tools = [];
            this.totalPrice = 0;
        },

        async setIdForAction(id) {
            this.idForAction = id;
        },

        formattedPrice(amount) {
            return amount.toLocaleString("sw-TZ", {
                style: "currency",
                currency: "Tsh",
            });
        },

        // formattedDate(date) {
        //     // return moment(date).format("MMMM Do YYYY");
        //     return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        // },

        mySelectEvent(e, action) {
            if (action == "tool") {
                this.id = e.id;
                this.name = e.text;
                this.price = e.price;
                this.toolIsSet = true;
            } else if (action == "count") {
                this.countIsSet = true;
            } else if (action == "supplier") {
                // this.supplier = e.text;
                // this.supplierId = e.id;
                // this.supplierIsSet = true;
                // console.log(e)
            }

            if (this.toolIsSet && this.countIsSet) {
                this.buildInvoiceTools();
            }
        },

        myChangeEvent(e) {
            // console.log(e);
        },

        setSnackBarState() {
            this.$store.dispatch("ProcurementInvoiceModule/setSnackBarState");
        },

        setInvoiceGenerate() {
            this.$store.dispatch("ProcurementInvoiceModule/setInvoiceGenerate");
        },

        async buildInvoiceTools() {
            this.totalPrice = this.totalPrice + this.price * this.count;

            const newTool = {
                id: this.id,
                name: this.name,
                price: this.price * this.count,
                count: this.count,
            };

            this.tools.push(newTool);

            this.toolIsSet = false;
            this.countIsSet = false;

            this.tool = "";
            this.count = "";
        },

        async submitInvoice() {
            axios
                .post("/procurement/submitInvoice", {
                    sellers: this.selectedSuppliers,
                    // toolId: this.toolId,
                    total: this.totalPrice,
                    tools: this.tools,
                })
                .then((response) => {
                    // console.log(response.data)
                    this.clearData();
                    this.setInvoiceGenerate();
                    this.setSnackBarState();
                });
        },

        async getTools() {
            axios.get("/procurement/getTools").then((response) => {
                this.toolOptions = response.data.data;
                // this.showLoader = false;
                // console.log(response.data.data);
            });
        },

        async getSellers() {
            axios.get("/procurement/getSellers").then((response) => {
                this.supplierOptions = response.data.data;
                // console.log(response.data.data);
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
                    // console.log(response.data.data);
                });
        },

        async starredTools(id, data, column) {
            axios
                .post("/procurement/starredTools", {
                    id: id,
                    data: data,
                    column: column,
                })
                .then((response) => {
                    // console.log(response.data.data);
                });
        },

        async deleteTools() {
            axios
                .post("/procurement/deleteTools", {
                    id: this.idForAction,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // console.log(response.data.data);
                });
            // handle response here
        },

        setSnackBarState() {
            this.$store.dispatch("ProcurementInvoiceModule/setSnackBarState");
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
