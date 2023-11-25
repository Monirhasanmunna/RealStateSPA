<script setup>
    import BackButtonComponent from '@/Components/BackButtonComponent.vue';
    import MainLayout from '@/Layouts/MainLayout.vue'
    import { Head, useForm, Link } from '@inertiajs/vue3';
    import {computed} from 'vue';

    const props = defineProps({ listing : Object });

    const form = useForm({
        images : [],
    });

    const isUploaded = computed(()=> form.images.length);

    const submit = () => {
        form.post(route('realtor.listing.image.store',{listing:props.listing.id}),{
            onSuccess : () => form.reset('images'),
        });
    }

    const  addFile = (event) => {
        for(const image of event.target.files){
            form.images.push(image);
        }
    }

    const reset = () => {
        form.reset('images');
    }
    
</script>

<template>
    <MainLayout>
        <Head title="Image Upload" />
        <BackButtonComponent title="Image Upload" :href="route('realtor.listing')" class="flex bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition duration-200" />

        <form @submit.prevent="submit">
            <input type="file" multiple class="border border-gray-300 " @input="addFile" />
            <button :disabled="!isUploaded" class="bg-gray-500 p-2 rounded ml-2 text-gray-100 hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed " type="submit">Send</button>
            <button @click="reset()" type="reset" class="bg-red-500 p-2 rounded ml-2 text-gray-100 hover:bg-red-600">Reset</button>
        </form>

        <div v-if="listing.images.length" class="mt-4 box-border p-4">
            <section class=" grid grid-cols-3 gap-4">
            <div v-for="image in listing.images" :key="image.id" class="flex flex-col justify-between">
                <img :src="image.src" class="rounded-md" />
                <Link :href="route('realtor.listing.image.destroy',{listing:props.listing.id, image:image.id})"
                 method="delete" 
                 as="button" 
                 class="mt-2 btn-outline text-xs text-center" > 
                 Delete 
                </Link>
            </div>
            </section>
        </div>
    </MainLayout> 
</template>

