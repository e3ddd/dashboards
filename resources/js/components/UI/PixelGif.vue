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

    props: {
        pageName: String,
    },

    mounted() {
        this.getUserPixel()
    },

    methods: {
        async getUserPixel() {
                axios.get('/get_user_pixel')
                .then((response) => {
                    this.pixel = '/pixel/' + response.data + '/pixel.gif'
                })
                .catch(err => console.log(err))
        },
    }
}
</script>

<style scoped>

</style>
