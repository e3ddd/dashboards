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
                <div class="row item" v-for="(gif, key) in pixelGifs.data">
                    <div class="col mt-2">
                        {{key + 1}}
                    </div>
                    <div class="col mt-2 pixel_link">
                        <a :href="'/pixel/' + gif.pixel +'/pixel.gif'">{{gif.url}}</a>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <button @click="this.destroyPixel(gif.id)">Delete</button>
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
    },

    methods: {
        async destroyPixel(pixelId) {
            axios.delete('/pixel/delete/' + pixelId, {
                params: {
                    pixelId: pixelId
                }
            })
                .then(() => {
                    location.reload()
                })
                .catch(err => console.log(err))
        }
    }
}
</script>

<style scoped>
button {
    height: 30px !important;
    border-radius: 10px;
    margin-top: 15px;
    padding: 0px 30px 0px 30px;
    background: none;
    border: 1px solid red;
    color: red;
    cursor: pointer;
}

button:hover {
    transition: 0.5s;
    background: red;
    color: #fff;
}

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
