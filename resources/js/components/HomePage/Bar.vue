<template>
    <canvas :id="column" style="width: 50px; height: 50px; margin: 30px"></canvas>
</template>

<script>
import {Chart} from "chart.js/auto";

export default {
    name: "Bar",

    data: () => ({
        chartType: "bar",
        chartOptions: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
        }
    }),

    computed: {
        chartData() {
            return {
                labels: this.labels,
                datasets: [{
                    label: "Visits",
                    data: this.points,
                    backgroundColor: this.bgColors,
                }]
            }
        }
    },

    props: {
        labels: Array,
        bgColors: Array,
        points: Array,
        column: String
    },

    mounted() {
        let {chartType,chartData,chartOptions} = this;
        this.chartConstructor(chartType, chartData, chartOptions);
    },

    methods: {
        chartConstructor(chartType, chartData, chartOptions) {
            const chartElement = document.getElementById(this.column);
            const chart = new Chart(chartElement, {
                type: chartType,
                data: chartData,
                options: chartOptions,
            });
        },
    }
}
</script>

<style scoped>

</style>
