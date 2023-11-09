<script setup>
import useMothlyPayment from '@/Composables/useMonthlyPayment'
import formatingPrice from '@/Composables/formatePrice.js'
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';

const props = defineProps(['listing']);

//calculation payments monthly from composable folder
const {monthlyPayment} = useMothlyPayment(props.listing.price, 2.5, 25);

</script>

<template>
    <PriceFormateComponent class="text-sm text-gray-400 dark:text-gray-400 pt-1" :price="monthlyPayment" />
</template>

<style scoped>

</style>