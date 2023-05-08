<template>
<div class="container navbar">
    <div class="row">
        <div class="col navbar-links">
            <div class="row logo">
                <div class="col p-2">
                    <h1 style="font-family: Apple">PIXEL CREATOR</h1>
                </div>
            </div>
            <div class="row">
                <div class="col auth ml-1">
                    <div class="row" v-if="!this.auth">
                        <a id="in" href="/login">Sign in</a>
                        <small>|</small>
                        <a id="up" href="/registration">Sign up</a>
                    </div>
                    <div class="row" v-else>
                        <a id="in" href="/logout">Sign out</a>
                    </div>
                </div>

            </div>
            <div class="row" v-if="this.auth">
                <div class="col pl-2 email">
                    {{this.email}}
                </div>
            </div>
            <div class="row link">
                <div class="col p-2">
                    <a href="/">Home</a>
                </div>
            </div>
            <div class="row link">
                <div class="col p-2">
                    <a href="">Features</a>
                </div>
            </div>
            <div class="row link">
                <div class="col p-2">
                    <a href="/create_pixel">Create Pixel.gif</a>
                </div>
            </div>
            <div class="row link">
                <div class="col p-2">
                    <a href="/dashboard">Dashboard</a>
                </div>
            </div>
        </div>
    </div>


</div>
</template>

<script>
export default {
    name: "NavBar",

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
.navbar-links {
    margin-left: 30px;
}

.email {
    color: #ffff;
    font-size: 16px;
}

#in, #up {
    cursor: pointer;
}

#in:hover, #up:hover {
    text-decoration: underline;
    transition: 0.5s;
}

.auth small {
    font-size: 18px;
    color: #ffff;
}

.auth a {
    color: #ffff;
    padding: 3px;
    font-size: 14px;
}

.navbar {
    float: left;
    position: fixed;
    background: #0067c5;
    height: 100%;
    width: 15%;
}

.link a {
    text-transform: uppercase;
    padding: 10px 0px;
    font-size: 20px;
    text-decoration: none;
    color: #ffff;
}

.link a:hover {
    text-decoration: underline;
    font-size: 22px;
    transition: 0.5s;
}
</style>
