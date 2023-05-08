<template>
    <img :src="this.pixel" alt=""/>
</template>

<script>
export default {
    name: "PixelGif",
    data() {
        return {
            pixel: ''
        }
    },

    mounted() {
        this.getUserPixel()
    },

    methods: {
        async getUserPixel() {
            const response = await axios.get('/get_user_pixel')
                .then((response) => {
                    this.pixel = '/pixel/' + response.data + '/pixel.gif'
                })
                .catch(err => console.log(err))
        },


        async submit() {
            const response = await axios.get('/test').then(response => console.log(response))
        }
    }
}
</script>

<style scoped>

</style>
