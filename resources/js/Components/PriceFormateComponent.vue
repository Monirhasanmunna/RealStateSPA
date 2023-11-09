<script setup>
import { computed } from 'vue';
const props = defineProps({
    price : [Number,String],
});

const formattedPrice = computed(
    ()=> Number(props.price).toLocaleString("en-Us", { 
        style: "currency",
        currency: "USD",
        maximumFractionDigit:2
    }),
);

</script>

<template>
    <span>{{ formattedPrice }}</span>
</template>

<style scoped>

</style>