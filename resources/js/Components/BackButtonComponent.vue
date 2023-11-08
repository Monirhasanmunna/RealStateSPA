<script setup>
    import { Link } from '@inertiajs/vue3';
    import { Icon } from '@iconify/vue';

    defineProps(['title','href','class']);
</script>

<template>
<div class="flex justify-between ">
    <h1 class="text-xl text-gray-500 font-medium dark:text-white">{{ title }}</h1>
    <Link :class="class" :href="href"><Icon style="margin-top:2px;" icon="material-symbols:arrow-back" width="20" />Back</Link>
</div>
</template>

<style scoped>

</style>