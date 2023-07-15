<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12">
            <snack-bar
                message="The Requsition has sent successfully to accountant for futher process"
            ></snack-bar>

            <!-- <form @submit.prevent="addStudent"> -->
            <div class="d-flex justify-content-between py-1">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Name</label>
                    <input
                        type="text"
                        id="simpleinput"
                        class="form-control form-control-sm"
                        v-model="name"
                    />
                </div>

                <div class="mb-2">
                    <label for="simpleinput" class="form-label">Amount</label>
                    <input
                        type="text"
                        id="simpleinput"
                        class="form-control form-control-sm"
                        v-model="price"
                    />
                </div>

                <div class="mb-2">
                    <label for="simpleinput" class="form-label"
                        >Description</label
                    >
                    <input
                        type="text"
                        id="simpleinput"
                        class="form-control form-control-sm"
                        v-model="description"
                    />
                </div>

                <div class="my-auto">
                    <div class="button-list mb-sm-0 mt-2">
                        <button
                            v-if="!showLoader"
                            class="btn btn-sm btn-success text-white px-4"
                            type="submit"
                            @click="buildInvoiceItems"
                        >
                            Add
                        </button>
                        <button
                            v-else
                            class="btn btn-sm btn-success"
                            type="button"
                            disabled
                        >
                            <span
                                class="spinner-border spinner-border-sm me-1"
                                role="status"
                                aria-hidden="true"
                            ></span>
                            Loading...
                        </button>
                    </div>
                </div>
            </div>
            <!-- </form> -->

            <div class="row">
                <div class="col-md-6">
                    <div class="">
                        <p>
                            <!-- <b>Suppliers : {{ selectedSuppliers }}</b> -->
                            <!-- <b class="d-none">Suppliers : {{ selectedSuppliersList }}</b> -->
                        </p>
                        <p class="">
                            We appreciate your continued trust in our invoice
                            management services. Our team is committed to
                            ensuring smooth and accurate handling of all payment
                            transactions and financial matters within the
                            organization.
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
                :items="items"
                item-key="name"
                :search="search"
                class="elevation-1"
                dense
                :items-per-page="7"
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
                                        @click="removeItem(items[idx])"
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


                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'price'"
                                    >{{ formattedPrice(parseFloat(item[header.value])) }}</span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'name'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'description'"
                                    >{{ item[header.value] }}</span
                                >
                                

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
        // this.initialize();

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
                { text: "Description", value: "description" },
                { text: "Action", value: "action" },
            ],

            items: [],
            name: "",
            price: "",
            description: "",
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
            this.items = [];
            this.totalPrice = 0;

            this.name = "";
            this.price = "";
            this.description = "";
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

        // mySelectEvent(e, action) {
        //     if (action == "tool") {
        //         this.id = e.id;
        //         this.name = e.text;
        //         this.price = e.price;
        //         this.toolIsSet = true;
        //     } else if (action == "count") {
        //         this.countIsSet = true;
        //     } else if (action == "supplier") {
        //         // this.supplier = e.text;
        //         // this.supplierId = e.id;
        //         // this.supplierIsSet = true;
        //         // console.log(e)
        //     }

        //     if (this.toolIsSet && this.countIsSet) {
        //         this.buildInvoiceTools();
        //     }
        // },

        // myChangeEvent(e) {
        //     // console.log(e);
        // },

        setSnackBarState() {
            this.$store.dispatch("ProcurementInvoiceModule/setSnackBarState");
        },

        setInvoiceGenerate() {
            this.$store.dispatch("ProcurementInvoiceModule/setInvoiceGenerate");
        },

        removeItem(item) {
            const index = this.items.indexOf(item);
            if (index !== -1) {
                this.items.splice(index, 1);
                this.totalPrice -= item.price;
            }
        },

        // removeItem(index) {
        //     const index = this.items.indexOf(item);
        //     // if (index !== -1) {
        //     //   this.items.splice(index, 1);
        //     // }
        //     console.log(index);
        //     // this.items.splice(index, 1);
        // },

        async buildInvoiceItems() {
            // console.log(
            //     "hello : " +
            //         this.name +
            //         " : " +
            //         this.price +
            //         " : " +
            //         this.description
            // );
            // this.totalPrice = this.totalPrice + this.price * this.count;

            const newItem = {
                // id: this.id,
                name: this.name,
                price: this.price,
                description: this.description,
            };

            this.totalPrice += parseFloat(this.price);

            this.items.push(newItem);

            // this.toolIsSet = false;
            // this.countIsSet = false;

            // this.tool = "";
            // this.count = "";
        },

        async submitInvoice() {
            axios
                .post("/accountant/createInvoice", {
                    items: this.items,
                    total: this.totalPrice,
                })
                .then((response) => {
                    // console.log(response.data.data)
                    this.clearData();
                    this.setInvoiceGenerate();
                    this.setSnackBarState();
                });
        },

        // async getTools() {
        //     axios.get("/procurement/getTools").then((response) => {
        //         this.toolOptions = response.data.data;
        //         // this.showLoader = false;
        //         // console.log(response.data.data);
        //     });
        // },

        // async getSellers() {
        //     axios.get("/procurement/getSellers").then((response) => {
        //         this.supplierOptions = response.data.data;
        //         // console.log(response.data.data);
        //     });
        // },

        // async updateTools(id, column, data) {
        //     axios
        //         .post("/procurement/updateTools", {
        //             id: id,
        //             data: data,
        //             column: column,
        //         })
        //         .then((response) => {
        //             // console.log(response.data.data);
        //         });
        // },

        // async starredTools(id, data, column) {
        //     axios
        //         .post("/procurement/starredTools", {
        //             id: id,
        //             data: data,
        //             column: column,
        //         })
        //         .then((response) => {
        //             // console.log(response.data.data);
        //         });
        // },

        // async deleteTools() {
        //     axios
        //         .post("/procurement/deleteTools", {
        //             id: this.idForAction,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             // console.log(response.data.data);
        //         });
        //     // handle response here
        // },

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
