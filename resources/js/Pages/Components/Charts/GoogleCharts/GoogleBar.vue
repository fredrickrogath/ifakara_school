<template>
    <div class="component-wrapper py-0">
      <GChart
        type="ColumnChart"
        style="width: 500px; height: 400px;"
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
    props: {
      data: {
        type: Array,
        required: true,
      },
      YText: {
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
        chartData: this.data,
        chartOptions: {
          chart: {
            // title: "Company Performance",
            // subtitle: "Sales, Expenses, and Profit: 2014-2017",
          },
          chartArea: {
            width: 400,
            height: 300,
            backgroundColor: { fill: "transparent" },
          },
          vAxis: {
            title: this.YText,
            titleTextStyle: { italic: true },
            gridlines: { color: "#ccc", count: 0 }, // Set gridlines color and count to 0 to remove horizontal lines
            textStyle: { fontSize: 20 },
          },
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
  