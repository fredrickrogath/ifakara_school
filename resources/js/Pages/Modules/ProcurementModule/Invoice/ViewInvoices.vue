<template>
    <div class="pt-2 h-screen bg-white" style="overflow-y: auto">
        <snackbar message="Task completed successfully"></snackbar>

        <div class="d-flex justify-content-between">
            <a @click="setInvoiceView()" class="btn text-lg-700">
                <strong class="" style="font-size: large"
                    ><i class="fe-arrow-left"></i>
                </strong>
            </a>
        </div>
        <div class="col-12">
            <div class="px-1">
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-0">
                                <!-- <strong>Procumerement</strong> -->
                                <span
                                        v-for="(seller, index) in invoice.sellers"
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
                                                <strong>Supplier {{ index + 1 }} : </strong>
                                                    <span
                                                        class="seller-name uppercase"
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
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-0 float-end d-flex flex-col">
                                <span>
                                    <strong> Invoice id : </strong
                                    ><span>{{ getInvoiceId }}</span>
                                </span>
                                <span>
                                    <strong>Invoice Date:</strong>
                                    <span class="float-end">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ currentDate | formatDate }}
                                    </span>
                                </span>

                                <span>
                                    <strong>Invoice Status : </strong>

                                    <span
                                        v-if="
                                            !this.invoice.status_from_accountant
                                        "
                                        class="badge bg-danger"
                                        >Unforwarded</span 
                                    >

                                    <div v-else class="badge bg-success">
                                        Forwarded
                                    </div>
                                </span>

                                <span>
                                    <strong>Invoice Status : </strong>

                                    <span
                                        v-if="
                                            !this.invoice.status_from_financial_accountant
                                        "
                                        class="badge bg-danger"
                                        >Unpaid</span 
                                    >

                                    <div v-else class="badge bg-success">
                                        Paid
                                    </div>
                                </span>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-0">
                        <div class="col-sm-6">
                            <h6>Invoice Address</h6>
                            <address>
                                Procumerement<br />
                                Diocese of Ifakara Cathedral<br />
                                Ifakara Morogoro <br />
                                Tanzania<br />
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div>
                        <!-- end col -->
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-0 table-centered">
                                    <thead>
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th>Tool&Item</th>
                                            <th style="width: 10%">Quantity</th>
                                            <th style="width: 10%">Amount</th>
                                            <th
                                                style="width: 10%"
                                                class="text-end"
                                            >
                                                Total
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="data in invoice.invoice_tool"
                                            :key="data.id"
                                        >
                                            <!-- <td>1</td> -->
                                            <td>
                                                <b>{{ data.tool.name }}</b>
                                                <br />
                                                <!-- 2 Pages static website - my
                                                website -->
                                            </td>
                                            <td>{{ data.count }}</td>
                                            <td>
                                                {{
                                                    formattedPrice(
                                                        data.tool.price
                                                    )
                                                }}
                                            </td>
                                            <td class="text-end">
                                                {{
                                                    formattedPrice(
                                                        data.count *
                                                               data.tool.price
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-5">
                                <h4 class="">
                                    Total Amount of the Tools & Items
                                </h4>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-end">
                                <p>
                                    <b>Sub-total:</b>
                                    <span class="float-end">{{
                                        formattedPrice(total)
                                    }}</span>
                                </p>
                                <p>
                                    <b>Discount (18%):</b>
                                    <span class="float-end">
                                        &nbsp;&nbsp;&nbsp;
                                        {{
                                            formattedPrice(total * (18 / 100))
                                        }}</span
                                    >
                                </p>
                                <h4 class="float-end">
                                    {{
                                        formattedPrice(
                                            total - total * (18 / 100)
                                        )
                                    }}
                                </h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</template>

<script>
import moment from "moment";
import Snackbar from "../../.././Components/SnackBar.vue";
import SellerProfile from "../../../Components/SellerProfile.vue";

export default {
    components: {
        Snackbar,
        SellerProfile,
    },

    mounted() {
        this.showLoader = true;
    },

    data() {
        return {
            showLoader: false,
            seller: "",
            invoice: [],
            total: 0,
            id: null,
            sellerInfo: [],
            currentDate: new Date(),
        };
    },

    filters: {
        formatDate(date) {
            return moment(date).format("MMM DD, YYYY");
        },
    },

    methods: {
        setInvoiceView() {
            this.$store.dispatch(
                "ProcurementInvoiceModule/setInvoiceView",
                null
            );
        },

        formattedPrice(amount) {
            return amount.toLocaleString("sw-TZ", {
                style: "currency",
                currency: "Tsh",
            });
        },

        totalPrice(invoice) {
            this.total = invoice.invoice_tool.reduce((total, item) => {
                return total + item.tool.price * item.count;
            }, 0);
        },

        // async sellerName(invoice) {
        //     if (typeof invoice !== "undefined" && invoice !== null) {
        //         this.seller = invoice.seller.name;
        //     }
        // },

        getSellerProfile(seller) {
            this.sellerInfo = seller
        },

        async getInvoiceView() {
            axios
                .post("/procurement/getInvoiceView", {
                    id: this.getInvoiceId,
                })
                .then((response) => {
                    this.showLoader = false;
                    this.totalPrice(response.data.data);
                    this.invoice = response.data.data;
                    // console.log(response.data.data);
                    // this.sellerName(this.invoice);
                });
        },
    },

    watch: {
        id(newVal, oldVal) {
            if (newVal !== null) {
                this.getInvoiceView();
            }
            // console.log(
            //     `The message has changed from "${oldVal}" to "${newVal}"`
            // );
        },
    },

    computed: {
        getInvoiceId() {
            this.id =
                this.$store.getters["ProcurementInvoiceModule/getInvoiceId"];
            return this.$store.getters["ProcurementInvoiceModule/getInvoiceId"];
        },
    },
};
</script>
