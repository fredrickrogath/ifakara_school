<template>
    <div class="component-wrapper py-6">
        <GChart
            type="PieChart"
            style="width: 200px"
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
                ["Language", "Speakers (in millions)"],
                ["Bengali", 83],
                ["Hindi", 300],
                ["Marathi", 72],
                ["Tamil", 81],
                ["Telugu", 74],
            ],
            chartOptions: {
                chart: {
                    title: "Company Performance",
                    subtitle: "Sales, Expenses, and Profit: 2014-2017",
                },
                chartArea: {
                    width: 400,
                    height: 300,
                    backgroundColor: { fill: "transparent" },
                },
                is3D: true,
                legend: { position: "none" },
                backgroundColor: "transparent",
                tooltip: {textStyle: { fontSize: 15} },
            },
        };
    },
};
</script>
