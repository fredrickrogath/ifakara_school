<template>
    <div class="pt-1">
        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-blue rounded">
                                    <i
                                        class="fe-aperture avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        $<span data-plugin="counterup"
                                            >12,145</span
                                        >
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Income status
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-success rounded">
                                    <i
                                        class="fe-shopping-cart avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup"
                                            >1576</span
                                        >
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        January's Sales
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-primary rounded">
                                    <i
                                        class="fe-bar-chart-2 avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        $<span data-plugin="counterup"
                                            >8947</span
                                        >
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Payouts
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-info rounded">
                                    <i
                                        class="fe-cpu avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">178</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Available Stores
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->
        </div>

        <!-- end row -->
    </div>
</template>

<script>
export default {
    mounted() {
        let recaptchaScript = document.createElement("script");
        recaptchaScript.setAttribute(
            "src",
            "assets/js/pages/ecommerce-dashboard.init.js"
        );
        document.head.appendChild(recaptchaScript);

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log(e);
            }
        );
    },

    data() {
        return { echo: null };
    },
    computed: {
        //Add computed properties
    },
    watch: {
        //Add watchers...
    },
    methods: {
        //Add methods...
    },
};
</script>
