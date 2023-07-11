<template>
    <div class="h-screen bg-white card">
        <div class="col-12  card p-0 m-0 pt-1">
            <div class="">
                <div class="row">
                    <div class="col-8 text-center">
                        <span class="text-xl">Table for all documents</span>
                    </div>

                    <div class="col-4">
                        <form>
                            <div class="mb-2">
                                <label
                                    for="inputPassword2"
                                    class="visually-hidden"
                                    >Search</label
                                >
                                <input
                                    v-model="search"
                                    type="search"
                                    class="form-control"
                                    id="inputPassword2"
                                    placeholder="Search..."
                                />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <v-data-table
                mobile-breakpoint="0"
                :headers="headers"
                :items="uploads"
                :search="search"
                :items-per-page="11"
                class=""
            >
                <template v-slot:item.title="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{ item.title }}</span>
                </template>

                <template v-slot:item.name="{ item }">{{ item.name }}
                    <span class="text-gray-600 italic font-semibold">{{ item.name }}</span>
                </template>

                <template v-slot:item.description="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{ item.description }}</span>
                </template>

                <template v-slot:item.action="{ item }">
                    <span class="text-gray-600 italic font-semibold">
                        <v-icon
                            size="22"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#warning-alert-modal"
                            @click="setIdForAction(item.id)"
                        >
                            mdi-delete
                        </v-icon>
                    </span>
                </template>

                <template v-slot:item.view="{ item }">
                    <a class="text-gray-600 italic font-semibold" :href="storagePath + item.path" target="_blank">
                        <v-icon size="22" @click=""> mdi-eye </v-icon>
                    </a>
                </template>

                <template v-slot:item.user.name="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{ item.user.name }}</span>
                </template>

                <template v-slot:item.amount="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{
                        formattedPrice(item.amount)
                    }}</span>
                </template>

                <template v-slot:item.narration="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{ item.narration }}</span>
                </template>

                <template v-slot:item.created_at="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{
                        formattedDate(item.created_at)
                    }}</span>
                </template>
            </v-data-table>
        </div>
    </div>
</template>
<script>
import moment from "moment";
export default {
    mounted() {
        // this.showLoader = true;
        this.getUploads();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.getUploads();
            }
        );
    },

    data() {
        return {
            search: "",
            headers: [
                {
                    text: "Title",
                    align: "start",
                    sortable: false,
                    value: "title",
                },
                // {
                //     text: "Name of document",
                //     value: "name",
                // },
                // { text: "Made For", value: "user.name", align: "center" },
                // { text: "Amount", value: "amount" },
                { text: "Description", value: "description" },
                { text: "Date", value: "created_at" },

                { text: "View", value: "view" },
                // { text: "Action", value: "action" },
            ],
            // posts: this.$store.getters["getPosts"],
            // posts: null,
            uploads: [],

            storagePath: window.location.origin + "/storage/",
        };
    },

    methods: {
        formattedDate(date) {
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        async setIdForAction(id) {
            this.idForAction = id;
        },

        getUploads() {
            axios.get("/head/getProcurementUploads").then((response) => {
                this.uploads = response.data.data;
                // this.showLoader = false;
                // console.log(response.data.data);
            });
        },

        async deleteUpload() {
            axios
                .post("/head/getProcurementUploads", {
                    id: this.idForAction,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    // console.log(response.data.data);
                });
            // handle response here
        },
    },
};
</script>
