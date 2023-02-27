<template>
    <div class="h-screen card">
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
                                <span
                                    class="text-gray-600"
                                    :class="
                                        item[header.value] == null &&
                                        header.value !== 'action'
                                            ? 'bg-gray-100 italic rounded px-1'
                                            : ''
                                    "
                                    v-else
                                    >{{
                                        item[header.value] !== null
                                            ? item[header.value]
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
</template>

<script>
import moment from "moment";
export default {
    mounted() {
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
            desserts: [
                {
                    id: 1,
                    name: "Frozen Yogurt",
                    calories: 159,
                    fat: 6.0,
                    carbs: 24,
                    protein: 4.0,
                    iron: "1%",
                },
                {
                    id: 2,
                    name: "Ice cream sandwich",
                    calories: 237,
                    fat: 9.0,
                    carbs: 37,
                    protein: 4.3,
                    iron: "1%",
                },
                {
                    id: 3,
                    name: "Eclair",
                    calories: 262,
                    fat: 16.0,
                    carbs: 23,
                    protein: 6.0,
                    iron: "7%",
                },
                {
                    id: 4,
                    name: "Cupcake",
                    calories: 305,
                    fat: 3.7,
                    carbs: 67,
                    protein: 4.3,
                    iron: "8%",
                },
                {
                    id: 5,
                    name: "Gingerbread",
                    calories: 356,
                    fat: 16.0,
                    carbs: 49,
                    protein: 3.9,
                    iron: "16%",
                },
                {
                    id: 6,
                    name: "Jelly bean",
                    calories: 375,
                    fat: 0.0,
                    carbs: 94,
                    protein: 0.0,
                    iron: "0%",
                },
                {
                    id: 7,
                    name: "Lollipop",
                    calories: 392,
                    fat: 0.2,
                    carbs: 98,
                    protein: 0,
                    iron: "2%",
                },
                {
                    id: 8,
                    name: "Honeycomb",
                    calories: 408,
                    fat: 3.2,
                    carbs: 87,
                    protein: 6.5,
                    iron: "45%",
                },
                {
                    id: 9,
                    name: "Donut",
                    calories: 452,
                    fat: 25.0,
                    carbs: 51,
                    protein: 4.9,
                    iron: "22%",
                },
                {
                    id: 10,
                    name: "KitKat",
                    calories: 518,
                    fat: 26.0,
                    carbs: 65,
                    protein: 7,
                    iron: "6%",
                },
            ],
        };
    },
    methods: {
        formattedDate(date) {
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },
        getChartOfAccounts() {
            // console.log("Loading next page");
            axios.get("/accountant/getChartOfAccounts").then((response) => {
                this.chartOfAccounts = response.data.data;
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
