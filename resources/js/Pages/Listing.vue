<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingSpaceComponent from '@/Components/ListingSpaceComponent.vue';
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';
import { Head,Link } from '@inertiajs/vue3';

defineProps({
    listings:Object,
});
</script>

<template>
    <Head title="Listing" />

    <MainLayout>
        
        <div class="flex justify-end ">
            <Link :href="route('listing.create')" class="bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition duration-200">+ New Create</Link>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div v-for="listing in listings" :key="listing.id" class="border-2 border-gray-300 p-3 ">
                <div>
                    <Link :href="route('listing.show',listing.id)">
                        <PriceFormateComponent :price="listing.price" class="font-bold text-xl dark:text-white" />
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
