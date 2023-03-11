<template>
    <div class="pt-1">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-blue rounded">
                                    <i class="fe-aperture avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup">12,145</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Tools & Items</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-success rounded">
                                    <i class="fe-shopping-cart avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup">1576</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Invoices</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-warning rounded">
                                    <i class="fe-bar-chart-2 avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup">8947</span></h3>
                                    <p class="text-muted mb-1 text-truncate">General</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-info rounded">
                                    <i class="fe-cpu avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1"><span data-plugin="counterup">178</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Available Stores</p>
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
                console.log(e);
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
