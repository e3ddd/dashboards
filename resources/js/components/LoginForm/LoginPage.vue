<template>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col logForm">
                <login-form/>
            </div>
        </div>
    </div>
</template>

<script>
import LoginForm from "./LoginForm.vue";
export default {
    components: {
        LoginForm
    },

    name: "LoginPage"
}
</script>

<style scoped>
.logForm {
    border-radius: 10px;
    margin-top: 50%;
    border: 1px solid silver;
    box-shadow:  2px 2px 2px gray;
}
</style>
