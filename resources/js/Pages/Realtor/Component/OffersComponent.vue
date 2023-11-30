<script setup>
import {Link} from '@inertiajs/vue3'
import {computed} from 'vue'
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';

const props = defineProps({
    offer : Object,
    listingPrice : Number
});

const different = computed(() => props.offer.ammount - props.listingPrice)
const madeOn = computed(()=> new Date(props.offer.created_at).toDateString() )

</script>

<template>
    <div class="box-border p-3 ">
        <h6 class="text-md text-gray-400 font-medium dark:text-gray-600">Offer #{{ offer.id }}
             <span v-if="offer.accepted_at" class="ml-2 dark:bg-green-900 dark:text-green-200 bg-green-200 text-green-900 p-1 rounded-md uppercase">accepted</span>
             <span v-if="!offer.accepted_at && offer.rejected_at" class="ml-2 dark:bg-red-900 dark:text-red-200 bg-red-200 text-red-900 p-1 rounded-md uppercase">rejected</span>
            </h6>
        <div>
            <section class="flex item-center justify-between">
                <div class="text-lef">
                    
                    <PriceFormateComponent :price="offer.ammount" class="text-xl dark:text-white" />
                    <div class="text-gray-500">
                        Difference <PriceFormateComponent :price="different" />
                    </div>

                    <div class="text-gray-500 text-sm">
                        Made by {{ offer.bidder.name }}
                    </div>

                    <div class="text-gray-500 text-sm">
                        Made on {{ madeOn }}
                    </div>
                </div>
                <div>
                    <Link v-if="!offer.accepted_at && !offer.rejected_at" :href="route('offer.accept',{offer:offer.id})" class="btn-outline text-xs font-medium dark:text-white" as="button" method="put">Accept</Link>
                </div>
            </section>
        </div>
    </div>
</template>

<style scoped>

</style>