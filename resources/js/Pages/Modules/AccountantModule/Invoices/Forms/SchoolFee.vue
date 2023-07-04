<template>
    <div class="pt-2">
        <div class="d-flex justify-content-between">
            <a @click="setChartOfAcountForm()" class="btn text-lg-700">
                <strong class="text-danger" style="font-size: large"
                    ><i class="fe-arrow-left"></i>
                </strong>
            </a>
        </div>

        <v-row justify="center" class="px-3">
            <!-- <v-card> -->
            <h5 class="text-center text-gray-600">
                {{ getChartOfAcountForm.name }} Form
            </h5>
            <!-- <v-divider></v-divider> -->
            <div class="px-2">
                <form @submit.prevent="submitForm">
                    <!-- <div class="mb-3 text-gray-600">
                                <label class="form-label">Student</label> <br />
                                <input
                                    value="1"
                                    type="text"
                                    class="form-control form-control-sm"
                                />
                                <select
                                    id="topic"
                                    class="form-control form-control-md"
                                    v-model="amount"
                                >
                                    {{-- <option value='0'>Select topic</option> --}}

                                    Read Departments
                                    <option
                                        v-for="student in students"
                                        :key="student.id"
                                    >
                                        {{ student.user.name }}
                                    </option> -->
                    <!-- @endforeach -->
                    <!-- </select>
                            </div> -->

                    <!-- <div class="mb-1 text-gray-600">
                        <label for="simpleinput" class="form-label"
                            >Identity</label
                        >

                        <Select2
                            class="form-control form-control-sm"
                            :settings="{
                                width: '100%',
                                'z-index': '1060',
                            }"
                            v-model="myValue"
                            :options="myOptions"
                            @change="myChangeEvent($event)"
                        /> -->
                    <!-- <input
                                    type="text"
                                    id="simpleinput"
                                    class="form-control form-control-sm"
                                    placeholder="Identity"
                                /> -->
                    <!-- </div> -->

                    <div class="mb-1 text-gray-800" v-if="getChartOfAcountForm.isSchoolFee">Select Student</div>

                    <Select2
                    v-if="getChartOfAcountForm.isSchoolFee"
                        v-model="student"
                        :options="students"
                        :settings="{ width: '100%', height: '300px' }"
                        @change="myChangeEvent($event)"
                        @select="mySelectEvent($event)"
                    />

                    <div class="mb-1 mt-1 text-gray-600">
                        <label for="example-email" class="form-label"
                            >Level 1</label
                        >
                        <input
                            type="number"
                            id="example-email"
                            v-model="level_1"
                            class="form-control form-control-sm"
                            placeholder="Amount"
                        />
                    </div>

                    <div class="mb-1 mt-1 text-gray-600">
                        <label for="example-email" class="form-label"
                            >Level 2</label
                        >
                        <input
                            type="number"
                            id="example-email"
                            v-model="level_2"
                            class="form-control form-control-sm"
                            placeholder="Amount"
                        />
                    </div>

                    <div class="mb-1 mt-1 text-gray-600">
                        <label for="example-email" class="form-label"
                            >Level 3</label
                        >
                        <input
                            type="number"
                            id="example-email"
                            v-model="level_3"
                            class="form-control form-control-sm"
                            placeholder="Amount"
                        />
                    </div>

                    <!-- <div class="mb-1 text-gray-600">
                                <label for="example-email" class="form-label"
                                    >Amount</label
                                >
                                <input
                                    type="email"
                                    id="example-email"
                                    name="amount"
                                    class="form-control form-control-sm"
                                    placeholder="Amount"
                                />
                            </div> -->

                    <!-- <div class="mb-1 text-gray-600">
                                <label for="example-email" class="form-label"
                                    >Amount</label
                                >
                                <input
                                    type="email"
                                    id="example-email"
                                    name="amount"
                                    class="form-control form-control-sm"
                                    placeholder="Amount"
                                />
                            </div> -->

                    <!-- <div class="mb-1 text-gray-600">
                            <label for="example-palaceholder" class="form-label"
                                >Placeholder</label
                            >
                            <input
                                type="text"
                                id="example-palaceholder"
                                class="form-control form-control-sm"
                                placeholder="placeholder"
                            />
                        </div> -->

                    <div class="mb-1 text-gray-600">
                        <label for="example-textarea" class="form-label"
                            >Naration</label
                        >
                        <textarea
                            class="form-control form-control-sm"
                            id="example-textarea"
                            rows="3"
                            v-model="narration"
                        ></textarea>
                    </div>

                    <!-- <div class="mb-1">
                            <label for="example-readonly" class="form-label"
                                >Readonly</label
                            >
                            <input
                                type="text"
                                id="example-readonly"
                                class="form-control form-control-sm"
                                readonly=""
                                value="Readonly value"
                            />
                        </div> -->

                    <div class="d-flex justify-content-between my-1 mt-2">
                        <!-- <button
                                    @click="dialog = false"
                                    type="submit"
                                    class="btn btn-success waves-effect waves-light"
                                >
                                    Submit
                                </button> -->
                        <button
                            @click="dialog = false"
                            type="submit"
                            class="btn btn-sm btn-secondary text-white waves-effect waves-light"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <!-- </v-card> -->
        </v-row>
    </div>
