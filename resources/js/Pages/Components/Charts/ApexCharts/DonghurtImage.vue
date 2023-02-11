<template>
    <div class="">
        <apexchart
            type="donut"
            :options="chartOptions"
            :series="series"
        ></apexchart>
    </div>
</template>

<script>
import VueApexCharts from "vue-apexcharts";

export default {
    components: {
        apexchart: VueApexCharts,
    },
    data() {
        return {
            series: [44, 33, 54, 45],
            chartOptions: {
                chart: {
                    // width: 100,
                    type: "pie",
                },
                colors: ["#A5B4FC", "#6366F1", "#A5B4FC", "#6366F1"],
                fill: {
                    type: "image",
                    opacity: 0.85,
                    image: {
                        src: [
                            "http://127.0.0.1:8000/storage/systemFiles/images/1.jpg",
                            "http://127.0.0.1:8000/storage/systemFiles/images/1.jpg",
                            "http://127.0.0.1:8000/storage/systemFiles/images/1.jpg",
                            "http://127.0.0.1:8000/storage/systemFiles/images/1.jpg",
                        ],
                        width: 35,
                        imagedHeight: 25,
                    },
                },
                stroke: {
                    width: 2,
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        colors: ["#111"],
                    },
                    background: {
                        enabled: true,
                        foreColor: "#fff",
                        borderWidth: 1,
                    },
                },
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 400,
                            },
                            legend: {
                                position: "bottom",
                            },
                        },
                    },
                ],

                plotOptions: {
                    pie: {
                        customScale: 1.0,
                    },
                },

                legend: {
                    show: false,
                    showForSingleSeries: false,
                    showForNullSeries: true,
                    showForZeroSeries: true,
                    position: "bottom",
                    horizontalAlign: "center",
                    floating: false,
                    fontSize: "14px",
                    fontFamily: "Helvetica, Arial",
                    fontWeight: 400,
                    formatter: undefined,
                    inverseOrder: false,
                    width: undefined,
                    height: undefined,
                    tooltipHoverFormatter: undefined,
                    customLegendItems: [],
                    offsetX: 0,
                    offsetY: 0,
                    labels: {
                        colors: undefined,
                        useSeriesColors: false,
                    },
                    markers: {
                        width: 12,
                        height: 12,
                        strokeWidth: 0,
                        strokeColor: "#fff",
                        fillColors: undefined,
                        radius: 12,
                        customHTML: undefined,
                        onClick: undefined,
                        offsetX: 0,
                        offsetY: 0,
                    },
                    itemMargin: {
                        horizontal: 5,
                        vertical: 0,
                    },
                    onItemClick: {
                        toggleDataSeries: true,
                    },
                    onItemHover: {
                        highlightDataSeries: true,
                    },
                },

                stroke: {
                    show: true,
                    curve: "smooth",
                    lineCap: "butt",
                    colors: undefined,
                    width: 4,
                    dashArray: 0,
                },
            },
        };
    },
};
</script>
