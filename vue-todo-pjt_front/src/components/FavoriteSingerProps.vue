<template>
    <div><img class="imgsize" :src="imgSrc"></div>
</template>

<script>
export default {    
    props: {
        imgSrc: String,
    }
}
</script>

<style scoped>
    .imgsize {width: 200px; }
</style>