</template>

<script>
import Select2 from "v-select2-component";

export default {
    components: {
        // Requisitions,
        // AcceptedRequisitions,
        // DeletedRequisitions,
        // StarredRequisitions,
        // RejectedRequisitions,
        // ViewInvoice,

        // Entries,

        Select2,
    },

    mounted() {
        this.getStudents();
        // Receiving broadicasting
        // window.Echo.channel("EventTriggered").listen(
        //     "NewPostPublished",
        //     (e) => {
        //         console.log(e);
        //     }
        // );
    },

    data() {
        return {
            name: "",
            level_1: 0,
            level_2: 0,
            level_3: 0,
            narration: "",

            student: "",
            students: [],
            //         students: [
            //   { id: 1, text: 'John Doe' },
            //   { id: 2, text: 'Jane Smith' },
            //   { id: 3, text: 'Mark Johnson' },
            //   // Add more students as needed
            // ],
            student: null,

            studentId: null,
        };
    },
    computed: {
        //Add computed properties

        getChartOfAcountForm() {
            return this.$store.getters[
                "AccountantInvoiceModule/getChartOfAcountForm"
            ];
        },
    },
    watch: {
        //Add watchers...
        // student() {
        //     this.getStudents();
        // },
    },
    methods: {
        //Add methods...
        myChangeEvent(e) {
            // console.log(e);
        },

        mySelectEvent(e) {
            this.studentId = e.id;
        },

        setChartOfAcountForm() {
            this.$store.dispatch(
                "AccountantInvoiceModule/setChartOfAcountForm",
                ""
            );
        },

        async submitForm() {
            axios
                .post("/accountant/entry", {
                    level_1: this.level_1,
                    level_2: this.level_2,
                    level_3: this.level_3,
                    studentId: this.studentId,
                    narration: this.narration,
                    isSchoolFee: this.getChartOfAcountForm.isSchoolFee,
                    charts_of_accounts_id: this.getChartOfAcountForm.id,
                })
                .then((response) => {
                    this.setChartOfAcountForm();
                    // this.students = response.data.data;
                    // this.submitFormToMain();
                    this.level_1 = 0;
                    this.level_2 = 0;
                    this.level_3 = 0;
                    this.studentId = null;
                    this.narration = "";
                    // console.log(response.data);
                });
            // handle response here
        },

        // getStudents() {
        //     axios.get("/accountant/getStudentsNew").then((response) => {
        //         this.students = response.data.data;
        //         // this.showLoader = false;
        //         // console.log(response.data.data)
        //     });
        // },

        async getStudents() {
            try {
                const response = await axios.get("/accountant/getStudentsNew");
                const apiStudents = response.data.data;

                this.students = apiStudents.map((student) => ({
                    id: student.id,
                    text: `${student.first_name} ${student.middle_name} ${student.last_name}`,
                }));

                // Optional: Uncomment the following line to log the students array
                // console.log(this.students);
            } catch (error) {
                console.error("Error fetching students:", error);
            }
        },

        // async submitFormToMain() {
        //     axios
        //         .post("http://127.0.0.1:8001/api/accountant/getLegerEntries", {
        //             amount: this.amount,
        //             narration: this.narration,
        //         })
        //         .then((response) => {
        //             // this.students = response.data.data;
        //             // this.amount = "";
        //             // this.narration = "";
        //             // console.log(response.data.data);
        //         });
        //     // handle response here
        // },
    },
};
</script>
