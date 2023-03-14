<template>
    <div class="pt-1">
        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-blue rounded">
                                    <i
                                        class="fe-aperture avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        $<span data-plugin="counterup"
                                            >12,145</span
                                        >
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Income status
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-success rounded">
                                    <i
                                        class="fe-shopping-cart avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup"
                                            >1576</span
                                        >
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        January's Sales
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-primary rounded">
                                    <i
                                        class="fe-bar-chart-2 avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        $<span data-plugin="counterup"
                                            >8947</span
                                        >
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Payouts
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->

            <div class="col-md-3 col-xl-3">
                <div class="card bg-pattern">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-info rounded">
                                    <i
                                        class="fe-cpu avatar-title font-22 text-white"
                                    ></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="my-1">
                                        <span data-plugin="counterup">178</span>
                                    </h4>
                                    <p class="text-muted mb-1 text-truncate">
                                        Available Stores
                                    </p>
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

        <div class="row">
            <v-card-title class="px-0 pt-0">
                Invoices
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
                :headers="headers"
                :items="invoices"
                item-key="name"
                :search="search"
                :items-per-page="3"
                class="elevation-1"
            >
                <template v-slot:body="{ items, headers }">
                    <tbody>
                        <tr v-for="(item, idx, k) in items" :key="idx">
                            <td v-for="(header, key) in headers" :key="key">
                                <v-icon
                                    v-if="header.value == 'delete'"
                                    size="22"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#warning-alert-modal"
                                    @click="setIdForAction(items[idx]['id'])"
                                >
                                    mdi-delete
                                </v-icon>

                                <v-icon
                                    v-if="header.value == 'view'"
                                    size="22"
                                    @click="setInvoiceView(items[idx]['id'])"
                                >
                                    mdi-eye
                                </v-icon>

                                <v-icon
                                    v-if="header.value == 'starred'"
                                    size="22"
                                    :class="
                                        item[header.value] ? 'text-warning' : ''
                                    "
                                    @click="
                                        starredInvoice(
                                            items[idx]['id'],
                                            item[header.value],
                                            header.value
                                        )
                                    "
                                >
                                    mdi-star
                                </v-icon>

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'id'"
                                    >{{ item[header.value] }}</span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'created_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'updated_at'"
                                    >{{
                                        formattedDate(item[header.value])
                                    }}</span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'seller'"
                                    >{{ item[header.value].name }}</span
                                >

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'tools'"
                                >
                                    <div v-for="tool in item[header.value]">
                                        <span>
                                            {{ tool.name }}
                                        </span>
                                    </div>
                                </span>

                                <span
                                    class="text-gray-600"
                                    v-else-if="header.value == 'tool_sum'"
                                >
                                    {{
                                        formattedPrice(
                                            totalPrice(item.invoice_tool)
                                        )
                                    }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-data-table>
        </div>
    </div>
</template>

<script>
import moment from "moment";
export default {
    mounted() {
        this.showLoader = true;
        this.getInvoices();

        // Receiving broadicasting
        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log('abc');
                this.getInvoices();
            }
        );
    },

    data() {
        return {
            echo: null,
            search: "",
            headers: [
                {
                    text: "Invoice #",
                    align: "start",
                    sortable: false,
                    value: "id",
                },
                {
                    text: "Seller",
                    value: "seller",
                },
                {
                    text: "Tools",
                    value: "tools",
                },
                {
                    text: "Total",
                    value: "tool_sum",
                },
                { text: "Starred", value: "starred" },
                { text: "Date", value: "created_at" },
                { text: "View", value: "view" },
                { text: "Delete", value: "delete" },
            ],
            invoices: [],
        };
    },
    computed: {
        //Add computed properties
    },
    watch: {
        //Add watchers...
    },
    methods: {
        //Add methods...
        formattedPrice(amount) {
            return amount.toLocaleString("sw-TZ", {
                style: "currency",
                currency: "Tsh",
            });
        },

        formattedDate(date) {
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        totalPrice(item) {
            return item.reduce((total, item) => {
                return total + item.tool.price * item.count;
            }, 0);
        },

        getInvoices() {
            axios.get("/procurement/getInvoices").then((response) => {
                this.invoices = response.data.data;
                // this.showLoader = false;
                // console.log(response.data.data);
            });
        },
    },
};
</script>
