<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head,Link, useForm } from '@inertiajs/vue3';
import ListingCreateForm from '@/UiComponents/ListingCreateForm.vue'
import BackButtonComponent from '@/Components/BackButtonComponent.vue';

const form = useForm({
    'beds' : null,
    'baths' : null,
    'area' : null,
    'city' : null,
    'code' : null,
    'street' : null,
    'street_no' : null,
    'price' : null,
});


const submit = ()=>{
    form.post(route('listing.store'),{
        onSuccess : () => form.reset(),
    });
};

</script>

<template>
    <Head title="Listing Create" />
    <MainLayout>
        <BackButtonComponent title="Listing Create" :href="route('listing.index')" class="flex bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition duration-200" />
        
        <div class="grid grid-cols-1">
            <ListingCreateForm :form="form" @submit="submit" :errors="form.errors" />
        </div>
    </MainLayout>
</template>

<style scoped>

</style>