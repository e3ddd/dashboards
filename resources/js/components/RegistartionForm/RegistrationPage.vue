<template>
<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col regForm">
            <registration-form/>
        </div>
    </div>
</div>
</template>

<script>
import RegistrationForm from "./RegistrationForm.vue";
export default {
    components: {
      RegistrationForm
    },
    name: "RegistrationPage"
}
</script>

<style scoped>
.regForm {
    border-radius: 10px;
    margin-top: 50%;
    border: 1px solid silver;
    box-shadow:  2px 2px 2px gray;
}
</style>
