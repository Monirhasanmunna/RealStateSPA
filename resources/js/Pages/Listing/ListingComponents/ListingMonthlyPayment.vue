<script setup>
import useMothlyPayment from '@/Composables/useMonthlyPayment'
import formatingPrice from '@/Composables/formatePrice.js'

const props = defineProps(['listing']);

//calculation payments monthly from composable folder
const {monthlyPayment} = useMothlyPayment(props.listing.price, 2.5, 25);
const {formattedPrice} = formatingPrice(monthlyPayment.value);
</script>

<template>
    <h2 class="text-sm text-gray-400 dark:text-gray-400 pt-1">{{ formattedPrice }}</h2>
</template>

<style scoped>

</style>