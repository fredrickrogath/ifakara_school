<template>
    <div class="">
        <!-- component -->
        <section class="body-font h-screen text-gray-600">
            <div
                class="container mx-auto flex max-w-3xl flex-wrap justify-center rounded-lg py-24"
            >
                <!-- QR Code Number Account & Uploadfile -->
                <div class="flex-wrap md:flex flex">
                    <div class="mx-auto">
                        <v-icon
                            size="92"
                            class="mx-auto h-52 w-52 rounded-lg border p-2 md:mt-0"
                            >mdi-account-tie</v-icon
                        >
                        <!-- <img class="mx-auto h-52 w-52 rounded-lg border p-2 md:mt-0" src="https://i.imgur.com/FQS7fFC.png" alt="step" /> -->
                        <div>
                            <h1
                                class="font-laonoto mt-4 text-center text-xl font-bold"
                            >
                                <span v-show="false">{{ getPaymentId }}</span>
                                {{ student.first_name }}
                                {{ student.middle_name }}
                                {{ student.last_name }}
                            </h1>

                            <p
                                class="mt-2 text-center italic font-semibold text-gray-600"
                            >
                                NOT FULL PAID
                            </p>
                            <h4
                                class="mt-1 text-center italic font-medium text-red-500"
                            >
                                TSH 123,400 /=
                            </h4>
                        </div>
                        <!-- component -->
                        <!-- <div class="mx-auto w-52">
          <div class="m-4">
            <div class="flex w-full items-center justify-center">
              <label class="flex h-14 w-full cursor-pointer flex-col border-4 border-dashed border-gray-200 hover:border-gray-300 hover:bg-gray-100">
                <div class="mt-4 flex items-center justify-center space-x-1">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                  </svg>

                  <p class="font-laonoto text-sm tracking-wider text-gray-400 group-hover:text-gray-600">ອັບໂຫຼດຮູບບິນ</p>
                </div>
                <input type="file" class="opacity-0" />
              </label>
            </div>
          </div>
        </div> -->
                        <!-- <button class="mx-auto block rounded-md border bg-blue-500 px-6 py-2 text-white outline-none">ສົ່ງຫຼັກຖານການໂອນ</button> -->
                    </div>
                    <!-- Step Checkout -->
                    <div class="mt-8 md:mt-0 md:w-2/3">
                        <template>
                            <div class="scroll-container">
                                <div
                                    v-for="(entry, index) in student.entries"
                                    :key="index"
                                    class="relative flex pb-6"
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
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <div class="relative flex pb-12">
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

        getStudents() {
            axios
                .post("/accountant/getSpecificStudent", {
                    id: this.getPaymentId,
                })
                .then((response) => {
                    this.student = response.data.data;
                    this.showLoader = false;
                    console.log(response.data.data);
                });
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
