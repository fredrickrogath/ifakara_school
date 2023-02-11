<template>
    <v-col sm="9" md="10" offset-sm="7" cols="12">
        <div class="mx-auto sm:px-6 lg:px-0 max-w-7xl">
            <div class="overflow-hidden sm:rounded-lg">
                <v-row>
                    <v-col>
                        <v-row>
                            <v-col sm="4" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <spark-line></spark-line>
                                </v-card>
                            </v-col>

                            <v-col sm="4" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <donghurt-image></donghurt-image>
                                </v-card>
                            </v-col>

                            <v-col sm="4" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <statistic-cards></statistic-cards>
                                    <div class="my-1 bg-indigo-500 h-1"></div>
                                    <statistic-cards></statistic-cards>
                                </v-card>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-col sm="4" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <table-data></table-data>
                                </v-card>
                            </v-col>

                            <v-col sm="4" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <table-data></table-data>
                                </v-card>
                            </v-col>

                            <v-col sm="4" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <table-data></table-data>
                                </v-card>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-col sm="6" offset-sm="7">
                                <v-card outlined :dark="isDark">
                                    <table-data></table-data>
                                </v-card>
                            </v-col>

                            <v-col sm="6" offset-sm="7">
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

export default {
    components: { StatisticCards, TableData, SparkLine, DonghurtImage },

    filters: {},

    mounted() {},

    data() {
        return {};
    },
    methods: {},

    computed: {},
};
</script>
