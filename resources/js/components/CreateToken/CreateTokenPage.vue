<template>
    <div class="container">
        <div class="row">
            <div class="col form">
                <div class="row">
                    <h2>Create personal access token:</h2>
                </div>
                <div class="row">
                    <small>Create your personal access token to use API</small>
                </div>
                <div class="row">
                    <input type="text" v-model="this.token_name" placeholder="Enter token name...">
                </div>
            <token-modal
                :token_name="this.token_name"
                @update="this.onUpdateName"
            />
            </div>
        </div>
    </div>
    <TokenList/>
</template>

<script>
import TokenModal from "./TokenModal.vue";
import TokenList from "./TokenList.vue";
export default {
    components: {
        TokenModal,
        TokenList
    },

    name: "CreateTokenPage",

    data: () => ({
        token_name: ''
    }),

    methods: {
        onUpdateName() {
            this.token_name = ''
        }
    }

}
</script>

<style scoped>
.form {
    margin-top: 30%;
}

small {
    padding-bottom: 5px;
}

input {
    width: 100%;
    height: 35px;
}
</style>
