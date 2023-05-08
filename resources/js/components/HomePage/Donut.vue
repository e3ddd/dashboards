<template>
    <div class="col-5 m-4">
        <canvas :id="column" style="width: 500px; height: 500px; margin: 30px"></canvas>
    </div>
</template>

<script>
import {Chart} from "chart.js/auto";

export default {
    data: () => ({
        chartType: "pie",
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
                    borderColor: 'black',
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
