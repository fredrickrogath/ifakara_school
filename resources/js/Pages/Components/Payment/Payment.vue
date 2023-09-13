<template>
    <div class="">
        <!-- component -->
        <section class="body-font h-screen text-gray-600">
            <div
                class="container mx-auto flex max-w-3xl flex-wrap justify-center rounded-lg py-24"
            >
                <!-- QR Code Number Account & Uploadfile -->
                <div class="flex-wrap md:flex flex">
                    <div class="mx-auto w-1/3 text-center">
                        <v-icon
                            size="92"
                            class="mx-auto h-52 w-52 rounded-lg border p-2 md:mt-0"
                            >mdi-account-tie</v-icon
                        >
                        <!-- <img class="mx-auto h-52 w-52 rounded-lg border p-2 md:mt-0" src="https://i.imgur.com/FQS7fFC.png" alt="step" /> -->
                        <div>

                            <h6 v-if="student.entries &&
                                    student.entries.length > 0" class="mt-2"> {{ student.class_level.class_level }} STUDENT </h6>
                            <h1
                                class="font-laonoto mt-2 text-center text-xl font-bold"
                            >
                                <span v-show="false">{{ getPaymentId }}</span>
                                {{ student.first_name }}
                                {{ student.middle_name }}
                                {{ student.last_name }}
                            </h1>

                            <select v-if="student.entries &&
                                    student.entries.length > 0 && calculateFormattedFeeTotal() <= calculateFormattedTotal()"                                    class="form-select form-select-sm mx-auto" aria-label="Default select example" style="width:auto;">
                                    <option value="3" selected> {{ student.class_level.class_level }} STUDENT </option>
                                <option @click="changeClass(student.id ,classs.id)" value="2"
                                    v-for="classs in classes" :key="classs.id"> {{ classs.class_level }} LEVEL </option>
                            </select>

                            <p
                            v-if="
                                    student.entries &&
                                    student.entries.length > 0
                                "
                                class="mt-2 text-center italic font-semibold text-gray-600"
                            >
                                <span class="text-red-500">STATUS</span> <span class="text-xl text-red-700 font-bold">:</span>
                                <span>  {{calculateFormattedTotal() > 0.00 ? (calculateFormattedFeeTotal() <= calculateFormattedTotal() ? ' FULL PAID AND COMPLETE' : ' PARTIAL PAID AND INCOMPLETE') : ' UNPAID'}}</span>

                                <div v-if="
                                    student.entries &&
                                    student.entries.length > 0
                                " class="mt-2 text-center italic font-semibold">
            <span>PAID</span>
            <span class="text-gray-700 font-bold">{{
                formattedPrice(
                    calculateFormattedTotal()
                )
            }}</span>

            <span>OUT OF</span>

            <span class="text-gray-700 font-bold">{{ formattedPrice(calculateFormattedFeeTotal()) }}</span>
        </div>
                            </p>

                            <div
                                class="bg-warning text-white italic font-semibold"
                            >
                                EXPECTED
                            </div>

                            <div
                                v-if="
                                    student.entries &&
                                    student.entries.length > 0
                                "
                                class="d-flex justify-content-between py-1"
                            >
                                <div class="italic font-semibold">
                                    <div>Level 1</div>
                                    <div>
                                        {{
                                            formattedPrice(student.entries[0].chart_of_account
                                                .level1)
                                        }}
                                    </div>
                                </div>

                                <div class="italic font-semibold">
                                    <div>Level 2</div>
                                    <div>
                                        {{
                                            formattedPrice(student.entries[0].chart_of_account
                                                .level2)
                                        }}
                                    </div>
                                </div>

                                <div class="italic font-semibold">
                                    <div>Level 3</div>
                                    <div>
                                        {{
                                            formattedPrice(student.entries[0].chart_of_account
                                                .level3)
                                        }}
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-green-500 text-white italic font-semibold"
                            >
                                TOTAL PAYMENTS
                            </div>

                            <div
                                v-if="
                                    student.entries &&
                                    student.entries.length > 0
                                "
                                class="d-flex justify-content-between py-1"
                            >
                                <div class="italic font-semibold">
                                    <div>Level 1</div>
                                    <div>
                                        {{
                                            formattedPrice(calculateTotalLevel(
                                                student.entries,
                                                "level_1"
                                            ))
                                        }}
                                    </div>
                                </div>

                                <div class="italic font-semibold">
                                    <div>Level 2</div>
                                    <div>
                                        {{
                                            formattedPrice(calculateTotalLevel(
                                                student.entries,
                                                "level_2"
                                            ))
                                        }}
                                    </div>
                                </div>

                                <div class="italic font-semibold">
                                    <div>Level 3</div>
                                    <div>
                                        {{
                                            formattedPrice(calculateTotalLevel(
                                                student.entries,
                                                "level_3"
                                            ))
                                        }}
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-red-500 text-white italic font-semibold"
                            >
                                REMAINED
                            </div>

                            <div
                                v-if="
                                    student.entries &&
                                    student.entries.length > 0
                                "
                                class="d-flex justify-content-between py-1"
                            >
                                <div class="italic font-semibold">
                                    <div>Level 1</div>
                                    <div>
                                        {{
                                            formattedPrice(student.entries[0].chart_of_account
                                                .level1 -
                                            calculateTotalLevel(
                                                student.entries,
                                                "level_1"
                                            ))
                                        }}
                                    </div>
                                </div>

                                <div class="italic font-semibold">
                                    <div>Level 2</div>
                                    <div>
                                        {{
                                            formattedPrice(student.entries[0].chart_of_account
                                                .level2 -
                                            calculateTotalLevel(
                                                student.entries,
                                                "level_2"
                                            ))
                                        }}
                                    </div>
                                </div>

                                <div class="italic font-semibold">
                                    <div>Level 3</div>
                                    <div>
                                        {{
                                            formattedPrice(student.entries[0].chart_of_account
                                                .level3 -
                                            calculateTotalLevel(
                                                student.entries,
                                                "level_3"
                                            ))
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Step Checkout -->
                    <div class="mt-8 md:mt-0 md:w-2/3">
                        <template>
                            <div class="scroll-container pl-6">
                                <div
                                    v-for="(entry, index) in student.entries"
                                    :key="index"
                                    class="relative flex pb-2"
                                >
                                    <div
                                        class="absolute inset-0 flex h-full w-10 items-center justify-center"
                                    >
                                        <div
                                            class="pointer-events-none h-full w-1 bg-gray-200"
                                        ></div>
                                    </div>
                                    <div
                                        class="relative z-10 inline-flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-500 text-white bg-warning"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            class="h-7 w-7 text-white"
                                        >
                                            <title>Payment</title>
                                            <path
                                                d="M20 4H4A2 2 0 0 0 2 6V18A2 2 0 0 0 4 20H20A2 2 0 0 0 22 18V6A2 2 0 0 0 20 4M20 11H4V8H20Z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="flex-grow pl-4">
                                        <h2
                                            class="title-font mb-1 text-sm font-medium tracking-wider text-gray-600 italic font-semibold"
                                        >
                                            Payment On
                                            {{
                                                formattedDate(entry.created_at)
                                            }}
                                        </h2>
                                        <p class="font-laonoto leading-relaxed">
                                            <span
                                                class="text-gray-600 italic font-semibold"
                                            >
                                                Level 1
                                                <v-icon
                                                    size="20"
                                                    class="mb-1 px-1"
                                                    >mdi-hand-pointing-right</v-icon
                                                >
                                                <span
                                                    :class="[
                                                        entry.level_1 !== 0
                                                            ? 'text-green-500'
                                                            : 'text-red-500',
                                                    ]"
                                                    >{{
                                                        formattedPrice(
                                                            entry.level_1
                                                        )
                                                    }}</span
                                                >

                                                <v-icon
                                                    size="18"
                                                    class="mb-1 px-1"
                                                    >mdi-wall</v-icon
                                                >
                                            </span>
                                            <span
                                                class="text-gray-600 italic font-semibold"
                                            >
                                                Level 2
                                                <v-icon
                                                    size="20"
                                                    class="mb-1 px-1"
                                                    >mdi-hand-pointing-right</v-icon
                                                >
                                                <span
                                                    :class="[
                                                        entry.level_2 !== 0
                                                            ? 'text-green-500'
                                                            : 'text-red-500',
                                                    ]"
                                                    >{{
                                                        formattedPrice(
                                                            entry.level_2
                                                        )
                                                    }}</span
                                                >
                                                <v-icon
                                                    size="18"
                                                    class="mb-1 px-1"
                                                    >mdi-wall</v-icon
                                                >
                                            </span>
                                            <span
                                                class="text-gray-600 italic font-semibold"
                                            >
                                                Level 3
                                                <v-icon
                                                    size="20"
                                                    class="mb-1 px-1"
                                                    >mdi-hand-pointing-right</v-icon
                                                >
                                                <span
                                                    :class="[
                                                        entry.level_3 !== 0
                                                            ? 'text-green-500'
                                                            : 'text-red-500',
                                                    ]"
                                                    >{{
                                                        formattedPrice(
                                                            entry.level_3
                                                        )
                                                    }}</span
                                                >
                                                <v-icon
                                                    size="18"
                                                    class="mb-1 px-1"
                                                    >mdi-wall</v-icon
                                                >
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <div class="relative flex pb-12 pl-6">
                            <div
                                class="relative z-10 inline-flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-warning text-white"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    class="h-7 w-7 text-white"
                                >
                                    <!-- <title>Payment</title>
                                    <path
                                        d="M20 4H4A2 2 0 0 0 2 6V18A2 2 0 0 0 4 20H20A2 2 0 0 0 22 18V6A2 2 0 0 0 20 4M20 11H4V8H20Z"
                                    /> -->
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import moment from "moment";
export default {
    mounted() {
        this.showLoader = true;
        this.getStudents();
        this.getStudentClasses();

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
            id: null,
            student: [],
            classes: [],
        };
    },

    computed: {
        getPaymentId() {
            this.id =
                this.$store.getters["AccountantInvoiceModule/getPaymentId"];
            return this.$store.getters["AccountantInvoiceModule/getPaymentId"];
        },
    },

    watch: {
        id(newVal, oldVal) {
            if (newVal !== null) {
                this.getStudents();
            }
            console.log(
                `The message has changed from "${oldVal}" to "${newVal}"`
            );
        },
    },

    methods: {
        // async setIdForAction(id) {
        //     this.idForAction = id;
        // },

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

        // setEditStudent(id) {
        //     this.$store.dispatch("AcademicStudentModule/setStudentId", id);
        //     this.$store.dispatch("AcademicStudentModule/setEditStudent");
        // },

        // studentDetails(id) {
        //     this.setInvoiceView(id);
        // },

        // setInvoiceView(id) {
        //     this.$store.dispatch("AccountantInvoiceModule/setPaymentView", id);
        // },

        calculateTotalLevel(entries, level) {
            if (!entries || entries.length === 0) {
                return 0;
            }

            return entries.reduce((total, entry) => {
                return total + (entry[level] || 0);
            }, 0);
        },

        calculateFormattedFeeTotal() {
    const level1 = parseFloat(this.student.entries[0].chart_of_account.level1);
    const level2 = parseFloat(this.student.entries[0].chart_of_account.level2);
    const level3 = parseFloat(this.student.entries[0].chart_of_account.level3);
    const total = level1 + level2 + level3;
    return parseFloat(total);
  },

        calculateFormattedTotal() {
    const level1Difference =
    //   this.student.entries[0].chart_of_account.level1 -
      this.calculateTotalLevel(this.student.entries, "level_1");
    const level2Difference =
    //   this.student.entries[0].chart_of_account.level2 -
      this.calculateTotalLevel(this.student.entries, "level_2");
    const level3Difference =
    //   this.student.entries[0].chart_of_account.level3 -
      this.calculateTotalLevel(this.student.entries, "level_3");
    const total = level1Difference + level2Difference + level3Difference;
    return parseFloat(total);
  },

  changeClass(studentId, classId){
    if(this.$page.props.role == 'academic'){
        // axios.post("/accountant/changeClassLevel", {
        //             id: this.getPaymentId,
        //         })
        //         .then((response) => {
        //             if(response.data.data != null){
        //                 this.student = response.data.data;
        //                 this.showLoader = false;
        //             }
        //             // console.log(response.data.data);
        //         });
            }
            if(this.$page.props.role == 'accountant'){
                axios.post("/accountant/changeClassLevel", {
                    studentId: studentId,
                    classId: classId,
                })
                .then((response) => {
                    if(response.data.data != null){
                        this.getStudents()
                        // this.student = response.data.data;
                        this.showLoader = false;
                    }
                    // console.log(response.data.data);
                });
            }
            
  },
        getStudents() {
            axios
                .post("/accountant/getSpecificStudent", {
                    id: this.getPaymentId,
                })
                .then((response) => {
                    if(response.data.data != null){
                        this.student = response.data.data;
                        this.showLoader = false;
                    }
                    // console.log(response.data.data);
                });
        },

        getStudentClasses() {
            if(this.$page.props.role == 'academic'){
                axios.get("/academic/getStudentClasses").then((response) => {
                this.classes = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data);
            });
            }
            if(this.$page.props.role == 'accountant'){
                axios.get("/accountant/getStudentClasses").then((response) => {
                this.classes = response.data.data;
                this.showLoader = false;
                // console.log(response.data.data);
            });
            }
        },

        // save(id, column, data) {
        //      this.updateTools(id, data, column);
        //     // console.log(id + " , " +data);
        // },
        // cancel() {},
        // open() {},
        // close() {},
    },
};
</script>

<style>
.scroll-container {
    max-height: 600px; /* Set the desired maximum height */
    overflow-y: auto; /* Enable vertical scroll */
}
</style>
