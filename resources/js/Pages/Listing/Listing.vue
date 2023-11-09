<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingSpaceComponent from '@/Components/ListingSpaceComponent.vue';
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';
import ListingMonthlyPayment from '@/Pages/Listing/ListingComponents/ListingMonthlyPayment.vue';
import { Head,Link } from '@inertiajs/vue3';

defineProps({
    listings:Array,
});
</script>

<template>
    <Head title="Listing" />

    <MainLayout>
        
        <div class="flex justify-end ">
            <Link :href="route('listing.create')" class="btn-green">+ New Create</Link>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div v-for="listing in listings" :key="listing.id" class="box-border p-3 ">
                <div>
                    <Link :href="route('listing.show',listing.id)">
                        <div class="flex space-x-2">
                            <PriceFormateComponent :price="listing.price" class="font-bold text-xl dark:text-white" />
                            <ListingMonthlyPayment :listing="listing" />
                        </div>
                        
                        <ListingSpaceComponent :listing="listing" />
                        <ListingAddress :listing="listing" />
                    </Link>
                </div>
                <div>
                    <Link :href="route('listing.edit',listing.id)">Edit</Link>
                </div>
                <div>
                    <Link :href="route('listing.destroy',listing.id)" method="DELETE" as="button">Delete</Link>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
