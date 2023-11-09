<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head,Link, useForm } from '@inertiajs/vue3';
import BackButtonComponent from '@/Components/BackButtonComponent.vue';
import ListingEditForm from '@/UiComponents/ListingEditForm.vue';

const props = defineProps({
    listing : Object,
});

const form = useForm({
    'beds' : props.listing.beds,
    'baths' : props.listing.baths,
    'area' : props.listing.area,
    'city' : props.listing.city,
    'code' : props.listing.code,
    'street' : props.listing.street,
    'street_no' : props.listing.street_no,
    'price' : props.listing.price,
});


const update = ()=>{
    form.put(route('listing.update',props.listing.id),{
        onSuccess : () => form.reset(),
    });
};

</script>

<template>
    <Head title="Listing Edit" />
    <MainLayout>
        <BackButtonComponent title="Listing Edit" :href="route('listing.index')" class="flex bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition duration-200" />
        
        <div class="grid grid-cols-1">
            <ListingEditForm :form="form" @update="update" />
        </div>
    </MainLayout>
</template>

<style scoped>

</style>