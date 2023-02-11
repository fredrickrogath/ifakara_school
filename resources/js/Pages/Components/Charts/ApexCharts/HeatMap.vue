<!-- <template>
    <div>
        <div id="chart">
    <apex-chart type="pie" width="380" :options="chartOptions" :series="series"></apex-chart>
  </div>
    </div>
</template>
  
  <script>
  import VueApexCharts from 'vue-apexcharts'
    export default {
        components: {
        ApexChart: VueApexCharts,
    },
      data: () => ({
        series: [],
          chartOptions: {
            chart: {
              width: 380,
              type: 'pie',
            },
            labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
          }
      }),
  
    }
  </script> -->

<template>
    <div>
        <div id="chart">
            <apex-chart
                type="heatmap"
                height="350"
                :options="chartOptions"
                :series="series"
            ></apex-chart>
        </div>
    </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";

export default {
    components: {
        ApexChart: VueApexCharts,
    },
    data: function () {
        return {
            chartOptions: {
                chart: {
                    height: 350,
                    type: "heatmap",
                },
                stroke: {
                    width: 2,
                },
                plotOptions: {
                    heatmap: {
                        radius: 30,
                        enableShades: false,
                        colorScale: {
                            ranges: [
                                {
                                    from: 0,
                                    to: 50,
                                    color: "#008FFB",
                                },
                                {
                                    from: 51,
                                    to: 100,
                                    color: "#00E396",
                                },
                            ],
                        },
                    },
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        colors: ["#fff"],
                    },
                },
                xaxis: {
                    type: "category",
                },
                title: {
                    text: "Rounded (Range without Shades)",
                },
            },
            series: [
                {
                    name: "Jan",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "Feb",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "Mar",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "Apr",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "May",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "Jun",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "Jul",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "Aug",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "Sep",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "Oct",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "Nov",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
                {
                    name: "Dec",
                    data: this.generateData(31, {
                        min: 0,
                        max: 90,
                    }),
                },
            ],
        };
    },
    methods: {
        generateData(count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = (i + 1).toString();
                var y =
                    Math.floor(Math.random() * (yrange.max - yrange.min + 1)) +
                    yrange.min;
                series.push({
                    x: x,
                    y: y,
                });
                i++;
            }
            return series;
        },
    },
};
</script>
