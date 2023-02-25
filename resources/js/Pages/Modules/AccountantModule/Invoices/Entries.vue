<template>
    <div>
        <v-dialog v-model="dialog" width="auto">
            <div class="mt-1">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Logo & title -->
                                <div class="clearfix">
                                    <div class="float-start">
                                        <div class="auth-logo">
                                            <div class="logo logo-dark">
                                                <span class="logo-lg">
                                                    <img
                                                        src="assets/images/logo-dark.png"
                                                        alt=""
                                                        height="22"
                                                    />
                                                </span>
                                            </div>

                                            <div class="logo logo-light">
                                                <span class="logo-lg">
                                                    <img
                                                        src="assets/images/logo-light.png"
                                                        alt=""
                                                        height="22"
                                                    />
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-end">
                                        <h4 class="m-0 d-print-none">
                                            Invoice
                                        </h4>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="col-md-6">
                                        <div class="mt-3">
                                            <p><b>Hello, Stanley Jones</b></p>
                                            <p class="text-muted">
                                                Thanks a lot because you keep
                                                purchasing our products. Our
                                                company promises to provide high
                                                quality products for you as well
                                                as outstanding customer service
                                                for every transaction.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-4 offset-md-2">
                                        <div class="mt-3 float-end">
                                            <p>
                                                <strong>Order Date : </strong>
                                                <span class="float-end">
                                                    &nbsp;&nbsp;&nbsp;&nbsp; Jan
                                                    17, 2016</span
                                                >
                                            </p>
                                            <p>
                                                <strong>Order Status : </strong>
                                                <span class="float-end"
                                                    ><span
                                                        class="badge bg-danger"
                                                        >Unpaid</span
                                                    ></span
                                                >
                                            </p>
                                            <p>
                                                <strong>Order No. : </strong>
                                                <span class="float-end"
                                                    >000028
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <h6>Billing Address</h6>
                                        <address>
                                            Stanley Jones<br />
                                            795 Folsom Ave, Suite 600<br />
                                            San Francisco, CA 94107<br />
                                            <abbr title="Phone">P:</abbr> (123)
                                            456-7890
                                        </address>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-sm-6">
                                        <h6>Shipping Address</h6>
                                        <address>
                                            Stanley Jones<br />
                                            795 Folsom Ave, Suite 600<br />
                                            San Francisco, CA 94107<br />
                                            <abbr title="Phone">P:</abbr> (123)
                                            456-7890
                                        </address>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table
                                                class="table mt-4 table-centered"
                                            >
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Item</th>
                                                        <th style="width: 10%">
                                                            Hours
                                                        </th>
                                                        <th style="width: 10%">
                                                            Hours Rate
                                                        </th>
                                                        <th
                                                            style="width: 10%"
                                                            class="text-end"
                                                        >
                                                            Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <b>Web Design</b>
                                                            <br />
                                                            2 Pages static
                                                            website - my website
                                                        </td>
                                                        <td>22</td>
                                                        <td>$30</td>
                                                        <td class="text-end">
                                                            $660.00
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <b
                                                                >Software
                                                                Development</b
                                                            >
                                                            <br />
                                                            Invoice editor
                                                            software - AB'c
                                                            Software
                                                        </td>
                                                        <td>112.5</td>
                                                        <td>$35</td>
                                                        <td class="text-end">
                                                            $3937.50
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
                                            <h6 class="text-muted">Notes:</h6>

                                            <small class="text-muted">
                                                All accounts are to be paid
                                                within 7 days from receipt of
                                                invoice. To be paid by cheque or
                                                credit card or direct payment
                                                online. If account is not paid
                                                within 7 days the credits
                                                details supplied as confirmation
                                                of work undertaken will be
                                                charged the agreed quoted fee
                                                noted above.
                                            </small>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-sm-6">
                                        <div class="float-end">
                                            <p>
                                                <b>Sub-total:</b>
                                                <span class="float-end"
                                                    >$4597.50</span
                                                >
                                            </p>
                                            <p>
                                                <b>Discount (10%):</b>
                                                <span class="float-end">
                                                    &nbsp;&nbsp;&nbsp;
                                                    $459.75</span
                                                >
                                            </p>
                                            <h3>$4137.75 USD</h3>
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
                                            ><i
                                                class="mdi mdi-printer me-1"
                                            ></i>
                                            Print</a
                                        >
                                        <a
                                            href="#"
                                            class="btn btn-info waves-effect waves-light"
                                            >Submit</a
                                        >
                                        <a
                                            href="#"
                                            @click="dialog = false"
                                            class="btn btn-danger waves-effect waves-light"
                                            >Cancel</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- container -->
        </v-dialog>

        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">Name</th>
                        <th class="border-0">Last Modified</th>
                        <th class="border-0">Size</th>
                        <th class="border-0">Owner</th>
                        <th class="border-0">Members</th>
                        <th class="border-0" style="width: 80px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="i in 8" :key="i">
                        <td>
                            <i data-feather="folder" class="icon-dual"></i>
                            <span class="ms-2 fw-semibold"
                                ><a
                                    href="javascript: void(0);"
                                    class="text-reset"
                                    >App Design & Development</a
                                ></span
                            >
                        </td>
                        <td>
                            <p class="mb-0">Jan 03, 2020</p>
                            <span class="font-12">by Andrew</span>
                        </td>
                        <td>128 MB</td>
                        <td>Danielle Thompson</td>
                        <td id="tooltips-container">
                            <div class="avatar-group">
                                <a
                                    href="javascript: void(0);"
                                    class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Mat Helme"
                                >
                                    <img
                                        src="assets/images/users/user-1.jpg"
                                        class="rounded-circle avatar-xs"
                                        alt="friend"
                                    />
                                </a>

                                <a
                                    href="javascript: void(0);"
                                    class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Michael Zenaty"
                                >
                                    <img
                                        src="assets/images/users/user-2.jpg"
                                        class="rounded-circle avatar-xs"
                                        alt="friend"
                                    />
                                </a>

                                <a
                                    href="javascript: void(0);"
                                    class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="James Anderson"
                                >
                                    <img
                                        src="assets/images/users/user-3.jpg"
                                        class="rounded-circle avatar-xs"
                                        alt="friend"
                                    />
                                </a>

                                <a
                                    href="javascript: void(0);"
                                    class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Username"
                                >
                                    <img
                                        src="assets/images/users/user-5.jpg"
                                        class="rounded-circle avatar-xs"
                                        alt="friend"
                                    />
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <a
                                    href="javascript: void(0);"
                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    ><i class="mdi mdi-dots-horizontal"></i
                                ></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a
                                        class="dropdown-item"
                                        href="#"
                                        @click="dialog = true"
                                        ><i
                                            class="mdi mdi-eye me-2 text-muted vertical-middle"
                                        ></i
                                        >Open</a
                                    >
                                    <!-- <a class="dropdown-item" href="#"
                                        ><i
                                            class="mdi mdi-link me-2 text-muted vertical-middle"
                                        ></i
                                        >Get Sharable Link</a
                                    >
                                    <a class="dropdown-item" href="#"
                                        ><i
                                            class="mdi mdi-pencil me-2 text-muted vertical-middle"
                                        ></i
                                        >Rename</a
                                    >
                                    <a class="dropdown-item" href="#"
                                        ><i
                                            class="mdi mdi-download me-2 text-muted vertical-middle"
                                        ></i
                                        >Download</a
                                    >
                                    <a class="dropdown-item" href="#"
                                        ><i
                                            class="mdi mdi-delete me-2 text-muted vertical-middle"
                                        ></i
                                        >Remove</a
                                    > -->
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dialog: false,
        };
    },
};
</script>
