<template>
    <div class="container">
        <div class="row">
            <div class="col mt-4">
                <h1>
                    Hello,
                    <span v-if="this.auth">{{this.email}}</span>
                    <span v-else>User</span>
                    !
                </h1>
            </div>
        </div>
        <div class="row text1">
          <text1/>
        </div>
    </div>
</template>

<script>
import PixelGif from "./components/UI/PixelGif.vue";
import Text1 from "./components/TestTexts/Text1.vue";
export default {
    components: {
        PixelGif,
        Text1
    },
    data: () => ({
        auth: false,
        email: '',
    }),

    mounted() {
        this.checkAuthUser();
    },

    methods: {
        async checkAuthUser() {
            axios.get('/check_auth')
                .then((response) => {
                    if(response.data !== ''){
                        this.auth = true
                        this.email = response.data.email
                    }
                })
        }
    }
}
</script>

<style scoped>
.text1 {
    margin-top: 80px;
}
</style>
