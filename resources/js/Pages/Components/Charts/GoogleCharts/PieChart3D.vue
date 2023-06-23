<template>
    <div>
        <div class="component-wrapper py-1">
            <GChart
                type="PieChart"
                style="width: 500px; height: 200px"
                :data="chartData"
                :options="chartOptions"
            />
        </div>

        <div>
            <div class="chart-description">
                <h4>{{ head }}</h4>
                <p>
                    {{ content }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { GChart } from "vue-google-charts/legacy";

export default {
    components: {
        GChart,
    },

    props: {
        data: {
            type: Array,
            required: true,
        },
        head: {
            type: String,
            required: true,
        },
        content: {
            type: String,
            required: true,
        },
    },

    mounted() {
        if (this.data) {
            this.renderChart();
            // console.log("utuyuytuy" + this.data);
        }
    },

    data() {
        return {
            // Array will be automatically processed with visualization.arrayToDataTable function
            chartData: this.data,
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
                tooltip: { textStyle: { fontSize: 15 } },
            },
        };
    },

    methods: {
        renderChart() {
            this.chartData = this.data;
        },
    },

    watch: {
        data(newData) {
            if (newData) {
                //   console.log(newData);
                this.renderChart();
            }
        },
    },
};
</script>
