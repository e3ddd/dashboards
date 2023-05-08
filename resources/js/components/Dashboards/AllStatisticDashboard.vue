<template>
    <pixel-gif/>
    <div class="container body">
        <div class="row">
            <div class="d-flex justify-content-center">
                <h2>Top of Cities</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <top-table
                    :column="'city'"
                    :type="'bar'"
                />
            </div>
            <div class="col-5">
                <top-table
                    :column="'city'"
                    :type="'donut'"
                />
            </div>
            <div class="col-2 table">
                <top-table
                    :column="'city'"
                    :type="'table'"
                />
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                <h2>Top of Platforms</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <top-table
                    :column="'platform'"
                    :type="'bar'"
                />
            </div>
            <div class="col-5">
                <top-table
                    :column="'platform'"
                    :type="'donut'"
                />
            </div>
            <div class="col-2 table">
                <top-table
                    :column="'platform'"
                    :type="'table'"
                />
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                <h2>Top of Devices</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <top-table
                    :column="'device'"
                    :type="'bar'"
                />
            </div>
            <div class="col-5">
                <top-table
                    :column="'device'"
                    :type="'donut'"
                />
            </div>
            <div class="col-2 table">
                <top-table
                    :column="'device'"
                    :type="'table'"
                />
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                <h2>Top of Browsers</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <top-table
                    :column="'browser'"
                    :type="'bar'"
                />
            </div>
            <div class="col-5">
                <top-table
                    :column="'browser'"
                    :type="'donut'"
                />
            </div>
            <div class="col-2 table">
                <top-table
                    :column="'browser'"
                    :type="'table'"
                />
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                <h2>Top of Languages</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <top-table
                    :column="'language'"
                    :type="'bar'"
                />
            </div>
            <div class="col-5">
                <top-table
                    :column="'language'"
                    :type="'donut'"
                />
            </div>
            <div class="col-2 table">
                <top-table
                    :column="'language'"
                    :type="'table'"
                />
            </div>
        </div>
    </div>

</template>

<script>
import TopTable from "../HomePage/TopTable.vue";
import PixelGif from "../UI/PixelGif.vue";

export default {
    components: {
        PixelGif,
        TopTable,
    },


    methods: {

    }
}
</script>

<style scoped>
.table {
    margin-top: 100px;
}
</style>
