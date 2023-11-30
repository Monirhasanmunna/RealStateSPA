<script setup>
import HeaderComponent from './HeaderComponent.vue';
import {computed} from 'vue'
import { usePage } from '@inertiajs/vue3';

    const page = usePage();
    const message = computed(() => page.props.flash.message);
</script>

<template>

<HeaderComponent/>
<!-- Page Content -->
<main class="min-h-screen dark:bg-gray-900 pt-5">
    <div class="md:container m-auto">
        <div v-if="message" class="bg-green-500 p-2 px-5 mb-3 flex justify-between rounded-sm">
            <h6 class="text-sm text-semibould text-white mt-1">{{ message }}</h6>
            <button @click="$page.props.flash.message = ''" class="text-white border px-2 cursor-pointer">x</button>
        </div>
        <div class="py-5 px- space-y-6">
        <slot/>
        </div>
    </div>
</main>
</template>

<style scoped>

</style>
