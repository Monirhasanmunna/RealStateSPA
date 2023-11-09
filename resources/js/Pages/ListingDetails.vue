<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpaceComponent from '@/Components/ListingSpaceComponent.vue';
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';
import BackButtonComponent from '@/Components/BackButtonComponent.vue';

defineProps({
    listing:Object,
});
    
</script>

<template>
    <Head title="Listing Details" />
    <MainLayout>
        <BackButtonComponent title="Listing Show" :href="route('listing.index')" class="flex btn-green" />
        <div>
            <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
                <div class="col-span-7 flex items-center w-full box-border p-3">
                    <div class="text-gray-600 font-semibold text-center w-full">No Images</div>
                </div>

                <div class="md:col-span-5 flex flex-col gap-4">
                    <div class="box-border p-3">
                        <PriceFormateComponent :price="listing.price" class="font-bold text-xl dark:text-white" />
                        <ListingSpaceComponent :listing="listing" />
                        <ListingAddress :listing="listing" />
                    </div>

                    <div class="box-border p-3">
                        Make an Offer
                    </div>
                </div>
                
            </div>
        </div>
        
    </MainLayout>
    
</template>

<style scoped>

</style>