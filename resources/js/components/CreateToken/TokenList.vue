<template>
    <div class="container token_list">
        <div class="row">
            <div class="col list"  v-if="this.tokens !== []">
                <div class="row">
                    <div class="col">Token name</div>
                    <div class="col d-flex justify-content-center">Created at</div>
                    <div class="col"></div>
                </div>
                <div class="row mt-4" v-for="token in this.tokens">
                    <div class="col">
                        {{token.name}}
                    </div>
                    <div class="col d-flex justify-content-center">
                        {{token.created_at}}
                    </div>
                    <div class="col d-flex justify-content-center">
                        <button @click="this.destroyToken(token.id)">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TokenList",
    data: () => ({
        tokens: []
    }),

    mounted() {
        this.getUserTokens()
    },

    methods: {
        async getUserTokens() {
            axios.get('/get_user_tokens', {})
                .then((response) => {
                    this.tokens = response.data
                })
                .catch(err => console.log(err))
        },

        async destroyToken(tokenId) {
            axios.post('/destroy_token', {
                tokenId: tokenId
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
.token_list {
    margin-top: 100px;
}

button {
    border-radius: 10px;
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

.list {
    padding: 40px;
    border: 1px solid silver;
    box-shadow: 2px 2px 2px lightgrey;
}
</style>
