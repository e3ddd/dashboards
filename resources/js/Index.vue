<template>
    <pixel-gif/>
    <div class="container body">
        <div class="row">
            <top-table
                :column="'city'"
            />
            <top-table
                :column="'platform'"
            />
            <top-table
                :column="'browser'"
            />
            <top-table
                :column="'device'"
            />
            <top-table
                :column="'language'"
            />
        </div>
    </div>

</template>

<script>
import TopTable from "./components/HomePage/TopTable.vue";
import PixelGif from "./components/UI/PixelGif.vue";

export default {
    components: {
        PixelGif,
        TopTable
    },


    methods: {

    }
}
</script>

<style scoped>

h1  {
    margin-top: 100%;
}
</style>
