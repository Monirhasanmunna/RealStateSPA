<script setup>
import { computed } from 'vue';
import formatingPrice from '@/Composables/formatePrice.js'

const props = defineProps({
    price : [Number,String],
});


const {formattedPrice} = formatingPrice(props.price);
</script>

<template>
    <span>{{ formattedPrice }}</span>
</template>

<style scoped>

</style>