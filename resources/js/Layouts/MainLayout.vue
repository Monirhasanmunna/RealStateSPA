<script setup>
import HeaderComponent from './HeaderComponent.vue';
</script>

<template>

<HeaderComponent/>
<!-- Page Content -->
<main class="min-h-screen dark:bg-gray-900 pt-5">
    <div class="md:container m-auto">
        <div class="py-5 px-5 md:border-2 border-dashed md:border-gray-500 space-y-6">
        <slot/>
        </div>
    </div>
</main>
</template>

<style scoped>

</style>
