<script setup>
import HeaderComponent from './HeaderComponent.vue';
</script>

<template>

<HeaderComponent/>
<!-- Page Content -->
<main class="h-screen">
    <div class="md:container m-auto">
        <div class="py-5 px-5 my-3 md:border-2 border-dashed md:border-gray-300 space-y-6">
        <slot/>
        </div>
    </div>
</main>
</template>

<style scoped>

</style>
