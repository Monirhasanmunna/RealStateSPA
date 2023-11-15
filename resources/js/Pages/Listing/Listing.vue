<script setup>
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head,Link } from '@inertiajs/vue3';
import ListingMonthlyPayment from './ListingComponents/ListingMonthlyPayment.vue';
import ListingSpaceComponent from '@/Components/ListingSpaceComponent.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import Pagination from './ListingComponents/Pagination.vue';
import Filter from './ListingComponents/Filter.vue';

defineProps({
    listings:Object,
    filters:Object,
});
</script>

<template>
    <Head title="Listing" />

    <MainLayout>
        
        <div class="flex justify-end ">
            <Link :href="route('listing.create')" class="btn-green">+ New Create</Link>
        </div>

        <div>
            <Filter :filters="filters" />
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div v-for="listing in listings.data" :key="listing.id" class="box-border p-3 ">
                <div>
                    <Link :href="route('listing.show',listing.id)">
                        <div class="flex space-x-2">
                            <PriceFormateComponent :price="listing.price" class="font-bold text-xl dark:text-gray-400" />
                            <ListingMonthlyPayment :listing="listing" />
                        </div>
                        
                        <ListingSpaceComponent :listing="listing"  />
                        <ListingAddress :listing="listing" class="dark:text-gray-500" />
                    </Link>
                </div>
                <div>
                    <Link :href="route('listing.edit',listing.id)" class="dark:text-gray-500">Edit</Link>
                </div>

                <div>
                    <Link class="dark:text-gray-500" :href="route('listing.destroy',listing.id)" method="DELETE" as="button">Delete</Link>
                </div>
            </div>
        </div>
        </div>
        
        <div v-if="listings.data.length">
            <Pagination class="mt-20" :links="listings.links"  />
        </div>
    </MainLayout>
</template>
