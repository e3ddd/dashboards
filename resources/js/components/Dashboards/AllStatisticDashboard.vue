<template>
    <div class="container body">
        <div class="col p-0 pb-5">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <h3>Select your pixel.gif</h3>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <select name="pixels" v-model="this.selectedPixel">
                                <option value="">Select pixel.gif</option>
                                <option v-for="pixel in this.pixels.data">{{pixel.pixel}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-4" v-if="this.selectedPixel !== ''">
                <div class="col">
                    <div class="row">
                        <h3>Select your referral</h3>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <select name="pixels" v-model="this.selectedReferral">
                                <option value="">Select referral</option>
                                <option v-for="referral in this.referrals">{{referral}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboards" v-if="this.selectedPixel !== '' && this.selectedReferral === ''">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Cities</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedPixel"
                :name="'city'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Platforms</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedPixel"
                :name="'platform'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Devices</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedPixel"
                :name="'device'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Browsers</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedPixel"
                :name="'browser'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Languages</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedPixel"
                :name="'language'"
            />
        </div>
        <div class="dashboards" v-if="this.selectedReferral !== ''">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Cities</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedPixel"
                :referral="this.selectedReferral"
                :name="'city'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Platforms</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedPixel"
                :referral="this.selectedReferral"
                :name="'platform'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Devices</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedPixel"
                :referral="this.selectedReferral"
                :name="'device'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Browsers</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedPixel"
                :referral="this.selectedReferral"
                :name="'browser'"
            />
            <div class="row">
                <div class="d-flex justify-content-center">
                    <h2>Top of Languages</h2>
                </div>
            </div>
            <StatisticDashboardItem
                :pixel="this.selectedPixel"
                :referral="this.selectedReferral"
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
        pixels: [],
        selectedPixel: '',
        referrals: [],
        selectedReferral: '',
    }),

    mounted() {
        this.getUserPixelGifs()
    },

    watch: {
        selectedPixel(newValue, oldValue){
            this.getPixelReferrals(newValue)
        },
    },

    methods: {
        async getUserPixelGifs() {
            axios.get('/get_user_pixel', {})
                .then((response) => {
                    this.pixels = response.data
                })
                .catch((err) => {
                    console.log(err)
                })
            },
        async getPixelReferrals(pixel) {
            axios.get('/get_pixel_referrals', {
                params: {
                    pixel: pixel
                }
            })
                .then((response) => {
                    console.log(response)
                    this.referrals.push(response.data)
                })
                .catch(err => console.log(err))
        }
    }
}
</script>

<style scoped>

</style>
