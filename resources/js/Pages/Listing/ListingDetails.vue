<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpaceComponent from '@/Components/ListingSpaceComponent.vue';
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';
import BackButtonComponent from '@/Components/BackButtonComponent.vue';
import {ref, computed} from 'vue';
import useMothlyPayment from '@/Composables/useMonthlyPayment'

const props = defineProps({
    listing:Object,
});

const interestRate = ref(10);
const duration = ref(10);

//calculation payments monthly from composable folder
const {monthlyPayment} = useMothlyPayment(props.listing.price, interestRate, duration);

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
                        <PriceFormateComponent :price="props.listing.price" class="font-bold text-xl dark:text-white" />
                        <ListingSpaceComponent :listing="props.listing" />
                        <ListingAddress :listing="props.listing" />
                    </div>

                    <div class="box-border p-3 space-y-3">
                        <h6 class="text-md text-gray-400 font-medium dark:text-gray-600">Monthly payment</h6>
                        <div class="space-y-3">
                            <div>
                                <label class="label">Interest rate ({{ interestRate }}%)</label>
                                <input type="range" min="0.1" max="30" step="0.1" v-model.number="interestRate" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"/>
                            </div>
                            
                            <div>
                                <label class="label">Duration ({{ duration }} years)</label>
                                <input type="range" min="1" max="35" step="1" v-model.number="duration" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />
                            </div>
                            
                            <div class="text-gray-600 dark:text-gray-300 mt-2">
                                <div class="text-gray-400">Your monthly payment</div>
                                <PriceFormateComponent :price="monthlyPayment" class="text-3xl" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
    
</template>

<style scoped>

</style>