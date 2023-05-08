<template>
    <div class="container table">
        <div class="row label">
            <div class="col">
                <small>Num.</small>
            </div>
            <div class="col">
                <small>Pixel.gif ID</small>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row item" v-for="(gif, key) in pixelGifs">
                    <div class="col mt-2">
                        {{key + 1}}
                    </div>
                    <div class="col mt-2 pixel_link">
                        <a :href="'/pixel/' + gif.pixel +'/pixel.gif'">http://127.0.0.1:8000/pixel/{{gif.pixel}}/pixel.gif</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PixelIDsList",
    props: {
        pixelGifs: Array
    }
}
</script>

<style scoped>
.label {
    border-bottom: 1px solid black;
}

.table {
    border: 1px solid black;
    box-shadow: 2px 2px 2px lightgrey;
    margin-top: 50px;
}

.pixel_link {
    color: #0f6674;
}

.item {
    padding-bottom: 10px;
    border-bottom: 1px solid black;
}
</style>
