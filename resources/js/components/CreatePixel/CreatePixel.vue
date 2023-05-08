<template>
    <div class="container">
        <div class="row">
            <div class="col create_form">
                <div class="row label">
                    Crete new pixel ID
                </div>
                <div class="row">
                    <small>Creates a new pixel ID in UUID format</small>
                </div>
                <div class="row">
                </div>
                <div class="row button">
                    <button @click="this.createPixel">Create</button>
                </div>
                <div class="row err" v-if="this.err !== ''">
                    {{ this.err }}
                </div>
            </div>
        </div>

        <div class="row">
            <PixelIDsList
                :pixel-gifs="this.pixels"
            />
        </div>
    </div>
</template>

<script>
import PixelIDsList from "./PixelIDsList.vue";
export default {
    components: {
        PixelIDsList
    },
    name: "CreatePixel",

    data: () => ({
        pixels: [],
        err: ''
    }),

    mounted() {
        this.getUserPixelIds()
    },

    methods: {
        async getUserPixelIds() {
            axios.get('/get_user_pixel')
                .then((response) => {
                    this.pixels = response.data
                })
                .catch(err => console.log(err))
        },

        async createPixel() {
            axios.get('/create_pixel/create')
                .then((response) => {
                    alert('Pixel created')
                    location.reload()
                })
                .catch((err) => {
                    this.err = err.response.data.message

                    setTimeout(() => {this.err = ''}, 3000)
                })
        }
    }
}
</script>

<style scoped>
.err {
    margin-top: 10px;
    font-size: 14px;
    color: red;
}

.label {
    font-size: 30px;
}

.create_form {
    margin-top: 25%;
    padding: 20px;
}

input {
    width: 100%;
}

button {
    margin-top: 10px;
    background: none;
    border-radius: 10px;
    border: 2px solid #0067c5;
    color: #0067c5;
    padding: 5px 30px 5px 30px;
}

button:hover {
    background: #0067c5;
    color: #ffff;
    transition: 0.5s;
    cursor: pointer;
}
</style>
