<template>
    <donut v-if="loaded"
        :points="this.points"
        :labels="this.labels"
        :bg-colors="this.bgColors"
        :column="this.column"
    />
</template>

<script>
import Donut from "./Donut.vue";
export default {

    components: {
        Donut
    },
    data: () => ({
        loaded: false,
        labels: [],
        points: [],
        bgColors: [],
    }),

    props: {
        column: String
    },

    mounted(){
        this.getStatistic()
    },

    methods: {
        getRandomInt(max) {
            return Math.floor(Math.random() * max);
        },

        async getStatistic() {
            this.loaded = false;
            axios.get('/get_column_statistic', {
                params: {
                    column: this.column
                }
            })
                .then(({data}) => data.map((item) => {
                    this.labels.push(item.name ?? 'Undefined');
                    this.bgColors.push('rgb('+ this.getRandomInt(255) + ',' + this.getRandomInt(255) + ',' + this.getRandomInt(255) + ')');
                    this.points.push(item.total);
                }))
                .finally(() => {
                    this.loaded = true;
                })
                .catch(err => console.log(err))
        },
    }
}
</script>

<style scoped>

</style>
