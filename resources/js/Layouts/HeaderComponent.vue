<script setup>
    import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="py-4 shadow-md dark:bg-gray-900 dark:shadow-md dark:shadow-gray-400">
        <div class="md:container md:m-auto flex flex-wrap items-center justify-between mx-auto px-6">
        <Link :href="route('listing.index')" class="flex items-center">
            <span class="self-center text-2xl text-gray-500 font-semibold whitespace-nowrap dark:text-gray-300">Listings</span>
        </Link>

        <Link :href="route('listing.index')" class="flex items-center">
            <h1 class="text-xl text-gray-600 font-bold dark:text-gray-300">Real State</h1>
        </Link>

        <div class="flex justify-between space-x-3">
            <Link :href="route('logout')" method="post" as="button" type="button" class="bg-gray-600 text-white p-2 rounded-md hover:bg-gray-500 transition duration-200">Log Out</Link>
        </div>
    </div>
    </div>
</template>

<style scoped>

</style>