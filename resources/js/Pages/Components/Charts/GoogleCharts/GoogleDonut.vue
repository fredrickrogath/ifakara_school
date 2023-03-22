<template>
    <div class="component-wrapper py-6">
        <GChart
            type="PieChart"
            style="width: 900px; height: 300px;"
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
        ['Task', 'Hours per Day'],
        ['Work', 11],
        ['Eat', 2],
        ['Commute', 2],
        ['Watch TV', 2],
        ['Sleep', 7]
      ],
      chartOptions: {
        pieHole: 0.4,
        pieSliceTextStyle: {
          color: 'white'
        },
        slices: {
          0: { color: '#e2431e' },
          1: { color: '#f1ca3a' },
          2: { color: '#6f9654' },
          3: { color: '#1c91c0' },
          4: { color: '#43459d' }
        },
        chartArea: {
          width: '80%',
          height: '100%'
        }
      }
        };
    },
};
</script>
