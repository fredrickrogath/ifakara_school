<template>
    <div>
        <spinner v-if="showLoader"></spinner>
        <div v-else class="h-screen card">
            <!-- <v-card elevation=""> -->
            <v-card-title>
                Chart Of Accounts
                <v-spacer></v-spacer>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search"
                    single-line
                    hide-details
                ></v-text-field>

                <v-icon class="mx-2 pt-2 px-1" size="22" @click="">
                    mdi-pen-plus
                </v-icon>
            </v-card-title>

            <v-data-table
                :headers="headers"
                :items="chartOfAccounts"
                item-key="name"
                :search="search"
                class="elevation-1"
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <v-edit-dialog
                                    :return-value.sync="item[header.value]"
                                    @save="save"
                                    @cancel="cancel"
                                    @open="open"
                                    @close="close"
                                    large
                                >
                                    <!-- header.value hello -->
                                    <span
                                        class="text-gray-600"
                                        v-if="header.value == 'created_at'"
                                        >{{
                                            formattedDate(item[header.value])
                                        }}</span
                                    >
                                    <!-- <span
                                    class="text-gray-600"
                                    v-if=" && header.value !== null"
                                    >{{
                                        formattedPrice(item[header.value])
                                    }}</span
                                > -->

                                    <span
                                        class="text-gray-600"
                                        :class="
                                            item[header.value] == null &&
                                            header.value !== 'action'
                                                ? // header.value == 'level1'
                                                  'bg-gray-100 italic rounded px-1'
                                                : ''
                                        "
                                        v-else
                                        >{{
                                            item[header.value] !== null
                                                ?
                                                  header.value == "level1" ||
                                                  header.value == "level2" ||
                                                  header.value == "level3"
                                                    ? formattedPrice(
                                                          item[header.value]
                                                      )
                                                    : item[header.value]
                                                : "Empty"
                                        }}</span
                                    >

                                    <v-icon
                                        v-if="header.value == 'action'"
                                        size="22"
                                        @click=""
                                    >
                                        mdi-delete
                                    </v-icon>

                                    <template
                                        v-slot:input
                                        v-if="header.value !== 'action'"
                                    >
                                        <v-text-field
                                            v-model="item[header.value]"
                                            label="Edit"
                                            single-line
                                        ></v-text-field>
                                    </template>
                                </v-edit-dialog>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-data-table>
            <!-- </v-card> -->
        </div>
    </div>
</template>

<script>
import moment from "moment";
import Spinner from "./../../.././Components/SpinnerLoader.vue";
export default {
    components: {
        Spinner,
    },

    mounted() {
        this.showLoader = true;

        this.getChartOfAccounts();

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
            showLoader: true,

            search: "",
            chartOfAccounts: [],
            headers: [
                {
                    text: "Code",
                    align: "left",
                    sortable: false,
                    value: "id",
                },
                { text: "Type", value: "account_type" },
                { text: "Lev 1", value: "level1" },
                { text: "Lev 2", value: "level2" },
                { text: "Lev 3", value: "level3" },
                { text: "Name", value: "name" },
                { text: "Description", value: "description" },
                { text: "Notes", value: "notes" },
                { text: "Date", value: "created_at" },
                { text: "Action", value: "action" },
            ],
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
        getChartOfAccounts() {
            // console.log("Loading next page");
            axios.get("/accountant/getChartOfAccounts").then((response) => {
                this.chartOfAccounts = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data)
            });
        },
        save() {},
        cancel() {},
        open() {},
        close() {},
    },

    computed: {
        //   formattedDate(date) {
        //     return moment(date).format('MMMM Do YYYY, h:mm:ss a');
        //   }
    },
};
</script>
