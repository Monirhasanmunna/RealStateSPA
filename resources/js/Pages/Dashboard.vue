<script setup>
import HeaderComponent from '@/Layouts/HeaderComponent.vue';
import ListingAddress from '@/Components/ListingAddress.vue'
import { Head,Link } from '@inertiajs/vue3';

defineProps({
    listings:Object,
});
</script>

<template>
    <Head title="Listing" />

    <HeaderComponent>
        <div>
            <div class="py-5 sm:px-6 lg:px-6">
            <div v-for="listing in listings" :key="listing.id">
                <div>
                    <Link :href="route('listing.show',listing.id)">
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
        </div>
    </HeaderComponent>
</template>
