<script setup>
import BackButtonComponent from '@/Components/BackButtonComponent.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpaceComponent from '@/Components/ListingSpaceComponent.vue';
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link, Head } from '@inertiajs/vue3';
import RealtorFilter from '@/Pages/Realtor/Component/RealtorFilter.vue';
import Pagination from '@/Pages/Listing/ListingComponents/Pagination.vue';


defineProps({
    listings:Object,
    filters:Object
});
    
</script>

<template>
    <Head title="Your Listing" />
    <MainLayout>
        <BackButtonComponent title="Your Listings" :href="route('listing.index')" class="flex bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition duration-200" />
        <section>
            <RealtorFilter :filters="filters" />
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div class="box-border p-3 " v-for="listing in listings.data" :key="listing.id">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <div>
                <div class="xl:flex items-center gap-2">
                    <PriceFormateComponent :price="listing.price" class="text-2xl font-medium dark:text-gray-300" />
                    <ListingSpaceComponent :listing="listing" />
                </div>

                <ListingAddress :listing="listing" class="dark:text-gray-400" />
                </div>
                <section>
                    <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                        <Link :href="route('realtor.listing.show',{listing:listing.id})" class="btn-outline text-xs font-medium">Preview</Link>
                        <Link :href="route('realtor.listing.edit',{listing:listing.id})" as="button" type="button" class="btn-outline text-xs font-medium">Edit</Link>
                        <Link :href="route('realtor.listing.destroy',{listing:listing.id})" method="delete" as="button" type="button" class="btn-outline text-xs font-medium">Delete</Link>
                    </div>
                    <div class="mt-2 space-y-2">
                        <Link :href="route('realtor.listing.image.create',{listing:listing.id})" class="block w-full btn-outline text-xs font-medium text-center dark:text-white">Images ({{ listing.images_count }})</Link>
                        <Link :href="route('realtor.listing.offer.show',{listing:listing.id})" class="block w-full btn-outline text-xs font-medium text-center dark:text-white">Offers ({{ listing.offers_count }})</Link>
                    </div>
                </section>
            </div>
            </div>
        </section>

        <div v-if="listings.data.length">
            <Pagination class="mt-20" :links="listings.links"  />
        </div>
    </MainLayout>
</template>

<style scoped>

</style>