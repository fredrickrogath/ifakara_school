<template>
    <div class="pt-10">
        <div class="d-flex justify-content-between">

            <a @click="setInvoiceView()" class="btn text-lg-700">
            <strong class="text-danger" style="font-size: large;"><i class="fe-arrow-left"></i> </strong> 
            </a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Logo & title -->
                    <div class="clearfix">

                        <!-- <div class="float-end">
                            <h4 class="m-0 d-print-none">   Invoice id : {{ getInvoiceId }}</h4>
                        </div> -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <p><b>Hello, Stanley Joonee</b></p>
                                <small>Procumerement</small>

                            </div>

                        </div><!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-end">
                                <p><strong> Invoice id :</strong><span>{{ getInvoiceId }}</span></p>
                                <p><strong>Invoice Date : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp;&nbsp; Jan
                                        17,
                                        2016</span></p>
                                <p><strong>Invoice Status : </strong> <span class="float-end"><span
                                            class="badge bg-danger">Unpaid</span></span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h6>Invoice Address</h6>
                            <address>
                                Procumerement<br>
                                Diocese of Ifakara Cathedral<br>
                                Ifakara Morogoro <br>
                                Tanzania<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div> <!-- end col -->
                        <!-- end col -->
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h6>Invoice Address</h6>
                            <address>
                                Accountant<br>
                                Diocese of Ifakara Cathedral<br>
                                Ifakara Morogoro <br>
                                Tanzania<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div> <!-- end col -->
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
                                            <th style="width: 10%" class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <b>Web Design</b> <br />
                                                2 Pages static website - my website
                                            </td>
                                            <td>22</td>
                                            <td>$30</td>
                                            <td class="text-end">$660.00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <b>Software Development</b> <br />
                                                Invoice editor software - AB'c Software
                                            </td>
                                            <td>112.5</td>
                                            <td>$35</td>
                                            <td class="text-end">$3937.50</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-5">
                                <h3 class="text-primary">Total Amount of the Tools & Items</h3>
<!-- 
                                <small class="text-muted">
                                    All accounts are to be paid within 7 days from receipt of
                                    invoice. To be paid by cheque or credit card or direct payment
                                    online. If account is not paid within 7 days the credits details
                                    supplied as confirmation of work undertaken will be charged the
                                    agreed quoted fee noted above.
                                </small> -->
                            </div>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-end">
                                <p><b>Sub-total:</b> <span class="float-end">$4597.50</span></p>
                                <p><b>Discount (10%):</b> <span class="float-end"> &nbsp;&nbsp;&nbsp; $459.75</span></p>
                                <h3>$4137.75 USD</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                    class="mdi mdi-printer me-1"></i> Print</a>
                            <a href="#" class="btn btn-info waves-effect waves-light">Submit</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>
</template>

<script>
export default {
    methods: {
        setInvoiceView() {
            this.$store.dispatch("ProcurementInvoiceModule/setInvoiceView", null);
        },
    },

    computed: {
        getInvoiceId() {
            return this.$store.getters["ProcurementInvoiceModule/getInvoiceId"];
        },
    },
}
</script>
