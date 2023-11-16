<script setup>
    import { Link } from '@inertiajs/vue3';
    import { usePage } from '@inertiajs/vue3';
    import {computed} from 'vue';

    const page = usePage();
    const user = computed(()=>page.props.auth.user);
</script>

<template>
    <div class="py-4 shadow-md dark:bg-gray-900 dark:shadow-md dark:shadow-gray-400">
        <div class="md:container md:m-auto flex flex-wrap items-center justify-between mx-auto px-6">
            <Link :href="route('listing.index')" class="flex items-center">
                <span class="self-center text-2xl text-gray-500 font-semibold whitespace-nowrap dark:text-gray-300">Listings</span>
            </Link>

            <Link :href="route('listing.index')" class="flex items-center">
                <h1 class="text-xl text-gray-600 font-bold dark:text-gray-300">Simple Real State</h1>
            </Link>

            <div v-if="user" class="flex justify-between space-x-3 ">
                <Link :href="route('realtor.listing')" class="text-gray-600 dark:text-gray-400 p-1">{{ user?.name }}</Link>
                <Link :href="route('logout')" method="post" as="button" type="button" class="text-gray-200 bg-gray-600 p-1 px-2 rounded dark:text-gray-300">Logout</Link>
            </div>

            <div v-else>
                <Link :href="route('login')" class="text-gray-600 bg-gray-600 p-2  rounded dark:text-gray-300">Login</Link>
            </div>

        </div>
    </div>
</template>

<style scoped>

</style>