<template>
    <div>   

        <!-- <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">Transaction Type</th>
                        <th class="border-0">Made For</th>
                        <th class="border-0">Amount</th>
                        <th class="border-0">Narration</th>
                        <th class="border-0">Date</th>
                         <th class="border-0" style="width: 80px">Action</th> -->
                    <!-- </tr>
                </thead> -->
                <!-- <tbody> 
                    <tr v-for="legerEntry in legerEntries" :key="legerEntry.id">
                        <td>
                            <i data-feather="folder" class="icon-dual"></i>
                            <span class="ms-2 fw-semibold"
                                ><a
                                    href="javascript: void(0);"
                                    class="text-reset"
                                    >{{ legerEntry.chart_of_account.account_type }}</a
                                ></span
                            >
                        </td>
                        <td> -->
                            <!-- <p class="mb-0">{{ legerEntry.user.name }}</p>
                             <span class="font-12">by Andrew</span> -->
                        <!-- </td> -->
                        <!-- <td>{{ legerEntry.amount | currency("Tsh ", 0) }}</td>
                        <td>{{ legerEntry.narration }}</td>
                        <td>{{ legerEntry.created_at }} -->
                        <!-- </td> -->
                    <!-- </tr>
                </tbody>
            </table> -->
        <!-- </div> -->

        <!-- <data-table></data-table> -->

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
    </div>
</template>

<script>
import moment from "moment";
import Spinner from "../../.././Components/SpinnerLoader.vue";

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
        Spinner,
    },

    data() {
        return {
            dialog: false,
            legerEntries: null,

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
