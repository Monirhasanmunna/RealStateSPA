<script setup>
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';
import {computed} from 'vue'
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    listing : Object,
});

const form = useForm({
    ammount : props.listing.price
});

const difference = computed(()=> form.ammount - props.listing.price)
const min = computed(()=> Math.round(props.listing.price / 2));
const max = computed(()=> Math.round(props.listing.price * 2));

const offerSubmit = ()=>{
  form.post(route('listing.offer.store', props.listing.id),{
    preserveScroll : true,
    preserveState : true
  });
}

</script>

<template>
    <div class="border-box" >
      <div>
        <form @submit.prevent="offerSubmit">
            <div class="text-gray-600">Make an offer</div>
            <input v-model.number="form.ammount" type="text" class="w-full border-gray-400 rounded-md" />
            <input
            v-model.number="form.ammount"
            type="range" :min="min"
            :max="max" step="100"
            class="mt-2 w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
          />
  
            <button type="submit" class="btn-outline w-full mt-2 text-sm dark:text-gray-200">
                Make an Offer
            </button>
        </form>
      </div>
      <div class="flex justify-between text-gray-500 mt-2">
        <div>Difference</div>
        <div>
            <PriceFormateComponent :price="difference" class=" text-md dark:text-gray-400" />
        </div>
      </div>
    </div>
  </template>

<style scoped>

</style>