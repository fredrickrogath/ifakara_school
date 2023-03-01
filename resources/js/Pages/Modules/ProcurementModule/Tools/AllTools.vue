<template>
    <!-- <v-col>
        <v-row> -->
    <div>

        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12">
            <!-- <v-card flat :dark="isDark"> -->
            <!-- <v-card elevation="0" data-app> -->
            <v-card-title class="px-0 pt-0">
                Tools & Equipments
                <v-spacer></v-spacer>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search"
                    single-line
                    hide-details
                ></v-text-field>
            </v-card-title>
            <!-- {{ $page.props.posts }} -->
            <v-data-table
                mobile-breakpoint="0"
                :headers="headers"
                :items="tools"
                :search="search"
                class="bg-red-900"
            >
                <template v-slot:item.id="{ item }">
                    <span class="text-gray-600">{{ item.id }}</span>
                </template>

                <template v-slot:item.name="{ item }">
                    <span class="text-gray-600">{{
                        item.name
                    }}</span>
                </template>

                <template v-slot:item.price="{ item }">
                    <span class="text-gray-600">{{ formattedPrice(item.price) }}</span>
                </template>

                <template v-slot:item.count="{ item }">
                    <span class="text-gray-600">{{
                        item.count
                    }}</span>
                </template>

                <template v-slot:item.description="{ item }">
                    <span class="text-gray-600">{{ item.description }}</span>
                </template>

                <template v-slot:item.created_at="{ item }">
                    <span class="text-gray-600">{{
                        formattedDate(item.created_at)
                    }}</span>
                </template>

                <template v-slot:item.updated_at="{ item }">
                    <span class="text-gray-600">{{
                        formattedDate(item.updated_at)
                    }}</span>
                </template>
            </v-data-table>
            <!-- </v-card> -->
            <!-- </v-card> -->
        </v-col>
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
import moment from "moment";
import Spinner from "../../.././Components/SpinnerLoader.vue";
export default {
    components: {
        Spinner,
    },

    props: {
        // postsData: {
        // type: Number,
        // default: [],
        // default(rawProps) {
        //     return { message: "hello" };
        // },
        // DATA TYPES
        // String
        // Number
        // Boolean
        // Array
        // Object
        // Date
        // Function
        // Symbol
        // disabled: [Boolean, Number]
        // },
    },

    mounted() {
        this.showLoader = false;
        // this.getLegerEntries();
        this.get_tools();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.get_tools();
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
                    text: "Code",
                    align: "start",
                    sortable: false,
                    value: "id",
                },
                {
                    text: "Name",
                    value: "name",
                },
                { text: "Price", value: "price", align: "center" },
                { text: "Count", value: "count" },
                { text: "Date", value: "created_at" },
                { text: "Last Update", value: "updated_at" },

                // { text: "Iron (%)", value: "iron" },
            ],
            // posts: this.$store.getters["getPosts"],
            // posts: null,
            tools: [],
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },
    },

    methods: {
        formattedPrice(amount) {
            return amount.toLocaleString("sw-TZ", {
                style: "currency",
                currency: "Tsh",
            });
        },

        formattedDate(date) {
            return moment(date).format("MMMM Do YYYY");
            // return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        get_tools() {
            axios.get("/procurement/get_tools").then((response) => {
                this.tools = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data)
            });
        },
    },
};
</script>
