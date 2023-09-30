<template>
    <!-- <v-col>
        <v-row> -->
    <div>
        <spinner-loader v-if="showLoader"></spinner-loader>

        <v-col v-else sm="12" md="12">
            <!-- <v-card flat :dark="isDark"> -->
            <!-- <v-card elevation="0" data-app> -->
                <v-card-title class="px-0 pt-0 pb-1">
                <div class="pl-2 pt-1 text-sm uppercase">Transaction Entries</div>
                <v-spacer></v-spacer>

                <div class="flex col-3 p-0 pt-1 mr-2">
                    <input v-model="search" type="text" class="form-control form-control-sm" />
                    <v-icon size="20" class="px-1">mdi-magnify</v-icon>
                </div>
            </v-card-title>
            <hr class="bg-gray-200 mb-1 mt-0" />
            <!-- {{ $page.props.posts }} -->
            <v-data-table
                mobile-breakpoint="0"
                :headers="headers"
                :items="legerEntries"
                :search="search"
                class="bg-red-900"
                :items-per-page="11"
            >
                <template v-slot:item.id="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{
                        item.id
                    }}</span>
                </template>

                <template v-slot:item.chart_of_account.account_type="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{
                        item.chart_of_account.account_type
                    }}</span>
                </template>

                <template v-slot:item.chart_of_account.name="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{
                        item.chart_of_account.name
                    }}</span>
                </template>

                <template v-slot:item.level_1="{ item }">
                    <span
                        class="text-gray-600 italic font-semibold"
                        :class="[
                            item.level_1 !== 0
                                ? 'text-green-500'
                                : 'text-red-500',
                        ]"
                        >{{ formattedPrice(item.level_1) }}</span
                    >
                </template>

                <template v-slot:item.level_2="{ item }">
                    <span
                        class="text-gray-600 italic font-semibold"
                        :class="[
                            item.level_2 !== 0
                                ? 'text-green-500'
                                : 'text-red-500',
                        ]"
                        >{{ formattedPrice(item.level_2) }}</span
                    >
                </template>

                <template v-slot:item.level_3="{ item }">
                    <span
                        class="text-gray-600 italic font-semibold"
                        :class="[
                            item.level_3 !== 0
                                ? 'text-green-500'
                                : 'text-red-500',
                        ]"
                        >{{ formattedPrice(item.level_3) }}</span
                    >
                </template>

                <template v-slot:item.narration="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{
                        item.narration
                    }}</span>
                </template>

                <template v-slot:item.created_at="{ item }">
                    <span class="text-gray-600 italic font-semibold">{{
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
import SpinnerLoader from "../../.././Components/SpinnerLoader.vue";

export default {
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

    components: {
        SpinnerLoader,
    },

    data() {
        return {
            dialog: false,
            legerEntries: null,

            showLoader: true,
            search: "",
            headers: [
            {
                    text: "Type",
                    value: "chart_of_account.account_type",
                },
                {
                    text: "Name",
                    value: "chart_of_account.name",
                    align: "center",
                },
                { text: "Level 1", value: "level_1" },
                { text: "Level 2", value: "level_2" },
                { text: "Level 3", value: "level_3" },
                { text: "Narration", value: "narration" },
                { text: "Date", value: "created_at" },

                // { text: "Iron (%)", value: "iron" },
            ],
            // posts: this.$store.getters["getPosts"],
            // posts: null,
            legerEntries: [],
        };
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
            axios.get("/head/getLegerEntries").then((response) => {
                this.legerEntries = response.data.data;
                this.showLoader = false;
                // console.log(this.legerEntries)
            });
        },
    }
};
</script>
