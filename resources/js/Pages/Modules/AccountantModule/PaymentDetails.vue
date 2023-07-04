<template>
    <!-- <v-col>
        <v-row> -->
    <div class="card h-screen">
        <spinner v-if="showLoader"></spinner>

        <!-- <v-col v-else sm="12" md="12"> -->
        <!-- <v-card flat :dark="isDark"> -->
        <!-- <v-card elevation="0" data-app> -->

        <v-card-title class="px-0 pt-0">
            <div class="pl-2 pt-1">Students</div>
            <v-spacer></v-spacer>

            <snack-bar
                class="absolute right-0 top-14"
                message="Task completed successfully"
            ></snack-bar>

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
            :items="students"
            item-key="name"
            :search="search"
            class="elevation-1"
            :items-per-page="11"
        >
            <template v-slot:body="{ items, headers }">
                <tbody>
                    <tr v-for="(item, idx, k) in items" :key="idx">
                        <td v-for="(header, key) in headers" :key="key">
                            <!-- <v-icon
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
                                v-if="header.value == 'edit'"
                                size="22"
                                @click="setEditStudent(items[idx]['id'])"
                            >
                                mdi-pen
                            </v-icon> -->

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

                            <!-- <span
                                class="text-gray-600"
                                v-else-if="header.value == 'id'"
                                >{{ item[header.value] }}</span
                            > -->

                            <span
                                class="text-gray-600 italic font-semibold"
                                v-else-if="header.value == 'created_at'"
                                >{{ formattedDate(item[header.value]) }}</span
                            >

                            <span
                                class="text-gray-600"
                                v-else-if="header.value == 'updated_at'"
                                >{{ formattedDate(item[header.value]) }}</span
                            >

                            <span
                                class="text-gray-600 italic font-semibold"
                                v-else-if="header.value == 'first_name'"
                                >{{ item[header.value] }}</span
                            >

                            <span
                                class="text-gray-600 italic font-semibold"
                                v-else-if="header.value == 'middle_name'"
                            >
                                {{ item[header.value] }}
                            </span>

                            <span
                                class="text-gray-600 italic font-semibold"
                                v-else-if="header.value == 'last_name'"
                            >
                                {{ item[header.value] }}
                            </span>
                            <!-- chart_of_account -->
                            <span
                                class="text-gray-600 italic font-semibold"
                                v-else-if="header.text === 'Level 1'"
                            >
                                {{
                                    item[header.value] &&
                                    item[header.value].level_1 !== null
                                        ? formattedPrice(item[header.value].level_1)
                                        : 0
                                }}
                            </span>

                            <span
                                class="text-gray-600 italic font-semibold"
                                v-else-if="header.text === 'Level 2'"
                            >
                                {{
                                    item[header.value] &&
                                    item[header.value].level_2 !== null
                                        ? formattedPrice(item[header.value].level_2)
                                        : 0
                                }}
                            </span>

                            <span
                                class="text-gray-600 italic font-semibold"
                                v-else-if="header.text === 'Level 3'"
                            >
                                {{
                                    item[header.value] &&
                                    item[header.value].level_3 !== null
                                        ? formattedPrice(item[header.value].level_3)
                                        : 0
                                }}
                            </span>

                            <span
                                class="text-gray-600 italic font-semibold"
                                v-else-if="header.text === 'Last Pay On'"
                            >
                                {{
                                    item[header.value] &&
                                    item[header.value].level_3 !== null
                                        ? formattedDate(item[header.value].updated_at)
                                        : 0
                                }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </template>
        </v-data-table>
        <!-- </v-col> -->
    </div>
    <!-- </v-row>
    </v-col> -->
</template>

<script>
import moment from "moment";
import Spinner from "../../Components/SpinnerLoader.vue";
import SnackBar from "../../Components/SnackBar.vue";
export default {
    components: {
        Spinner,
        SnackBar,
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
        this.getStudents();

        // window.Echo.channel("EventTriggered").listen(
        //     "NewPostPublished",
        //     (e) => {
        //         console.log('abc');
        //         // this.getTools();
        //     }
        // );

        // Receiving broadicasting
        // window.Echo.channel("StudentTriggered").listen(
        //     ".Api\\Secretary\\StudentEvent",
        //     (e) => {
        //         console.log('abc');
        //         this.getStudents();
        //     }
        // );

        // window.Echo.channel("student-event." + this.$page.props.user.school_id).listen(
        //     "Academic\\StudentEvent",
        //     (e) => {
        //         this.getStudents();
        //     }
        // );

        // Receiving broadicasting
        //  window.Echo.channel("student-trigger-from-financial-secretary").listen(
        //     "ApiSecretaryStudentEvent",
        //     (e) => {
        //         console.log('student-trigger-from-financial-secretary');
        //         // this.getTools();
        //     }
        // );

        window.Echo.channel("EventTriggered").listen(
            "NewPostPublished",
            (e) => {
                // console.log(e);
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
                    text: "First Name",
                    align: "start",
                    sortable: false,
                    value: "first_name",
                },
                {
                    text: "Middle Name",
                    value: "middle_name",
                },
                {
                    text: "Last Name",
                    value: "last_name",
                },
                {
                    text: "Level 1",
                    value: "entries",
                },

                {
                    text: "Level 2",
                    value: "entries",
                },

                {
                    text: "Level 3",
                    value: "entries",
                },
                { text: "Last Pay On", value: "entries" },
                // { text: "Parent", value: "parent" },
                // { text: "Contact", value: "parent_contact" },
                // { text: "Edit", value: "edit" },
            ],
            students: [],

            idForAction: null,
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },

        // getStudentId() {
        //     this.$store.dispatch("AcademicStudentModule/setStudentId", id);
        //     this.$store.dispatch("AcademicStudentModule/setEditStudent");
        // },

        // getStudentId() {
        //     return this.$store.getters["AcademicStudentModule/getStudentId"];
        // },
    },

    methods: {
        async setIdForAction(id) {
            this.idForAction = id;
        },

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

        setEditStudent(id) {
            this.$store.dispatch("AcademicStudentModule/setStudentId", id);
            this.$store.dispatch("AcademicStudentModule/setEditStudent");
        },

        // totalPrice(item) {
        //     return item.reduce((total, item) => {
        //         return total + item.tool.price * item.count;
        //     }, 0);
        // },

        getStudents() {
            axios.get("/accountant/getStudentPayments").then((response) => {
                this.students = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data);
            });
        },

        save(id, column, data) {
            this.updateTools(id, data, column);
            // console.log(id + " , " +data);
        },
        cancel() {},
        open() {},
        close() {},
    },
};
</script>
