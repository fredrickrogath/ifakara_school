<template>
    <div class="pt-1">
        <div class="row">
            <!-- Right Sidebar -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar">
                            <div class="mail-list">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ml-3 font-15">My uploads</div>

                                    <v-icon type="button" data-bs-toggle="modal" data-bs-target="#custom-modal"
                                        class="ml-4 px-1 mt-1 mr-0 py-1" size="22" @click="">
                                        mdi-pen-plus
                                    </v-icon>
                                </div>

                                <hr class="bg-gray-200 mb-1 mt-1 mx-2" />

                                <a href="#" class="list-group-item border-0 mt-1 text-warning" :class="[
                                    getCurrentTab == 'home'
                                        ? 'text-warning'
                                        : '',
                                ]"><i class="mdi mdi-form-select font-18 align-middle me-2 pb-1"></i>All Documents
                                </a>
                                <a href="#" class="list-group-item border-0" :class="[
                                    getCurrentTab == 'starred'
                                        ? 'text-warning'
                                        : '',
                                ]"><i class="mdi mdi-star font-18 align-middle me-2 pb-1"></i>New uploads</a>
                                <a href="#" class="list-group-item border-0" :class="[
                                    getCurrentTab == 'deleted'
                                        ? 'text-warning'
                                        : '',
                                ]"><i class="mdi mdi-close-thick font-18 align-middle me-2 pb-1"></i>Broken & Lost
                                    Tools</a>
                                <a href="#" class="list-group-item border-0" :class="[
                                    getCurrentTab == 'deleted'
                                        ? 'text-warning'
                                        : '',
                                ]"><i class="mdi mdi-delete font-18 align-middle me-2 pb-1"></i>Trashed
                                    Documents</a>
                            </div>

                            <hr class="bg-gray-200 mx-2 mb-2 mt-2" />

                            <!-- <div class="mt-2 ml-3">
                                <h5>
                                    <span
                                        class="badge rounded-pill p-1 px-2 badge-soft-secondary"
                                        >TOOLS & EQUIPMENTS</span
                                    >
                                </h5>
                                <h6 class="text-uppercase mt-3">
                                    Unmatched price
                                </h6>
                                
                              
                            </div> -->
                        </div>
                       

                        <!-- <div class="clearfix"></div> -->
                    </div>
                </div>
                <!-- end card -->
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 text-center">
                                <h4>Table for all documents</h4>
                            </div>

                            <div class="col-4">
                                <form>
                                    <div class="mb-2">
                                        <label for="inputPassword2" class="visually-hidden">Search</label>
                                        <input type="search" class="form-control" id="inputPassword2"
                                            placeholder="Search...">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

             
            </div>


        </div>

            <!-- Modal -->
    <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">New Upload</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Title</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                      
                        <div class="mb-3">
                            <label for="company" class="form-label">your upload</label>
                            <input type="file" class="form-control" id="company" placeholder="Enter location">

                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light" onclick="Custombox.close();">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

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
