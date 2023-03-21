<template>
    <div class="component-wrapper py-6">
        <GChart
            type="ColumnChart"
            style="width: 900px; height: 400px"
            :data="chartData"
            :options="chartOptions"
        />
    </div>
</template>

<script>
import { GChart } from "vue-google-charts/legacy";

export default {
    components: {
        GChart,
    },

    data() {
        return {
            // Array will be automatically processed with visualization.arrayToDataTable function
            chartData: [
                ["Language", "Male Speakers", "Female Speakers"],
                ["Bengali", 40, 43],
                ["Hindi", 150, 150],
                ["Marathi", 40, 32],
                ["Tamil", 43, 38],
                ["Telugu", 37, 37],
            ],

            chartOptions: {
                chart: {
                    title: "Language Speakers by Gender",
                    subtitle: "Number of male and female speakers by language",
                },
                chartArea: {
                    width: 400,
                    height: 300,
                    backgroundColor: { fill: "transparent" },
                },
                legend: { position: "top", alignment: "center" },
                backgroundColor: "transparent",
                tooltip: { textStyle: { fontSize: 15 } },
                isStacked: false,
                series: {
                    0: { color: "#007bff" },
                    1: { color: "#dc3545" },
                },
            },
        };
    },
};
</script>
