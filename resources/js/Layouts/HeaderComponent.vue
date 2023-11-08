<script setup>
    import { Link } from '@inertiajs/vue3';
</script>

<template>
 <div class="flex flex-wrap items-center justify-between mx-auto py-4 px-6 shadow-md">
        <Link :href="route('listing.index')" class="flex items-center">
            <span class="self-center text-2xl text-gray-500 font-semibold whitespace-nowrap dark:text-gray-100">Listings</span>
        </Link>

        <Link :href="route('listing.index')" class="flex items-center">
            <h1 class="text-xl text-gray-600 font-bold dark:text-gray-100">M Housing</h1>
        </Link>

        <div class="flex justify-between space-x-3">
            <Link href="logout" method="post" as="button" type="button" class="bg-gray-600 text-white p-2 rounded-md hover:bg-gray-500 transition duration-200">Log Out</Link>
        </div>
    </div>
</template>

<style scoped>

</style>