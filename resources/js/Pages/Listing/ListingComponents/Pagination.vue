<script setup>
    import {Link} from '@inertiajs/vue3'
    defineProps({
        links:Array,
    });
</script>

<template>
<div class="flex justify-center space-x-1">
    <Link
    v-for="(link, index) in links" :key="index" 
    class="bg-green-400 p-2 px-4 rounded"
    :class="{'bg-green-600 text-gray-200' : link.active}"
    :href="link.url"
    v-html="link.label"
    >
    </Link>
</div>
</template>

<style scoped>

</style>