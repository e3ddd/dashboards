<template>
        <canvas :id="column" style="width: 200px; height: 200px; margin: 30px"></canvas>
</template>

<script>
import {Chart} from "chart.js/auto";

export default {
    data: () => ({
        chartType: "doughnut",
        chartOptions: {
            maintainAspectRatio: false,
            legend: {
                labels: {
                    boxWidth: 10,
                },
                position: "top",
            },
            animation: {
                duration: 2000,
                easing: "easeInOutQuart",
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
                        hoverOffset: 7
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
