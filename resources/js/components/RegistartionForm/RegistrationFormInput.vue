<template>
    <div class="row item">
        <div class="col">
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <label for="email">{{label}}</label>
                </div>
            </div>
            <div class="row">
                <my-input
                    :type="type"
                    :placeholder="placeholder"
                    @onUpdate="this.onUpdate"
                />
            </div>
        </div>
    </div>
</template>

<script>
import MyInput from "../UI/MyInput.vue";
export default {
    components: {
        MyInput
    },

    data() {
        return {
            value: ''
        }
    },

    props: {
        label: String,
        type: String,
        placeholder: String,
    },

    watch: {
        value(newValue, oldValue){
            this.$emit('onUpdate', newValue)
        }
    },

    methods: {
        onUpdate(value){
            this.value = value
        }
    },

    name: "RegistrationFormInput.vue"
}
</script>

<style scoped>
.item {
    margin: 10px;
}
</style>
