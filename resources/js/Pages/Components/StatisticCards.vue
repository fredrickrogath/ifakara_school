<template>
    <div
        class="bg-transparent rounded mt-2 mx-2"
        :class="isDark ? '' : 'border-2 border-sky-500'"
    >
        <!-- component -->
        <div class="px-0 py-0 mx-auto">
            <div class="flex flex-wrap text-center">
                <div class="px-4 py-1 w-full">
                    <div
                        class="flex items-center justify-between py-0 px-3 rounded-lg"
                    >
                        <div class="rounded-lg">
                            <h4 class="text-gray-200 dark:text-gray-200 px-1">
                                Last Week Transactions
                            </h4>
                            <!-- <h4 class="text-gray-900 px-1">
                                Last Week Transactions
                            </h4> -->
                            <!-- <h4 class="text-gray-900 px-1">
                                Last Week Transactions
                            </h4> -->
                            <!-- <h3
                                class="mt-2 text-xl font-bold text-green-500 text-left"
                            >
                                + 150.000 ₭
                            </h3> -->
                            <!-- <p class="text-sm font-semibold text-gray-400">
                                Last Transaction
                            </p> -->
                            <button
                                class="btn-sm text-sm mt-2 px-4 py-2 bg-gradient-to-tr from-blue-500 to-indigo-900 hover:bg-indigo-700 text-white rounded-lg"
                            >
                                RE-VIEW
                            </button>
                        </div>
                        <div
                            class="bg-gradient-to-tr from-blue-500 to-indigo-900 px-4 sm:px-0 w-28 h-28 sm:h-25 rounded-full shadow-2xl border-white border-dashed border-2 flex justify-center items-center"
                        >
                            <div>
                                <h1 class="text-sm text-white">
                                    {{
                                        tweened.toFixed(0) | currency("Tsh", 0)
                                    }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";
const isDark = useDark();
</script>

<script>
import gsap from "gsap";

export default {
    components: {},

    filters: {},

    mounted() {
        this.number = 300000000;
    },

    data() {
        return {
            tweened: 0,
            number: 0,
        };
    },

    watch: {
        number(n) {
            gsap.to(this, { duration: 5, tweened: Number(n) || 0 });
        },
    },
};
</script>

<!-- CARD DESIGN-->
<!-- <template>
    <div>
        <div class="px-5 py-0 mx-auto bg-red-800">
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 w-full bg-green-800">
                    <div
                        class="bg-blue-800 flex items-center justify-between p-4 rounded-lg bg-white shadow-indigo-50 shadow-md"
                    >
                        <div class="bg-yellow-800">
                            <h2 class="text-gray-900 text-lg font-bold">
                                Total Ballance
                            </h2>
                            <h3
                                class="mt-2 text-xl font-bold text-green-500 text-left"
                            >
                                + 150.000 ₭
                            </h3>
                            <p class="text-sm font-semibold text-gray-400">
                                Last Transaction
                            </p>
                            <button
                                class="text-sm mt-6 px-4 py-2 bg-[#304FFE] text-white rounded-lg font-laonoto tracking-wider hover:bg-indigo-500 outline-none"
                            >
                                ຊື້ແພັກເກດ
                            </button>
                        </div>
                        <div
                            class="bg-gradient-to-tr from-blue-500 to-indigo-900 mx-4 w-24 h-24 rounded-full shadow-2xl shadow-[#304FFE] border-white border-dashed border-2 flex justify-center items-center"
                        >
                            <div>
                                <h1 class="text-white text-2xl">Basic</h1>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</template> -->
