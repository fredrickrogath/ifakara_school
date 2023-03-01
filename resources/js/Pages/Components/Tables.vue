<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <spinner v-if="showLoader"></spinner>

        <v-col v-else sm="12" md="12">
            <!-- <v-card flat :dark="isDark"> -->
            <!-- <v-card elevation="0" data-app> -->
            <v-card-title class="px-1 pt-0">
                Transaction Entries
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
                :items="legerEntries"
                :search="search"
                class="bg-red-900"
            >
                <template v-slot:item.id="{ item }">
                    <span class="text-gray-600">{{ item.id }}</span>
                </template>

                <template v-slot:item.chart_of_account.account_type="{ item }">
                    <span class="text-gray-600">{{
                        item.chart_of_account.account_type
                    }}</span>
                </template>

                <template v-slot:item.user.name="{ item }">
                    <span class="text-gray-600">{{ item.user.name }}</span>
                </template>

                <template v-slot:item.amount="{ item }">
                    <span class="text-gray-600">{{ formattedPrice(item.amount) }}</span>
                </template>

                <template v-slot:item.narration="{ item }">
                    <span class="text-gray-600">{{ item.narration }}</span>
                </template>

                <template v-slot:item.created_at="{ item }">
                    <span class="text-gray-600">{{
                        formattedDate(item.created_at)
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
import Spinner from "./SpinnerLoader.vue";
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
        this.showLoader = true;
        this.getLegerEntries();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.getLegerEntries();
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
                    text: "Transaction Type",
                    value: "chart_of_account.account_type",
                },
                { text: "Made For", value: "user.name", align: "center" },
                { text: "Amount", value: "amount" },
                { text: "Narration", value: "narration" },
                { text: "Date", value: "created_at" },

                // { text: "Iron (%)", value: "iron" },
            ],
            // posts: this.$store.getters["getPosts"],
            // posts: null,
            legerEntries: [],
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
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        getLegerEntries() {
            // console.log("Loading next page");
            axios.get("/accountant/getLegerEntries").then((response) => {
                this.legerEntries = response.data.data;
                this.showLoader = false;
                // console.log(this.legerEntries)
            });
        },
    },
};
</script>
