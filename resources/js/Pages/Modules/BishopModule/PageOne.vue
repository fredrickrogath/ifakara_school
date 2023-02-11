<template>
    <!-- <v-row>
  <v-col cols="12" md="6" class="py-0">
    <v-row :column="$vuetify.breakpoint.mdAndDown">
      <v-col cols="12" lg="6" style="border: 1px solid red;">1</v-col>
      <v-col cols="12" lg="6" style="border: 1px solid red;">2</v-col>
    </v-row>
  </v-col>
  <v-col cols="12" md="6" style="border: 1px solid red;">3</v-col>
</v-row> -->

    <v-col sm="9" md="10" offset-sm="7" cols="12" class="mt-2">
        <div class="mx-auto sm:px-6 lg:px-0 max-w-7xl">
            <div class="overflow-hidden sm:rounded-lg">
                <v-row>
                    <v-col>
                        <v-row
                        class="rounded-lg"
                            :class="
                                isDark
                                    ? ''
                                    : 'bg-gradient-to-tr from-blue-500 to-indigo-900'
                            "
                        >
                            <v-col sm="12" md="4" offset-sm="7">
                                <v-card flat :dark="isDark" class="mt-2 ml-2">
                                    <spark-line></spark-line>
                                    <!-- <pie-chart3-d></pie-chart3-d> -->
                                </v-card>
                            </v-col>

                            <v-col sm="12" md="4" offset-sm="7">
                                <!-- <v-card flat > -->
                                <donghurt-image></donghurt-image>
                                <!-- </v-card> -->
                            </v-col>

                            <v-col sm="12" md="4" offset-sm="7">
                                <v-card v-if="isDark" outlined :dark="isDark">
                                    <statistic-cards></statistic-cards>
                                    <div class="my-1 bg-indigo-500 h-1"></div>
                                    <statistic-cards></statistic-cards>
                                </v-card>

                                <div v-else>
                                    <statistic-cards></statistic-cards>
                                    <div
                                        class="my-1 mx-2 bg-indigo-500 h-1"
                                    ></div>
                                    <statistic-cards></statistic-cards>
                                </div>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-col sm="12" md="4" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <table-data></table-data>
                                </v-card>
                            </v-col>

                            <v-col sm="12" md="4" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <table-data></table-data>
                                </v-card>
                            </v-col>

                            <v-col sm="12" md="4" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <table-data></table-data>
                                </v-card>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-col sm="12" md="6" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <table-data></table-data>
                                </v-card>
                            </v-col>

                            <v-col sm="12" md="6" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <table-data></table-data>
                                </v-card>
                            </v-col>
                        </v-row>

                        <v-row>
                            <table-data></table-data>
                        </v-row>
                    </v-col>
                </v-row>
            </div>
        </div>
    </v-col>
</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";
const isDark = useDark();
</script>

<script>
import StatisticCards from "../../Components/StatisticCards.vue";
import TableData from "../../Components/Tables.vue";
import SparkLine from "../../Components/SparkLine.vue";
import DonghurtImage from "../../Components/Charts/ApexCharts/DonghurtImage.vue";

import PieChart3D from "../../Components/Charts/GoogleCharts/PieChart3D.vue";

import Money from "../../Components/Money.vue";

export default {
    components: {
        StatisticCards,
        TableData,
        SparkLine,
        DonghurtImage,
        PieChart3D,

        Money,
    },

    filters: {},

    mounted() {},

    data() {
        return {};
    },
    methods: {},

    computed: {},
};
</script>
