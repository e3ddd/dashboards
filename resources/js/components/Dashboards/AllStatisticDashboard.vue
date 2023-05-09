<template>
    <div class="container body">
        <div class="col p-0 pb-5">
            <div class="row">
                <h3>Select your pixel.gif</h3>
            </div>
            <div class="row">
                <div class="col p-0">
                    <select name="pixels" v-model="this.selectedGif">
                        <option value="">Select pixel.gif</option>
                        <option v-for="gif in this.gifs.data">{{gif.pixel}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="dashboards" v-if="this.selectedGif !== ''">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Cities</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedGif"
                :name="'city'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Platforms</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedGif"
                :name="'platform'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Devices</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedGif"
                :name="'device'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Browsers</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedGif"
                :name="'browser'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Languages</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedGif"
                :name="'language'"
            />
        </div>
    </div>

</template>

<script>
import StatisticDashboardItem from "./StatisticDashboardItem.vue";
export default {
    components: {
        StatisticDashboardItem
    },

    data: () => ({
        gifs: [],
        selectedGif: '',
    }),

    mounted() {
        this.getUserPixelGifs()
    },

    methods: {
        async getUserPixelGifs() {
            axios.get('/get_user_pixel', {})
                .then((response) => {
                    this.gifs = response.data
                })
                .catch((err) => {
                    console.log(err)
                })

        }
    }
}
</script>

<style scoped>

</style>
