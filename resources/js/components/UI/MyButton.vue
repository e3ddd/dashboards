<template>
    <button @click="func(params)"><slot></slot></button>
</template>

<script>
export default {
    name: "MyButton",

    props: {
        func: Function,
        params: [Array, Number, String]
    },
}
</script>

<style scoped>
button {
    padding: 5px;
    background: none;
    border-radius: 5px;
    box-shadow: 1px 1px 1px black;
    border: 1px solid #1564ff;
    color: #1564ff;
}

button:hover {
    transition: 0.5s;
    border: none;
    background: #1564ff;
    color: white;
    cursor: pointer;
}

</style>
