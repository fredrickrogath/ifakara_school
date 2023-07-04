<template>
    <div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="custom-modal"
            tabindex="-1"
            role="dialog"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <form @submit.prevent="upload">
                            <div class="mb-3">
                                <label for="name" class="form-label"
                                    >Title</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    v-model="title"
                                    placeholder="Enter name"
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    for="exampleInputEmail1"
                                    class="form-label"
                                    >Description</label
                                >
                                <textarea
                                    v-model="description"
                                    id=""
                                    cols="30"
                                    rows="10"
                                    class="form-control"
                                ></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="company" class="form-label"
                                    >your upload</label
                                >
                                <input
                                    type="file"
                                    ref="file"
                                    name="file"
                                    @change="onFileChange"
                                    class="form-control"
                                    id="company"
                                />
                            </div>

                            <div class="text-end">
                                <button
                                    type="submit"
                                    data-bs-dismiss="modal"
                                    class="btn btn-success waves-effect waves-light"
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="row">
            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="card h-screen">
                    
                    <div class="card-body pt-1">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar">
                            <div class="mail-list">
                                <div
                                    class="d-flex justify-content-between align-items-center"
                                >
                                    <div class="ml-3 font-15">My uploads</div>

                                    <v-icon
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#custom-modal"
                                        class="ml-4 px-1 mt-1 mr-0 py-1"
                                        size="22"
                                        @click=""
                                    >
                                        mdi-pen-plus
                                    </v-icon>
                                </div>

                                <hr class="bg-gray-200 mb-1 mt-1 mx-2" />

                                <a
                                    href="#"
                                    class="list-group-item border-0 mt-1"
                                    @click="setTab('all')"
                                    :class="[
                                        getCurrentTab == 'all'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-form-select font-18 align-middle me-2 pb-1"
                                    ></i
                                    >All Documents
                                </a>
                                <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setTab('new')"
                                    :class="[
                                        getCurrentTab == 'new'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-star font-18 align-middle me-2 pb-1"
                                    ></i
                                    >New uploads</a
                                >
                                <a
                                    href="#"
                                    class="list-group-item border-0"
                                    @click="setTab('deleted')"
                                    :class="[
                                        getCurrentTab == 'deleted'
                                            ? 'text-warning'
                                            : '',
                                    ]"
                                    ><i
                                        class="mdi mdi-delete font-18 align-middle me-2 pb-1"
                                    ></i
                                    >Trashed Documents</a
                                >
                            </div>

                            <hr class="bg-gray-200 mx-2 mb-2 mt-2" />
                        </div>

                        <!-- <div class="clearfix"></div> -->

                        <div class="inbox-rightbar pt-1 px-0">
                            <div class="bg-white h-screen">
                                <all-uploads v-show="getCurrentTab == 'all'"></all-uploads>
                                <new-uploads v-show="getCurrentTab == 'new'"></new-uploads>
                                <trashed-uploads v-show="getCurrentTab == 'deleted'"></trashed-uploads>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>

        <!-- end row -->
    </div>
</template>

<script>
import AllUploads from "./Uploads/AllUploads.vue";
import NewUploads from "./Uploads/NewUploads.vue";
import TrashedUploads from "./Uploads/TrashedUploads.vue";

export default {
    components: {
        AllUploads,
        NewUploads,
        TrashedUploads,
    },
    mounted() {
        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log(e);
            }
        );
    },

    data() {
        return {
            echo: null,
            file: null,

            title: "",
            description: "",
        };
    },
    computed: {
        //Add computed properties
        getCurrentTab() {
            return this.$store.getters["AcademicUploadModule/getTab"];
        },
    },
    watch: {
        //Add watchers...
    },
    methods: {
        //Add methods...
        setTab(tab) {
            this.$store.dispatch("AcademicUploadModule/setTab", tab);
        },

        onFileChange(event) {
            this.file = event.target.files[0];
        },
        upload() {
            let formData = new FormData();
            formData.append("file", this.file);
            formData.append("title", this.title);
            formData.append("description", this.description);
            axios.post("/academic/upload", formData).then((response) => {
                this.$refs.file.value = "";
                this.title = "";
                this.description = "";
            });
        },
    },
};
</script>

