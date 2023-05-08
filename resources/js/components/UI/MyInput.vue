<template>
    <input :type="type" @input="update" v-model="value" :placeholder="placeholder">
</template>

<script>
export default {
    name: "MyInput",

    data() {
      return {
          value: ''
      }
    },

    props: {
        type: String,
        placeholder: String,
    },

    methods: {
        update(event) {
            this.$emit('onUpdate', event.target.value)
        }
    }
}
</script>

<style scoped>
input {
    width: 100%;
    padding: 6px;
    border-radius: 5px;
    border: 1px solid lightgrey;
}
</style>
