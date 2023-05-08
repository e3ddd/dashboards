<template>
    <donut
        v-if="loaded && type === 'donut'"
        :points="this.points"
        :labels="this.labels"
        :bg-colors="this.bgColors"
        :column="this.column + 'donut'"
    />

    <bar
        v-if="loaded && type === 'bar'"
        :points="this.points"
        :labels="this.labels"
        :bg-colors="this.bgColors"
        :column="this.column + 'bar'"
    />

    <div class="table" v-if="loaded && type === 'table'">
        <div class="row">
            <div class="col">
                <small>Pos.</small>
            </div>
            <div class="col">
                <small>Color</small>
            </div>
            <div class="col">
                <small>Name</small>
            </div>
            <div class="col">
                <small>Visit points</small>
            </div>
        </div>
        <div class="row" v-for="(label, key) in this.labels">
            <div class="col" v-if="label !== 'others'">
                {{key + 1}}.
            </div>
            <div class="col" v-else></div>
            <div class="col-1 tableBar" :style="'background-color:' + this.bgColors[key] +';'">
            </div>
            <div class="col-4 ml-3 d-flex justify-content-center">
                {{label}}
            </div>
            <div class="col-3">
                {{this.points[key]}} visits
            </div>
        </div>
    </div>
</template>

<script>
import Donut from "./Donut.vue";
import Bar from "./Bar.vue";
export default {

    components: {
        Bar,
        Donut
    },
    data: () => ({
        loaded: false,
        labels: [],
        points: [],
        bgColors: [
            'rgb('+  66 + ',' + 130 + ',' + 211 + ')',
            'rgb('+  255 + ',' + 187 + ',' + 64 + ')',
            'rgb('+  175 + ',' + 59 + ',' + 212 + ')',
            'rgb('+  61 + ',' + 160 + ',' + 40 + ')',
            'rgb('+  255 + ',' + 143 + ',' + 64 + ')',
        ],
    }),

    props: {
        column: String,
        type: String,
    },

    mounted(){
        this.getStatistic()
    },

    methods: {
        async getStatistic() {
            this.loaded = false;
            axios.get('/get_column_statistic', {
                params: {
                    column: this.column
                }
            })
                .then(({data}) => data.map((item) => {
                    this.labels.push(item.name ?? 'Undefined');
                    if(item.name === 'others'){
                        this.bgColors.push('rgb('+ 149 + ',' + 149 + ',' + 149 + ')');
                    }
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
.table {
    width: 400px;
    height: 200px;
    margin-left: 100px;
    padding: 20px;
    border: 1px solid lightgrey;
    box-shadow: 2px 2px 2px grey;
}

.tableBar {
    margin-top: 7px;
    width: 10px;
    height: 10px;
}
</style>
