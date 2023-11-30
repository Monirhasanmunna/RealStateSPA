<script setup>
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';

const props = defineProps({
    offer:Object
});

const date = new Date(props.offer.created_at).toDateString();

</script>

<template>
    
    <div class="box-border p-2">
      <div class="text-gray-600">Offer Made</div>
      <PriceFormateComponent :price="offer.ammount" class="text-xl dark:text-white" />
  
      <section class="mt-2 flex flex-col md:flex-row justify-between text-gray-500">
        <div>Made on</div>
        <div class="font-medium">{{ date }}</div>
      </section>
    </div>
  </template>

<style scoped>

</style>