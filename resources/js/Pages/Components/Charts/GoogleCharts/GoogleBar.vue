<template>
  <div>
      <div class="component-wrapper py-0">
          <GChart
              type="ColumnChart"
              style="width: 500px; height: 290px"
              :data="chartData"
              :options="chartOptions"
          />
      </div>

      <div>
          <div class="chart-description">
              <h4>New Tools vs Total Tools</h4>
              <p>
                  This chart shows the percentage of new tools compared to the
                  total number of tools. The pie chart is divided into two
                  sections: new tools and total tools. The chart provides a
                  visual representation of the tool data.
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
                  width: 200,
                  height: 250,
                  backgroundColor: { fill: "transparent" },
              },
              vAxis: {
                  title: this.YText,
                  titleTextStyle: { italic: true },
                  gridlines: { color: "#ccc", count: 0 }, // Set gridlines color and count to 0 to remove horizontal lines
                  textStyle: { fontSize: 16 },
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
