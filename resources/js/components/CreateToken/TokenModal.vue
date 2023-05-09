<template>
    <div class="token_modal" v-if="show" @click="show = false">
        <div class="token_modal_item d-flex justify-content-center align-items-center" @click.stop>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h5>This token will only be shown once!</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h4>Your personal access token</h4>
                        </div>
                    </div>
                    <div class="row">
                        <b>{{this.response.token}}</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <button @click="this.createToken">Create</button>
    </div>
</template>

<script>
export default {
    name: "TokenModal",

    data: () => ({
        show: false,
        response: ''
    }),

    props: {
        token_name: String
    },

    methods: {
        async createToken() {
            axios.post('/create_token/create', {
                token_name: this.token_name
            })
                .then((response) => {
                    this.response = response.data
                })
                .finally(() => {
                    this.show = true
                    this.$emit('update')
                })
                .catch(err => console.log(err))
        },

    }
}
</script>

<style scoped>
.token_modal {
    overflow-y: scroll;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    background: rgba(0,0,0,0.5);
    position: fixed;
    display: flex;
}

.token_modal_item {
    padding: 15px;
    margin: auto;
    background: white;
    border-radius: 12px;
    min-height: 50px;
    width: 30%;
}
button {
    border-radius: 10px;
    margin-top: 10px;
    padding: 7px;
    background: none;
    color: #0f6674;
    cursor: pointer;
    border: 1px solid #0f6674;
}

button:hover {
    color: #ffff;
    background: #0f6674;
    border: none;
    transition: 0.5s;
}

h4 {
    text-decoration: underline;
}

h5 {
    color: red;
}
</style>
