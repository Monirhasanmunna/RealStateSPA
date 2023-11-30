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
                    <Link :href="route('offer.accept',{offer:offer.id})" class="btn-outline text-xs font-medium dark:text-white" as="button" method="put">Accept</Link>
                </div>
            </section>
        </div>
    </div>
</template>

<style scoped>

</style>