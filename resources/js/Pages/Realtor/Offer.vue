<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import { Link } from '@inertiajs/vue3';
    import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';
import ListingSpaceComponent from '@/Components/ListingSpaceComponent.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import {computed} from 'vue'
import OffersComponent from '@/Pages/Realtor/Component/OffersComponent.vue'

const props = defineProps({
    listing : Object
})

const hasOrders = computed(() => props.listing.offers.length)
</script>

<template>
    <MainLayout>
        <div class="mb-4 dark:text-white">
            <Link :href="route('realtor.listing')">
            👈 Go back to Listing</Link>
        </div>
        <div>
        <section class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4 ">
            <div v-if="!hasOrders" class="box-border flex md:col-span-7 items-center">
                <div class="w-full text-center font-medium text-gray-500">
                    No offers
                </div>
            </div>

            <div v-else="!hasOrders" class="flex md:col-span-7 flex-col">
                <OffersComponent v-for="(offer, index) in listing.offers" :key="index" :offer="offer" :listing-price="listing.price" class="mb-4 w-full" />
            </div>

            <div class="md:col-span-5">
                <div class="box-border p-3">
                    <h6 class="text-md text-gray-400 font-medium dark:text-gray-600">Basic Info</h6>
                    <PriceFormateComponent :price="listing.price" class="text-xl font-bold dark:text-gray-200" />
                    <ListingSpaceComponent :listing="listing" class="text-lg" />
                    <ListingAddress :listing="listing" class="text-gray-500" />
                </div>
            </div>
             

        </section>
        </div>
        
    </MainLayout>
</template>

<style scoped>

</style>