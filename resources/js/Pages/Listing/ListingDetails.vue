<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpaceComponent from '@/Components/ListingSpaceComponent.vue';
import PriceFormateComponent from '@/Components/PriceFormateComponent.vue';
import BackButtonComponent from '@/Components/BackButtonComponent.vue';
import {ref, computed} from 'vue';
import {Head} from '@inertiajs/vue3'
import useMothlyPayment from '@/Composables/useMonthlyPayment'
import MakeOffer from './Show/Components/MakeOffer.vue';

const props = defineProps({
    listing:Object,
});

const interestRate = ref(10);
const duration = ref(10);

//calculation payments monthly from composable folder
const {monthlyPayment, totalPaid, totalInterest} = useMothlyPayment(props.listing.price, interestRate, duration);

</script>

<template>
    <Head title="Listing Details" />
    <MainLayout>
        <BackButtonComponent title="Listing Show" :href="route('listing.index')" class="flex btn-green" />
        <div>
            <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
                <div class="col-span-7 flex items-center w-full box-border p-3">
                    <div v-if="listing.images.length" class="grid grid-cols-2 gap-1">
                        <img v-for="image in listing.images" :key="image.id" :src="image.src" alt="">
                    </div>
                    <div v-else class="text-gray-600 font-semibold text-center w-full">No Images</div>
                </div>

                <div class="md:col-span-5 flex flex-col gap-4">
                    <div class="box-border p-3 space-y-1">
                        <h6 class="text-md text-gray-400 font-medium dark:text-gray-600">Basic Info</h6>
                        <div>
                            <PriceFormateComponent :price="props.listing.price" class="font-bold text-xl dark:text-gray-400" />
                            <ListingSpaceComponent :listing="props.listing" />
                            <ListingAddress :listing="props.listing" class="dark:text-gray-600" />
                        </div>
                        
                    </div>

                    <div class="box-border p-3 space-y-3">
                        <h6 class="text-md text-gray-400 font-medium dark:text-gray-600">Monthly payment</h6>
                        <div class="space-y-3">
                            <div>
                                <label class="label dark:text-gray-600">Interest rate ({{ interestRate }}%)</label>
                                <input type="range" min="0.1" max="30" step="0.1" v-model.number="interestRate" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"/>
                            </div>
                            
                            <div>
                                <label class="label dark:text-gray-600">Duration ({{ duration }} years)</label>
                                <input type="range" min="1" max="35" step="1" v-model.number="duration" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />
                            </div>
                            
                            <div class="text-gray-600 dark:text-gray-300 mt-2">
                                <div class="text-gray-600">Your monthly payment</div>
                                <PriceFormateComponent :price="monthlyPayment" class="text-3xl" />
                            </div>

                            <div class="mt-2 text-gray-500">

                                <div class="flex justify-between">
                                    <div>
                                        Total paid
                                    </div>
                                    <div>
                                        <PriceFormateComponent :price="totalPaid" class="font-medium" />
                                    </div>
                                </div>

                                <div class="flex justify-between">
                                    <div>
                                        Principal paid
                                    </div>
                                    <div>
                                        <PriceFormateComponent :price="listing.price" class="font-medium" />
                                    </div>
                                </div>

                                <div class="flex justify-between">
                                    <div>
                                        Total Interest
                                    </div>
                                    <div>
                                        <PriceFormateComponent :price="totalInterest" class="font-medium" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <MakeOffer :listing="listing" />
                </div>
            </div>
        </div>
    </MainLayout>
    
</template>

<style scoped>

</style>