<script setup>
import BackButtonComponent from '@/Components/BackButtonComponent.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpaceComponent from '@/Components/ListingSpaceComponent.vue';
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';


defineProps({
    listings:Array,
});
    
</script>

<template>
    <MainLayout>
        <BackButtonComponent title="Your Listings" :href="route('listing.index')" class="flex bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition duration-200" />
        <section class="mb-8 dark:text-gray-400">Filters</section>

        <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div class="box-border p-3 " v-for="listing in listings" :key="listing.id">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <div>
                <div class="xl:flex items-center gap-2">
                    <PriceFormateComponent :price="listing.price" class="text-2xl font-medium dark:text-gray-300" />
                    <ListingSpaceComponent :listing="listing" />
                </div>

                <ListingAddress :listing="listing" class="dark:text-gray-400" />
                </div>
                <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                <Link class="btn-outline text-xs font-medium">Preview</Link>
                <Link class="btn-outline text-xs font-medium">Edit</Link>
                <Link class="btn-outline text-xs font-medium">Delete</Link>
                </div>
            </div>
            </div>
        </section>
    </MainLayout>
</template>

<style scoped>

</style>