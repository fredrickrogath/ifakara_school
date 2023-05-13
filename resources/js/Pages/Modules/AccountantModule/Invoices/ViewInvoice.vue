<template>
    <div class="pt-10">
        <div class="d-flex justify-content-between">
            <a @click="setInvoiceView()" class="btn text-lg-700">
                <strong class="text-danger" style="font-size: large"
                    ><i class="fe-arrow-left"></i>
                </strong>
            </a>

            <form @submit.prevent="acceptInvoice">
                <div class="d-flex justify-content-between my-1 mt-2">
                    <button
                        type="submit"
                        class="btn btn-success text-white btn-sm waves-effect waves-light"
                        v-if="!this.invoice.status"
                    >
                        Submit to financial
                    </button>

                    <button
                        type="submit"
                        class="btn btn-danger text-white btn-sm waves-effect waves-light"
                        v-else
                    >
                        Unsubmit to financial
                    </button>
                </div>
            </form>
        </div>

        <div class="col-12">
            <div class="card">

                <snackbar message="Task completed successfully"></snackbar>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <p>
                                    <b>Hello, {{ seller }}</b>
                                </p>
                                <small>Procumerement</small>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-end">
                                <p>
                                    <strong> Invoice id : </strong
                                    ><span>{{ getInvoiceId }}</span>
                                </p>
                                <p>
                                    <strong>Invoice Date : </strong>
                                    <span class="float-end">
                                        &nbsp;&nbsp;&nbsp;&nbsp; {{ formattedDate(this.invoice.created_at) }}</span
                                    >
                                </p>
                                <p>
                                    <strong>Invoice Status : </strong>
                                    <span class="float-end"
                                        >
                                        <span v-if="!this.invoice.status_from_financial" class="badge bg-danger"
                                            >Unpaid</span
                                        >

                                        <span v-else class="badge bg-success"
                                            >Paid</span
                                        >
                                        </span
                                    >
                                </p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-3">
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
                                <table class="table mt-4 table-centered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
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
                                            <template v-if="formattedData">
                                                <td>1</td>
                                                <td>
                                                    <b>{{ data.tool.name }}</b>
                                                    <br />
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
                                            </template>
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
                                <h4 class="text-primary">
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
                                <h3>
                                    {{
                                        formattedPrice(
                                            total - total * (18 / 100)
                                        )
                                    }}
                                </h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a
                                href="javascript:window.print()"
                                class="btn btn-primary waves-effect waves-light"
                                ><i class="mdi mdi-printer me-1"></i> Print</a
                            >
                            <a
                                href="#"
                                class="btn btn-info waves-effect waves-light"
                                >Submit</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</template>

<script>
import moment from "moment";
export default {
    mounted() {
        this.showLoader = true;

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                this.getInvoiceView();
                // console.log(e);
            }
        );
    },

    data() {
        return {
            showLoader: false,
            objectData: [],
            seller: "",
            supplier: [],
            invoice: [],
            total: 0,
            count: 0,
            id: null,
        };
    },
    methods: {
        setInvoiceView() {
            this.$store.dispatch(
                "AccountantInvoiceModule/setInvoiceView",
                null
            );
        },

        formattedDate(date) {
            return moment(date).format("MMMM Do YYYY");
            // return moment(date).format("MMMM Do YYYY, h:mm:ss a");
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
            this.objectData.splice(0, this.objectData.length);
        },

        async sellerName(invoice) {
            if (typeof invoice !== "undefined" && invoice !== null) {
                this.seller = invoice.seller.name;
                // this.supplier = invoice.seller;
            }
        },

        async getInvoiceView() {
            axios
                .post("/accountant/getInvoiceView", {
                    id: this.getInvoiceId,
                })
                .then((response) => {
                    this.showLoader = false;
                    this.totalPrice(response.data.data);
                    this.invoice = response.data.data;
                    this.sellerName(this.invoice);
                });
        },

        async invoiceFormation(data) {
            this.objectData.push({
                toolName: data.tool.name,
                toolPrice: data.tool.price,
                toolCount: data.count,
            });
            // console.log(this.objectData);
        },

        async acceptInvoice() {
            axios
                .post(
                    // "http://127.0.0.1:8001/api/accountant/invoiceFromSchool",
                    "/accountant/acceptInvoice",
                    {
                        id: this.invoice.id,
                        status: this.invoice.status,
                        // invoice: this.objectData,
                    }
                )
                .then((response) => {
                    this.showLoader = false;
                    // Clear objectData
                    console.log(response.data.data);
                    // console.log(this.objectData);
                });
        },
    },

    watch: {
        id(newVal, oldVal) {
            if (newVal !== null) {
                this.getInvoiceView();
            }
            console.log(
                `The message has changed from "${oldVal}" to "${newVal}"`
            );
        },
    },

    computed: {
        getInvoiceId() {
            this.id =
                this.$store.getters["AccountantInvoiceModule/getInvoiceId"];
            return this.$store.getters["AccountantInvoiceModule/getInvoiceId"];
        },

        formattedData() {
            return this.invoice.invoice_tool.map((data) => {
                return this.invoiceFormation(
                    data,
                    this.invoice.invoice_tool.length
                );
            });
        },
    },
};
</script>
