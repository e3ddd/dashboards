<template>
    <div class="row" v-if="pixel !== '' && referral === ''">
        <div class="col-4">
            <top-table
                :pixel="pixel"
                :column="name"
                :type="'bar'"
            />
        </div>
        <div class="col-5">
            <top-table
                :pixel="pixel"
                :column="name"
                :type="'donut'"
            />
        </div>
        <div class="col-3 table">
            <top-table
                :pixel="pixel"
                :column="name"
                :type="'table'"
            />
        </div>
    </div>
    <div class="row" v-if="referral !== ''">
        <div class="col-4">
            <top-table
                :pixel="pixel"
                :referral="referral"
                :column="name"
                :type="'bar'"
            />
        </div>
        <div class="col-5">
            <top-table
                :pixel="pixel"
                :referral="referral"
                :column="name"
                :type="'donut'"
            />
        </div>
        <div class="col-3 table">
            <top-table
                :pixel="pixel"
                :referral="referral"
                :column="name"
                :type="'table'"
            />
        </div>
    </div>
</template>

<script>
import TopTable from "../HomePage/TopTable.vue";
export default {
    components: {
      TopTable
    },

    props: {
        name: String,
        pixel: String,
        referral: String,
    },

    name: "StatisticDashboardItem"
}
</script>

<style scoped>
.table {
    margin-top: 100px;
}
</style>
